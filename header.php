<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Euro_School
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> style="overflow-x: hidden;">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'euro-school' ); ?></a>

		<header id="masthead" class="site-header">
			<div class="site-branding">


				<div class="logo">
					<div class=" head-wl">
						<div class="row clearfix">
							<div class="col-md-2">
								<div class="headder">
									<a href="index.php"><?php
									the_custom_logo();
									if ( is_front_page() && is_home() ) :
										?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								else :
									?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php
								endif;
								$euro_school_description = get_bloginfo( 'description', 'display' );
								if ( $euro_school_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo $euro_school_description; /* WPCS: xss ok. */ ?></p>
									<?php endif; ?> </a>
								</div>
							</div>
							<div class="col-md-8">
								<div class="main-head">
									<div class="row">
										<div class="col-md-5">
											<img src="<?php bloginfo('stylesheet_directory')?>/assets/images/head1.png" class="img-responsive" style="float: right; ">
										</div>
										<div class="col-md-2">
											<center><img src="<?php bloginfo('stylesheet_directory')?>/assets/images/head2.png" class="img-responsive"></center>
										</div>
										<div class="col-md-5">
											<img src="<?php bloginfo('stylesheet_directory')?>/assets/images/head3.png" class="img-responsive" style="float: left;">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-2">
								<div class="contact-head">
									<form action="#" method="post">

										<?php 
										$mail 				= get_theme_mod( 'euro_school_mail' );
										$contact 			= get_theme_mod( 'euro_school_ph_no' );
										?>
										<div class="input-group">
											<div class="contact-info">
												<h3>Contact Us</h3>
												<?php	if (!empty( $contact )) { ?>
													<p><?php echo esc_attr( $contact ); ?></p>
												<?php } ?>
												<?php	if (!empty( $mail )) { ?>
													<a href="milto:<?php echo esc_attr( antispambot( $mail ) ); ?>"><?php echo esc_attr( antispambot( $mail ) ); ?></a>
												<?php } ?>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- .site-branding -->


			<div class="top-nav">
				<nav class="navbar navbar-default">
					<div class="container">

						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

						<div id="navbar" class="navbar-collapse collapse">
							<?php
							wp_nav_menu( array(
								'menu'            	=> 'primary',
								'theme_location'  	=> 'menu-1',
								'depth'             => 2,
								'container'         => 'ul',
								'container_class'   => 'navbar-collapse collapse',
								'container_id'      => 'navbar',
								'menu_class'        => 'nav navbar-nav',
								'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
								'walker'            => new WP_Bootstrap_Navwalker(),
							) );
							?>
						</div>
					</div>
				</nav>	
			</div>

		</header><!-- #masthead -->

		<div id="content" class="site-content">

