<?php
include_once('../config.php');

if(isset($_POST['update']))
{

$id = $_POST['id']; 
$nome = $_POST['nome'];
$nome_emp = $_POST['nome_emp'];
$estado = $_POST['estado'];
$regiao = $_POST['regiao'];
$celular = $_POST['celular'];
$desc_aluno = $_POST['desc_aluno'];
$dia = $_POST['dia'];

$sqlUpdate = "UPDATE form_vaga SET nome='$nome',nome_emp='$nome_emp',estado='$estado',regiao='$regiao',celular='$celular',desc_aluno='$desc_aluno',dia='$dia'
WHERE id='$id'";

$result = $mysqli->query($sqlUpdate);

}
header('Location: aluno_vagas.php');
?>