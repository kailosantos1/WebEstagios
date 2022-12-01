<?php
include_once('../conexao.php');



if(isset($_FILES['arquivo'])){
  $arquivo = $_FILES['arquivo'];
 
  if($arquivo['error'])
  die("falha ao enviair arquivo");
 
  if($arquivo['size'] > 10485760)
  die('arquivo muito grande max:10mb');
 
  $pasta = "../curriculos/";
  $nomeDoArquivo = $arquivo['name'];
  $novoNomeDoArquivo = uniqid();
  $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
 
  if($extensao != "jpg" && $extensao != "png")
  die("tipo de arquivo incompativel");
 
  $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
 
 $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
 
  if($deu_certo) {
 $mysqli->query("INSERT INTO arquivos(nome_arquivo,path) VALUES ('$nomeDoArquivo', '$path')") or die($mysqli->error);
 
      echo "<p> arquivo enviado com sucesso, <a target=\"_blank\" href=\"../arquivos/$novoNomeDoArquivo.$extensao\">clique aqui</a></p>";
 
  }else
echo "<p> falha ao enviar arquivo</p>";
 
}

if(isset($_POST['submit']))
 
{
//print_r('Nome: ' .$_POST['nome']);
//print_r('<br>');
//print_r('Nome empresa: ' .$_POST['empnome']);
//print_r('<br>');
//print_r('Estado: ' .$_POST['estados']);
//print_r('<br>');
//print_r('Cidade: ' .$_POST['cidades']);
//print_r('<br>');
//print_r('Data: ' .$_POST['data']);
include_once('../config.php');

$nome = $_POST['nome'];
$empnome = $_POST['empnome'];
$estados = $_POST['estados'];
$cidades = $_POST['cidades'];
$celular = $_POST ['celular'];
$desc_aluno = $_POST ['desc_aluno'];
$dia = $_POST['dia'];


$mysqli->query("INSERT INTO form_vaga(nome,nome_emp,estado,regiao,celular,desc_aluno,dia) VALUES ('$nome','$empnome','$estados','$cidades','$celular','$desc_aluno','$dia')");

}






 header('Location:aluno_vagas.php');
