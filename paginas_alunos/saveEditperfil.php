<?php
include_once('../config.php');

if(isset($_POST['update']))
{

$id = $_POST['id']; 
$nome = $_POST['nome'];
$sobrenome = $_POST['sobre_nome'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$cdd = $_POST['cdd'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);


$sqlUpdate = "UPDATE users SET nome='$nome',sobre_nome='$sobrenome',celular='$celular',email='$email',cdd='$cdd',senha='$senha'
WHERE id='$id'";

$result = $mysqli->query($sqlUpdate);

}
header('Location: istagio.php');
?>