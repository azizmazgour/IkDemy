<article class="coaches" >
	<div class="container">
		<h2><span>Formations</span></h2>	

		<div class="row">

			<?php    
			    $args = array(
			      //'post_type' => 'maz-slider',
			      'post_type' => 'post',
      			  'posts_per_page' => 3,
			      'orderby' => 'menu_order',
			      'order' => 'ASC'
			      );
			    $slider_query = new WP_Query($args);

  					if($slider_query->have_posts()): 
					while ($slider_query->have_posts()): $slider_query->the_post(); ?>

				<!-- Coach Modal -->
		<div class="modal fade" id="<?php the_ID(); ?>" tabindex="-1" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title"><?php the_title(); ?></h4>
		      </div>
		      <div class="modal-body">
		      <figure>
		      	<?php the_post_thumbnail('full',  array( 'class' => 'img-fluid' ));?>
		      </figure>
		      <p> <?php echo wp_get_attachment_image( $slider_query->ID, 'full' ); ?>
		      	<div style="color:#000;"><?php the_content(); ?></div>
		      </p>
		      </div>
		    </div>
		  </div>
		</div> <!-- Fin Coach Modal -->
        
						<div class="col-sm-6 col-md-4 animated" data-animation="bounceIn" data-animation-delay="200">
							<div class="coaches-item">
								<figure class="item-thumbnail">
									<?php the_post_thumbnail('full',  array( 'class' => 'img-fluid' ));?>
									<span class="overthumb"></span>
									<div class="icons">
										<a href="index.html#<?php the_ID(); ?>" data-toggle="modal">Lire plus</a>
									</div>
								</figure>
								<h5><?php the_title(); ?></h5>
						
							<span><?php the_content(); ?></span>
						
							</div>
						</div>

    				<?php 
    				endwhile; wp_reset_postdata();
							endif; ?>
		</div>
		
		</div>
			<div class="clearfix"></div>
	</div>
</article>
