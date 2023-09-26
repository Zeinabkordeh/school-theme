<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Taze
 */

get_header();
?>

	<main id="primary" class="site-main">

<?php
/*
Template Name: Single Taze Student Template
*/

while (have_posts()) : the_post();

    // Get student's information
    $student_name = get_the_title();
    $student_link = get_permalink();

    // Output student information for single student post
    ?>
    <div class="student-entry">
        <h2><?php echo esc_html($student_name); ?></h2>
        <div class="student-thumbnail">
            <?php the_post_thumbnail('student') ?>
        </div>
        <div class="student-content">
            <p><?php echo esc_html(the_content()); ?></p>
        </div>
    </div>
    <?php

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'taze' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'taze' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
