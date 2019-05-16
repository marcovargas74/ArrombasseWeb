<h2>About</h2>
<div class="divider"></div>
<?php $my_query = new WP_Query('pagename=about'); ?>
<?php if ($my_query->have_posts()) { ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
<?php the_content(); ?>
<br />
<?php endwhile; ?>
<?php } else { ?>
<div class="divider"></div>
<p>This block requires you to write a Page titled 'About'. It seems you don't have such a page setup yet.</p>
<br />
<?php } ?>
