<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Euro_School
 */

?>
<div class="introduction-banner">
	<h1><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>

		<li class="active"><?php the_title( ); ?></li>
	</ol>
</div>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<div class="club-txt">
		<div class="container">
			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'euro-school' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div>
	<br>
	<div class="container">
	<center><?php euro_school_post_thumbnail(); ?></center>
	</div>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'euro-school' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
