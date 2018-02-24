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
                <div class="logo">
                    <h1><label id="paddingVentas">Ventas: 10000</label></h1>
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
                <div class="col-md-9 banner-right">
                    <h3>Registrar Comprador</h3>
                    <div id='tablaSubasta'></div>
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
    $(document).ready(function() {
        var refreshId =  setInterval( function(){

            /*Se obtienen los datos de la subasta*/
            $.ajax({
              url: '../business/encargadobusiness/encargadoAction.php',
              type: 'POST',
              dataType: 'text',
              data: {buscar : dato, tipoBusqueda : tipoBusqueda},
              beforeSend: function(){
                //$("#loadIMg").show();//
              }
            })
            .done(function(respuesta){

                /*Se valida si se encontro similitud con el parámetro de busqueda que ingreso el usuario*/
                if (respuesta == 'Sin coincidencias') {
                    $("#tablaSubasta").show();
                    $("#tablaSubasta").html("<strong style='color:red'> Sin coincidencias </strong>");
                }else {
                    //$("#loadIMg").hide();//

                    /*Convierte el objeto codificado en un objeto json*/
                    var prod = JSON.parse(respuesta);

                    var salida ="";

                    /*Según el tipo de busqueda se asignan los datos*/
                    salida = "<table class='table'>"+
                        "<thead>"+
                            "<tr>"+
                                "<th># Animal</th>"+
                                "<th># Comprador</th>"+
                                "<th>Precio</th>"+
                            "</tr>"+
                        "</thead>"+
                    "<tbody>";

                    for (var i = 0; i < prod.Data.length; i++) {
                        salida += "<tr>"+
                            "<td>" + prod.Data[i].encargadonombrecompleto + "</td>"+
                            "<td>" + prod.Data[i].encargadocorreo + "</td>"+
                            "<td>" + prod.Data[i].encargadopueblo + "</td>"+
                            "<td>" + prod.Data[i].encargadodireccion + "</td>"+
                            "<td><select id='numeroTelefono' name='numeroTelefono'>";

                            /*Se cargan los telefonos en el combobox*/
                            for (var j = 0; j< telefonos.Data.length; j++){
                                if (prod.Data[i].encargadoid == telefonos.Data[j].encargadoid) {
                                    salida +="<option value="+ telefonos.Data[j].numerotelefono +">"+ telefonos.Data[j].numerotelefono +"</option>";
                                }
                            }
                            salida += "</select>"+
                            "</td>"+
                            "<td><a href='./clienteAnimalInformacion.php?encargadoid="+ prod.Data[i].encargadoid +"'>Información</a></td>"+
                        "</tr>";
                    }

                    salida +="</tbody></table>";

                    $("#tablaSubasta").html(salida);
                    $('#tablaSubasta').hide(0);
                    $('#tablaSubasta').show();//delay(100).slideDown(2000);
                }
            })
            .fail( function(error, textStatus, errorThrown) {
                console.log(error.value); //Check console for output
                $("#loadIMg").hide();//#datos es un div
            });


        }, 3000 ); //3000 = 3 segundos
    });
</script>
