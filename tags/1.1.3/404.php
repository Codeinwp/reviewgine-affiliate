<?php get_header(); ?>
			<div class="container nf-template">
				<section id="content-wrapper" class="page">
					 <h1><?php _e("404", "cwp"); ?></h1>
					<h4><?php _e("Error! Page not found!", "cwp"); ?></h4>
					<p><?php _e("It looks like you may have taken a wrong turn, because there's nothing here.", "cwp"); ?></p>

					<div class="nf-search">
						<?php get_search_form(); ?>
					</div><!-- end .nf-search -->
				</section><!-- end #content-wrapper-->
			</div> <!-- end .container -->
<?php get_footer(); ?>