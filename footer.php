<div id="main-content">
		<footer id="main-footer">
			<div class="container">

						<?php
     			if(is_active_sidebar("footer-sidebar")) {
     				dynamic_sidebar("footer-sidebar");
     			} else { 
     				$args = array(
						'before_widget' => '<div class="footer-widget">',
						'after_widget' => '</div>',
						'before_title' => '<section><h3>',
						'after_title' => '</h3></section>',
     				);
     				$text_widget = array(
     						'title'	=> __('About Reviewgine','cwp'),
     						'text'	=> __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, ducimus, nisi, vitae, veritatis praesentium eos tempore autem ipsa veniam maxime voluptatibus sint mollitia nostrum fuga facere dolore error adipisci tempora.','cwp')
     					);
     				$recent_posts = array(
     						'title'	 => __('Recent Posts','cwp'),
     						'number' => '5'
     					);
     				$recent_comments = array(
     						'title'	 => __('Recent Comments','cwp'),
     						'number' => '5'
     					);
     				$meta_widget = array(
     						'title' => __('Meta','cwp')
     					);

					the_widget('WP_Widget_Text', $text_widget, $args);
					the_widget('WP_Widget_Recent_Posts',$recent_posts, $args);
					the_widget('WP_Widget_Recent_Comments', $recent_comments, $args);
					the_widget('WP_Widget_Meta', $meta_widget, $args);
				}

     	?>

			</div><!-- end .container -->
		</footer><!-- end #main-footer -->

		<div id="lower-footer">
			<div class="container">
				<div class="left"><?php echo cwp("cwp_footer_message"); ?></div>
				<div class="right">
			<a href="http://www.readythemes.com/reviewgine-lite/" title="Reviewgine Theme" rel="nofollow">
				Reviewgine Theme</a>
			<?php _e("powered by",'cwp');?> <a href="http://wordpress.org/" title="WordPress">
				WordPress</a>
		</div>
			</div><!-- end .container -->
		</div><!-- end #lower-footer -->
	</div><!-- end .wrapper -->


<?php echo cwp("cwp_custom_body_code"); ?>
	<?php wp_footer(); ?>
</body>
</html>
