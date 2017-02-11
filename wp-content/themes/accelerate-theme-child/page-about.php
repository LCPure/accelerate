<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?>
    <div class="after-top">
	  <p>Accelerate is a strategy and marketing agency located in the heart of NYC. 
	     Our goal is to build businesses by making our clients visible and
		 making their customers smile.</p>
    </div>
	
    <?php  $size = "medium" ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); 
			  $image_content_strategy = get_field('image_content_strategy');
			  $image_influence_map = get_field('image_influence_map');
			  $image_social_media = get_field('image_social_media');
			  $image_design_development = get_field('image_design_development');
			?>
			   		  
            <?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
            <h2 class="rowhead1">Content Strategy</h2>
		  <div class="row1">
		      <?php if(image_content_strategy) { ?>
              <figure class="images-about">
			    <?php echo wp_get_attachment_image( $image_content_strategy, $size); ?>
			    <?php } ?>
			  </figure>
			  <p>We have developed a process for generating content that will attract your audience.
			  There will be in depth research of the needs and influences of your particular market. 
			  We will then craft a strategy that will contain text, visuals, and video to convey this message.</p>
		  </div>
		  
          <h2 class="rowhead2">Influencer Mapping</h2>
          <div class="row2">
		     <p>We have developed a process for generating content that will attract your audience. 
			 There will be in depth research of the needs and influences of your particular market. 
			 We will then craft a strategy that will contain text, visuals, and video to convey this message.</p>
             <?php if(image_influence_map) { ?>
			 <figure class="images-about">
               <?php echo wp_get_attachment_image( $image_influence_map, $size); ?>
			   <?php } ?>
			 </figure>
			 
		 </div>
		 
		 <h2 class="rowhead3">Social Media Strategy</h2>
		 <div class="row3">
             	  
			 <?php if(image_social_media) { ?>
			 <figure class="images-about">
               <?php echo wp_get_attachment_image( $image_social_media, $size); ?>
			   <?php } ?>
			 </figure>
			 <p>We have an integrated approach to Social Media. We will connect your website to
			    Facebook, Twitter and Linkedin. You will be able to send your blog posts directly to
				social nedia. Social media will be used to direct your customers to your website for
				more detailed information</p>
		 </div>
		 <h2 class="rowhead4">Design & Development</h2>
		 <div class="row4">
             <p>We will design your website and social media needs around around your market.
			 Our design process will be documented each step of the way. 
			 We have a lot of experience with product design and software design cycles. 
			 We use the Phase Gate Product Development process to verify our designs meet your requirements.</p>	  
			 <?php if(image_design_development) { ?>
			 <figure class="images-about">
               <?php echo wp_get_attachment_image( $image_design_development, $size); ?>
			   <?php } ?>
			 </figure>
			 
		 </div>
		 <hr />
		  <div class="row5">
		       <h2 class="bang">Interested in working with us?</h2>
			   <p class="select-buy"><a  href="http://localhost:9893/contact-us/">Contact Us</a></p>
		  </div> 	          	  
		  <hr />
		 	   		   	   
		</div><!-- #content -->
		
				
	</div><!-- #primary -->
   

<?php get_footer(); ?>