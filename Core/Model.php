<?php

namespace Core;

use App\Config;
use PDO;
use PDOException;


/**
 * DataBase model
 *  
 * PHP Version 8.1
 */
abstract class Model
{
    /**
     * GET the PDO database connection
     * 
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            // $host = 'localhost';
            // $dbname = 'mvc';
            // $username = 'root';
            // $password = '';

            try {
                //code...
                //$db = new PDO("mysql:host=$host; dbname=$dbname;charset=utf8", $username, $password);
                // Implementieren Config class 
                $config = new Config();
                $dsn = 'mysql:host='. $config::DB_HOST .';dbname='. $config::DB_NAME .';charset=utf8';
                $db = new PDO($dsn, $config::DB_USER , $config::DB_PASSWORD );

                //Throw an Exception when an error occurs
                $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                return $db;

            }
            catch (PDOException $e) {
                //throw $th;
                echo $e->getMessage();
            }
        }
    }

}
?>