<?php

namespace Src\Controllers;

use Src\Database;

/**
 * Class Controller
 *
 * @package Src
 */
class Controller
{
    public const DB_NAME = 'openclassroomsblog';
    public const DB_USER = 'root';
    public const DB_PASS = 'root';
    public const DB_HOST = 'localhost';


    private static $database;

    /**
     * Méthode pour se connecter à la base de donnée
     *
     * @return void
     */
    public function getDatabase()
    {
        if (self::$database === null) {
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        return self::$database;
    }

    /**
     * Méthode pour vérifier l'email dans la variable $_SESSION
     *
     * @return void
     */
    public function isAuth()
    {
        if (!isset($_SESSION['email'])) {
            header('Location: /blog/connexion');
        }
    }
}
