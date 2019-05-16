<?php
/* Theme Options */

$themename = "PocketT";
$shortname = "pocket";
$options = array (


array(    "name" => "Style Options",
        "type" => "title"),
		
array(    "type" => "open"),		

array(	"name" => "Stylesheet:",
			"desc" => "Defaults to light-style.css",
			"id" => $shortname."_style",
			"type" => "select",
            "std" => "light-style.css",
			"options" => array("light-style.css", "dark-style.css")),
			
array(	"name" => "Header:",
			"desc" => "Defaults to default-header.png",
			"id" => $shortname."_header",
			"type" => "select",
            "std" => "default-header.png",
			"options" => array("default-header.png", "rose.png", "leaf.png", "leaf-edge.png", "dew-drops.png", "grass.png","dirty.png", "little-flowers.png", "wood-abstract.png", "MY_HEADER.png")),
			
array(    "type" => "close"),					

array(    "name" => "About You",
        "type" => "title"),

array(    "type" => "open"),

array(    "name" => "About Yourself:",
        "desc" => "Tell your viewers a bit about yourself. You're restricted to the amount you can put<br /> 
		here, be sure to keep an eye on what the amount is and how it looks... so go on...<br /> 
		tease people... you know you want to.. ;]<br /><br />
		
		<strong>Tip:</strong> You should wrap your paragraphs in &lt;p&gt;&lt;/p&gt; tag.<br /><br />
		
		<strong>Example:</strong> &lt;p&gt;PocketT is a free WordPress theme provided by Nyssa Brown Design.<br /> 
		Its sole purpose is to be compact and focus on what's important in a blog: the content,<br />
		while still maintaining an interesting yet simple design.&lt;/p&gt;",
        "id" => $shortname."_about_message",
        "type" => "textarea"),
		
array(    "type" => "close"),		

array(    "type" => "open"),
		
array(    "name" => "FeedBurner",
        "type" => "title"),		
		
array(    "name" => "FeedBurner URL:",
        "desc" => "Replace the default WordPress feed URL with a FeedBurner URL.<br /><br />
		<strong>Sample FeedBurner URL:</strong> http://feeds.feedburner.com/Nyssajbrown ",
        "id" => $shortname."_feed_burner",
        "type" => "text"),	
		
array(    "type" => "close"),	

);

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>

<style>

		.wrap {
		width:70%;
		}
		
		.pocket-option-title {
		background:#F1F1F1 url(<?php bloginfo('template_url'); ?>/images/options/title-grad.gif) bottom repeat-x;
		color:#464646;
		padding:10px 15px;
		-moz-border-radius-topright:8px;
		-moz-border-radius-topleft:8px;
		-webkit-border-top-right-radius:8px;
		-webkit-border-top-left-radius:8px;
		border:1px solid #bfbfbf;
		font-weight:bold;
		margin-bottom:0;
		}
		
		.pocket-table {
		padding:15px;
		background:#f0f0f0 url(<?php bloginfo('template_url'); ?>/images/options/table-bg.gif) top repeat-x;
		border:1px solid #e5e5e5;
		-moz-border-radius-bottomright:8px;
		-moz-border-radius-bottomleft:8px;
		-webkit-border-bottom-right-radius:8px;
		-webkit-border-bottom-left-radius:8px;
		font-size:12px;
		}
		
		.pocket-table p {
		margin:0 0 10px 0;
		}
		
		.pocket-table strong {
		color:#2C82B5;
		}
		
		.submit {
		border-top:none;
		padding:0;
		}
		
		.live-view {
		border:none;
		border:1px solid #e5e5e5;
		}

</style>

<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>

<h3 class="pocket-option-title">Live View</h3>
<div class="pocket-table">
<p>Changes will show in Live View below once your changes have been saved.</p>
<iframe src="../?preview=true" width="100%" height="350" class="live-view"></iframe>
</div>

<form method="post">

<?php foreach ($options as $value) {

switch ( $value['type'] ) {

case "open":
?>
<table width="100%" border="0" class="pocket-table">

<?php break;

case "close":
?>

</table><br />

<?php break;

case "title":
?>

<h3 class="pocket-option-title"><?php echo $value['name']; ?></h3>

<?php break;

case 'text':
?>

<tr>
    <td width="25%" rowspan="2" valign="top"><strong><?php echo $value['name']; ?></strong></td>
    <td width="75%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px solid #FFF">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'textarea':
?>

<tr>
    <td width="25%" rowspan="2" valign="top"><strong><?php echo $value['name']; ?></strong></td>
    <td width="75%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:150px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php  if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] ) ); } else { echo stripslashes($value['std'] ); }
 ?></textarea></td>

</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px solid #FFF">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'select':
?>
<tr>
    <td width="25%" rowspan="2" valign="top"><strong><?php echo $value['name']; ?></strong></td>
    <td width="75%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
</tr>

<tr>
    <td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px solid #FFF">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case "checkbox":
?>
    <tr>
    <td width="25%" rowspan="2" valign="top"><strong><?php echo $value['name']; ?></strong></td>
        <td width="75%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                </td>
    </tr>

    <tr>
        <td><small><?php echo $value['desc']; ?></small></td>
   </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px solid #FFF">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php         break;

}
}
?>

