<?php get_header(); ?>
<div id="left">
<div id="content" class="narrowcolumn">
  <?php if (have_posts()) : ?>
  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
  <?php /* If this is a category archive */ if (is_category()) { ?>
  <h3 class="pagetitle"><i>Archiv for &#8216;<?php echo single_cat_title(); ?>&#8217;</i></h3>
  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
  <h3 class="pagetitle"><i>Archiv for
    <?php the_time('F jS, Y'); ?>
  </i></h3>
  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
  <h3 class="pagetitle"><i>Archiv for
    <?php the_time('F, Y'); ?></i>
  </h3>
  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
  <h3 class="pagetitle"><i>Archiv for
    <?php the_time('Y'); ?></i>
  </h3>
  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
  <h3 class="pagetitle"><i>Autor Archiv</i></h3>
  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h3 class="pagetitle"><i>Blog Archiv</i></h3>
    <?php } ?>
  <div class="navigation">
    <div class="alignleft">
      <?php next_posts_link('&larr; next') ?>
    </div>
    <div class="alignright">
      <?php previous_posts_link('previous &rarr;') ?>
    </div>
  </div>
  <br class="clear" />
  <?php while (have_posts()) : the_post(); ?>
  <div class="post">
  <h3 class="timr"><i>published:</i>
      <?php the_time('F jS, Y') ?>
      </h3>
    <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
      <?php the_title(); ?>
      </a></h2>
    <p class="postmetadata">
      <!-- by <?php the_author() ?> -->
	  Category
      <span class="catr">
      <?php the_category(', ') ?>
      </span> |
      <?php edit_post_link('Edit', '<span class="editr">', ' | </span>'); ?>
      <span class="commr">
      <?php comments_popup_link('no comments &#187;', '1 comment &#187;', '% comments &#187;'); ?>
      </span></p>
    <div class="entry">
      <?php the_content() ?>
    </div>
  </div>
  <?php endwhile; ?>
  <div class="navigation">
    <div class="alignleft">
      <?php next_posts_link('&laquo; next') ?>
    </div>
    <div class="alignright">
      <?php previous_posts_link('previous &raquo;') ?>
    </div>
  </div>
  <?php else : ?>
  <h2 class="center"><i>There is nothing.</i></h2>
  <?php include (TEMPLATEPATH . '/searchform.php'); ?>
  <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
