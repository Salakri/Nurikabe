<?php
/**
 * Created by PhpStorm.
 * User: dell-
 * Date: 2017/6/21
 * Time: 15:53
 */

namespace Gaming;


class Site
{
    private $email = '';
    private $dbHost = null;
    private $dbUser = null;

    private $dbPassword = null; ///< Database password
    private $tablePrefix = '';  ///< Database table prefix
    private $root = '';         ///< Site root
    private static $pdo = null; ///< The PDO object


    /**
     * Database connection function
     * @returns PDO object that connects to the database
     */
    function pdo() {
        // This ensures we only create the PDO object once
        if(self::$pdo !== null) {
            return self::$pdo;
        }

        try {
            self::$pdo = new \PDO($this->dbHost,
                $this->dbUser,
                $this->dbPassword);
        } catch(\PDOException $e) {
            // If we can't connect we die!
            die("Unable to select database");
        }

        return self::$pdo;
    }

    /**
     * Configure the database
     * @param $host
     * @param $user
     * @param $password
     * @param $prefix
     */
    public function dbConfigure($host, $user, $password, $prefix) {
        $this->dbHost = $host;
        $this->dbUser = $user;
        $this->dbPassword = $password;
        $this->tablePrefix = $prefix;
    }


    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }        ///< Site owner email address




    /**
     * @return string
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * @param string $root
     */
    public function setRoot($root)
    {
        $this->root = $root;
    }     ///< Database host name


    /**
     * @return string
     */
    public function getTablePrefix()
    {
        return $this->tablePrefix;
    }     ///< Database user name



}