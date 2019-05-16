<?php

// Widget Settings

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar_left',
		'before_widget' => '<div class="Categ">', 
		'after_widget' => '</div>', 
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Sidebar_right',
		'before_widget' => '',
		'after_widget' => '<br />', 
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

/*
Plugin Name: Recent Comments
Plugin URI: http://mtdewvirus.com/code/wordpress-plugins/
Description: Retrieves a list of the most recent comments.
Version: 1.18
Author: Nick Momrik
Author URI: http://mtdewvirus.com/
*/
if (function_exists('mdv_recent_comments')) { 
}else{
		
	function mdv_recent_comments($no_comments = 10, $comment_lenth = 5, $before = '<li class="off" onmouseover=this.className="on"; onmouseout=this.className="off";>', $after = '</li>', $show_pass_post = false, $comment_style = 0) {
	    global $wpdb;
	    $request = "SELECT ID, comment_ID, comment_content, comment_author, comment_author_url, post_title FROM $wpdb->comments LEFT JOIN $wpdb->posts ON $wpdb->posts.ID=$wpdb->comments.comment_post_ID WHERE post_status IN ('publish','static') ";
		if(!$show_pass_post) $request .= "AND post_password ='' ";
		$request .= "AND comment_approved = '1' ORDER BY comment_ID DESC LIMIT $no_comments";
		$comments = $wpdb->get_results($request);
	    $output = '';
		if ($comments) {
			foreach ($comments as $comment) {
				$comment_author = stripslashes($comment->comment_author);
				if ($comment_author == "")
					$comment_author = "anonymous"; 
				$comment_content = strip_tags($comment->comment_content);
				$comment_content = stripslashes($comment_content);
				$words=split(" ",$comment_content); 
				$comment_excerpt = join(" ",array_slice($words,0,$comment_lenth));
				$permalink = get_permalink($comment->ID)."#comment-".$comment->comment_ID;
	
				if ($comment_style == 1) {
					$post_title = stripslashes($comment->post_title);
					
					$url = $comment->comment_author_url;
	
					if (empty($url))
						$output .= $before . $comment_author . ' on ' . $post_title . '.' . $after;
					else
						$output .= $before . "<a href='$url' rel='external'>$comment_author</a>" . ' on ' . $post_title . '.' . $after;
				}
				else {
					$output .= $before . '' . $comment_author . ':  <a href="' . $permalink;
					$output .= '" title="View the entire comment by ' . $comment_author.'">' . $comment_excerpt.'</a>' . $after;
				}
			}
			$output = convert_smilies($output);
		} else {
			$output .= $before . "None found" . $after;
		}
	    echo $output;
	}
}
?>