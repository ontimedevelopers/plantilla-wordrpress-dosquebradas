<?php get_header(); ?>


  <!-- Post -->
    <div class="container mt-2 mt-sm-3 mt-lg-5" id="content">
      <div class="row">

        <div class="col-lg-9 post-column d-flex align-items-stretch">
          <div class="row">
            <div class="col bg-white float-column px-3 px-md-5 py-5" id="search_post">
              
              <h3 class="principal-title">RESULTADOS DE BUSQUEDA</h3>
              <hr class="line-title">

              <p class="text-muted text-right searched mb-3">
                <?php 
                  printf( __( 'Resultados para: "%s"', 'dosquebradas' ), get_search_query() );
              ?>
              </p>

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

              <?php 
                if (function_exists("fellowtuts_wpbs_pagination"))
                  {
                    fellowtuts_wpbs_pagination();
                    //fellowtuts_wpbs_pagination($the_query->max_num_pages);
                  }
              ?>

            </div> 
          </div>
        </div>
        
        <?php get_sidebar(); ?>
        
      </div> <!-- Row -->
    </div>
  <!-- Post -->


<?php get_footer(); ?>
