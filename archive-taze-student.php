<?php
/*
Template Name: Student List Template
*/

get_header();

// Custom query to retrieve students
$args = array(
    'post_type' => 'taze-student', 
    'posts_per_page' => -1, 
    'orderby' => 'title', 
    'order' => 'ASC', 
    'tax_query' => array(
        'relation' => 'OR', //stack overflow
        array(
            'taxonomy' => 'taze-student-category',
            'field'    => 'slug',
            'terms'     => array('designer', 'developer'),
        )
    )
);

$query = new WP_Query($args);
?>
<main id="primary" class="site-main">
<section class="students">
    <?php
if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();

        $student_link = get_permalink();
        $terms = wp_get_post_terms(get_the_ID(), 'taze-student-category'); //stackoverflow
    

        if (is_post_type_archive('taze-student') && !is_singular('taze-student')) {
            $student_excerpt = wp_trim_words(get_the_excerpt(), 25, ' <br><a href="' . esc_url($student_link) . '">Read More about this Student...</a>');
        } else {
            $student_excerpt = get_the_excerpt();
        }
        
    
        if (!empty($terms)) {
            $term = reset($terms); // reset found using chatGPT, first element in array
            $term_name = $term->name;
        ?>
        <article class="student-entry">
            <h2><a href="<?php the_permalink();?>"><?php echo esc_html(the_title()); ?></a></h2>
            <div class="student-thumbnail">
                <?php the_post_thumbnail('student'); ?>
            </div>
            <div class="student-content">
                <p><?php echo wp_kses_post($student_excerpt); ?></p><br>
                <!-- wp_kses_post sanitizes html -->
                <P>Specialty: <a href="<?php echo get_term_link($term);?>"><?php echo esc_html($term_name);?></a></P>
            </div>
        </article>
        <?php
        }
    endwhile;
    wp_reset_postdata();
else :
    echo 'No students found.';
endif;
?>
</section>
</main>
<?php

get_footer();
?>
