<?php
/**
 * The default template for displaying content
 *
 * @Author: Bevelwise Media
 */
?>  

<article class="category-content">

	<?php
	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
		<div class="row">
			<div class="col-sm-2">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="col-sm-10">
				<h2 class="entry-title"><a href="<?php the_permalink (); ?>" title="<?php the_title (); ?>"><?php echo get_the_title(); ?></a></h2>
		
				<p>
					<b>Date:</b> <?php the_time('F jS, Y') ?> <b>Category:</b> <?php the_category(', ') ?>
				</p>

				<?php the_excerpt (); ?>
			</div>
		</div><!-- end row -->
		
	<?php }
	else { ?>
		<h2 class="entry-title"><a href="<?php the_permalink (); ?>" title="<?php the_title (); ?>"><?php echo get_the_title(); ?></a></h2>
		
		<p>
			<b>Date:</b> <?php the_time('F jS, Y') ?> <b>Category:</b> <?php the_category(', ') ?>
		</p>

		<?php the_excerpt (); ?>
	<?php } ?>

</article>