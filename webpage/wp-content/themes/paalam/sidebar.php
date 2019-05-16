	<div id="sidebar" class="sidecol">
	<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>
  <?php if(is_home()) {?>
<li>
	<h2>About</h2>
	<p>
	<strong><?php bloginfo('name');?></strong><br/>
	<?php bloginfo('description');?><br/>
	</p>	
</li>
<li>
    <h2>Feed on</h2>
    <ul>
      <li class="feed"><a title="RSS Feed of Posts" href="<?php bloginfo('rss2_url'); ?>">Posts RSS</a></li>
      <li class="feed"><a title="RSS Feed of Comments" href="<?php bloginfo('comments_rss2_url'); ?>">Comments RSS</a></li>
    </ul>
  </li>
<?php }?>
<li>
  <h2><?php _e('Search'); ?></h2>
	<form id="searchform" method="get" action="<?php bloginfo('siteurl')?>/">
		<input type="text" name="s" id="s" class="textbox" value="<?php echo wp_specialchars($s, 1); ?>" />
		<input id="btnSearch" type="submit" name="submit" value="<?php _e('Go'); ?>" />
	</form>
  </li>  
<?php if(is_home()) get_links_list(); ?>        
  <li>
    <h2>
      <?php _e('Categories'); ?>
    </h2>
    <ul>
      <?php wp_list_cats('optioncount=1&hierarchical=1');    ?>
    </ul>
  </li>
    <?php if (function_exists('wp_tag_cloud')) {	?>
    <li>
      <h2>
        <?php _e('Tags'); ?>
      </h2>
      <p>
        <?php wp_tag_cloud(); ?>
      </p>
    </li>
    <?php } ?>
    <li>
    <h2>
      <?php _e('Monthly'); ?>
    </h2>
    <ul>
      <?php wp_get_archives('type=monthly&show_post_count=true'); ?>
    </ul>
  </li>
  <li>
    <h2><?php _e('Pages'); ?></h2>
    <ul>
      <?php wp_list_pages('title_li=' ); ?>
    </ul>
  </li>
    <?php if(is_home()) { ?>
    <li>
      <h2>Meta</h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
			<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
			<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
			<?php wp_meta(); ?>
		</ul>			
   </li>
    <?php } ?>
    <?php endif; ?>
</ul>
	</div>
	<div style="clear:both;"></div>