<?php
/*
Template Name: Student List Template
*/

get_header();

// Custom query to retrieve students from 'developer' or 'designer' categories
$args = array(
    'post_type' => 'taze-student', 
    'posts_per_page' => -1, 
    'orderby' => 'title', 
    'order' => 'ASC',
    'tax_query' => array(
        'relation' => 'OR', // Retrieve students in either 'developer' or 'designer' category
        array(
            'taxonomy' => 'taze-student-category',
            'field'    => 'slug',
            'terms'    => 'developer', // 'developer' category
        ),
        array(
            'taxonomy' => 'taze-student-category',
            'field'    => 'slug',
            'terms'    => 'designer', // 'designer' category
        ),
    )
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();

        $student_excerpt = get_the_excerpt();
        $student_link = get_permalink();
        $terms = wp_get_post_terms(get_the_ID(), 'taze-student-category');

        if (!empty($terms)) {
            $term = reset($terms);
            $term_name = $term->name;
            ?>
            <div class="student-entry">
                <h2><?php echo esc_html($term_name); ?></h2>
                <div class="student-thumbnail">
                    <?php the_post_thumbnail('student'); ?>
                </div>
                <div class="student-content">
                    <p><?php echo wp_kses_post($student_excerpt); ?></p>
                    <p>Specialty: <?php echo esc_html($term_name); ?></p>
                </div>
            </div>
            <?php
        }
    endwhile;
    wp_reset_postdata();
else :
    echo 'No students found.';
endif;

get_footer();
?>
