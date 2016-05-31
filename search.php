<?php
/**
 * Description: The search template file.
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
					<section class="col-md-12">

						<?php if ( have_posts() ) : ?>

							<h1><?php printf(( 'Search Results for: %s' ), get_search_query() ); ?></h1>

							<?php
								// Start the Loop.
								while ( have_posts() ) : the_post(); ?>

									<h2><?php echo get_the_title(); ?></h2>
									<?php the_excerpt(); 

								endwhile;

								// Previous/next page navigation.
								the_posts_pagination( array(
									'prev_text'          => __( 'Previous page', 'wordpressmaster' ),
									'next_text'          => __( 'Next page', 'wordpressmaster' ),
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wordpressmaster' ) . ' </span>',
								) );

							else : ?>
								<h1><?php printf(('Search Results for: %s'), get_search_query() ); ?></h1>
								<p>We're sorry ther were no results matching your search.</p><?php
							endif;
						?>
						
					</section>

				</div>
			</div><!-- end container -->
		</div><!-- end page content -->
	</main>

<?php get_footer(); ?>