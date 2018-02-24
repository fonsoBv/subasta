<?php
    class subasta {
        private $SubastaId;
        private $SubastaAnimal;
        private $SubastaComprador;
        private $SubastaPrecio;
        private $SubastaEstado;

        function subasta($SubastaId, $SubastaAnimal, $SubastaComprador, $SubastaPrecio, $SubastaEstado)
        {
            $this->SubastaId = $SubastaId;
            $this->SubastaAnimal = $SubastaAnimal;
            $this->SubastaComprador = $SubastaComprador;
            $this->SubastaPrecio = $SubastaPrecio;
            $this->SubastaEstado = $SubastaEstado;
        }

        /***********************************************************************
        *                        METODOS ACCESORES                             *
        ************************************************************************/

        /*GET*/
        public function getSubastaId()
        {
            return $this->SubastaId;
        }

        public function getSubastaAnimal()
        {
            return $this->SubastaAnimal;
        }

        public function getSubastaComprador()
        {
            return $this->SubastaComprador;
        }

        public function getSubastaPrecio()
        {
            return $this->SubastaPrecio;
        }

        public function getSubastaEstado()
        {
            return $this->SubastaEstado;
        }

        /*SET*/
        public function setSubastaId($SubastaId)
        {
            $this->SubastaId = $SubastaId;
        }

        public function setSubastaAnimal($SubastaAnimal)
        {
            $this->SubastaAnimal = $SubastaAnimal;
        }

        public function setSubastaComprador($SubastaComprador)
        {
            $this->SubastaComprador = $SubastaComprador;
        }

        public function setSubastaPrecio($SubastaPrecio)
        {
            $this->SubastaPrecio = $SubastaPrecio;
        }

        public function setSubastaEstado($SubastaEstado)
        {
            $this->SubastaEstado = $SubastaEstado;
        }
    }
?>
