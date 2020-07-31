<?php

  include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

  require_once CONTROLLER_PATH . "/servicios/servicios_controller.php";

  ?>
<!DOCTYPE html>
<html lang="es">
<head>

    <?php include(TEMPLATES_PATH . "/metadata.php") ?>
   <!-- CSS FILES START-->
   <link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">

   <link href="<?php echo PUBLIC_PATH ?>/css/servicios/servicios.css" rel="stylesheet">
   <!-- CSS FILES START-->
   <link href="<?php echo LIB_PATH ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   
    
    <title>Servicios</title>
</head>
<body>

<?php include(TEMPLATES_PATH . "/header.php");

    $controlador_servicio = new ServiciosController();
    $servicio = $controlador_servicio->getServicioID($_GET["servicio"]);

    ?>

   <div class="container-flex">
     <section class="wrapper news-posts ">
       <div class="row">
         <div class="col-md-7">
           <div class="card shadow p-3 mb-5 bg-white ">

             <div class="page-header">
               <h2>
                 <?php
                  echo ($servicio['nombre']);
                  ?>
                 </h1>
             </div>

             <div class="cuerpo">
               <?php
                echo ($servicio['descripcion']);
                ?>
             </div>
             <input type="button" onclick="history.back()" style='width:110px; ' name="volver atrás" class="btn btn-success " value="volver atrás">
           </div>
         </div>
       </div>
     </section>
   </div>

   </div>
   </div>

   </div>
   <?php include(TEMPLATES_PATH . "/footer.php") ?>
    
</body>
</html>