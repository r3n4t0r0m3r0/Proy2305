<?php

class logtransacciones {
    var $idregistro;
    var $idacceso;
    var $tabla;
    var $accion;
    var $descripcion;
    
    //Verifica la existencia de un registro
    function VerificaLog() {
        $oConn = new conexion();
        if ($oConn->conectar()) {
            $db = $oConn->objconn;
        } else {
            return FALSE;
        }
        $sql = "SELECT * FROM logtransacciones WHERE idacceso = '$this->idacceso'";
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
