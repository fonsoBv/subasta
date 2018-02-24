<?php
/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertar']) || isset($_POST['actualizar'])
|| isset($_POST['eliminarTelefono']) || isset($_POST['agregarTelefono']) || isset($_POST['obtener'])
|| isset($_POST['obtenerCompradores']) || isset($_POST['informacionComprador'])) {
    include_once '../../data/compradordata/compradordata.php';
}else {
    include_once '../data/compradordata/compradordata.php';
}
class CompradorBusiness {

    private $compradorData;

    public function CompradorBusiness() {
        $this->compradorData = new CompradorData();
    }//constructor

    public function insertarTBComprador($comprador) {
        return $this->compradorData->insertarComprador($comprador);
    }//InsertarComprador

    public function actualizarTBComprador($comprador) {
        return $this->compradorData->actualizarComprador($comprador);
    }//ActualizarComprador

    public function eliminarTBComprador($compradorCodigo) {
        return $this->compradorData->eliminarComprador($compradorCodigo);
    }//EliminarComprador

    public function obtenerTBComprador() {
        return $this->compradorData->obtenerCompradores();
    }//ObtenerComprador


    public function obtenerTBCompradorFactura() {
        return $this->compradorData->obtenerCompradoresFactura();
    }//ObtenerComprador


    public function obtenerActualizar($compradorCodigo) {
        return $this->compradorData->obtenerActualizaobtenerCompradoresr($compradorCodigo);
    }//ObtenerActualizar

    public function obtenerAnimalesComprador($tipo){
        return $this->compradorData->obtenerAnimalesComprador($tipo);
    }//obtenerAnimalesComprador




    public function obtenerCompradoresJSON(){
        echo $this->compradorData->obtenerCompradoresJSON();
    }//


    public function obtenerCompradorPorIdConJSON($compradorcodigo){
        echo $this->compradorData->obtenerCompradorPorIdConJSON($compradorcodigo);
    }//
}//class

?>
