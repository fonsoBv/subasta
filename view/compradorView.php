<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Comprador</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="./alertify.core.css" />
<link rel="stylesheet" href="./alertify.default.css" id="toggleCSS" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery-1.11.0.min.js"></script>
<script src="./alertify.min.js"></script>
<script src="./jquery.mask.min.js"></script>
<!-- Custom Theme files -->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="shortcut icon" type="image/x-icon" href="../images/vaca.ico" /><!-- Icono de la pagina -->
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Horse Farm Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Baumans' rel='stylesheet' type='text/css'>
<?php
    include '../business/compradorbusiness/compradorBusiness.php';
?>
</head>
<body>
<!--header start here-->
<div class="banner-two">
  <div class="header">
    <div class="container">
         <div class="header-main">
                <div class="logo">
                    <h1><a href="../index.html">Inicio</a></h1>
                </div>
         <div class="clearfix"> </div>
      </div>
    </div>
 </div>
</div>
<!--header end here-->

    <?php
        $compradorBusiness = new CompradorBusiness();
        $compradores = $compradorBusiness->obtenerTBComprador();
    ?>

    <div class="container">
        <div class="single">
            <div class="comment-bottom">
            <div class="col-md-3 banner-left">
                <div class="div-codigo">
                <div>
                <label>C&oacute;digo de Comprador</label>
                </div>
                <div>
                    <span id="codigoMostrar">#</span>
                </div>
                </div>
        </div>
            <div class="col-md-9 banner-right">
                <h3>Registrar Comprador</h3>
                <form method="post" action="../business/compradorbusiness/compradorAction.php">
                    <div>
                        <label>N&uacute;mero de Identificaci&oacute;n</label>
                        <input type="text" name="compradorNumeroIdentificacion" id="compradorNumeroIdentificacion" placeholder="Número Identificación" />
                    </div>
                    <div>
                        <label>Nombre Completo</label>
                        <td><input type="text" name="compradorNombreCompleto" id="compradorNombreCompleto" placeholder="Nombre Completo" /></td>
                    </div>
                    <div>
                        <label>Tel&eacute;fono</label>
                        <td><input type="text" name="compradorTelefono" id="compradorTelefono" placeholder="Teléfono" /></td>
                    </div>
                    <div>
                        <label>Direcci&oacute;n</label>
                        <td><input type="text" name="compradorDireccion" id="compradorDireccion" placeholder="Dirección" /></td>
                    </div>
                    <div>
                        <label>Recomendaci&oacute;n</label>
                        <td><input type="text" name="compradorRecomendacion" id="compradorRecomendacion" placeholder="Recomendacion" /></td>
                    </div>
                    <div>
                        <label>Tipo de pago</label>
                        <select id="compradorTipoPago" name="compradorTipoPago">
                            <option selected value="Contado">Contado</option>
                            <option value="Credito">Cr&eacute;dito</option>
                        </select>
                    </div>
                    <div>
                        <label id="etiquetaNumeroPagare">N&uacute;mero de Pagar&eacute;</label>
                        <input type="number" name="compradorNumeroPagare" id="compradorNumeroPagare" placeholder="Número de Pagaré">
                    </div>
                    <div>
                        <input type="button" value="Registrar" name="insertar" id="insertar" onclick="insertarComprador();" />
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <br><br>

<div class="footer">
    <div class="container">
        <div class="copy-right">
            <p>© 2018 Subasta. Template obtenido de <a href="http://w3layouts.com/" target="_blank">  W3layouts </a></p>
        </div>
    </div>
</div>
<!--footer end here-->
</body>
</html>

