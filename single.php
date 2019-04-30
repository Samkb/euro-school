<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Euro_School
 */

get_header();
?>
<div class="introduction-banner">
	<h1><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>

		<li class="active"><?php the_title( ); ?></li>
	</ol>
</div>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

				the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->
</div>


<?php
// get_sidebar();
get_footer();