<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="<?php language_attributes(); ?>"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title>
	<?php wp_title(); ?>
	</title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Pingback and Profile -->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php echo cwp("cwp_favicon"); ?>">
	

<?php echo cwp("cwp_custom_head_code"); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="wrapper">
		<header>
			<div class="top-bar" style="background:<?php echo cwp("cwp_templates_topbar_colorid"); ?>;">
				<div class="top-bar-inner container">
					<div class="top-bar-menu">
						<ul>
							<?php wp_nav_menu( array( 'theme_location'   => 'secondary') ); ?>
						</ul>
					</div><!-- end .top-bar-menu -->

					<div class="top-bar-social">
						<ul>
							<?php cwp_get_social_links(); ?>
						</ul>
					</div><!-- end .top-bar-social -->
				</div><!-- end .top-bar-inner .container -->
			</div><!-- end .top-bar -->
			<div class="main-header">
				<div class="main-header-inner container">
					<div class="logo">	
						<a href="<?php echo esc_url(home_url('/')); ?>">
						<?php if(cwp_get_logo() != "" ) : ?>
						<img src="<?php cwp_get_logo(); ?>" alt="<?php bloginfo('name') ?> | <?php bloginfo('description'); ?>" />
						<?php else: ?>
						<h2><?php  bloginfo('name') ?></h2>
						<?php endif; ?>
						</a>
					</div><!-- end .logo -->

					<div id="advertisment">
						<?php cwp_get_ad_banner(); ?>
					</div><!-- end .advertisment -->

					<nav class="main-menu">
						<ul>
						 <?php wp_nav_menu( array( 'theme_location'   => 'primary') ); ?>
						</ul>
					</nav><!-- end .main-menu -->

				</div><!-- end .main-header-inner .container -->
			</div><!-- end .main-header -->
		</header>

		<div id="main-content">