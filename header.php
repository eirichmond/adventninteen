<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adventninteen
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="cookies">This website uses cookies to allow us to see how the site is used. If you continue to use this site, we assume that you are okay with this.
If you want to use the sites without cookies, please see our <a href="/privacy-policy/">privacy policy.</a></div>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'adventninteen' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<div class="site-branding-left">
				<?php the_custom_logo();
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$adventninteen_description = get_bloginfo( 'description', 'display' );
				if ( $adventninteen_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $adventninteen_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div>
			<div class="site-branding-right">
				
				<a class="btn" href="<?php echo esc_url( wp_registration_url() ); ?>"><i class="fas fa-envelope-open-text reg-icon"></i><?php esc_html_e( 'Register to receive snippet updates!', 'textdomain' ); ?></a>
			</div>


		</div><!-- .site-branding -->

		<!-- <nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'adventninteen' ); ?></button>
			<?php //wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', ) ); ?>
		</nav> -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
