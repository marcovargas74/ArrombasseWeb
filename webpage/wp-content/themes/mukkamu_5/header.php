<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<meta name="distribution" content="global" />

<meta name="robots" content="follow, all" />

<meta name="language" content="it, en" />

<title>

<?php bloginfo('name'); ?>

<?php wp_title(); ?>

</title>

<meta name="description" content="Strumenti e risorse per le nuove forme di comunicazione" />
<meta name="keywords" content="blog, news, web 2.0, risorse, crasy worls, società, musica, costume, film, cinema, archeologia, internet, blogroll, rss, wordpress, themes, css, ricette, cazzate, varie, immagini, teatro, scoop, temi, mondo pazzo, solidarietà, radio, di tutto di più"/>


<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

<!-- leave this for stats please -->

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />

<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_get_archives('type=monthly&format=link'); ?>

<?php wp_head(); ?>

<style type="text/css" media="screen">

		<!-- @import url( <?php bloginfo('stylesheet_url'); ?> ); -->

</style>

</head>

<body>

<div id="pages">    

<h1><a href="<?php bloginfo('siteurl'); ?>"><span style="color:#cccccc"><?php bloginfo('name'); ?> </span></a></h1>

<ul>

      <?php wp_list_pages('depth=1&title_li=' ); ?>

    </ul>

</div>

<div id="wrap">

<div id="logo">

</div>

	<div id="tagline"><?php bloginfo('description'); ?></div>

