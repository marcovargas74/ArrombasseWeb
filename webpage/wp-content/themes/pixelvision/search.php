<?php get_header(); ?>
<div id="left">
<div id="content" class="narrowcolumn">
  <?php if (have_posts()) : ?>
  <h1 class="pagetitle">Search-Results</h1>
  <div class="navigation">
    <div class="alignleft">
      <?php next_posts_link('&larr; next posts') ?>
    </div>
    <div class="alignright">
      <?php previous_posts_link(' previous posts &rarr;') ?>
    </div>
    <br class="clear" />
  </div>
  <?php while (have_posts()) : the_post(); ?>
  <div class="post">
  <h3 class="timr"><?php the_time('F jS, Y') ?>
      </h3>
    <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="permanent link to <?php the_title(); ?>">
      <?php the_title(); ?>
      </a></h2>
    <p class="postmetadata">
      <!-- by <?php the_author() ?> -->
	  Kategorie
      <span class="catr">
      <?php the_category(', ') ?>
      </span> |
      <?php edit_post_link('Edit', '<span class="editr">', ' : </span>'); ?>
      <span class="commr">
      <?php comments_popup_link('no comment &#187;', '1 comment &#187;', '% comments &#187;'); ?>
      </span></p>
    <?php the_content('<p class="serif">read the rest &raquo;</p>'); ?>
    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
  </div>
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
  <p class="center">Not found. Try a new search?</p>
  <?php include (TEMPLATEPATH . '/searchform.php'); ?>
  <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
