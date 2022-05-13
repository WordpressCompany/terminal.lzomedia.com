<?php get_header(); ?>


<section class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php the_content(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1>
                Recent Posts
            </h1>

	        <?php
	        $recent_posts = wp_get_recent_posts(array(
		        'numberposts' => 25,
                'orderby' => 'post_date',
                'order' => 'ASC',
		        'post_status' => 'publish' // Show only the published posts
	        ));
	        foreach( $recent_posts as $post_item ) : ?>
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <div class="box">
                        <a href="<?php echo get_permalink($post_item['ID']) ?>" title="<?php echo $post_item['post_title'] ?>">
		                    <?php echo $post_item['post_title'] ?>
                        </a>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <div class="box">
                        <?php the_time('F j, Y') ?>
                    </div>
                </div>


            </div>
            <?php endforeach; ?>

            <div class="row center-xs" style="margin-top: 4rem;margin-bottom: 4rem">
                <div class="col-xs-6">
                    <div class="box">
                        <a href="<?php bloginfo('wpurl'); ?>/news/" class="btn btn-primary">
                            View More News
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<?php get_footer() ?>
