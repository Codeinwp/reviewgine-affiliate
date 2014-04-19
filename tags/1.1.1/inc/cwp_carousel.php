			<?php 
			$display_carousel = cwp('cwp_homepage_templates_carousel');
			if ($display_carousel == 'yes') :
			?>
			<section id="main-article-carousel" class="container" >
				<div id="carousel" class="cycle-slideshow" data-cycle-fx=carousel data-cycle-pause-on-hover="true" data-cycle-carousel-visible=5 data-cycle-slides=".c-item" data-cycle-next=".next" data-cycle-prev=".prev" data-cycle-timeout=0>
						<?php
						$carousel_category = cwp('cwp_carousel_posts_category');
						$args = array(
							'post_type'        => array('post'),
							'category_name'    => $carousel_category
							);

						$posts = get_posts($args);
						foreach ( $posts as $post ) : setup_postdata( $post ); 
						$post_id = get_the_ID();
						?>
					<div class="c-item">
						<div class="c-image">
							<img src="<?php  echo wp_get_attachment_url(get_post_thumbnail_id($post_id)); ?>" alt="<?php the_title(); ?>"/>
							<div class="c-image-hover">
								<a href="<?php the_permalink(); ?>"></a>
							</div><!-- end .c-image-hover -->
							<div class="c-metadata">
								<div class="c-date"><i class="icon-calendar"></i> <?php the_time('j F');  ?></div><!-- end .c-date -->
								</div><!-- end .c-metadata -->
						</div><!-- end .c-image -->

					</div><!-- end .c-item -->
						<?php endforeach; 
						wp_reset_postdata(); ?>
				</div><!-- end #carousel -->
				<div class="carousel-navigation">
					<a href="#" class="prev"><i class="icon-chevron-left"></i></a><!-- end .left -->
					<a href="#" class="next"><i class="icon-chevron-right"></i></a><!-- end .left -->
				</div><!-- end .carousel-navigation -->
			</section><!-- end #main-article-carousel -->
			<?php endif; ?>