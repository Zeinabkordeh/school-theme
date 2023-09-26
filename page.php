<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Taze
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	<?php
	$args = array(
		'post_type' => 'post',       
		'posts_per_page' => 3,      
		'ignore_sticky_posts' => 1, 
	);

	$recent_posts = new WP_Query($args);

	if ($recent_posts->have_posts() && is_front_page()) :
	?>

	<h2>Recent News</h2>
	<div class="recent-posts">
		<?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
			<div class="post">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?>
					</a>
				</h3>
			</div>
		<?php endwhile; ?>
	</div>

	<?php
	wp_reset_postdata();
	endif;
	?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
