<?php
include($_SERVER['DOCUMENT_ROOT'] . "/asirea/asireaMVC/config.php");

require_once CONTROLLER_PATH . "/nosotros/nosotros_controller.php";

?>
<!--Footer Start-->
<footer class="footer">
    <div class="footer-top wf100">
        <div class="container">
            <div class="row left">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-widget">
                        <h4>Dirección:</h4>

                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 80px;">
                        <ul>
                            <li>
                                <p>

                                    <?php
                                    $file = fopen(DATA_PATH."/direccion.txt", "r");
                                    while (!feof($file)) {

                                        echo fgets($file) . "<br />";
                                    }
                                    fclose($file);
                                    ?>
                                </p>
                            </li>

                        </ul>
                        <div class=" row center">
                        <img src="<?php echo PUBLIC_PATH  ?>/img/icon/asirea2.png" alt="" width="120" height="80">
                        </div>
                      
                    </div>
                    
                    
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!--Footer Widget Start-->
                    <div class="footer-widget">
                        <h4>Contactos</h4>

                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 80px;">
                        <p> Telefonos: </p>
                        <?php

                        $controlador_nosotros = new NosotrosController();
                        $telefonos = $controlador_nosotros->getTelefonos();
                        $redes = $controlador_nosotros->getRedes();
                        $correos = $controlador_nosotros->getCorreos();

                        ?>
                        <ul>
                            <?php
                            foreach ($telefonos as $telefono) {
                                echo '  <li ><p>', $telefono['contacto'], '</p></li>';
                            }
                            ?>
                        </ul>

                        <p> Correos electronicos: </p>
                        <ul>
                            <?php
                            foreach ($correos as $correo) {
                                echo '  <li><p >', $correo['contacto'], '</p></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!--Footer Widget End-->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!--Footer Widget Start-->
                    <div class="footer-widget">
                        <h4>Redes</h4>

                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 80px;">
                        <ul>
                            <?php


                            foreach ($redes as $rede) {
                                $icon ='<img src="https://www.google.com/s2/favicons?domain='.$rede['contacto'];'"  >';
                              
                                echo '  <li>
                                <a class="link" href="', (strpos($rede['contacto'], 'http') === false)? 'http://' .$rede['contacto']:$rede['contacto'], '">',
                                $rede['contacto'],'
                                </a> 
                                </li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!--Footer Widget End-->
                </div>


            </div>
        </div>
    </div>
    <div class="footer-copyright text-center py-3">© 2020 Copyright:TCU-663
    </div>
</footer>
<!--Footer End-->