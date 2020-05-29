

<?php get_header(); ?>



<section id="banner" class="banner">
		<div class="container-fluid">
			<div class="row">
				
			<img src="<?php echo get_template_directory_uri();?>/images/bannerbg-ct.jpg">	
				
				
			</div>
		</div>
</section><!-- End of Banner Section -->




<section>
	
<div class="container">
<?php if(have_posts()): ?>

<div class="row">
	<?php while(have_posts()): the_post(); ?>
      <!-- Example row of columns -->
      

	        <div class="col-md-12">
	          <h3 class="col-txt"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

	          


	          



	          <p><?php the_content(); ?> </p>
	          
	        </div>

      
     <?php endwhile;  ?>
     
     </div> <!-- container -->
  <?php   else: ?>
	
<?php	endif;  ?>
</div>

</section>

<?php get_footer(); ?>