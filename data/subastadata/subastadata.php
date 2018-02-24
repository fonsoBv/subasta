<?php


/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar'])
|| isset($_POST['obtener']) || isset($_POST['registrarVenta']) || isset($_POST['insertarResubasta']) || isset($_POST['obtenerMontoSubastas'])
|| isset($_POST['FacturaComprador']) || isset($_POST['ObtenerResubastasyVentas']) || isset($_POST['obtenerUnaVenta'])) {

    include_once '../../data/data.php';
    include '../../domain/subasta/subasta.php';

}else {

    include_once '../data/data.php';
    include '../domain/subasta/subasta.php';

}


class SubastaData extends Data {

    public function insertarVenta($ventaAnimal, $ventaComprador, $subastaPrecio) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(ventaid) AS ventaid  FROM tbventa";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryInsert = "INSERT INTO tbventa VALUES (" . $nextId . "," . $ventaAnimal . "," . $ventaComprador . "," . $subastaPrecio . "," ."'A'" . ");";

        $result = mysqli_query($conn, $queryInsert);

        $queryActualizarAnimal = "UPDATE tbanimal SET  animalestado = " . "'vendido'".
                " WHERE animalnumero = " . $ventaAnimal . ";";

        mysqli_query($conn, $queryActualizarAnimal);

        mysqli_close($conn);

        insertarControl($ventaanimal, $ventacomprador, $ventaprecio);
    }//insertarVenta

    public function insertarResubasta($resubastaAnimal, $resubastaComprador,
    $resubastaPrecio) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(resubastaid) AS resubastaid  FROM tbresubasta";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryInsert = "INSERT INTO tbresubasta VALUES (" . $nextId . "," .$resubastaAnimal. ",
        " .$resubastaComprador. "," .$resubastaPrecio. "," ."'A'" . ");";

        $result = mysqli_query($conn, $queryInsert);

        $queryActualizarAnimal = "UPDATE tbanimal SET  animalestado = " . "'resubastado'".
                " WHERE animalnumero = " . $resubastaAnimal . ";";

        mysqli_query($conn, $queryActualizarAnimal);

        mysqli_close($conn);

        insertarControl($resubastaanimal, $resubastacomprador, $resubastaprecio);
    }//insertarresubasta

    public function insertarControl($Animal, $Comprador, $Precio) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryInsert = "INSERT INTO tbsubasta (id_animal, id_comprador, precio) VALUES (" . $Animal . "," . $Comprador . "," . $Precio . ");";

        $result = mysqli_query($conn, $queryInsert);

        mysqli_close($conn);

    }//insertarVenta

    public function eliminarVenta($subastaid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbventa SET ventaestado = 'B' WHERE ventaid = " . $subastaid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminarVenta

    public function eliminarRresubasta($subastaid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbresubasta SET resubastaestado = 'B' WHERE resubastaid = " . $subastaid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminarResubasta

    public function obtenerVentas() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbventa;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $ventas = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['ventaestado']!='B'){
                 $subasta = new subasta($row['ventaid'], $row['ventaanimal']
                ,$row['ventacomprador'],$row['ventaprecio'], $row['ventaestado']);
                array_push($ventas, $subasta);

            }//end if

        }//end while

        return $ventas;

    }//obtenerVentas

    public function obtenerResubastas() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbresubasta;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $resubastas = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['resubastaestado']!='B'){
                 $subasta = new subasta($row['resubastaid'], $row['resubastaanimal']
                ,$row['resubastacomprador'],$row['resubastaprecio'], $row['resubastaestado']);
                array_push($resubastas, $subasta);

            }//end if

        }//end while

        return $resubastas;

    }//obtenerResubastas
        public function obtenerResubastasYventas() {

                $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
                $conn->set_charset('utf8');

                $querySelect = "SELECT tbventa.ventaid,tbventa.ventaanimal,tbventa.ventacomprador,tbventa.ventaprecio,tbventa.ventaestado
                 FROM tbventa;";
                 $querySelect2 = "SELECT tbresubasta.resubastaid,tbresubasta.resubastaanimal,
                 tbresubasta.resubastacomprador,tbresubasta.resubastaprecio,tbresubasta.resubastaestado
                 FROM tbresubasta;";
                $result1 = mysqli_query($conn, $querySelect);
                $result2 = mysqli_query($conn, $querySelect2);

                mysqli_close($conn);
                $allVentas["Ventas"][] = [];
                $allVentas["Resubastas"][] = [];
                while ($row = mysqli_fetch_array($result1)) {
                        $allVentas["Ventas"][] = $row;
                }//end while

                while ($row = mysqli_fetch_array($result2)) {
                        $allVentas["Resubastas"][] = $row;
                }//end while

                echo json_encode($allVentas);

        }//obtenerResubastas

        public function obtenerUnaVenta($idVenta){

            $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
            $conn->set_charset('utf8');
            $querySelect = "SELECT * FROM tbventa WHERE ventaid=" . $idVenta. ";";
            $result1 = mysqli_query($conn, $querySelect);
            while ($row = mysqli_fetch_array($result1)) {
                    $venta["venta"][] = $row;
            }//end while
            echo json_encode($venta);
        }
        public function obtenerUnaResubasta($idResubasta){

            $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
            $conn->set_charset('utf8');
            $querySelect = "SELECT * FROM tbresubasta WHERE resubastaid=" . $idResubasta. ";";
            $result1 = mysqli_query($conn, $querySelect);
            while ($row = mysqli_fetch_array($result1)) {
                    $resubasta["resubasta"][] = $row;
            }//end while
            echo json_encode($resubasta);
        }
    public function obtenerMontoSubastas() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //monto acumulado de las subastas realizadas
        $queryMonto = "SELECT SUM(precio) AS precio  FROM tbsubasta";
        $idCont = mysqli_query($conn, $queryMonto);

        if ($row = mysqli_fetch_row($idCont)) {
            $montoVentas = trim($row[0]);
        }//end if

        $montoTotal = $montoVentas;

        mysqli_close($conn);

        echo json_encode($montoTotal);

    }//insertarVenta



        public function obtenerVentasPorComprador($compradorId){
            $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
            $conn->set_charset('utf8');

            $querySelectVentas = "SELECT tbcomprador.compradorcodigo,tbcomprador.compradornombrecompleto,
             tbcomprador.compradortelefono,tbventa.ventaid,tbventa.ventaprecio,
             tbventa.ventaanimal FROM tbcomprador,tbventa WHERE tbventa.ventacomprador=" .$compradorId.
              " AND tbcomprador.compradorcodigo =" .$compradorId. ";";

            $querySelectResubastas = "SELECT tbcomprador.compradorcodigo,tbcomprador.compradornombrecompleto,
             tbcomprador.compradortelefono,tbresubasta.resubastaid,tbresubasta.resubastaprecio,
             tbresubasta.resubastaanimal FROM tbcomprador,tbresubasta WHERE tbresubasta.resubastacomprador=" .$compradorId.
          " AND tbcomprador.compradorcodigo =" .$compradorId. ";";

            $resultVentas = mysqli_query($conn, $querySelectVentas);
            $resultResubastas = mysqli_query($conn, $querySelectResubastas);

            mysqli_close($conn);
            $ventas["Ventas"][] = [];
            $ventas["Resubastas"][] = [];
            while ($row = mysqli_fetch_array($resultVentas)) {
                $ventas["Ventas"][] = $row;
            }//end while

            while ($row = mysqli_fetch_array($resultResubastas)) {
                $ventas["Resubastas"][] = $row;
            }//end while

            echo json_encode($ventas);
    }//Facturas por



}//end class

?>