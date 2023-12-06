<?php

$profileQuery = "SELECT staffId, name, officeName, officeId from Staffs
                inner join Offices
                on staff_office_id = officeId
                where staff_user_id = ?";

$profile = database()->show($profileQuery, "i", [$_SESSION["user"]["_id"]]);


$dsscQuery = "SELECT dssc, studentId, name, course, year, divisionName from Students 
                inner join Clearances 
                on studentId = student_id
                inner join Divisions
                on student_division_id = divisionId";
$status = database()->show($dsscQuery);

// dd($status);

view("staff/index.view.php", [
    "profile" => $profile[0],
    // "status" => $status[0],
]);
