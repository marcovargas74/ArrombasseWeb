<?php 
/*
 * Using Alex Kings simple queries to get blog stats.
 * URI: http://alexking.org/blog/2007/01/01/sql-for-blog-stats
 */

function nm_get_comments_count() {
    global $wpdb;
	$query = "SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'";

    echo $wpdb->get_var($query);
}

function nm_get_posts_count() {
    global $wpdb;
	$query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'";

    echo $wpdb->get_var($query);
}

function nm_get_comments_avg_char_count() {
    global $wpdb;
	$query = "SELECT AVG(LENGTH(comment_content)) FROM $wpdb->comments WHERE comment_approved = '1'";
	
	echo $wpdb->get_var($query);
}

function nm_get_posts_avg_char_count() {
    global $wpdb;
	$query = "SELECT AVG(LENGTH(post_content)) FROM $wpdb->posts WHERE post_status = 'publish'";
	
	echo $wpdb->get_var($query);
}
function nm_get_comments_total_char_count() {
    global $wpdb;
	$query = "SELECT SUM(LENGTH(comment_content)) FROM $wpdb->comments WHERE comment_approved = '1'";
	
	echo $wpdb->get_var($query);
}

function nm_get_posts_total_char_count() {
    global $wpdb;
	$query = "SELECT SUM(LENGTH(post_content)) FROM $wpdb->posts WHERE post_status = 'publish'";
	
	echo $wpdb->get_var($query);
}

/*
Plugin Name: Comment Word Count
Plugin URI: http://mtdewvirus.com/code/wordpress-plugins/
Description: Outputs the total number of words in all comments.
Version: 1.02
Author: Nick Momrik
Author URI: http://mtdewvirus.com/
*/

function nm_get_comments_word_count() {
    global $wpdb;
	$words = $wpdb->get_results("SELECT comment_content FROM $wpdb->comments WHERE comment_approved = '1'");
	if ($words) {
		foreach ($words as $word) {
			$comment = strip_tags($word->comment_content);
			$comment = explode(' ', $comment);
			$count = count($comment);
			$totalcount = $count + $oldcount;
			$oldcount = $totalcount;
		}
	} else {
		$totalcount=0;
	}
	echo number_format($totalcount);
}
function nm_get_posts_word_count() {
    global $wpdb;
	$words = $wpdb->get_results("SELECT post_content FROM $wpdb->posts WHERE post_status = 'publish'");
	if ($words) {
		foreach ($words as $word) {
			$comment = strip_tags($word->post_content);
			$comment = explode(' ', $comment);
			$count = count($comment);
			$totalcount = $count + $oldcount;
			$oldcount = $totalcount;
		}
	} else {
		$totalcount=0;
	}
	echo number_format($totalcount);
}
?>