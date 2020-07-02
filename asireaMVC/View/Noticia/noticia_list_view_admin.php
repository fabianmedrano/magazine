<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");


require_once CONTROLLER_PATH . "/noticia/noticia_controller.php";

?>

<!DOCTYPE html>
<html>


<head>

    <link href="../../public/css/general.css" rel="stylesheet">
    <link href="../../public/css/noticias/noticias.css" rel="stylesheet">
    <link rel="stylesheet" href="../../lib/fontawesome/css/fontawesome.min.css">



    <!-- CSS FILES START-->
    <link href="../../lib/template/css/custom.css" rel="stylesheet">
    <link href="../../lib/template/css/responsive.css" rel="stylesheet">
    <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../lib/template/css/prettyPhoto.css" rel="stylesheet">
    <link href="../../lib/fontawesome/css/all.min.css" rel="stylesheet">
    <!--  CSS FILES End -->

    <!--   JS Files Start  -->
    <script src="../../lib/jquery/jquery-3.2.1.min.js"></script>
    <script src="../../lib/jquery/jquery-migrate-1.4.1.min.js"></script>
    <script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../lib/jquery/jquery.prettyPhoto.js"></script>
    <script src="../../lib/template/js/custom.js"></script>
    <script src="../../lib/template/js/popper.min.js"></script>
    <script src="../../lib/template/js/isotope.min.js"></script>


    <script src="../../lib/template/js/isotope.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../../lib/DataTables/datatables.css">
    
    <link rel="stylesheet" type="text/css" href="../../lib/DataTables/DataTables-1.10.21/css/dataTables.bootstrap4.css">
    <script type="text/javascript" charset="utf8" src="../../lib/DataTables/datatables.js"></script>



    <script type="text/javascript" charset="utf8" src="../../public/js/noticia/noticia_view.js"></script>
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