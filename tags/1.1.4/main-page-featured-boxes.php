						<?php
						$featured_category = cwp('cwp_site_categories2');
						$args = array(
							'posts_per_page'   => 1,
							'offset'           => 0,
							'post_type'        => array('post'),
							'category_name'  => $featured_category,

								
							);

						$cwp_query = new WP_Query($args);
						if ($cwp_query->have_posts()) {
  						while ($cwp_query->have_posts()) : $cwp_query->the_post();
  						$post_id = $post->ID; 
						?>
			<section id="main-page-featured" class="container clearfix">
				<div id="featured-boxes" class="clearfix">
					<header class="clearfix">
						<i class="icon-star"></i>
						<h2><?php _e("Featured Titles", "cwp"); ?></h2>
					</header>
					<div class="featured-boxes-inner">


						<div class="featured-big fresh-green">
							<div class="fb-image">
								<div class="featured-image-overlay"></div>
																<?php 
								$post_featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
								if(!empty($post_featured_image)) { ?>
								<img src="<?php  echo $post_featured_image; ?>" alt="<?php the_title(); ?>">
								<?php } else { 
									echo "<p style='font-style:italic; text-align: center; padding-top: 55px; font-size: 14px; color:#c4c4c4; text-decoration: none; '>";
									_e("No image.", "cwp");
									echo "</p>";
								}?>
							</div><!-- end .fb-image -->
							<div class="fb-title">
								<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
								<div class="fb-comments">
									<a href="<?php comments_link(); ?>"><h6><i class="icon-comment"></i> <?php comments_number( '0 Comments', '1 Comment', '% Comments' );  ?></h6></a>
								</div><!-- end .fb-comments -->
							</div><!-- end .fb-title -->
								
					           
						</div><!-- end .featured-big -->
						<?php 
						endwhile; wp_reset_postdata(); ?>

						<?php
						$featured_category = cwp('cwp_site_categories2');
						$args = array(
							'posts_per_page'   => 1,
							'offset'           => 1,
							'post_type'        => array('post'),
							'category_name'  => $featured_category,
							
							);

						$cwp_query = new WP_Query($args);
  						while ($cwp_query->have_posts()) : $cwp_query->the_post();
  						$post_id = $post->ID; 
						?>

						<div class="featured-small-container">
							<div class="featured-small salmon">
								<div class="fs-image">
									<div class="featured-image-overlay"></div>
																	<?php 
								$post_featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
								if(!empty($post_featured_image)) { ?>
								<img src="<?php  echo $post_featured_image; ?>" alt="<?php the_title(); ?>">
								<?php } else { 
									echo "<p style='font-style:italic; text-align: center; padding-top: 55px; font-size: 14px; color:#c4c4c4; text-decoration: none; '>";
									_e("No image.", "cwp");
									echo "</p>";
								}?>
								</div><!-- end .fs-image -->
								<div class="fs-title">
									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
									<div class="fs-comments">
										<a href="<?php comments_link(); ?>"><h6><i class="icon-comment"></i> <?php comments_number( '0 Comments', '1 Comment', '% Comments' );  ?></h6></a>
									</div><!-- end .fs-comments -->
								</div><!-- end .fs-title -->
								
							</div><!-- end .featured-small -->
						</div><!-- end .featured-small-container -->

						<?php endwhile; 
						wp_reset_postdata(); ?>


						<?php
						$featured_category = cwp('cwp_site_categories2');
						$args = array(
							'posts_per_page'   => 1,
							'offset'           => 2,
							'post_type'        => array('post'),
							'category_name'  => $featured_category,

							);

						$cwp_query = new WP_Query($args);
  						while ($cwp_query->have_posts()) : $cwp_query->the_post();
  						$post_id = $post->ID; 
						?>
						<div class="featured-small-container">
							<div class="featured-small flat-teal">
								<div class="fs-image">
									<div class="featured-image-overlay"></div>
																	<?php 
								$post_featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
								if(!empty($post_featured_image)) { ?>
								<img src="<?php  echo $post_featured_image; ?>" alt="<?php the_title(); ?>">
								<?php } else { 
									echo "<p style='font-style:italic; text-align: center; padding-top: 55px; font-size: 14px; color:#c4c4c4; text-decoration: none; '>";
									_e("No image.", "cwp");
									echo "</p>";
								}?>
								</div><!-- end .fs-image -->
								<div class="fs-title">
									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
									<div class="fs-comments">
										<a href="<?php comments_link(); ?>"><h6><i class="icon-comment"></i> <?php comments_number( '0 Comments', '1 Comment', '% Comments' );  ?></h6></a>
									</div><!-- end .fs-comments -->
								</div><!-- end .fs-title -->
								
							</div><!-- end .featured-small -->
						</div><!-- end .featured-small-container -->
						<?php endwhile; 
						wp_reset_postdata(); ?>


						<?php
						$featured_category = cwp('cwp_site_categories2');
						$args = array(
							'posts_per_page'   => 1,
							'offset'           => 3,
							'post_type'        => array('post'),
							'category_name'  => $featured_category,
							);
							

						$cwp_query = new WP_Query($args);
  						while ($cwp_query->have_posts()) : $cwp_query->the_post();
  						$post_id = $post->ID; 
						?>
						<div class="featured-wide-container">
							<div class="featured-wide summer-yellow">
								<div class="fw-image">
									<div class="featured-image-overlay"></div>
																	<?php 
								$post_featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
								if(!empty($post_featured_image)) { ?>
								<img src="<?php  echo $post_featured_image; ?>" alt="<?php the_title(); ?>">
								<?php } else { 
									echo "<p style='font-style:italic; text-align: center; padding-top: 55px; font-size: 14px; color:#c4c4c4; text-decoration: none; '>";
									_e("No image.", "cwp");
									echo "</p>";
								}?>
								</div><!-- end .fw-image -->
								<div class="fw-title">
									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
									<div class="fw-comments">
										<a href="<?php comments_link(); ?>"><h6><i class="icon-comment"></i> <?php comments_number( '0 Comments', '1 Comment', '% Comments' );  ?></h6></a>
									</div><!-- end .fw-comments -->
								</div><!-- end .fw-title -->
								
							</div><!-- end .featured-wide -->
						</div><!-- end .featured-wide-container -->
						<?php endwhile; 
						wp_reset_postdata(); ?>

				</div>
				</div><!-- end #featured-boxes -->

				<div id="review-categories">
					<header class="clearfix">
						<i class="icon-reorder"></i>
						<h2><?php _e("Popular Categories", "cwp"); ?></h2>
					</header>
					<div class="review-categories-inner">
						<ul>
							<?php echo wp_list_categories('title_li=&number=8&orderby=count&order=desc'); ?>
						</ul>
					</div><!-- end .review-categories-inner -->
				</div><!-- end #review-categories -->
			</section><!-- end .main-page-featured -->
			<?php } ?>