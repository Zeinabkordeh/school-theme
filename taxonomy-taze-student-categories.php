<?php
/*
Template Name: Student List Template
*/

get_header();

// Determine which term to display based on the URL parameter
$selected_term = isset($_GET['term']) ? sanitize_text_field($_GET['term']) : '';

// Custom query to retrieve students based on the selected term
$args = array(
    'post_type' => 'taze-student', 
    'posts_per_page' => -1, 
    'orderby' => 'title', 
    'order' => 'ASC', 
    'tax_query' => array(
        'relation' => 'AND', // Require both post type and selected term
        array(
            'taxonomy' => 'taze-student-category',
            'field'    => 'slug',
            'terms'    => array('designer', 'developer'),
        ),
        array(
            'taxonomy' => 'taze-student-category',
            'field'    => 'slug',
            'terms'    => $selected_term, // Display students based on the selected term
        )
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
                <h2><?php echo esc_html(get_the_title()); ?></h2>
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
