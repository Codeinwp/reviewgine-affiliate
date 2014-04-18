<?php get_template_part("main-page-featured-boxes"); ?>

			<div class="container">
				<section id="content-wrapper" class="page">
					<div id="post-area" class="hfeed">


						<?php
						    if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {$paged = get_query_var('page'); } else {$paged = 1; }

						    $temp = $wp_query;  
						    $wp_query = null; 
						    $args = array( 'post_type' => array('post'), 'orderby'=>'date', 'order'=>'DESC', 'posts_per_page' => 9, 'paged' => $paged);
						    $wp_query = new WP_Query();
						    $wp_query->query( $args );
						    while ($wp_query->have_posts()) : $wp_query->the_post(); 
						?>


						<article class="hentry entry" id="post-<?php echo $post->ID; ?>">
							<div class="entry-image">

								<?php 
								$post_featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
								if(!empty($post_featured_image)) { ?>
								<a href="<?php the_permalink(); ?>">
								<img src="<?php  echo $post_featured_image; ?>" alt="<?php the_title(); ?>">
								<?php } else { 
									echo "<p style='font-style:italic; text-align: center; padding-top: 36px; font-size: 14px; color:#c4c4c4;'>";
									_e("No featured image added.", "cwp");
									echo "</p>";
								}?>
							</a>

								
							</div><!-- end .entry-image -->

							<div class="post-details">
								<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								<ul class="entry-meta">
									<li><p><i class="icon-user"></i><span class="author vcard"><?php the_author_posts_link(); ?></span></p></li>
									

										<?php if(comments_open()) { ?>
										<li><p><i class="icon-comment"></i> <?php comments_popup_link('0','1','%', 'comments'); ?> </p></li>
										<?php } ?>

									
									<li><p><i class="icon-calendar"></i> <span class="published"><?php the_time(get_option('date_format')); ?></span></p></li>
									<li><p><i class="icon-folder-open"></i> <?php the_category(' / ','single'); ?> <?php echo get_the_term_list( $post->ID, 'category', '', ', ', '' ); ?></p></li>
								</ul><!-- end .entry-meta -->

								<div class="post-excrept">
									<p class="entry-summary">
										<?php the_excerpt(); ?>
									</p>
								</div><!-- end .post-excrept -->

								<a href="<?php the_permalink(); ?>" class="post-link"><button><?php _e("Read More", "cwp"); ?></button></a>
							</div><!-- end .post-details -->
						</article><!-- end .entry -->

						<?php endwhile; ?>
						<nav>
						   <?php cwp_paginate(); 
						   $wp_query = null;
						   $wp_query = $temp; // Reset ?>
						</nav>

						<!-- END WORDPRESS LOOP -->

					</div><!-- end #post-area .hfeed -->
				</section><!-- end #content-wrapper-->
				<?php get_sidebar(); ?>
			</div> <!-- end .container -->
			<?php get_template_part('inc/cwp_carousel'); ?>