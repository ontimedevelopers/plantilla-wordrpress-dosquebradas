<?php
/*
Template Name: Estadisticas
*/

	get_header(  );

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
	
		);
	
	$wp_query = new WP_Query( $args );
	
?>


  <!-- Content -->
   <div class="container border mt-5 bg-white">
       <div class="row">
           <div class="col-12 col-md-9 mb-5 mt-0 p-md-5">
                <h3 class="mt-4 w-100 coment-line mb-3">Estadísticas</h3>

                <div class="card rounded-0 border-0 mt-5 pt-3">
				  	<div class="card-header bg-dark text-white">
				    	Consulta de manera cronológica los balances delictivos y operativos del municipio de Dosquebradas
				  	</div>
				  	<div class="card-body pr-0 pl-0">
				    	<table class="table table-bordered">
						  	<caption>Estadisticas delitos en Dosquebradas - Risaralda</caption>
							<tbody>

								<?php if ( $wp_query->have_posts() ): ?>

									<?php while ( have_posts() ) : the_post(); ?>

										<?php 
											$extension = substr(get_field('documento'), -4);
											if ( $extension == '.xls' || $extension == 'xlsx' ) {
												$img = '/images/xls.png';
											}else{
												$img = '/images/pdf.png';
											}
										?>

									    <tr>
									      	<td class="align-middle p-1">
									      		<div class="media">
												  <img class="align-self-center mr-3 img-fluid" width="40" src="<?php bloginfo('template_directory') ?><?php echo $img; ?>" alt="<?php echo $extension; ?>">
												  <div class="media-body pt-2">
												    <span class="align-middle">
												    	<?php the_field('titulo'); ?>
												    </span>
												  </div>
												</div>
									      	</td>
									      	<td class="align-middle text-center p-1">
									      		<?php echo get_the_date( ); ?>
									      	</td>
									      	<td class="text-center p-1">
									      		<a target="_blank" class="text-success" href="<?php the_field('documento'); ?>">
									      			<i class="fa fa-download" aria-hidden="true"></i>
									      			<br>Descargar
									      		</a>
									      	</td>
									    </tr>
									<?php endwhile; ?>

								<?php endif ?>
							</tbody>
						</table>
				  	</div>
				</div>
           </div>
				  	<?php get_sidebar(  ); ?>
           
       </div>
   </div>
   <!-- #Content -->


<?php get_footer(); ?>