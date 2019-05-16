<div class="sidebar">
	<ul>
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : // begin primary sidebar widgets ?>
		
			<li><h2>Categories</h2>

			<ul>

				<?php wp_list_categories('orderby=name&title_li='); ?> 

			</ul>
</li>
			<li><h2>Archives</h2>

			<ul>

				<?php wp_get_archives('type=monthly&limit=12'); ?>
		
			</ul>
	</li>
			<li><h2>Blogroll</h2>
		
			<ul>
		
				<?php wp_list_bookmarks('title_before=<h2>&title_after=</h2>') ?>
		
			</ul>
</li>
			<li><h2>Meta</h2>
		
			<ul>
		
				<?php wp_register() ?>
				<li><?php wp_loginout() ?></li>
				<?php wp_meta() ?>
		
			</ul>
</li>
		<?php endif; ?>
</ul>
</div>