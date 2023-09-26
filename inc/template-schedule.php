<?php
/*
Template Name: Schedule Template
*/

get_header();
?>

<main id="primary" class="site-main">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        </header>

        <div class="entry-content">
            <?php
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>

            <div class="schedule-content">
                <?php
                // Retrieve the repeater field data for "Program Schedule"
                $schedule = get_field('program_schedule');

                if ($schedule) :
                ?>
                    <table class="schedule">
					<caption>Weekly Course Schedule</caption> 
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Course</th>
                                <th>Instructor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($schedule as $item) :
                            ?>
                                <tr>
                                    <td><?php echo esc_html($item['date']); ?></td>
                                    <td><?php echo esc_html($item['course']); ?></td>
                                    <td><?php echo esc_html($item['instructor']); ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                <?php
                else :
                    echo '<p>No schedule entries found.</p>';
                endif;
                ?>
            </div>
        </div>
    </article>
</main>

<?php
get_footer();
?>
