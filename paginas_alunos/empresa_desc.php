<?php
session_start();

include_once('../config.php');
if ((!isset($_SESSION['username']) == true) and (!isset($_SESSION['senha']) == true)) {
  unset($_SESSION['username']);
  unset($_SESSION['senha']);
  header('Location: index.php');
}

$logado = $_SESSION['username'];

$sql = "SELECT * FROM form_emp";

$result = $mysqli->query($sql);


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

    .container {
      border: 1px solid;
      border-radius: 10px;
      display: flex;
      justify-content: center;

    }

    #button_emp {
      border: 1px solid;
      width: 20%;
      padding: 1%;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="http://localhost/ti_2022/paginas_alunos/istagio.php" style="margin-left: 47%;">Estágios</a>

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
              <a class="nav-link" href="http://localhost/ti_2022/paginas_alunos/istagio.php">Inicio</a>
            </li>
            <li class="nav-item">
            <?php echo "<a class='nav-link' href='aluno_perfil.php?id=$usuario_perfil[id]'>Aluno</a>";?>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/ti_2022/paginas_alunos/aluno_vagas.php">Minhas Vagas</a>
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

  <div class="container">
    <div class="stack">
      <div class="box">
        <div class="stack">
          <div class="content text-center">
            <h2 class="overline">Nossos pré-requisitos</h2>
            <p class="headline headline--size-2">Atitude é <span>tudo</span></p>
            <p class="subtitle">Estamos à procura de pessoas talentosas, com a atitude certa, que estejam prontas para colocar a mão na massa.</p>
          </div>
          <div class="grid" style="--align:flex-start;--gap:2.5rem 4rem">
            <div class="stack">
              <div class="content">
                <h3 class="headline headline--size-5">Áreas de atuação:</h3>
                <p> <?php $user_data = mysqli_fetch_assoc($result);
                    echo $user_data['area_emp']; ?></p>
              </div>
              <div class="content">
                <h3 class="headline headline--size-5">Conhecimentos específicos:</h3>
                <p> <?php echo $user_data['espe_emp']; ?></p>
                </p>
              </div>
              <div class="content">
                <div class="content">
                  <h3 class="headline headline--size-5">Cursos elegíveis:</h3>
                  <p> <?php echo $user_data['cursos_emp']; ?></p>
                </div>

                <div class="content">
                  <h3 class="headline headline--size-5">Localidades:</h3>
                  <ul class="list">

                    <li><?php echo $user_data['local_emp']; ?> </li>

                  </ul>
                </div>
                <div class="content">
                  <h3 class="headline headline--size-5">Disponibilidade:</h3>
                  <p><?php echo $user_data['hora_emp']; ?></p>
                </div>
                <button class="btn btn-primary" onclick="window.location.href = 'form_vaga.php'">Inscreva-se</button>
                <br>
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<?php echo '<p> </p>'; ?>
</body>

</html>

</html>