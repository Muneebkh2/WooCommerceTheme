<?php
/*
Template Name: Brand Page Template
 */

get_header();?>
<section class="hero-heading">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col text-left">
                <h1><?php the_title();?></h1>
            </div>
        </div>
    </div>
</section>

<section id="main-content">
    <div class="container">
        <div class="row py-5">
            <?php
                        // retirve content from database with wordpress loop 
                        if(have_posts()):while(have_posts()) : the_post();
                        the_content();
                        endwhile; else: endif; 
                    ?>
        </div>
    </div>
</section>

<?php get_footer();?>