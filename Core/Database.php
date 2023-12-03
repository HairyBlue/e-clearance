<?php

namespace Core;
use \mysqli;

class Database
{
    public $mysqli;
    
    public function __construct($host, $user, $password, $database, $port)
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->mysqli =  new mysqli($host, $user, $password, $database, $port);
    }

    // public function show($query, $datatype = "", $params = [])
    // {
    //     if (empty($params)) {
    //         return $this->mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
    //    } else {
    //         $stmt =  $this->mysqli->prepare($query);
    //         $stmt->bind_param($datatype, ...$params);
    //         $stmt->execute();
    //         return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    //     }
    // }

    // public function create($query, $datatype = "",  $params = [])
    // {
    //     $stmt =  $this->mysqli->prepare($query);
    //     $stmt->bind_param($datatype, ...$params);
    //     return $stmt->execute();
    //     // return $this->mysqli->insert_id;
    // }
}
