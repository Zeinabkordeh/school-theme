<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Taze
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1><?php post_type_archive_title(); ?></h1>
			</header><!-- .page-header -->

            <?php 
            $args = array(
                'post_type'         => 'taze-student',
                'posts_per_page'    => -1,
                'tax_query'         => array(
                    'taxonomy' => ''
                )


                )
            ?>
			<?php
			/* Start the Loop */
            if(have_posts() ){
                    the_post();
    
                    /*
                     * Include the Post-Type-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', get_post_type() );
               
                wp_reset_postdata();
            }

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
