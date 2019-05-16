<?php

// Admin Panel
function shorten2list_options_subpanel() {

  global $shorten2list_url, $donate, $user_ID;

  get_currentuserinfo();
  
  $s2l_options = get_option('shorten2list_options_' . $user_ID);  

	if (get_magic_quotes_gpc()) {
    	$_POST = array_map('s2l_bnc_stripslashes_deep', $_POST);
	    $_GET = array_map('s2l_bnc_stripslashes_deep', $_GET);
	    $_COOKIE = array_map('s2l_bnc_stripslashes_deep', $_COOKIE);
	    $_REQUEST = array_map('s2l_bnc_stripslashes_deep', $_REQUEST);
	}


  	if (isset($_POST['info_update'])) {
		// Update Global Options
		foreach( $s2l_options as $key => $value ) {
			if(isset($_POST[$key])) {
				if ($_POST[$key] == $_POST['message']) {
					$s2l_options[$key] = stripslashes($_POST['message']);
				} else { 
					$s2l_options[$key] = $_POST[$key];
				} 
			} else {	
				$s2l_options[$key] = '';     
			}
		}

		// Update Maillists Options
		// mlname[] - mlfrom[] - mlto[] - mltrigger[]
		$mlnames = $_POST['mlname']; $mlfroms = $_POST['mlfrom']; $mltos = $_POST['mlto'];	$mltriggers = $_POST['mltrigger'];
		unset($s2l_maillists);
		
		for ($i = 0; $i < sizeof($mlnames); $i++) {
			if(empty($mlnames[$i]) && empty($mlfroms[$i]) && empty($mltos[$i]) && empty($mltriggers[$i])) {
				continue;
			}
			$n = trim(stripslashes(strip_tags($mlnames[$i])));
			if(empty($n)) { 
				$emsg =  __('A maillist name is empty. List was not saved.');
			} else {
				$f = trim(stripslashes(strip_tags($mlfroms[$i])));
				if(!validate_email($f)) {
					if(empty($f)) $emsg = __('is empty.'); else $emsg = __('<em>"'.$f.'"</em> is not valid.'); 
					$emsg =  __('Your email address ' . $emsg . ' List <em>'.$n.'</em> not saved.');
				} else {
					$t = trim(stripslashes(strip_tags($mltos[$i])));
					if(!validate_email($t)) {
						if(empty($t)) $emsg = __('is empty.'); else $emsg = __('<em>"'.$t.'"</em> is not valid.'); 
						$emsg =  __('Maillist email address ' . $emsg . ' List <em>'.$n.'</em> not saved.');
					} else {
						$g = trim(stripslashes(strip_tags($mltriggers[$i])));
						if(empty($g)) {
							$nmsg .=  __('No <em>triggers</em> where defined for list <em>'.$n.'</em>. <u>All posts published</u> will be sent to it.<br />');
						}
						$s2l_maillists[] = array( 'name' => $n, 'from' => $f, 'to' => $t, 'triggers' => $g ); 
					}
				}
			}
			$s2l_trap_maillists[] = array( 'name' => $mlnames[$i], 'from' => $mlfroms[$i], 'to' => $mltos[$i], 'triggers' => $mltriggers[$i] ); 
		}

		// Update values in DB
		update_option( 'shorten2list_options_' . $user_ID, $s2l_options );
		if(empty($emsg) && is_array($s2l_maillists)) {
			s2l_update_lists_user( $user_ID, $s2l_maillists );
			unset($emsg);
		}
		// Output messages
		echo '<div id="message" class="updated fade"><p><strong>' . __('Settings saved.') . '</strong></p></div>';
		if(!empty($emsg)) {
			echo '<div id="notice" class="error"><p><strong>' . $emsg . '</strong></p></div>';
		} elseif(!empty($nmsg)) {
			echo '<div id="message" class="updated"><p><strong>' . $nmsg . '</strong></p></div>';
		}

	} 

?>
<div class="wrap">
	 <div id="icon-options-general" class="icon32"><br /></div>
	 
	 <h2><?php _e('Shorten2LIST Options','shorten2list') ?></h2>
 
	<p><?php _e('Shorten2LIST allows you to send post excerpts to selected maillists whenever a new blog entry is published.  To start using it, simply enter the required information below, and press update information button. You only need to fill data for the maillists you want to use.','shorten2list') ?></p>
	<p><?php _e('You can also customize the message for the status notification by using the "subject" and "message" fields below.  You can use [title] to represent the entry title, [body] to represent the excerpt of the blog entry, and [link] to represent the permalink.','shorten2list') ?></p>

  <div id="tabs">
  
  <ul>
    <li><a href="#tabs-1"><?php _e('General','shorten2list'); ?></a> |</li>
    <li><a href="#tabs-2"><?php _e('Maillists','shorten2list'); ?></a> |</li>
    <li><a href="#tabs-3"><?php _e('Shorteners','shorten2list'); ?></a></li>
  </ul>
  
  <form method="post" name="options" action="">
    <div id="tabs-1">    
      <br />
          
      <table width="100%" cellspacing="0" class="widefat">
        <thead>
          <tr>
            <th width="200"><?php _e('Setting','shorten2list'); ?></th>
            <th width="450">&nbsp;</th>
            <th><?php _e('Description','shorten2list'); ?></th>
          </tr>
        </thead>
        
		<tr><th><?php _e('Email Subject','shorten2list') ?></th>
			<td><input type="text" name="subject" class="widefat" value="<?php echo(htmlentities(utf8_decode($s2l_options['subject']))); ?>" /></td>
			<td class="description"><?php _e('Keep it short. Remember to include [title] if you wish to use the blog entry title on email subject.','shorten2list') ?></td>
		</tr>        
        
		<tr><th><?php _e('Email Message','shorten2list') ?></th>
			<td><textarea name="message" class="widefat"><?php echo(htmlentities(utf8_decode($s2l_options['message']))); ?></textarea></td>
			<td class="description"><?php _e('Add a short message if you wish or just [body] to include a short excerpt of your blog entry, and remember to include at least the [link] tag so people can read it.','shorten2list') ?></td>
		</tr>        
        
		<tr><th><?php _e('Shorten Permalinks With:','shorten2list') ?></th>
			<td><select name="shorten_service">
					<option value='bitly'<?php if ($s2l_options['shorten_service'] == 'bitly') echo ' selected="selected"'; ?> ><?php _e('Bit.ly','shorten2list') ?></option>
					<option value='trim'<?php if ($s2l_options['shorten_service'] == 'trim') echo ' selected="selected"'; ?> ><?php _e('Tr.im','shorten2list') ?></option>
					<option value='yourls'<?php if ($s2l_options['shorten_service'] == 'yourls') echo ' selected="selected"'; ?> ><?php _e('YOURLS','shorten2list') ?></option>
					<option value='supr'<?php if ($s2l_options['shorten_service'] == 'supr') echo ' selected="selected"'; ?> ><?php _e('Su.pr','shorten2list') ?></option>
					<option value='snurl'<?php if ($s2l_options['shorten_service'] == 'snurl') echo ' selected="selected"'; ?> ><?php _e('SNURL','shorten2list') ?></option>
					<option value='isgd'<?php if ($s2l_options['shorten_service'] == 'isgd') echo ' selected="selected"'; ?> ><?php _e('Is.gd','shorten2list') ?></option>
					<option value='smsh'<?php if ($s2l_options['shorten_service'] == 'smsh') echo ' selected="selected"'; ?> ><?php _e('sm00sh','shorten2list') ?></option>
					<option value='selfdomain'<?php if ($s2l_options['shorten_service'] == 'selfdomain') echo ' selected="selected"'; ?> ><?php _e('Self domain','shorten2list') ?></option>
					<option value='none'<?php if ($s2l_options['shorten_service'] == 'none') echo ' selected="selected"'; ?> ><?php _e('None','shorten2list') ?></option>
				</select></td>
			<td class="description"><?php _e('Choose to make short URLs using sm00sh (default) or any of the others, or turn off this feature.','shorten2list') ?></td>
		</tr>             

      </table>
    
    </div>
    
    <div id="tabs-2">

      <br />
	
	  <p><?php _e('This is the main section. Fill in carefully all the fields.<br /><strong>Triggers</strong> can be both tags and categories <strong>BUT</strong> if empty all posts will be sent to that maillist.','shorten2list') ?></p>
      
      <table width="100%" cellspacing="0" class="widefat display KeyTable" id="maillists">
        <thead>
          <tr>
            <th width="200"><?php _e('List Name','shorten2list'); ?></th>
            <th width="150"><?php _e('From Address','shorten2list'); ?></th>
            <th width="150"><?php _e('To Address','shorten2list'); ?></th>
            <th><?php _e('Triggers','shorten2list'); ?></th>
            <th width="40"><?php _e('Actions','shorten2list'); ?></th>
          </tr>
        </thead>
        <tbody>
<?php

	if(!$emsg) $s2l_maillists_for_user = s2l_get_lists_user($user_ID);

	if(empty($s2l_maillists_for_user)) {
		if($s2l_trap_maillists) {
			$s2l_maillists_for_user = $s2l_trap_maillists;
		} else {
			$s2l_maillists_for_user[] = array( 'name' => '', 'from' => '', 'to' => '', 'triggers' => '' );
		}
	} else {
		$s2l_maillists_for_user[] = array( 'name' => '', 'from' => '', 'to' => '', 'triggers' => '' );
	}
	
	foreach ($s2l_maillists_for_user as $ml) {
		// mlname[] - mlfrom[] - mlto[] - mltrigger[]
?>
		  <tr>
			<td><input type="text" class="widefat" name="mlname[]" value="<?php echo(htmlentities(utf8_decode($ml['name']))); ?>" /></td>
			<td><input type="text" class="widefat" name="mlfrom[]" value="<?php echo($ml['from']); ?>" /></td>
			<td><input type="text" class="widefat" name="mlto[]" value="<?php echo($ml['to']); ?>" /></td>
			<td><input type="text" class="widefat" name="mltrigger[]" value="<?php echo($ml['triggers']); ?>" /></td>
			<td align="center"><img border="0" style="cursor: pointer;" class="delete" 
				src="/wp-content/plugins/shorten2list/icons/table_row_delete.png" 
				title="<?php _e('Remove this row','shorten2list') ?>"  alt="<?php _e('Remove this row','shorten2list') ?>" /></td>
          </tr>
<?php
	}
?>
        </tbody>
		<tfoot style="bgcolor: #c9c9c9;"> 
			<tr>
				<td colspan="3"></td> 
				<td class="description" align="right">Click icon to add new maillist row</td> 
				<td align="center"><img border="0" style="cursor: pointer;" 
						src="/wp-content/plugins/shorten2list/icons/table_row_insert.png"  class="addit"
						title="Add new list row"  alt="Add new list row" /></td> 
			</tr>
		</tfoot>
	  </table>
    </div>
    
    <div id="tabs-3">
    
      <br />
      
      <table width="100%" cellspacing="0" class="widefat">
        <thead>
          <tr>
            <th width="140"><?php _e('Setting','shorten2list'); ?></th>
            <th width="450">&nbsp;</th>
            <th><?php _e('Description','shorten2list'); ?></th>
          </tr>
        </thead>

      <tr><th><?php _e('Bit.ly','shorten2list') ?></th>
      <td><?php _e('API Login','shorten2list') ?> <input type="text" class="widefat" name="bitly_user" value="<?php echo($s2l_options['bitly_user']); ?>" />
			<?php _e('API Key','shorten2list') ?> <input type="text" class="widefat" name="bitly_key" value="<?php echo($s2l_options['bitly_key']); ?>"  />
      </td>
      <td class="description"><?php _e('Put here your API login and <a href="http://bit.ly/account/">Bit.ly</a> API key.','shorten2list') ?>
      </td>
      </tr>
			
      <tr><th><?php _e('Tr.im','shorten2list') ?></th><td><?php _e('Username','shorten2list') ?> <input type="text" class="widefat" name="trim_user" value="<?php echo($s2l_options['trim_user']); ?>"  />
      <?php _e('Password','shorten2list') ?> <input type="password" class="widefat" name="trim_pass" value="<?php echo($s2l_options['trim_pass']); ?>"  /></td>
      <td class="description"><?php _e('Unfortunately <a href="http://tr.im">Tr.im</a> doesn\'t have API keys for users, so you must put here your user login and password if you want to use this service.','shorten2list') ?></td>
      </tr>
      
	  <tr><th><?php _e('YOURLS','shorten2list') ?></th>
      <td><?php _e('Username','shorten2list') ?> <input type="text" class="widefat" name="yourls_user" value="<?php echo($s2l_options['yourls_user']); ?>"  />
      <?php _e('Password','shorten2list') ?> <input type="password" class="widefat" name="yourls_pass" value="<?php echo($s2l_options['yourls_pass']); ?>" />
      </td><td class="description"><?php _e('Put here your username and password for <a href="http://yourls.org/">YOURLS</a>.','shorten2list') ?>
      </td></tr>
      
      <tr><th>&nbsp;</th>
      <td><?php _e('YOURLS API URL','shorten2list') ?> <input type="text" name="yourls_api" class="widefat" value="<?php echo($s2l_options['yourls_api']); ?>" />
      </td><td class="description"><?php _e('Example: http://example.com/yourls-api.php','shorten2list') ?>
      </td>
      </tr>
      <tr><th><?php _e('Su.pr','shorten2list') ?></th>
      <td><?php _e('API Login','shorten2list') ?> <input type="text" name="supr_user" class="widefat" value="<?php echo($s2l_options['supr_user']); ?>" />
			<?php _e('API Key','shorten2list') ?> <input type="text" name="supr_key" class="widefat" value="<?php echo($s2l_options['supr_key']); ?>" />
      </td><td class="description"><?php _e('Put here your API login and <a href="http://su.pr/settings/">Su.pr</a> API key.','shorten2list') ?>
      </td>
      </tr>
      <tr><th><?php _e('SNURL','shorten2list') ?></th>
      <td><?php _e('API Login','shorten2list') ?> <input type="text" name="snurl_user" class="widefat" value="<?php echo($s2l_options['snurl_user']); ?>" />
			<?php _e('API Key','shorten2list') ?> <input type="text" name="snurl_key" class="widefat" value="<?php echo($s2l_options['snurl_key']); ?>" />
      </td><td class="description"><?php _e('Put here your API login and <a href="http://snipurl.com/site/api">SNURL</a> API key.','shorten2list') ?>
      </td>
      </tr>
      
      </table>

    </div>

   		<div class="submit"><input type="submit" class="button-primary" name="info_update" value="<?php _e('Save settings','shorten2list') ?>" /></div>

     </form>
     
    <p>
		<?php _e("If you find this plugin useful, please consider to make a ".$donate." to Shorten2List's author or send a <a href='http://www.amazon.co.uk/wishlist/2NQ1MIIVJ1DFS'>gift</a> (anything will be appreciated).",'shorten2list') ?>
		<?php _e("<br />We are strongly against SPAMming so don't use it for Evil deeds. Thanks!",'shorten2list') ?>
    </p>

    </div>

</div>
	<?php
}

// tabs for options page

function s2l_admin_js() { // options js
	global $shorten2list_url;

	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('s2l_tabs_js', $shorten2list_url . '/includes/s2l_admin.js', array('jquery-ui-tabs'));

//	wp_enqueue_script('s2l_datatable_js', $shorten2list_url . '/includes/jquery.dataTables.js', array('jquery'));
	wp_enqueue_script('s2l_lists_js', $shorten2list_url . '/includes/s2l_lists.js', array('jquery'));
//	wp_enqueue_script('s2l_keytable_js', $shorten2list_url . '/includes/KeyTable.js', array('jquery'));
//	wp_enqueue_script('s2l_keytable_call_js', $shorten2list_url . '/includes/s2l_keytable.js', array('jquery'));

}

function s2l_admin_css() { // options css
	global $shorten2list_url;

	wp_enqueue_style('s2l_tabs_css', $shorten2list_url . '/includes/s2l_admin.css');
//	wp_enqueue_style('s2l_table_css', $shorten2list_url . '/includes/table.css');

}

?>