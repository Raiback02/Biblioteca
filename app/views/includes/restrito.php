<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: ../public/login.php");
    exit();
}

function verificarAcesso($perfisPermitidos) {
    if (!in_array($_SESSION["usuario_tipo"], $perfisPermitidos)) {
        header("Location: ../../../public/403.php");
        exit();
    }
}
