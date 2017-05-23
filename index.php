<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        include_once './lib/conexion.php';

        function VerificarLogin($nomusuario, $pass, $resultado) {
            $sql = "SELECT * FROM acceso WHERE nomusuario = '$nomusuario' and pwdusuario = '$pass'";
            $recuento = mysql_query($sql);
            $cuenta = 0;
            while ($fila = mysql_fetch_object($recuento)) {
                $cuenta++;
                $resultado = $fila;
            }
            if ($cuenta == 1) {
                return 1;
            } else {
                return 0;
            }
            if (!isset($_SESSION['idacceso'])) {
                if (isset($_POST['login'])) {
                    if (verificar_login($_POST['nomusuario'], $_POST['pwdusuario'], $resultado) == 1) {
                        $_SESSION['idacceso'] = $result->idusuario;
                        header("location:index.php");
                    } else {
                        echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
                    }
                }
            }
        }
        ?>
    </body>
</html>
