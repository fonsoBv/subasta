<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Subasta</title>
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
        <!-- start-->

        <script src="./jquery-3.2.1.js"></script>
        <link href="../select2.min.css" rel="stylesheet" />
        <script src="../select2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="jquery-ui.css"/>
        <script type="text/javascript" src="jquery-ui.js"></script>

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
 <div class="container">
   <div class="single">
        <div class="banner-bottom">
            <div  id="top" class="callbacks_container">
                <ul class="rslides" id="slider4">
                    <li>

                        <div class=" col-md-4 comment-bottom">
                            <h3>Datos de animal</h3>
                            <form id="cargarD">
                                <label for="">Número animal</label>
                                <input type="number" id="numeroAnimal2" name="numeroAnimal2">
                                <!-- <select id="numeroAnimal" name="numeroAnimal" class="pruebaSelect"></select> -->
                            </form>

                            <form id="datosAnimal"></form>
                            <label id="message" hidden for="Error" style="color:red">Sin coincidencias</label>
                        </div>
                        <div class="col-md-8 banner-right">
                            <div class="comment-bottom">
                                <h3>Otros datos</h3>
                                <form>
                                    <label for="">Comprador</label>
                                    <!-- <select id="nombreComprador"></select> -->
                                    <input type="text" id="nombreComprador" name="nombreComprador">

                                    <label for="Precio">Precio</label>

                                    <input id="price" autocomplete="off" name="price" type="text" class="form-control
                                    required" data-mask="₡"placeholder="₡">

                                    <div id="priceMessage"></div>
                                    <br>
                                    <input type="button" value="Venta" onclick="registrarAnimal()">
                                    <br><br>
                                    <input type="button" value="Resubastar" onclick="registrarReSubasta()">
                                    <br><br>
                                    <label style="font-size:2em; text-align: center;color:#886741; font-family: 'Baumans', cursive; margin-bottom: 0.5em;">₡</label>
                                    <span id="registro" style=" font-size:2em; text-align: center;color:#886741; font-family: 'Baumans', cursive; margin-bottom: 0.5em;">0</span>
                                    <br><br>
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </li>
                </ul>
            </div>
        </div>
        <span class="mover"> </span>
  </div>
</div>
<!--header end here-->
<!-- banner Slider starts Here
                <script src="js/responsiveslides.min.js"></script>
             <script>
                // You can also use "$(window).load(function() {"
                $(function () {
                  // Slideshow 4
                  $("#slider4").responsiveSlides({
                    auto: true,
                    pager: true,
                    speed: 500,
                    namespace: "callbacks",
                    before: function () {
                      $('.events').append("<li>before event fired.</li>");
                    },
                    after: function () {
                      $('.events').append("<li>after event fired.</li>");
                    }
                  });

                });
              </script>
            //End-slider-script -->

