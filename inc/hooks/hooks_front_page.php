<?php 


/**
 * hooks for front-page-featured-page
 */



if (! function_exists( 'euro_school_home_page_featured_page' ) )  { 

	/**
	 * 
	 */
	
	function euro_school_home_page_featured_page(){

		?>

		<div class="about-cat " id="about-cat">
			<div class="container">
				<div class="agileits-banner-grids text-center">
					<div class="banner-bottom-girds">

						<?php 

						for ($i = 1; $i <= 3; $i++){

							$select_page = get_theme_mod( 'euro_school_homepage_dropdownpages_setting_id'.$i );

					// var_dump($select_page);
					// die;
							$icon = get_theme_mod( 'euro_school_homepage_icon_setting_id' .$i );

							if(!empty( $select_page )) {


								$args = array( 'p' => $select_page, 'post_type' => 'page' );


								$page = new WP_Query( $args );

								while( $page->have_posts() ) : $page->the_post();
									?>
									<?php $featured_page_color = get_theme_mod( 'featured_page_bg' .$i ); ?>
									<div class="col-md-4  col-sm-4  agileits-banner-grid" style="background: <?php echo esc_html( $featured_page_color ) ; ?>;">
										<span class="<?php echo esc_attr($icon); ?> banner-icon" aria-hidden="true"></span>
										<h4><?php the_title(); ?></h4>
										<p><?php 
										$post = get_post(); 
										$content = apply_filters('the_content', $post->post_content); 

										$customExcerpt = wp_trim_words( $content, $num_words = 10, $more = '  .....' );
										echo esc_html( $customExcerpt ); ?></p>
										<a class="w3_play_icon1" href="<?php echo esc_url( get_permalink() ); ?>">read more</a>
									</div>

									<?php

								endwhile; wp_reset_postdata();

							}

						}

						?>


						<div class="clearfix"></div>
					</div>

				</div>
			</div>
		</div>
		<?php

	}
}



add_action( 'euro_school_featured_page', 'euro_school_home_page_featured_page', 10 );



if (! function_exists( 'euro_school_front_page_powered' ) )  { 

	/**
	 * 
	 */
	
	function euro_school_front_page_powered(){

		?>

		<div class="row euro-wrapper">
			<?php $powered_by = get_theme_mod( 'euro_school_powered_setting_id');  

			if(!empty( $powered_by )) {


				$args = array( 'p' => $powered_by, 'post_type' => 'page' );


				$page = new WP_Query( $args );

				while( $page->have_posts() ) : $page->the_post();
					?>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						<div class="ads ceo-img-box">
							<?php if ( has_post_thumbnail() ){

								$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'euro-school', true );
								?>

								<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title_attribute(); ?>">
							<?php } ?>
							
						</div>
					</div>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<div class="ceo-msg">
							<h3><strong><?php the_title(); ?></strong></h3>
							<p>
								<?php 
								$post = get_post(); 
								$content = apply_filters('the_content', $post->post_content); 

								// $customExcerpt = wp_trim_words( $content, $num_words = 100, $more = '  .....' );
								echo ( $content );
								?>
							</p>
						</div>
					</div>
				</div>

				<?php

			endwhile; wp_reset_postdata();

		}

	}
}


add_action( 'euro_school_powered_by', 'euro_school_front_page_powered', 15 );


if (! function_exists( 'euro_school_message_from_principal' ) )  { 

	/**
	 * 
	 */
	
	function euro_school_message_from_principal(){

		?>

		<div class="row">
			<?php $message_principal = get_theme_mod( 'euro_school_principal_message_setting_id');  

			if(!empty( $message_principal )) {


				$args = array( 'p' => $message_principal, 'post_type' => 'page' );


				$page = new WP_Query( $args );

				while( $page->have_posts() ) : $page->the_post();
					?>

					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
						<div class="ads ceo-img-box">
							<?php if ( has_post_thumbnail() ){

								$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'euro-school', true );
								?>

								<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title_attribute(); ?>">
							<?php } ?>
							
						</div>
					</div>
					<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
						<div class="ceo-msg">
							<h3><strong><?php the_title(); ?></strong></h3>
							<p>
								<?php 
								$post = get_post(); 
								$content = apply_filters('the_content', $post->post_content); 

								// $customExcerpt = wp_trim_words( $content, $num_words = 100, $more = '  .....' );
								echo ( $content );
								?>
							</p>
						</div>
					</div>
				</div>

				<?php

			endwhile; wp_reset_postdata();

		}

	}
}


add_action( 'euro_school_message_principal', 'euro_school_message_from_principal', 17 );