<?php 
/**
 * CWP - Top Producs Widget 
 */

class cwp_popular_articles_widget extends WP_Widget {

function __construct() {
parent::__construct(
'cwp_popular_articles_widget', 
__('CWP Popular Articles Widget', 'cwp'), 

// Widget description
array( 'description' => __( 'This widget displays the most popular articles.', 'cwp' ), ) 
);

}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$no_items = apply_filters( 'widget_content', $instance['no_items'] );
		$cwp_pa_category = apply_filters( 'widget_content', $instance['cwp_pa_category'] );

		echo "<div id='cwp_popular_articles_widget'>";
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		// Loop to get the most popular posts, ordered by the author's final grade.
		$query_args = array(
			'category_name' => $cwp_pa_category, // limit it to the specified category
			'posts_per_page'=> $no_items, // limit it to the specified no of posts
			'post_type'		=> array('review','post') // Fetch both posts and reviews 
		);

		$cwp_top_products_loop = new WP_Query( $query_args );  
		while($cwp_top_products_loop->have_posts()) : $cwp_top_products_loop->the_post(); ?>
        <?php $postid = get_the_ID(); ?>
			<div class="popular-article clearfix">

				<a href="<?php the_permalink(); ?>">
					<div class="pa-image">
						<?php $post_featured_image = wp_get_attachment_url(get_post_thumbnail_id($postid)); ?>
						<?php if(!empty($post_featured_image)) { ?>
						<img src="<?php  echo $post_featured_image; ?>" alt="<?php the_title(); ?>">
						<?php } else { 
							echo "<p style='font-style:italic; text-align: center; padding-top: 36px; font-size: 14px; color:#c4c4c4;'>No featured image added.</p>";
						}?>
					</div>
				</a>
				<div class="pa-metadata">
					<div class="pa-author"><i class="icon-user"></i> <?php the_author_posts_link(); ?></div><!-- end .pa-author -->
					<div class="pa-date"><i class="icon-calendar"></i> <?php the_time('j F Y'); ?></div><!-- end .pa-date -->
				</div><!-- end .pa-metadata -->
				<div class="pa-title"><a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a></div><!-- end .pa-title -->
			</div><!-- end .popular-article -->

		<?php endwhile; ?>
		<?php wp_reset_postdata(); // reset the query 

		echo $args['after_widget'];
		echo "</div>"; // end #cwp_popular_articles_widget
	}

	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
			$no_items = $instance[ 'no_items' ];
			$cwp_pa_category = $instance[ 'cwp_pa_category' ];
		}
		else {
			$title = __( 'Popular Articles', 'cwp' );
			$no_items = __( '10', 'cwp');
			$cwp_pa_category = __('Select Category', 'cwp');
		}

		$cwp_pa_categ_array = get_categories('hide_empty=0');
		foreach ($cwp_pa_categ_array as $categs) {
			$cwp_pa_all_categories[$categs->slug] = $categs->name;
		}

	// Widget admin form
	?>
	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', "cwp" ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>

	<p>
	<label for="<?php echo $this->get_field_id( 'no_items' ); ?>"><?php _e( 'Number of posts to show:', "cwp" ); ?></label> 
	<input id="<?php echo $this->get_field_id( 'no_items' ); ?>" name="<?php echo $this->get_field_name( 'no_items' ); ?>" size="3" type="text" value="<?php echo esc_attr( $no_items ); ?>" />
	</p>

	<p>
	<?php $cwp_pa_selected_categ = esc_attr( $cwp_pa_category ); ?>
	<label for="<?php echo $this->get_field_id( 'cwp_pa_category' ); ?>"><?php _e( 'Category:', "cwp" ); ?></label> 
	<select id="<?php echo $this->get_field_id( 'cwp_pa_category' ); ?>" name="<?php echo $this->get_field_name( 'cwp_pa_category' ); ?>">
	<?php foreach ($cwp_pa_all_categories as $categ_slug => $categ_name): ?>
			<?php if($categ_slug == $cwp_pa_selected_categ) {
				echo "<option selected>".$categ_slug."</option>";
			} elseif($categ_slug == "") {
				echo "<option>";
				_e("There are no categories", "cwp"); 
				echo "</select>";
			} else { 
				echo "<option>".$categ_slug."</option>";
			} ?>
	<?php endforeach; ?>
	</select>
	</p>

	<?php }
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['no_items'] = ( ! empty( $new_instance['no_items'] ) ) ? strip_tags( $new_instance['no_items'] ) : '';
		$instance['cwp_pa_category'] = ( ! empty( $new_instance['cwp_pa_category'] ) ) ? strip_tags( $new_instance['cwp_pa_category'] ) : '';

		return $instance;
	}

} // end Class cwp_popular_articles_widget


// Register and load the widget
function cwp_load_popular_articles_widget() {
	register_widget( 'cwp_popular_articles_widget' );
}
add_action( 'widgets_init', 'cwp_load_popular_articles_widget' );