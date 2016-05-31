<?php
/**
 * Description: The front page template file.
 *
 * @Author:	Bevelwise Media
 * 
 */

get_header();
?>	
	<?php while(have_posts()) : the_post(); ?>

		<section id="home-slider">
			<?php // putRevSlider("home") ?>
		</section>

		<main>
			<div class="home-content">
				<div class="container">
					<div class="row">
						<section class="col-md-12">
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</section>
					</div><!-- end row -->
				</div><!-- end container -->
			</div><!-- end page content -->
		</main>
		
	<?php endwhile; ?>
<?php get_footer(); ?>