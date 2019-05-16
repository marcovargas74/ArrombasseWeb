<?php
/*
Plugin Name: Shorten2List
Plugin URI: http://www.ipublicis.com
Description: Sends <strong>status</strong> updates to maillists when a post is published, using own domain or others for shortened permalinks. Like it? <a href="http://smsh.me/7kit" target="_blank" title="Paypal Website"><strong>Donate</strong></a> | <a href="http://www.amazon.co.uk/wishlist/2NQ1MIIVJ1DFS" target="_blank" title="Amazon Wish List">Amazon Wishlist</a> | Silk icons by <a href="http://www.famfamfam.com/lab/icons/silk/" target="_blank">FAMFAMFAM</a>
Author: Lopo Lencastre de Almeida - iPublicis.com
Version: 1.1
Author URI: http://www.ipublicis.com
Donate link: http://smsh.me/7kit
*/

/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License version 3 as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


/*
  Changelog:
  
  From now on, see the readme for changelog.
  
*/

// setting some internal information
$shorten2list_dirname = plugin_basename(dirname(__FILE__));
$shorten2list_url = WP_PLUGIN_URL . '/' . $shorten2list_dirname;
$donate = '<a href="http://smsh.me/7kit">donation</a>';
$shorten2list_db_version = '1.0';

// Include Database functions
require_once('s2ldb.php');

// Include Init and Install functions
require_once('s2linit.php');

// Include external functions
require_once('includes/betterwordwrap.php');
require_once('s2lshortner.php');
require_once('s2lfunctions.php');

// Include Admin Panel functions
require_once('s2ladminpanel.php');

//load translation file if any for the current language
load_plugin_textdomain('shorten2list', PLUGINDIR . '/' . $shorten2list_dirname . '/locale');

// Main function
function shorten2list_published_post($post) {

	global $user_ID;

	if(empty($shorten2list_plugin_prefix)) 
		$shorten2list_plugin_prefix = "shorten2list_";

	get_currentuserinfo();

	if ( $post->post_type != 'post' ) return;  // dont send pages

	$post_id = $post->ID;
	$post_title = $post->post_title;
	$post_title = strip_tags($post_title);

	$post_excerpt = $post->post_excerpt;
	$post_excerpt = strip_tags($post_excerpt);
	if(empty($post_excerpt)) {
		$text = $post->post_content;
		$post_excerpt = s2l_make_excerpt($text);
	}	

	$post_url = get_permalink($post_id);
	
	$user_info = get_userdata($user_ID);
	$user_Name = $user_info->first_name . " " . $user_info->last_name;
	
	$s2l_options = get_option('shorten2list_options_' . $user_ID);	

	$short_url_exists = get_post_meta($post_id, 'short_url', true);
   
	if(empty($short_url_exists)) 
		$short_url = s2l_short_this($post_url, $s2l_options, $short_url_exists, $user_Name, $post_title); 
	else 
		$short_url = $short_url_exists;
	
   //get message from settings and process title, body and link
	$subject = $s2l_options['subject'];
	$subject = str_replace('[title]', $post_title, $subject);
	$subject = strip_tags($subject);

	$message = $s2l_options['message'];
	$message = str_replace('[body]', $post_excerpt, $message);
	$message = str_replace('[link]', $short_url, $message);
	$message = stripslashes(strip_tags($message));
	$message = betterWordwrap($message, 70);
	
	$s2l_maillists = s2l_get_lists_post($user_ID, $post_id);

	foreach ( $s2l_maillists as $s2l_name ) {
		$from = $s2l_name['from'];
		$to = $s2l_name['to'];

		if ( validate_email($from) && validate_email($to) ) {
			$from = '"' . $user_Name . '" <' . $from . '>';
			$to = '"' . $s2l_name['name'] . '" <' . $to . '>';
			if(s2l_post2mail($from, $to, $subject, $message)) 
				$sentMails .= $s2l_name['name']  . "\r\n";
		}
	}

	update_post_meta($post_id, 'sent-by-mail', $sentMails);

}

register_activation_hook( __FILE__, 's2l_init_options' );
add_action('new_to_publish', 'shorten2list_published_post');
add_action('draft_to_publish', 'shorten2list_published_post');
add_action('pending_to_publish', 'shorten2list_published_post');
add_action('future_to_publish', 'shorten2list_published_post');
add_action('admin_menu', 'shorten2list_add_plugin_option');
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'shorten2list_add_settings_link', -10);
add_action('wp_head', 'shorten2list_short_url_head');

?>