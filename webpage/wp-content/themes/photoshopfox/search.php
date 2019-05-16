<?php get_header(); ?>

<div id="post-blog">

<?php if (have_posts()) : ?>

<h2>Search Result For &quot; <?php the_search_query(); ?> &quot;</h2>

<?php while (have_posts()) : the_post(); ?>

<div class="post-meta" id="post-<?php the_ID(); ?>">
<div class="post-date"><?php the_time('F jS, Y') ?></div>
<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
<div class="post-author"><?php the_author_posts_link(); ?>&nbsp;&nbsp;&nbsp;<?php edit_post_link('edit', '', ''); ?></div>

<?php include (TEMPLATEPATH . '/social.php'); ?>


<div class="post-content">
<?php the_excerpt(); ?>
<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">Click here to read more</a></p>
</div>


<div class="post-cat">
under: <?php the_category(', ') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(function_exists("UTW_ShowTagsForCurrentPost")) : ?><?php UTW_ShowTagsForCurrentPost("commalist", array('last'=>' and %taglink%', 'first'=>'Tags: %taglink%',)) ?><?php else : ?><?php if(function_exists("the_tags")) : ?><?php the_tags() ?><?php endif; ?><?php endif; ?>
</div>

</div>

<?php endwhile; ?>

<?php /* comments_template(); */ ?>

<?php include (TEMPLATEPATH . '/paginate.php'); ?>

<?php else: ?>

<h2>Sorry The Searche You Are Looking For Did Not Existed</h2>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>