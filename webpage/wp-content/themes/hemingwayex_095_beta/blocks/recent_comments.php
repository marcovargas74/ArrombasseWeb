<?php require(TEMPLATEPATH . "/functions/simple_recent_comments.php") ?>
<h2>Recent Comments</h2>
<?php if ( function_exists('src_simple_recent_comments') ) { ?> 
<ul class="pages recent-comments">
	<?php src_simple_recent_comments(); ?>
</ul>
<?php } else { ?>
<div class="divider"></div>
<p>Oops... There seems to be some weird problem that even the <a href="http://nalinmakar.com/hemingwayEx">author</a> of the theme did not anticipate.</p>
<?php } ?>