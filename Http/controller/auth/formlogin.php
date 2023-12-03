<?php
if (isset($_SESSION["_flushed"]["login"])) {
    view("auth/formlogin.view.php", [
        "temp" => $_SESSION["_flushed"]["login"]["email"],
        "error" => $_SESSION["_flushed"]["login"]["error"],
    ]);
} else {
    view("auth/formlogin.view.php");
}
