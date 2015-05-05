<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package unite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- favicon -->

<?php if ( of_get_option( 'custom_favicon' ) ) { ?>
<link rel="icon" href="<?php echo of_get_option( 'custom_favicon' ); ?>" />
<?php } ?>

<!--[if IE]><?php if ( of_get_option( 'custom_favicon' ) ) { ?><link rel="shortcut icon" href="<?php echo of_get_option( 'custom_favicon' ); ?>" /><?php } ?><![endif]-->

<!-- NC State Bootstrap CSS -->
<link href="https://cdn.ncsu.edu/brand-assets/bootstrap/css/bootstrap.css"
rel="stylesheet" media="screen" type="text/css" />

<!-- NC State Fonts -->
<link href="https://cdn.ncsu.edu/brand-assets/fonts/include.css" rel="stylesheet" type="text/css" />

<!-- NC State Utility Bar -->
<script src="https://cdn.ncsu.edu/brand-assets/utility-bar/ub.php?maxWidth=1500"></script>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- NC State Utility Bar -->
<div id="ncstate-utility-bar"></div>

<div id="page" class="hfeed site">
	<div class="container">
		<?php do_action( 'before' ); ?>
		<header id="masthead" class="site-header col-sm-12" role="banner">

				<div class="site-branding col-md-8">
						<div id="logo">
						
						
					<a href="<?php echo home_url(); ?>">
						<img src='<?php echo get_stylesheet_directory_uri(); ?>/img/<?php echo of_get_option('ncsu_logo', 'ncstate-brick-2x1-red.png'); ?>' alt="NC State" class='ncsu-logo' />

						<?php 
							$brick = of_get_option('ncsu_logo', 'ncstate-brick-2x1-red.png');
							$brick_class = '';
							if ($brick == 'ncstate-brick-2x2-red.png') { $brick_class = 'brick2x2'; }
								else { $brick_class = 'brick2x1'; }
							?>

						<?php echo "<h1 class='brick-text ".$brick_class."'>" . get_bloginfo('name') . "</h1>"; ?>
					</a>
					
						</div><!-- end of #logo -->
				</div> <!-- .site-branding .col-md-8 -->

			<div class="social-header col-md-4">
				<div class='search-header-content'>
					<?php get_search_form(); ?>
				</div> <!-- .search-header-content -->

				<?php unite_social(); // Social icons in header ?>

				<h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>

			</div>

		</header><!-- #masthead -->
	</div>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
		        <div class="navbar-header">

				<div class='mobile-social'>
					<?php unite_social(); // Social icons in header ?>
				</div><!-- .mobile-social -->

				<div class='mobile-search'>
					<span class='mobile-search-icon'>k</span>
				</div><!-- .mobile-search -->

		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>

		        </div>

				<?php /*wp_nav_menu( array(
							'theme_location'	=> 'primary',
		                			'depth'         	=> 3,
							'container'		=> 'div',
							'container_class'	=> 'collapse navbar-collapse navbar-ex1-collapse',
							'menu_class'		=> 'nav navbar-nav',
							'fallback_cb'		=> 'wp_bootstrap_navwalker::fallback'
							)
				);*/ ?>

				<?php
		            wp_nav_menu( array(
		                'theme_location'    => 'primary',
		                'depth'             => 2,
		                'container'         => 'div',
		                'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
		                'menu_class'        => 'nav navbar-nav',
		                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		                'walker'            => new wp_bootstrap_navwalker())
		            ); 
		        ?>
		    </div>
		</nav><!-- .site-navigation -->

	<div id="content" class="site-content container">