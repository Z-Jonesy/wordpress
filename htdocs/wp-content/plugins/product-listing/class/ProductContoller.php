<?php
/**
 * Created by PhpStorm.
 * User: zozo
 * Date: 24/02/2018
 * Time: 13:04
 */

class ProductController {

    private $method;
    private $model;
    private $methodPairs = array(
      'get' => 'get',
      'post' => 'update',
      'put' =>'insert',
      'delete' => 'delete'
    );

    function __construct()
    {
        $this->model = new ProductModel;
        $this->getMethod();
        $input = $this->getInput();
        echo json_encode($input);
        wp_die();
        $result = call_user_func(
            array(
                $this->model,
                $this->methodPairs[$this->method]
            )
        );
        echo json_encode($result);
        wp_die();
    }

    private function getMethod(){
        $this->method = strtolower( $_SERVER['REQUEST_METHOD']);
    }

    private function getInput() {
        return file_get_contents( 'php://input');
    }
}