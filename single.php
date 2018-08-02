<?php get_header(); ?>


  <!-- Post -->
    <div class="container mt-2 mt-sm-3 mt-lg-5" id="content">
      <div class="row">

        <div class="col-lg-9 post-column ob-single d-flex align-items-stretch">
          <div class="row w-100">
            <div class="col bg-white float-column px-2 px-md-5 py-5" id="the_post">


              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="card text-center the-post-card mb-5">
                  <div class="card-header border-0">
                    <h2 class="mb-0 text-uppercase">
                      <?php the_title(); ?>
                    </h2>
                    <span>
                      <i class="far fa-calendar-alt ml-1"></i> Publicado el <?php echo get_the_date(); ?>
                    </span> | 
                    <span>
                      <i class="far fa-comments"></i> <?php comments_number(); ?>
                    </span>
                  </div>
                
                  <div class="card-body text-left px-0">
                    <?php the_content(); ?>
                   </div>
                </div>

              <?php endwhile; ?>
              <?php endif; ?>


              <!-- // If comments are open or we have at least one comment, load up the comment template. -->
              <?php 
                if ( comments_open() || get_comments_number() ) :
                  comments_template();
                endif;
              ?>
              
            </div> 
          </div>
        </div>

        <?php get_sidebar(  ); ?>

      </div> <!-- Row -->
    </div>
  <!-- Post -->


<?php get_footer(); ?>
