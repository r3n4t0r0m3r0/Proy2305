<?php

include '../lib/conexion.php';
$conn = new conexion;
if ($conn->conectar()) {
    $idacc = $_POST["idacceso"];
    $nt = $_POST["nomtabla"];
    $acc = $_POST["accion"];
    $desc = $_POST["descripcion"];
    $sql = "INSERT INTO logtransacciones(idacceso, nomtabla, accion, descripcion) values('$idacc','$nt','$acc','$desc')";
    echo $sql;
}

