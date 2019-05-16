<?php get_header(); ?>
<!-- start primary content --><div id="primary">

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h1 class="archive_title">Archive for the '<?php echo single_cat_title(); ?>' Category</h1>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="archive_title">Archive for <?php the_time('F jS, Y'); ?></h1>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="archive_title">Archive for <?php the_time('F, Y'); ?></h1>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="archive_title">Archive for <?php the_time('Y'); ?></h1>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h1 class="archive_title">Search Results</h1>
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="archive_title">Author Archive</h1>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="archive_title">Blog Archives</h1>

		<?php } ?>
<br />
		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<h1 id="post-<?php the_ID(); ?>" class="article_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
				
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

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
	</div>


<?php get_footer(); ?>