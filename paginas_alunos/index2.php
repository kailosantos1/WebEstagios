<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <html>
  <title>Estágios</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
    }

    .box {
      color: white;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgba(0, 0, 0, 0.5);
      padding: 15px;
      border-radius: 15px;
      width: 50%;
    }

    fieldset {
      border: none;
    }

    legend {
      border: 1px solid dodgerblue;
      padding: 10px;
      text-align: center;
      background-color: dodgerblue;
      border-radius: 8px;

    }

    .inputBox {
      position: relative;
    }

    .inputUser {
      background: none;
      border: none;
      border-bottom: 1px solid white;
      outline: none;
      color: white;
      font-size: 15px;
      width: 100%;
      letter-spacing: 2px;
    }

    .labelInput {
      position: absolute;
      top: 0px;
      left: 0px;
      pointer-events: none;
      transition: .5s;
    }

    .inputUser:focus~.labelInput,
    .inputUser:valid~.labelInput {
      top: -20px;
      font-size: 12px;
      color: dodgerblue;
    }

    .inputSubmit {
      background-color: green;
      ;
      width: 45%;
      border: none;
      padding: 15px;
      color: white;
      font-size: 15px;
      cursor: pointer;
      border-radius: 10px;
      float: left;
    }

    #cadastrar {
      background-color: CornflowerBlue;
      width: 45%;
      border: none;
      padding: 15px;
      color: white;
      font-size: 15px;
      cursor: pointer;
      border-radius: 10px;
      float: right;
    }

    .inputSubmit:hover {
      background-color: DarkGreen;
    }

    #cadastrar:hover {
      background-color: RoyalBlue
    }
    .imagemm{
  margin-left: 37%;
  margin-top: -3%;
}
  </style>

<body>
  <form action="valid_user.php" method="post">
  <div class="imagemm"> 
    <img src="../imagem.png">
</div>
    <div class="box">
      <fieldset>
        <legend><b>Estágios</b></legend>
        <br>
        <br>
        <?php
if(isset($_SESSION["status_cadastro"])){
?>
        <div class="notification is-success">
<p>Cadastro efetuado!</p>
<p>Faça o login para continuar</p>
</div>
<?php
  }
  unset ($_SESSION["status_cadastro"]);
    ?>


        <div class="inputBox">
          <input type="text" name="username" placeholder="Nome de Usuario" class="inputUser" required>

        </div>

        </br>
        </br>
        <div class="inputBox">
          <input type="password" name="pwd" placeholder="Senha" class="inputUser" required>

        </div>

        <br>
        <br>
        <div>
          <input class="inputSubmit" type="submit" name="submit" value="Entrar">
          <input type="button" style="margin: 0 5px;" id="cadastrar" value="Cadastrar" onclick="window.location.href = 'cadastro_aluno.php'">
        </div>
</body>
<?php echo '<p> </p>'; ?>
</body>

</html>