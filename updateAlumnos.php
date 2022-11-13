<?php
if ($_POST) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $fechaNac = $_POST["fechaNac"];
    $curp = $_POST["curp"];
    $matricula = $_POST["matricula"];


    if ($nombnre != "" && $apellidos != "" && $fechaNac != "" && $curp != "" && $matricula != "") {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=utez","root","");
            $resultado = $pdo -> prepare('UPDATE alumnos SET nombre = :a,
            apellidos = :b,fechaNac = :c,curp = :d, matricula = :e WHERE id = :f');
            $resultado->bindParam(":a", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":b", $apellidos, PDO::PARAM_STR);
            $resultado->bindParam(":c", $fechaNac, PDO::PARAM_STR);
            $resultado->bindParam(":d", $curp, PDO::PARAM_STR);
            $resultado->bindParam(":e", $matricula, PDO::PARAM_STR);
            $resultado->bindParam(":f", $id, PDO::PARAM_INT);
            $resultado -> execute();
            echo "Actualizado con exito.";
        } catch (PDOException $e) {
            echo $e -> getMessage();
        }
    }else{
        echo "-1";
    }
}
?>