<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset to Defaults" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
</div>
 </div>



<?php
}

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_wp_head() { ?>
<style>

		.wrap {
		width:80%;
		}
		
		.pocket-option-title {
		background:#F1F1F1 url(<?php bloginfo('template_url'); ?>/images/options/title-grad.gif) bottom repeat-x;
		color:#464646;
		padding:10px 15px;
		-moz-border-radius-topright:8px;
		-moz-border-radius-topleft:8px;
		-webkit-border-top-right-radius:8px;
		-webkit-border-top-left-radius:8px;
		border:1px solid #bfbfbf;
		font-weight:bold;
		margin-bottom:0;
		}
		
		
		.information {
		padding:15px;
		background:#f0f0f0 url(<?php bloginfo('template_url'); ?>/images/options/table-bg.gif) top repeat-x;
		border:1px solid #e5e5e5;
		-moz-border-radius-bottomright:8px;
		-moz-border-radius-bottomleft:8px;
		-webkit-border-bottom-right-radius:8px;
		-webkit-border-bottom-left-radius:8px;
		font-size:12px;
		}
		
		.information p {
		margin:0 0 10px 0;
		}
		
		.information strong {
		color:#2C82B5;
		}
		
		.information ol {
		margin:0 0 25px 0;
		padding:0 0 0 22px;
		}
		
		.information img {
		margin:0 0 10px 0;
		}

		.payment-left {
		width:60%;
		float:left;
		}
		
		.payment-right {
		width:30%;
		float:right;
		}
		
		.information h3 {
		margin:0;
		}
		
		.live-view {
		border:none;
		border:1px solid #e5e5e5;
		}

</style>
<?php }



add_action('admin_head', 'mytheme_wp_head');
add_action('admin_menu', 'mytheme_add_admin');

function pocket_add_theme_page() {

    add_theme_page("PocketT Help &amp; FAQ", "PocketT Help &amp; FAQ", 'switch_themes', '', '_readme_page');

}

