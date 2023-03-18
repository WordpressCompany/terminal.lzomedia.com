<?php
/**
 * Template Name: About
 */
?>
<?php get_header(); ?>

<section class="container">
    <div class="row">
        <div class="col-lg-12 col-xs-12 col-md-12">
            <h1 class="text-center">
                <?php the_title(); ?>
            </h1>
            <br>

        </div>


        //generate a div lg12 with id calendar
        <div class="col-lg-12 col-xs-12 col-md-12">
            <div class="text-center">
                <?php the_content(); ?>
            </div>
        </div>


        <div class="col-lg-12 col-xs-12 col-md-12">
            <div class="text-center" id="calendar"></div>
        </div>
    </div>
</section>

<!--- Footer About !-->
<script src="<?php echo get_template_directory_uri(); ?>/dist/calendar.js"></script>
<?php get_footer() ?>

