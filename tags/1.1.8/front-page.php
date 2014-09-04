
<?php  
	if(get_option("show_on_front") != '' && get_option("show_on_front") != false && get_option("show_on_front") != 'posts'){
		get_template_part("page");
	}else { 
		$page_template = cwp("cwp_mpt_template");

		if( $page_template == "mpt_review" )
		{	
			get_header(); 
			get_template_part("home-main-review");
			get_footer();
		}


		else if( $page_template == "mpt_blog_style" )
		{
			get_header();
			get_template_part("home-main-blog");
			get_footer();

		} else if($page_template == "mpt_custom_static_page") {
			get_template_part("page");
		}
	}
?>

