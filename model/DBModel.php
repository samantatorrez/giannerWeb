<?php
/**
 *
 */
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
    }
  }

  public function buildDDBfromFile($dbName, $dbFile)
  {
    try{
      $this->db = new PDO('mysql:host=localhost', "root", "");
      $this->db->exec('CREATE DATABASE IF NOT EXISTS '.$dbName);
      $this->db->exec('USE '.$dbName);
      echo "antes";
      $queries = $this->loadSQLSchema($dbFile);
      echo "aqui";
      $i=0;
      while ($i < count($queries) && strlen($this->db->errorInfo()[2])==0)
      {
        $this->db->exec($queries[$i]);
        echo $queries[$i];
        $i++;
      }
    } catch (PDOException $e) {
      echo $e;
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
