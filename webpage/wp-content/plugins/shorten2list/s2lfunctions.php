<?php
// Funtion to send 'message' to a Maillist.

function s2l_post2mail($from, $to, $subject, $message){

	/* subject */
	$subject = "=?UTF-8?B?".base64_encode($subject)."?="; 
	
	/* main headers */
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/plain; charset=utf-8\r\n";
	$headers .= "Content-Transfer-Encoding: 8bit\r\n";

	/* additional headers */
	$headers .= "From: $from\r\n";
	$headers .= "Reply-To: $from\r\n";
	$headers .= "X-Mailer: Wordpress Shorten2List/1.1\r\n";
	$headers .= "X-Priority: 1 (Higuest)\r\n"; 
	$headers .= "X-MSMail-Priority: High\r\n"; 
	$headers .= "Importance: High\r\n"; 
	
	// Fix any bare linefeeds in the message to make it RFC821 Compliant. 
	$message = preg_replace("#(?<!\r)\n#si", "\r\n", $message); 
    
	// Make sure there are no bare linefeeds in the headers 
	$headers = preg_replace('#(?<!\r)\n#si', "\r\n", $headers); 

	/* and now mail it */
	$mail_sent = @mail( $to, $subject, $message, $headers );

	//echo $mail_sent ? "Mail sent" : "Mail failed";
	if($mail_sent) return true; else return false;
	
}

// simple function to use in your theme if you want to show the short url for the current post

function s2l_short_permalink($linktext="") {

	global $post;

	$s2l_short_permalink = get_post_meta($post->ID, 'short_url', 'true');   

	if ($linktext == 'linktext') {
		$linktext = $s2l_short_permalink;
	} elseif (empty($linktext)) {
		$linktext = __('Short URL','shorten2list');
	}

	$post_title = strip_tags($post->post_title);

	// Using rel="shorturl" as proposed at http://wiki.snaplog.com/short_url
	if (!empty($s2l_short_permalink)) {
		echo "<a href=\"$s2l_short_permalink\" rel=\"shorturl\" title=\"$post_title\">" . $linktext . "</a>";
	}
}
    
function shorten2list_short_url_head() {

	if(function_exists('is_plugin_active')) {
		if(is_plugin_active('shorten2pingNG/shorten2ping.php')) {
			echo "<!-- Shorturl add skipped by shorten2list -->\n";
			return;
		}
	}
	
    global $post;
    
    $s2l_short_permalink = get_post_meta($post->ID, 'short_url', 'true');    
    
    if (is_single($post->ID) && !empty($s2l_short_permalink)) {
		echo "<!-- Shorturl added by shorten2list -->\n";
		echo "<link rel=\"shorturl\" href=\"$s2l_short_permalink\" />\n";    
	}

}

function s2l_bnc_stripslashes_deep($value)
{
	$value = is_array($value) ?
		array_map('s2l_bnc_stripslashes_deep', $value) :
		stripslashes($value);
	return $value;

}

function s2l_make_excerpt($text) {
	$text = preg_replace(" (\[.*?\])",'',$text);
	$text = strip_tags($text, '<p><br>');
	$text = substr($text, 0, 400);
	$text = substr($text, 0, strripos($text, " "));
	$text = trim(preg_replace( '/\s+/', ' ', $text));  
	$text = stripslashes($text)."...";
	return $text;
} //end of function s2l_make_excerpt

?>