<?php 

/**
 * Loads Custom Panel
 */
 // After theme setup

// Enqueue required scripts
function cwp_theme_setup()
// Custom admin styles
	{ 
	// Load the custom theme control panel.
	require_once( get_template_directory() . '/admin/functions.php' );	

	// Make theme available for translation
	load_theme_textdomain('cwp', get_template_directory() . '/languages');

	// Add theme support for featured images.
	add_theme_support( 'post-thumbnails' ); 

	// Add theme support for automatic feed links in the header.
	add_theme_support( 'automatic-feed-links' );

	// Register the main primary header menu.
	register_nav_menus( array(
        'primary' => __( 'Primary Header Menu', 'cwp' ),
    ) );

	// Register the top bar menu.
	register_nav_menus( array(
        'secondary' => __( 'Top Bar Menu', 'cwp' ),
    ) );

	add_theme_support( 'custom-background');

    // Load the theme custom widgets.
    require_once( get_template_directory()."/inc/cwp_popular_articles_widget.php"); // Popular Articles Widget

    // Create the default "Uncategorized" category if it doesn't exist.
    if (file_exists (ABSPATH.'/wp-admin/includes/taxonomy.php')) {
        require_once (ABSPATH.'/wp-admin/includes/taxonomy.php'); 
        if ( !get_cat_ID( 'Uncategorized' ) ) {
            wp_create_category( 'Uncategorized' );
        }
    }

	}


/**
 * Gets the social links.
 */

function cwp_get_social_links()
	{
		$facebook_link = cwp("cwp_social_facebook");
		$twitter_link = cwp("cwp_social_twitter");
		$google_link = cwp("cwp_social_google");
		$pinterest_link = cwp("cwp_social_pinterest");
		$youtube_link = cwp("cwp_social_youtube");

		if(!empty($facebook_link)) {
			echo "<li class='facebook'><a href='{$facebook_link}'><i class='icon-facebook-sign'></i></a></li>";
		}
		if(!empty($pinterest_link)) {
			echo "<li class='pinterest'><a href='{$pinterest_link}'><i class='icon-pinterest'></i></a></li>";
		}
		if(!empty($twitter_link)) {
			echo "<li class='twitter'><a href='{$twitter_link}'><i class='icon-twitter'></i></a></li>";
		}
		if(!empty($google_link)) {
			echo "<li class='google'><a href='{$google_link}'><i class='icon-google-plus'></i></a></li>";
		}
		if(!empty($youtube_link)) {
			echo "<li class='youtube'><a href='{$youtube_link}'><i class='icon-youtube-play'></i></a></li>";
		}
	}


/**
 * Gets the logo.
 */

function cwp_get_logo()
	{
		$logo = cwp("cwp_logo");
		if(empty($logo)) {
			$logo = "";
		} else { 
			$logo = cwp("cwp_logo");
		}
		echo $logo;
	}


/**
 * Gets the Advertising Banner.
 */

function cwp_get_ad_banner() 
	{
		$cwp_header_banner_bool = cwp("cwp_header_banner_bool");
		$ad_banner = cwp("cwp_banner_image");
		$ad_banner_text = cwp("cwp_header_banner_alt");
		$ad_banner_link = cwp("cwp_header_banner_url");
		
		if(is_active_sidebar('banners-sidebar'))
		{
			dynamic_sidebar('banners-sidebar');
		}
		else if(!empty($cwp_header_banner_bool) && !empty($ad_banner) && !empty($ad_banner_text) && !empty($ad_banner_link))
		{		
			if( $cwp_header_banner_bool == "yes")
			{
				if(!empty($ad_banner))
					{
						echo "<a href='" . esc_url($ad_banner_link) . "'><img src='{$ad_banner}' alt='". esc_html($ad_banner_text) . "'/></a>";
						
					}
			}
		}
	}

/**
 * Display Comments.
 */

