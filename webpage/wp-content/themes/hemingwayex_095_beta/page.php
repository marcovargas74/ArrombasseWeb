<?php get_header(); ?>

	<div id="primary">
	<div class="inside">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>
	</div>
	
	<hr class="hide" />
	<div id="secondary">
		<div class="inside">
			
			<?php $open_comments = ('open' == $post-> comment_status);
				$num_comments = get_comments_number($post-> id);	
				if ($open_comments || (!$open_comments && $num_comments > 0)) {
				// Comments are open ?>
				<div class="comment-head">
					<h2><?php comments_number('No comments','1 Comment','% Comments'); ?></h2>
					<span class="details"><?php if($open_comments) { ?><a href="#comment-form">Jump to comment form</a><?php } else { ?>Comments are closed<?php }?> | <?php comments_rss_link('comments rss'); ?> <a href="#what-is-comment-rss" class="help">[?]</a> <?php if ('open' == $post->ping_status): ?>| <a href="<?php trackback_url(true); ?>">trackback uri</a> <a href="#what-is-trackback" class="help">[?]</a><?php endif; ?></span>
				</div>
				
				<?php comments_template(); ?>
			<?php } ?>
			
			<?php endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
		</div>
	</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>