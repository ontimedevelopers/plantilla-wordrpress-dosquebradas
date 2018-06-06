
   <!-- Escudos -->
   <div class="container-fluid p-2 p-md-5 mt-2 mb-2">
        <div class="container">
            <div class="row mx-auto seven-cols">
                <div class="col-3 col-md-1 mx-auto text-center">
                    <img class="img-fluid" width="100px"  src="<?php bloginfo('template_directory') ?>/images/escudo-colombia.png">
                </div>
                <div class="col-3 col-md-1 mx-auto text-center">
                    <img class="img-fluid" width="100px"  src="<?php bloginfo('template_directory') ?>/images/escudo-dosquebradas.png">
                </div>
                <div class="col-3 col-md-1 mx-auto text-center">
                    <img class="img-fluid" width="100px"  src="<?php bloginfo('template_directory') ?>/images/logo.png">
                </div>
                <div class="col-3 col-md-1 mx-auto text-center">
                    <img class="img-fluid" width="100px"  src="<?php bloginfo('template_directory') ?>/images/escudo-ejercito.png">
                </div>
                <div class="col-3 col-md-1 mx-auto text-center">
                    <img class="img-fluid" width="100px"  src="<?php bloginfo('template_directory') ?>/images/escudo-policia.png">
                </div>
                <div class="col-3 col-md-1 mx-auto text-center">
                    <img class="img-fluid" width="100px"  src="<?php bloginfo('template_directory') ?>/images/dijin.png">
                </div>
                <div class="col-3 col-md-1 mx-auto text-center">
                    <img class="img-fluid" width="100px"  src="<?php bloginfo('template_directory') ?>/images/logo-fiscalia.png">
                </div>
            </div>
        </div>
   </div>
   <!-- #Escudos -->



   <!-- Footer -->
   <div class="container-fluid bg-footer">
       <div class="container">
           <div class="row">

                <!-- Menu Footer -->
                <div class="col-12 col-md-5 col-lg-3 text-white mt-5 p-4 p-xs-r-0 pl-xs-0">
                    <h5 class="border border-top-0 border-right-0 border-left-0 pb-2">Mapa del Sitio</h5>

                    <?php 

                      wp_nav_menu( array(
                        'theme_location'  => 'inferior',
                        'menu'            => '',
                        'container'       => '',
                        'container_class' => '',
                        'container_id'    => '',
                        'menu_class'      => 'nav-item',
                        'menu_id'         => 'menu',
                        'echo'            => true,
                        'fallback_cb'     => false,
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '<i class="fa fa-angle-right" aria-hidden="true"></i> ',
                        'link_after'      => '',
                        'items_wrap'      => '<ul class="nav flex-column mt-3">%3$s</ul>',
                        'depth'          => 3,
                        'walker'         => new bootstrap_4_walker_nav_menu()
                      ) );

                    ?>
                </div>
                <!-- #Menu Footer -->

               <!-- Contáctenos -->
               <div class="col-12 col-md-7 col-lg-5 text-white mt-5 p-4 p-xs-r-0 pl-xs-0">
                    <h5 class="border border-top-0 border-right-0 border-left-0 pb-2">
                      Información de Contacto
                    </h5>
                    <p class="text-white mt-4">
                        <small style="font-size: 17px;">
                        <address>
                            <strong style="font-size: 17px;">Centro Administrativo Municipal CAM Dosquebradas.</strong><br>
                            Dirección Av. Simón Bolívar Nro 36-44<br>
                            Codigo Postal 661001 </br>
                            Teléfonos: (57 6) PBX 3116566. Fax: (57 6) 3320537 </br>
                            Correo electrónico: <a class="text-white" href="emailto:archivo@dosquebradas.gov.co">archivo@dosquebradas.gov.co</a>.<br>
                            URL: <a class="text-white" href="https://www.observatoriodeviolencia.dosquebradas.gov.co/">https://www.observatoriodeviolencia.dosquebradas.gov.co/</a>
  
                        </address>
                        <address>
                          <strong style="font-size: 17px;">Horarios de atención:</strong><br>
                          <u title="Horario">Lunes a Jueves </u>: 
                            7:00 AM a 12:00 M y de 2:00 PM a 6:00 PM </br> 
                          <u title="Horario">Viernes </u>: 
                          7:00 AM a 12:00 M y de 2:00 a 5:00 PM.
                        </address>
                        </small>
                    </p>
               </div>
               <!-- #Contáctenos -->

               <!-- Redes Sociales -->
               <div class="col-12 col-lg-4 text-white mt-5 p-4 p-xs-r-0 pl-xs-0">

                    <h5 class="border border-top-0 border-right-0 border-left-0 pb-2">
                      Redes Sociales
                    </h5>

                    <div class="mt-4">
                        <a href="https://facebook.com">
                            <img class="img-fluid mr-4" width="80px;" src="<?php bloginfo('template_directory') ?>/images/facebook.png">
                        </a>
                        <a href="https://instagram.com">
                            <img class="img-fluid mr-4" width="80px;" src="<?php bloginfo('template_directory') ?>/images/instagram.png">
                        </a>
                        <a href="https://twitter.com">
                            <img class="img-fluid mr-4" width="80px;" src="<?php bloginfo('template_directory') ?>/images/twitter.png">
                        </a>
                        <a href="https://youtube.com">
                            <img class="img-fluid mr-4" width="80px;" src="<?php bloginfo('template_directory') ?>/images/youtube.png">
                        </a>
                    </div>

               </div>
               <!-- #Redes Sociales -->


                       
               

           </div>
           
           <hr class="border-light">

           <!-- Copyright -->
           <div class="row">
               <div class="col-12">
                   <p class="text-center text-white">
                       <small class="text-white" style="font-size: 16px;">
                           Copyright © <?php echo date('Y'); ?> Municipio de Dosquebradas, Risaralda | Todos los derechos reservados. <br>
                           Diseñado por 
                           <a class="text-white" href="https://www.dldeveloper.com"><b>dldeveloper.com</b></a>
                           Es un software libre bajo la licencia GNU - General Public License.
                       </small>
                   </p>
               </div>
           </div>
           <!-- #Copyright -->
       </div>
   </div>
   <!-- #Footer -->


   <?php
        wp_footer();
    ?>
  </body>
  <script>
    $('.sub-menu').addClass('dropdown-menu'); 
   
    // $('.menu-item-has-children').addClass('dropdown-toggle');
  </script>
</html>


	