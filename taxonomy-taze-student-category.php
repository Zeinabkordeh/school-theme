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
echo '<h1>' . esc_html($term->name) . ' Students</h1>';

if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>

        <article id="post-<?php the_ID();?>" <?php post_class(); ?>>
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="student-thumbnail">
                <?php
                
                if (has_post_thumbnail()) {
                    the_post_thumbnail('student-portrait');
                }
                ?>
            </div>
            <div class="student-content">
                <?php the_content(); ?>
            </div>
        </article>

        <?php
    endwhile;
else :
    echo 'No students found in this category.';
endif;
?>
</main>
<?php
get_footer();
