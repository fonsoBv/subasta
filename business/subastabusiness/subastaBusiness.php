<?php
/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['insertarVenta']) || isset($_POST['insertarResubasta'])
|| isset($_POST['eliminarSubastaVenta']) || isset($_POST['eliminarSubastaResubasta'])
|| isset($_POST['obtener']) || isset($_POST['registrarVenta']) || isset($_POST['obtenerMontoSubastas'])
|| isset($_POST['FacturaComprador'])) {
    include_once '../../data/subastadata/subastadata.php';
}else {
    include_once '../data/subastadata/subastadata.php';
}
class SubastaBusiness {

    private $subastaData;

    public function SubastaBusiness() {
        $this->subastaData = new SubastaData();
    }//constructor

    public function insertarTBSubastaVenta($subasta) {
        return $this->compradorData->insertarSubastaVenta($comprador);
    }//InsertarComprador

    public function insertarTBSubastaResubasta($subasta) {
        return $this->compradorData->insertarSubastaResubasta($subasta);
    }//InsertarComprador


    public function eliminarTBSubastaVenta($subastaid) {
        return $this->subastaData->eliminarSubastaVenta($subastaid);
    }//EliminarComprador

    public function eliminarTBSubastaResubasta($subastaid) {
        return $this->subastaData->eliminarResubasta($subastaid);
    }//EliminarComprador


    public function obtenerTBSubastaVenta() {
        return $this->subastaData->obtenerSubastaVenta();
    }//ObtenerComprador

    public function obtenerTBSubastaResubasta() {
        return $this->subastaData->obtenerSubastaResubasta();
    }//ObtenerComprador

    public function obtenerAnimalesComprador($tipo){
        return $this->compradorData->obtenerAnimalesComprador($tipo);
    }//obtenerAnimalesComprador



    public function insertarVenta($ventaAnimal, $ventaComprador, $subastaPrecio){
        return $this->subastaData->insertarVenta($ventaAnimal, $ventaComprador, $subastaPrecio);
    }//obtenerAnimalesComprador

    public function insertarResubasta($resubastaAnimal, $resubastaComprador,
	$resubastaPrecio){
        return $this->subastaData->insertarResubasta($resubastaAnimal, $resubastaComprador,
    	$resubastaPrecio);
    }//obtenerAnimalesComprador

    public function obtenerVentasPorComprador($compradorid){

      return $this->subastaData->obtenerVentasPorComprador($compradorid);

    }

    public function obtenerMontoSubastas() {
        return $this->subastaData->obtenerMontoSubastas();
    }//insertarVenta

}//class

?>
