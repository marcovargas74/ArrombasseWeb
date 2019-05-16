<?php
class HemingwayEx
	{
		
		var $raw_blocks;
		var $available_blocks;
		var $style;
		var $version;
		var $date;
		
		function add_available_block($block_name, $block_ref)
			{
				$blocks = $this->available_blocks;
				
				if (!$blocks[$block_ref]){
					$blocks[$block_ref] = $block_name;
					update_option('hem_available_blocks', $blocks);
					wp_cache_flush();
				}
				
			}
		
		function get_available_blocks()
			// This function returns an array of available blocks
			// in the format of $arr[block_ref] = block_name
			{				
				$this->available_blocks = get_option('hem_available_blocks');
				return $this->available_blocks;
			}
		
		function get_block_contents($block_place)
			// Returns an array of block_refs in specififed block
			{
				if (!$this->raw_blocks){
					$this->raw_blocks = get_option('hem_blocks');
				}
				return $this->raw_blocks[$block_place];
			}
		
		function add_block_to_place($block_place, $block_ref)
			{
				$block_contents = $this->get_block_contents($block_place);
				if (in_array($block_ref, $block_contents))
					return true;
				
				$block_contents[] = $block_ref;	
				$this->raw_blocks[$block_place] = $block_contents;
				update_option('hem_blocks', $this->raw_blocks);
				wp_cache_flush(); // I was having caching issues
				return true;
			}
			
		function remove_block_in_place($block_place, $block_ref)
			{
				$block_contents = $this->get_block_contents($block_place);
				if (!in_array($block_ref, $block_contents))
					return true;
				$key = array_search($block_ref, $block_contents);
				unset($block_contents[$key]);
				$this->raw_blocks[$block_place] = $block_contents;
				update_option('hem_blocks', $this->raw_blocks);
				wp_cache_flush(); // I was having caching issues
				return true;
			}
			
			// Templating functions
			
			function get_block_output($block_place)
				{
					global $hemingwayEx;
					$blocks = $this->get_block_contents($block_place);
					foreach($blocks as $key => $block ){
						include (TEMPLATEPATH . '/blocks/' . $block . '.php');
					}
				}
				
			function get_style(){
				$this->style = get_option('hem_style');
			}
			
			function date_format($slashes = false){
				global $hemingwayEx_options;
				if ($slashes)
					return $hemingwayEx_options['international_dates'] == 1 ? 'd/m' : 'm/d'; 
				else
					return $hemingwayEx_options['international_dates'] == 1 ? 'd.m' : 'm.d'; 
			}
			
			// Excerpt cutting. I'd love to use the_excerpt_reloaded, but needless licensing prohibits me from doing so
			function excerpt(){
				echo $this->get_excerpt();
			}
			
			function get_excerpt(){
				global $post;
				global $hemingwayEx_options;
				
				//modified by Nalin. Added option to allow user to specify length of excerpt
				if (!is_null($hemingwayEx_options['excerpt_length']) || $hemingwayEx_options['excerpt_length'] != 0 ) {
					$max_length = $hemingwayEx_options['excerpt_length'];
				} else {
					$max_length = 75; // Maximum words.
				}
				
				// If they've manually put in an excerpt, let it go!
				if ($post->post_excerpt) return $post->post_excerpt;
				
				// Check to see if it's a password protected post
				if ($post->post_password) {
						if ($_COOKIE['wp-postpass_'.COOKIEHASH] != $post->post_password) {
								if(is_feed()) {
										return __('This is a protected post');
								} else {
										return  get_the_password_form();
								}
						}
				}
				
				if( strpos($post->post_content, '<!--more-->') ) { // There's a more link
					$temp_ex = explode('<!--more-->', $post->post_content, 2);
					$excerpt =  $temp_ex[0];
                } else {
					$temp_ex = explode(' ', $post->post_content);  // Split up the spaces
					$length = count($temp_ex) < $max_length ? count($temp_ex) : $max_length;
					for ($i=0; $i<$length; $i++) $excerpt .= $temp_ex[$i] . ' ';
				}
				
				
				$excerpt = balanceTags($excerpt);
				$excerpt = apply_filters('the_excerpt', $excerpt);
				
				return $excerpt;
				
			}
			
			function get_asides_category_id() 
			{
				global $hemingwayEx_options;
				global $wpdb;
				if( $hemingwayEx_options['asides_category'] != "" ) {
					return $wpdb->get_var("SELECT cat_ID FROM " . $wpdb->categories . " WHERE cat_name='" . $hemingwayEx_options['asides_category'] . "'");
				}
			}
	}
	
