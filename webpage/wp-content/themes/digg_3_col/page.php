<?php get_header(); ?>

	<div class="wrapper"><!-- This wrapper class appears only on Page and Single Post pages. -->
	<div class="narrowcolumnwrapper"><div class="narrowcolumn">

		<div class="content">

			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">

				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

				<div class="entry">

					<?php the_content(); ?>
					<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
					<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

					<!-- 
					<?php trackback_rdf(); ?>
					 -->

				</div>
			</div>

<?php endwhile; else : ?>

			<div class="post">

				<h2><?php _e('Not Found'); ?></h2>

				<div class="entry">
<p><?php _e('Sorry, but you are looking for something that isn&#39;t here.'); ?></p>
				</div>

			</div>

<?php endif; ?>

		</div><!-- End content -->

	</div></div><!-- End narrowcolumnwrapper and narrowcolumn classes -->

<!-- Start Comments Template -->

	<div class="narrowcolumnwrapper"><div class="narrowcolumn">

		<div class="content">

			<div class="post">

<?php comments_template(); ?>

			</div>

		</div><!-- End content for comments template -->

	</div></div><!-- End narrowcolumnwrapper and narrowcolumn classes for comments template -->
	</div><!-- End wrapper class -->

<?php get_footer(); ?>