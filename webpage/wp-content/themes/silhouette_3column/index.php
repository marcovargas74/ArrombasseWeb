<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<?php the_content(__('Read more'));?><div style="clear:both;"></div>
	 	
		<div class="postinfo">
			<?php the_time('F j, Y'); ?> | Filed Under <?php the_category(', ') ?>&nbsp;<?php edit_post_link('(Edit)', '', ''); ?>
		</div>
			
		<!--
		<?php trackback_rdf(); ?>
		-->
		
		<h3>Comments</h3>
		<?php comments_template(); // Get wp-comments.php template ?>
		
		<?php endwhile; else: ?>
		
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
		<?php posts_nav_link(' &#8212; ', __('&laquo; go back'), __('keep looking &raquo;')); ?>
	
	</div>
	
<?php include(TEMPLATEPATH."/l_sidebar.php");?>

<?php include(TEMPLATEPATH."/r_sidebar.php");?>

</div>

<!-- The main column ends  -->

<?php get_footer(); ?>