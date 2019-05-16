<div id="sidebar">
<div id="rss"><a href="<?php bloginfo('rss2_url'); ?>"  title="<?php _e('RSS'); ?>" rel="nofollow" >&nbsp;&nbsp;&nbsp;</a></div>
 
<ul> 
 
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

 <?php 
    global $notfound;
    if (is_page() and ($notfound != '1')) {
        $current_page = $post->ID;
        while($current_page) {
            $page_query = $wpdb->get_row("SELECT ID, post_title, post_status, post_parent FROM $wpdb->posts WHERE ID = '$current_page'");
            $current_page = $page_query->post_parent;
        }
        $parent_id = $page_query->ID;
        $parent_title = $page_query->post_title;

        // if ($wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id' AND post_status != 'attachment'")) {
        if ($wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id' AND post_type != 'attachment'")) {
    ?>

    <li>
      <h3 class="sidebartitle"><?php echo $parent_title; ?> <?php _e('Subpages'); ?></h3>
      <ul class="list-page">
        <?php wp_list_pages('sort_column=menu_order&title_li=&child_of='. $parent_id); ?>
      </ul>
    </li>

    <?php } } ?>
 
 
  <h2>Search</h2>

  <div id="searchdiv">

    <form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">

      <input type="text" name="s" id="s" size="15"/>

      <input name="sbutt" type="submit" value="Go" alt="Go"  />

    </form>
  </div>
  
 

   <h2>


   <?php _e('Calendar'); ?>
  </h2>
<?php get_calendar(); ?>

  <ul>



  <h2>


   <?php _e('Categories'); ?>
  </h2>
  <ul>

    <?php list_cats(0, '', 'name', 'asc', '', 1, 0, 0, 1, 1, 1, 0,'','','','','') ?>

  </ul>
  		<h2><?php _e('Archives');?></h2>
	<ul>


	 <?php wp_get_archives('type=monthly'); ?>

</ul>
  <ul>

    <?php get_links_list(); ?>

  </ul>


  <h2>

    <?php _e('Meta'); ?>

  </h2>

  <ul>

    <?php wp_register(); ?>

     <li>

      <?php wp_loginout(); ?>

    </li>
	 


    <?php wp_meta(); ?>

  </ul>
  
<br />
</ul> 
<?php endif; ?>
</div>