$hemingwayEx = new HemingwayEx();

$hemingwayEx->version = "0.95 beta";
$hemingwayEx->date = "2007-03-04";

// Options
$default_blocks = Array(
	'recent_entries' => 'Recent Entries',
	'about_page' => 'About Page',
	'category_listing' => 'Category Listing',
	'blogroll' => 'Blogroll',
	'pages' => 'Pages',
	'monthly_archives' => 'Monthly Archives',
	'related_posts' => 'Related Posts',
	'flickr_rss' => 'Flickr RSS',
	'tags' => 'Tags',
	'trivial_blog_stats' => 'Trivial Blog Stats',
	'asides' => 'Asides',
	'recent_comments' => 'Recent Comments'
);

$default_block_locations = Array(
	//blocks 1, 2 and 3 are part of the HemingwayExEx Slidebar
	'block_1' => Array('recent_entries'),
	'block_2' => Array('category_listing'),
	'block_3' => Array('tags'),
	//blocks 4, 5 and 6 are part of the HemingwayEx Bottombar
	'block_4' => Array('about_page', 'trivial_blog_stats'),
	'block_5' => Array('blogroll'),
	'block_6' => Array('monthly_archives')
);

$default_options = Array(
	'international_dates' => 0,
	'excerpt_length' => 75,
	'asides_category' => ""
);

if (!get_option('hem_version') || get_option('hem_version') < $hemingwayEx->version){
	// HemingwayEx isn't installed, so we'll need to add options
	if (!get_option('hem_version') )
		add_option('hem_version', $hemingwayEx->version, 'Hemingway Version installed');
	else
		update_option('hem_version', $hemingwayEx->version);
		
	if (!get_option('hem_last_updated') ) 
		add_option('hem_last_updated', '0000-00-00', 'Last date HemingwayEx was updated');
	
	if (!get_option('hem_available_blocks') ) 
		add_option('hem_available_blocks', $default_blocks, 'A list of available blocks for HemingwayEx');
	
	if (!get_option('hem_blocks') ) 
		add_option('hem_blocks', $default_block_locations, 'An array of blocks and their contents');
	
	if (!get_option('hem_style') )
		add_option('hem_style', '', 'Location of custom style sheet');
		
	if (!get_option('hem_options') ) {
		add_option('hem_options', $default_options, 'Default options for HemingwayEx');
	}
	
	wp_cache_flush(); // I was having caching issues
}

// Stuff

add_action ('admin_menu', 'hemingway_menu');

$hem_loc = '../themes/' . basename(dirname($file)); 

$hemingwayEx_options = get_option('hem_options');
$hemingwayEx_last_updated = get_option('hem_last_updated');
$hemingwayEx->get_available_blocks();
$hemingwayEx->get_style();


// Ajax Stuff

if ($_GET['hem_action'] == 'add_block'){
	auth_redirect(); // Make sure they're logged in
	$block_ref = $_GET['block_ref'];
	$block_place = $_GET['block_place'];
	
	$block_name = $hemingwayEx->available_blocks[$block_ref];
	
	$hemingwayEx->add_block_to_place($block_place, $block_ref);

	ob_end_clean(); // Kill preceding output
	$output = '<ul>';
	foreach($hemingwayEx->get_block_contents($block_place) as $key => $block_ref){
			$block_name = $hemingwayEx->available_blocks[$block_ref];
			$output .= '<li>' . $block_name . ' <a href="#" class="remove" onclick="remove_block(\'' . $block_place . '\', \'' . $block_ref . '\'); return false">remove</a></li>';
	}
	$output .= '</ul>';
	echo $output;
	exit(); // Kill any more output
}

if ($_GET['hem_action'] == 'remove_block'){
	auth_redirect(); // Make sure they're logged in
	$block_ref = $_GET['block_ref'];
	$block_place = $_GET['block_place'];
	
	$hemingwayEx->remove_block_in_place($block_place, $block_ref);

	ob_end_clean(); // Kill preceding output
	$output = '<ul>';
	foreach($hemingwayEx->get_block_contents($block_place) as $key => $block_ref){
			$block_name = $hemingwayEx->available_blocks[$block_ref];
			$output .= '<li>' . $block_name . ' <a href="#" class="remove" onclick="remove_block(\'' . $block_place . '\', \'' . $block_ref . '\'); return false">remove</a></li>';
	}
	$output .= '</ul>';
	echo $output;
	exit(); // Kill any more output
}

