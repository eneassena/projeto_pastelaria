<?php 
abstract class Connection
{
    private static $conn;

    public static function getConn() 
    {
        if(self::$conn == null) 
        {
            self::$conn = new PDO('mysql:host=localhost; dbname=exemplo_pastelaria_model;', 'admin', 'abc123');
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$conn;
        } else 
        {
            return self::$conn;
        }
    }
}
 ?>