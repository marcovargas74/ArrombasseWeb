<div id="right_side">
<div class="slideup"></div>
<br><a href="feed:<?php bloginfo('rss2_url'); ?>" title="RSS FEED from <?php bloginfo('name'); ?>">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss.gif" alt="RSS" border="0"></a>
<?php include (TEMPLATEPATH . '/searchform.php'); ?><ul>
			<?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>

					<li><h2>Categories</h2>
				<ul>
				<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
				</ul>
			</li>

	<li><h2>Archives</h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>
			
			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>				
				<?php get_links_list(); ?>
				
				<li><h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
				
					<?php wp_meta(); ?>
				</ul>
				</li>
			<?php } ?>
			
			

		</ul>
<div class="slidedown"></div>
	</div>

