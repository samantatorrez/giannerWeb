<?php
  include_once 'exceptions/ListExceptions.php';

  class DBModel
  {
    protected $db;

    function __construct()
    {
      try{
        $this->db = new PDO('mysql:host=localhost;'.
        'dbname=gianner_web_db;charset=utf8', 'root', '');
      } catch (PDOException $e){
        $this->buildDDBfromFile('gianner_web_db','db/gianner_web_db.sql');
        error_log( $e->getMessage());
      }
    }

    public function buildDDBfromFile($dbName, $dbFile)
    {
      try{
        $this->db = new PDO('mysql:host=localhost', "root", "");
        $this->db->exec('CREATE DATABASE IF NOT EXISTS '.$dbName);
        $this->db->exec('USE '.$dbName);
        $queries = $this->loadSQLSchema($dbFile);
        $i=0;
        while ($i < count($queries) && strlen($this->db->errorInfo()[2])==0)
        {
          $this->db->exec($queries[$i]);
          $i++;
        }
      } catch (PDOException $e) {
        throw new DataBaseException("Error creando nueva base desde archivo o problema de conexión con la base.");
      } catch (Exception $e){
        error_log( $e->getMessage());
      }
    }

    public function loadSQLSchema($dbFile)
    {
      # esto es temporal hasta que expliquen lo de archivos
      $myfile = file_get_contents($dbFile);
      $queries = explode(";", $myfile);
      return $queries;
    }

  }

?>