function _readme_page() { ?>

<div class="wrap">
<h2>PocketT Help &amp; FAQ</h2>

<h3 class="pocket-option-title">1. What License is PocketT released under?</h3>
<div class="information">
<p>PocketT is released under the Creative Commons General Public License. All I ask is that the PocketT link remains in the footer.</p>
<iframe src="http://creativecommons.org/licenses/GPL/2.0/" width="100%" height="200" class="live-view"></iframe>
</div>

<h3 class="pocket-option-title">2. Frequently Asked Questions</h3>
<div class="information">

	<ol>
		<li>Does it work with all WordPress versions?</li>
		<li>How do I change the header?</li>
		<li>How do I create my own header?</li>
		<li>Whos photography has been used for the headers?</li>
		<li>Can I use these photos elsewhere on the internet?</li>
		<li>Will you do a customization of this theme for me?</li>
		<li>Do you create custom themes?</li>
	</ol>

<h3>1. Does it work with all WordPress versions?</h3>
<p>PocketT works with WordPress versions 2.2 and upwards, including 2.7 Beta 3.</p>

<h3>2. How do I change the header?</h3>
<p>In this version of PocketT (1.4), I've changed all of the headers and included them right within the theme. It is now easier to change them by going to the PocketT Options page and changing the header under Style Options.</p>

<h3>3. How do I create my own header?</strong></h3>
<p>I'm hoping as of version 1.4 that creating your own header will be easier. You will however need Photoshop. I have included a .psd in the folder <em>images > headers</em> called <em>header-template.psd</em>. There are three layers in the file: Curve Base, Your Image and Colour Overlay. The Curve Base is used to get the correct curves and transparency. Your image should be masked over this layer, and so should the Colour Overlay, like the image below.</p>

<img src="<?php bloginfo('template_url'); ?>/images/options/ps.gif" />

<p>To achieve masking, you need to hold the <em>Alt</em> key while hovering right inbetween the layers. Two circles overlapping will show, click, and you'll have your layer mask. Do the same for the Colour Overlay (or you can delete it if you like). Save the image as <em>MY_HEADER.png</em> in the <em>images > headers</em> folder and then select MY_HEADER.png from Style Options.</p>

<p>If you don't want to preserve the curves and transparency, just save an image that is 500px (w) x 214px (h) and save it as <em>MY_HEADER.png</em> like above.</p>

<h3>4. Whos photography has been used for the headers?</h3>
<p>All photography is my own, from my photography archives. Some are more recent, some are old, all are mine.</p>

<h3>5. Can I use these photos elsewhere on the internet?</strong></h3>
<p>No. The photos are for use with PocketT only, but if you really want to use it for something, contact me and I'll see what I can do. I do have them in their original colours as well. This does mean that if you make modifications of PocketT and release it, you may include the images, so long as the theme is released under the same license and my photoblog link stays in tact in the theme description.</p>

<h3>6. Will you do a customization of this theme for me?</h3>
<p>I can but not for free I'm afraid. If you are interested, contact me for details.</p>

<h3>7. I'm interested in a completely custom theme. Do you create custom themes?</h3>
<p>Yeah, I sure do, and for a pretty good price as well. Contact me for details.</p>

</div>

<h3 class="pocket-option-title">3. Bug Reports, Comments &amp; Suggestions</h3>
<div class="information">
<h3>Bug Reports</h3>
<p>PocketT Options are new as of version 1.4. I've tested everything as much as possible and it seems everything works, but sometimes, bugs do slip the radar. If you do find something acting a little quirky, please <a href="http://www.nyssajbrown.net/contact/" title="Contact Me">contact me</a> immediately, with a thorough description of what trouble you're experiencing. Please also include the following information if it is at all possible:</p>
<ul><li>Browser name and version number</li>
<li>Operating system</li>
<li>URL to your blog where you are experiencing the problem <strong>or</strong></li>
<li>Links to screenshots of the problem</li></ul>
<p>All of these things will make my life easier in fixing the problem!</p>
<h3>Comments &amp; Suggestions</h3>
<p>I'm always open to comments and suggestions about PocketT. If you have any ideas you'd like to express or general comments about the theme, feel free to let me know!</p>
</div>


<h3 class="pocket-option-title">4. Donations</h3>
<div class="information">

<div class="payment-left">
	<h3>Why Donate?</h3>
	<p>Donating isn't a requirement - PocketT <em>is</em> a <strong>free</strong> theme afterall, and will always remain absolutely free. However, I'm not rich. I don't have a good paying job (actually, I'm unemployed at the time of writing this) and I'm definitely not getting paid for the amount of time I spend on PocketT and other themes I create in the future.</p>
	<p>Not only will you help me to put small amounts of money towards savings, you'll be showing that you do appreciate the amount of time I put into creating/updating themes and other bits and pieces for others. Yep, even &pound;1 would make me happy!</p>
	<p>Those who do donate will also benefit: they will have their name added below as thanks with each update. :) If you'd like your name linked to your website, you will need to email me and let me know about your donation.</p>
	<p>You can make a payment to <strong>Nyssa Brown Design</strong> via the internet, using any of the major Credit or Debit Cards. <em>No PayPal account is necessary!</em></p>


	<p align="center"><!-- PayPal Logo --><a href="#" onclick="javascript:window.open('https://www.paypal.com/uk/cgi-bin/webscr?cmd=xpt/Marketing/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=400, height=350');"><img  src="https://www.paypal.com/en_GB/GB/i/logo/PayPal_mark_37x23.gif" border="0" alt="Acceptance Mark"></a><!-- PayPal Logo --></p>
</div><!-- end .left -->

<div class="payment-right">
<h3>Donate</h3>

	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="payPalForm">

	<input type="hidden" name="item_name" value="Donation to Nyssa Brown Design (via PocketT)">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="no_note" value="1">

	<input type="hidden" name="business" value="payments@nyssajbrown.net">
	<input type="hidden" name="return" value="http://www.nyssajbrown.net/payments/thanks/">
	<input type="hidden" name="cancel_return" value="http://www.nyssajbrown.net/payments/cancel/">
	<p>Amount:<br /><input type="text" id="amount" name="amount" value="1.00"/></p>
	<p>Currency:<br />
	<select id="currency_code" name="currency_code">

		<option value="GBP">GBP - British Pounds</option>
		<option value="USD">USD - US Dollars</option>
		<option value="EUR">EUR - Euros</option>
		<option value="AUD">AUD - Australian Dollars</option>
		<option value="CAD">CAD - Canadian Dollars</option>
		<option value="CZK">CZK - Czech Koruna</option>

		<option value="DKK">DKK - Danish Kroner</option>
		<option value="HKD">HKD - Hong Kong Dollars</option>
		<option value="HUF">HUF - Hungarian Forint</option>
		<option value="JPY">JPY - Japanese Yen</option>
		<option value="NZD">NZD - New Zealand Dollars</option>
		<option value="NOK">NOK - Norwegian Krone</option>

		<option value="PLN">PLN - Polish Zlotych</option>
		<option value="SGD">SGD - Singapore Dollars</option>
		<option value="SEK">SEK - Swedish Kronor</option>
		<option value="CHF">CHF - Swiss Francs</option>
	</select></p>
	<p><input type="submit" name="Submit" value="Submit Payment" /></p>
	
	</form><br />
		
</div><!-- end .right -->

<div class="clear"></div>

<h3>Many thanks to...</h3>
<p>Serge Keller, Brooke Walton</p>

</div>

</div>

<?php }
add_action('admin_menu', 'pocket_add_theme_page');
?>