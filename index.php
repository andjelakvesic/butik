<?php
    $kategorijaID = (isset($_GET["id"]) && is_numeric($_GET["id"])) ? $_GET["id"] : NULL;

    $title = 'Početna';
    $childView = 'views/_index.php';
    include('layout.php');
?>