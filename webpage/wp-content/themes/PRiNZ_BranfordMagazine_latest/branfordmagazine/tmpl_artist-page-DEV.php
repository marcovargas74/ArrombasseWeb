<?php
/*
Template Name: Section Page
*/
?>
<?php get_header(); ?>

<div id="featured-top">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div id="featured-leftcol"> <img class="left" src="<?php bloginfo('url'); ?>/wp-content/uploads/<?php $values = get_post_custom_values("featuredpagepic"); echo $values[0]; ?>" alt="" id="featuredpagepic" />
    <h2>
      <?php $values = get_post_custom_values("featuredpageheadline"); echo $values[0]; ?>
    </h2>
    <span id="featured-text">
    <?php $values = get_post_custom_values("featuredpagetext"); echo $values[0]; ?>
    </span> </div>
    
  <!-- Mehr von diesem Künstler Start -->
  <div id="featured-rightcol">
    <?php
  if( !function_exists('listposts') )
  {
    function listposts( $headline, $category, $count )
    {
      global $post;
      $post_old = $post;
 
      $posts = get_posts('category='.$category.'&numberposts='.$count.'&offset=0');
 
      if( count($posts)>0 ) :
        echo $headline;
      endif;
 
      if( count($posts)>0 ) :
        echo "<ul class=\"bullets\">";
      endif;
 
      foreach( $posts as $post ) :
        echo "<li>";
        echo "<a href='" . get_permalink() . "'>";
        the_title();
        echo "</a>";
        echo "</li>";
      endforeach;
 
      if( count($posts)>0 ) :
        echo "</ul>";
      endif;
 
      $post = $post_old;
    }
  }
?>
    <?php
  listposts( 
    "<h3>Mehr von diesem K&uuml;nstler</h3>", // Titel der Auflistung mit <h3> Formatierung
    9, // ID der Kategorie
    5 // Anzahl der anzuzeigenden Beiträge
  ); 
?>
  </div>
  <!-- Mehr von diesem Künstler Ende -->
  
</div>
<div id="featured-content">
  <div class="featured_post" id="post-<?php the_ID(); ?>">
    <h2>
      <?php the_title(); ?>
    </h2>
    <div class="entry">
      <?php the_content("<p class=\"serif\">" . __('Read the rest of this page', 'branfordmagazine') ." &raquo;</p>"); ?>
      <?php wp_link_pages("<p><strong>" . __('Pages', 'branfordmagazine') . ":</strong>", '</p>', __('number','branfordmagazine')); ?>
    </div>
  </div>
  <?php endwhile; endif; ?>
  <?php edit_post_link('Edit', '<p>', '</p>'); ?>
</div>
<div id="featured-sidebar">
  <?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Artist 1') ) : ?>
  <?php endif; ?>
</div>
<?php get_footer(); ?>
