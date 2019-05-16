<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include(TEMPLATEPATH."/options.php");?>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php if (is_single() || is_home() || is_page() || is_archive()) { ?><?php bloginfo('name'); ?> <?php } ?><?php wp_title('&minus;',true); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />

	<?php if ($pocket_style) { // Check Colour Scheme Options ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/<?php echo $pocket_style; ?>" type="text/css" media="screen" />
	<?php }
	else { ?>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<?php } ?>
	
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>

<?php wp_head(); ?>
</head>
<body>

<!-- start wrapper --> <div id="wrapper">
<!-- start content --> <div class="content">
<!-- start menu --><div id="menu">
								<ul><li><a href="<?php bloginfo('url'); ?>">Home</a></li>
								<?php wp_list_pages('title_li=&depth=1&sort_column=menu_order'); ?>
								</ul> 

<div class="feed">
					<? if ($pocket_feed_burner) {  // Check for FeedBurner URL in Options ?>
					<a href="<? echo $pocket_feed_burner; // Display FeedBurner URL if used ?>">&nbsp;</a>
					<? } else { ?>
					<a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe (RSS)">&nbsp;</a>
					<? } ?>
</div></div><!-- end menu -->

<!-- start blog title --><div id="blog_title"><h1 class="blog_title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1></div><!-- end blog title -->

<!-- start about section -->
			<?php if ($pocket_header) { // Check Header Options?>
			<div id="about" style="background:url(<?php bloginfo('template_url'); ?>/images/headers/<?php echo $pocket_header; ?>) no-repeat;">
			<?php } ?>
	
	
					<? if ($pocket_about_message) {  // Check for About Message in Options ?>
					<? print stripslashes($pocket_about_message); // Display About Message if used ?>
					<? } else { ?>
					<p>PocketT is a free WordPress theme provided by <a href="http://www.nyssajbrown.net/" title="Nyssa Brown Design">Nyssa Brown Design</a>. Its sole purpose is to be compact and focus on what's important in a blog: the content, while still maintaining an interesting yet simple design.</p>
					<p>This is where you would explain what your blog is about, or about yourself. Whatever suits you. Of course, you're restricted to the amount you can put here, be sure to keep an eye on what the amount is and how it looks... so go on... tease people... you know you want to.. ;]</p>
					<? } ?>
</div><!-- end about section -->

