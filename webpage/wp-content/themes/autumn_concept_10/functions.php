<?php  

if ( function_exists('register_sidebar') )
	register_sidebar(array(
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
	));

// Function: Get Recent Comments 

function get_tenrecentcomments($mode = '', $limit = 10) {     
	global $wpdb, $post; 	$where = ''; 	
	if($mode == 'post') { 			
		$where = 'post_status = \'publish\''; 	} 
	elseif($mode == 'page') { 			
		$where = 'post_status = \'static\''; 	} 
	else { 			
		$where = '(post_status = \'publish\' OR post_status = \'static\')'; 	}     
$tenrecentcomments = $wpdb->get_results("SELECT $wpdb->posts.ID, post_title, post_name, post_status, comment_author, post_date, comment_date FROM $wpdb->posts INNER JOIN $wpdb->comments ON $wpdb->posts.ID = $wpdb->comments.comment_post_ID WHERE comment_approved = '1' AND post_date < '".current_time('mysql')."' AND $where AND post_password = '' ORDER  BY comment_date DESC LIMIT $limit"); 	
	if($tenrecentcomments) { 		
	foreach ($tenrecentcomments as $post) { 				
		$post_title = htmlspecialchars(stripslashes($post->post_title)); 				
		$comment_author = htmlspecialchars(stripslashes($post->comment_author)); 				
		$comment_date = mysql2date('m.d', $post->comment_date); 				
		echo "<li><a href=\"".get_permalink()."\">$comment_author</a></li>\n"; 		} 	} 
	else { 		echo '<li>'.__('N/A').'</li>'; 	} }  

    function widget_mytheme_search() {
?>
        <h3>Search</h3>
        <?php include (TEMPLATEPATH . '/searchform.php'); ?>
	  
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_mytheme_search');

    function widget_mytheme_links() {
?>
      <h3>Links</h3>
	    <ul>
		  <?php wp_list_bookmarks(); ?>
		</ul>
	  
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Links'), 'widget_mytheme_links');
	
	    function widget_mytheme_pages() {
?>
        <h3>Pages</h3>
	    <ul>
	      <?php wp_list_pages('title_li='); ?>
		</ul>
	  
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Pages'), 'widget_mytheme_pages');

?>