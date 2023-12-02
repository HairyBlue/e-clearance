<?php
$router->get("/", "index.php");
$router->get("/about", "about.php");

$router->get("/login", "auth/formlogin.php");
$router->post("/store", "auth/store.php");
