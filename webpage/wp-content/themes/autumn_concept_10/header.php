<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> <?php } ?> <?php wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rev="Ed Merritt" href="http://www.edmerritt.com/" title="Ed Merritt is a web designer." />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts/resizeboxes.js" ></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/print.css" type="text/css" media="print" />
<!--[if gt IE 6]>
<link href="<?php bloginfo('stylesheet_directory'); ?>/ie7.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<!--[if lt IE 7]>    
<link href="<?php bloginfo('stylesheet_directory'); ?>/ie6.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<?php wp_head(); ?>
</head>
<body>
<div id="container">
  <div id="topbar">
    <div class="box01">
      <div class="left">
        <div class="cols01 right">
		<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
		  <div>
		    <input type="text" value="Looking for something?" name="s" id="s" class="field" />
            <input type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/button_search.png" id="searchsubmit" value="Search" />
		  </div>
		</form>
        </div>
        <div class="cols01">
          <p><?php wp_register('', '&nbsp;|&nbsp;'); ?><?php wp_loginout(); ?></p>
        </div>
      </div>
    </div>
  </div>
  <div id="header">
    <div class="box01">
      <div class="left">
        <div class="cols03">
          <h1 id="logo"><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a></h1>
          <p id="strapline" class="textbkg"><span><?php bloginfo('description'); ?></span></p>
        </div>
        <div id="mainpic">
          <div id="mainpicinner">
          </div>
        </div>
        <div class="cols03">
          <ul id="nav">
            <li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
	        <?php wp_list_pages('title_li='); ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
