<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>

    <?php wp_head();?>
</head>

<body <?php body_class('main_body')?>>

    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- brand logo -->
                <a class="navbar-brand" href="#">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo.png" alt="" class="logo">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                        // add top navigation menu. 
                        wp_nav_menu( array('theme_location' => 'top_menu') );
                    ?>
                </div>
            </nav>
        </div>
    </header>