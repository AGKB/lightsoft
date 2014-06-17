<?php

error_reporting(E_ALL ^ E_NOTICE);
class Config {
    private static $dbh;
    private static $dsn = 'mysql:host=localhost;dbname=test';
    private static  $username = 'root';
    private static $password = 'njkmrj';
    private static $opt = array(
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        //PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM,
    );

    private function __construct() {}

    public static function getConnect() {
        if(empty(self::$dbh)) {
            try {
                self::$dbh = new PDO(self::$dsn, self::$username, self::$password, self::$opt);
            } catch (Exception $e) {
                echo  ' Message: ' . $e->getMessage().PHP_EOL;
                echo  ' File: ' . $e->getFile().PHP_EOL;
                echo  ' Line: '. $e->getLine().PHP_EOL;
                die;
            }
        }
        return self::$dbh;
    }
}
