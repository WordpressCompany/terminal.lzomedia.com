<?php get_header(); ?>


<section class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Archive: <?php single_cat_title(); ?>
            </h1>
            <ol class="terminal-toc">
              <?php wp_get_archives(); ?>
            </ol>
        </div>
    </div>
</section>


<?php get_footer() ?>
