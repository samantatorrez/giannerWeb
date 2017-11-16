<?php
require_once(__DIR__ .'\..\..\controller\SecuredController.php');
abstract class Api extends SecuredController{
  protected $model;
  protected $raw_data;
  function __construct(){
    parent::__construct();
    $this->raw_data = file_get_contents("php://input");
  }

  protected function json_response($data, $status) {
    header("Content-Type: application/json");
    header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
    return json_encode($data);
  }

  private function _requestStatus($code){
      $status = array(
        200 => "OK",
        404 => "Not found",
        500 => "Internal Server Error"
      );
      return ($status[$code])? $status[$code] : $status[500];
    }
}
 ?>
