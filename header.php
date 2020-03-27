<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <!-- google fonts embeded -->
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <?php wp_head();?>

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/owl.carousel.min.css">
</head>

<body <?php body_class('main_body')?>>

    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light px-0">
                <!-- brand logo -->
                <a class="navbar-brand" href="<?php echo home_url(); ?>">
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
                        wp_nav_menu( array(
                            'theme_location' => 'top_menu',
                            'menu_class' => 'top-menu ml-auto') );
                    ?>
                </div>
                <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                
                $count = WC()->cart->cart_contents_count;
                ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php 
                if ( $count > 0 ) {
                    ?>
                    <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
                    <?php
                }
                    ?></a>

                <?php } ?>
            </nav>
        </div>
    </header>