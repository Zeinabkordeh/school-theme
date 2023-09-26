<?php
/**
 * Taxonomy Template: Student Categories
 *
 * @package Taze
 */

get_header();

$term = get_queried_object(); //ask chat gpt best way to find title of current taxonomy

echo '<h1>' . esc_html($term->name) . '</h1>';

if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>

        <div class="student-entry">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="student-thumbnail">
                <?php
                
                if (has_post_thumbnail()) {
                    the_post_thumbnail('student');
                }
                ?>
            </div>
            <div class="student-content">
                <?php the_content(); ?>
            </div>
        </div>

        <?php
    endwhile;
else :
    echo 'No students found in this category.';
endif;

get_footer();
