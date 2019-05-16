<?php get_header(); ?>
<!-- start primary content --><div id="primary">
	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
				<h1 class="article_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
			
				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
			<div class="postmetadata"><?php the_time('F jS, Y') ?> in <?php the_category(', ') ?> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <?php comments_popup_link('No comments', '1 comment', '% comments'); ?></div>
				
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries') ?></div>
		</div>
		
	<?php else : ?>


		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>
<?php get_footer(); ?>
