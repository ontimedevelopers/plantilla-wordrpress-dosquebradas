<?php
/*
Template Name: Estadisticas
*/
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; /* check what page it's on*/
	get_header(  );
 	wp_reset_query(  );
	$temp = $wp_query;
	$wp_query = null;


		$args = array(
	
			// Choose ^ 'any' or from below, since 'any' cannot be in an array
			'post_type' => array(
				'estadisticas',
			),
	
			'post_status' => array(
				'publish',
			),

			'posts_per_page' => 20,
    		'paged'=> $paged, 

		);
	
	$wp_query = new WP_Query( $args );
	
?>


  <!-- Post -->
    <div class="container mt-2 mt-sm-3 mt-lg-5" id="content">
      <div class="row">

        <div class="col-lg-9 post-column d-flex align-items-stretch">
          <div class="row">
            <div class="col bg-white float-column px-3 px-md-5 py-5" id="estadisticas">
              
              <h3 class="principal-title">ESTADISTICAS</h3>
              <hr class="line-title">

              <h6 class="description mt-3 mb-4">
                Consulta de manera cronológica los balances delictivos y operativos del municipio de Dosquebradas
              </h6>
              
					<?php if ( $wp_query->have_posts() ): ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php 
								$extension = substr(get_field('documento'), -4);
								if ( $extension == '.xls' || $extension == 'xlsx' ) {
									$img = '/images/format-xls.png';
									$alt = 'Excel';
								}else{
									$img = '/images/format-pdf.png';
									$alt = 'pdf';
								}
							?>
							
		              <div class="media border d-flex my-2">
		                <img class="mr-3 align-self-center" src="<?php bloginfo('template_directory') ?><?php echo $img; ?>" width="50px" alt="<?php echo $alt; ?>">
		                <div class="media-body d-flex">
		                  <div class="flex-grow-1 align-self-center">
		                    <h5 class="my-0"><?php the_field('titulo'); ?></h5>
		                    <p class="my-0 text-muted">Fecha: <?php echo get_the_date( ); ?></p>
		                  </div>
		                  <div class="download align-slef-center">
		                    <a target="_blank" href="<?php the_field('documento'); ?>" type="button" class="btn h-100 px-4">
		                      <i class="fas fa-download"></i> <br>
		                      <span>Descargar</span>
		                    </a>
		                  </div>
		                </div>
		              </div>

						<?php endwhile; ?>
					<?php endif ?>
              
              
              <!-- Pagination -->
                <?php 


              		if (function_exists("fellowtuts_wpbs_pagination"))
						{
						    fellowtuts_wpbs_pagination();
						    //fellowtuts_wpbs_pagination($the_query->max_num_pages);
						}

						wp_reset_postdata();
						
                ?>
              <!-- Pagination -->


            </div> 
          </div>
        </div>
        
        <?php get_sidebar(); ?>

      </div> <!-- Row -->
    </div>
  <!-- Post -->


<?php get_footer(  ); ?>