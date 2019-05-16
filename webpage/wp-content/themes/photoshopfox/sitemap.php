<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>

<div id="post-blog">

<div class="post-meta" id="post-<?php the_ID(); ?>">
<div class="post-date"><?php the_time('F jS, Y') ?></div>
<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
<div class="post-author"><?php edit_post_link('edit', '', ''); ?></div>

<?php include (TEMPLATEPATH . '/social.php'); ?>


<div class="post-content">

<h3>Blog Pages</h3>
<ul>
<?php $archive_query = new WP_Query('showposts=1000');
while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a> (<?php comments_number('0', '1', '%'); ?>)</li>
<?php endwhile; ?>
</ul>

<?php if(function_exists("get_hottopics")) : ?>
<h3>Hot Topics</h3><ul><?php get_hottopics(); ?></ul>
<?php else : ?>
<?php endif; ?>

<h3>Feeds Syndicator</h3>
<ul>
<li><a href="<?php bloginfo('rdf_url'); ?>" title="RDF/RSS 1.0 feed"><acronym title="Resource Description Framework">RDF</acronym>/<acronym title="Really Simple Syndication">RSS</acronym> 1.0 feed</a></li>
<li><a href="<?php bloginfo('rss_url'); ?>" title="RSS 0.92 feed"><acronym title="Really Simple Syndication">RSS</acronym> 0.92 feed</a></li>
<li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS 2.0 feed"><acronym title="Really Simple Syndication">RSS</acronym> 2.0 feed</a></li>
<li><a href="<?php bloginfo('atom_url'); ?>" title="Atom feed">Atom feed</a></li>
</ul>

</div>


<div class="post-cat">
under: <?php the_category(', ') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(function_exists("UTW_ShowTagsForCurrentPost")) : ?><?php UTW_ShowTagsForCurrentPost("commalist", array('last'=>' and %taglink%', 'first'=>'Tags: %taglink%',)) ?><?php else : ?><?php if(function_exists("the_tags")) : ?><?php the_tags() ?><?php endif; ?><?php endif; ?>
</div>

</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>