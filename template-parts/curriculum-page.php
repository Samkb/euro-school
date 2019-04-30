<?php 

/**
 * Template Name: Curriculum Page
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

<div class="faculty-txt">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php 
				while (have_posts() ) : the_post();

					the_content();

				endwhile;
				?>
			</div>
			<div class="col-md-4">
				<ul class="faculty-img">
					<?php $first_image = get_field('first_image');
					?>
					<li><center><img src="<?php echo esc_url($first_image) ?>" class="img-responsive"></center></li>
					

					<?php $second_image = get_field('second_image');
					?>
					<li><center><img src="<?php echo esc_url($second_image); ?>" class="img-responsive"></center></li>

					<?php $third_image = get_field('third_image');
					?>
					<li><center><img src="<?php echo esc_url($third_image); ?>" class="img-responsive"></center></li>


					<?php $fourth_image = get_field('fourth_image');
					?>
					<li><center><img src="<?php echo esc_url($fourth_image); ?>" class="img-responsive"></center></li>

					<?php $fifth_image = get_field('fifth_image');
					?>
					<li><center><img src="<?php echo esc_url($fifth_image); ?>" class="img-responsive"></center></li>

				</ul>
			</div>
		</div>
	</div>		
</div>
<?php 
get_footer();
