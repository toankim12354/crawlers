<?php
interface DatabaseInterface {
    /**
     * @param string $table
     * @param array $data
     * @return bool
     */

public function insert(string $table, array $data):bool|string;

}
