<?php

function showDivision()
{
    $query = "SELECT * from Divisions";
    return database()->show($query);
}
function showOffice()
{
    $query = "SELECT * from Offices";
    return database()->show($query);
}

function showDean()
{
    $query = "SELECT  email, name, divisionName, login, userId from Deans
              inner join Users 
              on dean_user_id = userId 
              inner join Divisions
              on dean_division_id = divisionId";

    $assigned = showDivision();
    $info = database()->show($query);

    return [$assigned, $info];
}

function showStaff()
{
    $query = "SELECT  email, name,  officeName, login, userId from Staffs
              inner join Users 
              on staff_user_id = userId 
              inner join Offices
              on staff_office_id = officeId";
    $assigned = showOffice();
    $info =  database()->show($query);
    return [$assigned, $info];
}

function showStudent($limit = 10, $offset = 0)
{
    $offset = 10 * $offset;

    $queryTotalStudent = "Select count(*) as total from Students";
    $queryTotal =  database()->show($queryTotalStudent);

    $query = "SELECT email, name, course, year, divisionName, login, userId, studentId from   Students
              inner join Users
              on student_user_id = userId
              inner join Divisions
              on student_division_id = divisionId 
              LIMIT $limit OFFSET $offset";

    $assigned = showDivision();
    $info =  database()->show($query);


    return [$assigned, $info, $queryTotal];
}
