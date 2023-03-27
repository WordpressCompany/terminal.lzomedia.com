<?php
/**
 * Template Name: About
 */
?>
<?php get_header(); ?>

<section class="container">

    <div class="row center-xs">
        <div class="col-lg-12 col-xs-12 col-md-12">
            <div class="text-center">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <div class="row center-xs">
        <div class="col-lg-12">
            <h3>
                My Social Media
            </h3>
            <a href="https://www.linkedin.com/in/cornatul/" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x fa-1x fa-linkedin"></i></a>
            <a href="https://github.com/cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x  fa-github"></i></a>
            <a href="https://twitter.com/cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x fa-twitter"></i></a>


            <a href="https://www.instagram.com/cornatul/" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x fa-instagram"></i></a>
            <a href="https://www.facebook.com/cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x fa-facebook"></i></a>
            <a href="https://www.youtube.com/channel/UCATvoW-E8jPB2jIkUhfXygw" target="_blank"
               rel="noopener noreferrer"><i class="fab fa-2x fa-youtube"></i></a>
            <a href="https://www.pinterest.com/cornatul/" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x fa-pinterest"></i></a>
            <a href="https://www.flickr.com/photos/cornatul/" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x fa-flickr"></i></a>
            <a href="https://www.tumblr.com/blog/cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x fa-tumblr"></i></a>

            <a href="https://www.reddit.com/user/Outrageous_Minute712" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x fa-reddit"></i></a>

            <a href="https://dev.to/cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x fa-dev"></i></a>

            <a href="https://www.quora.com/profile/Cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x fa-quora"></i></a>

            <a href="https://medium.com/@cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x fa-medium"></i></a>


            <a href="https://stackoverflow.com/users/2022051/cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x fa-stack-overflow"></i></a>

            <a href="https://calendly.com/cornatul" target="_blank" rel="noopener noreferrer"><i
                        class="fab fa-2x fa-calendar"></i></a>


        </div>
        <div class="col-lg-12 col-xs-12 col-md-12">
            <div class="text-center" style="padding-top:3vh" id="calendar"></div>
        </div>
    </div>

</section>

<!--- Footer About !-->
<script src="<?php echo get_template_directory_uri(); ?>/dist/calendar.js"></script>
<?php get_footer() ?>

