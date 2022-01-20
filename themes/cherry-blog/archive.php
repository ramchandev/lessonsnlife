<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cherry-blog
 */

get_header();
?>
    <div class="sy-body">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="primary" class="content-area sy-content-area">
                        <main id="main" class="site-main">
                        
                        <?php if ( have_posts() ) : ?>

                            <header class="page-header">
                                <?php
                                the_archive_title( '<h1 class="page-title mt-0">', '</h1>' );
                                the_archive_description( '<div class="archive-description">', '</div>' );
                                ?>
                            </header><!-- .page-header -->
                            <div class="row">
                                <?php
                                /* Start the Loop */
                                while ( have_posts() ) :
                                    the_post();

                                    /*
                                    * Include the Post-Type-specific template for the content.
                                    * If you want to override this in a child theme, then include a file
                                    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                    */
                                    get_template_part( 'template-parts/card/content', get_post_type() );

                                endwhile;

                                

                            else :

                                get_template_part( 'template-parts/content', 'none' );

                            endif;
                            ?>
                            </div>
                            <div class="sy-pagination">
                                <?php
                                $big = 999999999; // need an unlikely integer
                                echo paginate_links([
                                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                    'format' => '?paged=%#%',
                                    'current' => max(1, get_query_var('paged')),
                                    'total' => $wp_query->max_num_pages
                                ]);
                                ?>
                            </div>
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
                <!-- <div class="col-lg-4 col-md-12 col-sm-12">
                    <?php //get_sidebar(); ?>
                </div> -->
            </div>
        </div>
    </div>

<?php

get_footer();
