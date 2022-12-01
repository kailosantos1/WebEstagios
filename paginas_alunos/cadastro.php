
    <?php

    include_once('../conexao_perfil.php');



    if (isset($_FILES['arquivo'])) {
      $arquivo = $_FILES['arquivo'];

      if ($arquivo['error'])
        die("falha ao enviair arquivo");

      if ($arquivo['size'] > 10485760)
        die('arquivo muito grande max:10mb');

      $pasta = "perfil/";
      $nomeDoArquivo = $arquivo['name'];
      $novoNomeDoArquivo = uniqid();
      $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

      if ($extensao != "jpg" && $extensao != "png")
        die("tipo de arquivo incompativel");

      $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

      $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

      if ($deu_certo) {
        $mysqli->query("INSERT INTO perfil(nome_arquivo,path) VALUES ('$nomeDoArquivo', '$path')") or die($mysqli->error);

        echo "<p> arquivo enviado com sucesso, <a target=\"_blank\" href=\"../arquivos/$novoNomeDoArquivo.$extensao\">clique aqui</a></p>";
      } else
        echo "<p> falha ao enviar arquivo</p>";
    }


session_start();

    include_once('../config.php');
    
    $nome = mysqli_real_escape_string($mysqli, trim($_POST["nome"]));
    $sname = mysqli_real_escape_string($mysqli,trim($_POST["sname"]));
    $username = mysqli_real_escape_string($mysqli,trim($_POST["username"]));
    $email = mysqli_real_escape_string($mysqli,trim($_POST["email"]));
    $pwd = mysqli_real_escape_string($mysqli,trim(password_hash($_POST["pwd"], PASSWORD_DEFAULT)));
    $phone = mysqli_real_escape_string($mysqli,trim($_POST["phone"]));
    $sexo = mysqli_real_escape_string($mysqli,trim($_POST["sexo"]));
    $nasc = mysqli_real_escape_string($mysqli,trim($_POST["nasc"]));
    $cdd = mysqli_real_escape_string($mysqli,trim($_POST["cdd"]));

$sql = "SELECT COUNT(*) AS total FROM users WHERE user_name = '$username'";

$result = mysqli_query($mysqli, $sql);

$row = mysqli_fetch_assoc($result);

  if($row['total'] == 1){
    $_SESSION['usuario_existe'] = true;
    header('Location: cadastro_aluno.php');
    exit;
  }
  
  $sql = "INSERT INTO users(nome,sobre_nome,user_name,email,senha,celular,sexo,data_nasc,cdd) 
  VALUES ('$nome','$sname','$username','$email','$pwd','$phone','$sexo','$nasc','$cdd')";
  
  if($mysqli->query($sql) === TRUE)
  {

    $_SESSION['status_cadastro'] = true;
  }
  $mysqli->close();
      
  
header('Location:index2.php');

exit;
?>





