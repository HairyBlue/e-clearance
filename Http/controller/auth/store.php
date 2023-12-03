<?php

use Core\Database;

$config = require base_path("config.php");

$db = new Database(...$config["database"]);
$query = "SELECT userId, email, password from Users
where email = ?";

$stm = $db->mysqli->prepare($query);
$stm->bind_param("s", $_POST["email"]);
$stm->execute();
$result = $stm->get_result()->fetch_all(MYSQLI_ASSOC);

if (empty($result)) {
    $_SESSION["_flushed"]["login"]["email"] = $_POST["email"];
    $_SESSION["_flushed"]["login"]["error"] = "Invalid Credential";

    return redirect("/login");
}

if($result[0]["password"] !== $_POST["password"]){
    $_SESSION["_flushed"]["login"]["email"] = $_POST["email"];
    $_SESSION["_flushed"]["login"]["error"] = "Invalid Credential";

    return redirect("/login");
}

$_SESSION["_id"] = $result[0]["userId"];
dd($_SESSION);