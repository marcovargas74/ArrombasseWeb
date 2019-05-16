<?php get_header(); ?>

	<div class="narrowcolumnwrapper"><div class="narrowcolumn">

		<div class="content">

			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">

				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

				<div class="postinfo">
<?php _e('Posted on'); ?> <span class="postdate"><?php the_time('F jS, Y') ?></span> <?php _e('by'); ?> <?php the_author() ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
				</div>

				<div class="entry">

					<?php the_excerpt(); ?>

					<p class="postinfo">
<?php _e('Filed under&#58;'); ?> <?php the_category(', ') ?> &#124; <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
					</p>

					<!-- 
					<?php trackback_rdf(); ?>
					 -->
				</div>
			</div>

<?php endwhile; ?>

<?php include (TEMPLATEPATH . '/browse.php'); ?>

<?php else : ?>

			<div class="post">

				<h2><?php _e('Not Found'); ?></h2>

				<div class="entry">
<p><?php _e('Sorry, but you are looking for something that isn&#39;t here.'); ?></p>
				</div>

			</div>

<?php endif; ?>

		</div><!-- End content -->

	</div></div><!-- End narrowcolumnwrapper and narrowcolumn classes -->

<?php get_footer(); ?>