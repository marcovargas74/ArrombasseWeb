<!-- begin r_sidebar -->

<div id="r_sidebar">

	<ul id="r_sidebarwidgeted">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
	
	<li id="Search">
	<form method="get" id="search_form" action="<?php bloginfo('home'); ?>/">
	<input type="text" class="search_input" value="To search, type and hit enter" name="s" id="s" onfocus="if (this.value == 'To search, type and hit enter') {this.value = '';}" onblur="if (this.value == '') {this.value = 'To search, type and hit enter';}" />
	<input type="hidden" id="searchsubmit" value="Search" /></form><br />
	</li>

	<li id="About">
	<h2>About</h2>
		<p>This is an area on your website where you can add text.  This will serve as an informative location on your website, where you can talk about your site.</p>
	</li>
	
	<li id="Blogroll">
	<h2>Blogroll</h2>
		<ul>
			<?php get_links(-1, '<li>', '</li>', ' - '); ?>
		</ul>
	</li>
		
	<?php endif; ?>
	</ul>
			
</div>

<!-- end r_sidebar -->