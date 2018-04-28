<?php
/*
Template Name: Estrategias
*/

	get_header(  );

	$temp = $wp_query;
	$wp_query = null;

		$args = array(
	
			// Choose ^ 'any' or from below, since 'any' cannot be in an array
			'post_type' => array(
				'estrategias',
			),
	
			'post_status' => array(
				'publish',
			),
	
		);
	
	$wp_query = new WP_Query( $args );
	

?>

	<!-- Content -->
   <div class="container border mt-5 bg-white">
       <div class="row mt-5">
           <div class="col-12 col-lg-9 mb-5 mt-0 p-md-5">
                <h3 class="w-100 coment-line mb-1">Estrategias</h3>
                <h4 class="mb-5">
                    <small class="text-muted">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id erat lobortis, elementum mi sit.    
                    </small>
                </h4>

				<?php if ( $wp_query->have_posts() ): ?>


					<?php while ( have_posts() ) : the_post(); ?>
					<!-- post -->
	                	<div class="row mb-5 pr-3">
	                  
		                  	<div class="col-12 col-md-4 text-center p-2">
		                    	<img class="img-fluid mr-0 mr-md-3" src="<?php the_field('imagen_destacada') ?>" alt="<?php the_field('titulo_estrategia'); ?>">
		                  	</div>

		                  	<div class="col-12 col-md-8 mt-4 mt-md-0 p-5 p-md-2">
			                    <h5><?php the_field('titulo_estrategia'); ?></h5>

			                    <p class="text-justify" style="line-height: 1.2;">
			                            <?php the_field('descripcion'); ?>
			                    </p>
			                    
		                  	</div>
		                </div>
					<?php endwhile; ?>

				<?php endif ?>

           </div>

           <?php get_sidebar(  ); ?>

       </div>
   </div>
   <!-- #Content -->



<?php get_footer(  ); ?>