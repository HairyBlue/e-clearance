<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}
function pre($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
}
function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attribute = [])
{
    extract($attribute);
    require base_path("views/" . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.view.php");
    die();
}
function database()
{
    $config = require base_path("config.php");
    return new \Core\Database(...$config["database"]);
}

function verify()
{

    $userId = $_SESSION["user"]["_id"];

    $query = "SELECT level from Roles inner join Levels on level_id = levelId inner join Users on user_id = userId WHERE user_id = ?";

    $result =  database()->show($query, "i", [$userId]);
    // $stm = $db->mysqli->prepare($query);
    // $stm->bind_param("i", $userId);
    // $stm->execute();
    // $result = $stm->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result[0]["level"];
}
