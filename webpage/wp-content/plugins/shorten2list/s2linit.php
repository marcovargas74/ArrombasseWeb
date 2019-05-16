<?php

function s2l_init_options() {
     
// get user ID to use in multi author blogs.
  global $user_ID;

  get_currentuserinfo();

// create options array. if options already exists add_option function does nothing.

  $s2l_options['subject'] = "[title]";
  $s2l_options['message'] = "[body]\r\n\r\n" . __('Read more at ', 'shorten2list') . "[link]";
  $s2l_options['shorten_service'] = "smsh";
  $s2l_options['bitly_user'] = "";
  $s2l_options['bitly_key'] = "";
  $s2l_options['trim_user'] = "";
  $s2l_options['trim_pass'] = "";
  $s2l_options['yourls_api'] = "";
  $s2l_options['yourls_user'] = "";
  $s2l_options['yourls_pass'] = "";
  $s2l_options['supr_user'] = "";
  $s2l_options['supr_key'] = "";
  $s2l_options['snurl_user'] = "";
  $s2l_options['snurl_key'] = "";
  
  add_option('shorten2list_options_'.$user_ID, $s2l_options );
  
  // check if plugin installed is previous to 1.0 Final, and add new options in that case

  $existing_s2l_options = get_option('shorten2list_options_'.$user_ID);
  
  $old_settings = count($existing_s2l_options);
  
  if (empty($existing_s2l_options)) {
  
    delete_option('shorten2list_options_'.$user_ID);
    add_option('shorten2list_options_'.$user_ID, $s2l_options);

  } elseif ($old_settings == 14) {

     $s2l_new_options = array ("snurl_user" => "", "snurl_key" => "");
     $merged_options = array_merge($existing_s2l_options, $s2l_new_options);
	
     delete_option ('shorten2list_options_'.$user_ID);
     add_option('shorten2list_options_'.$user_ID, $merged_options);  
  }

  // Install DB
  s2l_install_db();

}

function shorten2list_add_plugin_option() {
 
    $shorten2list_plugin_name = 'Shorten2List';
	$shorten2list_plugin_prefix  = 'shorten2list_';

    if (function_exists('add_options_page')) 
    {
       $s2l_options_page = add_options_page($shorten2list_plugin_name, $shorten2list_plugin_name, 'manage_options', basename(__FILE__), $shorten2list_plugin_prefix . 'options_subpanel');
    }
    
	add_action("admin_print_scripts-$s2l_options_page", 's2l_admin_js');
	add_action("admin_print_styles-$s2l_options_page", 's2l_admin_css');	
}

function shorten2list_add_settings_link($links) {
	$settings_link = '<a class="edit" href="options-general.php?page=shorten2list.php" title="'. __('Go to settings page','shorten2list') .'">' . __('Settings','shorten2list') . '</a>';
	array_unshift( $links, $settings_link ); // before other links
	return $links;
}

?>