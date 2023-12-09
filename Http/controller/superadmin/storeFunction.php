<?php 

function storeStudent($data){

    // dd($data);
    // $email = $data['email'];
    // $password = $data['password'];
    // $name = $data['name'];
    // $course = $data['course'];
    // $year = $data['year'];
    // $divisionId = $data['division'];

    // $userSql = "INSERT INTO Users (email, password) values ('{$email}', '{$password}')";
    // $userId =  $this->addUser($userSql, 6);
    //  database()->

    // $studentSql = "INSERT INTO Students (name, course, year, student_division_id, student_user_id) values ('{$name}', '{$course}', {$year}, {$divisionId}, {$userId})";
    // $this->db->query($studentSql);
    // $studentId = $this->db->insert_id;

    // $clearanceSql = "INSERT INTO Clearances (student_id) values ({$studentId})";
    // $this->db->query($clearanceSql);
}


function store($post = []){
    if($post["user"] == "student"){
        storeStudent($post);
    }

}