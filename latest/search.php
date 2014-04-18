<?php get_header(); ?>
<div id="main-content">
			<div class="container search-results">
				<section id="content-wrapper" class="page">
					
					<div class="sr-head">
						<h2><?php _e("Search results for:", "cwp"); ?> <span>"<?php echo $s; ?>"</span></h2>
					</div><!-- end .sr-head -->

					<div id="post-area" class="hfeed">
					<?php if(have_posts()) { while ( have_posts() ) : the_post() ?>

					<div class="latest-wide-article">
						<div class="lw-article-inner">
							<div class="lw-image">
								<div class="lw-image-shadow"></div>
								<?php if(!empty($post_featured_image)) { ?>
								<img src="<?php  echo $post_featured_image; ?>" alt="<?php the_title(); ?>">
								<?php } else { 
									echo "<p style='font-style:italic; text-align: center; padding-top: 36px; font-size: 14px; color:#c4c4c4;'>";
									_e("No featured image added.", "cwp"); 
									echo "</p>";
								}?>
								<div class="lw-comments">
									<a href="<?php comments_link(); ?>"><h6><i class="icon-comments"></i> <?php comments_number( '0 Comments', '1 Comment', '% Comments' );  ?></h6></a>
								</div><!-- end .lw-comments -->
							</div><!-- end .lw-image -->
							<div class="lw-title">
								<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
							</div><!-- end .lw-title -->
							<div class="lw-metadata">
								<div class="lw-author"><i class="icon-user"></i><?php the_author_posts_link(); ?></div><!-- end .lw-author -->
								<div class="lw-date"><i class="icon-calendar"></i> <?php the_time('j F Y'); ?></div><!-- end .lw-date -->
							</div><!-- end .lw-metadata -->
							<div class="lw-excerpt">
								<p><?php the_excerpt(); ?></p>
							</div><!-- end .lw-excerpt -->
						</div><!-- end .lw-article-inner -->
					</div><!-- end .latest-wide-article -->
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