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
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();

        $student_name = get_the_title();
        $student_excerpt = get_the_excerpt(); 
        $student_image = get_the_post_thumbnail();
        $student_link = get_permalink();

        $student_excerpt = str_replace('[&hellip;]', ' <a href="' . esc_url($student_link) . '">Read More about the Student</a>', $student_excerpt);
        //function found using Chat GPT
    
        ?>
        <div class="student-entry">
            <h2><?php echo esc_html($student_name); ?></h2>
            <div class="student-thumbnail">
                <?php echo $student_image; ?>
            </div>
            <div class="student-content">
                <p><?php echo wp_kses_post($student_excerpt); ?></p> //wp_kses_post sanitizes html
            </div>
        </div>
        <?php
    endwhile;
    wp_reset_postdata();
else :
    echo 'No students found.';
endif;

get_footer();
?>
