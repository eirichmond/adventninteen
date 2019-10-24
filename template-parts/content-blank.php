<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adventninteen
 */
$i = get_query_var('post_count');
?>

<article class="post no-results not-found">

	<?php adventninteen_post_thumbnail(true); ?>

	<div class="calendar-number"><?php echo esc_html($i); ?></div>

</article><!-- .no-results -->
