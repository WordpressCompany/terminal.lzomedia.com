<?php
//// Include the rest auth logic
include 'includes/auth.php';
include 'includes/RegisterCustomEndpoint.php';
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



if ( ! is_admin() ) {
    $date = (file_exists(get_template_directory() . '/css/main.css')) ? date('YmdHi', filemtime(get_template_directory() . '/css/main.css')) : 1;

    wp_enqueue_style('main', get_template_directory_uri() . '/dist/main.css', array(), $date);

}

//register projects
// Register Custom Post Type
function create_projects_post() {

    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'terminal' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'terminal' ),
        'menu_name'             => __( 'Project', 'terminal' ),
        'name_admin_bar'        => __( 'Project Type', 'terminal' ),
        'archives'              => __( 'Project Archives', 'terminal' ),
        'attributes'            => __( 'Project Attributes', 'terminal' ),
        'parent_item_colon'     => __( 'Project Item:', 'terminal' ),
        'all_items'             => __( 'All Items', 'terminal' ),
        'add_new_item'          => __( 'Add New Item', 'terminal' ),
        'add_new'               => __( 'Add New', 'terminal' ),
        'new_item'              => __( 'New Item', 'terminal' ),
        'edit_item'             => __( 'Edit Item', 'terminal' ),
        'update_item'           => __( 'Update Item', 'terminal' ),
        'view_item'             => __( 'View Item', 'terminal' ),
        'view_items'            => __( 'View Items', 'terminal' ),
        'search_items'          => __( 'Search Item', 'terminal' ),
        'not_found'             => __( 'Not found', 'terminal' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'terminal' ),
        'featured_image'        => __( 'Featured Image', 'terminal' ),
        'set_featured_image'    => __( 'Set featured image', 'terminal' ),
        'remove_featured_image' => __( 'Remove featured image', 'terminal' ),
        'use_featured_image'    => __( 'Use as featured image', 'terminal' ),
        'insert_into_item'      => __( 'Insert into item', 'terminal' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'terminal' ),
        'items_list'            => __( 'Items list', 'terminal' ),
        'items_list_navigation' => __( 'Items list navigation', 'terminal' ),
        'filter_items_list'     => __( 'Filter items list', 'terminal' ),
    );
    $args = array(
        'label'                 => __( 'Project', 'terminal' ),
        'description'           => __( 'This is a custom post type to be used for projects', 'terminal' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => false,
        'rest_base'             => 'projects',
    );
    register_post_type( 'projects', $args );

}
add_action( 'init', 'create_projects_post', 0 );
