<?php 
/**
 * Template Name: Contact Us
 * 
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


<!-- contact-wrapper section start -->
<section class="contact-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h5 style="margin: 0 0 35px 0; text-align: center; color: #234a66; font-size: 30px;">Find us on google maps</h5>
				<div id="map" style="width:100%; height:500px; margin-bottom: 20px;">
					
					<?php 
					while (have_posts() ) : the_post();

						the_content();

					endwhile;
					?>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="contact-form">
					<h3 style="margin: 0 0 35px 0; text-align: center; color: #234a66; font-size: 30px;">SEND A MESSAGE</h3>
				</div>
				<?php echo do_shortcode("[wpforms id='154']");?>
			</div>
		</div>
	</div>
</section>
<!-- contact-wrapper section end -->
<?php 
get_footer();
