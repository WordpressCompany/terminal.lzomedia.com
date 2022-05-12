<?php get_header(); ?>


<section class="container">
    <div class="row">
        <div class="col-lg-12">

            <h1 class="text-center">
                Search Results for: <?php echo get_search_query(); ?>
            </h1>
            <ol class="terminal-toc">
				<?php
				$s    = get_search_query();
				$args = array(
					's' => $s
				);
				// The Query
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {

				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
					<?php
				}
				?>
            </ol>
			<?php
			} else {
				?>
                <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
                <div class="alert alert-info">
                    <p>Sorry, but nothing matched your search criteria. Please try again with some different
                        keywords.</p>
                </div>
			<?php } ?>

        </div>
    </div>
</section>


<?php get_footer() ?>
