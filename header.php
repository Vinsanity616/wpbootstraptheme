<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="<?php bloginfo ( 'stylesheet_directory' ); ?>/favicon.ico" />

	<link href="<?php bloginfo ( 'stylesheet_directory' ); ?>/css/styles.css" type="text/css" rel="stylesheet" media="all" />
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
    
</head>
<body <?php body_class(); ?>> 
	
	<header>
		<section class="top-nav">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<section class="social">
						    <ul>
								<?php
							    	global $sa_options;
									$sa_settings = get_option( 'sa_options', $sa_options );
								?>
						    	<?php if( $sa_settings['header_facebook'] != '' ) : ?>	
						    		<li><a href="<?php echo $sa_settings['header_facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<?php endif; ?>
						    	<?php if( $sa_settings['header_twitter'] != '' ) : ?>	
						    		<li><a href="<?php echo $sa_settings['header_twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
								<?php endif; ?>
						    	<?php if( $sa_settings['header_google_plus'] != '' ) : ?>	
						    		<li><a href="<?php echo $sa_settings['header_google_plus']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
								<?php endif; ?>
						    	<?php if( $sa_settings['header_linkedin'] != '' ) : ?>	
						    		<li><a href="<?php echo $sa_settings['header_linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
								<?php endif; ?>
						    	<?php if( $sa_settings['header_pinterest'] != '' ) : ?>	
						    		<li><a href="<?php echo $sa_settings['header_pinterest']; ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
								<?php endif; ?>
						    	<?php if( $sa_settings['header_youtube'] != '' ) : ?>	
						    		<li><a href="<?php echo $sa_settings['header_youtube']; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
								<?php endif; ?>
							</ul>
						</section>
					</div>
				</div>
			</div>
		</section>

		<div class="container">
			<div class="row">
				<section class="header-main-box">

					<section id="logo" class="col-sm-3">
						<a href="<?php echo home_url( '/' ); ?>">
							<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'description' ); ?> | <?php bloginfo( 'name' ); ?>" />
						</a>
					</section>

					<section class="search-block col-sm-9">
						<form role="search" method="get" id="searchform" class="searchform" action="/">
							<div class="input-group">
								<div class="input-group-btn input-group-btn"><button class="btn btn-default" type="submit" title="Search" id="searchsubmit"><i class="fa fa-search"></i></button></div>
								<input id="search" type="text" name="s" id ="s" maxlength="128" autocomplete="off">
							</div>
						</form>
					</section>
					
					<section id="primary-nav" class="col-sm-9">
						<nav role="navigation">
						    <section class="navbar-header">
						      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </button>
						    </section>

						    <section class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							    <section class="nav navbar-nav">
							      	<?php wp_nav_menu( array('menu' => 'Primary')); ?>
							    </section>
							</section>
						</nav>
					</section>

				</section><!-- end col-md-12 -->
			</div><!-- end row -->
		</div><!-- end container -->
	</header>