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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery-1.11.0.min.js"></script>
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
        $compradores = $compradorBusiness->obtenerTBCompradorFactura();

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
                                echo '<option value = '.$comprador->getCompradorCodigo().' >'.$comprador->getCompradorCodigo()."-".$comprador->getCompradorNombreCompleto().'</option>';
                            }//foreach
                        ?>
                    </select>
                </div>
            </form>
            </div>
            <div>
                <span id="resultado"></span>
            </div>
        </div>
        <div class="col-md-8 banner-right">
            <div class="single">
            <div class="comment-bottom">
                <h3>Datos de la Factura</h3>
                <form method="post" action="../business/compradorbusiness/compradorAction.php">
                    <div>
                        <label>N&uacute;mero de Identificaci&oacute;n</label>
                        <input type="text" name="compradorNumeroIdentificacion" id="compradorNumeroIdentificacion" placeholder="Número Identificación" />
                    </div>
                    <div>
                        <label>Nombre Completo</label>
                        <td><input type="text" name="compradorNombreCompleto" id="compradorNombreCompleto" placeholder="Nombre Completo" /></td>
                    </div>
                    <div id="ventas" >

                  </div>
                    <div>
                        <input type="button" value="Facturar" name="facturar" id="facturar" onclick="generarFactura();" />
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

    $(document).ready(function(){
        var codigoComprador = $("#compradores").val();

        $.post("../business/subastabusiness/subastaAction.php",{'FacturaComprador': codigoComprador}, function(data){
            var comprador = JSON.parse(data);

           salida = "<table class='table'>"+
                                "<thead>"+
                                    "<tr>"+
                                        "<th>Código Animal</th>"+
                                        "<th>Precio</th>"+
                                        "<th>Código Venta</th>"+
                                        "<th>Cancelar</th>"+

                                    "</tr>"+
                                "</thead>"+
                            "<tbody>";

                            if(comprador.Ventas.length > 1){
                                $("#compradorNumeroIdentificacion").val(comprador.Ventas[1].compradorcodigo);
            $("#compradorNombreCompleto").val(comprador.Ventas[1].compradornombrecompleto);
            
                              for (var i = 1; i < comprador.Ventas.length; i++) {
                                  salida += "<tr>"+
                                      "<td>" + comprador.Ventas[i].ventaanimal + "</td>"+
                                      "<td>" + comprador.Ventas[i].ventaprecio + "</td>"+
                                      "<td>" + comprador.Ventas[i].ventaid + "</td>"+
                                      "<td><input type='checkbox' id='" + i + "'  > </td>"+
                                  "</tr>";
                              }
                            }

                            if(comprador.Resubastas.length > 1){

                                $("#compradorNumeroIdentificacion").val(comprador.Resubastas[1].compradorcodigo);
                                $("#compradorNombreCompleto").val(comprador.Resubastas[1].compradornombrecompleto);
            
                                salida +="<tr>"+
                                        "<th>Código Animal</th>"+
                                        "<th>Precio</th>"+
                                        "<th>Código Resubasta</th>"+
                                        "<th>Cancelar</th>"+
                                    "</tr>";

                              for (var i = 1; i < comprador.Resubastas.length; i++) {
                                  salida += "<tr>"+
                                      "<td>" + comprador.Resubastas[i].resubastaanimal + "</td>"+
                                      "<td>" + comprador.Resubastas[i].resubastaprecio + "</td>"+
                                      "<td>" + comprador.Resubastas[i].resubastaid + "</td>"+
                                      "<td><input type='checkbox' id='"+ i +"' > </td>"+
                                  "</tr>";
                              }
                            }
            $('#ventas').html(salida);
        });
    });

    function validarDatos(){

        identificacion = $("#compradorNumeroIdentificacion").val().trim();
        nombre = $("#compradorNombreCompleto").val().trim();
        telefono = $("#compradorTelefono").val().trim();
        direccion = $("#compradorDireccion").val().trim();

        if(identificacion.length < 1){
            $("#resultado").html("La cédula es inválida");
            return false;
        }else if(nombre.length < 1 || nombre.length > 100){
            $("#resultado").html("Debe ingresar el nombre");
            return false;
        }else if(telefono.length < 1 || telefono.length < 8 || isNaN(telefono)){
            $("#resultado").html("Número de Teléfono inválido");
            return false;
        }else if(direccion.length < 1 || direccion.length > 200){
            $("#resultado").html("Debe ingresar una dirección");
            return false;
        }//if-else

        return true;
    }//validarDatos

    function actualizarComprador() {

        if(validarDatos()){

            var parameters = {
                "actualizar" : 'actualizar',
                "compradorCodigo" : $("#compradores").val(),
                "compradorNombreCompleto" : $("#compradorNombreCompleto").val(),
                "compradorNumeroIdentificacion" : $("#compradorNumeroIdentificacion").val(),
                "compradorTelefono" : $("#compradorTelefono").val(),
                "compradorDireccion" : $("#compradorDireccion").val(),
                "compradorTipoPago" : $("#compradorTipoPago").val(),
                "compradorRecomendacion" : $("#compradorRecomendacion").val()
            };

            $.post("../business/compradorbusiness/compradorAction.php",parameters, function(data){

                if(data !== "false"){
                    $("#resultado").html("Transacción Exitosa");
                }else{
                    $("#resultado").html("Error al procesar la transacción");
                }//if
            });

        }//if-else
    }//insertarComprador

    $(document).ready(function() {
        $('.pruebaSelect').select2();
    });


    $("#compradores").change(function () {
        var codigoComprador = $("#compradores").val();

        $.post("../business/subastabusiness/subastaAction.php",{'FacturaComprador': codigoComprador}, function(data){
            var comprador = JSON.parse(data);

           salida = "<table class='table'>"+
                                "<thead>"+
                                    "<tr>"+
                                        "<th>Código Animal</th>"+
                                        "<th>Precio</th>"+
                                        "<th>Código Venta</th>"+
                                        "<th>Cancelar</th>"+

                                    "</tr>"+
                                "</thead>"+
                            "<tbody>";

                            if(comprador.Ventas.length > 1){
                                $("#compradorNumeroIdentificacion").val(comprador.Ventas[1].compradorcodigo);
            $("#compradorNombreCompleto").val(comprador.Ventas[1].compradornombrecompleto);
            
                              for (var i = 1; i < comprador.Ventas.length; i++) {
                                  salida += "<tr>"+
                                      "<td>" + comprador.Ventas[i].ventaanimal + "</td>"+
                                      "<td>" + comprador.Ventas[i].ventaprecio + "</td>"+
                                      "<td>" + comprador.Ventas[i].ventaid + "</td>"+
                                      "<td><input type='checkbox' id='" + i + "'  > </td>"+
                                  "</tr>";
                              }
                            }

                            if(comprador.Resubastas.length > 1){

                                $("#compradorNumeroIdentificacion").val(comprador.Resubastas[1].compradorcodigo);
                                $("#compradorNombreCompleto").val(comprador.Resubastas[1].compradornombrecompleto);
            
                                salida +="<tr>"+
                                        "<th>Código Animal</th>"+
                                        "<th>Precio</th>"+
                                        "<th>Código Resubasta</th>"+
                                        "<th>Cancelar</th>"+
                                    "</tr>";

                              for (var i = 1; i < comprador.Resubastas.length; i++) {
                                  salida += "<tr>"+
                                      "<td>" + comprador.Resubastas[i].resubastaanimal + "</td>"+
                                      "<td>" + comprador.Resubastas[i].resubastaprecio + "</td>"+
                                      "<td>" + comprador.Resubastas[i].resubastaid + "</td>"+
                                      "<td><input type='checkbox' id='"+ i +"' > </td>"+
                                  "</tr>";
                              }
                            }
            $('#ventas').html(salida);
        });
    });
</script>
