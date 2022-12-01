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

$sqlSelect = "SELECT * FROM form_vaga WHERE id=$id";

$result = $mysqli->query($sqlSelect);

if($result->num_rows > 0)
{
  while($user_data = mysqli_fetch_assoc($result))
  {
    $nome = $user_data['nome'];
    $nome_emp = $user_data['nome_emp'];
    $estado = $user_data['estado'];
    $regiao = $user_data['regiao'];
    $celular = $user_data['celular'];
    $desc_aluno = $user_data['desc_aluno'];
    $dia = $user_data['dia'];
  }

}
else
{

header('Location: aluno_vagas.php');

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
            <?php echo "<a class='nav-link' href='aluno_perfil.php?id=$usuario_perfil[id]'>Aluno</a>";?>
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
  <form action="saveEdit.php" method="POST">
    <div class="box">
      <fieldset>

        <h1>Formulário Contato<h1>
            <hr>
      </fieldset>

      <div class="inputBox">
        <div class="row">

          <div>
            <div class="inputnome">
              <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" value="<?php echo $nome ?>" required>
            </div>
          </div>

          <br>
          <br>

          <div>
            <div class="inputnome">
              <input type="text" class="form-control" id="nome_emp" placeholder="Nome da Empresa" name="nome_emp" onChange="javascript:this.value=this.value.toUpperCase();" value="<?php echo $nome_emp?>" required>
            </div>
          </div>

          <br>
          <br>

          <div>
            <select class="form-select" id="estado" name="estado" value="<?php echo $estado ?>" required>
              <option value="AC" disabled>Acre</option>
              <option value="AL" disabled>Alagoas</option>
              <option value="AP" disabled>Amapá</option>
              <option value="AM" disabled>Amazonas</option>
              <option value="BA" disabled>Bahia</option>
              <option value="CE" disabled>Ceará</option>
              <option value="DF" disabled>Distrito Federal</option>
              <option value="ES" disabled>Espírito Santo</option>
              <option value="GO" disabled>Goiás</option>
              <option value="MA" disabled>Maranhão</option>
              <option value="MT" disabled>Mato Grosso</option>
              <option value="MS" disabled>Mato Grosso do Sul</option>
              <option value="MG" disabled>Minas Gerais</option>
              <option value="PA" disabled>Pará</option>
              <option value="PB" disabled>Paraíba</option>
              <option value="PR" disabled>Paraná</option>
              <option value="PE" disabled>Pernambuco</option>
              <option value="PI" disabled>Piauí</option>
              <option value="RJ" disabled>Rio de Janeiro</option>
              <option value="RN" disabled>Rio Grande do Norte</option>
              <option value="RS" disabled>Rio Grande do Sul</option>
              <option value="RO" disabled>Rondônia</option>
              <option value="RR" disabled>Roraima</option>
              <option value="SC" selected>Santa Catarina</option>
              <option value="SP" disabled>São Paulo</option>
              <option value="SE" disabled>Sergipe</option>
              <option value="TO" disabled>Tocantins</option>
              <option value="EX" disabled>Estrangeiro</option>
            </select>
          </div>

          </br>
          </br>

          <div>
            <select class="form-select" id="regiao" name="regiao" value="<?php echo $regiao ?>" required>
              <option value="Região de Chapecó">Região de Chapecó</option>
              <option value="Região de Joaçaba">Região de Joaçaba</option>
              <option value="Região de Xanxerê e Concordia">Região de Xanxerê e Concordia</option>
              <option value="Regiões de Curitibanos e C. dos Lages">Regiões de Curitibanos e C. dos Lages</option>
            </select>
          </div>





          <div class="form-group">

            <br>
            <br>
           
        <div class="inputdate">
          <input type="date" name="dia" id="dia" value="<?php echo date("Y-m-d"); ?>" onkeydown="return false" required>
          <script>
            dia.max = new Date().toISOString().split("T")[0];
            dia.min = new Date().toISOString().split("T")[0];
          </script>
        </div>



        <br>
        <br>

        <div class="inputBox">
          <input type="tel" class="form-control" id="celular" name="celular" placeholder="Celular" maxlength="17" style="margin-left: -3%;" value="<?php echo $celular ?>" required />
          <label for="celular" class="labelInput"></label>
        </div>


        <div class="inputBox">
          <input type="text" class="form-control" id="desc_aluno" placeholder="Área De Atuação" name="desc_aluno" style="margin-left: -3%;" value="<?php echo $desc_aluno ?>" required>
          <label for="desc_aluno" class="labelInput"></label>
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