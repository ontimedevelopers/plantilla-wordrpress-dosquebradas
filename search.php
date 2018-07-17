<?php get_header(); ?>
	
	<!-- Contendo -->
	<div class="container border mt-5 bg-white">
        <div class="row">
			
            <div class="col-12 col-lg-9 mb-5 mt-0 p-md-5">
            	<h2 class="mt-4 w-100 coment-line">
            		<b>
            			<?php 
            				printf( __( 'Resultados de Busqueda para: %s', 'dosquebradas' ), get_search_query() );
            			?>
            		</b>
            	</h2>

				<?php 

					if ( have_posts() ): 

						while ( have_posts() ) : the_post(); 
                            get_template_part( 'content', 'search' );
						endwhile;

					else: 
				?>

                	<p class="text-justify mt-5">
                		No se han encontrado resultados
                	</p>
                	
                <?php endif; ?>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center mt-5">

                    <?php 
                        the_posts_pagination( array(
                            'mid_size'           => 2,
                            'screen_reader_text' => __( ' ' ),
                        ) );
                    ?>

                    </ul>
                </nav>

            </div>

            <?php get_sidebar(); ?>

        </div>
    </div>

<?php get_footer(); ?>