function hemingwayEx_message($message) {
	echo "<div id=\"message\" class=\"updated fade\"><p>$message</p></div>\n";
}

function hemingwayEx_update_version() {
	global $hemingwayEx;
	$known_update = get_option('hem_known_update');
	$found_update = $known_update;
	$new_version;
	
	// check for new versions if it's been a week
	if (date("Y-m-d", time() + 7 * 24 * 60 * 60) > get_option('hem_last_updated')) {
		// collects only publicly-available stats
		$stats = Array(
			'php'     => PHP_VERSION,
			'server'  => $_SERVER['SERVER_SOFTWARE'],
			'blog'    => 'Wordpress',
			'version' => get_bloginfo('version'),
			'url'     => get_bloginfo('wpurl'),
			'locale'  => WPLANG,
		);
		$args = array();
		foreach($stats as $key => $value) {
			$args[] = $key . '=' . urlencode($value);
		}
		$args = implode('&', $args);

		// load wp rss functions for update checking.
		if (!function_exists('parse_w3cdtf')) {
			require_once(ABSPATH . WPINC . '/rss-functions.php');
		}

		// note the updating and fetch potential updates
		update_option('hem_last_updated', date("Y-m-d"));
		$update = fetch_rss("http://nalinmakar.com/tag/hemingwayex/feed?$args");
		
		if ($update === False) {
			hemingwayEx_message(__('HemingwayEx tried to check for updates but failed. This might be the way PHP is set up, or just random network issues. Please <a href="http://nalinmakar.com/HemingwayEx">visit the HemingwayEx website</a> to update manually if needed.', 'hemingwayEx'));
			return;
		}

		// loop through feed, pulling out any updates
		foreach($update->items as $item) {
			$updates = Array();
			if (preg_match('|<!-- HemingwayEx:Update date="(\d{4}-\d{2}-\d{2})" version="(.*?)" -->|', $item['content']['encoded'], $updates)) {
				// if this is the newest update, save it
				if ($updates[1] > $found_update) {
					$found_update = $updates[1];
					$version = $updates[2];
				}
			}
		}
		
	}
	
	// if an newer update was found, save it
	if ($found_update > $known_update)
		update_option('hem_known_update', $found_update);

	// if the best-known update is newer than this ver, tell user
	if ($found_update > $hemingwayEx->date)
		hemingwayEx_message(__('An update of HemingwayEx is available</a> as of ', 'hemingwayEx') . $found_update . __('. Download <a href="http://nalinmakar.com/HemingwayEx">HemingwayEx ', 'hemingwayEx') . $version . __('</a>.', 'hemingwayEx'));
}

function hemingway_menu() {
	add_submenu_page('themes.php', 'HemingwayEx Options', 'HemingwayEx Options', 5, $hem_loc . 'functions.php', 'menu');
}

function menu() {

	global $hem_loc, $hemingwayEx, $message;
	
	if ($_POST['custom_styles']){
		update_option('hem_style', $_POST['custom_styles']);
		wp_cache_flush();
		$message  = 'Styles updated!';
	}
	
	if ($_POST['block_ref']){
		$hemingwayEx->add_available_block($_POST['display_name'], $_POST['block_ref']);
		$hemingwayEx->get_available_blocks();
		$message = 'Block added!';
	}
	
	if ($_POST['reset'] == 1){
		delete_option('hem_style');
		delete_option('hem_blocks');
		delete_option('hem_available_blocks');
		delete_option('hem_version');
		delete_option('hem_options');
		delete_option('hem_known_update');
		delete_option('hem_last_updated');
		$message = 'Settings removed. ';
	}
	
	if ($_POST['misc_options']){
		$hemingwayEx_options['international_dates'] = $_POST['international_dates'];
		$hemingwayEx_options['asides_category'] = $_POST['asides_category'];
		$hemingwayEx_options['excerpt_length'] = $_POST['excerpt_length'];
		update_option('hem_options', $hemingwayEx_options);
		wp_cache_flush();
		$message  = 'Options updated!';
	}

?>
<!--
Okay, so I don't honestly know how legit this is, but I want a more intuitive interface
so I'm going to import scriptaculous. There's a good chance this is going to mess stuff up
for some people :)
-->
<script type="text/javascript">
<?php include (TEMPLATEPATH . '/admin/js/prototype.js'); ?>
<?php include (TEMPLATEPATH . '/admin/js/effects.js'); ?>
<?php include (TEMPLATEPATH . '/admin/js/dragdrop.js'); ?>
</script>
<script type="text/javascript">
	function remove_block(block_place, block_ref){
		url = 'themes.php?page=functions.php&hem_action=remove_block&block_place=' + block_place + '&block_ref=' + block_ref;
		new Ajax.Updater(block_place, url, 
				{
					evalScripts:true, asynchronous:true,
					onComplete : function(request){
						$('dropmessage').innerHTML = "<p>Block removed!</p>";
						Effect.Appear('dropmessage', { queue: 'front' });
						Effect.Fade('dropmessage', { queue: 'end' });
					}
				}
		)
	}
