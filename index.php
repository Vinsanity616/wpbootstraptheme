<?php
/**
 * Description: The main template file.  This file is a carbon copy of page.php.
 *
 * @Author:	Bevelwise Media
 * 
 */

if (function_exists('get_header')) {
	get_header();
} else{
	/* Redirect browser */
	header("Location: http://" . $_SERVER['HTTP_HOST'] . "");
	/* Make sure that code below does not get executed when we redirect. */
	exit;
}; ?>
		

	<main>
		<div class="page-content">
			<div class="container">
				<div class="row">
					<section class="col-md-12">
						<h1>Blog</h1>
					</section>
				</div>
				
				<div class="row">

					<section class="col-md-9">
						<?php 

							while(have_posts()) : the_post();

								get_template_part( 'content', get_post_format() );

							endwhile;

							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => __( 'Previous page', 'wordpressmaster' ),
								'next_text'          => __( 'Next page', 'wordpressmaster' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wordpressmaster' ) . ' </span>',
							) );

						?>
					</section>
					<aside id="blog-sidebar" class="col-md-3">
						<?php get_sidebar(); ?>
					</aside>
				</div><!-- end row -->	
			</div><!-- end container -->
		</div><!-- end page content -->
	</main>

<?php get_footer(); ?>