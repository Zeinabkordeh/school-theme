<?php
/*
Template Name: Student List Template
*/

get_header();
?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>
    <h1 class ="student-title"><?php echo esc_html(the_title()); ?></h1>
 
    <div class="student-content">
        <?php 
        if(is_singular()) :
           the_post_thumbnail('single-student'); 
        else :
            the_post_thumbnail('student-portrait');
        endif;
        ?>
        <?php the_content(); ?><br>          
    </div>
</article>


<?php

    the_post_navigation(
		array(
			'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'taze' ) . '</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'taze' ) . '</span> <span class="nav-title">%title</span>',
		)
	);
?>

