<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<!-- start primary content --><div id="primary">

<div class="page_body">

<div class="archives_left"><h2>Archives by Month:</h2>
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>
</div>

<div class="archives_right"><h2>Archives by Subject:</h2>
  <ul>
     <?php wp_list_cats(); ?>
  </ul>
</div>
<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>