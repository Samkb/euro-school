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
			$args = array( 'post_type' => 'event', 'posts_per_page' => 10 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
				the_title();
				echo '<div class="entry-content">';
				the_content();
				echo '</div>';
			endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>


<?php
// get_sidebar();
get_footer();
