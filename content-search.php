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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header mt-5">
		<?php the_title( sprintf( '<h5 class="entry-title"><a href="%s" class="text-success" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<hr>

</article><!-- #post-## -->
