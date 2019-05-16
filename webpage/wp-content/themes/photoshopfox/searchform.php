<div id="site-search">
<form method="get" id="searchbox" action="<?php bloginfo('url'); ?>/">
<input name="s" type="text" class="sfield" value="Enter your search keyword" onfocus="if (this.value == 'Enter your search keyword') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter your search keyword';}" size="10" tabindex="1" />
<input name="s" type="image" src="<?php bloginfo('template_directory'); ?>/images/search_button.gif" alt="search" class="sbutton"/>
</form>
</div>