<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>
<div id="left">
<div id="content" class="widecolumn">
<h2 class="pagetitle">Archives</h2>
  <div class="post">
  <h2>Archiv from month:</h2>
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>
  <h2>Archives</h2>
  <ul>
    <?php wp_list_categories(); ?>
  </ul>
  </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
