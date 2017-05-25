<?php

class usuario {

    var $idusuario;
    var $nombre;
    var $clave;

    //Valida la existencia del usuario
    function VerificaUsuario() {
        $oConn = new conexion();
        if ($oConn->conectar()) {
            $db = $oConn->objconn;
        } else {
            return FALSE;
        }
        $sql = "SELECT * FROM acceso WHERE nomusuario = '$this->nombre'";
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

    function VerificaUsuarioClave() {
        $oConn = new conexion();
        if ($oConn->conectar()) {
            $db = $oConn->objconn;
        } else {
            return FALSE;
        }
        $clavemd5 = md5($this->clave);
        $sql = "SELECT * FROM acceso WHERE nomusuario = '$this->nombre' and pwdusuario = '$clavemd5'";
        echo $sql;
        $resultado = $db->query($sql);
        $resultado->num_rows;
        if ($resultado->num_rows >= 1) {
            return true;
        } else {
            return false;
        }
    }

}
