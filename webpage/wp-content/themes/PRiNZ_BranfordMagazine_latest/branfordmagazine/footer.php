</div> 
<div id="footer"> 
  <?php wp_footer(); ?>
  <div> &#169; <?php echo date('Y'); ?> 
    <?php bloginfo('name'); ?>
    | Powered by <a href="http://wordpress.org/" target="_blank">WordPress</a> 
    | <a href="http://www.wp-themes.der-prinz.com/magazine/" target="_blank" title="By DER PRiNZ - Michael Oeser">BranfordMagazine theme</a> by <a href="http://www.der-prinz.com" target="_blank" title="DER PRiNZ - Michael Oeser">Michael
    Oeser.</a>	Based on <a href="http://www.darrenhoyt.com/2007/08/05/wordpress-magazine-theme-released/" target="_blank" title="Mimbo">Mimbo</a> and <a href="http://www.revolutiontheme.com/" target="_blank" title="Revolution">Revolution</a>
    <div></div> 
    <?php wp_loginout(); ?> | 
    <?php wp_register('', ' |'); ?>
	<?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds.
  </div>
</div>
</body>
</html>
