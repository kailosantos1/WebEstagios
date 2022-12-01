<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <html>
  <title>Cadastrar aluno</title>
</head>
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
  }

  .box {
    color: white;
    position: absolute;
    top: 72%;
    right: -17%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.5);
    padding: 15px;
    border-radius: 15px;
    width: 65%;
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
    width: 20%;
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

  #nasc {
    border: none;
    padding: 8px;
    border-radius: 10px;
    outline: none;
    font-size: 15px;
  }

  #submit {
    background-color: green;
    ;
    width: 48%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 10px;
    float: left;
  }

  #voltar {
    background-color: CornflowerBlue;
    width: 48%;
    border: none;
    padding: 15px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    border-radius: 10px;
    float: right;
  }

  #submit:hover {
    background-color: DarkGreen;
  }

  #voltar:hover {
    background-color: RoyalBlue;
  }

  .avatar1 {
    width: 53%;
  }
</style>
</head>

<body>
  <form enctype="multipart/form-data" action="cadastro.php" method="POST">
    <div class="box">
      <fieldset>
        <legend><b>Cadastro do Aluno</b></legend>
        <br>
        <?php
        if(isset($_SESSION['usuario_existe'])){
        ?>

<div class="notification is-info">
<p>O nome de usuário escolhido já existe, porfavor escolha outro nome de usuário</p>
</div>

<?php
        }
        unset($_SESSION['usuario_existe']);
?>
        <div class="inputBox">
          <input type="text" name="nome" id="nome" class="inputUser" required>
          <label for="nome" class="labelInput"> Nome do aluno: </label>
        </div>

        </br>
        </br>
        <div class="inputBox">
          <input type="text" id="sname" name="sname" class="inputUser" required>
          <label for="sname" class="labelInput">Sobrenome do aluno:</label>
        </div>

        </br>
        </br>
        <div class="inputBox">
          <input type="text" id="username" name="username" class="inputUser" required>
          <label for="username" class="labelInput">Escolha um nome de usuario:</label>
        </div>

        </br>
        </br>
        <div class="inputBox">
          <input type="text" id="email" name="email" class="inputUser" required>
          <label for="email" class="labelInput">E-mail:</label>
        </div>

        </br>
        </br>
        <div class="inputBox">
          <input type="password" id="pwd" name="pwd" class="inputUser" required>
          <label for="pwd" class="labelInput">Criar uma senha:</label>
        </div>

        </br>
        </br>
        <div class="inputBox">
          <input type="tel" id="phone" name="phone" maxlength="17" class="inputUser" required />
          <label for="phone" class="labelInput"> Celular: </label>
        </div>

        </br>
        </br>
        <div class="inputBox">
          <label for="sexo">Sexo: </label>
          <input type="radio" name="sexo" value="M" required />Masculino
          <input type="radio" name="sexo" value="F" required />Femenino
          <input type="radio" name="sexo" value="Outros" required /> Outros
        </div>

        </br>
        </br>
        <label for="nasc"><b>Data de nascimento:</b></label>
        <input type="date" id="nasc" name="nasc" required>
        </br>
        </br>
        </br>

        <div class="avatar1">
          <label for="exampleFormControlFile1">Selecione a foto de perfil:</label>
          <input type="file" id="arquivo" name="arquivo" onchanger="previewImage()" accept="image/*" class="inputUser" style="width:0%" required>
          </br>
          <img src="../avatar.jpg" id="imgPhoto" style="width: 150px; height: 150px">
        </div>

        <script>
          let photo = document.getElementById('imgPhoto');
          let file = document.getElementById('arquivo');
          photo.addEventListener('click', () => {
            file.click();
          });
          file.addEventListener('change', () => {
            if (file.files.length <= 0) {
              return;
            }
            let reader = new FileReader();
            reader.onload = () => {
              photo.src = reader.result;
            }
            reader.readAsDataURL(file.files[0]);
          });
        </script>

        </br>
        </br>
        <div class="inputBox">
          <input type="text" id="cdd" name="cdd" class="inputUser" required>
          <label for="cdd" class="labelInput">Cidade:</label>
        </div>

        </br>
        </br>


        <div>
          <input type="submit" value="Cadastrar" id="submit" />
          <input type="button" value="Voltar" id="voltar" onClick="history.go(-1)">
        </div>
  </form>
</body>
<?php echo '<p> </p>'; ?>
</body>

</html>