<?php
interface DatabaseInterface {
    /**
     * @param string $table
     * @param array $data
     * @return bool|string
     */

public function insert(string $table, array $data):bool|string;

}
