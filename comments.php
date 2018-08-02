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


<div id="coments">
    <h3 class="principal-title">COMENTARIOS</h3>
    <hr class="line-title">

    <?php if ( $comments && have_comments() ): ?>
			<?php foreach ($comments as $comment): ?> 
  
		    <div class="media py-3">
		    	<?php echo get_avatar( $comment->user_id, 64, '', $comment->comment_author, ['class' => 'mr-3 rounded-circle img-fluid'] ) ?>
		      <div class="media-body">
		        <h5 class="my-0"><?php comment_author(); ?></h5>
		        <p class="mt-0 mb-1 date text-muted">
		          	<small><?php echo get_comment_date(); ?></small>
		        </p>
		        <div class="the-coment">
					<?php echo $comment->comment_content; ?>
		        </div>
		      </div>
		    </div>
    
			<?php endforeach ?>
		<?php else: ?>
				
				No hay comentarios aún

		<?php endif ?>
		

    <div class="d-flex coment-form-container">
      <div class="flex-adjust"></div>
      <div class="flex-fill">
			<?php 
			$args = [
				'fields' 		=> [
									'author' => '<div class="form-group"><label for="nombre">Nombre*</label><input type="author"  name="author" class="form-control rounded-0" id="author" placeholder="" required></div>',
									'email' => '<div class="form-group"><label for="correo">Correo*</label><input type="email" name="email" class="form-control rounded-0" id="email" placeholder="nombre@ejemplo.com" required></div>',
									],
				'comment_field' => '<textarea name="comment" class="w-100" rows="7" required></textarea>',
				'class-form' 	=> '',
				'title_reply' 	=> 'Dejar un comentario',
				'title_reply' 	=> '<h5>Dejar un Comentario</h5>',
				'submit_button' => '<div class="d-flex mt-5 justify-content-end coment-by">
								          <div class="text-right">
								            <h6 class="mb-0 mt-1 mt-md-3">Comentar como '.$user_identity.'</h6>
								            <p><small><a href="'.wp_logout_url(  ).'">¿QUIERES SALIR?</a></small></p>
								          </div>
								          <div class="ml-3">
								            <img class="mr-3 rounded-circle" width="50px" height="50px" src="'.get_avatar_url(get_current_user_id()).'" alt="">
								          </div>
								          <div>
								            <button class="btn btn-lg rounded-0" type="submit" id="button-addon2">COMENTAR</button>
								          </div>
								        </div>',
				'logged_in_as'  => ' '

			];
			comment_form( $args ); 
			?>
    
      </div>
    </div>
  </div>
 	