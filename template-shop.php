<?php 
/*
Template Name: Shop Page
*/

get_header();?>

<section id="main-content">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="main-content">
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