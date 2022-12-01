

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <html>
    <title>Estágios</title>
    <style>
      body{
        font-family: Arial, Helvetica, sans-serif;
     background-image:linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
}
.box{
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
fieldset{
  border: none;
}
legend{
  padding: 10px;
  text-align: center;
  border-radius: 8px;
  
}
.inputBox{
  position: relative;
}
.inputUser{
background: none;
border: none;
border-bottom: 1px solid white;
outline: none;
color: white;
font-size: 15px;
width: 100%;
letter-spacing: 2px;
}
.labelInput{
  position: absolute;
  top: 0px;
  left: 0px;
  pointer-events: none;
  transition: .5s;
}
 .inputUser:focus ~ .labelInput,
 .inputUser:valid ~ .labelInput{
top: -20px;
font-size: 12px;
color: dodgerblue;
}

.inputSubmit{
background-color: green;;
width: 45%;
border: none;
padding: 15px;
color: white;
font-size: 15px;
cursor: pointer;
border-radius: 10px;
float: left;
}
#cadastrar{
background-color:CornflowerBlue;
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
#cadastrar:hover{
  background-color: RoyalBlue
}
.group{
  margin-right: 10%;
}
.imagemm{
  margin-left: 37%;
}
    </style>
    <body>
    <form action=" " method="post">
    <div class="imagemm"> 
    <img src="imagem.png">
</div>
    <div class="box">
         <legend><b>Estágios</b></legend>
        <br>
         <br>

    
<div class="group">
    <input class="inputSubmit" type= "button" id = "cadastrar" value="Empresa" onclick="window.location.href = 'pagina_empresa/index1.php'">
    <input type= "button"  style="margin: 0 5px;" id = "cadastrar" value="Aluno" onclick="window.location.href = 'paginas_alunos/index2.php'">
    
</div>

</div>
</body>
  <?php echo '<p> </p>'; ?> 
  </body>
</html>





