<?php

require "superAdminFunction.php";

$result = showStudent();
$visiblePage = ceil($result[2][0]["total"] / 2);


view("superadmin/index.view.php", [
    "current" => "student",
    "assigned" => $result[0],
    "infos" => $result[1],
    "pagination" => [
        "midpoint" => ""
    ],
]);
