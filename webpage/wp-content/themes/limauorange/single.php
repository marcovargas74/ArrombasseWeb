<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div class="middle">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
			<p class="postmetadata"><small><?php the_time('F jS, Y') ?> <?php the_author() ?> </small> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php if(function_exists('the_views')) { the_views(); } ?></p>


			<div>
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
<?php if ( function_exists('the_tags') ) { the_tags('<p>Tags: ', ', ', '</p>'); } ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
<br />

				<p>
					<small>
						<span>
						You can follow any responses to this entry through the</span> <?php comments_rss_link('RSS 2.0'); ?> <span>feed.</span>

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							<span>You can </span><a href="#respond">leave a response</a>, <span>or</span> <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> <span>from your own site.</span>

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link('Edit this entry.','',''); ?>

					</span></small>
				</p>

			</div>
			
			
			<!-- AddThis Bookmark Post Button BEGIN -->
<?php echo "<div class=\"addthis\"><a href=\"http://www.addthis.com/bookmark.php?pub=blogohblog&amp;url=".get_permalink()."&amp;title=".get_the_title($id)."\" title=\"Bookmark using any bookmark manager!\" target=\"_blank\"><img src=\"http://s9.addthis.com/button1-bm.gif\" width=\"125\" height=\"16\" border=\"0\" alt=\"AddThis Social Bookmark Button\" /></a></div>"; ?>
<!-- AddThis Bookmark Post Button END -->



		</div>

	<?php comments_template(); ?>
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
