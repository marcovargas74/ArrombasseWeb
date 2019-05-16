<?php get_header(); ?>

<div id="left">
<div id="content">
          
          
  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
  <div class="post-header">
  <h3 class="timr">
      <?php the_time('F jS, Y') ?>
    </h3>
    <h2><i><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
      <?php the_title(); ?>
      </a></i></h2>
  <p class="postmetadata">
      <!-- from <?php the_author() ?> -->
      Category
	  <span class="catr">
      <?php the_category(', ') ?>
      </span> :
      <?php edit_post_link('Edit', '<span class="editr">', ' : </span>'); ?>
      <span class="commr">
      <?php comments_popup_link('no comments &#187;', '1 comment &#187;', '% comments &#187;'); ?>
    </span></p>
	</div>
	  <div class="entry">
      <?php the_content('read the rest of this entry... &raquo;'); ?>
    </div>
  </div>
  <div style="clear: both; height: 15px;"></div>
  <?php endwhile; ?>
  <div class="navigation">
    <div class="alignleft">
      <?php next_posts_link('&larr; next posts') ?>
    </div>
    <div class="alignright">
      <?php previous_posts_link('previous posts &rarr;') ?>
    </div>
  </div>
  <?php else : ?>
  <h2 class="center">Not found</h2>
  <p class="center">There is nothing.</p>
  <?php include (TEMPLATEPATH . "/searchform.php"); ?>
  <?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
