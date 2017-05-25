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

        function ValidarLogin($nomusuario, $pass, $resultado) {
            $sql = "SELECT * FROM acceso WHERE nomusuario = '$nomusuario' and pwdusuario = '$pass'";
            $recuento = mysql_query($sql);
            $cuenta = 0;
            while ($fila = mysql_fetch_object($recuento)) {
                $cuenta++;
                $resultado = $fila;
            }
            if ($cuenta === 1) {
                return 1;
            } else {
                return 0;
            }
            if (!isset($_SESSION['idacceso'])) {
                if (isset($_POST['login'])) {
                    if (\ValidarLogin($_POST['nomusuario'], $_POST['pwdusuario'], $resultado) === 1) {
                        $_SESSION['idacceso'] = $resultado->idusuario;
                        header("location:index.php");
                    } else {
                        echo 'Fallo en el inicio de sesión';
                    }
                }
            }
        }
        ?>
        <div>
            <?php if (isset($_SESSION['USR'])) { ?>
                <a href="./lib/cerrar.php">Cerrar Sesión</a>
            <?php } ?>
        </div>
        <div>
            <a href="revision.php">Revisi&oacute;n de sesiones</a>
            <?php if (!isset($_SESSION['USR'])) { ?>
                <form method="post" action="revision.php">
                    <div>
                        <label>
                            Nombre de Usuario
                        </label>
                        <input type="text" name="nombre">
                    </div>
                    <div>
                        <label>
                            Clave de Usuario
                        </label>
                        <input type="password" name="clave">
                    </div>
                    <input type="submit" value="Acceder">
                </form>
            <?php } ?>  
        </div>
        <div>
            <form method="post" action="modulos/prod_agregar.php">
                <div>
                    <label>Nombre:</label><input type="text" name="nombre">
                </div>
                <div>
                    <label>Total USD:</label><input type="text" name="totalusd">
                </div>
                <div>
                    <label>Año:</label><input type="text" name="ano">
                </div>
                <input type="submit" value="Agregar">
            </form> 
        </div>
    </body>
</html>
