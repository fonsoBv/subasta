<?php
    class animal {
        private $AnimalId;
        private $AnimalDonador;
        private $AnimallugarProcedencia;
        private $AnimalTipo;
        private $AnimalRaza;
        private $AnimalDescripcion;
        private $AnimalEstado;


        function animal($AnimalId, $AnimalDonador, $AnimallugarProcedencia, $AnimalTipo,
        $AnimalRaza, $AnimalEstado, $AnimalDescripcion){
            $this->AnimalId = $AnimalId;
            $this->AnimalDonador = $AnimalDonador;
            $this->AnimallugarProcedencia = $AnimallugarProcedencia;
            $this->AnimalTipo = $AnimalTipo;
            $this->AnimalRaza = $AnimalRaza;
            $this->AnimalEstado = $AnimalEstado;
            $this->AnimalDescripcion = $AnimalDescripcion;
        }

        /***********************************************************************
        *                        METODOS ACCESORES                             *
        ************************************************************************/

        /*GET*/
        public function getAnimalNumero()
        {
            return $this->AnimalId;
        }

        public function getAnimalDonador()
        {
            return $this->AnimalDonador;
        }

        public function getAnimalLugarProcedencia()
        {
            return $this->AnimallugarProcedencia;
        }

        public function getAnimalTipo()
        {
            return $this->AnimalTipo;
        }

        public function getAnimalRaza()
        {
            return $this->AnimalRaza;
        }

        public function getAnimalEstado()
        {
            return $this->AnimalEstado;
        }

        public function getAnimalDescripcion()
        {
            return $this->AnimalDescripcion;
        }

        /*SET*/
        public function setAnimalId($AnimalId)
        {
            $this->AnimalId = $AnimalId;
        }

        public function setAnimalDonador($AnimalDonador)
        {
            $this->AnimalPersonaid = $AnimalDonador;
        }

        public function setAnimallugarProcedencia($AnimallugarProcedencia)
        {
            $this->AnimallugarProcedencia = $AnimallugarProcedencia;
        }

        public function setAnimalTipo($AnimalTipo)
        {
            $this->Animaltipo = $AnimalTipo;
        }

        public function setAnimalRaza($AnimalRaza)
        {
            $this->AnimalRaza = $AnimalRaza;
        }

        public function setAnimalEstado($AnimalEstado)
        {
            $this->AnimalEstado = $AnimalEstado;
        }

        public function setAnimalDescripcion($AnimalDescripcion)
        {
            $this->AnimalDescripcion = $AnimalDescripcion;
        }
    }
?>
