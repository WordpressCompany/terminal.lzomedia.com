<?php
//// Include the rest auth logic
include 'includes/auth.php';
//// The theme update logic
require 'update/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/lzomedia/terminal/',
    __FILE__,
    'terminal'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');
//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->getVcsApi()->enableReleaseAssets();


function theme_menu()
{
    register_nav_menus(
        array(
            'main' => 'Main Menu'
        )
    );
}

add_action( 'init', 'theme_menu' );
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function wpse_wpautop_nobr( $content ) {
    return wpautop( $content, false );
}

add_filter( 'the_content', 'wpse_wpautop_nobr' );
add_filter( 'the_excerpt', 'wpse_wpautop_nobr' );

//register custom field for the rest

//register custom fields for the rest
add_action( 'rest_api_init', 'register_custom_fields_rest' );
function register_custom_fields_rest(): void
{
    register_rest_field( 'post', 'tags_slug', [
        'update_callback' => function ( $names, $post ) {
            return wp_set_post_tags( $post->ID, $names );
        }
    ] );

    register_rest_field( 'post', 'categories_slug', [
        'update_callback' => function ( $slugs, $post ) {
            $ids = [];

            foreach ( wp_parse_list( $slugs ) as $slug ) {
                if ( $category = get_category_by_slug( $slug ) ) {
                    $ids[] = $category->term_id;
                }
            }

            return ( ! empty( $ids ) ) ? wp_set_post_categories( $post->ID, $ids ) : false;
        }
    ] );
}
