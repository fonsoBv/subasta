<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar']) || isset($_POST['obtenerTipoAnimal'])) {
    include_once '../../data/especiedata/especiedata.php';
}else {
    include_once '../data/especiedata/especiedata.php';
}

class EspecieBusiness {

    private $especieData;

    public function EspecieBusiness() {
        $this->especieData = new EspecieData();
    }//constructor

    public function obtenerTBEspeciePorCategoria($categoriaId) {
        return $this->especieData->obtenerEspeciePorCategoria($categoriaId);
    }//ObtenerEspecie

    public function obtenerTBEspeciePorCategoria2($categoriaId) {
        return $this->especieData->obtenerEspeciePorCategoria2($categoriaId);
    }//ObtenerEspecie

}//class

?>
