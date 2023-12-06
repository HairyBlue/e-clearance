<?php

// dd($_GET);
// QUERY PROFILE
$profileQuery = "SELECT staffId, name, officeName, officeId from Staffs
                inner join Offices
                on staff_office_id = officeId
                where staff_user_id = ?";

$profile = database()->show($profileQuery, "i", [$_SESSION["user"]["_id"]]);

// QUERY STUDENT STATUS
$office =  $profile[0]["officeName"];


if (isset($_GET["division-name"])) {
    $statusQuery = "SELECT $office, studentId, name, course, year, divisionName from Students 
                      inner join Clearances 
                      on studentId = student_id
                      inner join Divisions
                      on student_division_id = divisionId
                      WHERE divisionName = ?";
    $status = database()->show($statusQuery, "s", [$_GET["division-name"]]);
} elseif (isset($_GET["student-year-level-order"])) {
    if ($_GET["student-year-level-order"] == "ascending") {
        $statusQuery = "SELECT $office, studentId, name, course, year, divisionName from Students 
                            inner join Clearances 
                            on studentId = student_id
                            inner join Divisions
                            on student_division_id = divisionId
                            ORDER by year asc";
        global $status;
        $status = database()->show($statusQuery);
    }
    if ($_GET["student-year-level-order"] == "descending") {
        $statusQuery = "SELECT $office, studentId, name, course, year, divisionName from Students 
                            inner join Clearances 
                            on studentId = student_id
                            inner join Divisions
                            on student_division_id = divisionId
                            ORDER by year desc";
        $status = database()->show($statusQuery);
    }
} elseif (isset($_GET["student-name"])) {
    $statusQuery = "SELECT $office, studentId, name, course, year, divisionName from Students 
                    inner join Clearances 
                    on studentId = student_id
                    inner join Divisions
                    on student_division_id = divisionId
                    where name LIKE ?";

    $status = database()->show($statusQuery, "s", ["%".$_GET["student-name"]."%"]);
} else {
    $statusQuery = "SELECT $office, studentId, name, course, year, divisionName from Students 
                    inner join Clearances 
                    on studentId = student_id
                    inner join Divisions
                    on student_division_id = divisionId";
    $status = database()->show($statusQuery);
}


// QUERY DIVISION
$divisionQuery = "SELECT * from Divisions";
$division = database()->show($divisionQuery);

// dd($status);
// dd($division);
view("staff/index.view.php", [
    "profile" => $profile[0],
    "division" => $division,
    "status" => $status
]);
