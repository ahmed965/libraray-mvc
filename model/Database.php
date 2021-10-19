<?php
class Database {
  private static $con;

  public static function setConnection() {
    self::$con = new PDO("mysql:host=localhost;dbname=library", "root", "");
    self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  protected function getConnection() {
    if(self::$con === null) {
      self::setConnection();
    }
    return self::$con;
  }
}
