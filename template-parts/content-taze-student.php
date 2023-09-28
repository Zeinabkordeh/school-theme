<?php
/*
Template Name: Student List Template
*/

get_header();
?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>
    <h2><?php echo esc_html(the_title()); ?></h2>
    <div class="student-thumbnail">
        <?php the_post_thumbnail('student'); ?>
    </div>
    <div class="student-content">
        <p><?php the_content(); ?></p><br>          
    </div>
</article>


<?php

    the_post_navigation(
		array(
			'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'taze' ) . '</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'taze' ) . '</span> <span class="nav-title">%title</span>',
		)
	);

get_footer();
?>
