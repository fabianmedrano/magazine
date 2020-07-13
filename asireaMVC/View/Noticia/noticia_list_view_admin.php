<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

?>

<!DOCTYPE html>
<html>


<head>

    <link href="<?php echo PUBLIC_PATH ?>/css/general.css" rel="stylesheet">
    <link href="<?php echo PUBLIC_PATH ?>/css/noticias/noticias.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo LIB_PATH ?>/fontawesome/css/fontawesome.min.css">



    <!-- CSS FILES START-->
    <link href="<?php echo LIB_PATH ?>/template/css/custom.css" rel="stylesheet">
    <link href="<?php echo LIB_PATH ?>/template/css/responsive.css" rel="stylesheet">
    <link href="<?php echo LIB_PATH ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo LIB_PATH ?>/template/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo LIB_PATH ?>/fontawesome/css/all.min.css" rel="stylesheet">
    <!--  CSS FILES End -->

    <!--   JS Files Start  -->
    <script src="<?php echo LIB_PATH ?>/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo LIB_PATH ?>/jquery/jquery-migrate-1.4.1.min.js"></script>
    <script src="<?php echo LIB_PATH ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo LIB_PATH ?>/jquery/jquery.prettyPhoto.js"></script>
    <script src="<?php echo LIB_PATH ?>/template/js/custom.js"></script>
    <script src="<?php echo LIB_PATH ?>/template/js/popper.min.js"></script>
    <script src="<?php echo LIB_PATH ?>/template/js/isotope.min.js"></script>


    <script src="<?php echo LIB_PATH ?>/template/js/isotope.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo LIB_PATH ?>/DataTables/datatables.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo LIB_PATH ?>/DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.css">
    <script type="text/javascript" charset="utf8" src="<?php echo LIB_PATH ?>/DataTables/datatables.js"></script>



    <script type="text/javascript" charset="utf8" src="<?php echo PUBLIC_PATH ?>/js/noticia/noticia_view.js"></script>
    <!--   JS Files END  -->



    <?php include(TEMPLATES_PATH . "/metadata.php") ?>

    <title>Acerca de RECURINFOR (v4)</title>

</head>

<body>
    <?php include(TEMPLATES_PATH . "/header.php") ?>
    <div class="container-flex">
        <div class="row">
            <table id="noticias_list">
                <thead></thead>
                <tbody></tbody>
            </table>

        </div>
    </div>
    <?php include(TEMPLATES_PATH . "/footer.php") ?>
</body>

</html>