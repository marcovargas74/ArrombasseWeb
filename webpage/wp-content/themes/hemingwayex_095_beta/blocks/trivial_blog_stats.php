<?php require(TEMPLATEPATH . "/functions/trivial_blog_stats.php") ?>
<h2>Trivial Blog Stats</h2>
<ul class="counts">
	<li><strong><?php nm_get_posts_count() ?></strong> posts. <strong><?php nm_get_posts_word_count() ?></strong> words in all posts. <strong><?php nm_get_posts_total_char_count() ?></strong> total characters in posts. <strong><?php nm_get_posts_avg_char_count() ?></strong> average characters/post.</li>
	<li><strong><?php nm_get_comments_count() ?></strong> comments. <strong><?php nm_get_comments_word_count() ?></strong> words in all comments. <strong><?php nm_get_comments_total_char_count() ?></strong> total characters in comments. <strong><?php nm_get_comments_avg_char_count() ?></strong> average characters/comment.</li>
</ul>
