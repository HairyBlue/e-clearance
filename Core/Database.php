<?php

namespace Core;

use \mysqli;

class Database
{
    private $config = [
        "host" => "localhost",
        "username" => "root",
        "password" => "",
        "dbname" => "notes",
        "port" => 3310
    ];
    
    public $mysqli;

    
    public function __construct()
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->mysqli =  new mysqli($this->config["host"], $this->config["username"], $this->config["password"], $this->config["dbname"], $this->config["port"]);
    }

    public function show($query, $datatype = "", $params = [])
    {
        if (empty($params)) {
            return $this->mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
       } else {
            $stmt =  $this->mysqli->prepare($query);
            $stmt->bind_param($datatype, ...$params);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function create($query, $datatype = "",  $params = [])
    {
        $stmt =  $this->mysqli->prepare($query);
        $stmt->bind_param($datatype, ...$params);
        return $stmt->execute();
        // return $this->mysqli->insert_id;
    }
}
