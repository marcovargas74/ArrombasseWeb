<?php get_header(); ?>
<div id="left">
<div id="content" class="widecolumn">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="navigation">
    <div class="alignleft">
      <?php previous_post_link('&larr; %link') ?>
    </div>
    <div class="alignright">
      <?php next_post_link('%link &rarr;') ?>
    </div>
  </div>
  <br class="clear" />
  <div class="post" id="post-<?php the_ID(); ?>">
    <h1><i>
      <?php the_title(); ?>
      </i></h1>
    <p class="postmetadata"><span class="timr">
      <?php the_time('F jS, Y') ?>
      </span>
      <!-- von <?php the_author() ?> -->
	  in
      <span class="catr">
      <?php the_category(', ') ?>
      </span> |
      <?php edit_post_link('Edit', '<span class="editr">', ' | </span>'); ?>
      <span class="commr">
      <?php comments_popup_link('no comments &#187;', '1 comment &#187;', '% comments &#187;'); ?>
      </span></p>
    <div class="entry">
      <?php the_content('<p class="serif">read the rest of this entry &raquo;</p>'); ?>
      <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    </div>
  </div>
  <div style="clear:both;"></div>
  <?php comments_template(); ?>
  <?php endwhile; else: ?>
  <p>Sorry, but no posts are relevant.</p>
  <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
