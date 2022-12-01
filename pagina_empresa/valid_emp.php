<?php
session_start();
//  print_r($_REQUEST);
if(isset($_POST["submit"]) && !empty($_POST["username"]) && !empty($_POST["pwd"])){

include_once("../config.php");
$username = $_POST ["username"];
$pwd = $_POST ["pwd"];


$sql = "SELECT * FROM empresa WHERE user_name = '$username'  LIMIT 1";

$result = $mysqli-> query($sql);

$usuario = $result->fetch_assoc();
if(password_verify($pwd, $usuario['senha'])){
    $_SESSION['username'] = $username;
    $_SESSION['pwd'] = $pwd;
    
    header('Location:istagio_emp.php');

}else{


    header('Location:index1.php');
}
}
?>