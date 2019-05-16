<h2>Recently</h2>
<ul class="dates">
	<?php
		$query_str = 'showposts=10';  
		$my_query = new WP_Query(is_home() ? $query_str . '&offset=2' : $query_str);
	?>
	<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
	<li><a href="<?php the_permalink() ?>"><span class="date"><?php the_time( $hemingwayEx->date_format() ) ?></span> <?php the_title() ?> </a></li>
	<?php endwhile; endif; ?>
</ul>
