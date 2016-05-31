<?php
/*
 * Template Name: Right Sidebar
 *
 * @Author:	Bevelwise Media
 *
*/
get_header();
?>	

	<!-- START HOME BANNER SECTION -->
	<div class="home_banner_cont">
		<div class="home_banner clearfix">
			<div class="flexslider">
				<?php 
					$args = array( 'post_type' => 'homeslider', 'posts_per_page' => 10,'order' => 'ASC' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
				?>
					<img src="<?php echo CFS()->get('slider_image'); ?>">
					<div class="flex-caption">
						<h1><?php echo CFS()->get('slider_title'); ?></h1>
						<p><?php echo CFS()->get('slider_description'); ?></p>
						<a href="<?php echo CFS()->get('slider_more_link'); ?>" class="learn_more">Learn More</a>
					</div><!--end flex-caption-->
				<?php endwhile;  wp_reset_query(); ?>
			</div><!-- end flexslider-->
		</div><!--end home_banner-->
	</div><!--end home_banner_cont-->

	<?php while(have_posts()) : the_post(); ?>

		<main>

			<div class="page-content">
				<div class="container">
					<div class="row">
						<section class="col-md-12">
							<h1><?php the_title(); ?></h1>
						</section>
					</div>

					<div class="row">
						<section class="col-md-8">
							<h1><?php echo CFS()->get('content_title'); ?></h1>
							<?php the_content(); ?>
						</section>

						<aside class="col-md-4">
			 				<?php dynamic_sidebar('Main Sidebar'); ?>
						</aside>
					</div><!-- end row -->
				</div><!-- end container -->
			</div><!-- end page content -->

		</main>
		
	<?php endwhile; ?>
<?php get_footer(); ?>