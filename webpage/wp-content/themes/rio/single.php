<?php get_header(); ?>

<div id="area51">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

	<div class="post">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a> <?php the_time('d.m.') ?></h2>
	<?php the_content(__("Mehr davon, Baby!")); ?>
	
	<p class="divide"><a href="#comment" title="Kommentieren">Kommentieren</a></p>
	</div>


	<?php endwhile; ?>
	<?php else : ?>

	<div class="post">
	<h2>404 - Der Beitrag oder die Seite konnte nicht gefunden werden</h2>
	<p>Du siehst keine Beitr&auml;ge, stimmts?<br />
	Ich gebe zu, dass das mein Fehler ist. Au?er du hast nat&uuml;rlich irgendwelchen Quatsch in deiner Adresszeile eingegeben der nicht existiert. Am besten nochmal probieren, im <a href="<?php echo get_settings('home'); ?>/archiv/" title="Archiv">Archiv</a> suchen oder von <a href="<?php echo get_settings('home'); ?>" title="Journal">Vorn</a> anfangen.</p>
	<p>&nbsp;</p>
	</div>

	<?php endif; ?>

</div>

<a name="comments" id="comments"></a><?php comments_template(); ?>

<?php get_footer(); ?>
