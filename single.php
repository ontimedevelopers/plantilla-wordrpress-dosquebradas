<?php get_header(); ?>

	<!-- Content -->
   <div class="container border mt-5 bg-white">
       <div class="row m-0 mt-3 mb-4">
           <div class="col-12 col-md-9 content-post mb-md-5 mt-0 p-md-5">

           		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                	<h2 class="mt-4 w-100 coment-line"><b>	<?php the_title(); ?> </b></h2>
           			  <!-- <h4 class="excerpt-notice">
	                    <small class="text-muted">
                        <?php echo get_the_excerpt(); ?>
                      </small>
	                </h4> -->

	                <h5 class="mb-4">
	                	<small class="text-muted">
                        Publicado: <?php echo get_the_date(); ?> | <?php comments_number(); ?>  
	                	</small>
	                </h5>

	                <?php the_content(); ?>

           		<?php endwhile; ?>
           		<?php endif; ?>

                
                <hr class="mt-4 mb-1">
                <hr class="mt-0 mb-5">


           		<!-- // If comments are open or we have at least one comment, load up the comment template. -->
           		<?php 
           			if ( comments_open() || get_comments_number() ) :
      					    comments_template();
      					endif;
           		?>

           </div>

           <?php get_sidebar(  ); ?>

       </div>
   </div>
   <!-- #Content -->

<?php get_footer(); ?>