<?php
/**
* Template Name: Test template
*
*/
get_header();
?>
    <div class="sy-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                        
                      

                           <header class="page-header">
                                <?php
                                the_title( '<h1 class="page-title mt-0">', '</h1>' );
                                //the_archive_description( '<div class="archive-description">', '</div>' );
                                ?>
                            </header><!-- .page-header --> 
                            
                            <?php
                            
                            echo do_shortcode("[posts_data_table columns='title,page_index,category,date' sort_by='date' sort_order='asc' rows_per_page=-1]");
                                               
                            ?>
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
