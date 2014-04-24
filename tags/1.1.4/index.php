<?php get_header(); ?>
<div id="main-content">
			<div class="container search-results">
				<section id="content-wrapper" class="page">

					<div id="post-area" class="hfeed">
					<?php if(have_posts()) { while ( have_posts() ) : the_post() ?>
                    <?php global $post; $post_featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
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
						<?php endwhile; } else {
							_e("<h1 class='no-results-found'>No results found!</h1>", 'cwp');
						}
						 ?>
					</div><!-- end #post-area -->
						<div class="clearfix"></div>

							<?php global $wp_query;  
	  						if ( $wp_query->max_num_pages > 1 ) : ?>
						<div class="pagination clearfix">
							<div class="pag-left">
								<?php previous_posts_link(__('Newer Posts','cwp'), 0); ?>
							</div><!-- end .pag-left -->
							<div class="pag-right">
								<?php next_posts_link(__('Older Posts','cwp'), 0); ?>
							</div><!-- end .pag-right -->
						</div><!-- end .pagination -->
						<?php endif; ?>
				</section><!-- end #content-wrapper-->

				<?php get_sidebar(); ?>
			</div> <!-- end .container -->
		</div><!-- end #main-content -->
<?php get_footer(); ?>