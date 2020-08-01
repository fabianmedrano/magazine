<?php

  include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

  require_once CONTROLLER_PATH . "/productos/ProductosController.php";

  ?>
<!DOCTYPE html>
<html lang="es">
<head>

    <?php include(TEMPLATES_PATH . "/metadata.php") ?>
   <!-- CSS FILES START-->
   <link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">

   <link href="<?php echo PUBLIC_PATH ?>/css/productos/productos.css" rel="stylesheet">
   <!-- CSS FILES START-->
   <link href="<?php echo LIB_PATH ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   
    
    <title>Productos</title>
</head>
<body>

<?php include(TEMPLATES_PATH . "/header.php");

    $controlador_producto = new ProductosController();
    $producto = $controlador_producto->getProductoID($_GET["producto"]);

    ?>

   <div class="container-flex">
     <section class="wrapper news-posts ">
       <div class="row">
         <div class="col-md-7">
           <div class="card shadow p-3 mb-5 bg-white ">

           <div class="page-header">
               <ul class="post-meta">
                 
                 <li id="cat">
                   <i class="fas fa-bars"></i>
                   <?php
                    echo ($producto['nombre_categoria']);
                    ?></li>
               </ul>
               <hr />

             </div>

             <div class="page-header">
               <h2>
                 <?php
                  echo ($producto['nombre']);
                  ?>
                 </h1>
             </div>

             <div class="cuerpo">
               <?php
                echo ($producto['descripcion']);
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