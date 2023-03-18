<?php get_header(); ?>


<section class="container">
    <div class="row">
        <div class="col-lg-12">

            <h1 class="text-center" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </h1>


            <div class="row">
                <div class="col-lg-12">
                    Created on <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>
                </div>
                <div class="col-lg-12">
                    <?php the_post_thumbnail('full', ['class' => 'img-responsive']); ?>
                </div>
                <div class="col-lg-12">
                    Tags: <?php the_tags(', '); ?>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-lg-12">
                    <?php the_content(); ?>
                </div>
            </div>

        </div>
    </div>
</section>
<style>

    strong.entity {
        color: green !important;
    }

    strong.entity span {
        display: none;
    }

</style>

<?php get_footer() ?>
