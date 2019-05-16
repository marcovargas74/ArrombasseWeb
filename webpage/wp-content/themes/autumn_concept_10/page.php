<?php get_header(); ?>
<div id="content">
<div class="box01">
<div class="left">

  <div class="cols02">
    <div class="entry">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h2 class="pageH2"><?php the_title(); ?></h2>
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
    			<?php wp_link_pages(array('before' => '<p class="pageNav2"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		<?php endwhile; endif; ?>
		</div>
		</div>

		<?php get_sidebar(); ?>
        <?php include("related.php"); ?>
		<?php get_footer(); ?>
