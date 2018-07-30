

  <!-- Escudos -->
    <div class="container-fluid my-3 my-lg-4">
        <div class="row p-0 p-md-4">
          <div class="row mx-auto bd-highlight w-100 bg-white px-3 px-md-5 py-5">
            <div class="col-lg col-md-3 col-6 bd-highlight p-2 p-md-3 text-center mx-auto">
              <img class="img-fluid width="100%" src="<?php bloginfo('template_directory') ?>/images/escudo1.png" alt="">
            </div>
            <div class="col-lg col-md-3 col-6 bd-highlight p-2 p-md-3 text-center mx-auto">
              <img class="img-fluid width="100%" src="<?php bloginfo('template_directory') ?>/images/escudo2.png" alt="">
            </div>
            <div class="col-lg col-md-3 col-6 bd-highlight p-2 p-md-3 text-center mx-auto">
              <img class="img-fluid width="100%" src="<?php bloginfo('template_directory') ?>/images/escudo3.png" alt="">
            </div>
            <div class="col-lg col-md-3 col-6 bd-highlight p-2 p-md-3 text-center mx-auto">
              <img class="img-fluid width="100%" src="<?php bloginfo('template_directory') ?>/images/escudo4.png" alt="">
            </div>
            <div class="col-lg col-md-4 col-6 bd-highlight p-2 p-md-3 text-center mx-auto">
              <img class="img-fluid width="100%" src="<?php bloginfo('template_directory') ?>/images/escudo5.png" alt="">
            </div>
            <div class="col-lg col-md-4 col-6 bd-highlight p-2 p-md-3 text-center mx-auto">
              <img class="img-fluid width="100%" src="<?php bloginfo('template_directory') ?>/images/escudo6.png" alt="">
            </div>
            <div class="col-lg col-md-4 col-6 bd-highlight p-2 p-md-3 text-center mx-auto">
              <img class="img-fluid width="100%" src="<?php bloginfo('template_directory') ?>/images/escudo7.png" alt="">
            </div>
          </div>
        </div>   
    </div>
  <!-- Escudos -->


  <!-- Footer -->
    <div class="container-fluid" id="footer">
      <div class="row py-4 p-md-5">
        <div class="col-lg-6 p-2 p-md-4">
          <h2 class="mb-5"><u>Información de Contacto</u></h2>
          
          <span>
            <h3 class="my-4">Secretaria de Gobierno Dosquebradas. <br>
              <small>Centro Administrativo Municipal CAM.</small>
            </h3>
          </span>
          
          <span>
            <h3 class="my-4">Dirección: <br>
              <small>Av. Simón Bolívar Nro 36-44. Codigo Postal 661001 </small>
            </h3>
          </span>
          
          <span>
            <h3 class="my-4">Teléfonos: <br>
              <small>(+57 6) PBX 3116566 Ext: 157 </small>
            </h3>
          </span>
          
          <span>
            <h3 class="my-4"> Correo: <br>
              <small><a href="mailto:observatoriodeviolencia@dosquebradas.gov.co">observatoriodeviolencia @dosquebradas.gov.co</a></small>
            </h3>
          </span>
          
          <span>
            <h3 class="my-4"> Horarios de atención: <br>
              <small>Lunes a Jueves : 7:00 AM a 12:00 M y de 2:00 PM a 6:00 PM </small><br>
              <small>Viernes : 7:00 AM a 12:00 M y de 2:00 a 5:00 PM.</small>
            </h3>
          </span>

        </div>
        <div class="col-lg-6 d-flex align-items-center flex-column mt-auto p-lg-5">
          <div class="">
            <?php if ( get_option( 'facebook_link' ) ): ?>
              <a target="_blank" href="<?php echo get_option('facebook_link'); ?>">
                <i class="fab fa-2x fa-facebook-square m-3"></i>
              </a>
            <?php endif ?>
            <?php if ( get_option( 'instagram_link' ) ): ?>
              <a target="_blank" href="<?php echo get_option('instagram_link'); ?>">
                <i class="fab fa-2x fa-instagram m-3"></i>
              </a>
            <?php endif ?>
            <?php if ( get_option( 'twitter_link' ) ): ?>
              <a target="_blank" href="<?php echo get_option('twitter_link'); ?>">
                <i class="fab fa-2x fa-twitter m-3"></i>
              </a>
            <?php endif ?>
            <?php if ( get_option( 'youtube_link' ) ): ?>
              <a target="_blank" href="<?php echo get_option('youtube_link'); ?>">
                <i class="fab fa-2x fa-youtube m-3"></i>
              </a>
            <?php endif ?>
          </div>
          <div class="">            
            <h3 class="text-center">© 2018 Municipio de Dosquebradas, Risaralda</h3>
          </div>
        </div>
      </div>
    </div>
  <!-- Footer -->

  <!-- Creditos -->
    <div class="container-fluid p-3" id="designBy">
      <div class="text-center text-white align-self-center">
        Diseñado por <a href="https://www.juandleon.com">juandleon.com</a> Es un software libre bajo la licencia GNU - General Public License.
      </div>
    </div>
  <!-- Creditos -->


  <!-- Extra -->
    <div id="popover-content" class="hide">
      <form action="" class="search-form px-2">
        <div class="input-group my-1">
          <input type="text" class="form-control rounded-0" placeholder="Palabra Clave" aria-label="Recipient's username" aria-describedby="button-addon2">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary rounded-0" type="button" id="button-addon2">Buscar</button>
          </div>
          <i class="fas fa-times m-2 close"></i>
        </div>
      </form>
    </div>
  
  <?php wp_footer(  ); ?>

  <script>
    $(function () {
      $('[data-toggle="popover-search"]').popover({
        html: true, 
        content: function() {
          return $('#popover-content').html();
        },
      });
    });

    $(document).ready(function () {
      /*Hamburguer button*/ 
        $('.navbar-toggler').click(function () {
          $('.navbar-toggler > div').toggleClass('s-menu-container');
          var menu = $('#mobile_menu');
          if (menu.hasClass('animate-menu-out')) {
            menu.removeClass('animate-menu-out');
            menu.addClass('animate-menu');
            document.getElementById("mobile_menu").style.width = "0px";
          }else{
            menu.toggleClass('animate-menu-out');
            document.getElementById("mobile_menu").style.width = "350px";
          };
        });
      /*Hamburguer button*/ 

      //* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
              dropdownContent.style.display = "none";
            } else {
              dropdownContent.style.display = "block";
            }
          });
        }

    })
  </script>
</body>
</html>
