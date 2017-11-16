<?php
  require_once 'DBModel.php';

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

    public function isUser($username){
      $sentencia = $this->db->prepare( "SELECT role FROM usuario WHERE username = :username LIMIT 1");
      $sentencia->execute(array(":username"=>$username));
      $role = $sentencia->fetch();
      $admin = 0;
      return $role["role"] == $admin ;
    }

    public function isUsernameUsed($username){
      $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE username = :username LIMIT 1");
      $sentencia->execute(array(":username"=>$username));
      $user = $sentencia->fetch();
      return $user.lenght > 0;
    }

    public function borrarUsuario($id){
      $sql = 'DELETE FROM usuario WHERE id = :id';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(":id"=>$id));
      if($sentencia->rowCount()==0){
        throw new DataBaseException("Error no es posible borrar esta categoria.");
      }
    }

    public function obtenerUsuarios()
    {
      $sentencia = $this->db->prepare( "SELECT id, username, role  FROM usuario");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateRole($id,$role){
      $sql = 'UPDATE usuario SET role=:role WHERE id=:id';
      $sentencia = $this->db->prepare($sql);
      $sentencia->execute(array(":role"=>$role, ":id"=>$id));
      if($sentencia->rowCount()==0){
        throw new DataBaseException("Error no es posible editar este usuario.");
      }
    }

    public function getUserById($id)
    {
      $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE id = :id LIMIT 1");
      $sentencia->execute(array(":id"=>$id));
      return $sentencia->fetch(PDO::FETCH_ASSOC);
    }


  }

?>
