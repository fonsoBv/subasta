<?php
    class medico{
        private $MedicoId;
        private $MedicoNumeroIdentificacion;
        private $MedicoNombreCompleto;
        private $MedicoCorreo;
        private $MedicoEspecialidad;
        private $MedicoLicencia;
        private $MedicoFechaVigenciaLicencia;
        private $MedicoEstado;
	private $MedicoInclusionLaboral;
    

    function medico($MedicoId , $MedicoNumeroIdentificacion , $MedicoNombreCompleto ,
    $MedicoCorreo , $MedicoEspecialidad , $MedicoLicencia , $MedicoFechaVigenciaLicencia ,
    $MedicoEstado, $MedicoInclusionLaboral){
        $this->MedicoId = $MedicoId;
        $this->MedicoNumeroIdentificacion = $MedicoNumeroIdentificacion;
        $this->MedicoNombreCompleto = $MedicoNombreCompleto;
        $this->MedicoCorreo = $MedicoCorreo;
        $this->MedicoEspecialidad = $MedicoEspecialidad;
        $this->MedicoLicencia = $MedicoLicencia;
        $this->MedicoFechaVigenciaLicencia = $MedicoFechaVigenciaLicencia;
        $this->MedicoEstado = $MedicoEstado;
	$this->MedicoInclusionLaboral = $MedicoInclusionLaboral;
    }

    /**************************************************************************
    *                        METODOS ACCESORES                                *
    ***************************************************************************/

    /*GET*/
    public function getMedicoId()
    {
        return $this->MedicoId;
    }

    public function getMedicoNumeroIdentificacion()
    {
        return $this->MedicoNumeroIdentificacion;
    }

    public function getMedicoNombreCompleto()
    {
        return $this->MedicoNombreCompleto;
    }

    public function getMedicoCorreo()
    {
        return $this->MedicoCorreo;
    }

    public function getMedicoEspecialidad()
    {
        return $this->MedicoEspecialidad;
    }

    public function getMedicoLicencia()
    {
        return $this->MedicoLicencia;
    }

    public function getMedicoFechaVigenciaLicencia()
    {
        return $this->MedicoFechaVigenciaLicencia;
    }

    public function getMedicoEstado()
    {
        return $this->MedicoEstado;
    }

    public function getMedicoInclusionLaboral()
    {
        return $this->MedicoInclusionLaboral;
    }


    /*SET*/
    public function setMedicoId($MedicoId)
    {
        $this->MedicoId = $MedicoId;
    }

    public function setMedicoNumeroIdentificacion($MedicoNumeroIdentificacion)
    {
        $this->MedicoNumeroIdentificacion = $MedicoNumeroIdentificacion;
    }

    public function setMedicoNombreCompleto($MedicoNombreCompleto)
    {
        $this->MedicoNombreCompleto = $MedicoNombreCompleto;
    }

    public function setMedicoCorreo($MedicoCorreo)
    {
        $this->MedicoCorreo = $MedicoCorreo;
    }

    public function setMedicoEspecialidad($MedicoEspecialidad)
    {
        $this->MedicoEspecialidad = $MedicoEspecialidad;
    }

    public function setMedicoLicencia($MedicoLicencia)
    {
        $this->MedicoLicencia = $MedicoLicencia;
    }

    public function setMedicoFechaVigenciaLicencia($MedicoFechaVigenciaLicencia)
    {
        $this->MedicoFechaVigenciaLicencia = $MedicoFechaVigenciaLicencia;
    }

    public function setMedicoEstado($MedicoEstado)
    {
        $this->MedicoEstado = $MedicoEstado;
    }

    public function setMedicoInclusionLaboral($MedicoInclusionLaboral)
    {
        $this->MedicoInclusionLaboral = $MedicoInclusionLaboral;
    }
}
?>
