<div id="sidebar">

<div class="rssbox">
<a href="<?php bloginfo('rss2_url'); ?>">Subscribes via readers feeds</a> <br />
<a href="<?php bloginfo('rss2_url'); ?>">Subscribes via email feeds</a>
<a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/fd.gif" alt="feeds" /></a>           </div>

<div class="sidebox">
<h3>Sponsors</h3>
<p>
<script type="text/javascript">
google_ad_client = "<?php include (TEMPLATEPATH . '/adsense.php'); ?>";
google_ad_width = 250;
google_ad_height = 250;
google_ad_format = "250x250_as";
google_ad_type = "text_image";
google_ad_channel = "";
google_color_border = "792020";
google_color_bg = "792020";
google_color_link = "FFFFCC";
google_color_text = "f9f9f9";
google_color_url = "f9f9f9";
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</p>
</div>

<div class="sidebox">
<h3>About</h3>
<p>CSS gives Web designers control over the appearance of their web sites by separating the visual <a href="#">presentation</a> from the content. It lets them easily make minor changes to a site or perform a complete overhaul of the design. In CSS Site Design instructor and leading industry expert Eric Meyer reviews the essentials of CSS, including selectors</p>
</div>

<div class="sidebox">
<h3>Advertisments</h3>
<p>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/ads.gif" alt="ads" /></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/ads.gif" alt="ads" /></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/ads.gif" alt="ads" /></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/ads.gif" alt="ads" /></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/ads.gif" alt="ads" /></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/ads.gif" alt="ads" /></a>
</p>
</div>


<div class="sidebox">
<h3>Featured Articles</h3>
<?php $my_query = new WP_Query('category_name=&showposts=3');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID; ?>

<div class="post-gfest">
<?php $values = get_post_custom_values("featured-images");
if ( is_array($values)) : ?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php echo "$values[0]"; ?>" alt="<?php the_title(); ?>" /></a>
<?php endif; ?>
<h1><?php the_title(); ?></h1>
<?php the_excerpt_featured(); ?>
</div>

<?php endwhile;?>


</div>

<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar(1) ) : ?>


<?php if(function_exists("wp_theme_switcher")) : ?>
<div class="sidebox">
<h3><?php _e('Themes'); ?></h3>
<?php wp_theme_switcher('dropdown'); ?>
</div>
<?php endif; ?>


<div class="sidebox">
<h3><?php _e('Recent Entries'); ?></h3>
<ul class="list">
<?php get_archives('postbypost', 10); ?>
</ul>
</div>


<div class="sidebox">
<h3><?php _e('Categories'); ?></h3>
<ul class="list">
<?php wp_list_categories('orderby=id&show_count=0&use_desc_for_title=0&title_li='); ?>
</ul>
</div>


<div class="sidebox">
<h3><?php _e('Archives'); ?></h3>
<ul class="list">
<?php wp_get_archives('type=monthly&limit=12&show_post_count=0'); ?>
</ul>
</div>


<div class="sidebox">
<h3><?php _e('Pages'); ?></h3>
<ul class="list">
<?php wp_list_pages('title_li=&depth=0'); ?>
</ul>
</div>

<div class="sidebox">
<h3><?php _e('Links'); ?></h3>
<ul class="list">
<?php get_links(-1, '<li>', '</li>', ' - '); ?>
</ul>
</div>

<div class="sidebox">
<h3><?php _e('Recent Comments'); ?></h3>
<ul class="list">
<?php mw_recent_comments(10, false, 35, 15, 35, 'all', '<li><a href="%permalink%" title="%title%"><strong>%author_name%</strong></a> in %title%</li>','d.m.y, H:i'); ?>
</ul>
</div>

<div class="sidebox">
<?php if(function_exists("akpc_most_popular")) : ?>
<h3><?php _e('Most Popular'); ?></h3>
<ul class="list">
<?php akpc_most_popular(); ?>
</ul>
<?php else: ?>
<h3><?php _e('Most Popular'); ?></h3>
<ul class="list">
<li>you have to install alex king most popular plugin here</li>
</ul>
<?php endif; ?>
</div>



<div class="sidebox">
<h3><?php _e('Tags Cloud'); ?></h3>
<ul class="nolist">
<li>
<?php if(function_exists("UTW_ShowTagsForCurrentPost")){  ?>
<?php UTW_ShowWeightedTagSetAlphabetical("sizedtagcloud","","70"); ?>
<?php } elseif(function_exists("wp_tag_cloud")) { ?>
<?php wp_tag_cloud('smallest=10&largest=20&'); ?>
<?php } else { ?>
<?php wp_list_categories('orderby=id&show_count=0&use_desc_for_title=0&title_li='); ?>
<?php } ?>
</li>
</ul>
</div>


<div class="sidebox">
<h3><?php _e('Most Commented'); ?></h3>
<ul class="list">
<?php get_hottopics(); ?>
</ul>
</div>


<div class="sidebox">
<h3><?php _e('Meta'); ?></h3>
<ul class="list">
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid XHTML</a></li>
<li><a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo get_settings('home'); ?>&amp;usermedium=all">Valid CSS</a></li>
<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
<?php wp_meta(); ?>
</ul>
</div>

<?php endif; ?>


</div>