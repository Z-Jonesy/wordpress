<?php
/**
 * Termékek lekérése -> Created by PhpStorm.
 * Metódusok:
 *  get, getAll,   termékek lekérése
 *  post   termékek frissítése
 *  put    új termék létrehozása
 *  delete
 *
 * User: zozo
 * Date: 24/02/2018
 * Time: 12:10
 */

/* Adatbázis model */

class ProductModel
{

    //adattábla neve
    private $table = 'wp_products';

    public function printError($message)
    {
        return json_encode(array("error" => $message));
    }

    //lekérdezés
    public function get($id = null)
    {
        global $wpdb;
        $where = is_null($id) ? "" : "WHERE i = id";
        $result = $wpdb->get_results(
            "SELECT * FROM $this->table $where"
        );
        if (!is_null($id)) {
            if (count($result)>0) {
                return $result[0];
            } else {
                return null;
            }
        }
        return $result;
    }

    //frissítés
    public function update($data = null, $where = '', $limit = 1)
    {
        global $wpdb;
        if (is_null($data)) {
            return printError('No data for the update');
        }
        if ($where === '') {
            return $this->printError('No where érték in update');
        }
        return $wpdb->update(
            $this->table, $data, $where . "LIMIT $limit"
        );
    }

    //Beszúrás
    public function insert($data = null)
    {
        global $wpdb;
        if (is_null($data)) {
            return printError('No data for the insert');
        }

        return $wpdb->insert(
            $this->table, $data
        );
    }


    //Törlés
    public function delete($id = null)
    {
        global $wpdb;
        if (is_null($id)) {
            return printError('No data for the delete');
        }

        return $wpdb->delete($this->table, array('id' => $id));
    }
}