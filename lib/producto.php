<?php

class producto {

    var $id;
    var $nombre;
    var $totalusd;
    var $anio;

    //Verifica la existencia de un producto
    function VerificaProducto() {
        $oConn = new conexion();
        if ($oConn->conectar()) {
            $db = $oConn->objconn;
        } else {
            return FALSE;
        }
        $sql = "SELECT * FROM productos WHERE nombre = '$this->nombre'";
        echo $sql;
        echo '<br>';
        $resultado = $db->query($sql);
        $resultado->num_rows;
        if ($resultado->num_rows >= 1) {
            return true;
        } else {
            return false;
        }
    }

}
