<?php
if ($_POST) {
    ini_set('display_errors',1);
    $tipo = $_POST["tipo"];
    
    if ($tipo==1) {
        echo "Registos de profesor.";
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $fechaNac = $_POST["fechaNac"];
        $curp = $_POST["curp"];
        $n_empleado = $_POST["n_empleado"];

        if ($nombre != "" && $apellidos != "" && $fechaNac != "" 
        && $curp != "" && $n_empleado != "") {
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=utez","root","");
                $resultado = $pdo -> prepare('INSERT INTO profesores(nombre,apellidos,fec_nac,curp,n_empleado)
                VALUES (:a,:b,:c,:d,:e)');
                $resultado->bindParam(":a", $nombre, PDO::PARAM_STR);
                $resultado->bindParam(":b", $apellidos, PDO::PARAM_STR);
                $resultado->bindParam(":c", $fechaNac, PDO::PARAM_STR);
                $resultado->bindParam(":d", $curp, PDO::PARAM_STR);
                $resultado->bindParam(":e", $n_empleado, PDO::PARAM_INT);
                $resultado -> execute();
            } catch (PDOException $e) {
                echo $e -> getMessage();
            }
        }else{
            echo "-1";
        }
    }else if($tipo == 2){
        echo "Registros de alumno.";
        $a_nombre = $_POST["nombre"];
        $a_apellidos = $_POST["apellidos"];
        $a_fechaNac = $_POST["fechaNac"];
        $a_curp = $_POST["curp"];
        $matricula = $_POST["matricula"];

        if ($nombnre != "" && $apellidos != "" && $fechaNac != "" && $curp != "" && $matricula != "") {
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=utez","root","");
                $resultado = $pdo -> prepare('INSERT INTO alumnos(nombre,apellidos, fec_nacimiento,curp,matricula)
                VALUES (:a,:b,:c,:d,:e)');
                $resultado->bindParam(":a", $a_nombre, PDO::PARAM_STR);
                $resultado->bindParam(":b", $a_apellidos, PDO::PARAM_STR);
                $resultado->bindParam(":c", $fechaNac, PDO::PARAM_STR);
                $resultado->bindParam(":d", $a_curp, PDO::PARAM_STR);
                $resultado->bindParam(":e", $matricula, PDO::PARAM_STR);
                $resultado -> execute();
            } catch (PDOException $e) {
                echo $e -> getMessage();
            }
        }else{
            echo "-1";
        }
    }else{
        echo "No hay coincidencias con la selección.";
    }
}
?>