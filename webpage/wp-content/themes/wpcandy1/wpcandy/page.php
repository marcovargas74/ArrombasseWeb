<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
	
	<div class="post">

		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

		<div class="pages">
	
			<?php the_content(); ?> 
			
			<?php edit_post_link('Edit', '<p>', '</p>'); ?>
					
		</div>
	
	</div>
	
<?php endwhile; ?>

<div class="comments-template">

<?php comments_template(); ?>

</div>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
