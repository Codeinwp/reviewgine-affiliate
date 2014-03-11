<?php get_header(); ?> 
            <?php while ( have_posts() ) : the_post(); ?>
 
            <div class="container review-template">
                <section id="content-wrapper" class="page">

                    <section class="article-head">
                        <h1 class="article-title"><?php the_title(); ?></h1><!-- end .article-title -->

                        <div class="article-meta">
                            <div class="article-author">
                                <i class="icon-user"></i>
                                <?php the_author_posts_link(); ?>
                            </div><!-- end .article-author -->

                            <div class="article-date">
                                <i class="icon-calendar"></i>
                                <p><?php the_time(get_option('date_format')); ?></p>
                            </div><!-- end .article-date -->

                            <div class="article-comments">
                                <i class="icon-comments"></i>
                                <a href="<?php comments_link(); ?>"><?php comments_number( __('0 Comments','cwp'), __('1 Comment','cwp'), __('% Comments','cwp') );  ?></a>
                            </div><!-- end .article-comments -->
                        </div><!-- end .article-meta -->
                    </section><!-- end .article-head -->

                    <article class="clearfix">
        
                    
                       <?php the_content(); ?>
                       <?php $wlp_args = array(
                                        'before'           => '<nav><ul class="page-numbers">',
                                        'after'            => '</ul></nav>',
                                        'link_before'      => '<li><span class="page-numbers">',
                                        'link_after'       => '</span></li>',
                                        'next_or_number'   => 'number',
                                        'separator'        => ' ',
                                        'nextpagelink'     => __( 'Next', 'cwp' ),
                                        'previouspagelink' => __( 'Previous', 'cwp' ),
                                        'pagelink'         => '%',
                                        'echo'             => 1
                                    ); ?>
                       <?php wp_link_pages($wlp_args); ?>

                        

                    </article>    

                    <?php edit_post_link('Edit Article', '<p class="edit-article">', '</p>'); ?>
                    <article>

                        <div id="author-bio" class="article-section">
                            <div class="sec-top">
                                <h2><i class="icon-user"></i> <?php _e("About the Author", "cwp"); ?></h2>
                            </div><!-- end .wu-top -->

                            <div id="author-info" class="vcard">
                                <?php echo get_avatar( get_the_author_meta('ID'), $size = '100', $default = '' ); ?>
                                <div class="author-details">
                                    <h3 class="fn n"><?php the_author(); ?></h3>
                                    <p><?php echo the_author_meta('description'); ?></p>
                                </div><!-- end .author-details -->
                            </div><!-- end .author-info -->
                        </div><!-- end #author-bio -->

                <?php comments_template( '', true ); ?>
                <?php endwhile; // end of the loop. ?>
                </article>
            </section><!-- end #content-wrapper-->
            <?php get_sidebar(); ?>
        </div>
 

<?php get_footer(); ?>