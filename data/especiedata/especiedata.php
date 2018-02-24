<?php

/*
Entra en el if se realiza las siguientes operaciones, por que se toma
la ruta desde el business, y entra en el else si no se realiza el crud por
que se toma la ruta desde el view
*/

if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar']) || isset($_POST['obtenerTipoAnimal'])) {

    include_once '../../data/data.php';
    include '../../domain/especie/especie.php';

}else {

    include_once '../data/data.php';
    include '../domain/especie/especie.php';

}

class EspecieData extends Data {

    public function insertarEspecie($especie) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //Get the last id
        $queryGetLastId = "SELECT MAX(especieid) AS especieid  FROM tbespecie";
        $idCont = mysqli_query($conn, $queryGetLastId);
        $nextId = 1;

        if ($row = mysqli_fetch_row($idCont)) {
            $nextId = trim($row[0]) + 1;
        }//end if

        $query2 = "SELECT COUNT(*) FROM tbespecie WHERE especienombre='".$especie->getEspecieNombre()."';";
        $result2 = mysqli_query($conn,$query2);
        $temp;

        while($row=mysqli_fetch_row($result2)){
            $temp = $row[0];
        }//end while

    if($temp==1){

        $queryUpdate = "UPDATE tbespecie SET especieestado = 'A' WHERE especienombre = '" .$especie->getEspecieNombre() . "';";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);
        return $result;

    }else{

        $queryInsert = "INSERT INTO tbespecie VALUES (" . $nextId . "," .
        "'".$especie->getEspecieNombre() ."'". ",". "'" . $especie->getEspecieEstado    () . "'" .");";
        $result = mysqli_query($conn, $queryInsert);
        mysqli_close($conn);
        return $result;

    }//else-if

    }//insertar especie


     public function actualizarEspecie($especie) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbespecie SET especienombre = " . "'" . $especie->getEspecieNombre() . "'".  "WHERE especieid =". $especie->getEspecieId() .";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar especie


    public function eliminarEspecie($especieid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbespecie SET especieestado = 'B' WHERE especieid = " . $especieid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminarEspecie



    public function obtenerEspeciePorCategoria($categoriaId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbtipoanimal WHERE tipoanimalcategoria = ". $categoriaId ." order by tipoanimalid ASC;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $tipoanimal = [];
        while ($row = mysqli_fetch_array($result)) {
            $especie = new especie($row['tipoanimalid'], $row['tipoanimalnombre'],
                                 $row['tipoanimalcategoria']);
                array_push($tipoanimal, $especie);
        }//end while

        return $tipoanimal;

    }//obtenerEspecie

    public function obtenerEspeciePorCategoria2($categoriaId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbtipoanimal WHERE tipoanimalcategoria = ". $categoriaId ." order by tipoanimalid ASC;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);

        while ($row = mysqli_fetch_array($result)) {
            $tipoanimal["Data"][] = $row;
        }//end while

        echo json_encode($tipoanimal);

    }//obtenerEspecie


       public function obtenerEspecie() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbespecie;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $razas = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['especieestado']!='B'){
                $raza = new especie($row['especieid'], $row['especienombre'],$row['especieestado']);
                array_push($razas, $raza);

            }//end if
        }//end while

        return $razas;

    }//obtenerEspecie


    public function obtenerActualizar($especieId) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbraza;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $especies = [];
        while ($row = mysqli_fetch_array($result)) {

            if($row['especieestado']!='B' && $row['especieid']==$especieId){
                $especies = new especie($row['especieid'], $row['especienombre'], $row['especieestado'],
                $row['especieid']);
                array_push($especies, $especie);

            }//end if

        }//end while

        return $especies;

    }//obtenerActualizar



}//end class

?>
