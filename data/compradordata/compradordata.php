<?php


/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar']) ||
isset($_POST['eliminarTelefono']) || isset($_POST['agregarTelefono']) || isset($_POST['obtener']) ||
isset($_POST['buscar']) || isset($_POST['obtenerCompradores']) || isset($_POST['informacionComprador'])) {
	include_once '../../data/data.php';
	include '../../domain/comprador/comprador.php';
}else {
	include_once '../data/data.php';
	include '../domain/comprador/comprador.php';
}
//codi,cedula,nmombrem,tele,direc,recom,pago

class CompradorData extends Data {

    public function insertarComprador($comprador) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //validar que el numero de cedula no exista previamente
        $queryValidate = "SELECT COUNT(*) FROM tbcomprador WHERE compradornumeroidentificacion='".$comprador->getCompradorCedula()."';";
        $result2 = mysqli_query($conn,$queryValidate);
        $number;

        while($row=mysqli_fetch_row($result2)){
            $number = $row[0];
        }//end while

        if($number == 1){
            mysqli_close($conn);
            echo json_encode("Error: Persona ya registrada en el sistema");
        }else{
            //Get the last id
            $queryGetLastId = "SELECT MAX(compradorcodigo) AS compradorcodigo  FROM tbcomprador";
            $idCont = mysqli_query($conn, $queryGetLastId);
            $nextId = 1;

            if ($row = mysqli_fetch_row($idCont)) {
                $nextId = trim($row[0]) + 1;
            }//end if

            $queryInsert = "INSERT INTO tbcomprador VALUES (" . $nextId . "," .
                    "'".$comprador->getCompradorCedula() ."'". "," .
                    "'".$comprador-> getCompradorNombreCompleto() ."'". "," .
                    "'".$comprador-> getCompradorTelefono() ."'". "," .
                    "'".$comprador-> getCompradorDireccion() ."'". "," .
                    "'".$comprador-> getCompradorRecomendacion() ."'". ",".
                    "'".$comprador-> getCompradorPago() ."'". ",".
                        $comprador->getCompradorNumeroPagare().");";

            $result = mysqli_query($conn, $queryInsert);

            mysqli_close($conn);

            if($result){
                echo json_encode($nextId);
            }else{
                echo json_encode("error");
            }
        }//if-else
        //return $result;
    }//insertar encargado

    public function actualizarComprador($comprador) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbcomprador SET compradornumeroidentificacion = ". "'".$comprador->getCompradorCedula()."'".",".
				" compradornombrecompleto = " . "'".$comprador->getCompradorNombreCompleto() ."'".
                ", compradortelefono = " ."'".$comprador->getCompradorTelefono() ."'".
				", compradordireccion = " ."'".$comprador->getCompradorDireccion() ."'".
				", compradorrecomendador = " ."'".$comprador->getCompradorRecomendacion() ."'".
				", compradortipopago = " ."'".$comprador->getCompradorPago() ."'".
                ", compradornumeropagare = " .$comprador->getCompradorNumeroPagare().
                " WHERE compradorcodigo = " . $comprador->getCompradorCodigo() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        echo json_encode($result);
        //return $result;
    }//actualizar encargado


    public function obtenerCompradores() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbcomprador;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $compradores = [];
        while ($row = mysqli_fetch_array($result)) {

                 $comprador = new comprador($row['compradorcodigo'], $row['compradornumeroidentificacion'],
								 $row['compradornombrecompleto'],$row['compradortelefono'],$row['compradordireccion']
							 ,$row['compradorrecomendador'],$row['compradortipopago'] ,$row['compradornumeropagare']);
                array_push($compradores, $comprador);

        }//end while

        return $compradores;
    }//obtenerMedicos

  public function obtenerCompradoresFactura() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT DISTINCT tbcomprador.compradorcodigo, tbcomprador.compradornombrecompleto FROM tbcomprador,tbventa,tbresubasta WHERE 
        tbcomprador.compradorcodigo = tbventa.ventacomprador OR tbresubasta.resubastacomprador=tbcomprador.compradorcodigo;";

        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $compradores = [];
        while ($row = mysqli_fetch_array($result)) {

                 $comprador = new comprador($row['compradorcodigo'], 0,
                                 $row['compradornombrecompleto'],0, 0,0,0,0);
                array_push($compradores, $comprador);

        }//end while

        return $compradores;
    }//obtenerMedicos


	public function obtenerCompradoresJSON(){
		$conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT compradornombrecompleto, compradorcodigo, compradornumeroidentificacion,
		compradortelefono, compradordireccion, compradorrecomendador FROM tbcomprador;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);

        while ($row = mysqli_fetch_array($result)) {
			$compradores["Data"][] = $row;
        }//end while

		echo json_encode($compradores);
	}

	public function obtenerCompradorPorIdConJSON($compradorcodigo){
		$conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT compradornombrecompleto, compradorcodigo, compradornumeroidentificacion,
		compradortelefono, compradordireccion, compradorrecomendador, compradortipopago, compradornumeropagare FROM tbcomprador WHERE compradorcodigo = ". $compradorcodigo .";";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);

        while ($row = mysqli_fetch_array($result)) {
			$compradores["Data"][] = $row;
        }//end while

		echo json_encode($compradores);
	}

}//end class

?>
