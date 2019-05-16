<?php get_header(); ?>
<div id="content">
<div class="box01">
<div class="left">

  <div class="cols02">
    <div class="entry">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <p class="date"><span class="dateDay">
      <?php the_time('j') ?>
      </span><span class="dateMonth">
      <?php the_time('F') ?>
      </span><span class="dateYear">
      <?php the_time('Y') ?>
      </span></p>
    <h2>
      <?php the_title(); ?>
    </h2>
    <p class="textbkg"><span>Posted by
      <?php the_author() ?>
      under:
      <?php the_category('; ') ?>
      .</span></p>
    <?php the_content(''); ?>
    <?php wp_link_pages(array('before' => '<p class="pageNav2"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    <?php comments_template(); ?>
    <?php endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
    <?php endif; ?>
  </div>
  </div>
  
		<?php get_sidebar(); ?>
        <?php include("related.php"); ?>
		<?php get_footer(); ?>
