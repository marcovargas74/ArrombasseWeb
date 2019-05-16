<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
	
	<div class="post">

		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

		<div class="pages">
	
			<?php the_content(''); ?> 
				
			<h3>Links</h3>
				
				<ul>
			
					<?php wp_list_bookmarks('title_before=<h2>&title_after=</h2>') ?>
		
				</ul>

			<?php wp_link_pages(); ?>
			<?php edit_post_link('Edit', '<p>', '</p>'); ?>
					
		</div>
				
			<?php endwhile; ?>

			<div class="comments-template">
			
				<?php comments_template(); ?>
				
			</div>

		</div>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>