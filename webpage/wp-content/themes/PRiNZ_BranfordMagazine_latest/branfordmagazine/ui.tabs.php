<!-- START TABBED SECTION -->

<div id="container-4">
  <ul>
    <li><a class="ui-tabs" href="#fragment-1">Lead Article</a></li>
    <li><a class="ui-tabs" href="#fragment-2">Recent Posts</a></li>
    <li><a class="ui-tabs" href="#fragment-3">About this Theme</a></li>
    <li><a class="ui-tabs" href="#fragment-4">Important!</a></li>
    <!-- Just add tabs as you like by following this scheme:
    <li><a class="ui-tabs" href="#fragment-X">Link name here</a></li> -->
  </ul>
  <!-- LEAD ARTICLE -->
  <div id="fragment-1">
    <ul id="leadarticle">
      <?php 
// Lead Story module begins   
   query_posts('showposts=1&cat=1'); //selects 1 article of the category with ID 1 ?>
      <?php while (have_posts()) : the_post(); ?>
      <?php
// this grabs the image filename
	$values = get_post_custom_values("leadimage");
// this checks to see if an image file exists
	if (isset($values[0])) {						
?>
      <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php 
// this is where the Lead Story image gets printed 	
	$values = get_post_custom_values("leadimage"); echo $values[0]; ?>" alt="leadimage" id="leadpic" /></a>
      <?php } ?>
      <h3>
        <?php 
	// this is where the name of the Lead Story category gets printed	  
	wp_list_categories('include=1&title_li=&style=none'); ?>
      </h3>
      <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php __('Permanent Link to','branfordmagazine')?> <?php the_title(); ?>" class="title">
      <?php 
// this is where the title of the Lead Story gets printed	  
	the_title(); ?>
      </a>
      <?php 
// this is where the excerpt of the Lead Story gets printed	  
	the_excerpt() ; ?> <span class="read-on"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php __('Permanent Link to','branfordmagazine')?> <?php the_title(); ?>">
        <?php _e('[continue reading...]','branfordmagazine'); ?>
        </a> </span>
      <?php endwhile; ?>
    </ul>
  </div>
  <!-- END LEAD ARTICLE -->
  <!-- RECENT POSTS -->
  <div id="fragment-2" class="bullets">
    <h3 class="title">Recent Posts</h3>
    <p>To show the recent posts is just one thing you can use this tabbed section
      for. There are many more. It&acute;s up to your creativity.</p>
    <?php wp_get_archives('type=postbypost&limit=7'); ?>
  </div>
  <!-- END RECENT POSTS -->
  <!-- ABOUT -->
  <div id="fragment-3">
    <ul class="about">
      <h3 class="title">About this Theme</h3>
      <p>This theme was originally inspired by the great magazine style themes of Brian
        Gardner and Darren Hoyt. I took those elements that I liked the most
        in every theme and combined them together in one single theme. The different
        page templates are inspired by Brian Gardners
        &quot;Revolution&quot; theme, the use of custom fields is something I
        first recognized at &quot;Mimbo&quot; by Darren Hoyt. The Tabbed section
        in this version is done by using ui.tabs by Klaus Hartl (stilbuero.de).</p>
      <p>The Name of the theme was inspired by the famous American jazz sax-player,
        Branford Marsalis. Although I&acute;m German, I decided to present this
        theme in english in order to make it available for a greater audience.</p>
      <p>This is my very first WP-Theme and if you detect any bugs, please let
        me know. If you use this theme, please let me also know and make sure
        the copyright remains as it is. </p>
      <p><strong>Find further information, tutorials, support forum, demo and download <a href="http://www.der-prinz.com/en/2008/01/25/wordpress-theme-im-magazin-stil-branfordmagazine-wordpress-magazine-style-theme-branfordmagazine/" target="_blank">on my Website.</a></strong></p>
    </ul>
  </div>
  <!-- END ABOUT -->
  <!-- IMPORTANT -->
  <div id="fragment-4">
    <ul class="about">
      <h3 class="title">Important information!</h3>
      <p>In this demo you might encounter issues or features that do not occur or are not available in the version you&acute;ve downloaded. This is just because I work on the theme to enhance it from time to time and I use this area for smaller changes of upcoming versions. </p>
      <p>So what you see here is the future somehow...isn&acute;t that amazing ;-)</p>
      <p><strong>Find further information, tutorials, support forum, demo and download <a href="http://www.der-prinz.com/en/2008/01/25/wordpress-theme-im-magazin-stil-branfordmagazine-wordpress-magazine-style-theme-branfordmagazine/" target="_blank">on my Website.</a></strong></p>
    </ul>
  </div>
  <!-- END IMPORTANT -->
</div>
<!-- END TABBED SECTION -->
