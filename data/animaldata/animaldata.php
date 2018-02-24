<?php

if (isset($_POST['eliminar']) || isset($_POST['actualizar']) || isset($_POST['insertar'])
|| isset($_POST['obtenerEdad']) || isset($_POST['obtenerDatosAnimal'])
|| isset($_POST['obtenerOpciones']) || isset($_POST['obtenerNumerosAnimales'])
|| isset($_POST['animalNumero']) || isset($_POST['obtenerActualizar']) ||
isset($_POST['vistaRegistroAnimal'])) {

    include_once '../../data/data.php';
    include '../../domain/animal/animal.php';

}else {

    include_once '../data/data.php';
    include '../domain/animal/animal.php';

}

class AnimalData extends Data {

	public function insertarAnimal($animal) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        //validar que el numero del animal no exista previamente
        $queryValidate = "SELECT COUNT(*) FROM tbanimal WHERE animalnumero='".$animal->getAnimalNumero()."';";
        $result2 = mysqli_query($conn,$queryValidate);
        $number;

        while($row=mysqli_fetch_row($result2)){
            $number = $row[0];
        }//end while

        if($number == 1){
            mysqli_close($conn);
            return("error");
        }else{
            $queryInsert = "INSERT INTO tbanimal VALUES (" . $animal->getAnimalNumero() . ", " .
            "'".$animal->getAnimalDonador()."'". "," .
            "'".$animal->getAnimalLugarProcedencia() ."'". ", "
            .$animal->getAnimalTipo(). ", "
            .$animal->getAnimalRaza().", " .
            "'".$animal->getAnimalDescripcion() ."'". ", " .
            "'subasta'". ");";

            $result = mysqli_query($conn, $queryInsert);
            mysqli_close($conn);

            if($result){
                return ($result);
            }else{
                return ("error");
            }//if-else
        }//if-else

