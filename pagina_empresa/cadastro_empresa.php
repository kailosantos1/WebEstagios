<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <html>
  <title>Cadastrar Empresa</title>
</head>
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
  }

  .box {
    color: white;
    position: absolute;
    top: 60%;
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
  <form enctype="multipart/form-data" action="cadastro_emp.php" method="POST">
    <div class="box">
      <fieldset>
        <legend><b>Cadastro da Empresa</b></legend>
        <br>
       <?php 
       if(isset($_SESSION['usuario_existe1'])){
?>
<div>
<p>O nome de usuário escolhido já existe, porfavor escolha outro nome de usuário</p>
</div>
<?php
        }
        unset($_SESSION['usuario_existe1']);
?>
        <div class="inputBox">
          <input type="text" id="nome_emp" name="nome_emp" class="inputUser" onChange="javascript:this.value=this.value.toUpperCase();" required>
          <label for="username" class="labelInput">Nome da sua empresa:</label>
        </div>

        </br>
        </br>

        <div class="inputBox">
          <input type="text" id="username" name="username" class="inputUser" required>
          <label for="username" class="labelInput">Usuário:</label>
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
          <label for="phone" class="labelInput"> Celular da empresa: </label>
        </div>
        </br>
        </br>
        </br>

        <div class="avatar1">
          <label for="myfile">Selecione a foto da empresa:</label>
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
          <label for="cdd" class="labelInput">Localização da empresa:</label>
        </div>
        </br>
        </br>

        <div class="inputBox">
          <input type="text" id="desc" name="desc" class="inputUser" required>
          <label for="desc" class="labelInput">Breve Descrição:</label>
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