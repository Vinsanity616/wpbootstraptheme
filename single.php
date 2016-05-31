<?php
/**
 * The Template for displaying all single posts.
 *
 */

get_header();

?>


	<?php while ( have_posts() ) : the_post(); ?>
					
		<main>
			<div class="page-content">
				<div class="container">
					
					<div class="row">
						<section class="col-md-12">
							<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h1><?php the_title(); ?></h1>

							<?php

								echo '<p>';
								
							    	printf( __( '<span class="%1$s">Posted on </span>%2$s<span class="%3$s"> by </span>%4$s', 'wordpressmaster' ),

							    	'meta-prep meta-prep-author posted', 

							    	sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="timestamp">%3$s</span></a>',

							        get_permalink(),

							        esc_attr( get_the_time() ),

							        get_the_date()

							    ),

							    'byline',

							    sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',

							        get_author_posts_url( get_the_author_meta( 'ID' ) ),

							        sprintf( esc_attr__( 'View all posts by %s', 'wordpressmaster' ), get_the_author_meta('nickname') ),

							        get_the_author_meta('nickname')

							        )

							    );

							    echo '</p>';

								the_content();

								comments_template();

							?>
						</div>
						</section>
					</div>
					<div class="row">
						<section class="col-md-12">
							<div class="post-page-nav">
								<div class="alignleft newer-posts">
									<?php next_post_link( '%link', '<i class="fa fa-angle-left"></i>', TRUE ); ?>
								</div>
								<div class="alignright older-posts">
									<?php previous_post_link('%link', '<i class="fa fa-angle-right"></i>', TRUE); ?> 
								</div>
							</div> <!-- end navigation -->
						</section>
					</div>
					
				</div><!-- end container -->
			</div><!-- end page content -->
		</main>

	<?php endwhile; ?>

<?php get_footer(); ?>