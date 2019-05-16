<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content">

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<h2><?php __('Archives by Month:','branfordmagazine'); ?></h2>
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>

<h2><?php __('Archives by Subject:','branfordmagazine'); ?></h2>
  <ul>
     <?php wp_list_categories(); ?>
  </ul>

</div>	


<?php get_sidebar(); ?>
<?php get_footer(); ?>