        //return $result;

    }//insertar animal


     public function actualizarAnimal($animal) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');
        $queryUpdate = "UPDATE tbanimal SET animaldonador = " . "'".$animal->getAnimalDonador()."'".
                ", animallugarprocedencia = " . "'".$animal->getAnimalLugarProcedencia()."'".
                ", animaltipo = " .$animal->getAnimalTipo() .
                ", animalraza = " .$animal->getAnimalRaza() .
                ", animaldescripcion = " . "'".$animal->getAnimalDescripcion()."'".
                " WHERE animalnumero = " . $animal->getAnimalNumero() . ";";

        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//actualizar animal


    public function venderAnimal($animalid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbanimal SET animalestado = 'subasta' WHERE animalid = " . $animalid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminar animal

    public function resubastarAnimal($animalid) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $queryUpdate = "UPDATE tbanimal SET animalestado = 'resubasta' WHERE animalid = " . $animalid . ";";
        $result = mysqli_query($conn, $queryUpdate);
        mysqli_close($conn);

        return $result;

    }//eliminar animal

    public function obtenerAnimales() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT * FROM tbanimal;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $animales = [];

        while ($row = mysqli_fetch_array($result)) {
            $animal = new animal($row['animalnumero'], $row['animaldonador'], $row['animallugarprocedencia'],
            $row['animaltipo'],$row['animalraza'], $row['animalestado'] , $row['animaldescripcion']);
            array_push($animales, $animal);
        }//end while

        return $animales;
    }//obteneranimales


        public function obtenerAnimalesEnSubasta() {

            $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
            $conn->set_charset('utf8');

            $querySelect = "SELECT * FROM tbanimal;";
            $result = mysqli_query($conn, $querySelect);
            mysqli_close($conn);
            $animales = [];

            while ($row = mysqli_fetch_array($result)) {

              if($row['estado']=='subasta' || $row['estado']=='resubasta'){
                $animal = new animal($row['animalid'], $row['animalpersonaid'], $row['animallugardeprocedencia'],
                $row['animaltipo'],$row['animalraza'], $row['animalestado']);
                array_push($animales, $animal);
              }

            }//end while

            return $animales;
        }//obteneranimales


    /***METODO PARA OBTENER LOS NUMEROS DE LOS ANIMALES Y EL NOMBRE DE LOS DONADORES PARA PODER SELECCIONAR EL REGISTRO ESPECIFICO***/
     public function obtenerAnimalesRegistrados() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT animalnumero, animaldonador,
        animalestado FROM tbanimal;";
        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);
        $animales = [];

        while ($row = mysqli_fetch_array($result)) {
            if($row["animalestado"] !== "vendido"){
                array_push($animales, $row);
            }//if
        }//end while

        return $animales;
    }//obteneranimales

    /***METODO PARA OBTENER LOS DATOS DE UN REGISTRO ESPECIFICO PARA ACTUALIZAR O ELIMINAR LOS DATOS***/
     public function obtenerDatosAnimal($animalnumero) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT animal.animalnumero, animal.animaldonador,
        animal.animallugarprocedencia, tipoAnimal.tipoanimalnombre, raza.razanombre,
        animal.animaldescripcion, animal.animalestado FROM tbanimal As animal
        INNER JOIN tbtipoanimal AS tipoAnimal ON animal.animaltipo = tipoanimalid
        INNER JOIN tbraza AS raza ON animal.animalraza = raza.razaid
        WHERE animalnumero = ".$animalnumero.";";

        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);

        while ($row = mysqli_fetch_array($result)) {
            $animales["Data"][] = $row;
        }//end while

        echo json_encode($animales);

    }//obteneranimales

    public function obtenerDatosActualizar($animalnumero) {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelect = "SELECT animalnumero, animaldonador,
        animallugarprocedencia, animaltipo, animalraza,
        animaldescripcion, animalestado FROM tbanimal
        WHERE animalnumero = ".$animalnumero.";";

        $result = mysqli_query($conn, $querySelect);
        mysqli_close($conn);

        while ($row = mysqli_fetch_array($result)) {
            $animales["Data"][] = $row;
        }//end while

        echo json_encode($animales);

    }//obtenerDatosActualizar

    /***METODO QUE RETORNA LAS OPCIONES DE LOS COMBOS PARA PODER ACTUALIZAR DATOS DE CATEGORIA Y RAZAS DEL ANIMAL***/
    public function obtenerOpcionesAnimal() {

        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
        $conn->set_charset('utf8');

        $querySelectTipos = "SELECT * FROM tbtipoanimal;";
        $result = mysqli_query($conn, $querySelectTipos);

        while ($row = mysqli_fetch_array($result)) {
            $datos["animalTipo"][] = $row;
        }//end while

        $querySelectRazas = "SELECT * FROM tbraza;";
        $resultRazas = mysqli_query($conn, $querySelectRazas);

        while ($row = mysqli_fetch_array($resultRazas)) {
            $datos["animalRazas"][] = $row;
        }//end while

        mysqli_close($conn);

        echo json_encode($datos);
    }//insertar encargado

    /*** Se obtiene los números correspondientes a los animales***/
    public function obtenerNumerosAnimales(){

            $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
            $conn->set_charset('utf8');

            $querySelect = "SELECT animalnumero FROM tbanimal Where animalestado <> 'vendido'";
            $result = mysqli_query($conn, $querySelect);
            mysqli_close($conn);

            $ingreso = 'false';

            while($temp = mysqli_fetch_array($result)){
                $numeros["Data"][] = $temp;
                $ingreso = 'true';
            }

            if ($ingreso == 'true') {
                echo json_encode($numeros);
            }else {
                echo 'Sin coincidencias';
            }
    }

    /*Obtiene los ultimos 4 animales registrados*/
    public function obtenerDatosAnimalesRegistrados() {
       $conn = mysqli_connect($this->server, $this->user, $this->password, $this->db);
       $conn->set_charset('utf8');

       $querySelect = "SELECT animal.animalnumero, animal.animaldonador,
       tipoAnimal.tipoanimalnombre FROM tbanimal As animal
       INNER JOIN tbtipoanimal AS tipoAnimal ON animal.animaltipo = tipoAnimal.tipoanimalid ORDER BY animal.animalnumero DESC LIMIT 4";

       //SELECT * FROM tabla ORDER BY id DESC LIMIT 5

       $result = mysqli_query($conn, $querySelect);
       mysqli_close($conn);

       $flag = false;

       while ($row = mysqli_fetch_array($result)) {
           $animales["Data"][] = $row;

           $flag = true;
       }//end while

       if ($flag == true) {
           echo json_encode($animales);
       }else {
           echo "Sin coincidencias";
       }

   }//obteneranimales

}//end class

?>
