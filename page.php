<?php get_header(); ?>

	<!-- Content -->
   	<div class="container border mt-5 bg-white">
       	<div class="row">
           	<div class="col-12 col-md-9 mb-5 mt-0 p-md-5">

           		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                	<h3 class="w-100 coment-line mb-5 mt-4"><?php the_title(); ?></h3>
                	<p class="text-justify"><?php the_content(); ?></p>
           		<?php endwhile; ?>
           		<?php endif; ?>

           	</div>

           	<?php get_sidebar(  ); ?>

       	</div>
   </div>
   <!-- #Content -->


<?php get_footer(); ?>