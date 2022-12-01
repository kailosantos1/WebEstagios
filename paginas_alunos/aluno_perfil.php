<?php
session_start();

include_once('../config.php');
if ((!isset($_SESSION['username']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['username']);
  unset($_SESSION['senha']);
  header('Location: index.php');
}

$logado = $_SESSION['username'];



if(!empty($_GET['id']))
 
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



$id = $_GET['id'];

$sqlSelect = "SELECT * FROM users WHERE id=$id";

$result = $mysqli->query($sqlSelect);

if($result->num_rows > 0)
{
  while($user_data = mysqli_fetch_assoc($result))
  {
    $nome = $user_data['nome'];
    $sobrenome = $user_data['sobre_nome'];
    $celular = $user_data['celular'];
    $email = $user_data['email'];
    $cdd = $user_data['cdd'];
    $senha = $user_data['senha'];

  }
}
else
{

header('Location: istagio.php');

}
}

$sqlusers = "SELECT * FROM users ORDER BY id DESC";

$resultado = $mysqli->query($sqlusers);

$usuario_perfil= mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Estágios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/6c4bb413cc.js" crossorigin="anonymous"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: white;
  }

  #bsearch {
    font-family: Arial, Helvetica, sans-serif;
    font-size: medium;
    width: 40%;
  }

  .inputBox {
    width: 30%;
    margin-left: 1%;
  }

  .form-select {
    width: 100%;
    margin-left: 0%;
  }
</style>

<body>
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="istagio.php" style="margin-left: 47%;">Estágios</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Estágios</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link" href="istagio.php">Inicio</a>
            </li>
            <li class="nav-item">
            <?php echo "<a class='nav-link active' href='aluno_perfil.php?id=$usuario_perfil[id]'>Aluno</a>";?>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aluno_vagas.php">Minhas Vagas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sair.php">Sair</a>
            </li>
        </div>
      </div>
    </div>
  </nav>
  <br>
  <br>
  <br>
  <br>
  <form action="saveEditperfil.php" method="POST">
    <div class="box">
      <fieldset>

        <h1><b><?php print_r($logado);?></b>, Atualize seu perfil.<h1>
            <hr>
      </fieldset>

      <div class="inputBox">
        <div class="row">


        <div class="inputnome">
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo $nome ?>" required/>


</br>


          <div class="inputsnome">
          <input type="text" class="form-control" id="sobre_nome" name="sobre_nome" placeholder="Sobrenome" value="<?php echo $sobrenome ?>" required/>
            </div>

          </br>


          
          <div class="inputemail">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email ?>" required/>
          </br>
   


        <div class="inputcelular">
          <input type="tel" class="form-control" id="celular" name="celular" placeholder="Celular" maxlength="17" value="<?php echo $celular ?>" required/>
        </div>
        </br>


        <div class="inputcdd">
          <input type="text" class="form-control" id="cdd" placeholder="Cidade" name="cdd" value="<?php echo $cdd ?>" required/>

        </div>
        </br>

        
        <div class="inputsenha">
          <input type="text" class="form-control" id="senha" placeholder="Senha" name="senha" required/>

        </div>
        
      </br>
        </br>


        <div class="btn1">

<input type="hidden" name="id" value="<?php echo $id ?>">

          <button type="submit" name="update" class="btn btn-success"> <i class="fa-solid fa-floppy-disk"></i> Salvar</button>


          <button type="button" class="btn btn-primary" onClick="history.go(-1)"> <i class="fa-solid fa-arrow-left"></i> Voltar</button>
        </div>


      </div>
    </div>
    </div>

  </form>









</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<?php echo '<p> </p>'; ?>
</body>

</html>

</html>