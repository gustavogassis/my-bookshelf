<?php

function isLogged() {
    session_start();

    if (!isset($_SESSION["email"])) {
        header("Location: ../login/index.php");
        return exit;
    }
}
?>