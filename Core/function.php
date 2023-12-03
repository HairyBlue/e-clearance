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

function redirect($path){
    header("location: {$path}");
    exit();
}

function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.view.php");
    die();
}