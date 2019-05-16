<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
	
	<div class="post">

		<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

		<div class="entry">
	
			<?php the_content('Continue reading...'); ?> 
					
		</div>

		<div class="post-data">

			<a href="<?php the_permalink() ?>">Continue reading &#187;</a> &#183; Rating: <?php if(function_exists('the_ratings')) { the_ratings(); } ?> &#183; Written on: <?php the_time('m-d-y') ?> &#183; <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> 		
		
		</div>

	</div>
	
<?php endwhile; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
