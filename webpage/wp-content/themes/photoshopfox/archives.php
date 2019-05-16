<?php
/*
Template Name: Archives
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
<h3>Monthly Archives</h3><ul><?php wp_get_archives('type=monthly') ?></ul>
<h3>Category Archives</h3><ul><?php wp_list_cats('sort_column=name&optioncount=1&feed=RSS') ?></ul>
<h3>Latest Archives</h3><ul><?php get_archives('postbypost', 10); ?></ul>
</div>


<div class="post-cat">
under: <?php the_category(', ') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(function_exists("UTW_ShowTagsForCurrentPost")) : ?><?php UTW_ShowTagsForCurrentPost("commalist", array('last'=>' and %taglink%', 'first'=>'Tags: %taglink%',)) ?><?php else : ?><?php if(function_exists("the_tags")) : ?><?php the_tags() ?><?php endif; ?><?php endif; ?>
</div>

</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>