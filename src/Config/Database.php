<?php
namespace AHT\Config;

use PDO;

class Database
{
    private static $bdd = null;

    private function __construct()
    {       
    }

/**
 * connect to Database throught PDO
*/
    public static function getBdd()
    {
        if (is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost;dbname=mvc", 'root', '');
        }
        return self::$bdd;
    }
}
