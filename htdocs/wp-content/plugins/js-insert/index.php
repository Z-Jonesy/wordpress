<?php
/*
Plugin Name: JS inserter
Plugin URI: http://zbits.hu/
Description: Plugin to help you to insert js files
Version: 0.0.1
Author: Zozi
Author URI: http://zbits.hu
License: MIT
Text Domain: JSinsert
*/

//JS fájlok beszúrása a frontend oldalra


function add_my_scripts(){
    wp_enqueue_script(
        'ajax_handler',
        plugins_url('js-insert/js/ajax-handler.js'),
        ['jquery'],
        date('YmdHis'),
        true
        );
}
add_action( 'wp_enqueue_scripts', 'add_my_scripts' );