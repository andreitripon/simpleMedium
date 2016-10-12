<?php
/**
 * The template for displaying all pages.
 */
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        ?>
        <section class="post">
            <div class="container">
                <div class="row post-title">
                    <div class="col-sm-10 col-sm-offset-1">
                        <h1><?php the_title(); ?></h1>
                        <p class="post-info"><?php the_time(); ?> by <a href="<?php the_author_link(); ?>"><?php the_author(); ?></a></p>
                    </div>
                </div>
                <div class="row">
                    <?php the_post_thumbnail(); ?>
                </div>
                <div class="row post-content">
                    <div class="col-sm-10 col-sm-offset-1">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="row post-meta">
                    <div class="col-sm-8 col-sm-offset-1">
                        <?php the_tags(); ?>
                        <?php the_category(); ?>
                    </div>
                    <div class="col-sm-2">

                    </div>
                </div>
                <div class="row author-info">
                    <div class="col-sm-4 col-sm-offset-4">
                        <img src="" alt="">
                        <strong><?php the_author(); ?></strong>
                        <p>Lorem ipsum fdsg sdgsd gs gdsg sdgs d gsd</p>
                    </div>
                </div>
                <div class="row comments">
                    <div class="col-sm-10 col-sm-offset-1">

                    </div>
                </div>
            </div>
        </section>
        <?php
    endwhile;
endif;
get_footer();