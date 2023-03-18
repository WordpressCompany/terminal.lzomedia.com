<?php get_header(); ?>


<section class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 title="<?php the_title();?>" class="text-center">
                <?php the_title();?>
            </h1>
            <p>
                <?php the_content();?>
            </p>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <table>
                <thead>
                <tr>
                    <th>
                        Latest News
                    </th>
                </tr>
                </thead>
                <?php
                $paged = get_query_var('paged');
                $args     = [
                    'post_type'      => 'post',
                    'posts_per_page' => 10,
                    'paged' => $paged,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                ];
                $wp_query = new WP_Query( $args );

                while ( have_posts() ) : the_post(); ?>

                    <tbody>
                    <tr>
                        <td>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                <?php endwhile; ?>
            </table>
        </div>
    </div>

    <div class="row center-xs" >
        <div class="col-xs-6">
            <div class="box">
                <a href="<?php bloginfo('wpurl'); ?>/news/" class="btn btn-primary">
                    View More News
                </a>
            </div>
        </div>
    </div>

</section>


<?php get_footer() ?>
