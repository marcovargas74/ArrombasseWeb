<?php get_header(); ?>

<div id="area51">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

	<div class="post">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a> <?php the_time('d.m.') ?></h2>
	<?php the_content(__("Weiterlesen, Baby...")); ?>
	
	<p class="divide">
		<?php if ('open' == $post-> comment_status) : // kommentare erlaubt, dann ?>
		<?php comments_popup_link('0 Kommentare', '1 Kommentar', '% Kommentare'); ?>
		<?php else : // wenn kommentare deaktiviert, dann ?>
		<?php endif; ?>
	</p>
	</div>

	<?php endwhile; ?>
	<?php else : ?>

	<h2>404 - Der Beitrag oder die Seite konnte nicht gefunden werden</h2>
	<div class="post">
	<p>Du siehst keine Beitr&auml;ge, stimmts?<br />
	Ich gebe zu, dass das mein Fehler ist. Ausser du hast nat&uuml;rlich irgendwelchen Quatsch in deiner Adresszeile eingegeben der nicht existiert. Am besten nochmal probieren, im <a href="<?php echo get_settings('home'); ?>/archiv/" title="Archiv">Archiv</a> suchen oder von <a href="<?php echo get_settings('home'); ?>" title="Journal">Vorn</a> anfangen.</p>
	<p>&nbsp;</p>
	</div>

	<?php endif; ?>
	<div class="post"><div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div></div>
</div>
<?php get_footer(); ?>
