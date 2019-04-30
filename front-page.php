<?php
/**
 * Front Page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package euro-school
 */

get_header();

$no_sildes = get_theme_mod( 'euro_school_front_page_no_of_slides', 3 );



for ($i = 1; $i <= $no_sildes; $i++) {


	$slides[$i] = get_theme_mod( 'euro_school_slider_image_'.$i );

}
if ( is_array( $slides ) && ! empty($slides) ): 
	?>



<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<?php 
		
			$i = 0; 
			foreach ($slides as $key => $slide) : 
				?>
				<li data-target="#myCarousel" data-slide-to="<?php echo esc_html($i); ?>" class="<?php if($i === 0): ?>active<?php endif; ?>"></li>
				<?php 
				$i++; 
			endforeach; 
		
		?>
	</ol>
	<!-- Wrapper for slides -->
	<div class="carousel-inner">

		<?php $first_post = true;
		
			?>
			<?php foreach ($slides as $key => $slide) : ?>
				<div class="item <?php if($first_post):echo "active"; endif; $first_post= false; ?>">
					<img src="<?php echo esc_url( $slide ); ?>" alt="<?php the_title_attribute(); ?>" style="width:100%;">
				</div>
			<?php endforeach; ?>
		


	</div>


	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>


<?php

endif; 

do_action( 'euro_school_featured_page' );

?>



<div class="event" id="event">
	<div class="container">
		<h3 class="title">Upcoming Events</h3>
		<div class="advantages-grids">

			<?php 

			$args = array(
				'post_type' => 'event',
				'posts_per_page' => 4

			);


			$obituary_query = new WP_Query($args);


			while ($obituary_query->have_posts()) : $obituary_query->the_post();
				$start_date = get_post_custom_values('event-start-date');
				$event_venue = get_post_custom_values('event-venue');

					?>
					<div class="col-md-6  col-sm-6 col-xs-6 our-advantages-grid two">
						<div class="up-border">
							<div class="col-md-2 our-advantages-grd-left">
								<span class="fa fa-bookmark-o" aria-hidden="true"></span>
							</div>
							<div class="col-md-3 our-advantages-grd-right">

								<h4><?php the_title(); ?></h4>

							</div>
							<div class="col-md-7 our-advantages-grd-to-right">
								<p><span class="fa fa-long-arrow-right icons-left" aria-hidden="true"></span><strong>Date:</strong>
									<?php 
									echo date('l, F j, Y', $start_date[0]);
									?> </p>

										<p><span class="fa fa-long-arrow-right icons-left" aria-hidden="true"></span><strong>Venue:</strong>
											<?php 
											echo  $event_venue[0];
											?></p>
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>

								<?php
							
						endwhile;


// Reset Post Data
						wp_reset_postdata();

						?>



						<div class="clearfix"></div>
					</div>
				</div>
			</div>

			<div class="section4">
				<div class="container">

					<?php
					do_action( 'euro_school_powered_by' );
					do_action( 'euro_school_message_principal' ); ?>

				</div>
			</div>	



			<?php
			get_footer();
