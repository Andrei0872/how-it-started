<?php
include_once 'config.php';
class Crud extends Database {
  public function __construct() {
    parent::__construct();
  }
  public function getData($query) {
    $result = $this->connection->query($query);
    if ($result == false) {
      return false;
    }
    $rows = array();
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }
    return $rows;
  }
  public function execute($query) {
    $result = $this->connection->query($query);
    if ($result == false) {
      echo 'Error: cannot execute the command';
      return false;
    } else {
      return true;
    }
  }
  public function delete($nr, $table) {
    $query  = "DELETE FROM $table WHERE nr = $nr";
    $result = $this->connection->query($query);
    if ($result == false) {
      echo 'Error: cannot delete nr ' . $nr . ' from table ' . $table;
      return false;
    } else {
      return true;
    }
  }
  public function escape_string($value) {
    return $this->connection->real_escape_string($value);
  }
}
?>
