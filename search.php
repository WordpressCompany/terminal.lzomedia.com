<?php get_header();?>

<?php

global $query_string;

wp_parse_str( $query_string, $search_query );
$search = new WP_Query( $search_query );

?>

<section class="container">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="text-center">
                 Search Results for: <?php echo get_search_query(); ?>
                </h1>

                @Todo - Add search results here

            </div>
        </div>
    </section>


<?php get_footer() ?>
