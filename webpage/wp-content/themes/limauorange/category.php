<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div class="middle">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<p><small><?php the_time('F jS, Y') ?> <?php the_author() ?></small> Posted in <?php the_category(', ') ?> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', '', ' | '); ?> <?php if(function_exists('the_views')) { the_views(); } ?></p>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
	<!-- AddThis Bookmark Post Button BEGIN -->
<?php echo "<div class=\"addthis\"><a href=\"http://www.addthis.com/bookmark.php?pub=blogohblog&amp;url=".get_permalink()."&amp;title=".get_the_title($id)."\" title=\"Bookmark using any bookmark manager!\" target=\"_blank\"><img src=\"http://s9.addthis.com/button1-bm.gif\" width=\"125\" height=\"16\" border=\"0\" alt=\"AddThis Social Bookmark Button\" /></a></div>"; ?>
<!-- AddThis Bookmark Post Button END -->

			</div>
<div class="br"><br /></div>
		<?php endwhile; ?>

		<div>
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
<br />
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
