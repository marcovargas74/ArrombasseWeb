<?php get_header(); ?>

<div id="post-blog">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post-meta" id="post-<?php the_ID(); ?>">
<div class="post-date"><?php the_time('F jS, Y') ?></div>
<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
<div class="post-author"><?php the_author_posts_link(); ?>&nbsp;&nbsp;&nbsp;<?php edit_post_link('edit', '', ''); ?></div>

<?php include (TEMPLATEPATH . '/social.php'); ?>

<div class="post-author">
<script type="text/javascript">
google_ad_client = "<?php include (TEMPLATEPATH . '/adsense.php'); ?>";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text_image";
google_ad_channel = "";
google_color_border = "FFFFFF";
google_color_bg = "FFFFFF";
google_color_link = "000000";
google_color_text = "444444";
google_color_url = "444444";
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

<div class="post-content">
<?php the_content("<br />Click here to read more"); ?>

<h3>Sponsors</h3>
<p>
<script type="text/javascript">
google_ad_client = "<?php include (TEMPLATEPATH . '/adsense.php'); ?>";
google_ad_width = 336;
google_ad_height = 280;
google_ad_format = "336x280_as";
google_ad_type = "text_image";
google_ad_channel = "";
google_color_border = "FFFFFF";
google_color_bg = "FFFFFF";
google_color_link = "000000";
google_color_text = "444444";
google_color_url = "444444";
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</p>

</div>


<div class="post-cat">
under: <?php the_category(', ') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(function_exists("UTW_ShowTagsForCurrentPost")) : ?><?php UTW_ShowTagsForCurrentPost("commalist", array('last'=>' and %taglink%', 'first'=>'Tags: %taglink%',)) ?><?php else : ?><?php if(function_exists("the_tags")) : ?><?php the_tags() ?><?php endif; ?><?php endif; ?>
</div>

</div>

<?php endwhile; ?>

<?php comments_template(); ?>

<?php include (TEMPLATEPATH . '/paginate.php'); ?>

<?php else: ?>

<h2>Sorry The Post You Are Looking For Had Been Deleted</h2>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>