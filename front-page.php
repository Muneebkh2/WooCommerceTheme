<?php get_header();?>

<div id="hero">
    <div class="container-fluid d-flex align-items-center justify-content-center h-100">
        <div class="content text-center">
            <h1>Welcome to Foodiva</h1>
            <p>A spices distributor company in usa</p>
        </div>
    </div>
</div>
<!-- Category Section -->
<section class="category_sections">
    <div class="container">
        <div class="row py-3 px-2">
            <div class="col-lg-6 px-2 mb-3 mb-lg-0">
                <div class="image_card">
                    <img src="<?php bloginfo('template_directory');?>/assets/images/banners/banner1-2.jpg" alt="f"
                        class="w-100">
                    <div class="card_content">
                        <h2>Cinnamon</h2>
                        <a href="!#">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 px-2 mb-3 mb-lg-0">
                <div class="image_card second_image_card">
                    <img src="<?php bloginfo('template_directory');?>/assets/images/banners/slide3-1.jpg" alt="s"
                        class="w-100">
                    <div class="card_content">
                        <h2>Spice blends</h2>
                        <a href="!#">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-3 px-2">
            <div class="col-lg-6 px-2 mb-3 mb-lg-0">
                <div class="image_card">
                    <img src="<?php bloginfo('template_directory');?>/assets/images/banners/banner4.jpg" alt="t"
                        class="w-100">
                    <div class="card_content">
                        <h2>Salt free</h2>
                        <a href="!#">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 px-2 mb-3 mb-lg-0">
                <div class="image_card">
                    <img src="<?php bloginfo('template_directory');?>/assets/images/banners/banner5-1.jpg" alt="f"
                        class="w-100">
                    <div class="card_content">
                        <h2>Mint Leaves</h2>
                        <a href="!#">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Products Section -->
<section class="feature_products_section">
    <div class="container-fluid py-5 px-5">
        <div class="row pb-3">
            <div class="col-lg-12 text-center">
                <h1 class="title">Featured Products</h1>
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel owl-theme">
                    <?php
                        $args = array('post_type' => 'product');
                        $loop = new WP_Query($args);
                        while ($loop->have_posts()): $loop->the_post();global $product;?>
                        <?php wc_get_template_part('content', 'product');?>

                        <div class="item products">
                            <li class="product">
                                <a href="<?php echo get_permalink($loop->post->ID) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                                    <?php
                                        woocommerce_show_product_sale_flash($post, $product);
                                        if (has_post_thumbnail($loop->post->ID)) {
                                            echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
                                        } else {
                                            echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="300px" height="300px" />';
                                        }
                                        the_title('<h3 class="my-3">', '</h3>');
                                    ?>
                                    <?php if ($average = $product->get_average_rating()): ?>
                                    <?php echo '<div class="star-rating" title="' . sprintf(__('Rated %s out of 5', 'woocommerce'), $average) . '"><span style="width:' . (($average / 5) * 100) . '%"><strong itemprop="ratingValue" class="rating">' . $average . '</strong> ' . __('out of 5', 'woocommerce') . '</span></div>'; ?>
                                    <?php endif;?>
                                    <?php echo '<p class="price my-0">' . $product->get_price_html() . '</p>';?>
                                </a>
                                <div class="button_div my-4">
                                    <?php woocommerce_template_loop_add_to_cart($loop->post, $product);?>
                                </div>
                            </li>
                        </div>

                    <?php 
                        endwhile;
                        wp_reset_query();
                    ?>


                <!-- <div class="item products">
                <?php/*
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 12,
                        'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_visibility',
                                    'field'    => 'name',
                                    'terms'    => 'featured',
                                    'operator' => 'NOT IN',
                                ),
                            ),
                        );
                    $loop = new WP_Query( $args );
                    if ( $loop->have_posts() ) {
                        while ( $loop->have_posts() ) : $loop->the_post();
                            wc_get_template_part( 'content', 'product' );
                        endwhile;
                    } else {
                        echo __( 'No products found' );
                    }
                    wp_reset_postdata();*/
                ?>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- Image Section -->
<section class="image_section">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="content">
                <h1>We are providing no.1 quality grocrey and spices to everyone</h1>
            </div>
            <div class="icons">
                <ul>
                    <li><img src="<?php bloginfo('template_directory');?>/assets/images/icons/quality-icon.png"></li>
                    <li><img src="<?php bloginfo('template_directory');?>/assets/images/icons/health-icon.png"></li>
                    <li><img src="<?php bloginfo('template_directory');?>/assets/images/icons/star-icon.png"></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Brand Section -->
<section class="brands_section">
    <div class="container">
        <div class="row my-5">
            <div id="brandCarousel" class="brand-carousel owl-carousel owl-theme">
                <div class="item">
                    <div class="card border-1">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/brands/chinar.jpg" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="card border-1">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/brands/mdh.jpg" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="card border-1">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/brands/shan.png" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="card border-1">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/brands/dabur.png" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="card border-1">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/brands/haldirams.png" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="card border-1">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/brands/amul.jpg" alt="">
                    </div>
                </div>
                <div class="item">
                    <div class="card border-1">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/brands/ashoka.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer();?>
