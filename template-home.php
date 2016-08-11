<?php
/**
 * The template for displaying the custom home page.
 *
 * Template Name: Custom Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CustomTheme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		    <section class="slider">
		      <div class="flexslider">
		        <ul class="slides">
		          <li>
			    	    <img src="<?php echo get_template_directory_uri() ?> /img/Sketch1.jpg" />
			    		</li>
			    		<li>
			    	    <img src="<?php echo get_template_directory_uri() ?> /img/Sketch2.jpg" />
			    		</li>
			    		<li>
			    	    <img src="<?php echo get_template_directory_uri() ?> /img/Sketch3.jpg" />
			    		</li>
			    		<li>
			    	    <img src="<?php echo get_template_directory_uri() ?> /img/Sketch4.jpg" />
			    		</li>
		        </ul>
		      </div>
		    </section>


			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();