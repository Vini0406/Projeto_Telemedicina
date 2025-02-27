<?php
    error_reporting(E_ERROR | E_PARSE);
    $servername = "sql305.infinityfree.com";
    $username = "if0_38355008";
    $password = "Ql5mmTXfSNV9W";
    $dbname = "if0_38355008_bdtele";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $conn -> set_charset("utf8");

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

?>