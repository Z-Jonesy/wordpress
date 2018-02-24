<?php
/**
 * Created by PhpStorm.
 * User: zozo
 * Date: 24/02/2018
 * Time: 13:04
 */

class ProductController
{

    private $method;
    private $model;
    private $methodPairs = array(
        'get' => 'get',
        'post' => 'update',
        'put' => 'insert',
        'delete' => 'delete'
    );

    function __construct()
    {
        $this->model = new ProductModel;

        // metódus meghatározása
        $this->getMethod();

        // input adatok összegyűjtése
        $input = $this->getInput();

        // modell metódus hívása
        switch ($this->method) {
            case 'get':
                if (isset($input->id)) {
                    exit(json_encode($input));
                    $result = $this->model->get($input->id);
                } else {
                    $result = $this->model->get();
                }
                break;
            default:
                break;
        }

        echo json_encode($result);
        wp_die();
    }

    private function getMethod()
    {
        $this->method = strtolower($_SERVER['REQUEST_METHOD']);
    }

    private function getInput()
    {
        $input = file_get_contents('php://input');
        if (strlen($input) < 1) {
            $input = new stdClass();
        } else {
            $input = json_decode($input);
        }
        $input = json_decode($input);
        if (count($_GET) > 0) {
            foreach ($_GET as $key => $value) {
                $input->{$key} = $value;
            }
        }

    }
}