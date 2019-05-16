<?php get_header(); ?>
<div id="primary">

	<?php if (have_posts()) : ?>

		<h1 class="search_title">Search Results</h1>
		<?php while (have_posts()) : the_post(); ?>
		<br />		
			<div class="post">
				<h2 id="post-<?php the_ID(); ?>" class="article_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				
				<div class="entry">
					<?php the_excerpt() ?>
				</div>
		
				<div class="postmetadata"><?php the_time('F jS, Y') ?> in <?php the_category(', ') ?> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <?php comments_popup_link('No comments', '1 comment', '% comments'); ?></div>
	</div>
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries') ?></div>
		</div>
	
	<?php else : ?>

		<h2 class="search_title">Not Found</h2>
		<div class="entry"><p>Sorry but what you were looking for cannot be found. Try searching again.</p></div>

	<?php endif; ?>
		
	</div>
<?php get_footer(); ?>