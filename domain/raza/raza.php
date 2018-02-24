<?php
    class raza{
        private $RazaId;
        private $RazaNombre;

        function raza($RazaId, $NombreRaza)
        {
            $this->RazaId = $RazaId;
            $this->RazaNombre = $NombreRaza;
        }

        /***********************************************************************
        *                        METODOS ACCESORES                             *
        ************************************************************************/

        /*GET*/
        public function getRazaId()
        {
            return $this->RazaId;
        }

        public function getRazaNombre()
        {
            return $this->RazaNombre;
        }

        /*SET*/
        public function setRazaId($RazaId)
        {
            $this->RazaId = $RazaId;
        }

        public function setRazaNombre($RazaNombre)
        {
            $this->RazaNombre = $RazaNombre;
        }
    }
?>