function cwp_comments($comment, $args, $depth) 
	{
		$GLOBALS['comment'] = $comment;
		if(get_comment_type() == 'pingback' || get_comment_type() == 'trackback') : ?>

		<li class="pingback" id="comment-<?php comment_ID(); ?>">
			<div <?php comment_class('comment-body'); ?>>
				<cite><?php echo "Pingback:"; ?></cite>
				<p class="pb-body"><?php comment_author_link(); ?></p><!-- end .pb-body -->
			</div><!-- end .comment-body -->
		</li><!-- end .pingback -->

		<?php elseif (get_comment_type() == "comment") : ?>

		<li id="comment-<?php comment_ID(); ?>" class="comment clearfix">
			<div <?php comment_class('comment-body'); ?>>
				<div class="comment-author vcard">
					<?php $avatar_size=80;
						if($comment->comment_parent != 0) {
							$avatar_size = 50;
						}
						echo get_avatar($comment, $avatar_size);
					 ?>
					<cite class="fn"><?php comment_author_link(); ?></cite>
					<span class="said"><?php _e("said:", "cwp"); ?></span>
				</div><!-- end .comment-author -->

				<div class="comment-meta">
				<?php comment_date(); ?> at <?php comment_time(); ?>											
				</div><!-- end .comment-meta -->
				<div class="clearfix"></div>
				<?php if ($comment->comment_approved == 0): ?>
					<p class="under-moderation"><?php _e("Your comment is awaiting moderation.", "cwp"); ?></p>
				<?php endif; ?>


				<?php comment_text(); ?>
				<div class="comment-reply">
				<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
				</div><!-- end .comment-reply -->
				<div class="clearfix"></div>	
			</div><!-- end .comment-body -->
		<?php endif;
	}


function cwp_comment_form($defaults)
	{
		$defaults['comment_notes_after'] = '';
		$defaults['comment_notes_before'] = '';
		$defaults['id_form'] = 'add-new-comment';
		return $defaults; 
	}


/**
 * Loading the necessary theme scripts.
 */
function cwp_load_req_scripts()
	{
		// Deregister jQuery and load custom jQuery for better theme and plugins compatibility.
		wp_enqueue_script( 'jquery' );
		// Register and enqueue jQuery UI. 
		wp_enqueue_script( 'jqueryui', get_template_directory_uri() .'/js/jquery-ui.js', array('jquery'), null, false ); 
	

		// Register and enqueue excanvas javascript plugin for older browsers.
		wp_enqueue_script( 'excanvas-js', get_template_directory_uri() . '/js/excanvas.js', array( 'jquery' ) );
		

		// Register and enqueue piechart javascript plugin for review piecharts.
		wp_enqueue_script( 'piechart-js', get_template_directory_uri() . '/js/pie-chart.js', array( 'jquery' ) );
		

		// Register and enqueue HTML5 Shiv.
		wp_enqueue_script( 'html5-js', get_template_directory_uri() . '/js/html5.js', array(), null, false );
		

		// Register and enqueue jQuery Cycle Plugin.
		wp_enqueue_script( 'cycle2-js', get_template_directory_uri() . '/js/jquery.cycle.js', array( 'jquery' ) );

		// Register and enqueue jQuery Superfish Plugin.
		wp_enqueue_script( 'superfish-js', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ) );


		// Register and enqueue jQuery MeanMenu Plugin.
		//wp_enqueue_script( 'meanmenu-js', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', array( 'jquery' ) );
		//wp_enqueue_script( 'meanmenu-js' );

		// Register and enqueue the main JavaScript file.
		wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );


		// Register and enqueue the base css framework.
		wp_enqueue_style( 'cwp-css-base', get_template_directory_uri() . '/css/base.css'); 

		// Register and enqueue the core css styles.
		wp_enqueue_style( 'cwp-css-core', get_template_directory_uri() . '/css/core.css'); 

		// Register and enqueue Font Awesome minified. 
		wp_enqueue_style( 'cwp-css-font-awesome-min', get_template_directory_uri() . '/css/font-awesome.css'); 

		// Register and enqueue Font Awesome minified for IE7
		wp_enqueue_style( 'cwp-css-font-awesome-min-ie', get_template_directory_uri() . '/css/font-awesome-ie7.min.css'); 

		// Register and enqueue jQuery UI Smoothness theme.
		wp_enqueue_style( 'cwp-jqueryui-smoothness', get_template_directory_uri() . '/css/jquery-ui.css'); 

		// Register and enqueue the main stylesheet.
		wp_enqueue_style( 'cwp-main-css', get_stylesheet_uri()); 

		// Register and enqueue the custom css file.
		wp_enqueue_style( 'cwp-custom-css', get_template_directory_uri() . '/custom.css.php'); 


		// Register and enqueue the responsive css file.
		wp_enqueue_style( 'cwp-responsive-css', get_template_directory_uri() . '/css/responsive.css'); 


	}


