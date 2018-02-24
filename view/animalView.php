<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Animal</title>
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

    <?php
        $especieBusiness = new EspecieBusiness();
        $tipoanimal = $especieBusiness->obtenerTBEspeciePorCategoria(1);

        $razaBusiness = new RazaBusiness();
        $razas = $razaBusiness->obtenerTBRazas();
    ?>

    <div class="container">
        <div class="single">
            <div class="comment-bottom">
                <h3>Registrar Animal</h3>
                <form method="post" action="../business/animalbusiness/animalAction.php">
                <section id="seccionmedia">
                        <div id="columna1">
                            <div>
                                <label>N&uacute;mero Animal</label>
                                <input type="number" id="animalNumero" name="animalNumero" placeholder="Número Animal">
                            </div>
                        </div>
                        <div id="columna3"></div>
                        <div id="columna2">
                            <div>
                                <label>Donador</label>
                                <input type="text" id="animalDonador" name="animalDonador" placeholder="Donador">
                            </div>
                        </div>
                    </section>
                    <div>
                        <label>Lugar de Procedencia</label>
                        <input type="text" id="animalLugarProcedencia" name="animalLugarProcedencia" placeholder="Lugar de Procedencia">
                    </div>
                    <section id="seccionmedia">
                        <div id="columna1">
                            <div>
                                <label>Categor&iacute;a</label> <br>
                                <input type ="radio" name ="categoria" value ="1" checked> Bovino <br>
                                <input type ="radio" name ="categoria" value ="2"> Otro
                            </div>
                            <div>
                                <label>Tipo Animal</label>
                                <select id="animalTipo" name="animalTipo" size="6">
                                <?php
                                    foreach ($tipoanimal as $especie) {
                                        if($especie->getEspecieId() == 1){
                                            echo '<option selected="true" value='.$especie->getEspecieId().'>'.$especie->getEspecieNombre().'</option>';
                                        }else{
                                            echo '<option value='.$especie->getEspecieId().'>'.$especie->getEspecieNombre().'</option>';
                                        }
                                    }//foreach
                                ?>
                                </select>
                            </div>
                        </div>
                        <div id="columna3"></div>
                        <div id="columna2">
                            <div>
                                <label id="lbanimalraza">Raza</label>
                                <select id="animalRaza" name="animalRaza" size="10">
                                <?php
                                    foreach ($razas as $raza) {
                                        if($raza->getRazaId() == 1){
                                            echo '<option selected="true" value='.$raza->getRazaId().'>'.$raza->getRazaNombre().'</option>';
                                        }else{
                                            echo '<option value='.$raza->getRazaId().'>'.$raza->getRazaNombre().'</option>';
                                        }
                                    }//foreach
                                ?>
                                </select>
                            </div>
                        </div>
                    </section>
                    <div>
                        <label>Descripci&oacute;n</label>
                         <input type="text" id="animalDescripcion" name="animalDescripcion" placeholder="Descripción">
                    </div>
                    <div>
                        <td><input type="hidden" name="animalEstado" id="animalEstado" value="A" /></td>
                    </div>
                    <div>
                        <input type="submit" value="Registrar" name="insertar" id="insertar"/>
                    </div>
                </form>
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
        var mensajeObtenido = getParameterByName('success');

        if(mensajeObtenido !== ""){
            mostrarMensaje("success", "Transacción Exitosa");
        }else{
            var mensajeObtenido = getParameterByName('error');
            if(mensajeObtenido === "dbError"){
                mostrarMensaje("error", "Error al procesar la transacción");
            }else if(mensajeObtenido === "numberFormat"){
                mostrarMensaje("error", "Revise los espacios numéricos");
            }else if(mensajeObtenido === "emptyField"){
                mostrarMensaje("error", "Complete los datos solicitados");
            }
        }//if-else
    });

    $('input:radio[name=categoria]').change(function () {
        if(this.value == '1'){
            var parameters = {
                "obtenerTipoAnimal" : 'obtenerTipoAnimal',
                "categoria" : '1'
            };

            $.post("../business/especiebusiness/especieAction.php",parameters, function(data){

                var prod = JSON.parse(data);
                document.getElementById("animalTipo").options.length = 0;
                $('#animalTipo').attr("size", 6);
                for (var i = 0; i < prod["Data"].length; i++) {
                    if(prod.Data[i].tipoanimalid == 1){
                        $('#animalTipo').append($("<option></option>").attr("value", prod.Data[i].tipoanimalid).text(prod.Data[i].tipoanimalnombre));
                        $('#animalTipo').val(1);
                    }else{
                        $('#animalTipo').append($("<option></option>").attr("value", prod.Data[i].tipoanimalid).text(prod.Data[i].tipoanimalnombre));
                    }
                }//for
                
                $('#lbanimalraza').attr("style", "visibility:visible");
                $('#animalRaza').attr("style", "visibility:visible");
                $('#animalRaza').attr("size", 10);
                $("#animalRaza").selectpicker("refresh");
            });
        }
        if(this.value == '2'){
            var parameters = {
                "obtenerTipoAnimal" : 'obtenerTipoAnimal',
                "categoria" : '2'
            };

            $.post("../business/especiebusiness/especieAction.php",parameters, function(data){

                var prod = JSON.parse(data);
                document.getElementById("animalTipo").options.length = 0;
                $('#animalTipo').attr("size", 5);
                for (var i = 0; i < prod["Data"].length; i++) {
                    if(prod.Data[i].tipoanimalid == 7){
                        $('#animalTipo').append($("<option></option>").attr("value", prod.Data[i].tipoanimalid).text(prod.Data[i].tipoanimalnombre));
                        $('#animalTipo').val(7);
                    }else{
                        $('#animalTipo').append($("<option></option>").attr("value", prod.Data[i].tipoanimalid).text(prod.Data[i].tipoanimalnombre));
                    }
                }//for

                $('#lbanimalraza').attr("style", "visibility:hidden");
                $('#animalRaza').attr("style", "visibility:hidden");
                $('#animalRaza').attr("size", 0);
                $("#animalRaza").selectpicker("refresh");
            });
        }
    });

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }//getParameterByName

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
