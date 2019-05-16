<h2>Asides</h2>
<?php $category_id = $hemingwayEx->get_asides_category_id();
if ( is_null($category_id) ) { ?> 
	<p>This block works only if a valid Asides category has been set in the HemingwayEx's options.</p>
<?php } else { ?>
	<ul class="dates">
	<?php
		// I love Wordpress so
		$my_query = new WP_Query('showposts=5&cat=' . $category_id);
	?>
	<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<li>
		<span class="date"><?php the_time( $hemingwayEx->date_format() ) ?></span> 
		<span class="date"><?php the_title() ?></span> 
		<div class="aside-content"><?php the_content('<p class="serif">more &raquo;</p>'); ?></div>
	</li>
	<?php endwhile; endif; ?>
</ul>
<?php } ?>

