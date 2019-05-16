<div id="sidebar">
<div class="side1">

<ul>
  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
  	 
 <?php wp_list_pages('title_li=<h2><i>Pages</i></h2>' ); ?>
	<?php wp_list_categories('title_li=<h2><i>Categories</i></h2>'); ?></ul>  

        <h2><i>Archives</i></h2>
        <ul>
          <?php wp_get_archives('type=monthly'); ?>
        </ul>
      
   <h2><i>Search</i></h2>				<del><?php include (TEMPLATEPATH . '/searchform.php'); ?></del>
  <?php endif; ?>
</div>
</div>
</div> <!-- end left -->
<div id="right">
  <div class="side2">
    <ul>
	  <li><?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?></li>



<li><?php if (function_exists('ls_getinfo')) : ?>
      <?php if (ls_getinfo('isref')) { ?>
        <div class="landingsites">
          <h2>Your search about: <?php ls_getinfo('terms'); ?></h2>
          <p>You came from <?php ls_getinfo('referrer'); ?> and search <em><b><?php ls_getinfo('terms'); ?></b></em>. This posts are relevant Information:</p></li>
          

          <li><?php ls_related(5, 10, '<li>', '', '', '', false, false); ?>
          
        </div>
      <?php } ?>
    <?php endif; ?></li>
</ul>
	  
<ul>
<li><!-- Activity -->
<h2>Last 5 Posts</h2>

<?php
$posts = get_posts('numberposts=5&offset=0');
foreach ($posts as $post) : ?></li>

<li><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php the_title() ?></a></li>

<?php endforeach; ?>
				
		</ul><!-- End of Activity -->



<?php if ( function_exists('wp_tag_cloud') ) : ?>
<ul>
<li>
<h2>Popular Tags</h2>
</li>
<li><?php wp_tag_cloud('smallest=8&largest=22'); ?> </li>
</ul>

<?php endif; ?>




 <?php /* If this is the frontpage */ if (is_home()) { ?>
    <ul> <?php wp_list_bookmarks(); ?></ul>
      <?php } ?>
      <?php endif; ?>

<h2>Meta</h2>
    
          <ul><li><?php wp_register(); ?></li>
         
       <li><?php wp_loginout(); ?></li>      
       <li><a href="http://www.wpthemesfree.com/" title="Wordpress Themes">Wordpress Themes</a></li>        
          <?php wp_meta(); ?></li></ul>
        
<h2>Last 5 Comments</h2>

<ul><li><?php $comments = $wpdb->get_results("SELECT comment_post_ID, comment_author, comment_author_email, comment_content, comment_date
  FROM $wpdb->comments
  WHERE comment_type = ''
  && comment_approved = '1'
  ORDER BY comment_date
  DESC LIMIT 5"); ?>
<?php $commenttype = 'even';

foreach($comments as $comment) {
  $post = get_postdata($comment->comment_post_ID); ?></li>

  <li class="<?php echo $commenttype; ?>">
    <?php echo $comment->comment_author; ?> <strong><i>to</i></strong> <a href="<?php echo get_permalink($post['ID']); ?>" title="">
      <?php echo $post['Title']; ?></a>
  </li>

  <li><?php if($commenttype == "even") { $commenttype = "odd"; } else { $commenttype = "even"; } ?>
<?php } ?>

	</li> </ul>  
  </div>
</div>