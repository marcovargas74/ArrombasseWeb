<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>

<?php if (is_home()) { ?>

<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>

<?php } else if (is_category()) { ?>

<?php bloginfo('name'); ?> - <?php wp_title(''); ?>

<?php } else if (is_single() || is_page()) { ?>

<?php bloginfo('name'); ?> - <?php wp_title(''); ?>

<?php } else if (is_archive()) { ?>

<?php bloginfo('name'); ?> -

<?php  if (is_day()) { ?>
Archive for <?php the_time('F jS Y'); ?>
<?php  } elseif (is_month()) { ?>
Archive for <?php the_time('F Y'); ?>
<?php  } elseif (is_year()) { ?>
Archive for <?php the_time('Y'); ?>
<?php } ?>

<?php } ?>

</title>

<meta name="keywords" content="" />
<meta name="copyright" content="" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" href="<?php bloginfo('stylesheet_directory');?>/favicon.ico" type="images/x-icon" />

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

<?php wp_get_archives('type=monthly&format=link'); ?>
<?php wp_head(); ?>

</head>

<body>
<div id="wrapper">
<div id="container">
<div id="header">
<div id="site-title">
<h1><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a></h1>
<p><?php bloginfo('description'); ?></p>
</div>

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

</div>

<div id="navigation">
<ul class="pg">
<li id="<?php if (is_home()) { ?>home<?php } else { ?>page_item<?php } ?>"><a href="<?php bloginfo('url'); ?>" title="Home">Home</a></li><?php wp_list_pages('title_li=&depth=1'); ?>
</ul>
</div>

<div id="content">
<div id="top-content">

<div id="top-ads">
<script type="text/javascript">
google_ad_client = "<?php include (TEMPLATEPATH . '/adsense.php'); ?>"; 
google_ad_width = 728;
google_ad_height = 15;
google_ad_format = "728x15_0ads_al_s";
google_ad_type = "text_image";
google_ad_channel = "";
google_color_border = "ffffff";
google_color_bg = "ffffff";
google_color_link = "292929";
google_color_text = "292929";
google_color_url = "282828";
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
