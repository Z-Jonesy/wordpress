<?php
/**
 * Created by PhpStorm.
 * User: zozo
 * Date: 24/02/2018
 * Time: 19:28
 */

// JS fájlok beszúrása
function add_my_scripts()
{

    // az ajax handler script beszúrása az oldal láblécébe
    wp_enqueue_script(
        'b_handler',
        plugins_url('product-listing/js/bootstrap.min.js'),
        array('jquery'),
        date('YmdHis'),
        true
    );

    wp_enqueue_script(
        'angular_handler',
        plugins_url('product-listing/js/angular.min.js'),
        array('jquery'),
        date('YmdHis'),
        true
    );

    // PHP változók hozzáadása a scripthez
    wp_localize_script(
        'ajax-handler',
        'ajax-Options',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'actionName' => 'it_ajax'
        )
    );

    wp_enqueue_style(
        'page-style',
        plugins_url('product-listing/css/page-css.css'),
        array(),
        date('YmdHis')
    );
    wp_enqueue_style(
        'b-style',
        plugins_url('product-listing/css/bootstrap.min.css'),
        array(),
        date('YmdHis')
    );

}
add_action('wp_enqueue_scripts', 'add_my_scripts');

?>