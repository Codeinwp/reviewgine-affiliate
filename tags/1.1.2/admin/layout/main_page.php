<div id="cwp_container" style="display:none">
	<form id="cwp_form" method="post" action="#" enctype="multipart/form-data">
	<?php settings_fields( cwp_config("menu_slug")); ?>
 
		<div id="header">
		
			<div class="logo ">
				<h2>

				<img class="theme_options_logo" src="<?php echo get_stylesheet_directory_uri() . "/admin/layout/img/logo-themeisle.png"; ?>" alt="<?php echo cwp_config('admin_page_header'); ?>"> 
				
				<!--<button class="button"><a href="http://www.readythemes.com/reviewgine-lite-tutorial/?r=wporg" class="read_docs" style="text-decoration: none;"><?php _e("Read online documentation", "cwp"); ?></a></button>-->
				
				<button class="button"><a href="http://www.readythemes.com/reviewgine-pro/?r=wporg"  class="read_docs" style="color:red; text-decoration: none; " target="_blank"><?php _e("Buy PRO Version", "cwp"); ?></a></button>
				
				<button class="button"><a href="http://themeisle.com/contact/" class="read_docs" style="text-decoration: none;" target="_blank"><?php _e("Contact us", "cwp"); ?></a></button>
				
				<button class="button"><a href="http://themeisle.com/about-us/" class="read_docs" style="text-decoration: none;" target="_blank"><?php _e("About us", "cwp"); ?></a></button>
				
				<!--<button class="button"><a href="http://codecanyon.net/search?utf8=%E2%9C%93&site=codecanyon.net&category=wordpress&term=affiliate&ref=maldinii" class="read_docs" style="text-decoration: none;"><?php _e("Recommended Plugins", "cwp"); ?></a></button>-->
				
				</h2>
			</div>
		  
			<div class="clear"></div>
		
    	</div>

		<div id="info_bar">
		 
		 <span class="spinner" ></span>
						
			<button  type="button" class="button-primary cwp_save">
				<?php _e('Save All Changes','cwp'); ?>			</button>
			
		 <span class="spinner spinner-reset" ></span>
			<button   type="button" class="button submit-button reset-button cwp_reset"><?php _e('Options Reset','cwp'); ?></button>
		</div><!--.info_bar--> 	
		
		<div id="main">
		
			<div id="cwp_nav">
				<ul>
					<?php foreach ($tabs as $tab) { ?>
					
					
						<li  ><a  href="#tab-<?php echo $tab['id']; ?>"><?php echo $tab['name']; ?></a></li> 	
					
					<?php  } ?></ul>
			</div>

			<div id="content"> 	

					<?php foreach ($tabs as $tab) { ?>
						<div id="tab-<?php echo $tab['id']; ?>" class="tab-section">
							<h2><?php echo $tab['name']; ?></h2>
							
							<?php foreach($tab['elements'] as $element){ ?>
								<?php echo  $element['html']; ?>
							<?php } ?>
						
						</div> 
  
					
					<?php } ?></div>         
      
			<div class="clear"></div>
			
		</div>
		
		<div class="save_bar"> 
		 <span class="spinner " ></span>
			<button  type="button" class="button-primary cwp_save">
				<?php _e('Save All Changes','cwp'); ?>			</button>
			
		 <span class="spinner  spinner-reset" ></span>
			<button   type="button" class="button submit-button reset-button  cwp_reset"><?php _e('Options Reset','cwp'); ?></button>
	 
			
		</div> 
 
	</form>
	
	<div style="clear:both;"></div>
</div>
