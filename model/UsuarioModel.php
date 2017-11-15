<?php
  require_once 'DBModel.php';

  class LoginModel extends DBModel
  {

    function __construct()
    {
      parent::__construct();
    }

    public function getUsuario($mail)
    {
      $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE mail = ? LIMIT 1");
      $sentencia->execute([$mail]);
      return $sentencia->fetch(PDO::FETCH_ASSOC);
    }

  }

?>
