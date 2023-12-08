<?php
$router->get("/", "index.php");
$router->get("/about", "about.php");

$router->get("/login", "auth/formlogin.php");
$router->post("/store", "auth/store.php");
$router->delete("/logout", "auth/destroy.php")->only("auth");

$router->get("/student", "student/index.php")->only("auth")->role("STUDENT");

$router->get("/staff", "staff/index.php")->only("auth")->role("STAFF");
$router->patch("/staff/update", "staff/update.php")->only("auth")->role("STAFF");

$router->get("/dean", "dean/index.php")->only("auth")->role("DEAN");
$router->patch("/dean/update", "dean/update.php")->only("auth")->role("DEAN");

$router->get("/superadmin", "superadmin/index.php")->only("auth")->role("SUPERADMIN");
$router->post("/superadmin/store", "superadmin/store.php")->only("auth")->role("SUPERADMIN");
$router->delete("/superadmin/destroy", "superadmin/destroy.php")->only("auth")->role("SUPERADMIN");
