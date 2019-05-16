<?php

// Install database
function s2l_install_db() {
	global $wpdb;
	$table_name = $wpdb->prefix . "shorten2list";

	if( $wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name ) {
		$sql = "CREATE TABLE " . $table_name . " (
			`lid` bigint(20) NOT NULL auto_increment,
			`user_id` bigint(20) NOT NULL,
			`name` varchar(255) NOT NULL default 'New Maillist',
			`from` varchar(255) NOT NULL default '',
			`to` varchar(255) NOT NULL default '',
			`triggers` varchar(420) NOT NULL default 'featured',
			PRIMARY KEY  (`lid`)
			);";

		require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
		dbDelta($sql);
		add_option('shorten2list_db_version', '1.0');
	}

}


// Grab all Maillist for a specific user
function s2l_get_lists_user($user_id) {
	global $wpdb;
	$table_name = $wpdb->prefix . "shorten2list";

	$listLists = $wpdb->get_results("SELECT * FROM $table_name WHERE user_id = $user_id", ARRAY_A);

	return $listLists;
}

// Save all Maillists for a specific user
function s2l_update_lists_user($user_id, $maillists) {
	global $wpdb;
	$table_name = $wpdb->prefix . "shorten2list";

	$sqlDelete = sprintf( "DELETE FROM `%s` WHERE `user_id` = %d", $table_name, $user_id );
	$results = $wpdb->query($sqlDelete);

	foreach ( $maillists as $ml ) {
		$data_array = array('user_id' => $user_id,
							'name' => $wpdb->escape($ml['name']),
							'from' => $wpdb->escape($ml['from']),
							'to' => $wpdb->escape($ml['to']),
							'triggers' => $wpdb->escape($ml['triggers']));
		$results = $wpdb->insert( $table_name, $data_array );
	}
} 

function s2l_get_the_name($array_in, $lcase = true) {

	$lcases = “àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ”;
    $ucases = “ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß”;

	foreach( $array_in as $array_one ) {
		$value = $array_one->name ;
		if($lcase) {
			$astr = strtr( strtolower( $value ), $ucases, $lcases );
		} else {
			$astr = strtr( strtoupper( $value ), $lcases, $ucases );
		}
		$array_out[] = $astr;
	}
	return $array_out;
}

// Grab all Maillist for a specific user and Tags/Categories in a post
function s2l_get_lists_post($user_id, $post_id) {
	global $wpdb;
	$table_name = $wpdb->prefix . "shorten2list";

	$sql = "SELECT * FROM `".$table_name."` WHERE `user_id` = ".$user_id;
	$listLists = $wpdb->get_results($sql, ARRAY_A);

	$post_tags_cats = get_the_tags($post_id);
	$post_tags = s2l_get_the_name($post_tags_cats);
	$post_tags_cats = get_the_category($post_id);
	$post_cats = s2l_get_the_name($post_tags_cats);
	$post_trigs = array_unique(array_merge($post_tags, $post_cats));

	foreach( $listLists as $s2l_list ) {
		if( empty( $s2l_list['triggers'] ) ) {
			$s2l_Arr[] = array( 'name' => trim($s2l_list['name']), 'from' => trim($s2l_list['from']), 'to' => trim($s2l_list['to']) );
		} else {
			$s2l_trigs = explode(",", $s2l_list['triggers']);
			for( $x = 0; $x < sizeof($s2l_trigs);  $x++ ) {
				for( $z = 0; $z < sizeof($post_trigs);  $z++ ) {
					if( strtolower(trim($s2l_trigs[$x])) == strtolower(trim($post_trigs[$z])) ) {
						$s2l_Arr[] = array( 'name' => trim($s2l_list['name']), 'from' => trim($s2l_list['from']), 'to' => trim($s2l_list['to']) );
						break 2;
					}
				}
			}
		}
	}
	return $s2l_Arr;
}

?>