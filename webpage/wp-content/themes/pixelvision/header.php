<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<?php 
echo '	<title>';
if ( is_home() ) {
	// Blog's Home
	echo get_bloginfo('name') . ''; 
} elseif ( is_single() or is_page() ) {
	// Single blog post or page
	wp_title(''); echo ' - ' . get_bloginfo('name');
} elseif ( is_category() ) {
	// Archive: Category
	echo get_bloginfo('name') . ' &raquo; Kategorie: '; single_cat_title();
} elseif ( is_day() ) {
	// Archive: By day
	echo get_bloginfo('name') . ' &raquo; Alle Weblogartikel vom ' . get_the_time('d') . '. ' . get_the_time('F') . ' ' . get_the_time('Y');
} elseif ( is_month() ) {
	// Archive: By month
	echo get_bloginfo('name') . ' &raquo; Alle Weblogartikel vom ' . get_the_time('F') . ' ' . get_the_time('Y');
} elseif ( is_year() ) {
	// Archive: By year
	echo get_bloginfo('name') . ' &raquo; Alle Weblogartikel vom Jahr ' . get_the_time('Y');
} elseif ( is_search() ) {
	// Search
	echo get_bloginfo('name') . ' &raquo; Suche:  	&lsaquo;' . wp_specialchars($s, 1) . '&rsaquo;';
} elseif ( is_404() ) {
	// 404
	echo get_bloginfo('name') . '  &raquo; 404 - Angeforderte Seite nicht gefunden';
} else {
	// Everything else. Fallback
	bloginfo('name'); wp_title();
}
echo '</title>';
?>
<?php if (is_archive() || is_search() || ($paged > 1)) { ?>
	<meta name="robots" content="noindex,follow"/>
<? } ?>


<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body>
<div id="top">
<div id="pager">
  <div id="headr">
    <h4><i><a href="<?php echo get_option('home'); ?>/">
      <?php bloginfo('name'); ?>
      </a></i></h4>
    
    </div>
  </div>
  <div class="ads726"> </div>
</div>
<div id="nav">
			 <ul>
              		<li class="page_item"><a href="<?php bloginfo('url'); ?>">Home</a></li>

	<?php wp_list_pages('depth=1&title_li='); ?>
	
                </ul>
	
</div>
<hr />
<div id="page">