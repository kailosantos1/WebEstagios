<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['pwd']);
header('Location: ../index.php');

?>