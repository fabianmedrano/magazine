<!DOCTYPE html lang="es">
<html lang="es">
<?php
include("public/head.php");
?>
<script src="productos_edit.js"></script>

<title>Productos</title>
</head>
<body style="background-color:#c3fff7;">
<!-- nav -->
<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
  <ul class="navbar-nav">
  <li class="nav-item active">
      <a class="nav-link" href="index.php">Inicio</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="servicios_edit.php">Administrador de Servicios</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Administrador de Productos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Servicios</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="#">Productos</a>
    </li>
  </ul>
</nav>


<!-- tabla -->
<div class="container mt-5 mb-5">
    <h3 class="color-1">Registro de Productos</h3>
    <hr></hr>
    <div id="listadoProductos">
        <div class="mb-3">
            <a id="registarProductos" class="cont-icono btn btn-outline-primary float-right" data-tooltip="tooltip" data-placement="top" title="Agregar Productos" onclick="abrirModal()"><i class="far fa-plus-square"></i></a>
        </div>
        <div class="mb-5">
            <table id="tbproducto" class="table table-striped table-bordered dt-responsive display">
                <thead>
                <tr>


                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal fade" id="modalProductos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-sm-11">
                    <h3 class="modal-title" id="tituloModal"></h3>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:right">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body" id="contenidoModalProductos">
                
                <div class="form-group">
                    
                    <div class="mb-3">
                        <a id="registarCategoria" class="cont-icono btn btn-outline-primary float-right" data-tooltip="tooltip" data-placement="top" title="Agregar Productos" onclick="abrirModalCategoria()"><i class="far fa-plus-square"></i></a>
                    </div>
                    <br>
                    <label for="categorias">Categorias: </label>
                    <br>
                    <select id="categoriasProductos" name="categoria" class="form-control">
                        
                    </select>
                    <br>
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id="nombre" >
                    <br>
                    <label for="iden">Descripcion: </label>
                    <textarea id="textarea" rows="5" cols="62"></textarea>
                    


                </div>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnProductos"></button>
            </div>
        </div>
    </div>
</div>



<!-- modal editar-->
<div class="modal fade" id="modalProductosEditar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-sm-11">
                    <h3 class="modal-title" id="tituloModalEditar"></h3>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:right">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body" id="contenidoModalProductosEditar">
               
                <div class="form-group">
                    <label for="categorias">Categorias: </label>
                    <br>
                    <select id="categoriasProductos" name="categoria" >Categorias de productos
                        <option value="planta">Plantas Hornomentales</option>
                    </select>
                    <br>
                    <label for="iden">Identificación: </label>
                    <input class="form-control" type="text"  id="txt_id">
                    <br>
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id="nombreEditar" >
                    <br>
                    <label for="iden">Descripcion: </label>
                    <textarea id="textareaEditarS" rows="5" cols="62"></textarea>
                    


                </div>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnProductosEditar"></button>
            </div>
        </div>
    </div>
</div>

<!--Modal Categorias-->

<div class="modal fade" id="modalCategorias" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-sm-11">
                    <h3 class="modal-title" id="tituloModalCategoria"></h3>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:right">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body" id="contenidoModalCategoria">
                
                <div class="form-group">
                    
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id="cat" >

                   <div class="container mt-5 mb-5">
                        <h3 class="color-1">Registro de Categorias</h3>
                        <hr></hr>
                         <div id="listadoCategorias">
                             
                         <div class="mb-5">
                         <table id="tbcategorias" class="table table-striped table-bordered dt-responsive display">
                         <thead>
                         <tr>


                        </tr>
                        </thead>
                        </table>
                    </div>
                </div>
             </div>
                   
                </div>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnCategorias"></button>
            </div>

            

        </div>
    </div>
</div>


<!--Modal Editar Categorias-->

<div class="modal fade" id="modalEditarCategorias" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="col-sm-11">
                    <h3 class="modal-title" id="tituloModalEditarCategoria"></h3>
                </div>
                <div class="col-sm-1">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float:right">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body" id="contenidoModalEditarCategoria">
                
                <div class="form-group">
                <label for="id">Codigo: </label>
                    <input type="text" class="form-control" id="idEditar" >
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" id="catEditar" >

                  
                   
                </div>
                <div class="form-group">

                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnCategoriasEditar"></button>
            </div>

            

        </div>
    </div>
</div>

</body>

</html>


