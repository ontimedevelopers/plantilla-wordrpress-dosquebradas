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

    <style type="text/css">
        
        /*.navbar-nav .sub-menu {
            top: 0 !important;
            left: 100% !important;
            margin-top: -10px !important;
        }*/
    </style>
   
</head>
<body style="">



   <!-- Pincipal Nav -->
   <div class="container-fluid container-navbar bg-white p-3 mb-0">
        <div class="container">            
            <nav class="navbar navbar-expand-lg navbar-light bg-white p-0">

                <!-- Custom Logo -->
                <?php 
                    if ( function_exists( 'the_custom_logo' ) ) {
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        if ( has_custom_logo() ) {
                            echo ' <a href="'.get_home_url( ).'"><img class="logo-img" src="'.esc_url( $logo[0] ).'"></a>';
                        }

                        if ( !has_custom_logo()) {  
                            echo 'NO HAS ASIGNADO LOGO';
                        }
                    } 
                ?>
                <!-- #Custom Logo -->


                <button class="navbar-toggler border-0 mt-3 mb-3 text-dark" type="button" data-toggle="collapse" data-target="#principalNavbar" aria-controls="principalNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-dark"></span>
                </button>


                <?php 

                    wp_nav_menu( array(
                        'theme_location'  => 'superior',
                        'container'       => 'div',
                        'container_class' => 'collapse bg-none navbar-collapse w-100',
                        'container_id'    => 'principalNavbar',
                        'menu_class'      => 'nav-item bg-none mr-3 pt-3 pb-2',
                        'menu_id'         => '',
                        'echo'            => true,
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s" class="navbar-nav ml-auto">%3$s</ul>',
                        'depth'          => 3,
                        'walker'         => new bootstrap_4_walker_nav_menu()
                    ) );

                ?>

            </nav>
        </div>
   </div>
   <!-- #Pincipal Nav -->


    <?php if ( is_home() && is_front_page() ): ?>        
       <!-- Carrousel -->
       <div id="carousel_principal" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel_principal" data-slide-to="0" class="active"></li>
                <li data-target="#carousel_principal" data-slide-to="1"></li>
                <li data-target="#carousel_principal" data-slide-to="2"></li>
            </ol>
            <!-- #Indicators -->

            <!-- Slider Images -->
            <div class="carousel-inner">
                <div class="carousel-item active parallax">
                    <img width="100%" src="<?php echo get_template_directory_uri().'/images/slider1.jpg' ?>">
                </div>
                <div class="carousel-item parallax">
                    <img width="100%" src="<?php echo get_template_directory_uri().'/images/slider2.jpg' ?>">
                </div>
                <div class="carousel-item parallax">
                    <img width="100%" src="<?php echo get_template_directory_uri().'/images/slider3.jpg' ?>">
                </div>
            </div>
            <!-- #Slider Images -->

            <!-- Controls -->
            <a class="carousel-control-prev" href="#carousel_principal" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon d-none d-md-block" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next hidden-lg" href="#carousel_principal" role="button" data-slide="next">
                <span class="carousel-control-next-icon  d-none d-md-block" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
            <!-- #Controls -->
        </div>
       <!-- #Carrousel -->

    <?php endif ?>