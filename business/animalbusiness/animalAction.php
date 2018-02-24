<?php

include './animalBusiness.php';

if (isset($_POST['actualizar'])) {

    if (isset($_POST['animalNumero']) && isset($_POST['animalDonador']) && isset($_POST['animalLugarProcedencia']) && isset($_POST['animalTipo']) && isset($_POST['animalEstado'])) {

        $animalNumero = $_POST['animalNumero'];
        $animalDonador = $_POST['animalDonador'];
        $animalLugarProcedencia = $_POST['animalLugarProcedencia'];
        $animalTipo = $_POST['animalTipo'];
        $animalEstado = $_POST['animalEstado'];
        if(isset($_POST['animalRaza'])){
            $animalRaza = $_POST['animalRaza'];
        }else{
            $animalRaza = 0;
        }
        if(isset($_POST['animalDescripcion'])){
            $animalDescripcion = $_POST['animalDescripcion'];
        }else{
            $animalDescripcion = "";
        }

        if (strlen($animalNumero) > 0 && strlen($animalDonador) > 0 && strlen($animalLugarProcedencia) > 0) {
            if (!is_numeric($animalLugarProcedencia)) {
                $animal = new animal($animalNumero, $animalDonador, $animalLugarProcedencia, $animalTipo, $animalRaza, $animalEstado, $animalDescripcion);

                $animalBusiness = new AnimalBusiness();

                $resultado = $animalBusiness->actualizarTBAnimal($animal);

                if ($resultado == 1) {
                    header("location: ../../view/datosAnimalView.php?success=updated");
                } else {
                    //echo $idSickness." - ".$bullName;
                    header("location: ../../view/datosAnimalView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/datosAnimalView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/datosAnimalView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/datosAnimalView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['eliminar'])) {

    if (isset($_POST['animalNumero'])) {

        $animalNumero = $_POST['animalNumero'];

        $animalBusiness = new AnimalBusiness();
        $resultado = $animalBusiness->eliminarTBAnimal($animalNumero);

        if ($resultado == 1) {
            header("location: ../../view/datosAnimalView.php?success=deleted");
        } else {
            header("location: ../../view/datosAnimalView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/datosAnimalView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['insertar'])) {

    if (isset($_POST['animalNumero']) && isset($_POST['animalDonador']) && isset($_POST['animalLugarProcedencia']) && isset($_POST['animalTipo']) && isset($_POST['animalEstado'])) {

        $animalNumero = $_POST['animalNumero'];
        $animalDonador = $_POST['animalDonador'];
        $animalLugarProcedencia = $_POST['animalLugarProcedencia'];
        $animalTipo = $_POST['animalTipo'];
        $animalEstado = $_POST['animalEstado'];
        if(isset($_POST['animalRaza'])){
            $animalRaza = $_POST['animalRaza'];
        }else{
            $animalRaza = 0;
        }
        if(isset($_POST['animalDescripcion'])){
            $animalDescripcion = $_POST['animalDescripcion'];
        }else{
            $animalDescripcion = "";
        }

        if (strlen($animalNumero) > 0 && strlen($animalDonador) > 0 && strlen($animalLugarProcedencia) > 0) {
            if (!is_numeric($animalLugarProcedencia)) {
                $animal = new animal($animalNumero, $animalDonador, $animalLugarProcedencia, $animalTipo, $animalRaza, $animalEstado, $animalDescripcion);

                $animalBusiness = new AnimalBusiness();

                $resultado = $animalBusiness->insertarTBAnimal($animal);

                if ($resultado == 1) {
                    header("location: ../../view/animalView.php?success=inserted");
                } else {
                    header("location: ../../view/animalView.php?error=dbError");
                }//if error a nivel de base
            } else {
                header("location: ../../view/animalView.php?error=numberFormat");
            }//if si se igreso un numero
        } else {
            header("location: ../../view/animalView.php?error=emptyField");
        }//if si se dejo en blanco
    } else {
        header("location: ../../view/animalView.php?error=error");
    }//if si esta seteado el campo
}else if(isset($_POST['animalNumero'])){
    $animalBusiness = new AnimalBusiness();
    $respuesta = $animalBusiness->obtenerDatosAnimal($_POST['animalNumero']);

}else if(isset($_POST['obtenerActualizar'])){
    $animalBusiness = new AnimalBusiness();
    $respuesta = $animalBusiness->obtenerDatosActualizar($_POST['obtenerActualizar']);

}else if(isset($_POST['obtenerNumerosAnimales'])){
    $animalBusiness = new AnimalBusiness();
    $respuesta = $animalBusiness->obtenerNumerosAnimales();

}else if (isset($_POST['vistaRegistroAnimal'])) {
    $animalBusiness = new AnimalBusiness();
    $respuesta = $animalBusiness->obtenerDatosAnimalesRegistrados();
}

?>
