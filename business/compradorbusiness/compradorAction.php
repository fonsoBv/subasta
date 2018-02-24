<?php

include './compradorBusiness.php';

if (isset($_POST['actualizar'])) {

    if (isset($_POST['compradorCodigo']) && isset($_POST['compradorNombreCompleto']) && isset($_POST['compradorNumeroIdentificacion']) && isset($_POST['compradorTelefono']) && isset($_POST['compradorDireccion']) && isset($_POST['compradorTipoPago'])) {

        $compradorCodigo = $_POST['compradorCodigo'];
        $compradorNombreCompleto = $_POST['compradorNombreCompleto'];
        $compradorNumeroIdentificacion = $_POST['compradorNumeroIdentificacion'];
        $compradorTelefono = $_POST['compradorTelefono'];
        $compradorDireccion = $_POST['compradorDireccion'];
        $compradorTipoPago = $_POST['compradorTipoPago'];
        
        if(isset($_POST['compradorRecomendacion'])){
            $compradorRecomendacion = $_POST['compradorRecomendacion'];
        }else{
            $compradorRecomendacion = "";
        }

        if(isset($_POST['compradorNumeroPagare'])){
            $compradorNumeroPagare = $_POST['compradorNumeroPagare'];
        }else{
            $compradorNumeroPagare = 0;
        }

        if (strlen($compradorCodigo) > 0 && strlen($compradorNombreCompleto) > 0 && strlen($compradorNumeroIdentificacion) > 0 && strlen($compradorTelefono) > 0 && strlen($compradorDireccion) > 0 && strlen($compradorTipoPago) > 0) {
            if (!is_numeric($compradorNombreCompleto) && !is_numeric($compradorDireccion) && !is_numeric($compradorTipoPago)) {

                $comprador = new comprador($compradorCodigo, $compradorNumeroIdentificacion, $compradorNombreCompleto, $compradorTelefono, $compradorRecomendacion, $compradorDireccion, $compradorTipoPago, $compradorNumeroPagare);

                $compradorBusiness = new CompradorBusiness();

                $resultado = $compradorBusiness->actualizarTBComprador($comprador);
                /*if ($resultado == 1) {
                    header("location: ../../view/compradorView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../../view/compradorView.php?error=dbError");
                }//if error a nivel de base*/
            } else {
                header("location: ../../view/compradorView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/compradorView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location:../../view/compradorView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['compradorCodigo'])) {

        $compradorCodigo = $_POST['compradorCodigo'];

        $compradorBusiness = new compradorBusiness();
        $resultado = $compradorBusiness->eliminarTBComprador($compradorCodigo);

        if ($resultado == 1) {
            header("location: ../../view/compradorView.php?success=deleted");
        } else {
            header("location: ../../view/compradorView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/compradorView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['compradorNombreCompleto']) && isset($_POST['compradorNumeroIdentificacion']) && isset($_POST['compradorTelefono']) && isset($_POST['compradorDireccion']) && isset($_POST['compradorTipoPago'])) {

        $compradorNombreCompleto = $_POST['compradorNombreCompleto'];
        $compradorNumeroIdentificacion = $_POST['compradorNumeroIdentificacion'];
        $compradorTelefono = $_POST['compradorTelefono'];
        $compradorDireccion = $_POST['compradorDireccion'];
        $compradorTipoPago = $_POST['compradorTipoPago'];

        if(isset($_POST['compradorRecomendacion'])){
            $compradorRecomendacion = $_POST['compradorRecomendacion'];
        }else{
            $compradorRecomendacion = "";
        }

        if(isset($_POST['compradorNumeroPagare'])){
            $compradorNumeroPagare = $_POST['compradorNumeroPagare'];
        }else{
            $compradorNumeroPagare = 0;
        }

        if (strlen($compradorNombreCompleto) > 0 && strlen($compradorNumeroIdentificacion) > 0 && strlen($compradorTelefono) > 0 && strlen($compradorDireccion) > 0 && strlen($compradorTipoPago) > 0) {
            if (!is_numeric($compradorNombreCompleto) && !is_numeric($compradorDireccion) && !is_numeric($compradorTipoPago)) {

                $comprador = new comprador(0, $compradorNumeroIdentificacion, $compradorNombreCompleto, $compradorTelefono, $compradorRecomendacion, $compradorDireccion, $compradorTipoPago, $compradorNumeroPagare);

                $compradorBusiness = new CompradorBusiness();

                $resultado = $compradorBusiness->insertarTBComprador($comprador);

                /*if ($resultado == 1) {
                    header("location: ../../view/compradorView.php?success=insert");
                } else {
                    header("location: ../../view/compradorView.php?error=dbError");
                }//if error a nivel de base*/

            } else {
                header("location: ../../view/compradorView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/compradorView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../view/compradorView.php?error=error");
    }//if si esta seteado el campo
}else if (isset($_POST['obtenerCompradores'])) {
    $compradorBusiness = new CompradorBusiness();

    $resultado = $compradorBusiness->obtenerCompradoresJSON();
}else if (isset($_POST['informacionComprador'])) {
    $compradorBusiness = new CompradorBusiness();

    $resultado = $compradorBusiness->obtenerCompradorPorIdConJSON($_POST['informacionComprador']);
}
?>
