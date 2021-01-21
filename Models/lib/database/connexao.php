<?php
abstract class Connection
{
    private static $conn = null;

    public static function getConn()
    {
        if(self::$conn == null)
        {
            self::$conn = new PDO('mysql:host=localhost; dbname=pastelaria_gaucho;', 'root', '');
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return self::$conn;
        } else
        {
            return self::$conn;
        }
    }


}
 ?>
