<?php
/*
Template Name: Tags Archive
Author: Nalin Makar
Info: created for use with UTW 3.x
*/
?>
<?php get_header(); ?>

	<div id="primary">
	<div class="inside">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
	  <?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	<h3>Tags Cloud</h3>
	<?php UTW_ShowWeightedTagSetAlphabetical("coloredsizedtagcloudwithcount","",100) ?>
	<h3>Top 30 Tags Vertical Graph</h3>
	<?php UTW_ShowWeightedTagSet("weightedlongtailvertical","",30) ?>
	</div>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>