	<?php 
	// args
	$args = array(
		'posts_per_page'   => 1,
		'orderby' => 'post_date'
	);

	$recent_posts = new WP_Query( $args );

	if( $recent_posts->have_posts() ): ?>

		<h2>Recent Posts</h2>

		<ul class="recent-post-block">

			<?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>

				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

			<?php endwhile; ?>

		</ul>

	<?php endif; ?>

	<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

	<h2 id="archives">Archives</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

	<?php if(the_tages): ?>
		<h2>Tags</h2>
		 <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' );
	 endif; ?>