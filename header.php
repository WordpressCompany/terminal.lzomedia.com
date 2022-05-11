<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="theme-color" content="#ffffff"/>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <title><?php wp_title(''); ?> - Senior Backend Developer</title>
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="https://unpkg.com/terminal.css@0.7.2/dist/terminal.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css"
          type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Oldenburg&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

</head>
<body>

<main id="page">
<header class="container">
    <div class="row">

        <div class="logo terminal-prompt col-lg-6 col-md-6 col-xs-12">
            <a href="<?php home_url(); ?>" class="no-style">
                <?php the_title(); ?>
            </a>
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
