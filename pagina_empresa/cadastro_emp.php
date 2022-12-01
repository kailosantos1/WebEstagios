
    <?php

    include_once('../conexao_emp.php');



    if (isset($_FILES['arquivo'])) {
      $arquivo = $_FILES['arquivo'];

      if ($arquivo['error'])
        die("falha ao enviair arquivo");

      if ($arquivo['size'] > 10485760)
        die('arquivo muito grande max:10mb');

      $pasta = "perfil_emp/";
      $nomeDoArquivo = $arquivo['name'];
      $novoNomeDoArquivo = uniqid();
      $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

      if ($extensao != "jpg" && $extensao != "png")
        die("tipo de arquivo incompativel");

      $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

      $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

      if ($deu_certo) {
        $mysqli->query("INSERT INTO arquivos_emp(nome_arquivo,path) VALUES ('$nomeDoArquivo', '$path')") or die($mysqli->error);

        echo "<p> arquivo enviado com sucesso, <a target=\"_blank\" href=\"../arquivos/$novoNomeDoArquivo.$extensao\">clique aqui</a></p>";
      } else
        echo "<p> falha ao enviar arquivo</p>";
    }

    session_start();

    include_once('../config.php');

    $nome = mysqli_real_escape_string($mysqli, trim($_POST["nome_emp"]));
    $username = mysqli_real_escape_string($mysqli, trim($_POST["username"]));
    $email = mysqli_real_escape_string($mysqli, trim($_POST["email"]));
    $pwd = mysqli_real_escape_string($mysqli, trim(password_hash($_POST["pwd"], PASSWORD_DEFAULT)));
    $phone = mysqli_real_escape_string($mysqli, trim($_POST["phone"]));
    $cdd = mysqli_real_escape_string($mysqli, trim($_POST["cdd"]));
    $desc = mysqli_real_escape_string($mysqli, trim($_POST["desc"]));


$sql = "SELECT COUNT(*) AS total FROM empresa WHERE user_name = '$username'";

$result = mysqli_query($mysqli, $sql);

$row = mysqli_fetch_assoc($result);

  if($row['total'] == 1){
    $_SESSION['usuario_existe1'] = true;
    header('Location: cadastro_empresa.php');
    exit;
  }

  $sql = "INSERT INTO empresa(nome,user_name,email,senha,celular,cdd,desc_emp) 
VALUES ('$nome','$username','$email','$pwd','$phone','$cdd','$desc')";
 
 if($mysqli->query($sql) === TRUE)
 {

   $_SESSION['status_cadastro2'] = true;
 }
 $mysqli->close();
     
 
 header('Location:index1.php');

exit;

    ?>




