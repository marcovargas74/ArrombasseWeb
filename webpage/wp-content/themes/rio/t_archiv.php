<?php
/*
Template Name: Archiv / Oh Eight
*/
?>

<?php get_header(); ?>

<?php /* Counts the posts, comments and categories on your blog */
	$numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'");
	if (0 < $numposts) $numposts = number_format($numposts); 
	
	$numcomms = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
	if (0 < $numcomms) $numcomms = number_format($numcomms);
	
	$numcats = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->categories");
	if (0 < $numcats) $numcats = number_format($numcats);
?>

<div id="area51">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

	<div class="post">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<p>Das ist die Hauptseite des Archivs. Derzeit gibt es <?php echo $numposts; ?> Beitr&auml;ge und <?php echo $numcomms; ?> Kommentare die sich in <?php echo $numcats; ?> Kategorien aufteilen.</p>
	<p>Hier kannst du das Archiv anhand der Beitr&auml;ge, Chronologisch oder Kategorisch durchsuchen. <del>Suchst du was besimmtes empfiehlt sich die Suchfunktion</del>.</p>
	<p>Ist ja nur zum gucken, gell ;)</p>

<ul id="oldNotchList">
	<li>
		<?php srg_clean_archives(); ?><br />

		<h3 class="archiv-listing2">Chronologisch</h3>
		<ul class="monats-archiv">
		<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
		</ul>

		<br class="break" />

		<h3 class="archiv-listing2">Kategorisch</h3>
		<ul class="monats-archiv">
		<?php wp_list_cats('sort_column=name&optioncount=1'); ?>
		</ul>

		<br class="break" />
	</li>
</ul>


	</div>

<?php endwhile; ?>

<?php else : ?>

	<div class="post">
	<p><b>Oh je. Da ist m&auml;chtig was schief gegangen</b></p>
	<p>Du siehst keine Beitr&auml;ge, stimmts?<br />
	Ich gebe zu, dass das mein Fehler ist. Auﬂer du hast nat&uuml;rlich irgendwelchen Quatsch in deiner Adresszeile eingegeben der nicht existiert. Am besten nochmal probieren, im <a href="<?php echo get_settings('home'); ?>/archiv/" title="Archiv">Archiv</a> suchen oder von <a href="<?php echo get_settings('home'); ?>" title="Journal">Vorn</a> anfangen.</p>
	<p>&nbsp;</p>
	</div>

<?php endif; ?>

</div>

<?php //include 'a_footer.php'; ?>

<?php get_footer(); ?>
