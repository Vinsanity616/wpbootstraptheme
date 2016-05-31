<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'wordpressmaster' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<?php twentyfifteen_comment_nav(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php twentyfifteen_comment_nav(); ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'wordpressmaster' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

	<div class="nav-links">
		<?php
			if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'wordpressmaster' ) ) ) :
				printf( '<div class="nav-previous">%s</div>', $prev_link );
			endif;

			if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'wordpressmaster' ) ) ) :
				printf( '<div class="nav-next">%s</div>', $next_link );
			endif;
		?>
	</div><!-- .nav-links -->

</div><!-- .comments-area -->
