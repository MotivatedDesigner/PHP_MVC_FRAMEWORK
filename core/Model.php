<?php

namespace Core;

use PDO;
use App\Config;

/**
 * Base model
 */
abstract class Model
{

    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) 
        {
            $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME;
            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD, $options);
        }

        return $db;
    }
}
