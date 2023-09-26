<?php
/*
Template Name: Student List Template
*/

get_header();

// Custom query to retrieve students
$args = array(
    'post_type' => 'taze-student', // Replace with your custom post type name
    'posts_per_page' => -1, // Retrieve all students
    'orderby' => 'title', // Order by student's first name
    'order' => 'ASC', // Sort in ascending order
);

$query = new WP_Query($args);

if(!is_singular()) :
    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();

            // Get student's information
            $student_name = get_the_title();
            $student_excerpt = wp_trim_words(get_the_excerpt(), 25); //ask chat gpt how to splice exerpt to 25 words
            $student_image = get_the_post_thumbnail();
            $student_link = get_permalink();

            // Output student information
            ?>
            <div class="student-entry">
                <h2><?php echo esc_html($student_name); ?></h2>
                <div class="student-thumbnail">
                    <?php echo $student_image; ?>
                </div>
                <div class="student-content">
                    <p><?php echo esc_html($student_excerpt); ?></p>
                    <p><a href="<?php echo esc_url($student_link); ?>">Read More about the Student</a></p>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No students found.';
    endif;
else :
    the_title();
    the_content();
endif;

get_footer();
