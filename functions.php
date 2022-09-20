<?php
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
