<?php get_header();?>



<section class="container">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="text-center">
                    <?php the_title();?>
                </h1>
                <p>
                    Created on <?php the_time('F j, Y');?> at <?php the_time('g:i a');?>
                </p>
                <p>
                    Category: <?php the_category(', ');?>
                </p>
                <br>

                <?php the_content();?>

            </div>
        </div>
    </section>


<?php get_footer() ?>
