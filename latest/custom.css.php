<?php 
include_once("../../../wp-load.php"); 
header("Content-type: text/css", true); ?>
/* Custom CSS Code */
<?php echo cwp('cwp_custom_css'); ?>

header .top-bar-menu a { <?php if(cwp("cwp_templates_topbar_link_colorid") != "") { echo "color:".cwp("cwp_templates_topbar_link_colorid")." !important;"; } ?> }
.main-header { <?php if(cwp("cwp_templates_header_background_colorid") != "") { echo "background:".cwp("cwp_templates_header_background_colorid")." !important;"; } ?> }\
<?php if(cwp("cwp_link_hover_color") != "") { echo "body a:hover { color:".cwp("cwp_link_hover_color")." !important; }"; } ?>
<?php if(cwp("cwp_button_hover_color") != "") { echo "body button:hover, input[type='submit']:hover,#content-wrapper nav ul li a:hover, #content-wrapper nav ul li .current  { background:".cwp("cwp_button_hover_color")." !important; }"; } ?>
