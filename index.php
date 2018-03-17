<?php get_header( ); ?>

	<!-- Contendo -->
	<div class="container border mt-5 bg-white">
        <div class="row">
            <!-- Noticias -->
            <div class="col-12 col-lg-9 mb-md-5 mt-0 p-md-5">
                <h2 class="mt-4 w-100 coment-line"><b>Noticias Recientes</b></h2>


                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                	<div class="card mb-3 mt-5 mb-5 border-top-0 border-right-0 border-left-0 rounded-0">
	                  <a href="<?php the_permalink(); ?>">
	                  	<?php 

	                  		if ( has_post_thumbnail() ) {
	                  			the_post_thumbnail('post-notice',  array('class' => 'card-img-top img-fluid' ));
	                  		}

	                  	 ?>

	                  </a>
	                  <div class="card-body pl-0 pr-0">
	                    <a href="<?php the_permalink(); ?>">
	                    	<h5 class="card-title text-dark ml-1s"><?php the_title(); ?></h5>
	                    </a>
	                    <p class="card-text text-excerpt text-justify"><?php echo get_the_excerpt(); ?></p>
	                    <p class="card-text">
	                        <small class="text-muted">Publicado: <?php echo get_the_date(); ?> | </small> 
	                        <small class="text-muted"><?php comments_number(); ?></small>
	                    </p>
	                  </div>
	                </div>
                    <?php paginate_links(  ); ?>
                <?php endwhile; endif; ?>


                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">

                    <?php 
                        the_posts_pagination( array(
                            'mid_size'           => 2,
                            'screen_reader_text' => __( ' ' ),
                        ) );
                    ?>

                    </ul>
                </nav>

            </div>
            <!-- #Noticias -->

            
            <?php get_sidebar(); ?>
            
        </div>
   </div>
	<!-- Contendo -->



<?php get_footer( ); ?>
