<?php
    class especie{
        private $EspecieId;
        private $EspecieNombre;
        private $EspecieCategoria;

        function especie($EspecieId, $EspecieNombre, $EspecieCategoria)
        {
            $this->EspecieId = $EspecieId;
            $this->EspecieNombre = $EspecieNombre;
            $this->EspecieCategoria = $EspecieCategoria;
        }

        /***********************************************************************
        *                        METODOS ACCESORES                             *
        ************************************************************************/

        /*GET*/
        public function getEspecieId()
        {
            return $this->EspecieId;
        }

        public function getEspecieNombre()
        {
            return $this->EspecieNombre;
        }

        public function getEspecieCategoria()
        {
            return $this->EspecieCategoria;
        }

        /*SET*/
        public function setEspecieId($EspecieId)
        {
            $this->EspecieId = $EspecieId;
        }

        public function setNombreEspecie($NombreEspecie)
        {
            $this->NombreEspecie = $NombreEspecie;
        }

        public function setEspecieCategoria($EspecieCategoria)
        {
            $this->EspecieCategoria = $EspecieCategoria;
        }
    }

?>
