<?php
/*
Plugin Name: Product lister
Plugin URI: http://zbits.hu/
Description: Listing and editing
Version: 0.0.1
Author: Zozi
Author URI: http://zbits.hu
License: MIT
Text Domain: Product lister
*/

//CRUD kérések kezelése
function crud_action_callback()
{
    include 'class/ProductModel.php';
    include 'class/ProductController.php';
    $controller = new ProductController();
    wp_die();
}

add_action('wp_ajax_nopriv_crud_action', 'crud_action_callback');

include 'class/insertjs.php';

/*
var req = new XMLHttpRequest;
req.open('get', ajaxurl+'?action=crud_action');
req.onloadend = function(ev) {
console.log(ev.target.response);
}
req.send;
 */
