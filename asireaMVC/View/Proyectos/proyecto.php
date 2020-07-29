 <?php

  include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

  require_once CONTROLLER_PATH . "/proyectos/proyecto_controller.php";

  ?>

 <!DOCTYPE html>
 <html>

 <head>

   <?php include(TEMPLATES_PATH . "/metadata.php") ?>
   <!-- CSS FILES START-->
   <link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">

   <link href="<?php echo PUBLIC_PATH ?>/css/proyectos/proyectos.css" rel="stylesheet">
   <!-- CSS FILES START-->
   <link href="<?php echo LIB_PATH ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!--  CSS FILES End -->


   <!--   JS Files END  -->

   <title>Proyecto</title>
 </head>

 <body>
   <?php include(TEMPLATES_PATH . "/header.php");

    $controlador_proyecto = new proyectoController();
    $proyecto = $controlador_proyecto->getproyectoID($_GET["proyecto"]);

    ?>

   <div class="container-flex">
     <section class="wrapper news-posts ">
       <div class="row">
         <div class="col-md-7">
           <div class="card shadow p-3 mb-5 bg-white ">

             <div class="page-header">
               <h2>
                 <?php
                  echo ($proyecto['titulo']);
                  ?>
                 </h1>
             </div>

             <div class="cuerpo">
               <?php
                echo ($proyecto['descripcion']);
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

 </html> -->