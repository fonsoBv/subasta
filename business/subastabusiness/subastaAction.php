<?php

include './subastaBusiness.php';
 if (isset($_POST['eliminarSubastaVenta'])) {

    if (isset($_POST['subastaid'])) {

        $subastaid = $_POST['subastaid'];

        $subastaBusiness = new subastaBusiness();
        $resultado = $subastaBusiness->eliminarTBSubastaVenta($subastaid);

        if ($resultado == 1) {
            header("location: ../../view/subastaView.php?success=deleted");
        } else {
            header("location: ../../view/subastaView.php?error=dbError");
        }//if error a nivel de base
    } else {
        header("location: ../../view/subastaView.php?error=error");
    }//if si esta seteado el campo
} else if (isset($_POST['registrarVenta'])) {

    $ventas = json_decode($_POST['registrarVenta'], true);

    foreach ($ventas as $venta) {
        $subastaCompradorId = $venta[0]['comprador'];
        $subastaPrecio = $venta[1]['precio'];
        $subastaAnimalId = $venta[2]['numeroAnimal'];
    }

    if (strlen($subastaCompradorId) > 0 && strlen($subastaAnimalId) > 0 && strlen($subastaPrecio) > 0) {

        $subastaBusiness = new subastaBusiness();

        $resultado = $subastaBusiness->insertarVenta($subastaAnimalId, $subastaCompradorId,
        $subastaPrecio);

        echo "La inserción se realizo adecuadamente";

    } else {
        echo "Error al momento de insertar el dato";
    }//if si se dejo en blanco
}else if (isset($_POST['insertarResubasta'])) {

    $resubastas = json_decode($_POST['insertarResubasta'], true);

    foreach ($resubastas as $resubasta) {
        $subastaCompradorId = $resubasta[0]['comprador'];
        $subastaPrecio = $resubasta[1]['precio'];
        $subastaAnimalId = $resubasta[2]['numeroAnimal'];
    }

    if (strlen($subastaCompradorId) > 0 && strlen($subastaAnimalId) > 0 && strlen($subastaPrecio) > 0) {

            $subastaBusiness = new subastaBusiness();

            $resultado = $subastaBusiness->insertarResubasta($subastaAnimalId, $subastaCompradorId,
        	$subastaPrecio);

            echo "La inserción se realizo adecuadamente";
    } else {
        echo "Error al momento de insertar el dato";
    }//if si se dejo en blanco
  }else if (isset($_POST['eliminarSubastaResubasta'])) {

     if (isset($_POST['subastaid'])) {

         $subastaid = $_POST['subastaid'];

         $subastaBusiness = new subastaBusiness();
         $resultado = $subastaBusiness->eliminarTBSubastaResubasta($subastaid);

         if ($resultado == 1) {
             header("location: ../../view/subastaView.php?success=deleted");
         } else {
             header("location: ../../view/subastaView.php?error=dbError");
         }//if error a nivel de base
     } else {
         header("location: ../../view/subastaView.php?error=error");
     }//if si esta seteado el campo
 } else if (isset($_POST['obtenerMontoSubastas'])) {
    
    $subastaBusiness = new subastaBusiness();
    $resultado = $subastaBusiness->obtenerMontoSubastas();

 }else if(isset($_POST['FacturaComprador'])){
   $compradorid = $_POST['FacturaComprador'];

   $subastaBusiness = new subastaBusiness();
   $resultado = $subastaBusiness->obtenerVentasPorComprador($compradorid);

}

?>
