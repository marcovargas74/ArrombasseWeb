<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
	
	<div class="post">

		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

		<div class="pages">
	
			<?php the_content(''); ?> 
				
			<h3>Archives by Category</h3>
				
				<ul>
				
					<?php wp_list_categories('title_li=&sort_column=name&optioncount=1&feed=RSS') ?> 
					
				</ul>

			<h3>Archives by Month</h3>
			
				<ul>
				
					<?php wp_get_archives('type=monthly&show_post_count=1') ?>
					
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