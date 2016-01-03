<?php
/**
 * Created by PhpStorm.
 * User: priviere
 * Date: 01/01/2016
 * Time: 19:57
 */

namespace App;
use PDO;


class Database
{

    private $pdo;

    /**
     * Database constructor.
     * @param string $login Login for database
     * @param string $password Password for database
     * @param string $database_name Name of the database
     * @param string $host Host address of the database. By default 'localhost'
     */
    public function __construct($login, $password, $database_name, $host = 'localhost')
    {
        $this->pdo = new PDO("mysql:dbname=$database_name;host=$host",$login,$password);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // Config pour l'UTF8
        $this->pdo->query("SET NAMES 'UTF8'");

    }

    /**
     * Run the query on the database
     * @param $query
     * @param null $params
     * @return null|\PDOStatement
     */
    public function query($query, $params = null) {
        $req = null;
        if ($params) {
            $req = $this->pdo->prepare($query);
            $req->execute($params);
        } else {
            $req = $this->pdo->query($query);
        }
        return $req;

    }

}