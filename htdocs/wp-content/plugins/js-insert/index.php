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





function add_subscribe( $atts, $content, $name ) {
    ob_start();
    ?>
    <div class="urgent <?php echo $atts['cssclass']; ?>">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <h3><?php echo $content; ?></h3>
            </div>
        </div>
        <div class="row">
            <form class="col-xs-6 col-xs-offset-3">
                <div class="form-group">
                    <label for="exampleInputName2">Name</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                </div>
                <button type="submit" class="btn btn-default">Send invitation</button>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php
    $content = ob_get_contents();
    ob_clean();
    return $content;
}
add_shortcode( 'subscribe', 'add_subscribe' );


function title_filter($title) {
    return ('ez a cím');
}
add_filter('the_title', 'title_filter');