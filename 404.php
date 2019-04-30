<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Euro_School
 */

get_header();
?>
<div class="introduction-banner">
	<h1>404 Page</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo esc_url(home_url('/')); ?>">404 Page</a></li>

		<li class="active"><?php the_title( ); ?></li>
	</ol>
</div>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<section class="error-404 not-found">
			<div class="container">
				<header class="page-header">
					<h1 class="page-title" style="text-align: center;"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'euro-school' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p style="text-align: center;"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'euro-school' ); ?></p>

					<?php
					get_search_form();


					?>

				

				</div><!-- .page-content -->
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
