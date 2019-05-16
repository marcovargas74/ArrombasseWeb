<h2>Tags</h2>
<hr class="hide" />
<?php if ( (function_exists('UTW_ShowWeightedTagSetAlphabetical')) ) { ?>
	<div class="divider"></div>
	<p><?php UTW_ShowWeightedTagSetAlphabetical("coloredsizedtagcloudwithcount","",40) ?></p>
	<br />
<?php } else { ?>
		<div class="divider"></div>
		<p>To use Tags block, you need to have <a href="http://www.neato.co.nz/ultimate-tag-warrior/" >Ultimate Tag Warrior</a> Plugin installed.</p><br />

<?php } ?>