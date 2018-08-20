<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php wp_title( '-', true, 'right' ).' '.bloginfo('name'); ?></title>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--[if lt IE 9]>
      <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->

    <?php wp_head(); ?>

</head>
<body style="">
  
  <!-- Header -->
    <div class="container-fluid bg-white py-3" id="header">
      <div class="container container-nav">
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
          <!-- Custom Logo -->
          <?php 
            if ( function_exists( 'the_custom_logo' ) ) {
              $custom_logo_id = get_theme_mod( 'custom_logo' );
              $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
              if ( has_custom_logo() ) {
                  $logo_img = '';
                  $logo_img .= '<a class="navbar-brand" href="'.get_home_url(  ).'">';
                  $logo_img .= '<img class="img-fluid" src="'.esc_url( $logo[0] ).'">';
                  $logo_img .= '</a>';
                  echo $logo_img;
              }else {  
                  echo 'SIN LOGO';
              }
            } 
          ?>
          <!-- #Custom Logo -->

          <?php 
            if ( has_nav_menu( 'superior' ) ) {
                
                wp_nav_menu( array(
                    'theme_location'  => 'superior',
                    'container'       => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id'    => '',
                    'menu_class'      => '',
                    'menu_id'         => '',
                    'echo'            => true,
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="navbar-nav ml-auto">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => new bootstrap_4_walker_nav_menu()
                ) );
            }
          ?>

          <?php 
            if ( has_nav_menu( 'movil' ) ) {
          ?>
              <!-- Hamburguer button -->
              <button class="navbar-toggler border-0" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <div class="my-2">
                  <div class="s-menu"></div>
                </div>
                <div class="my-2">
                  <div class="s-menu w-50"></div>
                </div>
                <div class="my-2">
                  <div class="s-menu"></div>
                </div>
              </button>
              <!-- #Hamburguer button -->

              <?php    
                wp_nav_menu( array(
                  'theme_location'  => 'movil',
                  'container'       => 'div',
                  'container_class' => is_admin_bar_showing() ? 'sidenav sidenav-to-admin' : 'sidenav',
                  'container_id'    => 'mobile_menu',
                  'menu_class'      => '',
                  'menu_id'         => '',
                  'echo'            => true,
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '<h3 class="text-center text-white mt-2 mb-4">MENU</h3> %3$s',
                  'depth'           => 0,
                  'walker'          => new bootstrap_4_walker_side_nav_menu()
                ) );
          }
              ?>

        </nav>
      </div>
    </div>
  <!-- #Header -->
  


    <?php if ( is_home() && is_front_page() && is_array(get_slider_array()) && count(get_slider_array()) > 0 ): ?>   
      
      <!-- Slider -->
      <div id="sliderPrincipal" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
          <?php $c = 0; foreach (get_slider_array() as $value): ?>
            <?php if ($c == 0): ?>
              <li data-target="#sliderPrincipal" data-slide-to="<?php echo $c; ?>" class="active"></li>
            <?php else: ?>
              <li data-target="#sliderPrincipal" data-slide-to="<?php echo $c; ?>"></li>
            <?php endif ?>
          <?php $c++; endforeach ?>
        </ol>

        <div class="carousel-inner">

          <?php $c = 0; foreach (get_slider_array() as $value): ?>
            
            <?php if ($c == 0): ?>
              <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo $value; ?>" alt="First slide">
              </div>
            <?php else: ?>
              <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo $value; ?>" alt="First slide">
              </div>
            <?php endif ?>

          <?php $c++; endforeach ?>

          <a class="carousel-control-prev" href="#sliderPrincipal" role="button" data-slide="prev">
            <i class="fas fa-2x fa-angle-double-left"></i>
            <span class="sr-only">Anterior</span>
          </a>
          <a class="carousel-control-next" href="#sliderPrincipal" role="button" data-slide="next">
            <i class="fas fa-2x fa-angle-double-right"></i>
            <span class="sr-only">Siguiente</span>
          </a>
          
        </div>

      </div>
    <!-- #Slider -->

    <?php endif ?>
