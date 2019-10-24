<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adventninteen
 */
$i = get_query_var('post_count');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<div class="t-wrap">

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="t-entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="t-entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="t-entry-meta">
				<?php
				adventninteen_posted_on();
				adventninteen_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'adventninteen' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'adventninteen' ),
			'after'  => '</div>',
		) );
		?>
		</div>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->

<div id="authorbox">
	<div class="authimg">
		<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); }?>
	</div>
	<div class="authortext">
		<h4 class="authhead">About <?php the_author_posts_link(); ?>
		</h4>
		<p><?php the_author_meta('description'); ?></p>
	</div>
</div>