</script>
<style>
	.block{
		width:200px;
		height:200px;
		border: 1px solid #bbb;
		background-color: #f0f8ff;
		float:left;
		margin:20px 1em 20px 0;
		padding:10px;
		display:inline;
	}
	.block ul{
		padding:0;
		margin:0;
	}
	.block ul li{
		margin:0 0 5px 0;
		list-style-type:none;
		border:1px solid #DDD;
		background:#FbFbFb;
		padding:4px 10px;
		position:relative;
	}
	.block ul li a.remove{
		position:absolute;
		right:10px;
		top:6px;
		display:block;
		text-decoration:none;
		font-size:1px;
		width:14px;
		height:14px;
		text-indent:-9999px;
		background:url(<?php bloginfo('stylesheet_directory'); ?>/admin/images/icon_delete.gif) 0 0 no-repeat #FFF;
		border:none;
	}
	* html .block ul li a.remove{ right:15px; }
	.block-active{
		border:1px solid #333;
		background:#F2F8FF;
	}
	
	#addables li{
		list-style-type:none;
		margin:1em 1em 1em 0;
		background:#F5F5F5;
		border:1px solid #CCC;
		padding:3px;
		width:215px;
		float:left;
		cursor:move;
	}
	ul#addables{
		margin:0;
		padding:0;
		width:720px;
		position:relative;
	}
</style>




<?php if($message) : 
	hemingwayEx_message($message);
	endif; ?>
<div id="dropmessage" class="updated" style="display:none;"></div>

<?php if (get_option('hem_version')) : ?>
<?php hemingwayEx_update_version(); ?>
<?php 
	// getting the hemingway options again. For some reason they disappear.
	$hemingwayEx_options = get_option('hem_options'); 
	$hemingwayEx_last_updated = get_option('hem_last_updated');
?>
<div class="wrap" style="position:relative;">
<h2><?php _e('HemingwayEx Options'); ?></h2>
<h3>Custom Styles</h3>
<p>Select a style from the dropdown below to customize HemingwayEx with a special style.</p>
<form name="dofollow" action="" method="post">
  <input type="hidden" name="page_options" value="'dofollow_timeout'" />
	<select name="custom_styles">
	<option value="none"<?php if ($hemingwayEx->style == 'none') echo ' selected="selected"'; ?>>No Custom Style</option>
	<?php
		$scheme_dir = @ dir(ABSPATH . '/wp-content/themes/' . get_template() . '/styles');
	
		if ($scheme_dir) {
			while(($file = $scheme_dir->read()) !== false) {
					if (!preg_match('|^\.+$|', $file) && preg_match('|\.css$|', $file)) 
					$scheme_files[] = $file;
				}
			}
			if ($scheme_dir || $scheme_files) {
				foreach($scheme_files as $scheme_file) {
				if ($scheme_file == $hemingwayEx->style){
					$selected = ' selected="selected"';
				}else{
					$selected = "";
				}
				echo '<option value="' . $scheme_file . '"' . $selected . '>' . $scheme_file . '</option>';
			}
		} 
		?>
	</select>

	<input type="submit" value="Save" />
</form>

<p>Drag and drop the different blocks into their place below. After you drag the block to the area, it will update with the new contents automatically.</p>
<ul id="addables">
	<?php foreach($hemingwayEx->available_blocks as $ref => $name) : ?>
	<li id="<?php echo $ref ?>" class="blocks"><?php echo $name ?></li>
	<script type="text/javascript">new Draggable('<?php echo $ref ?>', {revert:true})</script>
	<?php endforeach; ?>
</ul>

<div class="clear"></div>

