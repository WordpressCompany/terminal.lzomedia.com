<?php
/**
 * Template Name: Contact
 */
?>
<?php get_header(); ?>

<section class="container">
    <div class="row center-xs">
        <div class="col-lg-12 col-xs-12 col-md-12">
            <h1 title="<?php the_title(); ?>" class="text-center">
                <?php the_title(); ?>
            </h1>
            <br>
        </div>

        <div class="col-lg-12 col-xs-12 col-md-12">
            <div class="text-center">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <div class="row center-xs">
        <div class="col-lg-12 col-xs-12 col-md-12">
            <div class="text-center" id="calendar"></div>
        </div>
    </div>

</section>

<!--- Footer About !-->
<script src="<?php echo get_template_directory_uri(); ?>/dist/calendar.js"></script>
<?php get_footer() ?>

