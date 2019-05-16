<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php
	global $hemingwayEx;
	if ($hemingwayEx->style != 'none') :
?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/styles/<?php echo $hemingwayEx->style ?>" type="text/css" media="screen" />

<?php endif; ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php $hem_js_loc = get_settings('siteurl') . '/wp-content/themes/' . get_template() . '/admin/js/'; ?>
<script type="text/javascript" src="<?php echo $hem_js_loc; ?>prototype.js"></script>
<script type="text/javascript" src="<?php echo $hem_js_loc; ?>effects.js"></script>
<script type="text/javascript" src="<?php echo $hem_js_loc; ?>behaviour.js"></script>
<script type="text/javascript" src="<?php echo $hem_js_loc; ?>slide.js"></script>

<?php wp_head(); ?>
</head>
<body>
		
	<div id="header">
		<div class="inside">
			<div id="search">
				<form method="get" id="sform" action="<?php bloginfo('home'); ?>/">
 					<div class="searchimg"></div>
					<input type="text" id="q" value="<?php echo wp_specialchars($s, 1); ?>" name="s" size="15" />
				</form>
			</div>
			
			<h2><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h2>
			<p class="description"><?php bloginfo('description'); ?></p>
		</div>
	</div>
	<!-- [END] #header -->
	
	<div id="navigation">
		<div class="inside">
			<ul class="left">
				<li <?php if(is_home()) { echo 'class="current_page_item"';} ?>><a href="<?php bloginfo('siteurl'); ?>">Home</a></li>
				<?php wp_list_pages('title_li=&depth=1'); ?>
			</ul>
			<div class="right" id="silderButton">
				<a class="nav" id="openSlidebar" href="javascript:void(0);" title="Show navigation">Open Navigation</a> 
				<a class="nav" id="closeSlidebar" href="javascript:void(0);" title="Hide navigation" style="display:none;">Close navigation</a>
			</div>
		</div>
	</div>
	<!-- [END] #menu -->
	
	<div class="clear" >&nbsp;</div>
	<?php include (TEMPLATEPATH . '/dynamic_slidebar.php'); ?>