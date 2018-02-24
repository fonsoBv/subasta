<?php


/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/
if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar']) || isset($_POST['obtenerRazasTipo'])) {

    include_once '../../data/data.php';
	include '../../domain/raza/raza.php';

}else {

    include_once '../data/data.php';
	include '../domain/raza/raza.php';

}

class RazaData extends Data {

    public function insertarRaza($idEspecie,$raza) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(razaid) AS razaid  FROM tbraza";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $queryInsert = "INSERT INTO tbraza VALUES (" . $nextId . "," .
                "'".$raza->getRazaNombre() ."'". ",". "'".$raza->getRazaEstado()."'".",".
                "'".$idEspecie ."'".");";


        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);

        return $result;

    }//insertar raza


     public function actualizarRaza($raza) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbraza SET razanombre = " . "'" . $raza->getRazaNombre() . "'" ."," ."razaespecieid = " . $raza->getRazaEspecieId() . " WHERE razaid = " . $raza->getRazaId() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar mraza


    public function eliminarRaza($razaid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbraza SET razaestado = 'B' WHERE razaid = " . $razaid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminarRaza



    public function obtenerRazas() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbraza;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $razas = [];
        while ($row = mysqli_fetch_array($result)) {
                $raza = new Raza($row['razaid'], $row['razanombre']);
                array_push($razas, $raza);
        }//end while

        return $razas;

    }//obtenerRazas

    public function obtenerRazas2() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbraza;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);

        while ($row = mysqli_fetch_array($result)) {
            $razas["Data"][] = $row;
        }//end while

        echo json_encode($razas);

    }//obtenerRazas

    public function obtenerRazasAnimal($especieId){

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbraza, tbespecie WHERE tbraza.razaespecieid = tbespecie.especieid;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $razas = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['razaestado']!='B' && $row['razaespecieid'] == $especieId){
                $raza = new Raza($row['razaid'], $row['razanombre'], $row['razaestado'], $row['razaespecieid'], $row['especienombre']);
                array_push($razas, $raza);

                $array["Data"][] = $row;
            }//end if

        }//end while

                echo json_encode($array);

        //return $razas;

    }//obtenerRazasAnimal


    public function obtenerRazasTipo($razaId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbraza WHERE razatipo = ". $razaId ." ;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);

        while ($row = mysqli_fetch_array($result)) {
            $razas["Data"][] = $row;
        }//end while

        echo json_encode($razas);

    }//obtenerEspecie

}//end class

?>
