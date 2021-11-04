<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Markup
 */

get_header();
?>
<section id="content" class="site-content posts-container">
	<div class="container">
		<div class="row">	
			<div class="archive-heading">
				<?php
				the_archive_title( '<h1 class="archive-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</div>

			<div class="breadcrumbs-wrap">
				<?php do_action('markup_breadcrumb_options_hook'); ?> <!-- Breadcrumb hook -->
			</div>
			<div id="primary" class="col-md-8 col-lg-9 col-xs-12 content-area mx-auto">
				<main id="main" class="site-main">
					<?php if ( have_posts() ) : ?>

						<?php

						/* Masonry Start Section */
						do_action('markup_masonry_start_hook'); 

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					/* Masonry end Section */
					do_action('markup_masonry_end_hook');

					/**
		             * markup_action_navigation hook
		             * @since Markup 1.0.0
		             *
		             * @hooked markup_action_navigation -  10
		             */
					do_action( 'markup_action_navigation');

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
				
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
</div>
</section>

<?php get_footer();
