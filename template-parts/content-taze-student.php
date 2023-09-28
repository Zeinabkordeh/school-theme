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
<section class="students">
    <?php
if ($query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();

        $student_excerpt = get_the_excerpt();
        $student_link = get_permalink();
        $terms = wp_get_post_terms(get_the_ID(), 'taze-student-category'); //stackoverflow
        $student_excerpt = str_replace('[&hellip;]', ' <a href="' . esc_url($student_link) . '">Read More about the Student</a>', $student_excerpt);
        //function found using Chat GPT
    
        if (!empty($terms)) {
            $term = reset($terms); // reset found using chatGPT, first element in array
            $term_name = $term->name;
        ?>
        <article class="student-entry">
            <h2><?php echo esc_html(the_title()); ?></h2>
            <div class="student-thumbnail">
                <?php the_post_thumbnail('student'); ?>
            </div>
            <div class="student-content">
                <p><?php echo wp_kses_post($student_excerpt); ?></p> 
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
<?php

get_footer();
?>
