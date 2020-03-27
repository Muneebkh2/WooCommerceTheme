<?php 
/*
Template Name: Template Page
*/

get_header();?>
<section class="hero-heading">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col text-left">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<section id="main-content">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="main-content">
                    <?php if(has_post_thumbnail()):?>
                    <div class="page-banner">
                        <!-- images -->
                        <img src="<?php the_post_thumbnail_url('post_image'); ?>" alt="" class="img-fluid mb-3 w-100 rounded">
                    </div>
                    <?php
                        endif; // image if(condition) end
                        // retirve content from database with wordpress loop 
                        if(have_posts()):while(have_posts()) : the_post();
                        the_content();
                        endwhile; else: endif; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>