<?php
    class comprador{
        private $CompradorCodigo;
        private $CompradorCedula;
        private $CompradorTelefono;
        private $CompradorRecomendacion;
        private $CompradorDireccion;
        private $CompradorNombreCompleto;
        private $CompradorPago;
        private $CompradorNumeroPagare;

        function comprador($CompradorCodigo,$CompradorCedula,$CompradorNombreCompleto,$CompradorTelefono,$CompradorRecomendacion,$CompradorDireccion,$CompradorPago, $CompradorNumeroPagare){
            $this->CompradorCodigo = $CompradorCodigo;
            $this->CompradorNombreCompleto = $CompradorNombreCompleto;
            $this->CompradorCedula = $CompradorCedula;
            $this->CompradorDireccion = $CompradorDireccion;
            $this->CompradorRecomendacion = $CompradorRecomendacion;
            $this->CompradorTelefono = $CompradorTelefono;
            $this->CompradorPago = $CompradorPago;
            $this->CompradorNumeroPagare = $CompradorNumeroPagare;
        }

        /**************************************************************************
        *                        METODOS ACCESORES                                *
        ***************************************************************************/

        /*GET*/
        public function getCompradorPago(){
            return $this->CompradorPago;
        }


        public function getCompradorTelefono(){
            return $this->CompradorTelefono;
        }

        public function getCompradorDireccion(){
            return $this->CompradorDireccion;
        }

        public function getCompradorRecomendacion(){
            return $this->CompradorRecomendacion;
        }

        public function getCompradorCedula(){
            return $this->CompradorCedula;
        }


        public function getCompradorCodigo(){
            return $this->CompradorCodigo;
        }

        public function getCompradorNombreCompleto(){
            return $this->CompradorNombreCompleto;
        }

        public function getCompradorNumeroPagare(){
            return $this->CompradorNumeroPagare;
        }


        /*SET*/
        public function setCompradorCodigo($CompradorCodigo){
            $this->CompradorCodigo= $CompradorCodigo;
        }

        public function setCompradorNombreCompleto($CompradorNombreCompleto){
            $this->CompradorNombreCompleto = $CompradorNombreCompleto;
        }


        public function setCompradorPago($CompradorPago){
          $this->CompradorPago = $CompradorPago;

        }


        public function setCompradorTelefono($CompradorTelefono){
          $this->$CompradorTelefono = $CompradorTelefono;

        }

        public function setCompradorDireccion($CompradorDireccion){
          $this->$CompradorDireccion = $CompradorDireccion ;
        }

        public function setCompradorRecomendacion($CompradorRecomendacion){

          $this->$CompradorRecomendacion = $CompradorRecomendacion;

        }

        public function setCompradorCedula($CompradorCedula){
            $this->$CompradorCedula = $CompradorCedula ;
        }

        public function setCompradorNumeroPagare($CompradorNumeroPagare){
            $this->$CompradorNumeroPagare = $CompradorNumeroPagare;
        }

    }
?>
