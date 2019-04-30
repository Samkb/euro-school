<?php 

/**
 * Template Name: Introduction Page
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

<div class="welcome-txt">
	<div class="container">
		<div class="row">
			<div class="col-md-8">

				<?php if(get_field('title'))
				{
					echo '<h2>' . get_field('title') . '</h2>';
				}

				?> 
				<!-- 	<h2>Welcome To Euro School</h2> -->
				<hr>
				<?php

				if(get_field('welcome_text'))
				{
					echo '<p>' . get_field('welcome_text') . '</p>';
				}

				?>
			</div>
			<div class="col-md-4">
				<?php $images = get_field('images');
				/*print_r($images);*/
				?>
				<center><img src="<?php echo esc_url($images); ?>" class="img-responsive"></center>
			</div>
		</div>
		<div class="gcpl">
			<div class="row">
				<div class="col-md-4">
					<?php if(get_field('gcpl_title'))
					{
						echo '<h3>' . get_field('gcpl_title') . '</h3>';
					}

					?> 
					<hr>
					<?php

					if(get_field('content'))
					{
						echo '<p>' . get_field('content') . '</p>';
					}

					?>

				</div>
				<div class="col-md-4">
					<?php $gcpl_images = get_field('gcpl_images');
					?>
					<center><img src="<?php echo esc_url($gcpl_images); ?>" class="img-responsive"></center>
				</div>
				<div class="col-md-4">
					<?php if(get_field('what_is_gcpl'))
					{
						echo '<h3>' . get_field('what_is_gcpl') . '</h3>';
					}

					?> 
					<hr>
					<?php 	if(get_field('gcpl_content_'))
					{
						echo '<p>' . get_field('gcpl_content_') . '</p>';
					}

					?> 
				</div>
			</div>
		</div>
		<div class="pmsg">	
			<?php do_action( 'euro_school_message_principal' ); ?> 
		</div>
	</div>		
</div>

<?php 
get_footer();
