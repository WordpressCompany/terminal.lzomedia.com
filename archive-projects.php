<?php
/**
 * Template Name: Projects
 */
?>

<?php get_header(); ?>

<section class="container">
    <div class="row center-xs">
        <div class="col-lg-12 col-xs-12 col-md-12">
            <h1>
                My latest projects
            </h1>
        </div>
    </div>
    <div class="row center-xs">
        <div class="col-lg-12 col-xs-12 col-md-12">


				<?php
				$paged    = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				$args     = [
					'post_type'      => 'projects',
					'posts_per_page' => 15,
                    'orderby' => 'date',
                    'order' => 'ASC',
					'paged'          => $paged,
				];
				$wp_query = new WP_Query( $args );

				while ( have_posts() ) : the_post(); ?>



                        <div class="terminal-card">
                            <header>
                                <h2>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                            </header>
                            <div>
                               <?php the_excerpt(); ?>
                            </div>
                        </div>



				<?php endwhile; ?>

            <div class="row center-xs" style="margin-top:4rem;margin-bottom: 4rem">
                <div class="col-lg-12">
                    <div class="pagination">
                        <?php
                        echo "<div class='fz-pagination'>" . paginate_links(array(
                                'total' => $wp_query->max_num_pages,
                                'show_all'           => false,
                                'prev_text' => __('<div class="preious-page btn btn-primary btn-block">Prev</div>'),
                                'next_text' => __('<div class="next-page btn btn-primary btn-block">Next</div>')
                            )) . "</div>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer() ?>
