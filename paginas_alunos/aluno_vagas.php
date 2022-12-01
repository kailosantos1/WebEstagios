<?php
session_start();

include_once('../config.php');
if ((!isset($_SESSION['username']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['username']);
  unset($_SESSION['senha']);
  header('Location: index.php');
}

$logado = $_SESSION['username'];

$sql = "SELECT * FROM form_vaga ORDER BY id DESC";

$result = $mysqli->query($sql);

$sqlusers = "SELECT * FROM users ORDER BY id DESC";

$resultado = $mysqli->query($sqlusers);

$usuario_perfil= mysqli_fetch_assoc($resultado);

include_once('../conexao.php');

$sql_query = $mysqli->query("SELECT * FROM arquivos") or die($mysqli->error);


?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <script src="https://kit.fontawesome.com/d26ae53813.js" crossorigin="anonymous"></script>
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
  </style>
</head>

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
            <?php echo "<a class='nav-link' href='aluno_perfil.php?id=$usuario_perfil[id]'>Aluno</a>";?>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="aluno_vagas.php">Minhas Vagas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sair.php">Sair</a>
            </li>
        </div>
      </div>
    </div>
  </nav>
  <hr>
  <br>
  <br>
  <h1>Minhas Vagas</h1>
  <hr>
  <div class="m-3">

    <table class="table">
      <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Empresa</th>
          <th scope="col">Estado de estagio</th>
          <th scope="col">Região de estagio</th>
          <th scope="col">Celular</th>
          <th scope="col">Data de Envio</th>
          <th scope="col">Curriculo</th>
          <th scope="col"> ⠀Ação</th>
          <th scope="col"> ⠀Ação</th>
        </tr>
      </thead>

      <?php
      while ($arquivo = $sql_query->fetch_assoc()) {

        while ($user_data = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $user_data['id'] . "</td>";
          echo "<td>" . $user_data['nome'] . "</td>";
          echo "<td>" . $user_data['nome_emp'] . "</td>";
          echo "<td>" . $user_data['estado'] . "</td>";
          echo "<td>" . $user_data['regiao'] . "</td>";
          echo "<td>" . $user_data['celular'] . "</td>";
          echo "<td>" . $user_data['dia'] . "</td>";
      ?>
          <td><a class="btn tbn-sm btn-primary" target="_blank" href="<?php echo $arquivo['path']; ?>">⠀<i class="fa-solid fa-check-double">⠀</i></a></td>
          <?php
          echo "<td>
       <a class='btn tbn-sm btn-primary' href='edit.php?id=$user_data[id]'>
       ⠀<i class='fa-solid fa-pen'></i>⠀
       </a>
       </td>";
          ?>
          <?php
          echo "<td>
<a class='btn tbn-sm btn-danger' href='delete.php?id=$user_data[id]'>
⠀<i class='fa-solid fa-trash'></i>⠀
</a>
</td>";
          ?>
      <?php
        }
      }
      ?>

      <tbody>

      </tbody>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<?php echo '<p> </p>'; ?>
</body>

</html>

</html>