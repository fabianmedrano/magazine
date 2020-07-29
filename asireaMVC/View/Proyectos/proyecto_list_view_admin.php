<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


require_once CONTROLLER_PATH . "/proyectos/proyecto_controller.php";

?>

<!DOCTYPE html>
<html>
<title>Gestión Proyectos</title>

<head>

    <?php include(TEMPLATES_PATH . "/metadata.php") ?>

    <link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_PATH ?>/css/proyectos/proyectos.css" rel="stylesheet">



    <link rel="stylesheet" type="text/css" href="<?php echo LIB_PATH ?>/DataTables/datatables.css">

    <link rel="stylesheet" type="text/css" href="<?php echo LIB_PATH ?>/DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.css">
    <script type="text/javascript" charset="utf8" src="<?php echo LIB_PATH ?>/DataTables/datatables.js"></script>

    <script src="<?php echo LIB_PATH ?>/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="<?php echo LIB_PATH ?>/sweetalert2/dist/sweetalert2.min.css">

    <script type="text/javascript" charset="utf8" src="<?php echo PUBLIC_PATH ?>/js/proyectos/proyecto_view.js"></script>

    <!--   JS Files END  -->




</head>

<body>
    <?php include(TEMPLATES_PATH . "/header.php") ?>
    <div class="container">
        <div class="row mb-3">

            <a class="btn btn-success " href="../Proyectos/proyecto_create_admin.php"><i class="far fa-plus-square"></i> Proyecto</a>
        </div>

        <table id="proyectos_list" class="table table-striped table-bordered dt-responsive display">
            <thead></thead>
            <tbody></tbody>
        </table>

    </div>
</body>

</html>