<?php
//// The theme update logic
require 'update/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/lzomedia/terminal/',
    __FILE__,
    'terminal'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');
//Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->getVcsApi()->enableReleaseAssets();


function theme_menu()
{
    register_nav_menus(
        array(
            'main' => 'Main Menu',
            'footer' => 'Footer Menu',
        )
    );
}

add_action( 'init', 'theme_menu' );

//customisation settings
function terminal_customize_register( $wp_customize ) {

    $wp_customize->add_setting( 'footer_copyright' , array(
        'default'   => 'Design with ♥ and open source in mind',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_section( 'terminal_homepage' , array(
        'title'      => __( 'Visible Section Name', 'terminal' ),
        'priority'   => 30,
    ) );

}
add_action( 'customize_register', 'terminal_customize_register' );
