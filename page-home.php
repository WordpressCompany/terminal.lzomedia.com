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
            <ol class="terminal-toc">
		        <?php
		        $recent_posts = wp_get_recent_posts(array(
			        'numberposts' => 10,
			        'post_status' => 'publish' // Show only the published posts
		        ));
		        foreach( $recent_posts as $post_item ) : ?>
                    <li>
                        <a href="<?php echo get_permalink($post_item['ID']) ?>" title="<?php echo $post_item['post_title'] ?>">
	                        <?php echo $post_item['post_title'] ?>
                        </a>
                    </li>
		        <?php endforeach; ?>
            </ol>

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
