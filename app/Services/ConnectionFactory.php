<?php

namespace app\Services;

use src\Exceptions\AuthException;

/**
 * Class ConnectionFactory extends \PDO
 * 
 * @package app\Services
 */
class ConnectionFactory extends \PDO
{
    /**
     * @var string $host
     * @var string $database
     * @var string $password
     * @var string $user
     * @var string $sql
     */
    protected static string $host = DB_SERVER;
    protected static string $database = DB_NAME;
    protected static string $password = DB_PASSWORD;
    protected static string $user = DB_USER;
    protected static $sql;

    /**
     * Connect to database.
     * 
     * @return mixed self::$sql
     */
    public static function connect()
    {
        if (self::$sql == null) {
            try {
                self::$sql = new \PDO('mysql:host=' . self::$host . ';dbname=' . self::$database, self::$user, self::$password);
                self::$sql->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\Exception $e) {
                throw new AuthException('Error connecting to database: ' . $e->getMessage());
            }
        }

        return self::$sql;
    }
}
