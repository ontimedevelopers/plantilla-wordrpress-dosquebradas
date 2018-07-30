<?php echo get_header( ); ?>
  
  <!-- Post -->
    <div class="container mt-2 mt-sm-3 mt-lg-5" id="content">
      <div class="row">

        <div class="col-lg-9 post-column d-flex align-items-stretch">
          <div class="row">
            <div class="col bg-white float-column px-3 px-md-5 py-5">
                <h3 class="principal-title">NOTICIAS RECIENTES</h3>
                <hr class="line-title">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                  <div class="card text-center mt-5">
                    <div class="card-header border-0 p-0 text-left">
                      <a href="<?php the_permalink(); ?>">
                        <h4 class="m-0"><?php the_title(); ?></h4>
                      </a>
                      <span>
                        <i class="far fa-calendar-alt ml-1"></i> Publicado el <?php echo get_the_date(); ?>
                      </span> | 
                      <span>
                        <i class="far fa-comments"></i> <?php comments_number(); ?>
                      </span>
                    </div>
                    <a  href="<?php the_permalink(); ?>">
                        <?php 

                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail('large',  array('class' => 'card-img-top img-fluid mt-3' ));
                            }

                         ?>
                    </a>
                    <div class="card-body px-0 px-md-2 pt-3 pb-2">
                      <p class="card-text">
                       <?php echo get_the_excerpt(); ?>
                      </p>
                      <a href="<?php the_permalink(); ?>" class="btn btn-primary mb-2">
                        LEER MÁS
                      </a>
                    </div>
                  </div>
                <?php endwhile; endif; ?>
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

<?php echo get_footer( ); ?>
