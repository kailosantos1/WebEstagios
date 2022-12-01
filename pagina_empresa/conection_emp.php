
    <?php
    include_once('../config.php');

    $area = $_POST["area"];
    $espe = $_POST["espe"];
    $cursos = $_POST["cursos"];
    $local = $_POST["local"];
    $hora = $_POST["hora"];



    $mysqli->query("INSERT INTO form_emp(area_emp,espe_emp,cursos_emp,local_emp,hora_emp) 
VALUES ('$area','$espe','$cursos','$local','$hora')");


    header('Location:istagio_emp.php');

    ?>




