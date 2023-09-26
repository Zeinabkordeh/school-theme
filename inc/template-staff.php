<?php
/*
Template Name: Staff Template
*/
get_header();
?>

    <main id="primary" class="site-main">

        <?php
            while (have_posts()) : the_post();
                the_title('<h1>', '</h1>');
                the_content();

            endwhile;
        ?>

        <h2>Administrative</h2>
        <div class="staff-wrapper">
            <?php
            $admin_members = new WP_Query(array(
                'post_type' => 'staff',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'staff_type',
                        'field' => 'slug',
                        'terms' => 'administrative',
                    ),
                ),
            ));

            if ($admin_members->have_posts()) :
                while ($admin_members->have_posts()) : $admin_members->the_post();
                    $name = get_the_title();
                    $short_bio = get_field('short_staff_biography');
                    ?>
                    <div class="staff-item">
                        <h3><?php echo esc_html($name); ?></h3>
                        <?php if ($short_bio) : ?>
                            <p><?php echo esc_html($short_bio); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile;
                wp_reset_postdata();

            endif;
            ?>
        </div>

        <h2>Faculty</h2>
        <div class="staff-wrapper">
            <?php
            $faculty_members = new WP_Query(array(
                'post_type' => 'staff',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'staff_type',
                        'field' => 'slug',
                        'terms' => 'faculty',
                    ),
                ),
            ));

            if ($faculty_members->have_posts()) :
                while ($faculty_members->have_posts()) : $faculty_members->the_post();
                    $name = get_the_title();
                    $short_bio = get_field('short_staff_biography');
                    $courses = get_field('course');
                    $website = get_field('instructor_website');
                    ?>
                    <div class="staff-item">
                        <h3><?php echo esc_html($name); ?></h3>
                        <?php if ($short_bio) : ?>
                            <p><?php echo esc_html($short_bio); ?></p>
                        <?php endif; ?>
                        <?php if ($courses) : ?>
                            <p>Courses: <?php echo esc_html($courses); ?></p>
                        <?php endif; ?>
                        <?php if ($website) : ?>
                            <p><a href="<?php echo esc_url($website); ?>">Instructor Website</a></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else :
                echo 'No faculty members found.';
            endif;
            ?>
        </div>

    </main><!-- #main -->


<?php
get_sidebar();
get_footer();
