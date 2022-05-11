<?php get_header(); ?>


<?php

$current_category = get_queried_object();
$category         = single_cat_title( '', false );
$categoryID       = get_cat_ID( single_cat_title( '', false ) );

?>
<?php if ( have_posts() ) : ?>

    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Displaying posts in category: <?php single_cat_title(); ?>
                </h1>
                <ol class="terminal-toc">
					<?php
					if ( get_query_var( 'paged' ) ) {
						$paged = get_query_var( 'paged' );
					} elseif ( get_query_var( 'page' ) ) {
						$paged = get_query_var( 'page' );
					} else {
						$paged = 1;
					}
					$args = array(
						'post_type'      => 'post',
						'order'          => 'DESC',
						'paged'          => $paged,
						'posts_per_page' => 10,
						'tax_query'      => array(
							array(
								'taxonomy' => 'category',
								'field'    => 'term_id',
								'terms'    => $current_category->term_id
							)
						)
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) :
						$loop->the_post();
						?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
								<?php the_title(); ?>
                            </a>
                        </li>
					<?php endwhile; ?>
                </ol>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer() ?>
