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
      $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE username = :username LIMIT 1");
      $sentencia->execute(array(":username"=>$userName));
      return $sentencia->fetch(PDO::FETCH_ASSOC);
    }

    public function addUsuario($username,$pass,$role)
    {
      $sql= 'INSERT INTO usuario(username, password, role)'
      .' VALUES(:username, :pass, :role)';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(":username"=>$username,":pass"=>$pass,":role"=>$role));
      return $username;
    }

    public function isAdmin($username){
      $sentencia = $this->db->prepare( "SELECT role FROM usuario WHERE username = :username LIMIT 1");
      $sentencia->execute(array(":username"=>$username));
      $role = $sentencia->fetch();
      $admin = 1;
      return $role["role"] == $admin ;
    }

  }

?>
