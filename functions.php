<?php 
	

	if ( ! function_exists( 'wp_dosquebradas_setup' ) ) :
		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which runs
		 * before the init hook. The init hook is too late for some features, such as indicating
		 * support post thumbnails.
		 * note that is an escencial features for each theme
		 */


		function wp_dosquebradas_setup()
		{
			/**
		     * Make theme available for translation.
		     * Translations can be placed in the /languages/ directory.
		     */
		    load_theme_textdomain( 'dosquebradas', get_template_directory() . '/languages' );

		    /**
		     * Add default posts and comments RSS feed links to <head>.
		     */
		    add_theme_support( 'automatic-feed-links' );


			/**
			 * Enable support for post thumbnails and featured images.
			 */
			if ( function_exists( 'add_theme_support' ) ) {
			    add_theme_support( 'post-thumbnails', array( 'post' ) );
			   	add_image_size( 'post-notice', 650, 300 );
			}


			/**
			 * Custom Logo
			 */
			add_theme_support( 'custom-logo', array(
				'height'      => 80,
				'width'       => 236,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			) );


			/**
			 * Add <a> button to excerpt in index.php
			 */
			function wpdocs_excerpt_more( $more ) {
				if ( is_single() ) {
					return '';
				}else{
			   		return '... <a class="text-green" href="'.get_the_permalink().'" rel="nofollow">Leer más</a>';
				}
			}
			add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

			/**
		     * Add support for two custom navigation menus.
		     */
			register_nav_menus(array(
				'superior' => __( 'Menú Superior', 'dosquebradas' ),
				'inferior' => __( 'Menú Footer', 'dosquebradas' )
			) );

			/**
		     * Add a special class to <a> in menu list
		     */
			add_filter('nav_menu_link_attributes','class_menu_link',10,3);

			function class_menu_link( $atts, $item, $args )
			{	
				if ( $args->theme_location == 'superior' ) {
					$class = 'nav-link rounded text-dark h5 pr-3 pl-3 text-capitalized';
				}elseif ( $args->theme_location == 'inferior' ) {
					$class = 'nav-link p-0 text-white mt-2';
				}
				$atts['class'] = $class;
				return $atts;
			}

			/**
		     * Add support theme post types 
		     */
			add_theme_support( 'post-formats',  
				array ( 
					'aside',
					'gallery',
					'image',
					'video',
				) 
			);

			/**
		     * Add support sidebar widgets
		     */
			add_action( 'widgets_init', 'my_register_sidebars' );
			function my_register_sidebars() {
			    /* Register the 'primary' sidebar. */
			    register_sidebar(
			        array(
			            'id'            => 'lateral',
			            'name'          => __( 'Sidebar Lateral Derecho' ),
			            'description'   => __( '' ),
			            'before_widget' => '<div id="%1$s" class="widget %2$s mt-1 w-100 p-2">',
			            'after_widget'  => '</div>',
			            'before_title'  => '<h4 class="widget-title">',
			            'after_title'   => '</h4>',
			        )
			    );
			    /**
			     * Creates a sidebar
			     * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
			     */
			    
			    /* Repeat register_sidebar() code for additional sidebars. */
			}
		}

	endif; // wp_curso_setup

	add_action( 'after_setup_theme', 'wp_dosquebradas_setup' );

	/**
	 * css enqueue files
	 */
	function theme_scripts()
	{	
		// Styles
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
		wp_enqueue_style( 'style', get_stylesheet_uri() );

		// Fonts
		wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=EB+Garamond:400,500,600|Forum');
		wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Roboto:400,500,700');
		wp_enqueue_style('googleFonts');

		// Javascript
		wp_enqueue_script( 'jquery_slim', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', '', '', true );
		wp_enqueue_script( 'popper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array ( 'jquery' ), ' ', true );
		wp_enqueue_script( 'bootstrap_js', get_template_directory_uri(). '/js/bootstrap.min.js', array ( 'jquery' ), ' ', true );
	}

	add_action( 'wp_enqueue_scripts', 'theme_scripts' );


	class bootstrap_4_walker_nav_menu extends Walker_Nav_menu {
	    
	    function start_lvl( &$output, $depth ){ // ul
	        $indent = str_repeat("\t",$depth); // indents the outputted HTML
	        $submenu = ($depth > 0) ? ' sub-menu' : '';
	        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	    }
	  
	  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){ // li a span
	        
	    $indent = ( $depth ) ? str_repeat("\t",$depth) : '';
	    
	    $li_attributes = '';
	        $class_names = $value = '';
	    
	        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	        
	        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
	        $classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
	        $classes[] = 'nav-item';
	        $classes[] = 'nav-item-' . $item->ID;
	        if( $depth && $args->walker->has_children ){
	            $classes[] = 'dropdown-menu';
	        }
	        
	        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	        $class_names = ' class="' . esc_attr($class_names) . '"';
	        
	        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
	        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
	        
	        $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';
	        
	        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
	        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
	        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
	        $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr($item->url) . '"' : '';
	        
	        $attributes .= ( $args->walker->has_children ) ? ' class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';
	        
	        $item_output = $args->before;
	        $item_output .= ( $depth > 0 ) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
	        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	        $item_output .= '</a>';
	        $item_output .= $args->after;
	        
	        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	    
	    }
	    
	}
	/*
	Register Navbar
	*/
	register_nav_menu('navbar', __('Navbar', 'dosquebradas'));


/*******************************************************************************/

	/**
	 * Post personilized
	 */

	function cptui_register_my_cpts() {

		/**
		 * Post Type: Estadísticas Observatorio Delito.
		 */

		$labels = array(
			"name" => __( "Estadísticas Observatorio Delito", "dosquebradas" ),
			"singular_name" => __( "Estadística Observatorio de Delito", "dosquebradas" ),
			"menu_name" => __( "Mis Estadísticas", "dosquebradas" ),
			"all_items" => __( "Todas las Estadísticas", "dosquebradas" ),
			"add_new" => __( "Agregar Nueva", "dosquebradas" ),
			"add_new_item" => __( "Agregar Nueva Estadística", "dosquebradas" ),
			"edit_item" => __( "Editar Estadística", "dosquebradas" ),
			"new_item" => __( "Nueva Estadística", "dosquebradas" ),
			"view_item" => __( "Ver Estadística", "dosquebradas" ),
			"view_items" => __( "Ver Estadísticas", "dosquebradas" ),
			"search_items" => __( "Buscar Estadísticas", "dosquebradas" ),
			"not_found" => __( "No se encontraron Estadísticas", "dosquebradas" ),
			"not_found_in_trash" => __( "Ninguna Estadística se encontró en la papelera", "dosquebradas" ),
			"featured_image" => __( "Imagen Destacada para la Estadística", "dosquebradas" ),
		);

		$args = array(
			"label" => __( "Estadísticas Observatorio Delito", "dosquebradas" ),
			"labels" => $labels,
			"description" => "Estadísticas",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "estadisticas", "with_front" => true ),
			"query_var" => true,
			"supports" => array( "title", "editor", "thumbnail" ),
		);

		register_post_type( "estadisticas", $args );
	}

	add_action( 'init', 'cptui_register_my_cpts' );

	/**
	 * Fields personilized
	 */
	define( 'ACF_LITE', true );
	include_once('advanced-custom-fields/acf.php');
	if(function_exists("register_field_group"))
	{
		register_field_group(array (
			'id' => 'acf_estadisticas',
			'title' => 'Estadísticas',
			'fields' => array (
				array (
					'key' => 'field_5a1c3727afb17',
					'label' => 'Título',
					'name' => 'titulo',
					'type' => 'text',
					'required' => 1,
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5a1c3752afb18',
					'label' => 'Documento',
					'name' => 'documento',
					'type' => 'file',
					'instructions' => 'Archivo permido .pdf ',
					'required' => 1,
					'save_format' => 'url',
					'library' => 'all',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'estadisticas',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
					0 => 'permalink',
					1 => 'the_content',
					2 => 'excerpt',
					3 => 'custom_fields',
					4 => 'discussion',
					5 => 'comments',
					6 => 'revisions',
					7 => 'slug',
					8 => 'author',
					9 => 'format',
					10 => 'featured_image',
					11 => 'categories',
					12 => 'tags',
					13 => 'send-trackbacks',
				),
			),
			'menu_order' => 0,
		));
	}





	


	