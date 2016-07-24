<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Seattle
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div id="post-wrapper">
                <div class="gallery-wrapper">
                <div class="gallery-sizer col-xs-6 col-sm-6 col-md-1"></div>

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<h1 class="sr-only"><?php single_post_title(); ?></h1>
			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
                get_template_part( 'template-parts/content-grid-item' );
			endwhile;
		    else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
        </div>
        </div>

        <?php seattle_paging_nav(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
