<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar'])|| isset($_POST['obtenerRazasTipo'])) {
    include_once '../../data/razadata/razadata.php';
}else {
    include_once '../data/razadata/razadata.php';
}
class RazaBusiness {

    private $razaData;

    public function RazaBusiness() {
        $this->razaData = new RazaData();
    }//constructor

    public function obtenerTBRazas() {
        return $this->razaData->obtenerRazas();
    }//ObtenerRaza
    
    public function obtenerTBRazas2() {
        return $this->razaData->obtenerRazas2();
    }//ObtenerRaza

}//class

?>
