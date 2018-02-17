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

function add_my_scripts()
{

    // az ajax handler script beszúrása az oldal láblécébe
    wp_enqueue_script(
        'ajax_handler',
        plugins_url('js-insert/js/ajax-handler.js'),
        ['jquery'],
        date('YmdHis'),
        true
    );

    // PHP változók hozzáadása a scripthez
    wp_localize_script(
        'ajax-handler',
        'ajaxOptions',
        [
            'ajaxurl' => admin_url('admin-ajax.php'),
            'actionName' => 'it_ajax'
        ]
    );
}

add_action('wp_enqueue_scripts', 'add_my_scripts');

// style beszúrása
function add_my_style() {
    wp_enqueue_style(
        'page-style',
        plugins_url('js-insert/css/page-css.css'),
        array(),
        date('YmdHis')
    );
}
add_action('wp_enqueue_style', 'add_my_style');