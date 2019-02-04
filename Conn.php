<?php
class Conn{
  public static $host = "localhost";
  public static $user = "root";
  public static $pass = "";
  public static $dbName = "celke";
  private static $connect = null;

  private static function Conectar(){
    try {
      if(self::$connect == null):
        self::$connect = new PDO('mysql:host='  .self::$host . ';dbname='. self::$dbName, self::$user, self::$pass);
      endif;
    } catch (\Exception $e) {
      echo 'Mensagem: ' . $ex->getMessage();
      die;
    }
    return self::$connect;
  }

  public function getConn(){
      return self::Conectar();
  }
}
?>
