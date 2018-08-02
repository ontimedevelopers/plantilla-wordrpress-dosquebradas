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
			    add_theme_support( 'post-thumbnails', array( 'post', 'page' ) ); /*OJO*/
			   	add_image_size( 'post-notice', 650, 300 );
			}


			/**
			 * Custom Logo
			 */
			add_theme_support( 'custom-logo', array(
				'width'       => 160,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'Observatorio de Violencia', '' ),
			) );


			/**
		     * Add support for two custom navigation menus.
		     */
			register_nav_menus(array(
				'superior' => __( 'Menú Superior', 'Observatorio' ),
				'movil' => __( 'Menú para movil', 'Observatorio' )
			) );


			/**
		     * Function to get slider images to template
		     */
			function get_slider_array()
			{	
				$images = [];
				for ($i=1; $i <= 5; $i++) { 
					if ( get_theme_mod('slider_img_'.$i) ) {
						$images[] = get_theme_mod('slider_img_'.$i); 
					}
				}
				return $images;
			}

			/**
		     * Add slider config to customize_register.
		     */
			function my_customize_register( $wp_customize ) {


			  /*Section para Slider*/
			  $wp_customize->add_section( 'slider_section' , array(
			    'title' => __( 'Slider', 'dosquebradas' ),
    			'description' => "Selecciona las imagenes para tu slider",
			    'panel' => '',
			    'priority' => 95,
			    'capability' => 'edit_theme_options',
			  ));

				  //Slider
				  for ($i=1; $i <= 5; $i++) { 
					  $wp_customize->add_setting( 'slider_img_'.$i, array(
					    'type' => 'theme_mod',
					    'capability' => 'edit_theme_options',
					  ));

					 	$wp_customize->add_control(
				       new WP_Customize_Image_Control(
				           $wp_customize,
				           'slider_'.$i,
				           array(
				              'label'      => __( 'Cargar Imagen '.$i, 'Observatorio' ),
				              'section'    => 'slider_section',
				              'settings'   => 'slider_img_'.$i,
				           )
				       )
				   	);
				  }


			  /*Section Redes Sociales*/
			  $wp_customize->add_section( 'social_section' , array(
			    'title' => __( 'Redes Sociales', 'dosquebradas' ),
			    'panel' => '',
			    'priority' => 160,
			    'capability' => 'edit_theme_options',
			  ));
			  
				  //Redes Sociales: Facebook
				  $wp_customize->add_setting( 'facebook_link', array(
				    'type' => 'option',
				    'capability' => 'edit_theme_options',
				  ));
				 
				  $wp_customize->add_control('facebook_link', array(
				    'label' => __( 'Facebook URL', 'dosquebradas' ),
				    'section' => 'social_section',
				    'priority' => 1,
				    'type' => 'text',
				  ));
				  
				  //Redes Sociales: Youtube
				  $wp_customize->add_setting( 'youtube_link', array(
				    'type' => 'option',
				    'capability' => 'edit_theme_options',
				  ));
				 
				  $wp_customize->add_control('youtube_link', array(
				    'label' => __( 'Youtube URL', 'dosquebradas' ),
				    'section' => 'social_section',
				    'priority' => 4,
				    'type' => 'text',
				  ));
				  
				  //Redes Sociales: Instagram
				  $wp_customize->add_setting( 'instagram_link', array(
				    'type' => 'option',
				    'capability' => 'edit_theme_options',
				  ));
				 
				  $wp_customize->add_control('instagram_link', array(
				    'label' => __( 'Instagram URL', 'dosquebradas' ),
				    'section' => 'social_section',
				    'priority' => 1,
				    'type' => 'text',
				  ));
				  
				  //Redes Sociales: Twitter
				  $wp_customize->add_setting( 'twitter_link', array(
				    'type' => 'option',
				    'capability' => 'edit_theme_options',
				  ));
				 
				  $wp_customize->add_control('twitter_link', array(
				    'label' => __( 'Twitter URL', 'dosquebradas' ),
				    'section' => 'social_section',
				    'priority' => 1,
				    'type' => 'text',
				  ));
			}
			add_action( 'customize_register', 'my_customize_register' );

			/**
		     * Pagination
		     */
			function fellowtuts_wpbs_pagination($pages = '', $range = 2) 
			{  
				$showitems = ($range * 2) + 1;  
				global $paged;
				if(empty($paged)) $paged = 1;
				if($pages == '')
				{
					global $wp_query; 
					$pages = $wp_query->max_num_pages;
				
					if(!$pages)
						$pages = 1;		 
				}   
				
				if(1 != $pages)
				{
				  	echo '<nav class="mt-5" aria-label="Page navigation" role="navigation">';
			    	echo '<span class="sr-only">Page navigation</span>';
			   		echo '<ul class="pagination justify-content-center ft-wpbs">';
					
			    	echo '<li class="page-item disabled hidden-md-down d-none d-lg-block"><span class="page-link">Página '.$paged.' de '.$pages.'</span></li>';
				
				 	if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
						echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="Primera página">&laquo;<span class="hidden-sm-down d-none d-md-block"> First</span></a></li>';
				
				 	if($paged > 1 && $showitems < $pages) 
						echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Anterior Página">&lsaquo;<span class="hidden-sm-down d-none d-md-block"> Anterios</span></a></li>';
				
					for ($i=1; $i <= $pages; $i++)
					{
				    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
						echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Página </span>'.$i.'</a></li>';
					}
					
					if ($paged < $pages && $showitems < $pages) 
						echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Siguiente página"><span class="hidden-sm-down d-none d-md-block">Siguiente </span>&rsaquo;</a></li>';  
				
				 	if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
						echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">Última </span>&raquo;</a></li>';
				
				 	echo '</ul>';
			    echo '</nav>';
			    //echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';	 	
				}
			}


			/**
		     * Post destacados
		     */
			function sm_custom_meta() {
			    if ( has_post_thumbnail(  ) ) {
			    	add_meta_box( 'sm_meta', __( 'Post Destacado (Require tener asignada una imagen destacada)', 'sm-textdomain' ), 'sm_meta_callback', 'post' );
			    }
			}
			 
			function sm_meta_callback( $post ) {
			    $featured = get_post_meta( $post->ID );
			    ?>
			  <p>
			    <div class="sm-row-content">
			        <label for="meta-checkbox">
			            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $featured['meta-checkbox'] ) ) checked( $featured['meta-checkbox'][0], 'yes' ); ?> />
			            <?php _e( 'Hacer el post destacado', 'sm-textdomain' )?>
			        </label>
			        
			    </div>
			  </p>
			 
			    <?php
			}
			 
			add_action( 'add_meta_boxes', 'sm_custom_meta' );

			function sm_meta_save( $post_id ) {
				$is_autosave = wp_is_post_autosave( $post_id );
				$is_revision = wp_is_post_revision( $post_id );
				$is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
				if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
				return;
				}
				if( isset( $_POST[ 'meta-checkbox' ] ) ) {
				update_post_meta( $post_id, 'meta-checkbox', 'yes' );
				} else {
				update_post_meta( $post_id, 'meta-checkbox', '' );
				}
			}
			add_action( 'save_post', 'sm_meta_save' );

			function ab_destacados() {
				wp_reset_query(  );
				$temp = $featured;
				$featured = null;

				$args = array(
				'posts_per_page' => 6,
				'meta_key' => 'meta-checkbox',
				'meta_value' => 'yes'
				);
				$featured = new WP_Query($args); 


				?>

				<ul class="list-unstyled my-4">

				<?php 

				if ($featured->have_posts()): 
					while ( $featured->have_posts() ) : $featured->the_post();
				?>

					<li class="media mb-2 mt-0 mt-md-2">
 						<img class="img-fluid mr-2" src="<?php the_post_thumbnail_url('post-thumbnail') ?>" alt="">
						<div class="media-body">
						<p>
							<a href="<?php echo the_permalink(); ?>">
								<b> <?php the_title(); ?> </b>
							</a>
							</p>
						</div>
					</li>
				<?php 
					endwhile;
				endif;
				?>

				</ul>

			<?php 
			}


			/**
		    * Add classes to img 
		    **/
			function add_responsive_class_content($content){
		        $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
		        if (!empty($content)) {
			        $document = new DOMDocument();
			        libxml_use_internal_errors(true);
			        $document->loadHTML(utf8_decode($content),LIBXML_HTML_NOIMPLIED);

			        $imgs = $document->getElementsByTagName('img');
			        foreach ($imgs as $img) {           
			           $existing_class = $img->getAttribute('class');
			           $img->setAttribute('class', "card-img-crop img-fluid $existing_class");
			        }

			        $html = $document->saveHTML();
			        $html = str_replace(”,”,$html);
			        return $html;
		        }else {	
		        	return $content;  
	  			}
			}

			add_filter('the_content', 'add_responsive_class_content');

			// add default class for img-responsive
			// function add_image_responsive_class($content) {
			//    $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
			//    $replacement = '<img$1class="$2 img-responsive"$3>';
			//    $content = preg_replace($pattern, $replacement, $content);
			//    return $content;
			// }
			// add_filter('the_content', 'add_image_responsive_class');

			/**
		     * Add support sidebar widgets
		     **/
			function my_register_sidebars() {
			    register_sidebar(
			        array(
			            'id'            => 'lateral',
			            'name'          => __( 'Sidebar Lateral Derecho' ),
			            'description'   => __( 'Arrastra y suelta aquí las secciones que desees colocar en la barra lateral derecha del sitio. (Barra de busqueda, Links, Noticias Destacadas, contador de visitas, encuestas y más. ).' ),
			            'before_widget' => '<div id="%1$s" class="widget %2$s">',
			            'after_widget'  => '</div>',
			            'before_title'  => '<h3 class="principal-title">',
			            'after_title'   => '</h3><hr class="line-title">',
			        )
			    );
			    /**
			     * Creates a sidebar
			     * @param string|array  Builds Sidebar based off of 'name' and 'id' values.
			     */
			    
			    /* Repeat register_sidebar() code for additional sidebars. */
			}
			add_action( 'widgets_init', 'my_register_sidebars' );
				
			/**
			*  search_form_widget
			*/
			class search_form_widget extends WP_widget
			{
				
				public function __construct()
				{
					parent::__construct(
						'w_search',
						'Buscar (Observatorio de violencia)',
						array( 'description' => __( 'Agrega un sencillo formulario de busqueda.', '' ), )
					);

				}

				public function widget( $args, $instance ) {
			        extract( $args );
			        $title = apply_filters( 'widget_title', $instance['title'] );
			        // $sq = the_search_query();
			 
			        echo $before_widget;
			        if ( empty( $title ) ) {
			            $title = 'Buscar';
			        }
			        echo $before_title;
			        echo $title;
			        echo $after_title;


			        /*Content Widget*/
			        $w = '<form action="'.get_home_url().'" class="search-form" method="get">';
			        $w .= '<div class="input-group my-4">';
			        $w .= '<input type="text" name="s" class="form-control rounded-0" placeholder="Palabra Clave" aria-label="" aria-describedby="button-addon2" value="'.get_search_query().'">';
			        $w .= '<div class="input-group-append">';
			        $w .= '<button class="btn rounded-0" type="submit" id="button-addon2">Buscar</button>';
			        $w .= '</div>';
			        $w .= '</div>';
			        $w .= '</form>';
			        /*Content Widget*/

			        echo $w;			        
			        echo $after_widget;
			    }

			    public function form( $instance ) {
			        if ( isset( $instance[ 'title' ] ) ) {
			            $title = $instance[ 'title' ];
			        }
			        else {
			            $title = __( 'Buscar', '' );
			        }
			        ?>
			        <p>
			        <label for="<?php echo $this->get_field_name( 'title' ); ?>">
			        	Titulo: 
			        </label>
			        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			        </p>
			        <?php
			    }

			    public function update( $new_instance, $old_instance ) {
			        $instance = array();
			        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			 
			        return $instance;
			    }

			}

			class revelant_widget extends WP_widget
			{
				
				public function __construct()
				{
					parent::__construct(
						'w_revelant',
						'Noticias destacadas (Observatorio de violencia)',
						array( 'description' => __( 'Debes marcar cada noticia como destacada en la parte inferior de la misma', '' ), )
					);

				}

				public function widget( $args, $instance ) {
			        extract( $args );
			        $title = apply_filters( 'widget_title', $instance['title'] );
			 
			        echo $before_widget;
			        if ( empty( $title ) ) {
			            $title = 'Destacado';
			        }
			        echo $before_title;
			        echo $title;
			        echo $after_title;

			        /*Content Widget*/
			        ab_destacados();
			        /*Content Widget*/

			        echo $after_widget;
			    }

			    public function form( $instance ) {
			        if ( isset( $instance[ 'title' ] ) ) {
			            $title = $instance[ 'title' ];
			        }
			        else {
			            $title = __( 'Destacado', '' );
			        }
			        ?>
			        <p>
			        <label for="<?php echo $this->get_field_name( 'title' ); ?>">
			        	Titulo: 
			        </label>
			        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			        </p>
			        <?php
			    }

			    public function update( $new_instance, $old_instance ) {
			        $instance = array();
			        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			 
			        return $instance;
			    }

			}


			/**
			*  search_form_widget
			*/
			class links_widget extends WP_widget
			{
				
				public function __construct()
				{
					parent::__construct(
						'w_links',
						'Enlaces (Observatorio de violencia)',
						array( 'description' => __( 'Enlace con imagen destacada', '' ), )
					);

				}

				public function widget( $args, $instance ) {
			        extract( $args );
			        $title = apply_filters( 'widget_title', $instance['title'] );
			        $img_text = $instance['img_text'];
			        $link_url = $instance['link_url'];
			        $route = $instance['route'];
			 
			        echo $before_widget;
			        if ( !empty( $title ) ) {
				        echo $before_title;
				        echo $title;
				        echo $after_title;
			        }

			        /*Content Widget*/
			        $w = '<div class="row">';
			        $w .= '<div class="card col-sm-6 col-lg-12 my-2 border-0">';
			        $w .= '<div class="px-5">';
			        $w .= '<a href="'.$route.'" target="_blank" >';
			        $w .= '<img class="card-img-top" src="'.$link_url.'">';
			        $w .= '</a>';
			        $w .= '</div>';
			        $w .= '<div class="card-body pt-2">';
			        $w .= ' <p class="card-text text-center" style="">';
			        $w .= $img_text;
			        $w .= '</p>';
			        $w .= '</div>';
			        $w .= '</div>';
			        $w .= '</div>';

			        /*Content Widget*/

			        echo $w;			        
			        echo $after_widget;
			    }

			    public function form( $instance ) {
			        // if ( isset( $instance[ 'title' ] ) ) {
			        //     $title = $instance[ 'title' ];
			        // }
			        // else {
			        //     $title = __( '', '' );
			        // }
			         $title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
			         $img_text = isset( $instance[ 'img_text' ] ) ? $instance[ 'img_text' ] : '';
			         $link_url = isset( $instance[ 'link_url' ] ) ? $instance[ 'link_url' ] : '';
			         $route = isset( $instance[ 'route' ] ) ? $instance[ 'route' ] : '';
			        ?>
			        <p>
			        	Si hace parte de la sección superior deja el titulo en blanco, a menos que desees separarlos por títulos.
			        </p>
			        <p>
			        	<label for="<?php echo $this->get_field_name( 'title' ); ?>">
			        		Titulo (opcional): 
			        	</label>
			        	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			        	</p>
			        <p>
			        <p>
					      <label for="<?php echo $this->get_field_name( 'img_text' ); ?>"><?php _e( 'Píe de Foto:' ); ?></label>
			        	<input class="widefat" id="<?php echo $this->get_field_id( 'img_text' ); ?>" name="<?php echo $this->get_field_name( 'img_text' ); ?>" type="text" value="<?php echo esc_attr( $img_text ); ?>" />
					    </p>

					    <p>
					      <label for="<?php echo $this->get_field_name( 'link_url' ); ?>"><?php _e( 'Link URL:' ); ?></label>
					      <input class="widefat" id="<?php echo $this->get_field_id( 'link_url' ); ?>" name="<?php echo $this->get_field_name( 'link_url' ); ?>" type="text" value="<?php echo esc_attr( $link_url ); ?>" />
					    </p>

					    <p>
					      <label for="<?php echo $this->get_field_name( 'route' ); ?>"><?php _e( 'URL Enlace:' ); ?></label>
					      <input class="widefat" id="<?php echo $this->get_field_id( 'route' ); ?>" name="<?php echo $this->get_field_name( 'route' ); ?>" type="text" value="<?php echo esc_attr( $route ); ?>" />
					    </p>
			        <?php
			    }

			    public function update( $new_instance, $old_instance ) {
			        $instance = array();
			        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			        $instance['img_text'] = ( !empty( $new_instance['img_text'] ) ) ? strip_tags( $new_instance['img_text'] ) : '';
			        $instance['link_url'] = ( !empty( $new_instance['link_url'] ) ) ? strip_tags( $new_instance['link_url'] ) : '';
			        $instance['route'] = ( !empty( $new_instance['route'] ) ) ? strip_tags( $new_instance['route'] ) : '';
			 
			        return $instance;
			    }

			}


			add_action('widgets_init', function(){
				register_widget( 'search_form_widget' );
				register_widget( 'revelant_widget' );
				register_widget( 'links_widget' );
			});



			/**
		     * Add excerpt to pages
		     **/
			add_post_type_support('page', 'excerpt');

			/**
		     * Exclude estadisticas post type and pages from search results
		     */
			function search_filter($query) {
				if ($query->is_search) {
					$query->set('post_type', 'post');
					$query->set('posts_per_page', '10');
				}
				return $query;
			}
			add_filter('pre_get_posts','search_filter');
		}


	endif; // wp_dosquebradas_setup

	add_action( 'after_setup_theme', 'wp_dosquebradas_setup' );



	class bootstrap_4_walker_nav_menu extends Walker_Nav_menu {
	    
	    function start_lvl(  &$output, $depth = 0, $args = array() ){ // ul
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
	            $classes[] = 'dropdown-submenu';
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
	        
	        $attributes .= ( $args->walker->has_children ) ? ' class="nav-link dropdown-toggle otro" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';
	        
	        $item_output = $args->before;
	        $item_output .= ( $depth > 0 ) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
	        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	        $item_output .= '</a>';
	        $item_output .= $args->after;
	        
	        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	    
	    }
	    
	}

	class bootstrap_4_walker_side_nav_menu extends Walker_Nav_menu {
	    
	    function start_lvl(  &$output, $depth = 0, $args = array() ){ // ul
	        $indent = str_repeat("\t",$depth); // indents the outputted HTML
	        $output .= "\n$indent<div class=\"dropdown-container depth_$depth\">\n";
	    }

	    function end_lvl( &$output, $depth = 0, $args = array() ){
	        $indent = str_repeat("\t",$depth); // indents the outputted HTML
    		$output .= "$indent</div>";
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
	            $classes[] = 'dropdown-submenu';
	        }
	        
	        $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	        $class_names = ' class="' . esc_attr($class_names) . '"';
	        
	        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
	        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
	        
	        $output .= $indent . '';
	        
	        $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
	        $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr($item->target) . '"' : '';
	        $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
	        $attributes .= (!empty( $item->url ) && !( $args->walker->has_children )) ? ' href="' . esc_attr($item->url) . '"' : '';
	        
	        $attributes .= ( $args->walker->has_children ) ? ' class="dropdown-btn d-flex align-items-center"' : ' ';
	        
	        $item_output = $args->before;

        	if ( $args->walker->has_children ) {
       			$item_output .= '<button '.$attributes.' >';
        	}else{
        		$item_output .= '<a' . $attributes . '>';
        	}
	        // $item_output .= ( $depth > 0 ) ? '<a ' . $attributes . '>' : '<a' . $attributes . '>';
	        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	        $item_output .= ( $args->walker->has_children ) ? '<i class="fa fa-caret-down ml-auto"></i></button>': '</a>';
	        $item_output .= $args->after;
	        
	        $output .= apply_filters ( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	    
	    }
	    
	}

	
	/**
	 * css enqueue files
	 */
	function theme_scripts()
	{	
		// Styles
		wp_enqueue_style( 'bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );
		wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.1.1/css/all.css' );

		// Fonts
		wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:400,600,700');
		wp_enqueue_style('googleFonts');
		
		wp_enqueue_style( 'style', get_stylesheet_uri(), array('bootstrap', 'googleFonts'), time() );

		// Javascript
		wp_enqueue_script( 'jquery_slim', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', '', '', true );
		wp_enqueue_script( 'popper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array ( 'jquery' ), ' ', true );
		wp_enqueue_script( 'bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array ( 'jquery' ), ' ', true );
	}

	add_action( 'wp_enqueue_scripts', 'theme_scripts' );




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
