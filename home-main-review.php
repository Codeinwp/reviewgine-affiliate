<?php get_template_part("main-page-featured-boxes"); ?>
			<div class="container">
				<section id="content-wrapper">
					<div class="latest-wide-article">
					</div><!-- end .latest-wide-article -->
						
						<?php
							$featured_category = cwp('cwp_site_categories2');
							$catId = get_cat_ID($featured_category);
							
						    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }
						    $temp = $wp_query;  
						    $wp_query = null; 
						    $args = array( 'post_type' => 'post', 'post_status'=>'publish' ,'orderby'=>'date', 'order'=>'DESC', 'paged' => $paged,'cat' => -$catId);
						    $wp_query = new WP_Query();
						    $wp_query->query( $args );

						    while ($wp_query->have_posts()) : $wp_query->the_post(); 
						?>

					<div <?php post_class("latest-small-article"); ?>>
						<div class="ls-article-inner">
							<div class="ls-image">
								<a href="<?php the_permalink(); ?>" style="text-decoration:none;">
								<div class="ls-image-shadow"></div>
								<?php $post_featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
								<?php if(!empty($post_featured_image)) { ?>
								<img src="<?php  echo $post_featured_image; ?>" alt="<?php the_title(); ?>">
								<?php } else { 
									echo "<p style='font-style:italic; text-align: center; padding-top: 36px; font-size: 14px; color:#c4c4c4;'>"; 
									_e("No featured image added.", "cwp");
									echo "</p>";
								}?>
								<div class="ls-comments">
									<a href="<?php comments_link(); ?>"><h6><i class="icon-comments"></i> <?php comments_number( '0 Comments', '1 Comment', '% Comments' );  ?></h6></a>
								</div><!-- end .ls-comments -->
								</a>
							</div><!-- end .ls-image -->
							<div class="ls-title">
								<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
							</div><!-- end .ls-title -->
							<div class="ls-metadata">
								<div class="ls-author"><i class="icon-user"></i><?php the_author_posts_link(); ?></a></div><!-- end .ls-author -->
								<div class="ls-date"><i class="icon-calendar"></i> <?php the_time('j F Y'); ?></div><!-- end .ls-date -->
							</div><!-- end .ls-metadata -->
						</div><!-- end .ls-article-inner -->

						<?php 
						if(is_sticky()) {
							$display_sticky = cwp("cwp_sticky_posts_badge");
							if( $display_sticky == "yes") {
								echo "<div class='sticky-ribbon'></div>";
							}
						}
						?>
					</div><!-- end .latest-small-article -->

						<?php endwhile; ?>
						<div class="clearfix"></div>
						<nav>
						   <?php cwp_paginate(); 
						   $wp_query = null;
						   $wp_query = $temp; // Reset ?>
						</nav>
				</section><!-- end #content-wrapper-->
				<?php get_sidebar(); ?>
			</div> <!-- end .container -->
			<?php get_template_part('inc/cwp_carousel'); ?>
		</div><!-- end #main-content -->