<h3>HemingwayEx's Slidebar&trade;</h3>
<div class="clear"></div>
<div class="block" id="block_1">
	<ul>
		<?php 
		foreach($hemingwayEx->get_block_contents('block_1') as $key => $block_ref) :
			$block_name = $hemingwayEx->available_blocks[$block_ref];
		?>
			<li><?php echo $block_name ?> <a href="#" class="remove" onclick="remove_block('block_1', '<? echo $block_ref ?>'); return false">remove</a></li>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
Droppables.add(
	'block_1', {
		accept:'blocks', 
		onDrop:function(element){
			new Ajax.Updater('block_1', 'themes.php?page=functions.php&hem_action=add_block&block_place=block_1&block_ref=' + element.id, 
				{
					evalScripts:true, asynchronous:true
				}
			)
		}, 
		hoverclass:'block-active'
	}
)
</script>

<div class="block" id="block_2">
	<ul>
		<?php 
		foreach($hemingwayEx->get_block_contents('block_2') as $key => $block_ref) :
			$block_name = $hemingwayEx->available_blocks[$block_ref];
		?>
			<li><?php echo $block_name ?> <a href="#" class="remove" onclick="remove_block('block_2', '<? echo $block_ref ?>'); return false">remove</a></li>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
Droppables.add(
	'block_2', {
		accept:'blocks', 
		onDrop:function(element){
			new Ajax.Updater('block_2', 'themes.php?page=functions.php&hem_action=add_block&block_place=block_2&block_ref=' + element.id, 
				{
					evalScripts:true, asynchronous:true
				}
			)
		}, 
		hoverclass:'block-active'
	}
)
</script>

<div class="block" id="block_3">
	<ul>
		<?php 
		foreach($hemingwayEx->get_block_contents('block_3') as $key => $block_ref) :
			$block_name = $hemingwayEx->available_blocks[$block_ref];
		?>
			<li><?php echo $block_name ?> <a href="#" class="remove" onclick="remove_block('block_3', '<? echo $block_ref ?>'); return false">remove</a></li>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
Droppables.add(
	'block_3', {
		accept:'blocks', 
		onDrop:function(element){
			new Ajax.Updater('block_3', 'themes.php?page=functions.php&hem_action=add_block&block_place=block_3&block_ref=' + element.id, 
				{
					evalScripts:true, asynchronous:true
				}
			)
		}, 
		hoverclass:'block-active'
	}
)
</script>


<div class="clear"></div>

<h3>HemingwayEx's Bottombar&trade;</h3>
<div class="clear"></div>
<div class="block" id="block_4">
	<ul>
		<?php 
		foreach($hemingwayEx->get_block_contents('block_4') as $key => $block_ref) :
			$block_name = $hemingwayEx->available_blocks[$block_ref];
		?>
			<li><?php echo $block_name ?> <a href="#" class="remove" onclick="remove_block('block_4', '<? echo $block_ref ?>'); return false">remove</a></li>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
Droppables.add(
	'block_4', {
		accept:'blocks', 
		onDrop:function(element){
			new Ajax.Updater('block_4', 'themes.php?page=functions.php&hem_action=add_block&block_place=block_4&block_ref=' + element.id, 
				{
					evalScripts:true, asynchronous:true,
					onComplete : function(request){
						$('dropmessage').innerHTML = "<p>Block added!</p>";
						Effect.Appear('dropmessage', { queue: 'front' });
						Effect.Fade('dropmessage', { queue: 'end' });
					}
				}
			)
		}, 
		hoverclass:'block-active'
	}
)
</script>

<div class="block" id="block_5">
	<ul>
		<?php 
		foreach($hemingwayEx->get_block_contents('block_5') as $key => $block_ref) :
			$block_name = $hemingwayEx->available_blocks[$block_ref];
		?>
			<li><?php echo $block_name ?> <a href="#" class="remove" onclick="remove_block('block_5', '<? echo $block_ref ?>'); return false">remove</a></li>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
Droppables.add(
	'block_5', {
		accept:'blocks', 
		onDrop:function(element){
			new Ajax.Updater('block_5', 'themes.php?page=functions.php&hem_action=add_block&block_place=block_5&block_ref=' + element.id, 
				{
					evalScripts:true, asynchronous:true,
					onComplete : function(request){
						$('dropmessage').innerHTML = "<p>Block added!</p>";
						Effect.Appear('dropmessage', { queue: 'front' });
						Effect.Fade('dropmessage', { queue: 'end' });
					}
				}
			)
		}, 
		hoverclass:'block-active'
	}
)
</script>

