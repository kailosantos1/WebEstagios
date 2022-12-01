<?php
if(!empty($_GET['id']))
{
    include_once('../config.php');

$id = $_GET['id'];

$sqlSelect = "SELECT * FROM form_vaga WHERE id=$id";

$result = $mysqli->query($sqlSelect);

if($result->num_rows > 0)
{
   $sqlDelete = "DELETE FROM form_vaga WHERE id=$id";
   $resultDelete = $mysqli->query($sqlDelete);
}
}
header('Location: aluno_vagas.php');
?>
