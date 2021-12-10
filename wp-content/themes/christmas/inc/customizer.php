<?php
/**
 * Christmas Theme Customizer
 *
 * @package Christmas
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function christmas_customize_register( $wp_customize ) {
	
function christmas_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		
	$wp_customize->add_setting('color_scheme', array(
		'default' => '#d72e1c',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','christmas'),
			'description'	=> __('Select color from here.','christmas'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);

	
	// Slider Section Start		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'christmas'),
            'priority' => null,
			'description'	=> __('Recommended image size (1420x567). Slider will work only when you select the static front page.','christmas'),	
        )
    );
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','christmas'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','christmas'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','christmas'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('slide_text',array(
		'default'	=> __('Join the Party','christmas'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slide_text',array(
		'label'	=> __('Add slider link button text.','christmas'),
		'section'	=> 'slider_section',
		'setting'	=> 'slide_text',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('hide_slider',array(
			'default' => true,
			'sanitize_callback' => 'christmas_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_slider', array(
		   'settings' => 'hide_slider',
    	   'section'   => 'slider_section',
    	   'label'     => __('Check this to hide slider.','christmas'),
    	   'type'      => 'checkbox'
     ));	
	
	// Slider Section End
	
	// Homepage Section Start		
	$wp_customize->add_section(
        'homepage_section',
        array(
            'title' => __('Homepage Section', 'christmas'),
            'priority' => null,
			'description'	=> __('Select page for this section. This section will be displayed only when you select the static front page.','christmas'),	
        )
    );	
	
	$wp_customize->add_setting('section-title',array(
			'default' => __('Donation and Gifts','christmas'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('section-title',array(
			'type'	=> 'text',
			'label'	=> __('Add section title here.','christmas'),
			'section'	=> 'homepage_section'
	));
	
	$wp_customize->add_setting('page-setting1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('page-setting1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for section:','christmas'),
			'section'	=> 'homepage_section'
	));			
	
	$wp_customize->add_setting('hide_section',array(
			'default' => true,
			'sanitize_callback' => 'christmas_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	));	 

	$wp_customize->add_control( 'hide_section', array(
		   'settings' => 'hide_section',
    	   'section'   => 'homepage_section',
    	   'label'     => __('Check this to hide section.','christmas'),
    	   'type'      => 'checkbox'
     ));
	 	
}
add_action( 'customize_register', 'christmas_customize_register' );	

function christmas_css(){
		?>
        <style>
				a, 
				.tm_client strong,
				.postmeta a:hover,
				#sidebar ul li a:hover,
				.blog-post h3.entry-title,
				.sitenav ul li:hover ul li a{
					color:<?php echo esc_html(get_theme_mod('color_scheme','#d72e1c')); ?>;
				}
				a.blog-more:hover,
				.nav-links .current, 
				.nav-links a:hover,
				#commentform input#submit,
				input.search-submit,
				.nivo-controlNav a.active,
				.blog-date .date,
				a.read-more,
				.header-top,
				.copyright-wrapper,
				.header,
				.gift-box .gift-left a{
					background-color:<?php echo esc_html(get_theme_mod('color_scheme','#d72e1c')); ?>;
				}
				.fourbox h3::after{
					background-color:<?php echo esc_html(get_theme_mod('bx-color','#e04622')); ?>;
				}
				.fourbox:hover h3{
					color:<?php echo esc_html(get_theme_mod('bx-color','#e04622')); ?>;
				}
				.fourbox:hover .pagemore{
					background-color:<?php echo esc_html(get_theme_mod('bx-color','#e04622')); ?>;
					border:1px solid <?php echo esc_html(get_theme_mod('bx-color','#e04622')); ?>;
				}
				
		</style>
	<?php }
add_action('wp_head','christmas_css');

function christmas_customize_preview_js() {
	wp_enqueue_script( 'christmas-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'christmas_customize_preview_js' );