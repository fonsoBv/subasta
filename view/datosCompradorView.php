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
<script src="./jquery-3.2.1.js"></script>
<link href="../select2.min.css" rel="stylesheet" />
<script src="../select2.min.js"></script>
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
        <div class="col-md-4 banner-left">
            <div class="comment-bottom">
            <form id="form-animal">
                <div>
                    <label>Nombre de Comprador</label>
                    <select id="compradores" name="compradores" class="pruebaSelect">
                        <?php
                            foreach ($compradores as $comprador) {
                                echo '<option value='.$comprador->getCompradorCodigo().'>'.$comprador->getCompradorCodigo()."-".$comprador->getCompradorNombreCompleto().'</option>';
                            }//foreach
                        ?>
                    </select>
                </div>
            </form>
            </div>
        </div>
        <div class="col-md-8 banner-right">
            <div class="single">
            <div class="comment-bottom">
                <h3>Datos Comprador</h3>
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
                        <input type="button" value="Actualizar" name="actualizar" id="actualizar" onclick="actualizarComprador();" />
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
<!--footer start here-->
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

     $("#compradorTipoPago").change(function(){
        if($("#compradorTipoPago").val() === "Credito"){
            $("#compradorNumeroPagare").show();
            $("#etiquetaNumeroPagare").show();
        }else{
            $("#compradorNumeroPagare").val("");
            $("#compradorNumeroPagare").hide();
            $("#etiquetaNumeroPagare").hide();
        }
    });

    $(document).ready(function(){

        $("#compradorNumeroPagare").hide();
        $("#etiquetaNumeroPagare").hide();

        var codigoComprador = $("#compradores").val();

        $.post("../business/compradorbusiness/compradorAction.php",{'informacionComprador': codigoComprador}, function(data){

            var comprador = JSON.parse(data);

            for (var i = 0; i < comprador.Data.length; i++) {
                $("#compradorNumeroIdentificacion").val(comprador.Data[i].compradornumeroidentificacion);
                $("#compradorNombreCompleto").val(comprador.Data[i].compradornombrecompleto);
                $("#compradorTelefono").val(comprador.Data[i].compradortelefono);
                $("#compradorDireccion").val(comprador.Data[i].compradordireccion);
                $("#compradorRecomendacion").val(comprador.Data[i].compradorrecomendador);
                $("#compradorTipoPago").val(comprador.Data[i].compradortipopago);

                if(comprador.Data[i].compradortipopago === "Credito"){
                    $("#compradorNumeroPagare").show();
                    $("#etiquetaNumeroPagare").show();
                    $("#compradorNumeroPagare").val(comprador.Data[i].compradornumeropagare);
                }//if
            }
        });
        $('#compradorTelefono').mask('0000-0000');
        $('.pruebaSelect').select2();
    });

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

    function actualizarComprador() {

        if(validarDatos()){

            if($("#compradorTipoPago").val() === "Contado"){
                var parameters = {
                    "actualizar" : 'actualizar',
                    "compradorCodigo" : $("#compradores").val(),
                    "compradorNombreCompleto" : $("#compradorNombreCompleto").val(),
                    "compradorNumeroIdentificacion" : $("#compradorNumeroIdentificacion").val(),
                    "compradorTelefono" : $("#compradorTelefono").val(),
                    "compradorDireccion" : $("#compradorDireccion").val(),
                    "compradorTipoPago" : $("#compradorTipoPago").val(),
                    "compradorRecomendacion" : $("#compradorRecomendacion").val(),
                };
            }else{
                var parameters = {
                    "actualizar" : 'actualizar',
                    "compradorCodigo" : $("#compradores").val(),
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

                if(data !== "false"){
                    mostrarMensaje("success", "Transacción Exitosa");
                }else{
                    mostrarMensaje("error", "Error al procesar la transacción");
                }//if
            });

        }//if-else
    }//insertarComprador

    $("#compradores").change(function () {
        var codigoComprador = $("#compradores").val();
        $("#compradorNumeroPagare").val("");

        $.post("../business/compradorbusiness/compradorAction.php",{'informacionComprador': codigoComprador}, function(data){
            var comprador = JSON.parse(data);

            for (var i = 0; i < comprador.Data.length; i++) {
                $("#compradorNumeroIdentificacion").val(comprador.Data[i].compradornumeroidentificacion);
                $("#compradorNombreCompleto").val(comprador.Data[i].compradornombrecompleto);
                $("#compradorTelefono").val(comprador.Data[i].compradortelefono);
                $("#compradorDireccion").val(comprador.Data[i].compradordireccion);
                $("#compradorRecomendacion").val(comprador.Data[i].compradorrecomendador);
                $("#compradorTipoPago").val(comprador.Data[i].compradortipopago);

                if(comprador.Data[i].compradortipopago === "Credito"){
                    $("#compradorNumeroPagare").show();
                    $("#etiquetaNumeroPagare").show();
                    $("#compradorNumeroPagare").val(comprador.Data[i].compradornumeropagare);
                }else{
                    $("#compradorNumeroPagare").hide();
                    $("#etiquetaNumeroPagare").hide();
                }//if-else
            }
        });
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
