<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
	
	<div class="post">

		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

		<div class="entry">
	
			<?php the_content('Continue reading...'); ?> 
					
		</div>

		<div class="post-data">

			<a href="<?php the_permalink() ?>">Continue reading &#187;</a> &#183; Written on: <?php the_time('m-d-y') ?> &#183; <?php comments_number('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', '&#183; ', ''); ?> 
		
		</div>

	</div>
	
<?php endwhile; ?>

<div class="comments-template">

<?php comments_template(); ?>

</div>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
