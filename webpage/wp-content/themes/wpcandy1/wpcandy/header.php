<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
		
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scrollovers.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />	

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>

</head>

<body>

<div id="mastercontainer">

	<div class="header">

		<div class="header-container">

			<h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>

			<ul class="nav">
			
			<!-- Change these navigation links to fit your navigation-->
			
				<li><a href="<?php bloginfo('home'); ?>" class="scrollover" type="scrollover">home</a></li>
				<li><a href="<?php bloginfo('home'); ?>/about/" class="scrollover" type="scrollover">about</a></li>
				<li><a href="<?php bloginfo('home'); ?>/archives/" class="scrollover" type="scrollover">archives</a></li
				<li><a href="<?php bloginfo('home'); ?>/links/" class="scrollover" type="scrollover">links</a></li>
				<li><a href="<?php bloginfo('home'); ?>/contact/" class="scrollover" type="scrollover">contact</a></li>
				<li><a href="<?php bloginfo('rss2_url'); ?>" class="scrollover" type="scrollover">rss</a></li>
         
			</ul>
			
			<div class="box">

				<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
				<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="search" />
				<input type="submit" id="searchsubmit" value="go" class="searchbutton" />
				</form>

			</div>
			
		</div>



	</div>
	<div class="clear" id="top-of-page"></div>
	<div class="container">

		<div class="main-content">