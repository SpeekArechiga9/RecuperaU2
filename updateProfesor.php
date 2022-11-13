<?php
if ($_POST) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $fechaNac = $_POST["fechaNac"];
    $curp = $_POST["curp"];
    $n_empleado = $_POST["n_empleado"];


    if ($nombre != "" && $apellidos != "" && $fechaNac != "" 
    && $curp != "" && $n_empleado != "" && $id != "") {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=utez","root","");
            $resultado = $pdo -> prepare('UPDATE profesores SET nombre = :a,
            apellidos = :b,fechaNac = :c,curp = :d, n_empleado = :e WHERE id = :f');
            $resultado->bindParam(":a", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":b", $apellidos, PDO::PARAM_STR);
            $resultado->bindParam(":c", $fechaNac, PDO::PARAM_STR);
            $resultado->bindParam(":d", $curp, PDO::PARAM_STR);
            $resultado->bindParam(":e", $n_empleado, PDO::PARAM_STR);
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