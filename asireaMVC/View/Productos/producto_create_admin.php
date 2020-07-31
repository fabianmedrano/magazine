<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once "../../Controller/productos/Categorias_controller.php";

$cateController = new Categorias_controller();

session_start();

?>

<!doctype html>
<html lang="es">
<head>
    <?php include(TEMPLATES_PATH . "/metadata.php") ?>

    <link rel="stylesheet" href="../../public/font-awesome/fontawesome-free-5.10.2-web/css/all.min.css">

    <script src="../../lib/ckeditor/ckeditor.js"></script>

    <title>Nuevo Producto</title>

    <style>
        .custom-file-input ~ .custom-file-label::after {
            content: "Buscar";
        }
    </style>

    <script>
        function nombreFile() {
            var name = document.getElementById("fileDoc").value.split("\\").pop();

            $('#nameFileDoc').text(name);
        }
    </script>
</head>
<body>

<?php include(TEMPLATES_PATH . "/nav.php") ?>

<br>

<div class="container">

    <?php
        $show = "";
        $msm = "";
        $alert = "";
        if(isset($_SESSION['msmPro'])){
            $show = "show";
            if($_SESSION['msmPro']->status == 0){
                $alert = "warning";
            }else{
                $alert = "danger";
            }
            $msm = $_SESSION['msmPro']->mensaje;
        }
    ?>

    <div class="alert alert-<?php echo $alert?> alert-dismissible fade <?php echo $show?>" role="alert">
        <?php echo $msm?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form method="post" action="../../Controller/productos/switch_controller.php" enctype="multipart/form-data">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Nombre</span>
            </div>
            <input type="text" class="form-control" id="nombrePro" name="nombrePro" required>
        </div>

        <?php
            $listaCate = json_decode($cateController->obtener_categoria());
        ?>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Categoría</span>
            </div>
            <select id="catePro" name="catePro" class="form-control" required>
                <?php
                    foreach ($listaCate as $cate){
                    ?>
                        <option value="<?php echo $cate->id?>"><?php echo $cate->nombre?></option>
                    <?php
                    }
                ?>
            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Foto Portada</span>
            </div>
            <div class="custom-file" id="customFile" lang="es">

                <input type="file" class="custom-file-input" id="fileDoc" onchange="nombreFile()" name="file" required>
                <label class="custom-file-label" for="fileDoc" id="nameFileDoc">
                    Seleccione un archivo...
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="street1_id" class="control-label">Descripción</label>
            <textarea name="descripPro" id="editor_noticia" rows="10" cols="80" required></textarea>
            <script>
                CKEDITOR.replace('editor_noticia');
            </script>
        </div>

        <input class="button btn btn-primary" id="btn-guardar" name="accion" type="submit" value="Guardar" />
    </form>

</div>

<br>

</body>
</html>