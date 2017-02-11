<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Where is this website', 'Accelerate' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
				    <h2><?php _e( 'It looks like the web address was entered incorrectly?', 'accelerate' ); ?></h2>
					<p><?php _e( 'Maybe the website moved. Maybe try a search?', 'accelerate' ); ?></p>
				    <a href="http://localhost:9893/wp-content/uploads/2017/02/lost.jpg">
					<img class="alignnone size-medium wp-image-47400" src="http://localhost:9893/wp-content/uploads/2017/02/lost-300x223.jpg" alt="" width="700" height="400" /></a>
					
					<h2><?php _e( 'Have you gone to the Dark Side?', 'accelerate' ); ?></h2>
					<a href="http://localhost:9893/wp-content/uploads/2017/02/Darth-Vader_6bda9114.jpeg">
					<img src="http://localhost:9893/wp-content/uploads/2017/02/Darth-Vader_6bda9114-300x168.jpeg" alt="" width="700" height="400" class="alignnone size-medium wp-image-47402" /></a>
					<br />
					<br />
					<?php get_search_form(); ?>
					
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>