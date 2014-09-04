<?php
	class cwpConfig{
		public static $admin_page_menu_name ;
		public static $admin_page_title;
		public static $admin_page_header;
		public static $admin_template_directory ;
		public static $admin_template_directory_uri ;
		public static $admin_uri;
		public static $admin_path;
		public static $menu_slug;
		public static $structure;
		public static $review_categories_array;
		public static $categories_array;
		public static $shortname;
		public static $all_review_categories_array;
		public static $all_categories_array;
		public static $categories_ids;

		public static function init(){
			self::$admin_page_menu_name 	 = "Theme Options";
			self::$admin_page_title 		 = "Theme Options";
			self::$admin_page_header	 	 = "Reviewgine Theme Options";
			self::$shortname 			     = "cwp";
			self::$admin_template_directory_uri  = get_template_directory_uri() . '/admin/layout';
			self::$admin_template_directory  = get_template_directory() . '/admin/layout';
			self::$admin_uri  		= 	get_template_directory_uri() . '/admin/'; 
			self::$admin_path 	 	= 	get_template_directory() . '/admin/';
			self::$menu_slug  		= 	"theme_options";
			self::$all_categories_array = array();
			self::$all_review_categories_array = array();
			self::$categories_array = array();
			self::$categories_array = get_categories('hide_empty=0');
			self::$review_categories_array = get_categories('hide_empty=0');

			foreach (self::$categories_array as $categs) {
				self::$all_categories_array[$categs->slug] = $categs->name;
			}
			
			foreach (self::$review_categories_array as $categs) {
				self::$all_review_categories_array[$categs->slug] = $categs->name;
			}

			self::$structure	= array(
						array(
							 "type"=>"tab",
							 "name"=>"General Options",
							 "options"=>array(

								array(
									"type"=>"title",
									"name"=>"General"
								),

								array(
									
									"type"=>"image",
									"name"=>"Logo",
									"description"=>"Upload your logo file. (Recommended: PNG File / Width: 240px - Height: 45px)",
									"id"=>self::$shortname . "_logo",
									"default"=>"/img/" 
								),

								array(
									
									"type"=>"image",
									"name"=>"Favicon",
									"description"=>"Upload your favicon file. This icon will appear in your browser's tab left corner.",
									"id"=>self::$shortname . "_favicon",
									"default"=>"" 
								),

								array(
									
									"type"=>"textarea",
									"name"=>"Custom CSS",
									"description"=>"This feature allows you to add your own custom CSS code to overwrite or extend the current style.",
									"id"=>self::$shortname . "_custom_css",
									"default"=>""
								),

								array(
									"type"=>"title",
									"name"=>"Home Page"
								),

								array(
									
									"type"=>"select",
									"name"=>"Main Page Template",
									"description"=>"Select your prefered main page template. Consult the documentation for more details.",
									"id"=>self::$shortname . "_mpt_template",
									"options"=>array(
										"mpt_review"=>"Default Review Template",
										"mpt_blog_style"=>"Blog Style Review Template",
										"mpt_custom_static_page" => "Custom Static Page"
									),
									"default"=>"mpt_review"
								),

								 array(
									"type"=>"select",
									"name"=>"Main Page Featured Review Category",
									"description"=>"Select which review category do you want to be used as Featured.",
									"id"=>"cwp_site_categories2",
									"options" =>self::$all_review_categories_array,
									"default" => "uncategorized"
								),

								array(
									"type"=>"radio",
									"name"=>"Display Carousel on Homepage Template ?",
									"description"=>"Select if you want to display the carousel at the bottom of every homepage template or not.",
									"id"=>self::$shortname . "_homepage_templates_carousel",
									"options"=>array(
										"yes"=>"Display",
										"no"=>"Don't Display",
									),
									"default"=>"yes"
								),

								 array(
									"type"=>"select",
									"name"=>"Homepage Carousel Posts Category",
									"description"=>"From which category do you want the carousel to get the posts ? (Note: You must have at least 5 posts in that category in order for the carousel to display properly)",
									"id"=>self::$shortname . "_carousel_posts_category",
									"options"=>self::$all_categories_array,
									"default"=> "uncategorized"
								),
							
							 )
						),

						array(
							"type"=>"tab",
							"name"=>"Social Networks Configuration",
							"options"=>array(
								array(
									 "type"=>"input_text",
									 "name"=>"Facebook",							 
									 "description"=>"Paste your Facebook Profile URL below:",
									 "id"=>self::$shortname . "_social_facebook",
									 "default"=>""
								   ),

								array(
									 "type"=>"input_text",
									 "name"=>"Twitter",							 
									 "description"=>"Paste your Twitter Profile URL below:",
									 "id"=>self::$shortname . "_social_twitter",
									 "default"=>""
								   ),

								array(
									 "type"=>"input_text",
									 "name"=>"Google+",							 
									 "description"=>"Paste your Google+ Profile URL below:",
									 "id"=>self::$shortname . "_social_google",
									 "default"=>""
								   ),

								array(
									 "type"=>"input_text",
									 "name"=>"Pinterest",							 
									 "description"=>"Paste your Pinterest Profile URL below:",
									 "id"=>self::$shortname . "_social_pinterest",
									 "default"=>""
								   ),

								array(
									 "type"=>"input_text",
									 "name"=>"YouTube",							 
									 "description"=>"Paste your YouTube Profile URL below:",
									 "id"=>self::$shortname . "_social_youtube",
									 "default"=>""
								   )


												)
						),
						array(
							"type"=>"tab",
							"name"=>"Layout Settings",
							"options"=>array(
								array(
									"type"=>"title",
									"name"=>"Review Template"
								),

								
								array(									
									"type"=>"radio",
									"name"=>"Sticky Post Badge",
									"description"=>"Would you like to display a ribbon on sticky posts?",
									"id"=>"cwp_sticky_posts_badge",
									"options"=>array(
										"yes"=>"Display",
										"no"=>"Don't Display",
									),
									"default"=>"yes"
								),

								array(									
									"type"=>"radio",
									"name"=>"Use and display Slider Revolution Plugin ?",
									"description"=>"Would you like to use and display the Slider Revolution Plugin?",
									"id"=>"cwp_use_slider",
									"options"=>array(
										"yes"=>"Use",
										"no"=>"Don't Use",
									),
									"default"=>"no"
								),

								array(
								 "type"=>"input_text",
								 "name"=>"Footer Copyright Message",							 
								 "description"=>"What message would you like to be displayed in the footer bar.",
								 "id"=>"cwp_footer_message",
								 "default"=>"Copyright (C) 2014"
							   ),


												)
						),
					
						array(
							"type"=>"tab",
							"name"=>"Integration",
							"options"=>array(
								array(
									
									"type"=>"textarea_html",
									"name"=>"Header Code",
									"description"=>"This feature allows you to add code inside the head.",
									"id"=>"cwp_custom_head_code",
									"default"=>""
								),

								array(
									
									"type"=>"textarea_html",
									"name"=>"Body Code",
									"description"=>"This feature allows you to add code below the body closing tag.",
									"id"=>"cwp_custom_body_code",
									"default"=>""
								),

							)
						),

						array(
							"type"=>"tab",
							"name"=>"Colors",
							"options"=>array(

								array(
									"type"=>"title",
									"name"=>"General"
								),

								array(
									"type"=>"title",
									"name"=>"Top Bar"
								),

								array(	
									"type"=>"color",
									"name"=>"Header Top Bar Color",
									"description"=>"Select what color do you want to be used for the top bar.",
									"id"=>"cwp_templates_topbar_colorid",
									"default"=>"#22262a"
								),

								array(	
									"type"=>"color",
									"name"=>"Header Top Bar Link Color",
									"description"=>"Select what color do you want to be used for the top bar links.",
									"id"=>"cwp_templates_topbar_link_colorid",
									"default"=>"#7f8c97"
								),

								array(
									"type"=>"title",
									"name"=>"Header"
								),

								array(	
									"type"=>"color",
									"name"=>"Header Background Color",
									"description"=>"Select what color do you want to be used as a header background color.",
									"id"=>"cwp_templates_header_background_colorid",
									"default"=>"#282e33"
								),

								array(	
									"type"=>"color",
									"name"=>"Link Hover Color",
									"description"=>"Select what color do you want to be used on hover.",
									"id"=>"cwp_link_hover_color",
									"default"=>"#50c1e9"
								),

								array(	
									"type"=>"color",
									"name"=>"Link Hover Color",
									"description"=>"Select what color do you want to be used on hover.",
									"id"=>"cwp_button_hover_color",
									"default"=>"#50c1e9"
								),
							)
						),

		
					);


			 
		}	 
	
	} 
