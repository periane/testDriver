<?php
/**
 * SKT Startup Theme Customizer
 *
 * @package SKT Startup
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_startup_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class skt_startup_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }	

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');	
	
	// Color Scheme
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#ff6600',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','skt-startup'),			
			 'description'	=> __('More color options in PRO Version','skt-startup'),	
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);	
	
	
	// Slider Section		
	$wp_customize->add_section( 'slider_section', array(
            'title' => __('Slider Settings', 'skt-startup'),
            'priority' => null,
            'description'	=> __('Featured Image Size Should be ( 1400x556 ) More slider settings available in PRO Version','skt-startup'),		
        )
    );	
	
	$wp_customize->add_setting('page-setting7',array(
			'sanitize_callback'	=> 'skt_startup_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','skt-startup'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'sanitize_callback'	=> 'skt_startup_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','skt-startup'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'sanitize_callback'	=> 'skt_startup_sanitize_integer'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','skt-startup'),
			'section'	=> 'slider_section'
	));	
	
	//Slider hide
	$wp_customize->add_setting('hide_slides',array(
			'sanitize_callback' => 'sanitize_text_field',
	));	 

	$wp_customize->add_control( 'hide_slides', array(
    	   'section'   => 'slider_section',    	 
		   'label'	=> __('Hide slider Section','skt-startup'),
    	   'type'      => 'checkbox'
     )); // Slider Section		 
	
	
	
	// Home Three Boxes Section 	
	$wp_customize->add_section('section_second', array(
		'title'	=> __('Homepage Services Section','skt-startup'),
		'description'	=> __('','skt-startup'),
		'priority'	=> null
	));	
	
	$wp_customize->add_setting('services_title',array(
			'default'	=> __('Our Services','skt-startup'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('services_title',array(
			'label'	=> __('Add title for our services','skt-startup'),
			'section'	=> 'section_second',
			'setting'	=> 'services_title'
	));	
	
	$wp_customize->add_setting('page-column1',	array(
			'sanitize_callback' => 'skt_startup_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'label' => __('Select Pages from the dropdown for homepage our services section','skt-startup'),
			'section' => 'section_second',
	));	
	
	
	$wp_customize->add_setting('page-column2',	array(
			'sanitize_callback' => 'skt_startup_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',
			'label' => __('','skt-startup'),
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column3',	array(
			'sanitize_callback' => 'skt_startup_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',
			'label' => __('','skt-startup'),
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column4',	array(
			'sanitize_callback' => 'skt_startup_sanitize_integer',
		));
 
	$wp_customize->add_control(	'page-column4',array('type' => 'dropdown-pages',
			'label' => __('','skt-startup'),
			'section' => 'section_second',
	));//end four column part
	
	
	//Hide Page Boxes Column Section
	$wp_customize->add_setting('hide_pagefourboxes',array(
			'sanitize_callback' => 'sanitize_text_field',
	));	 

	$wp_customize->add_control( 'hide_pagefourboxes', array(
    	   'section'   => 'section_second',    	 
		   'label'	=> __('Hide our services section','skt-startup'),
    	   'type'      => 'checkbox'
     )); // Hide Page Boxes Column Section
	
	
	
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','skt-startup'),				
			'description'	=> __('More social icon available in PRO Version','skt-startup'),		
			'priority'		=> null
	));
	
	$wp_customize->add_setting('followus_title',array(
			'default'	=> __('Follow Us','skt-startup'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('followus_title',array(
			'label'	=> __('Add title for follow us','skt-startup'),
			'section'	=> 'social_sec',
			'setting'	=> 'followus_title'
	));		
	
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','skt-startup'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','skt-startup'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','skt-startup'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','skt-startup'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	
	//Contact Info
	$wp_customize->add_section('contact_sec',array(
			'title'	=> __('Contact Details','skt-startup'),
			'description'	=> __('Add you contact details here','skt-startup'),
			'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> __('100 King St, Melbourne PIC 4000, Australia','skt-startup'),
			'sanitize_callback'	=> 'esc_textarea',
	));
	
	$wp_customize->add_control(	'contact_add', array(
				'type' => 'textarea',
				'label'	=> __('Add contact address here','skt-startup'),
				'section'	=> 'contact_sec',
				'setting'	=> 'contact_add'
	));
	$wp_customize->add_setting('contact_no',array(
			'default'	=> __('+91 987 654 3210','skt-startup'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','skt-startup'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'contact@company.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add you email here','skt-startup'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_mail'
	));		
	 
    $wp_customize->add_setting('skt_startup_options[layout-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_startup_Info( $wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'skt_startup_options[layout-info]',
        'priority' => null
        ) )
    );
	
	
	  
    $wp_customize->add_setting('skt_startup_options[font-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_startup_Info( $wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'skt_startup_options[font-info]',
        'priority' => null
        ) )
    );	
	  
    $wp_customize->add_setting('skt_startup_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new skt_startup_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'skt_startup_options[info]',
        'priority' => 10
        ) )
    );		
}
add_action( 'customize_register', 'skt_startup_customize_register' );

//Integer
function skt_startup_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

function skt_startup_custom_css(){
		?>
        	<style type="text/css"> 
					
					a, .blog_lists h2 a:hover,
					#sidebar ul li a:hover,					
					.footer ul li a:hover, .footer ul li.current_page_item a,					
					.phone-no strong,					
					.left a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.postmeta a:hover,
					.fourbox:hover a.ReadMore,
					.logo h1 span,
					.recent-post .morebtn:hover,
					.recent-post .morebtn,					
					.sitenav ul li a:hover, .sitenav ul li.current_page_item a, .sitenav ul li.current_page_item ul li a:hover, .sitenav ul li.current-menu-ancestor a.parent, .sitenav ul li.current-menu-ancestor ul.sub-menu li.current_page_item a, .sitenav ul li.current-menu-ancestor ul.sub-menu li a:hover
					{ color:<?php echo get_theme_mod('color_scheme','#ff6600'); ?>;}
					 
					
					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,										
					.nivo-controlNav a.active,				
					h3.widget-title,				
					.wpcf7 input[type='submit'],					
					.social-icons a:hover,					
					input.search-submit	,					
					.slide_info .slide_more,					
					.fourbox:hover					
					{ background-color:<?php echo get_theme_mod('color_scheme','#ff6600'); ?> !important;}					
					
					
			</style> 
<?php                  
} 
         
add_action('wp_head','skt_startup_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_startup_customize_preview_js() {
	wp_enqueue_script( 'skt_startup_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_startup_customize_preview_js' );


function skt_startup_custom_customize_enqueue() {
	wp_enqueue_script( 'skt_startup_custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'skt_startup_custom_customize_enqueue' );