<?php
namespace App\Models;

use Core\Module;
use PDO;
use PDOException;

/**
 * Post Model 
 * PHP version 8.1
 */
class Post extends \Core\Model
{
    /**
     * Get all the post as an associative array
     * 
     * @return void
     */
    public static function getAll()
    {
        // $host     = 'localhost';
        // $dbname   = 'mvc';
        // $username = 'root';
        // $password = '';
        try {
            //code...
            //$db = new PDO("mysql:host=$host; dbname=$dbname;charset=utf8",$username,$password);
            $db = static::getDB();

            $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
            
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $results;
            
        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
        }
    }
}

?>