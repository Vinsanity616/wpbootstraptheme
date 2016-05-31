
					<footer>	
						<div class="container">
							<div class="row">
								<section class="col-sm-4">
							      	<?php wp_nav_menu( array('menu' => 'Footer Menu')); ?>
								</section>
								<section class="col-sm-4">
									<div class="social">
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
									</div>
								</section>
								<section class="col-sm-4">
									<div id="copyright">
										<?php echo $sa_settings['footer_copyright']; ?>
									</div>
								</section>
							</div>
						</div>

					</footer>

					<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
					<script defer src="<?php bloginfo ( 'stylesheet_directory' ); ?>/js/bootstrap.min.js"></script>
					<script defer src="<?php bloginfo ( 'stylesheet_directory' ); ?>/js/smoothscroll.js"></script>
			        <script defer src="<?php bloginfo ( 'stylesheet_directory' ); ?>/js/jquery.scrollUp.min.js"></script>
			        <script defer src="<?php bloginfo ( 'stylesheet_directory' ); ?>/js/custom.js"></script>

			        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
				    <!--[if lt IE 9]>
				      <script src="<?php bloginfo ( 'stylesheet_directory' ); ?>/js/html5shiv.js"></script>
				      <script src="<?php bloginfo ( 'stylesheet_directory' ); ?>/js/respond.min.js"></script>
				    <![endif]-->

				    <!--[if lt IE 8]>
					        <link href="/css/bootstrap-ie7.css" rel="stylesheet">
					<![endif]-->
					<!-- enqueue script -->

		<?php wp_footer(); ?>
	</body>
</html>