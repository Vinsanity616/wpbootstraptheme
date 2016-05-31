<?php
/**
 * Description: The main template file.  This file is a carbon copy of page.php.
 *
 * @Author:	Bevelwise Media
 * 
 */

get_header();
?>	
	<?php while(have_posts()) : the_post(); ?>

			<?php if ( has_post_thumbnail() ): ?>
				<div class="hero">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>

			<main>
				<div class="page-content">
					<div class="container">
						<div class="row">
							<section class="col-md-12">
								<h1><?php the_title(); ?></h1>
								<?php the_content(); ?>

								<?php
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'wordpressmaster' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
										'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'wordpressmaster' ) . ' </span>%',
										'separator'   => '<span class="screen-reader-text">, </span>',
									) );
								?>

							</section>
						</div><!-- end row -->
					</div><!-- end container -->
				</div><!-- end page content -->
			</main>
		
	<?php endwhile; ?>
<?php get_footer(); ?>