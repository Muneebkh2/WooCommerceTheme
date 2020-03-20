<?php get_header(); ?>

<section class="content">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-2">
                <?php get_sidebar(); ?>
            </div>
            <div class="col-md-10">
                <div class="main-content">
                    <h1><?php the_title(); ?></h1>
                    <?php
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

<?php get_footer(); ?>