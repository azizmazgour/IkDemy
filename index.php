<?php get_header(); ?>

		<section>
			
			<?php get_template_part( 'wp-laune' ); ?>
			<!-- end Home -->

			<!-- begin domaine de formation -->
			<?php get_template_part( 'wp-domaine-formation' ); ?>
			<!-- end domaine de formation -->

			<!-- begin nos formation -->
			<?php get_template_part( 'wp-nos-formation' ); ?>
			<!-- end nos formation -->

			<!-- begin formation -->
			<?php get_template_part( 'wp-formation' ); ?>
			<!-- end formation -->

			<!-- begin programme -->
			<?php get_template_part( 'wp-notre-equipe' ); ?>
			<!-- end programme -->

			<!-- begin Pricing -->
			<?php get_template_part( 'wp-nos-service' ); ?>
			<!-- end Pricing -->

			<?php //get_template_part( 'wp-galerie' ); ?>

			<!-- begin Patners -->
			<article class="patners" id="contact">
			<div class="container">
				<?php echo do_shortcode('[tc-logo-slider]'); ?>
				
			</div>
			</article>
			<!-- end Patners -->

			<!-- begin Contact -->
			<article class="contact" >
				<div class="contact-info">
					<div class="animated" data-animation="fadeInLeft" data-animation-delay="400">
						
					<h2>Let’s talk</h2>
					<address>
						<p><i class="icon-location"></i> 185, Boulvard Abdelmoumen Residence Walili Parc 
															ESC1, 6 eme etgae N 20, Casablanca</p>
						<p><i class="icon-phone"></i> +212 05 22 29 40 03</p>
						<p><i class="icon-phone"></i> +212 07 07 70 17 06</p>
						<p><i class="icon-mail"></i> contact@ikdemy.ma</p>
					</address>
					</div>
				</div>
				<div class="map" >
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3324.1764567305204!2d-7.627827049751805!3d33.574767450094335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7d2ba5aa974fb%3A0xda7ac220155361a1!2sSmarktic+-+Agence+Digitale!5e0!3m2!1sfr!2sma!4v1533656405609" width="100%" height="390" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</article>
			<!-- end Contact -->
		</section>
		<!-- end Content -->

<?php get_footer();?>
		