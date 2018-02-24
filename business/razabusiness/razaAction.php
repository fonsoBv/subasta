<?php

include './razaBusiness.php';

if(isset($_POST['obtenerRaza'])){
    $razaBusiness = new RazaBusiness();
    $respuesta = $razaBusiness->obtenerTBRazas2();  
}//if
?>
