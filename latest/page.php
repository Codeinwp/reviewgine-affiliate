<?php get_header(); ?>
<div id="main-content">
<div class="container single-template">
				<section id="content-wrapper" class="page">
					<?php while ( have_posts() ) : the_post(); ?>
					<section class="article-head">
						<h1 class="article-title"><?php the_title(); ?></h1><!-- end .article-title -->
					</section><!-- end .article-head -->

					<article id="<?php the_ID(); ?>">
						<?php the_content(); ?>
					</article>
					<?php endwhile; ?>
					<article>

					<?php comments_template(); ?>
				</section><!-- end #content-wrapper-->
			</article>
			</div> <!-- end .container -->

		</div><!-- end #main-content -->
<?php get_footer(); ?>