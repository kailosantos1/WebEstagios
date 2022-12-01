<?php
$host = "localhost";
$user = "root";
$pass = "";
$bd= "arquivos";

$mysqli = new mysqli($host, $user, $pass, $bd);


if ($mysqli->connect_errno) {
    echo "Connect failed: " . $mysqli->connect_error;
    exit();
}



?>