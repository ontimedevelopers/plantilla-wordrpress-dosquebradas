

	<!-- Aside -->
    <div class="col-12 col-lg-3 border border-secondary border-top-0 border-bottom-0 border-right-0 mb-5 mt-md-5 pb-5 pr-md-4" >


    	<!-- Search Form -->
	    <form class="mt-5" action="<?php echo get_home_url(); ?>" method="get">                      
    		<h4 class="mb-3" style="border-bottom: 2px solid black">Buscar</h4>
	        <div class="input-group p-0 ">
	            <input type="text" name="s" class="form-control w-100 border border-dark rounded-0 h-5" placeholder="Palabra clave"  value="<?php the_search_query(); ?>" required>
	            <span class="input-group-btn">
	              <button type="submit" class="btn btn-dark rounded-0" type="button">Buscar</button>
	            </span>
	        </div>
	    </form>
    	<!-- Search Form -->
    	
    	<br><br>

    	<!-- Enlaces -->
    	<h4 class="mb-3" style="border-bottom: 2px solid black">Enlaces</h4>

		<div class="row text-center pr-0 pl-1 w-100 ml-1">
			<a href="http://www.dosquebradas.gov.co/web/" target="_blank" class="w-100" title="Alcaldia Dosquebradas | Risaralda">
				<img width="200px" class="img-fluid mx-auto" src="<?php bloginfo('template_directory') ?>/images/logo-sidebar.png">
			</a>
		</div>

		<div class="row text-center pr-0 pl-1 w-100 ml-1">
			<a href="https://play.google.com/store/apps/details?id=com.policia.polis&hl=es" target="_blank" class="w-100" title="App Polis">
				<img width="180px" class="img-fluid mx-auto" src="<?php bloginfo('template_directory') ?>/images/polis.png">
			</a>
		</div>

		<div class="row text-center pr-0 pl-1 w-100 ml-1 pt-4">
			<a href="https://www.policia.gov.co/sites/default/files/ley-1801-codigo-nacional-policia-convivencia.pdf" target="_blank" class="w-100" title="Codigo de Policia">
				<img width="210px" class="img-fluid mx-auto" src="<?php bloginfo('template_directory') ?>/images/codigo-policia.png">
			</a>
		</div>

		<div class="row text-center pr-0 pl-1 w-100 ml-1 pt-4 mt-1">
			<a href="http://www.dosquebradas.gov.co/web/index.php/atencion-al-ciudadano/buzon-de-pqrs/buzon-de-pqr-2" target="_blank" class="w-100" title="PQRS - Alcaldia Dosquebradas | Risaralda">
				<img width="180px" class="img-fluid mx-auto" src="<?php bloginfo('template_directory') ?>/images/pqrs.png">
			</a>
		</div>
    	<!-- #Enlaces -->
    	
    	<!-- Widget -->
    	<h4 class="mt-5" style="border-bottom: 2px solid black">Visitantes</h4>

		<div class="row p-2">
			
	    <?php if ( is_active_sidebar( 'lateral' ) ) : ?>
			<?php dynamic_sidebar( 'lateral' ); ?>
		<?php endif; ?>

		</div>
    	<!-- #Widget -->

		

    </div>
    <!-- #Aside -->