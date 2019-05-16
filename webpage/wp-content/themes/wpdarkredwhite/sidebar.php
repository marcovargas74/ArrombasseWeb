<div id="sidebar">

<ul>

<!-- widgets in the sidebar -->
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>
		
		
<h2>Search</h2>
<ul>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</ul>

<!-- list of categories, -->
<?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>

<!--static pages with automatic headline 'pages'-->
<?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>


<!--archives ordered per month-->
<li><h2>Archives</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
</li>


<li><h2>Meta</h2>
	<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
		<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
		<?php wp_meta(); ?>
	</ul>
</li>

<?php endif; ?>

</ul>

</div>

