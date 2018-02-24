<?php

include './especieBusiness.php';

if(isset($_POST['obtenerTipoAnimal'])){
    $categoriaId = $_POST['categoria'];
    $especieBusiness = new EspecieBusiness();
    $respuesta = $especieBusiness->obtenerTBEspeciePorCategoria2($categoriaId);  
}//if
?>
