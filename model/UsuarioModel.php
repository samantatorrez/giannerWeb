<?php
  include_once 'DBModel.php';

  class LoginModel extends DBModel
  {

    function __construct()
    {
      parent::__construct();
    }

    public function getUsuario($userName)
    {
      $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE username = ? LIMIT 1");
      $sentencia->execute([$userName]);
      return $sentencia->fetch(PDO::FETCH_ASSOC);
    }

  }

?>