/**
 * Load scripts in admin panel.
 */
function cwp_register_sidebars()
	{
		register_sidebar(array(
			'name' => __('Main Sidebar', 'cwp'),
			'id' => 'main-sidebar',
			'description' => __('This sidebar appeares on all templates.', 'cwp'),
			'before_widget' => '<div class="sidebar-widget">',
			'after_widget' => '</section></div>',
			'before_title' => '<header><h2>',
			'after_title' => '</h2></header><section class="widget-container">',
			));

		register_sidebar(array(
			'name' => __('Footer Sidebar', 'cwp'),
			'id' => 'footer-sidebar',
			'description' => __('Drag here widgets that you would like to appear in the footer.', 'cwp'),
			'before_widget' => '<div class="footer-widget">',
			'after_widget' => '</div>',
			'before_title' => '<section><h3>',
			'after_title' => '</h3></section>',
			));
	}


function cwp_paginate()
	{
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

	$pagination = array(
	    'base' => @add_query_arg('page','%#%'),
	    'format' => '',
	    'total' => $wp_query->max_num_pages,
	    'current' => $current,
	    'show_all' => true,
	    'type' => 'list',
	    'next_text' => '&raquo;',
	    'prev_text' => '&laquo;'
	    );

	if( $wp_rewrite->using_permalinks() )
	    $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 'page', get_pagenum_link( 1 ) ) ) . '?page=%#%/', 'paged' );

	if( !empty($wp_query->query_vars['s']) )
	    $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
		echo paginate_links( $pagination );
	}


/**
 * Loading the custom styles for the admin dashboard.
 */

function cwp_admin_custom_styles()
	{
	    $url = get_template_directory_uri() . '/css/dashboard_styles.css';
	    echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
	}

function cwp_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'cwp_editor_styles' );



/**
 * Setting up the default title.
 */
function cwp_default_title($title)
	{
		if($title == "") { $title = __("Default Title", "cwp"); }
		return $title;
	}


if ( ! isset( $content_width ) ) $content_width = 475;

/**
 * Filters the page title appropriately depending on the current page
 */
function filter_wp_title( $title ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	$site_description = get_bloginfo( 'description' );

	$filtered_title = $title . get_bloginfo( 'name' );
	$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
	$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s','cwp' ), max( $paged, $page ) ) : '';

	return $filtered_title;
}

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'cwp_required_plugins' );
function cwp_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository
		array(
			'name' 		=> 'WP Product Review',
			'slug' 		=> 'wp-product-review',
			'required' 	=> false,
		),

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'cwp';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'cwp',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}

/**
 * Hooks.
 */
// Title Filter
add_filter( 'wp_title', 'filter_wp_title' );
// Register Sidebars
add_action( 'widgets_init', 'cwp_register_sidebars' );
// After theme setup
add_action( 'after_setup_theme', 'cwp_theme_setup' ); 
// Enqueue required scripts
add_action( 'wp_enqueue_scripts', 'cwp_load_req_scripts' );
// Custom admin styles
add_action( 'admin_head', 'cwp_admin_custom_styles');


/**
 * Filters.
 */
add_filter('comment_form_defaults', 'cwp_comment_form');
add_filter('widget_title', 'cwp_default_title');
add_filter('the_title', 'cwp_default_title');