<script>

    function validarDatos(){

        identificacion = $("#compradorNumeroIdentificacion").val().trim();
        nombre = $("#compradorNombreCompleto").val().trim();
        telefono = $("#compradorTelefono").val().trim();
        direccion = $("#compradorDireccion").val().trim();

        if(identificacion.length < 1){
            mostrarMensaje("error", "Cédula inválida");
            return false;
        }else if(nombre.length < 1 || nombre.length > 100){
            mostrarMensaje("error", "Debe ingresar el nombre");
            return false;
        }else if(telefono.length < 1){
            mostrarMensaje("error", "Número de Teléfono inválido");
            return false;
        }else if(direccion.length < 1 || direccion.length > 200){
            mostrarMensaje("error", "Debe ingresar una dirección");
            return false;
        }//if-else

        return true;
    }//validarDatos

    function mostrarMensaje(estado,mensaje){
        if(estado === "success"){
            reset();
            alertify.success(mensaje);
            return false;
        }else if(estado === "error"){
            reset();
            alertify.error(mensaje);
            return false;
        }//if-else
    }//mostrarMensaje

    function insertarComprador() {

        if(validarDatos()){

            if($("#compradorTipoPago").val() === "Contado"){
                var parameters = {
                    "insertar" : 'insertar',
                    "compradorNombreCompleto" : $("#compradorNombreCompleto").val(),
                    "compradorNumeroIdentificacion" : $("#compradorNumeroIdentificacion").val(),
                    "compradorTelefono" : $("#compradorTelefono").val(),
                    "compradorDireccion" : $("#compradorDireccion").val(),
                    "compradorTipoPago" : $("#compradorTipoPago").val(),
                    "compradorRecomendacion" : $("#compradorRecomendacion").val(),
                };
            }else{
                var parameters = {
                    "insertar" : 'insertar',
                    "compradorNombreCompleto" : $("#compradorNombreCompleto").val(),
                    "compradorNumeroIdentificacion" : $("#compradorNumeroIdentificacion").val(),
                    "compradorTelefono" : $("#compradorTelefono").val(),
                    "compradorDireccion" : $("#compradorDireccion").val(),
                    "compradorTipoPago" : $("#compradorTipoPago").val(),
                    "compradorRecomendacion" : $("#compradorRecomendacion").val(),
                    "compradorNumeroPagare" : $("#compradorNumeroPagare").val()
                };
            }//if-else

            $.post("../business/compradorbusiness/compradorAction.php",parameters, function(data){

                //alert(data);
                if(data != '"error"'){
                    if(data === '"Error: Persona ya registrada en el sistema"'){
                        mostrarMensaje("error", "Error: Persona ya registrada en el sistema");
                    }else{
                        $("#codigoMostrar").html("Código: " + data + " Comprador: " + $("#compradorNombreCompleto").val());
                        $("#compradorNombreCompleto").val("");
                        $("#compradorTelefono").val("");
                        $("#compradorDireccion").val("");
                        $("#compradorRecomendacion").val("");
                        $("#compradorTipoPago").val("Contado");
                        $("#compradorNumeroPagare").hide();
                        $("#etiquetaNumeroPagare").hide();
                        $("#compradorNumeroIdentificacion").val("");
                        mostrarMensaje("success", "Transacción Exitosa");
                    }//if-else
                }else{
                    mostrarMensaje("error", "Error al procesar la transacción");
                }//if
            });
        }
    }//insertarComprador

    $("#compradorTipoPago").change(function(){
        if($("#compradorTipoPago").val() === "Credito"){
            $("#compradorNumeroPagare").show();
            $("#etiquetaNumeroPagare").show();
        }else{
            $("#compradorNumeroPagare").hide();
            $("#etiquetaNumeroPagare").hide();
        }
    });

    $(document).ready(function () {
        $("#compradorNumeroPagare").hide();
        $("#etiquetaNumeroPagare").hide();

        $('#compradorTelefono').mask('0000-0000');
    });

    /*FUNCION QUE LIMPIA EL ESPACIO PARA COLOCAR LAS NOTIFICACIONES*/
    function reset () {
        $("#toggleCSS").attr("href", "./alertify.default.css");
            alertify.set({
                labels : {
                    ok     : "OK",
                    cancel : "Cancel"
                },
                delay : 5000,
                buttonReverse : false,
                buttonFocus   : "ok"
        });
    }//reset
</script>
