<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>
<h2><?php _e("This post is password protected. Enter the password to view comments."); ?></h2>
<?php
return;
}
}
$commentalt = '-alt';
$commentcount = 1; ?>

<div id="comments-template">
<h4><?php comments_number('No Comment', '1 Comment', '% Comments' );?></h4>


<?php if ( $comments ) : ?>
<? // Begin Comments ?>
<?php foreach ($comments as $comment) : ?>
<? if ($comment->comment_type != "trackback" && $comment->comment_type != "pingback" && !ereg("<pingback />", $comment->comment_content) && !ereg("<trackback />", $comment->comment_content)) { ?>


<div class="comment-list" id="comment-<?php comment_ID() ?>">
<div class="comment-block<?php echo $commentalt; ?>">
<div class="comment-author"><?php comment_author_link(); ?> Said,</div>
<div class="comment-date"><?php comment_date('F jS, Y') ?> <a href="#comment-<?php comment_ID() ?>">@<?php comment_time() ?></a>&nbsp;&nbsp;<?php edit_comment_link('edit','',''); ?></div>

<div class="comment-text">
<?php if ($comment->comment_approved == '0') : ?>
<strong>Your Comment Is Under Moderation </strong>
<?php else: ?>
<?php comment_text(); ?>
<?php endif; ?>
</div>

</div>

<div class="comment-avatar"><?php if(function_exists("MyAvatars")) : ?> <?php MyAvatars(); ?><?php else: ?><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mygif.gif" alt="mygif"/></a><?php endif; ?>  </div>

</div>


<?php
($commentalt == "-alt")?$commentalt="":$commentalt="-alt";
$commentcount++;
?>
<? } ?>
<?php endforeach; /* end for each comment */ ?>

<? // Begin Trackbacks ?>
<?php foreach ($comments as $comment) : ?>
	<? if ($comment->comment_type == "trackback" || $comment->comment_type == "pingback" || ereg("<pingback />", $comment->comment_content) || ereg("<trackback />", $comment->comment_content)) { ?>

<? if (!$runonce) { $runonce = true; ?>

<h5><a href="<?php trackback_url() ?>">Pingback &amp; Trackback</a></h5>

<? } ?>



<div class="comment-list" id="comment-<?php comment_ID() ?>">
<div class="comment-block<?php echo $commentalt; ?>">
<div class="comment-author">Pingback from <?php comment_author_link(); ?></div>
<div class="comment-date"><?php comment_date('F jS, Y') ?> <a href="#comment-<?php comment_ID() ?>">@<?php comment_time() ?></a>&nbsp;&nbsp;<?php edit_comment_link('edit','',''); ?></div>

</div>

<div class="comment-avatar"><?php if(function_exists("MyAvatars")) : ?> <?php MyAvatars(); ?><?php else: ?><a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mygif.gif" alt="mygif"/></a><?php endif; ?>  </div>

</div>

<?php
($commentalt == "-alt")?$commentalt="":$commentalt="-alt";
$commentcount++;
?>
<? } ?>
<?php endforeach; /* end for each comment */ ?>

<? if ($runonce) { ?>
<? } ?>
<? // End Trackbacks ?>

<?php endif; ?>

<? // End Comments ?>

<?php if ('open' == $post->comment_status) : ?>

<?php if (get_option('comment_registration') && !$user_ID) : ?>

<h2>Sorry the comment area are closed</h2>

<?php else : ?>


<div class="post-content">
<h3>Random Post</h3>
<ul>
<?php gte_random_posts(); ?>
</ul>
</div>


<h6 id="comments">Leave Your Comments Below</h6>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment-form">

<?php if (!$user_ID) : ?>
<label>Username (*require)</label>
<p><input name="author" type="text" class="comment-box" value="<?php echo $comment_author; ?>"/></p>
<label>Email Address (*require)</label>
<p><input name="email" type="text" class="comment-box" value="<?php echo $comment_author_email; ?>"/></p>
<label>website</label>
<p><input name="url" type="text" class="comment-box" value="<?php echo $comment_author_url; ?>"/></p>
<?php endif; ?>


<label>Comments:</label>
<p><textarea name="comment" cols="50%" rows="8" class="comment-box-area" id="respond"></textarea>
</p>
<p><input name="sbm" type="submit" value="Submit My Comment" class="comment-submit"/><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<p id="comment-rules"><strong>Please Note:</strong> All comments will be hand modified by our authors so any unsuitable comments will be removed and you comments will be appreared after approved</p>
</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

</div>