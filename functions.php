<?php
// Include required files
require 'recommend/register-required-plugins.php';
// The theme update logic
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
