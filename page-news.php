<?php
/**
 * Template Name: News
 */
?>

<?php get_header(); ?>

<section class="container">
    <div class="row">
        <div class="col-lg-12">
            <table>
                <caption>
                   <h1>
                       <?php the_title();?>
                   </h1>
                    <p>
                        <?php the_content();?>
                    </p>
                </caption>
                <thead>
                <tr>
                    <th>Rank</th>
                    <th>Title</th>
                </tr>
                </thead>


				<?php
				$paged    = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
				$args     = [
					'post_type'      => 'post',
					'posts_per_page' => 15,
					'paged'          => $paged,
				];
				$wp_query = new WP_Query( $args );

				while ( have_posts() ) : the_post(); ?>

                <tbody>
                <tr>
                    <th>
                        <?php echo $wp_query->current_post + 1; ?>
                    </th>
                    <td>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </td>
                </tr>
                </tbody>


				<?php endwhile; ?>
            </table>
            <div class="row center-xs" style="margin-top:4rem;margin-bottom: 4rem">
                <div class="col-lg-12">
                    <div class="pagination">
                        <?php
                        $options = [
                            'prev_text' => '«',
                            'prev_next' => false,
                            'next_text' => '»',
                            'next_next' => false,
                            'show_all'  => true,
                        ];
                        echo "<div class='fz-pagination'>" . paginate_links($options) . "</div>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer() ?>
