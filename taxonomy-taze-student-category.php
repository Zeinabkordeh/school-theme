<?php
/**
 * Taxonomy Template: Student Categories
 *
 * @package Taze
 */

get_header();

$term = get_queried_object(); //ask chat gpt best way to find title of current taxonomy
?>

<main id="primary" class="site-main">

<?php
echo '<h1>' . esc_html($term->name) . '</h1>';

if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>

        <div id="post-<?php the_ID();?>" <?php post_class(); ?>>
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
?>
</main>
<?php
get_footer();
