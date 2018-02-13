<div>
 &nbsp;
</div>
<?php
    if (!function_exists('init_db_tester_page')){
        exit('No access for you body ...');
    }
// Ha a postban megtalálható a get request elem
    if ( isset($_POST['get_request'])) {
        global $wpdb;
        $tabla = $wpdb->prefix.'options';
        $site_url = $wpdb->get_var(
            "SELECT option_value FROM $tabla WHERE option_name = 'siteurl'"
        );
        var_dump ( $site_url );
    }
    if ( isset($_POST['get_request'])) {
        global $wpdb;
        $tabla = $wpdb->prefix.'options';
        $site_url = $wpdb->get_results(
            "SELECT option_value FROM $tabla WHERE option_name = 'siteurl'"
        );
        echo ( $site_url );
        echo $site_url[0]->option_value;
    }
    if (isset($_POST['insert_request'])){
        global $wpdb;

        // tábla a beszúráshoz
        $table = $wpdb->prefix.'products';

        // adatok a beszúráshoz
        $data = [
          'name' => 'borotva',
          'price' => 2999
        ];

        //formátunok meghatározása
        $formats = [ '%s', '%d'];

        // adatok beszúrása
        $wpdb->insert($table, $data, $formats);

        // adat id visszakérdezés, nyugtázás
        echo "A record'.$wpdb->insert_id.'-vel beszúrásra került";
    }

if (isset($_POST['update_request'])){
	global $wpdb;

	// tábla a beszúráshoz
	$table = $wpdb->prefix.'products';

	// adatok a beszúráshoz
	$data = [
		'name' => 'tükör',
		'price' => 999
	];

	// feltétel
    $where = ['id' => 2];


	// adatok beszúrása
	$row_num = $wpdb->update($table, $data, $where);

	// adat id visszakérdezés, nyugtázás
	if ($row_num === false ) {
	    echo $wpdb->last_error;
	    echo '<br> last query: '.$wpdb->last_query;
    } else {
        echo "$row_num frissült";
    }
}
?>

<div>
<form method="post">
<input type="submit" name="get_request" value="get kérés">
</form>
</div>

<div>
    <form method="post">
        <input type="submit" name="insert_request" value="insert">
    </form>
</div>

<div>
    <form method="post">
        <input type="submit" name="update_request" value="update">
    </form>
</div>

<div>
    <form method="post">
        <input type="submit" name="delete_request" value="delete">
    </form>
</div>
