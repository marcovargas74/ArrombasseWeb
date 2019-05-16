<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php wp_head(); ?>

</head>
<body>
<div align="center"><br class="break" /> 
    <!-- Code is very pretty literature. -->
<img src="<?php bloginfo('template_directory'); ?>/images/header.jpg" alt="Marcel Winatschek's Tokyopunk" width="350" height="348" /></div>
<div id="post" align="center"><img src="<?php bloginfo('template_directory'); ?>/images/spacer.gif" width="1" height="10" alt="" /></div>
<div align="center">
    <a href="#">blog</a> | <a href="#">about me </a> | <a href="#">photos</a> | <a href="#">favourites</a> | <a href="#">links</a> | <a href="#">email</a> | <a href="#">info</a></div>
