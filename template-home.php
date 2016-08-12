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
			<?php
			// this while loop simply displays the text entered in the content box
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop
			wp_reset_postdata(); // resets Post Data
			?>

			<!-- this code is organizing the FlexSlider 2 Plugin and has been adapted 
			from the sample code provided on the slider site http://flexslider.woothemes.com/ -->
		    <div class="slider">
		      <div class="flexslider">
		        <ul class="slides">
		        	<?php
		        		// making new custom query that displays posts tagged 'featured'
		        		$my_query = new WP_Query(array( 'tag'=> 'featured', 'posts_per_page' => 4) );
		        		if ($my_query->have_posts()):
		        			while ($my_query->have_posts()): $my_query->the_post(); ?>
		        			<li>
		        				<!-- this shows the featured image of each post in the FlexSlider slider -->
		        				<?php the_post_thumbnail(); ?>
		        				<!-- this makes the slider image captions link to the full
		        				corresponding blog posts -->
		        				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		        					<p class="flex-caption"><?php the_title(); ?></p>
		        				</a>
		        			</li>
		        			<?php endwhile; wp_reset_postdata(); // resets Post Data
		        			endif; // ending the if-statement ?>
		        </ul>
		      </div>
		    </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();