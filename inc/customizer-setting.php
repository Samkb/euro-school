<?php
/**
 * euro-school Theme Customizer
 *
 * @package euro-school
 */

/**
 * Setting for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function euro_school_customizer( $wp_customize ){

	
	 /***********************
     * Page Layout
     * * *************************/

	 $wp_customize->add_panel('euro_school_header_options', array(
	 	'priority' => 10,
	 	'capability' => 'edit_theme_options',
	 	'title' => esc_html__(' Front Page Contact Section', 'euro-school'),
	 	'description' => esc_html__('Manage Options for Yalatech Education', 'euro-school'),
	 ));

	 $wp_customize->add_section('euro_school_header_settings_section', array(
	 	'priority' => 20,
	 	'panel' => 'euro_school_header_options',
	 	'capability' => 'edit_theme_options',
	 	'title' => esc_html__('Contact Text', 'euro-school'),
	 	'description' => esc_html__('Manage Options for front page', 'euro-school'),
	 ));


	 // Contact Section
	 $wp_customize->add_setting('euro_school_ph_no', array(
	 	'capability' => 'edit_theme_options',
	 	'default' => '',
	 	'sanitize_callback' => 'sanitize_textarea_field',
	 ));
	 $wp_customize->add_control('euro_school_ph_no', array(
	 	'type' => 'text',
	 	'settings' => 'euro_school_ph_no',
	 	'section' => 'euro_school_header_settings_section',
	 	'label' => esc_html__('Enter Contact No', 'euro-school'),

	 ));
	 // Mail section
	 $wp_customize->add_setting('euro_school_mail', array(
	 	'capability' => 'edit_theme_options',
	 	'default' => '',
	 	'sanitize_callback' => 'sanitize_textarea_field',
	 ));
	 $wp_customize->add_control('euro_school_mail', array(
	 	'type' => 'email',
	 	'settings' => 'euro_school_mail',
	 	'section' => 'euro_school_header_settings_section',
	 	'label' => esc_html__('Mail Text', 'euro-school'),

	 ));



	 $wp_customize->add_panel('euro_school_slider_panel', array(
	 	'priority' => 15,
	 	'capability' => 'edit_theme_options',
	 	'title' => esc_html__('Slider Sections', 'euro-school'),
	 	'description' => esc_html__('Manage slider image ', 'euro-school'),
	 ));

		    /**
		     * Yalatech Front-page slider customizer setting
		     */
		    
		    $wp_customize->add_section('euro_school_slider_section', array(
		    	'priority' => 30,
		    	'panel' => 'euro_school_slider_panel',
		    	'capability' => 'edit_theme_options',
		    	'title' => esc_html__('Front Page Slider', 'euro-school'),
		    	'description' => esc_html__('Manage Options for front page Slider', 'euro-school'),
		    ));

		    $wp_customize->add_setting('euro_school_front_page_no_of_slides', array(
		    	'capability' => 'edit_theme_options',
		    	'default' => 3,
		    	'sanitize_callback' => 'absint',
		    ));

		    $wp_customize->add_control('euro_school_front_page_no_of_slides', array(
		    	'type' => 'number',
		    	'settings' => 'euro_school_front_page_no_of_slides',
		    	'section' => 'euro_school_slider_section',
		    	'label' => esc_html__('Select No of Slides (Refresh page once No. of Slides selected)', 'euro-school'),

		    ));

		    $slides = get_theme_mod('euro_school_front_page_no_of_slides', 3);

		    for ($i = 1; $i <= $slides; $i++) {

		    	$wp_customize->add_setting('euro_school_slider_image_' . $i, array(
		    		'capability' => 'edit_theme_options',
		    		'default' => '',
		    		'sanitize_callback' => 'esc_url_raw',
		    	));

		    	$wp_customize->add_control(new WP_Customize_Image_Control(
		    		$wp_customize,
		    		'euro_school_slider_image_' . $i,
		    		array(
		    			'label' => esc_html__('Slider Image ', 'euro-school') . $i,
		    			'section' => 'euro_school_slider_section',
		    			'settings' => 'euro_school_slider_image_' . $i,

		    		)
		    	));
		    }

		    $wp_customize->add_panel('euro_school_home_page_option', array(
		    	'priority' => 16,
		    	'capability' => 'edit_theme_options',
		    	'title' => esc_html__('Home Page Options', 'euro-school'),
		    	'description' => esc_html__('Manage slider image ', 'euro-school'),
		    ));

		    /* Dropdownppages and icon for the featured pages */

		    $wp_customize->add_section('euro_school_homepage_dropdownpages_section_featured_pages', array(
		    	'priority' => 10,
		    	'panel' => 'euro_school_home_page_option',
		    	'capability' => 'edit_theme_options',
		    	'title' => esc_html__('Featured Page', 'euro-school'),
		    	'description' => esc_html__('select page for featured item', 'euro-school'),
		    ));




		    $select_page = 3;

		    for ($i = 1; $i <= $select_page; $i++) {

		    	$wp_customize->add_setting('euro_school_homepage_dropdownpages_setting_id' . $i, array(
		    		'capability' => 'edit_theme_options',
		    		'default' => 3,
		    		'sanitize_callback' => 'absint',
		    	));

		    	$wp_customize->add_control('euro_school_homepage_dropdownpages_setting_id' . $i, array(
		    		'type' => 'dropdown-pages',
		    		'settings' => 'euro_school_homepage_dropdownpages_setting_id' . $i,
		    		'section' => 'euro_school_homepage_dropdownpages_section_featured_pages', 
		    		'label' => esc_html__('Select featured page', 'euro-school') . $i,
		    		'description' => esc_html__('Select page for front page featured post', 'euro-school' ) . $i,

		    	));

		    	$wp_customize->add_setting('featured_page_bg' .$i, array(
		    		'default'	=> '#2e5f85',
		    		'transport'	=> 'refresh',
		    		'sanitize_callback' => 'sanitize_textarea_field',

		    	));

		    	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_page_color_control' .$i, array(

		    		'label'		=> esc_html__( 'Select Background Color ', 'euro-school' )  .$i,
		    		'section'	=> 'euro_school_homepage_dropdownpages_section_featured_pages',
		    		'settings'	=> 'featured_page_bg' .$i,


		    	) ) );


		    	
		    	$wp_customize->add_setting('euro_school_homepage_icon_setting_id' . $i, array(
		    		'capability' => 'edit_theme_options',
		    		'default' => 'fa fa-university',
		    		'sanitize_callback' => 'sanitize_textarea_field',
		    	));

		    	$wp_customize->add_control('euro_school_homepage_icon_setting_id' . $i, array(
		    		'type' => 'select',
		    		'settings' => 'euro_school_homepage_icon_setting_id' . $i,
		    		'section' => 'euro_school_homepage_dropdownpages_section_featured_pages', 
		    		'label' => esc_html__('Icon', 'euro-school') . $i,
		    		'description' => esc_html__('Select Icon', 'euro-school') . $i,
		    		'choices' => array(
		    			'fa fa-university ' 		=> esc_html__( 'Graduate Icon', 'euro-school'),
		    			'fa fa-tags' 				=> esc_html__( 'Book Icon', 'euro-school' ),
		    			'fa fa-graduation-cap' 		=> esc_html__( 'Graduation Cap Icon', 'euro-school' ),	    		
		    			'fa fa-users' 				=> esc_html__( 'Users Icon', 'euro-school' ),
		    			'fa fa-university'			=> esc_html__( 'University Icon', 'euro-school' ),
		    			'fa fa-trophy'				=> esc_html__( 'Trophy Icon', 'euro-school' ),
		    			'fa fa-bus'					=> esc_html__( 'Bus Icon', 'euro-school' ),
		    			'fa fa-book-open'			=> esc_html__( 'Book Open Icon', 'euro-school' ),
		    			'fa fa-laptop'				=> esc_html__( 'Laptop Icon', 'euro-school' ),
		    			'fa fa-desktop'				=> esc_html__( 'Desktop Icon', 'euro-school' ),
		    			'fa fa-leanpub'			=> esc_html__( 'Copy Icon', 'euro-school' ),
		    			'fa fa-edit'				=> esc_html__( 'Writer Icon', 'euro-school' ),
		    		)					
		    	));
		    }


		    $wp_customize->add_section('euro_school_homepage_powered_gcpl_featured_pages', array(
		    	'priority' => 15,
		    	'panel' => 'euro_school_home_page_option',
		    	'capability' => 'edit_theme_options',
		    	'title' => esc_html__('Select page', 'euro-school'),
		    	'description' => esc_html__('select page  ', 'euro-school'),
		    ));

		    $wp_customize->add_setting('euro_school_powered_setting_id', array(
		    	'capability' => 'edit_theme_options',
		    	'default' => 1,
		    	'sanitize_callback' => 'absint',
		    ));

		    $wp_customize->add_control('euro_school_powered_setting_id', array(
		    	'type' => 'dropdown-pages',
		    	'settings' => 'euro_school_powered_setting_id',
		    	'section' => 'euro_school_homepage_powered_gcpl_featured_pages', 
		    	'label' => esc_html__('Select  page', 'euro-school'),
		    	'description' => esc_html__('Select page for front page  ', 'euro-school' ),

		    ));

		    $wp_customize->add_section('euro_school_homepage_dropdownpages_principal_message_featured_pages', array(
		    	'priority' => 17,
		    	'panel' => 'euro_school_home_page_option',
		    	'capability' => 'edit_theme_options',
		    	'title' => esc_html__('Message From Principal', 'euro-school'),
		    	'description' => esc_html__('select page for message from principal ', 'euro-school'),
		    ));

		    $wp_customize->add_setting('euro_school_principal_message_setting_id', array(
		    	'capability' => 'edit_theme_options',
		    	'default' => 1,
		    	'sanitize_callback' => 'absint',
		    ));

		    $wp_customize->add_control('euro_school_principal_message_setting_id', array(
		    	'type' => 'dropdown-pages',
		    	'settings' => 'euro_school_principal_message_setting_id',
		    	'section' => 'euro_school_homepage_dropdownpages_principal_message_featured_pages', 
		    	'label' => esc_html__('Select  page', 'euro-school'),
		    	'description' => esc_html__('Select page for front page  post', 'euro-school' ),

		    ));



		    // testmonial section




		    $wp_customize->add_section('euro_school_homepage_testimonial', array(
		    	'priority' => 20,
		    	'panel' => 'euro_school_home_page_option',
		    	'capability' => 'edit_theme_options',
		    	'title' => esc_html__('Testimonial', 'euro-school'),
		    	
		    ));

		    $wp_customize->add_setting('euro_school_front_page_no_of_testimonial', array(
		    	'capability' => 'edit_theme_options',
		    	'default' => 3,
		    	'sanitize_callback' => 'absint',
		    ));

		    $wp_customize->add_control('euro_school_front_page_no_of_testimonial', array(
		    	'type' => 'number',
		    	'settings' => 'euro_school_front_page_no_of_testimonial',
		    	'section' => 'euro_school_homepage_testimonial',
		    	'label' => esc_html__('Select No of Testimonail (Refresh page once No. of Testimonial selected)', 'euro-school'),

		    ));



		    $wp_customize->add_setting('euro_school_testimonial_title_setting_id', array(
		    	'capability' => 'edit_theme_options',
		    	'default' => 'Testimonial',
		    	'sanitize_callback' => 'sanitize_textarea_field',
		    ));

		    $wp_customize->add_control('euro_school_testimonial_title_setting_id', array(
		    	'type' => 'text',
		    	'settings' => 'euro_school_testimonial_title_setting_id',
		    	'section' => 'euro_school_homepage_testimonial', 
		    	'label' => esc_html__('Enter Title', 'euro-school'),
		    	'description' => esc_html__('Enter heading title', 'euro-school' ),

		    ));

		    $testimonail = get_theme_mod('euro_school_front_page_no_of_testimonial', 3);

		    	for ($i = 1; $i <= $testimonail; $i++) {


		    $wp_customize->add_setting('euro_school_testimonial_content_id' . $i, array(
		    	'capability' => 'edit_theme_options',
		    	'sanitize_callback' => 'absint',
		    ));

		    $wp_customize->add_control('euro_school_testimonial_content_id' . $i, array(
		    	'type' => 'dropdown-pages',
		    	'settings' => 'euro_school_testimonial_content_id'. $i,
		    	'section' => 'euro_school_homepage_testimonial', 
		    	'label' => esc_html__('Select Testimonial page ', 'euro-school'). $i,
		    	

		    ));
		    
		    $wp_customize->add_setting('euro_school_testimonial_user_name_position'. $i, array(
		    	'capability' => 'edit_theme_options',
		    	'sanitize_callback' => 'sanitize_textarea_field',
		    ));

		    $wp_customize->add_control('euro_school_testimonial_user_name_position'. $i, array(
		    	'type' => 'text',
		    	'settings' => 'euro_school_testimonial_user_name_position'. $i,
		    	'section' => 'euro_school_homepage_testimonial', 
		    	'label' => esc_html__('Enter Position ', 'euro-school'). $i,
		    	

		    ));
		}



		}
		add_action('customize_register', 'euro_school_customizer');


	