<?php get_header(); ?>

<div id="area51">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

	<div class="post">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<?php the_content(); ?>
	<p class="divide">
		<?php if ('open' == $post-> comment_status) : // comments open, none there though ?>
		<?php comments_popup_link('Keine Kommentare', '1 Kommentar', '% Kommentare'); ?>
		<?php else : // comments are closed ?>
		<?php endif; ?>
	</p>
	</div>

	<?php endwhile; ?>
	<?php else : ?>

	<div class="post">
	<h2>Die Suche hat nichts gefunden.</h2>
	<p>Also, entweder einen anderen Begriff versuchen, im <a href="<?php echo get_settings('home'); ?>/archiv/" title="Archiv">Archiv</a> suchen oder von <a href="<?php echo get_settings('home'); ?>" title="Journal">Vorn</a> anfangen.</p>
	<p>&nbsp;</p>
	</div>

	<?php endif; ?>

</div>

<?php get_footer(); ?>