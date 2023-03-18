<?php get_header(); ?>


<section class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tag: <?php single_cat_title(); ?>
            </h1>
            <ol class="terminal-toc">
                <?php
                /**
                 * Get the Term ID of the current term.
                 */
                $term = get_queried_object();
                $term_id = $term->term_id;

                /**
                 * Get all posts and pages with the current term.
                 */
                $args = array(
                    'post_type'      => array('post', 'page'),
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'tax_query'      => array(
                        array(
                            'taxonomy'    => 'post_tag',
                            'field'       => 'term_id',
                            'terms'       => [$term_id]
                        )
                    )
                );

                /**
                 * Create a new query.
                 */
                $query = new WP_Query($args);


                ?>
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>


            </ol>
        </div>
    </div>
</section>


<?php get_footer() ?>
