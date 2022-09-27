<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="theme-color" content="#ffffff"/>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js?ver=3.7.0" type="text/javascript"></script>
    <![endif]-->
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="https://unpkg.com/terminal.css@0.7.2/dist/terminal.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css"
          type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

</head>
<body>

<main id="page">
<header class="container">
    <div class="row">

        <div class="logo terminal-prompt col-lg-6 col-md-6 col-xs-12">
            <a href="<?php bloginfo("url"); ?>" class="no-style">
              <?php bloginfo('name'); ?>
            </a>
            <br>
            <small style="font-size: 12px">
                <?php bloginfo('description'); ?>
            </small>
        </div>

        <nav class="terminal-menu col-lg-6 col-md-6 col-xs-12">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'main',
                    'container' => false,
                )
            );
            ?>
        </nav>
    </div>
</header>
