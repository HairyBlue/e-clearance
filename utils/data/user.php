<?php
require_once "vendor/fakerphp";

$user = [
    "superadmin" => [
        "name" => "superadmin",
        "course" => "BSCS",
        "year" => 4,
        "division" => "CCIS",
        "email" => "super@admin.com",
        "password" => "superadmin",
    ],
    "admin" => [
        "name" => "admin",
        "course" => "BSCS",
        "year" => 4,
        "division" => "CCIS",
        "email" => "admin@admin.com",
        "password" => "admin",
    ],
    "coadmin" => [
        [
            "name" => "coadmin1",
            "course" => "BSCS",
            "year" => 4,
            "division" => "CCIS",
            "email" => "coadmin1@admin.com",
            "password" => "coadmin1",
        ],
        [
            "name" => "coadmin2",
            "course" => "BSCS",
            "year" => 4,
            "division" => "CCIS",
            "email" => "coadmin2@admin.com",
            "password" => "coadmin2",
        ],
    ],
    "staff" => [
        
    ],
    "student" => [],
];
