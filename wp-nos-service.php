<article class="pricing arrow" id="pricing">
	<div class="container">
			<h2>NOS <span> SERVICES</span></h2>
				
		<div class="row">

			<?php    
			    $args = array(
			      'post_type' => 'MAZ-service',
			      'postes_per_page' => -1,
			      'orderby' => 'menu_order',
			      'order' => 'ASC'
			      );
			    $slider_query = new WP_Query($args);

  					if($slider_query->have_posts()): 
					while ($slider_query->have_posts()): $slider_query->the_post(); ?>

			<!-- Loop -->
			<div class="col-sm-6 col-md-3 animated" data-animation="flipInY" data-animation-delay="200" >
				<ul class="pricing-item" >
					<li><small><span><?php the_title(); ?></span></small></li>
					<li style="min-height: 222px;"> <?php the_content(); ?></li>
					<li><a href="index.html#" class="btn">Voire Plus</a></li>
				</ul>
			</div>
			<!-- Fin Loop -->

			<?php 	endwhile; wp_reset_postdata();
					endif; ?>
		</div>
			<div id="gallery"></div>
	</div>
		
</article>