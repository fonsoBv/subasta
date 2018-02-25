<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Vista Registro Animal</title>
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

    <script src="./jquery-3.2.1.js"></script>



<link href="../select2.min.css" rel="stylesheet" />
<script src="../select2.min.js"></script>

    <?php
    include '../business/especiebusiness/especieBusiness.php';
    include '../business/razabusiness/razaBusiness.php';
    /*include '../business/animalbusiness/animalBusiness.php';
    include '../business/encargadobusiness/encargadoBusiness.php';
    include '../business/compradorbusiness/compradorbusiness.php';*/
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
<!--about start here-->

    <div class="container">
        <div class="single">
            <div class="comment-bottom">
                <h3>Vista de Registro Animal</h3>
                <div id='tablaResultados'></div>
            </div>
        </div>
    </div>
<!--about end here-->
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
    $(document).ready(function () {
        obtenerUltimosCuatroRegistros();

        var refreshId =  setInterval( function(){
            obtenerUltimosCuatroRegistros();
        }, 3000 ); //3000 = 3 segundos
    });

    function obtenerUltimosCuatroRegistros(){
        /*Se ordenan los datos en la tabla*/
        $.ajax({
          url: '../business/animalbusiness/animalAction.php',
          type: 'POST',
          dataType: 'text',
          data: {vistaRegistroAnimal : 'vistaRegistroAnimal'},
          beforeSend: function(){
            //$("#loadIMg").show();//
          }
        })
        .done(function(respuesta){
            /*Se valida si se encontro similitud con el parámetro de busqueda que ingreso el usuario*/
            if (respuesta == 'Sin coincidencias') {
                $("#tablaResultados").show();
                //$("#tablaResultados").html("<strong style='color:red'> Sin coincidencias </strong>");
                mostrarMensaje("error", "No se han encontrado resultados")
            }else {
                //$("#loadIMg").hide();//

                /*Convierte el objeto codificado en un objeto json*/
                var animales = JSON.parse(respuesta);

                var salida ="";

                salida = "<table class='table'>"+
                    "<thead>"+
                        "<tr>"+
                            "<th>Número del animal</th>"+
                            "<th>Donador</th>"+
                            "<th>Tipo animal</th>"+
                        "</tr>"+
                    "</thead>"+
                "<tbody>";

                /*Al recorrer el for debe llegar desde la ultima posición hasta la cero*/
                for (var i = (animales.Data.length -1); i > -1; i--) {
                    salida += "<tr>"+
                        "<td>" + animales.Data[i].animalnumero + "</td>"+
                        "<td>" + animales.Data[i].animaldonador + "</td>"+
                        "<td>" + animales.Data[i].tipoanimalnombre + "</td>"+
                    "</tr>";
                }

                salida +="</tbody></table>";

                $("#tablaResultados").html(salida);
                $('#tablaResultados').hide(0);
                $('#tablaResultados').show();//delay(100).slideDown(2000);
            }
        })
        .fail( function(error, textStatus, errorThrown) {
            console.log(error.value); //Check console for output
            $("#loadIMg").hide();//#datos es un div
        });
    }

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
