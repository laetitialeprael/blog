<?php

namespace Src\Models;

use Src\Database;

/**
 * Class Manager
 *
 * @package Src
 */
class Manager
{
    public const DB_NAME = 'openclassroomsblog';
    public const DB_USER = 'root';
    public const DB_PASS = 'root';
    public const DB_HOST = 'localhost';


    private static $_database;

    /**
     * Méthode pour se connecter à la base de donnée
     *
     * @return string $_database
     */
    public static function getDatabase()
    {
        if (self::$_database === null) {
            self::$_database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        return self::$_database;
    }
}
