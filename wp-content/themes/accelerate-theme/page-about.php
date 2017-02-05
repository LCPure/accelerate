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
    <?php  $size = "medium" ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); 
			  $content_strategy = get_field('content_strategy');
			  $influencer_mapping = get_field('influencer_mapping');
			  $social_media_strategy = get_field('social_media_strategy');
			  $design_and_development = get_field('design_and_development');
			  $image_content_strategy = get_field('image_content_strategy');
			  $image_influence_map = get_field('image_influence_map');
			  $image_social_media = get_field('image_social_media');
			  $image_design_development = get_field('image_design_development');
			?>
			   		  
            <?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
          
		  <div class="row1">
		      <p><?php echo $content_strategy; ?></p>
			  <?php if(image_content_strategy) { ?>
              <figure class="images-about">
			    <?php echo wp_get_attachment_image( $image_content_strategy, $size); ?>
			    <?php } ?>
			  </figure>
		  </div>

          <div class="row2">
             <?php if(image_influence_map) { ?>
			 <figure class="images-about">
               <?php echo wp_get_attachment_image( $image_influence_map, $size); ?>
			   <?php } ?>
			 </figure>
			 <p><?php echo $influencer_mapping; ?></p>
		 </div>
		 
		 <div class="row3">
             <p><?php echo $social_media_strategy; ?></p>	  
			 <?php if(image_social_media) { ?>
			 <figure class="images-about">
               <?php echo wp_get_attachment_image( $image_social_media, $size); ?>
			   <?php } ?>
			 </figure>
		 </div>
		 
		 <div class="row4">
             	  
			 <?php if(image_design_development) { ?>
			 <figure class="images-about">
               <?php echo wp_get_attachment_image( $image_design_development, $size); ?>
			   <?php } ?>
			 </figure>
			 <p><?php echo $design_and_development; ?></p>
		 </div>
				   
		</div><!-- #content -->
		
	</div><!-- #primary -->


<?php get_footer(); ?>