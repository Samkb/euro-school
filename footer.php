<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Euro_School
 */

?>

</div><!-- #content -->


<div class="footer">
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
				<div class="col-md-3">
						<?php dynamic_sidebar( 'footer-1' ); ?>		
				</div>
			<?php } ?>

			<div class="col-md-5">
				<?php 
				$testimonial_title = get_theme_mod( 'euro_school_testimonial_title_setting_id' );

				if (!empty( $testimonial_title )  ) { ?>							
					<h3 style="padding: 0;"><strong><?php echo esc_attr( $testimonial_title );  ?></strong></h3>
				<?php } ?>
				<div class="seprator"></div>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

					<!-- Wrapper for testimonial -->

					<div class="carousel-inner">

						<?php  
						$j = 0;
						$testimonail = get_theme_mod('euro_school_front_page_no_of_testimonial', 3);

						for ($i = 1; $i <= $testimonail; $i++) {

							$testimonail_page = get_theme_mod( 'euro_school_testimonial_content_id' . $i );
							$testimonial_post = get_theme_mod( 'euro_school_testimonial_user_name_position' . $i );


							if(!empty( $testimonail_page ) && !empty($testimonial_post)) {


								$args = array( 'p' => $testimonail_page, 'post_type' => 'page' );

								$new_testimonial = new WP_Query( $args );
								while( $new_testimonial->have_posts() ) : $new_testimonial->the_post();
									if ($j == 0): ?>

										<div class="item active">
											<div class="row">
												<p class="testimonial_para">
													<?php 
													$post = get_post(); 
													$content = apply_filters('the_content', $post->post_content); 

													$customExcerpt = wp_trim_words( $content, $num_words = 40, $more = '  .....' );
													echo esc_html( $customExcerpt ); ?>
												</p>
												<br>
												<div class="row">
													<div class="col-sm-2">
														<img src="#" class="img-responsive" style="width: 80px">
													</div>
													<div class="col-sm-10">
														<h4><strong><?php the_title(); ?></strong></h4>
														<p class="testimonial_subtitle">
															<span><?php echo esc_html( $testimonial_post ) ; ?></span><br>

														</p>
													</div>
												</div>
											</div>
										</div>
										<?php else:  ?>
											<div class="item">
												<div class="row">
													<p class="testimonial_para">
														<?php 
														$post = get_post(); 
														$content = apply_filters('the_content', $post->post_content); 

														$customExcerpt = wp_trim_words( $content, $num_words = 40, $more = '  .....' );
														echo esc_html( $customExcerpt ); ?>
													</p>
													<br>
													<div class="row">
														<div class="col-sm-2">
															<img src="#" class="img-responsive" style="width: 80px">
														</div>
														<div class="col-sm-10">
															<h4><strong><?php the_title(); ?></strong></h4>
															<p class="testimonial_subtitle">
																<span><?php echo esc_html( $testimonial_post ) ; ?></span><br>

															</p>
														</div>
													</div>
												</div>
											</div>


											<?php 
											endif;
											$j++;

									endwhile;
									wp_reset_postdata();

								}
							}

							?>
						</div>

					</div>

					<div class="controls testimonial_control pull-right">
						<a class="left fa fa-chevron-left btn btn-default testimonial_btn" href="#carousel-example-generic"
						data-slide="prev"></a>

						<a class="right fa fa-chevron-right btn btn-default testimonial_btn" href="#carousel-example-generic"
						data-slide="next"></a>
					</div>
				</div>   
				<?php if ( is_active_sidebar( 'footer-2' ) ) { ?>
				<div class="col-md-4">
						<?php dynamic_sidebar( 'footer-2' ); ?>		
				</div>
			<?php } ?>
			</div>
		</div>
	</div>

	<div class="footer-end">
		<div class="container">
			<p class="navbar-text" style="text-align: center; float: none;">2018 &copy; All rights reserved. || Euro School || Designed by :Yala Tech Hub</p>
		</div>
	</div> 

</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>
