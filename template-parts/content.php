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
	
	<input type="checkbox" class="toggle-snippet-checkbox" id="<?php echo the_ID(); ?>">
	<label for="<?php echo the_ID(); ?>" class="toggle-snippet">
		<span class="crossline one"></span>
		<span class="crossline two"></span>
	</label>


	<header class="entry-header">

		

		<?php adventninteen_post_thumbnail(); ?>

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				adventninteen_posted_on();
				adventninteen_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	

	<div class="entry-content">
		<div class="t-wrap">
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

	<footer class="entry-footer">
		<?php adventninteen_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
	<div class="calendar-number"><?php echo esc_html($i); ?></div>

</article><!-- #post-<?php the_ID(); ?> -->