<div class="block" id="block_6">
	<ul>
		<?php 
		foreach($hemingwayEx->get_block_contents('block_6') as $key => $block_ref) :
			$block_name = $hemingwayEx->available_blocks[$block_ref];
		?>
			<li><?php echo $block_name ?> <a href="#" class="remove" onclick="remove_block('block_6', '<? echo $block_ref ?>'); return false">remove</a></li>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
Droppables.add(
	'block_6', {
		accept:'blocks', 
		onDrop:function(element){
			new Ajax.Updater('block_6', 'themes.php?page=functions.php&hem_action=add_block&block_place=block_6&block_ref=' + element.id, 
				{
					evalScripts:true, asynchronous:true,
					onComplete : function(request){
						$('dropmessage').innerHTML = "<p>Block added!</p>";
						Effect.Appear('dropmessage', { queue: 'front' });
						Effect.Fade('dropmessage', { queue: 'end' });
					}
				}
			)
		}, 
		hoverclass:'block-active'
	}
)
</script>



<div class="clear"></div>

	<?php
		$blocks_dir = @ dir(ABSPATH . '/wp-content/themes/' . get_template() . '/blocks');
	
		if ($blocks_dir) {
			while(($file = $blocks_dir->read()) !== false) {
					if (!preg_match('|^\.+$|', $file) && preg_match('|\.php$|', $file)) 
					$blocks_files[] = $file;
				}
			}
			if ($blocks_dir || $blocks_files) {
				foreach($blocks_files as $blocks_file) {
				$block_ref = preg_replace('/\.php/', '', $blocks_file);
				if (!array_key_exists($block_ref, $hemingwayEx->available_blocks)){
				?>
				<h3>You have uninstalled blocks!</h3>
				<p>Give the block <strong><? echo $block_ref ?></strong> a display name (such as "About Page")</p>
				<form action="" name="dofollow" method="post">
					<input type="hidden" name="block_ref" value="<? echo $block_ref ?>" />
					<? echo $block_ref ?> : <input type="text" name="display_name" />
					<input type="submit" value="Save" />
				</form>
				<?
				}
			}
		} 
		?>


<h3>Miscellaneous Options</h3>
<form name="dofollow" action="" method="post">
<h4>Aside Category</h4>
<p>
Enter the category name that you wish to designate as the
asides category. This is case insensitive, but make sure you enter in
the name correctly.
</p>
<p><input type="text" name="asides_category" value="<?php echo $hemingwayEx_options['asides_category']; ?>" size="20" /><br />
Recommended: <code>Asides</code></p>	
<input type="hidden" name="misc_options" value="1" />
<h4>Excerpt Length</h4>
<p>
Enter the length of excerpt in number of words. If length is not 
specified or is set to 0, it will default to 75 words. Also, this will 
only be used if an excerpt isn't already defined for the post.
</p>
<p><input type="text" name="excerpt_length" value="<?php echo $hemingwayEx_options['excerpt_length']; ?>" size="3" /></p>
<h4>Date Format</h4>
<p><label><input type="checkbox" value="1" name="international_dates" <?php if ($hemingwayEx_options['international_dates'] == 1) echo "checked=\"checked\""; ?> /> Use international dates? (day/month/year)</label></p>
<p><input type="submit" value="Save my options" /></p>
</form>

<br />
<h3><?php _e('Updates'); ?></h3>
<p>HemingwayEx checks for new versions when you bring up this page. (At most once per week.)</p>
<p>This copy of HemingwayEx is version <b><?php echo $hemingwayEx->version; ?></b> released on <b><?php echo $hemingwayEx->date; ?></b>.</p>
<p>Last checked on <b><?php echo $hemingwayEx_last_updated; ?></b>.</p>

<br />
<h3>Reset / Uninstall</h3>
<form action="" method="post" onsubmit="return confirm('Are you sure you want to reset all of your settings?')">
<input type="hidden" name="reset" value="1" />
<p>If you would like to reset or uninstall HemingwayEx, push this button. It will erase all of your preferences. <input type="submit" value="Reset" /></p>
</form>

<?php else: ?>
<div class="wrap" style="position:relative;">
<p>Thank you for using HemingwayEx!  There's two reasons you might be seeing this:</p>
<ol>
	<li>You've just installed HemingwayEx for the first time: If this is the case, simply reload this page or click on HemingwayEx Options again and you'll be on your way!</li>
	<li>You've just uninstalled HemingwayEx or reset your options. If you'd like to keep using HemingwayEx, reload this page or click on HemingwayEx Options again.</li>
</ol>
<?php endif; ?>

</div>

<?php
}
?>