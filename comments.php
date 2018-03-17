<?php

/**
 * Plantilla para mostrar comentarios
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Dosquebradas
 * @since Dosquebradas 1.0
 */



//Get only the approved comments of actual post
$get_post = get_post();
$args = array(
    // 'status' => 'approve',
    'post_id' => $get_post->ID,
);
 
// The comment Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );
// var_dump($comments);
 
// Comment Loop
?>
	<!-- Coments -->
    <div class="row coment-container mt-2">
    	<h4 class="m-2 coment-line w-100">Comentarios</h4>   

		<?php if ( $comments && have_comments() ): ?>
			<?php foreach ($comments as $comment): ?> 

		        <div class="card p-2 border-top-0 border-left-0 border-right-0 rounded-0 w-100">
		            <div class="card-body">
		                <div class="media">
		                	<?php echo get_avatar( $comment->user_id, 64, '', $comment->comment_author, ['class' => 'mr-3'] ) ?>
		                  <div class="media-body">
		                    <h6 class="mt-0 mb-0"><?php comment_author(); ?></h6>
		                    <h6><small><?php echo get_comment_date(); ?></small></h6>
		                    <p>
		                    	<?php echo $comment->comment_content; ?>
		                    </p>
		                    <div>
		                    	<?php get_comment_reply_link(); ?>
		                    </div>
		                  </div>
		                </div>
		            </div>
		        </div>  

			<?php endforeach ?>
		<?php else: ?>
			<div class="card p-4 border-top-0 border-left-0 border-right-0 rounded-0 w-100">
	            <div class="card-body">
	                <div class="media">
	                  	<div class="media-body">
	                    	<p class="w-100">
	                    		No hay comentarios aún
	                    	</p>
	                  	</div>
	                </div>
	            </div>
	        </div>  
		<?php endif ?>

		<div class="row mb-5 p-3 w-100">
			<?php 
			$args = [
				'fields' 		=> [
									'author' => '<div class="form-group"><label for="nombre">Nombre*</label><input type="author"  name="author" class="form-control rounded-0" id="author" placeholder="" required></div>',
									'email' => '<div class="form-group"><label for="correo">Correo*</label><input type="email" name="email" class="form-control rounded-0" id="email" placeholder="nombre@ejemplo.com" required></div>',
									],
				'comment_field' => '<div class="form-group"><label for="comentarios">Comentario*</label><textarea name="comment" class="form-control rounded-0" id="comentarios" rows="7" required></textarea></div>',
				'class-form' 	=> 'w-100 p-2',
				'title_reply' 	=> 'Deja un comentario',
				'title_reply' 	=> '<h4 class="mt-5 mb-4 w-100 coment-line">Deja un Comentario</h4>',
				'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="btn btn-success rounded-0 float-right mt-4" value="Dejar Comentario" />',
				'logged_in_as'  => '<p class="logged-in-as"><small>' . sprintf(
                                      /* translators: 1: edit user link, 2: accessibility text, 3: user name, 4: logout URL */
                                      __( '<a class="text-dark" href="%1$s" aria-label="%2$s">Conectado como %3$s</a>. <a class="text-dark" href="%4$s">¿Quieres Salir?</a>' ),
                                      get_edit_user_link(),
                                      /* translators: %s: user name */
                                      esc_attr( sprintf( __( 'Conectado como %s. Editar tu perfil.' ), $user_identity ) ),
                                      $user_identity,
                                      wp_logout_url(  )
                                  ) . '</small></p>'

			];
			comment_form( $args ); 
			?>
    	</div>

    </div>
	<!-- #Coments -->

