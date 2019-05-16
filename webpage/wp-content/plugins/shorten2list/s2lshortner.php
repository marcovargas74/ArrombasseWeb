<?php

function s2l_short_this($post_url, $s2l_option, $short_url_exists = "", $user_Name = "", $post_title = "")
{

	require_once('includes/class.shortenurl.php');
	$sh = new shortenurl();

	switch( $s2l_options['shorten_service']) {
		case 'bitly':
			$bitly_user = $s2l_options['bitly_user'];
			$bitly_key = $s2l_options['bitly_key'];
			$shurl = $sh->make_bitly($post_url,$bitly_user,$bitly_key);
			break;
		
		case 'trim':
			$trim_user = $s2l_options['trim_user'];
			$trim_pass = $s2l_options['trim_pass'];
			$shurl = $sh->make_trim($post_url,$trim_user,$trim_pass); 
			break;
		
		case 'yourls':
			$yourls_api = $s2l_options['yourls_api'];
			$yourls_user = $s2l_options['yourls_user'];
			$yourls_pass = $s2l_options['yourls_pass'];
			$shurl = $sh->make_yourls($post_url,$yourls_api,$yourls_user,$yourls_pass);
			break;
		
		case 'supr':
			$supr_key = $s2l_options['supr_key'];
			$supr_user = $s2l_options['supr_user'];
			$shurl = $sh->make_supr($post_url,$supr_key,$supr_user);
			break;
		
		case 'snurl':
			$snurl_key = $s2l_options['snurl_key'];
			$snurl_user = $s2l_options['snurl_user'];
			$shurl = $sh->make_snurl($post_url, $snurl_key, $snurl_user, $user_Name, $post_title);
			break;
		
		case 'isgd':
			$shurl = $sh->make_isgd($post_url);
			break;
		
		case 'smsh':
			$smsh_key = sha1(get_bloginfo(url));
			$shurl = $sh->make_smsh($post_url, $smsh_key);
			break;
		
		case 'selfdomain':
			$s2l_blog_url = get_bloginfo(url);
			$short_url = $s2l_blog_url . '/?p=' . $post_id;
			$shurl = array( 'short_url', $short_url );
			break;
        
		default:
			$short_url = $post_url;
			break;
		
	}               

	if(is_array($shurl)) {
		add_post_meta($post_id, $shurl[0], $shurl[1]);
		$short_url = $shurl[1];
	}

	return $short_url;

}

// remove wordpress stats wp.me shorlink creation if present.

if ( !function_exists('remove_wpme') ) {

    add_action( 'plugins_loaded', 'remove_wpme' );
      
    function remove_wpme() {                       
      
        if ( function_exists('shortlink_wp_head') ) {
      
			remove_action('wp_head', 'shortlink_wp_head');
			remove_action('wp', 'shortlink_header');
			remove_filter( 'get_sample_permalink_html', 'get_shortlink_html');
          
		}
	}
}

?>