<?php // Do not delete these linesif ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))die ('Bitte diese Seite nicht direkt laden. Danke!');if (!empty($post->post_password)) { // if there's a passwordif ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie?><p class="nocomments"><?php _e("Dieser Beitrag ist Passwort gesch&uuml;tzt. Um ihn anzusehen gib bitte das Passwort ein:"); ?><p><?php return; } }/* This variable is for alternating comment background */$oddcomment = 'even';?><div id="watertownStrip"><div class="responses"><?php if ($comments) : ?><?php $relax_comment_count=1; ?><?php foreach ($comments as $comment) : ?>	<span class="response-info"><?php if (function_exists('gravatar')) { gravatar_image_link(); } ?></a></span>	<dl>	<dt><?php comment_author_link() ?> <?php comment_date('d.m.') ?></dt>	<dd><?php comment_text() ?>	<?php if ($comment->comment_approved == '0') : ?>	<br /><em class="responseMod">Dein Kommentar muss moderiert werden.</em></dd>	<?php endif; ?>	</dl><?php $relax_comment_count++; ?><?php if ('even' == $oddcomment) $oddcomment = 'odd';else $oddcomment = 'even'; ?><?php endforeach; /* end for each comment */ ?></div><?php else : // this is displayed if there are no comments so far ?><?php if ('open' == $post-> comment_status) : // comments open, none there though ?><?php else : // comments are closed ?><h3>Kommentare deaktiviert</h3><?php endif; ?><?php endif; ?><?php if ('open' == $post-> comment_status) : ?><div class="addResponse"><h3>JETZT KOMMENTIEREN!</h3><form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post"><label for="author">Dein Name <strong>(muss)</strong></label><input type="text" value="<?php echo $comment_author; ?>" name="author" id="author" class="formies" /><label for="email">Deine Mail Adresse <strong>(muss)</strong></label><input type="text" value="<?php echo $comment_author_email; ?>" name="email" id="email" class="formies" /><label for="url">Webseite</label><input type="text" value="<?php echo $comment_author_url; ?>" name="url" id="url" class="formies" /><label for="comment">Dein Kommentar <strong>(muss)</strong></label><textarea name="comment" id="comment" rows="8" cols="33"></textarea><input type="submit" value="Kommentieren" id="submit" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" id="submit" /><?php do_action('comment_form', $post->ID); ?></form></div></div></div><?php endif; // if you delete this the sky will fall on your head ?>