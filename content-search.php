<?php
/**
 * Plantilla para mostrar busquedas
 *
 *
 * @package WordPress
 * @subpackage Dosquebradas
 * @since Dosquebradas Template 1.0
 */
?>

  <div id="post-<?php the_ID(); ?>"  class="media my-4" <?php post_class(); ?>>
  	<?php 
			if ( has_post_thumbnail() ) {
  			the_post_thumbnail('medium',  array('class' => 'img-fluid mr-2', 'width' => '300px' ));
  		}
		?>
    <div class="media-body">
      <h5 class="mt-0"><?php the_title(); ?></h5>
      <p>
        <?php the_excerpt(); ?>
      </p>
      <div class="text-right">
        <a href="<?php the_permalink(); ?>" type="button" class="btn">LEER MÁS</a>
      </div>
    </div>
  </div>