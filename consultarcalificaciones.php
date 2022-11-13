<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=utez","root","");
    } catch (PDOException $e) {
        echo $e ->getMessage();
    }
    
    $sql = "SELECT nombre, matricula,id_profesor,id_asignatura, calificacion FROM alumnos;";
    $resultado = $pdo->query($sql);
    $datos=array();
    
    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $datos[]=$row;
    }
    echo json_encode($datos);
}
?>  