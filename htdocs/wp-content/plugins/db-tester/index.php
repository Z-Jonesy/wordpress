<?php
/*
Plugin Name: DB-tester
Plugin URI: http://zbits.hu/
Description: Plugin for testing wordpress native DB engine
Version: 0.0.1
Author: Zozi
Author URI: http://zbits.hu
License: MIT
Text Domain: DB-tester
*/

// Plugin inditasa
function load_db_tester_plugin(){
    add_menu_page( 
        'DB test page',
        'DB tester', 
        'edit_users', 
        'db_tester', 
        'init_db_tester_page'
    );
}
// Az akció aminek hatására az indító fgv lefut
add_action( 'admin_menu', 'load_db_tester_plugin' );

// Menüpont tartalmának generálása
function init_db_tester_page() {
    include 'db_page.php';
}

// admin footer hook ... ajax példa
function my_action_callback() {
	global $wpdb;
	$records = $wpdb->get_results("SELECT * FROM $wpdb->posts");
	echo json_encode( $records);
	echo 'szia zozi javascript';
	wp_die();
}
add_action( 'wp_ajax_nopriv_my_action', 'my_action_callback');

// ajax url beállítása js-nek
function pluginname_ajaxurl() {
	?>
<script type="text/javascript">
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
<?php

}
add_action('wp_head', 'pluginname_ajaxurl');