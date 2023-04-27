<?php

namespace Crawlers\Models;
use DatabaseInterface;
use mysqli;
use mysqli_sql_exception;

class Database implements DatabaseInterface {
    /**
     * @var false|mysqli
     */


    /**
     * connect to database
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $dbname
     */
    public function __construct(string $host, string $username, string $password, string $dbname) {
        $this->conn = mysqli_connect($host, $username, $password, $dbname);
    }
//data processed with in the database

    /**
     * @param string $table
     * @param array $data
     * @return bool|string
     */
    public function insert(string $table, array $data): bool|string
    {
        $table = 'posts';
        $title =$data->$this->titli ;
        $content = $data->$this->content ;
        $date = $data->$this->date;
        $sql = "INSERT INTO $table (title, content, date) VALUES ('$title', '$content', '$date')";
        try {
            return mysqli_query($this->conn, $sql);
        } catch (mysqli_sql_exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
        return false;
    }



}