<!--banner strip end here-->

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

    /*Se carga los números de los animales en el combo*/
    $.ajax({
      url: '../business/animalbusiness/animalAction.php',
      type: 'POST',
      dataType: 'text',
      data: {'obtenerNumerosAnimales' : 'obtenerNumerosAnimales'}
    })
    .done(function(resp){
        /*Convierte el objeto codificado en un objeto json*/
        var numeros = JSON.parse(resp);
        var asignacion = "<option disabled selected>Número</option>"

        /*Se generan las respectivas opciones del combobox*/
        for (var i = 0; i < numeros.Data.length; i++) {
            asignacion +="<option value='" + numeros.Data[i].animalnumero + "'>"+
            numeros.Data[i].animalnumero +"</option>";
        }

        /*Se envían los numeros al combobox*/
        $("#numeroAnimal").html(asignacion);

    }).fail( function(error, textStatus, errorThrown) {
        console.log(error.value); //Check console for output
        //$("#loadIMg").hide();//#datos es un div
    });

    $(document).ready(function() {
        cargarCompradores();
        cargarAnimales();

        $.post("../business/subastabusiness/subastaAction.php",{'obtenerMontoSubastas': 'obtenerMontoSubastas'}, function(data){
            $("#registro").html(data);
        });

    });

    function cargarCompradores(){ 
        $.post("../business/compradorbusiness/compradorAction.php",{'obtenerCompradores': 'obtenerCompradores'}, function(data){
            var compradores = JSON.parse(data);
            var items = [];
            for (var i = 0; i < compradores.Data.length; i++) {
                items.push(compradores.Data[i].compradorcodigo + " - " + compradores.Data[i].compradornombrecompleto);
            }
            $("#nombreComprador").autocomplete({
                source: items
            });
        });
    }

    function cargarAnimales(){ 
        $.post("../business/animalbusiness/animalAction.php",{'obtenerNumerosAnimales': 'obtenerNumerosAnimales'}, function(data){
            var animales = JSON.parse(data);
            var items = [];
            for (var i = 0; i < animales.Data.length; i++) {
                items.push(animales.Data[i].animalnumero);
            }
            $("#numeroAnimal2").autocomplete({
                source: items
            });
        });
    }

    /*Se carga los nombres de los compradores en el combo*/
    $.ajax({
      url: '../business/compradorbusiness/compradorAction.php',
      type: 'POST',
      dataType: 'text',
      data: {'obtenerCompradores' : 'obtenerCompradores'}
    })
    .done(function(resp){
        /*Convierte el objeto codificado en un objeto json*/
        var comprador = JSON.parse(resp);
        var asignacion = "<option disabled selected>Comprador</option>"

        /*Se generan las respectivas opciones del combobox*/
        for (var i = 0; i < comprador.Data.length; i++) {
            asignacion +="<option value='" + comprador.Data[i].compradorcodigo + "'>"+
            comprador.Data[i].compradornombrecompleto +"</option>";
        }

        /*Se envían los numeros al combobox*/
        $("#nombreComprador").html(asignacion);

    }).fail( function(error, textStatus, errorThrown) {
        console.log(error.value); //Check console for output
        //$("#loadIMg").hide();//#datos es un div
    });

    /*Se captura el número del animal escogido por el usuario*/
    $("#numeroAnimal").change(function(){
        var opcion = $(this).val();

        /*Se llama a la función que carga los datos en el formulario*/
        cargarDatos(opcion);
    });

    $("#numeroAnimal2").blur(function(){
        var opcion = $(this).val();
        cargarDatos(opcion);
    });

    /*Se traen los daros correspondientes del animal, y se recibe por parámetro
    el número del animal*/
    function cargarDatos(opcion){
        /*Se valida si el usuario escogió una opción correcta y no la opción
        por defecto "Número"*/
        if (opcion != 'vacio') {

            $.ajax({
              url: '../business/animalbusiness/animalAction.php',
              type: 'POST',
              dataType: 'text',
              data: {'animalNumero' : parseInt(opcion)}
            })
            .done(function(resp){
                /*Convierte el objeto codificado en un objeto json*/
                var datos = JSON.parse(resp);
                var asignacion = "";

                /*Se generan las respectivas opciones del formulario*/
                for (var i = 0; i < datos.Data.length; i++) {
                    asignacion +="<label id='lblDonador' for='Donador'>Donador</label>"+
                    "<input type='text' id='txtDonador' readonly value='" + datos.Data[i].animaldonador + "'>"+
                    "<label id='lblLugarProc' for='Lugar de procedencia'>Lugar de procedencia</label>"+
                    "<input type='text' id='txtLugarProc' readonly value='" + datos.Data[i].animallugarprocedencia + "'>"+
                    "<label id='lblTipAnimal' for='Tipo del animal'>Tipo de animal</label>"+
                    "<input type='text' id='txtTipAnimal' readonly value='" + datos.Data[i].tipoanimalnombre + "'>"+
                    "<label id='lblRazaAnimal' for='Raza del animal'>Raza de animal</label>"+
                    "<input type='text' id='txtRazaAnimal' readonly value='" + datos.Data[i].razanombre  + "'>"+
                    "<label id='lblEstadoAnimal' for='Estado del animal'>Estado del animal</label>"+
                    "<input type='text' id='txtEstadoAnimal' readonly value='" + datos.Data[i].animalestado + "'>"+
                    "<label id='lblDescripcion' for='Descripción'>Descripción</label>"+
                    "<textarea id='txtDescripcion' readonly>" + datos.Data[i].animaldescripcion + "</textarea>";
                }

                /*Se envían los datos al formulario*/
                $("#datosAnimal").html(asignacion);

                $('#message').hide();

            }).fail( function(error, textStatus, errorThrown) {
                console.log(error.value); //Check console for output
                //$("#loadIMg").hide();//#datos es un div
            });
        }else {
            /*Se ocultan todos los label*/
            $('#lblDonador').hide();
            $('#lblLugarProc').hide();
            $('#lblTipAnimal').hide();
            $('#lblRazaAnimal').hide();
            $('#lblEstadoAnimal').hide();
            $('#lblDescripcion').hide();

             /*Se ocultan todos los input*/
            $('#txtDonador').hide();
            $('#txtLugarProc').hide();
            $('#txtTipAnimal').hide();
            $('#txtRazaAnimal').hide();
            $('#txtEstadoAnimal').hide();
            $('#txtDescripcion').hide();

            /*Muestra un mensaje de error*/
            $('#message').show();
        }
    }

    /*Se encarga de la venta de un animal*/
    function registrarAnimal() {
        var precio, comprador, numeroAnimal;

        /*Se capturan los datos de los campos de texto*/
        precio = document.getElementById("price").value;
        comprador = document.getElementById("nombreComprador").value.split(" - ")[0];
        numeroAnimal = document.getElementById("numeroAnimal2").value;
        
        /*Se arma un objeto JSON*/
        var datos;

        datos = {
            "animal": [
                { "comprador": comprador},
                { "precio": precio},
                { "numeroAnimal": numeroAnimal}
            ]
        }

        $.ajax({
          url: '../business/subastabusiness/subastaAction.php',
          type: 'POST',
          dataType: 'text',
          data: {'registrarVenta' : JSON.stringify(datos)}
        })
        .done(function(resp){

            var respuesta;

            if (resp == "Error al momento de insertar el dato") {
                /*respuesta = "<label id='lblDonador' for='" + resp +"' style='color:red'>"+
                resp + "</label>";*/
                mostrarMensaje("error", resp);
            }else {
                /*respuesta = "<label id='lblDonador' for='" + resp +"' style='color:green'>"+
                resp + "</label>";*/
                //$("#numeroAnimal option[value='"+numeroAnimal+"']").remove();

                registro = (parseInt($("#registro").text()) + parseInt($("#price").val()));
                $("#registro").html(registro); 

                $('#numeroAnimal2').val("");
                $('#price').val("");
                $('#nombreComprador').val("");


                $('#lblDonador').hide();
                /*Se ocultan todos los label*/
                $('#lblLugarProc').hide();
                $('#lblTipAnimal').hide();
                $('#lblRazaAnimal').hide();
                $('#lblEstadoAnimal').hide();
                $('#lblDescripcion').hide();

                 /*Se ocultan todos los input*/
                $('#txtDonador').hide();
                $('#txtLugarProc').hide();
                $('#txtTipAnimal').hide();
                $('#txtRazaAnimal').hide();
                $('#txtEstadoAnimal').hide();
                $('#txtDescripcion').hide();

                mostrarMensaje("success", resp);
            }

            //$('#submitMessage').html(respuesta);

        }).fail( function(error, textStatus, errorThrown) {
            console.log(error.value); //Check console for output
            //$("#loadIMg").hide();//#datos es un div
        });
    }


    /*Se encarga de la venta de un animal*/
    function registrarReSubasta() {
        var precio, comprador, numeroAnimal;

        /*Se capturan los datos de los campos de texto*/
        precio = document.getElementById("price").value;
        comprador = document.getElementById("nombreComprador").value.split(" - ")[0];
        numeroAnimal = document.getElementById("numeroAnimal2").value;
        
        /*Se arma un objeto JSON*/
        var datos;

        datos = {
            "animal": [
                { "comprador": comprador},
                { "precio": precio},
                { "numeroAnimal": numeroAnimal}
            ]
        }

        $.ajax({
          url: '../business/subastabusiness/subastaAction.php',
          type: 'POST',
          dataType: 'text',
          data: {'insertarResubasta' : JSON.stringify(datos)}
        })
        .done(function(resp){

            var respuesta;

            if (resp == "Error al momento de insertar el dato") {
                /*respuesta = "<label id='lblDonador' for='" + resp +"' style='color:red'>"+
                resp + "</label>";*/
                mostrarMensaje("error", resp);
            }else {
                /*respuesta = "<label id='lblDonador' for='" + resp +"' style='color:green'>"+
                resp + "</label>";*/
                mostrarMensaje("success", resp);

                registro = (parseInt($("#registro").text()) + parseInt($("#price").val()));

                $('#lblDonador').hide();
                /*Se ocultan todos los label*/
                $('#lblLugarProc').hide();
                $('#lblTipAnimal').hide();
                $('#lblRazaAnimal').hide();
                $('#lblEstadoAnimal').hide();
                $('#lblDescripcion').hide();

                 /*Se ocultan todos los input*/
                $('#txtDonador').hide();
                $('#txtLugarProc').hide();
                $('#txtTipAnimal').hide();
                $('#txtRazaAnimal').hide();
                $('#txtEstadoAnimal').hide();
                $('#txtDescripcion').hide();

                $('#numeroAnimal2').val("");
                $('#price').val("");
                $('#nombreComprador').val("");

                //alert(registro);
                $("#registro").html(registro); 
            }

            //$('#submitMessage').html(respuesta);

        }).fail( function(error, textStatus, errorThrown) {
            console.log(error.value); //Check console for output
            //$("#loadIMg").hide();//#datos es un div
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
