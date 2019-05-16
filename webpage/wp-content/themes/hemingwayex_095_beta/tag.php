<?php
/*
Template Name: Single Tag Page
Author: Nalin Makar
Info: Use with UTW 3.x
*/
?>
<?php get_header(); ?>

	<div id="primary" class="single-post">
		<div class="inside">
			<h1>Tag: <?php UTW_ShowCurrentTagSet('tagsetcommalist') ?></h1>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="primary">
				<h1><?php the_title(); ?></h1>
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
			</div>
			<hr class="hide" />
			<div class="secondary">
				<h3>About this entry</h3>
				<div class="featured">
					<dl>
						<dt>Published:</dt>
						<dd><?php the_time('d M Y') ?> / <?php the_time('h:i A') ?></dd>
					</dl>
					<dl>
						<dt>Category:</dt>
						<dd><?php the_category(', ') ?></dd>
					</dl>
					<dl>
						<dt>Tags:</dt>
						<dd><?php UTW_ShowTagsForCurrentPost("commalist", array('last'=>' and %taglink%', 'first'=>'tagged %taglink%',)) ?></dd>
					</dl>
					<dl>
						<dt>Comments:</dt>
						<dd><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></dd>
					</dl>
				</div>
			</div>
			<div class="clear"></div>
			<div class="divider"></div><br />
			<?php endwhile; ?>

			<?php else : ?>

				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>

			<?php endif; ?>
		</div>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
