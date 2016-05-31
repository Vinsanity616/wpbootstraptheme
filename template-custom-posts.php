<?php
/*
 * Template Name: Custom Posts
 *
 * @Author:	Bevelwise Media
 *
*/
get_header();
?>	

	<main>
		<div class="page-content">
			<div class="container">
				<div class="row">
					<section class="col-sm-12">
						<h1>Projects</h1>
					</section>
				</div>
				
				<div class="row">
					<section class="col-sm-9">
						<?php 
							$projectsargs = array( 'post_type' => 'projects', 'posts_per_page' => 10 );
							$the_query = new WP_Query( $projectsargs ); 
						?>

						<?php if ( $the_query->have_posts() ) : ?>

							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<?php get_template_part( 'content', get_post_format() ); ?>
								
								<?php wp_reset_postdata(); ?>
							<?php endwhile; ?>

						<?php endif; ?>
					</section>

					<aside id="blog-sidebar" class="col-sm-3">
						<?php get_sidebar(); ?>
					</aside>
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end page content -->
	</main>

<?php get_footer(); ?>