<?php
session_start();



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
    h1 {
      margin-left: 2%;
    }

    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: white;
    }

    .btn1 {
      margin-left: 1%;
    }
  </style>
</head>

<body>
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
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="istagio_emp.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="form_emp.php">Cadastrar Empresa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sair_emp.php">Sair</a>
            </li>
        </div>
      </div>
    </div>
  </nav>
  <form action="conection_emp.php" method="POST">
    <br>
    <br>
    <br>
    <h1>Adicionar Vaga</h1>

    <hr>

    <div class="inputBox">
      <input type="text" class="form-control" id="area" name="area" placeholder="Área de atuação" style="margin-left: 1%; width: 30%;" required />
      <label for="area" class="labelInput"></label>
    </div>

    <div class="inputBox">
      <input type="text" class="form-control" id="espe" name="espe" placeholder="Conhecimentos específicos" style="margin-left: 1%; width: 30%;" required />
      <label for="area" class="labelInput"></label>
    </div>

    <div class="inputBox">
      <input type="text" class="form-control" id="cursos" name="cursos" placeholder="Cursos elegíveis" style="margin-left: 1%; width: 30%;" required />
      <label for="area" class="labelInput"></label>
    </div>

    <div class="inputBox">
      <input type="text" class="form-control" id="local" name="local" placeholder="Localidades" style="margin-left: 1%; width: 30%;" required />
      <label for="area" class="labelInput"></label>
    </div>

    <div class="inputBox">
      <input type="text" class="form-control" id="hora" name="hora" placeholder="Disponibilidade" style="margin-left: 1%; width: 30%;" required />
      <label for="area" class="labelInput"></label>
    </div>


    <div class="btn1">
      <button type="submit" name="submit" class="btn btn-success"> <i class="fa-solid fa-floppy-disk"></i> Salvar</button>


      <button type="button" class="btn btn-primary" onClick="history.go(-1)"> <i class="fa-solid fa-arrow-left"></i> Voltar</button>
    </div>

  </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<?php echo '<p> </p>'; ?>
</body>

</html>

</html>