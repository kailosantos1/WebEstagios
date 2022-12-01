<?php
session_start();
// print_r($_SESSION);
if ((!isset($_SESSION['username']) == true) and (!isset($_SESSION['senha']) == true)) {

  unset($_SESSION["username"]);
  unset($_SESSION["pwd"]);
  header('Location:index.php');
}
$logado = $_SESSION['username'];

include_once('../config.php');

$sql = "SELECT * FROM form_vaga ORDER BY id DESC";

$result = $mysqli->query($sql);

include_once('../conexao.php');

$sql_query = $mysqli->query("SELECT * FROM arquivos") or die($mysqli->error);



?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Estágios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/6c4bb413cc.js" crossorigin="anonymous"></script>

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

    h1 {
      margin-left: 10px;
    }

    .button {
      display: inline-block;
      border: 1px solid;
      width: 30%;
      margin-left: 10px;
      border-radius: 10px;
      margin-top: 2%;

    }

    h2 {
      margin-left: 20px;
    }

    h3 {
      margin-left: 20px;
    }

    .descriptionbox {
      display: inline-block;
      border: 1px solid;
      width: 50;
      border-radius: 10px;
      margin-top: 27px;
      margin-right: 40%;
    }

    #candi {
      width: 50%;
      height: 30px;
      margin-left: 10px;
    }
  </style>
</head>
<nav class="navbar navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="istagio_emp.php" style="margin-left: 47%;">Estágios</a>

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
        <p>Olá <b><?php print_r($logado);?></b></p> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="istagio_emp.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form_emp.php">Adicionar Vaga</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="sair_emp.php">Sair</a>
            </li>
      </div>
    </div>
  </div>
</nav>
<hr>
</br>

<h1>Candidatos</h1>






<div class="m-3">

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nome Do Candidato</th>
        <th scope="col">Localização</th>
        <th scope="col">Área De Atuação</th>
        <th scope="col">Telefone</th>
        <th scope="col">Ver Curriculo</th>
      </tr>
    </thead>
    <?php
    while ($arquivo = $sql_query->fetch_assoc()) {
      while ($user_data = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $user_data['nome'] . "</td>";
        echo "<td>" . $user_data['estado'] . "</td>";
        echo "<td>" . $user_data['desc_aluno'] . "</td>";
        echo "<td>" . $user_data['celular'] . "</td>";

    ?>

        <td><a class="btn tbn-sm btn-primary" target="_blank" href="<?php echo $arquivo['path']; ?>">⠀<i class="fa-solid fa-check-double">⠀</i></a></td>
    <?php
      }
    }
    ?>

    <tbody>

    </tbody>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<?php echo '<p> </p>'; ?>
</body>

</html>

</html>