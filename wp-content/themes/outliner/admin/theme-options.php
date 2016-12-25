<?php
/**
 * Created by PhpStorm.
 * User: venkat
 * Date: 2/5/16
 * Time: 4:32 PM        
 */

include_once( get_template_directory() . '/admin/kirki/kirki.php' );     
include_once( get_template_directory() . '/admin/kirki-helpers/class-outliner-kirki.php' );
       
Outliner_Kirki::add_config( 'outliner', array(     
	'capability'    => 'edit_theme_options',                  
	'option_type'   => 'theme_mod',         
) );             
     
// Outliner option start //   

//  site identity section // 

Outliner_Kirki::add_section( 'title_tagline', array(
	'title'          => __( 'Site Identity','outliner' ),
	'description'    => __( 'Site Header Options', 'outliner'),       
	'priority'       => 8,         																																														
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'logo_title',
	'label'    => __( 'Enable Logo as Title', 'outliner' ),
	'section'  => 'title_tagline',
	'type'     => 'switch',
	'priority' => 5,
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),
	'default'  => 'off',   
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'tagline',
	'label'    => __( 'Show site Tagline', 'outliner' ), 
	'section'  => 'title_tagline',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),
	'default'  => 'on',
) );

// home panel //

Outliner_Kirki::add_panel( 'home_options', array(     
	'title'       => __( 'Home', 'outliner' ),
	'description' => __( 'Home Page Related Options', 'outliner' ),     
) );  

// home page type section

Outliner_Kirki::add_section( 'home_type_section', array(
	'title'          => __( 'General Settings','outliner' ),
	'description'    => __( 'Home Page options', 'outliner'),
	'panel'          => 'home_options', // Not typically needed. 
) );


Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'enable_home_default_content',
	'label'    => __( 'Enable Home Page Default Content', 'outliner' ),
	'section'  => 'home_type_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	
	'default'  => 'off',
	'tooltip' => __('Enable home page default content ( home page content )','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'home_sidebar',
	'label'    => __( 'Enable sidebar on the Home page', 'outliner' ),
	'section'  => 'home_type_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),

	'default'  => 'off',
	'tooltip' => __('Disable by default. If you want to display the sidebars in your frontpage, turn this Enable.','outliner'),
) );

// Slider section

Outliner_Kirki::add_section( 'slider_section', array(
	'title'          => __( 'Slider Section','outliner' ),
	'description'    => __( 'Home Page Slider Related Options', 'outliner'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Outliner_Kirki::add_field( 'outliner', array(  
	'settings' => 'enable_slider',
	'label'    => __( 'Enable Slider Post ( Section )', 'outliner' ),
	'section'  => 'slider_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ),
	),
	'default'  => 'on',
	
	'tooltip' => __('Enable Slider Post in home page','outliner'),
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'slider_cat',
	'label'    => __( 'Slider Posts category', 'outliner' ),
	'section'  => 'slider_section',
	'type'     => 'select',
	'choices' => Kirki_Helper::get_terms( 'category' ),
	'active_callback' => array(
		array(
			'setting'  => 'enable_slider',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Create post ( Goto Dashboard => Post => Add New ) and Post Featured Image ( Preferred size is 1200 x 450 pixels ) as taken as slider image and Post Content as taken as Flexcaption.','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'slider_count',
	'label'    => __( 'No. of Sliders', 'outliner' ),
	'section'  => 'slider_section',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 999,
		'step' => 1,
	),
	'default'  => 2,
	'active_callback' => array(
		array(
			'setting'  => 'enable_slider',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Enter number of slides you want to display under your selected Category','outliner'),
) );


     
// service section 

Outliner_Kirki::add_section( 'service_section', array(
	'title'          => __( 'Service Section','outliner' ),
	'description'    => __( 'Home Page - Service Related Options', 'outliner'),
	'panel'          => 'home_options', // Not typically needed. 
) );
Outliner_Kirki::add_field( 'outliner', array( 
	'settings' => 'enable_top_service',
	'label'    => __( 'Enable Service Top Section', 'outliner' ),
	'section'  => 'service_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable service top section in home page','outliner'),
) );
Outliner_Kirki::add_field('outliner',array(
	'settings'  =>'service_top_page',
	'label'     =>__( 'Service Top Page', 'outliner' ),
	'section'   =>'service_section',
	'type'      =>'dropdown-pages',
	'active_callback' => array(
		array(
			'setting'  => 'enable_top_service',
			'operator' => '==',
			'value'    => true,
		),
	),
));
Outliner_Kirki::add_field( 'outliner', array( 
	'settings' => 'enable_service',
	'label'    => __( 'Enable Service Section', 'outliner' ),
	'section'  => 'service_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	
	'default'  => 'on',
	'tooltip' => __('Enable service section in home page','outliner'),
) ); 
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'service_count',
	'label'    => __( 'No. of Service Section', 'outliner' ),
	'description' => __('Save the Settings, and Reload this page to Configure the service section','outliner'),
	'section'  => 'service_section',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 99,
		'step' => 1,
	),
	'default'  => 6,
	'active_callback' => array(
		array(
			'setting'  => 'enable_service',
			'operator' => '==',
			'value'    => true,
		),
		
    ),
    'tooltip' => __('Enter number of service page you want to display','outliner'),
) );

if ( get_theme_mod('service_count') > 0 ) {
 $service = get_theme_mod('service_count');
 		for ( $i = 1 ; $i <= $service ; $i++ ) {
             //Create the settings Once, and Loop through it.
 			Outliner_Kirki::add_field( 'outliner', array(
				'settings' => 'service_'.$i,
				'label'    => sprintf(__( 'Service Section #%1$s', 'outliner' ), $i ),
				'section'  => 'service_section',
				'type'     => 'dropdown-pages',	
				//'tooltip' => __('Create Page ( Goto Dashboard => Page =>Add New ) and Page Featured Image ( Preferred size is 100 x 100 pixels )','outliner'),
				'active_callback' => array(
					array(
						'setting'  => 'enable_service',
						'operator' => '==',
						'value'    => true,
					),
					
                ), 
               // 'description' => __('Create Page ( Goto Dashboard => Page =>Add New ) and Page Featured Image ( Preferred size is 100 x 100 pixels )','outliner'),
        
			) );
 		}
}

// latest blog section 

Outliner_Kirki::add_section( 'latest_blog_section', array(
	'title'          => __( 'Latest Blog Section','outliner' ),
	'description'    => __( 'Home Page - Latest Blog Options', 'outliner'),
	'panel'          => 'home_options', // Not typically needed. 
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'enable_recent_post_service',
	'label'    => __( 'Enable Recent Post Section', 'outliner' ),
	'section'  => 'latest_blog_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),

	'default'  => 'on',
	'tooltip' => __('Enable recent post section in home page','outliner'),
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'recent_posts_count',
	'label'    => __( 'No. of Recent Posts', 'outliner' ),
	'section'  => 'latest_blog_section',
	'type'     => 'number',
	'choices' => array(
		'min' => 2,
		'max' => 99,
		'step' => 1,
	),
	'default'  => 4,
	'active_callback' => array(
		array(
			'setting'  => 'enable_recent_post_service',
			'operator' => '==',
			'value'    => true,
		),
	
    ),
) );

// general panel   

Outliner_Kirki::add_panel( 'general_panel', array(   
	'title'       => __( 'General Settings', 'outliner' ),  
	'description' => __( 'general settings', 'outliner' ),         
) );

//  Page title bar section // 

Outliner_Kirki::add_section( 'header-pagetitle-bar', array(   
	'title'          => __( 'Page Title Bar','outliner' ),
	'description'    => __( 'Page Title bar related options', 'outliner'),
	'panel'          => 'general_panel', // Not typically needed.
) );

/*Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'page_titlebar',  
	'label'    => __( 'Page Title Bar', 'outliner' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( 'Show Bar and Content', 'outliner' ),
		2 => __( 'Show Content Only ', 'outliner' ),
		3 => __('Hide','outliner'),
    ),
    'default' => 1,
) );*/
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'page_titlebar_text',  
	'label'    => __( 'Page Title Bar Text', 'outliner' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( 'Show', 'outliner' ),
		2 => __( 'Hide', 'outliner' ), 
    ),
    'default' => 1,
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'breadcrumb',  
	'label'    => __( 'Breadcrumb', 'outliner' ),
	'section'  => 'header-pagetitle-bar', 
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ),
	),
	'default'  => 'on',
) ); 

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'breadcrumb_char',
	'label'    => __( 'Breadcrumb Character', 'outliner' ),
	'section'  => 'header-pagetitle-bar',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		1 => __( ' >> ', 'outliner' ),
		2 => __( ' / ', 'outliner' ),
		3 => __( ' > ', 'outliner' ),
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'breadcrumb',
			'operator' => '==',
			'value'    => true,
		),
	),
	//'sanitize_callback' => 'allow_htmlentities'
) );

//  pagination section // 

Outliner_Kirki::add_section( 'general-pagination', array(   
	'title'          => __( 'Pagination','outliner' ),
	'description'    => __( 'Pagination related options', 'outliner'),
	'panel'          => 'general_panel', // Not typically needed.
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'numeric_pagination',
	'label'    => __( 'Numeric Pagination', 'outliner' ),   
	'section'  => 'general-pagination',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Numbered', 'outliner' ),
		'off' => esc_attr__( 'Next/Previous', 'outliner' )
	),
	'default'  => 'on',
) );

// skin color panel 

Outliner_Kirki::add_panel( 'skin_color_panel', array(   
	'title'       => __( 'Skin Color', 'outliner' ),  
	'description' => __( 'Color Settings', 'outliner' ),         
) );

// Change Color Options

Outliner_Kirki::add_section( 'primary_color_field', array(
	'title'          => __( 'Change Color Options','outliner' ),
	'description'    => __( 'This will reflect in links, buttons,Navigation and many others. Choose a color to match your site.', 'outliner'),
	'panel'          => 'skin_color_panel', // Not typically needed.
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'enable_primary_color',
	'label'    => __( 'Enable Custom Primary color', 'outliner' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),
	'default'  => 'off',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'primary_color',
	'label'    => __( 'Primary color', 'outliner' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#de3c2f',
	'alpha'  => true,
	'active_callback' => array(
		array (
			'setting'  => 'enable_primary_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element'  => 'input[type="text"]:focus,
							input[type="email"]:focus,
							input[type="url"]:focus,.services-wrapper .service span::after,
							input[type="password"]:focus,.post-wrapper .latest-post .latest-post-content a::before,
							input[type="search"]:focus,.post-wrapper .latest-post .latest-post-content a::after,
							textarea:focus,.main-navigation .sub-menu .current_page_item > a:after,
							.main-navigation .sub-menu .current-menu-item > a:after,
							.main-navigation .sub-menu .current_page_ancestor > a:after, .main-navigation .sub-menu li a:hover:after,.branding .site-branding:before,.free-home .services-wrapper .service span:after,.free-home .post-wrapper .latest-post .latest-post-content a:before,.free-home .post-wrapper .latest-post .latest-post-content a:after,
							.archive .blog-thumb:after, .page-template-blog-fullwidth .blog-thumb:after, .page-template-blog-large .blog-thumb:after, .single-post .blog-thumb:after, .page-template-blog-small .blog-thumb:after,ol.comment-list li.byuser article,ol.comment-list li.byuser .comment-author img, blockquote:before,
							blockquote p:after,.widget.widget_ourteam-widget .team-avator:after,.widget.widget_skill-widget .skill-container .skill .skill-percentage:before,.widget.widget_skill-widget .skill-container .skill .skill-percentage:after,
							.ui-accordion h3 span,.ui-accordion .ui-accordion-header-active span:after,.widget_recent-work-widget ul.filter-options li a:hover:after,ul.filter-options li a:hover:after,.notice a,.btn:after,.widget_button-widget a.btn.btn-default:after,
							.pullright:before,.pullleft:before,.pullnone:before,.toggle-normal .toggle-title .fa-minus:after,.toggle-normal .toggle-title .fa-plus,.circle-icon-box .circle-icon-wrapper .fa-stack i,.circle-icon-box .circle-icon-wrapper .fa-stack i:after,.icon-polygon .circle-icon-wrapper h3.fa-stack,.icon-polygon .circle-icon-wrapper h3.fa-stack:before,.icon-polygon .circle-icon-wrapper h3.fa-stack:after,
							.widget_testimonial-widget .testimonials-wrapper:before,.widget_testimonial-widget ul li .client-pic:after,.widget_testimonial-widget .flex-direction-nav .flex-next:after,.widget_testimonial-widget .flex-direction-nav .flex-prev:after,.icon-horizontal .fa-stack:after,.icon-vertical .fa-stack:after,.widget_image-box-widget .image-box img,
							.widget_list-widget ul li .fa,.archive .blog-thumb::after, .single-post .blog-thumb::after, .home.blog .blog-thumb::after, .blog .blog-thumb::after,.widget_list-widget ol li .fa,.widget_recent-posts-widget .recent-posts li:after,.widget_recent-posts-widget .recent-posts-carousel .flex-viewport li:after,.left-sidebar .dropcap-book,.widget_tag_cloud a,.widget_tag_cloud a:after,.widget_recent-work-widget ul.filter-options li a:hover::before,ul.filter-options li a:hover::before,.widget_tag_cloud a::before',
			'property' => 'border-color',
		),
		array(
			'element'  => '.nav-wrap,.main-navigation ul ul li,.main-navigation .sub-menu .current_page_item > a,.site-footer .footer-widgets input[type="submit"],
							.main-navigation .sub-menu .current-menu-item > a,.services-wrapper .service h6::after, .services-wrapper .service h5::after, .services-wrapper .service h4::after, .services-wrapper .service h3::after, .services-wrapper .service h2::after, .services-wrapper .service h1::after,
							.main-navigation .sub-menu .current_page_ancestor > a, .main-navigation .sub-menu li a:hover,ol.webulous_page_navi li a:hover,ol.webulous_page_navi li.bpn-current,.branding .site-branding,.top-nav ul li:hover a,
							.free-home .post-wrapper .latest-post .latest-post-content a,.page-template-blog-fullwidth .more-link, .page-template-blog-large .more-link, .page-template-blog-small .more-link,
							.hentry.sticky,blockquote,.post-wrapper .latest-post .latest-post-content a,
							.contact-form input[type="submit"],.widget.widget_skill-widget .skill-container .skill .skill-percentage,.widget.widget_skill-widget .skill-container .skill .skill-percentage:before,
							.ui-accordion h3,.ui-accordion .ui-accordion-header-active,.widget_recent-work-widget .portfolioeffects .overlay_icon a:hover, .widget_recent-work-widget .work .overlay_icon a:hover,
							.widget_recent-work-widget ul.filter-options li a:hover,.portfolioeffects .overlay_icon a:hover,ul.filter-options li a:hover,ol.flex-control-paging li a.flex-active,.notice,.widget_button-widget a.btn.btn-default,.dropcap-circle,
							.dropcap-box,.dropcap-book,.pullright,.pullleft,.pullnone,.toggle .toggle-title,.withtip:before,.circle-icon-box a.more-button:hover,.circle-icon-box:hover .circle-icon-wrapper .fa-stack i,
							.circle-icon-box:hover a.more-button,.icon-polygon a.more-button,.callout-widget,.widget_testimonial-widget .testimonials-wrapper:after,.widget_testimonial-widget ul li p.client,.widget_testimonial-widget ul li p.client .client-name:before,.widget_social-networks-widget ul li a:hover,.share-box ul li a:hover,
							.icon-horizontal .icon-title:after,.icon-vertical .icon-title:after,.widget_testimonial-widget .flex-direction-nav a,.widget_image-box-widget a.more-button,.widget_recent-posts-widget .recent-posts .rp-content .btn-readmore,.widget_recent-posts-widget .recent-posts-carousel .rp-content .btn-readmore,.widget_recent-posts-widget .recent-posts-slider .rp-content .btn-readmore,.site-footer .footer-bottom ul.menu li.current_page_item a,
							.site-footer .icon-horizontal .fa-stack,.site-footer .icon-vertical .fa-stack,.site-footer .widget.widget_recent-work-widget ul.flex-direction-nav li a.flex-prev,.site-footer .widget.widget_recent-work-widget ul.flex-direction-nav li a.flex-next,  .site-footer .widget.widget_skill-widget .skill-container .skill-percentage,#secondary .left-sidebar .callout-widget,
							.left-sidebar .dropcap-circle,.left-sidebar .dropcap-box,.left-sidebar .icon-horizontal .fa-stack,
							.left-sidebar .icon-vertical .fa-stack,.left-sidebar .widget.widget_recent-work-widget ul.flex-direction-nav li a.flex-prev,.left-sidebar .widget.widget_recent-work-widget ul.flex-direction-nav li a.flex-next,.left-sidebar .widget.widget_skill-widget .skill-container .skill-percentage,
							.widget_calendar table caption,.home.blog .more-link, .blog .more-link,.widget_tag_cloud a,.slicknav_nav li.current_page_item > a,
							.slicknav_nav li.current-menu-parent > a,.slicknav_nav .slicknav_row:hover,.slicknav_nav a:hover,a.slicknav_btn:hover,.btn, .widget_button-widget a.btn.btn-default,
							.woocommerce #content div.product .woocommerce-tabs ul.tabs li a:hover,
							.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
							.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li a:hover,
							.woocommerce-page div.product .woocommerce-tabs ul.tabs li a:hover,
							.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active,
							.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
							.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active,
							.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active,.woocommerce #content nav.woocommerce-pagination ul li a:focus,
							.woocommerce #content nav.woocommerce-pagination ul li a:hover,
							.woocommerce #content nav.woocommerce-pagination ul li span.current,
							.woocommerce nav.woocommerce-pagination ul li a:focus,
							.woocommerce nav.woocommerce-pagination ul li a:hover,
							.woocommerce nav.woocommerce-pagination ul li span.current,
							.woocommerce-page #content nav.woocommerce-pagination ul li a:focus,
							.woocommerce-page #content nav.woocommerce-pagination ul li a:hover,
							.woocommerce-page #content nav.woocommerce-pagination ul li span.current,
							.woocommerce-page nav.woocommerce-pagination ul li a:focus,
							.woocommerce-page nav.woocommerce-pagination ul li a:hover,
							.woocommerce-page nav.woocommerce-pagination ul li span.current,.woocommerce a.remove',
			'property' => 'background-color',
		),
		
		array(
			'element'  => 'a,.main-navigation ul ul a,ol.webulous_page_navi li a,.free-home .services-wrapper .service:hover h6, .free-home .services-wrapper .service:hover h5, .free-home .services-wrapper .service:hover h4, .free-home .services-wrapper .service:hover h3, .free-home .services-wrapper .service:hover h2, .free-home .services-wrapper .service:hover h1,ol.comment-list .reply:before,
							ol.comment-list article .fn,.comment-metadata a:hover,.hentry.post h1 a:hover,.date-structure .dd, .date-structure .mm, .date-structure .yy,
							.entry-meta span:hover i,.entry-meta span:hover a,.entry-footer a:hover span, .entry-footer a:hover i,.entry-footer span:hover i,.entry-footer span:hover a,.page-links a, blockquote:before,
							.breadcrumb .breadcrumb-left #crumbs .fa:hover, .breadcrumb .breadcrumb-left #crumbs a:hover,.nav-bottom-slider-breadcrumb .breadcrumb-right #crumbs a:hover,.order-total .amount,
							.cart-subtotal .amount,.woocommerce #content table.cart a.remove,
							.woocommerce table.cart a.remove,
							.woocommerce-page #content table.cart a.remove,
							.woocommerce-page table.cart a.remove,.widget.widget_skill-widget .skill-container .fa-stack,.breadcrumb-wrap #breadcrumb a:hover,.breadcrumb-wrap #breadcrumb a:hover i,.alert-message a:hover,.notice a:hover,.pullright:before,.pullleft:before,.pullnone:before,
							.circle-icon-box .circle-icon-wrapper .fa-stack i,.circle-icon-box:hover a.link-title,.circle-icon-box:hover a.link-title h4,.circle-icon-box:hover h4,.icon-horizontal:hover a.link-title,
							.icon-horizontal:hover .icon-title,
							.icon-horizontal:hover .fa-stack,
							.icon-vertical:hover a.link-title,.order-total .amount,
							.cart-subtotal .amount,.woocommerce #content table.cart a.remove,
							.woocommerce table.cart a.remove,
							.woocommerce-page #content table.cart a.remove,
							.woocommerce-page table.cart a.remove,.woocommerce .woocommerce-breadcrumb a:hover,
							.woocommerce-page .woocommerce-breadcrumb a:hover,
							.icon-vertical:hover .icon-title,.star-rating,
							.icon-vertical:hover .fa-stack,.icon-horizontal:hover .fa-stack i,
							.icon-vertical:hover .fa-stack i,.widget_list-widget ul li .fa, .widget_list-widget ol li .fa,.widget_recent-posts-widget .recent-posts .rp-content h4:hover,.widget_recent-posts-widget .recent-posts-carousel .rp-content h4:hover,
							.widget_recent-posts-widget .recent-posts-slider .rp-content h4:hover,.site-footer .icon-horizontal .icon-title,
							.site-footer .icon-vertical .icon-title,.site-footer .widget_list-widget ul li i,.site-footer .widget.widget_ourteam-widget:hover .team-content h4,.site-footer .widget_testimonial-widget ul li .client,.left-sidebar .dropcap,
							.left-sidebar .icon-horizontal .icon-title,.left-sidebar .icon-vertical .icon-title,.left-sidebar .widget_list-widget ul li i,#secondary .left-sidebar .widget.widget_ourteam-widget .team-content h4,.left-sidebar .widget_recent-posts-widget .flex-recent-posts li a,.left-sidebar .widget_social-networks-widget ul li a:hover i,
							#secondary .widget_button-widget .btn.white:hover,.widget-area ul li a:hover,#secondary #recentcomments a,.widget_calendar table th a, .widget_calendar table td a,.widget-area .widget_rss a,.site-footer .footer-widgets #calendar_wrap a,.site-footer .footer-widgets a:hover,.site-info p a',
			'property' => 'color',
		),
		
		array(
			'element'  => '.woocommerce #content input.button:hover,
							.woocommerce #respond input#submit:hover,
							.woocommerce a.button:hover,
							.woocommerce button.button:hover,
							.woocommerce input.button:hover,
							.woocommerce-page #content input.button:hover,
							.woocommerce-page #respond input#submit:hover,
							.woocommerce-page a.button:hover,
							.woocommerce-page button.button:hover,
							.woocommerce-page input.button:hover',
			'property' => 'background-color',
			'suffix' => '!important',
		),
		array(
			'element' => '.main-navigation ul li:hover > ul,.date-structure .dd:after, .date-structure .mm:after, .date-structure .yy:after,.sep:after,.withtip.top:after',
			'property' => 'border-top-color',
		),
		array(
			'element' => '.home.blog .hentry.post .entry-title::after, .blog .hentry.post .entry-title::after,.page-template-blog-fullwidth .hentry.post .entry-title:after, .page-template-blog-large .hentry.post .entry-title:after, .page-template-blog-small .hentry.post .entry-title:after,.header-para-primaryborder:after,
		.header-ld-border .widget-title:after, .header-ld-border .left:after,.header-center-border .widget-title:after,.our-team:hover h4:after,.portfolio-excerpt h4:after,.withtip.bottom:after',
			'property' => 'border-bottom-color',
		),
		array(
			'element' => '.withtip.right:after,.icon-polygon .circle-icon-wrapper h3.fa-stack ',
			'property' => 'border-right-color',
		),
		array(
			'element' => '.withtip.left:after,.icon-polygon .circle-icon-wrapper h3.fa-stack ',
			'property' => 'border-left-color',
		),
	),
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'enable_logo_bg_color',
	'label'    => __( 'Enable Custom Navigation Logo BG Color', 'outliner' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),
	'default'  => 'off',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'logo_bg_color',
	'label'    => __( 'Navigation Logo BG Color', 'outliner' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#de3c2f',
	'alpha'  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_logo_bg_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => ' .branding .site-branding',
			'property' => 'background-color',
		),
		array(
			'element' => ' .branding .site-branding::before',
			'property' => 'border-color',
		),
	),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'enable_nav_bg_color',
	'label'    => __( 'Enable Navigation Bar BG Color', 'outliner' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),
	'default'  => 'off',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'nav_bg_color',
	'label'    => __( 'Navigation Bar BG Color', 'outliner' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#4c4c4c',
	'alpha'  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_nav_bg_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '.main-navigation',
			'property' => 'background-color',
		),
		array(
			'element' => '.nav-menu',
			'property' => 'box-shadow',
		),
	),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'enable_dd_color',
	'label'    => __( 'Enable Custom Navigation Dropdown Font Color', 'outliner' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),
	'default'  => 'off',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'dd_color',
	'label'    => __( 'Navigation Dropdown Font Color', 'outliner' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#de3c2f',
	'alpha'  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_dd_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '.main-navigation ul ul a',
			'property' => 'color',
		),
		array(
			'element' => '.main-navigation ul li:hover > ul',
			'property' => 'border-top-color',
		),
	),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'enable_dd_hover_color',
	'label'    => __( 'Enable  Custom Navigation Dropdown Hover Color', 'outliner' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),
	'default'  => 'off',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'dd_hover_color',
	'label'    => __( 'Navigation Dropdown Hover Color', 'outliner' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#de3c2f',
	'alpha'  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_dd_hover_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '.main-navigation .sub-menu .current_page_item > a, .main-navigation .sub-menu .current-menu-item > a, .main-navigation .sub-menu .current_page_ancestor > a, .main-navigation .children .current_page_item > a, .main-navigation .children .current-menu-item > a, .main-navigation .children .current_page_ancestor > a,.main-navigation .sub-menu li a:hover, .main-navigation .children li a:hover',
			'property' => 'background-color',
		),
		array(
			'element' => '.main-navigation .sub-menu .current_page_item > a::after, .main-navigation .sub-menu .current-menu-item > a::after, .main-navigation .sub-menu .current_page_ancestor > a::after, .main-navigation .children .current_page_item > a::after, .main-navigation .children .current-menu-item > a::after, .main-navigation .children .current_page_ancestor > a::after,.main-navigation .sub-menu li a:hover::after, .main-navigation .children li a:hover::after',
			'property' => 'border-color',
		),
	),
) );
/*Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'enable_secondary_color',
	'label'    => __( 'Enable Custom Secondary color', 'outliner' ),
	'section'  => 'primary_color_field',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),
	'default'  => 'off',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'secondary_color',
	'label'    => __( 'Secondary Color', 'outliner' ),
	'section'  => 'primary_color_field',
	'type'     => 'color',
	'default'  => '#222222',
	'alpha'  => true,
	'active_callback' => array(
		array(
			'setting'  => 'enable_secondary_color',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output' => array(
		array(
			'element' => '.not-found-inner a:hover,
							.footer-bottom p a:hover,
							.entry-meta span a:hover,
							.entry-footer span a:hover,
							#secondary .widget_rss .widget-title .rsswidget,
							.footer-top ul li a,
							.more-link .meta-nav,
							.error-404.not-found,
							a.more-link,
							.site-main .comment-navigation a:hover,
							a:hover,
							a:focus,
							a:active,
							.comment-list > li article .reply:hover i,
							.comment-list > li article .comment-meta .comment-author b:hover,
							.comment-list > li article .comment-meta .comment-author a:hover,
							.comment-list > li article .comment-meta .comment-author cite:hover,
							.widget_calendar table th a:hover,
							.widget_calendar table td a:hover',
			'property' => 'color',
		),
		array(
			'element' => 'th a:hover,
							#recentcomments a:hover,
							.left-sidebar .widget_rss a:hover',
			'property' => 'color',
			'suffix' => '!important',
		),
		array(
			'element' => '.home .flexslider .slides .flex-caption p a:hover,
							.home .flexslider .slides .flex-caption a:hover,
							.footer-widgets .textwidget .wpcf7-form input.wpcf7-submit:hover,
							.site-header .branding .social .widget .textwidget li a,
							.share-box ul li a,
							.site-footer .widget_social-networks-widget ul li a:hover,
							.site-footer .search-form input.search-submit:hover,
							.site-footer .search-form input[type="submit"]:hover',
			'property' => 'background-color',
		),
       array(
			'element' => '.flexslider .slides .flex-caption p a::after',
			'property' => 'border-left-color',
			'suffix' => '!important',
		),
        array(
			'element' => '.social .widget_social-networks-widget ul li a::after',
			'property' => 'border-top-color',
		),
	),
) );*/
// typography panel //

Outliner_Kirki::add_panel( 'typography', array( 
	'title'       => __( 'Typography', 'outliner' ),
	'description' => __( 'Typography and Link Color Settings', 'outliner' ),
) );
   
    Outliner_Kirki::add_section( 'typography_section', array(
		'title'          => __( 'General Settings','outliner' ),
		'description'    => __( 'General Settings', 'outliner'),
		'panel'          => 'typography', // Not typically needed.
	) );
	Outliner_Kirki::add_field( 'outliner', array(
		'settings' => 'custom_typography',
		'label'    => __( 'Enable Custom Typography', 'outliner' ),
		'description' => __('Save the Settings, and Reload this page to Configure the typography section','outliner'),
		'section'  => 'typography_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'outliner' ),
			'off' => esc_attr__( 'Disable', 'outliner' )
		),
		'tooltip' => __('Turn on to customize typography and turn off for default typography','outliner'),
		'default'  => 'off',
	) );

$typography_setting = get_theme_mod('custom_typography',false );
if( $typography_setting ) :

        $body_font = get_theme_mod('body_family','Droid Serif');		        
	    $body_color = get_theme_mod( 'body_color','#4c4c4c' );
		$body_size = get_theme_mod( 'body_size','16');
		$body_weight = get_theme_mod( 'body_weight','regular');
		$body_weight == 'bold' ? $body_weight = '400':  $body_weight = 'regular';
		

	Outliner_Kirki::add_section( 'body_font', array(
		'title'          => __( 'Body Font','outliner' ),
		'description'    => __( 'Specify the body font properties', 'outliner'),
		'panel'          => 'typography', // Not typically needed.
	) ); 


	Outliner_Kirki::add_field( 'outliner', array(
		'settings' => 'body',
		'label'    => __( 'Body Settings', 'outliner' ),
		'section'  => 'body_font', 
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $body_font,
			'variant'        => $body_weight,
			'font-size'      => $body_size.'px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'color'          => $body_color,
		),
		'output'      => array(
			array(
				'element' => 'body',
				//'suffix' => '!important',
			),
		),
	) );


	Outliner_Kirki::add_section( 'heading_section', array(
		'title'          => __( 'Heading Font','outliner' ),
		'description'    => __( 'Specify typography of h1,h2,h3,h4,h5,h6', 'outliner'),
		'panel'          => 'typography', // Not typically needed.
	) );
	

	$h1_font = get_theme_mod('h1_family','Droid Sans');
	$h1_color = get_theme_mod( 'h1_color','#4c4c4c' );
	$h1_size = get_theme_mod( 'h1_size','48');
	$h1_weight = get_theme_mod( 'h1_weight','700');
	$h1_weight == 'bold' ? $h1_weight = '700' : $h1_weight = 'regular';

	Outliner_Kirki::add_field( 'outliner', array(
		'settings' => 'h1',
		'label'    => __( 'H1 Settings', 'outliner' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h1_font,
			'variant'        => $h1_weight,
			'font-size'      => $h1_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h1_color,
		),
		'output'      => array(
			array(
				'element' => 'h1',
			),
		),
		
	) );

	$h2_font = get_theme_mod('h2_family','Droid Sans');
	$h2_color = get_theme_mod( 'h2_color','#4c4c4c' );
	$h2_size = get_theme_mod( 'h2_size','36');
	$h2_weight = get_theme_mod( 'h2_weight','700');
	$h2_weight == 'bold' ? $h2_weight = '700' : $h2_weight = 'regular';

	Outliner_Kirki::add_field( 'outliner', array(
		'settings' => 'h2',
		'label'    => __( 'H2 Settings', 'outliner' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h2_font,
			'variant'        => $h2_weight,
			'font-size'      => $h2_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h2_color,
		),
		'output'      => array(
			array(
				'element' => 'h2',
			),
		),
		
	) );

	$h3_font = get_theme_mod('h3_family','Droid Sans');
	$h3_color = get_theme_mod( 'h3_color','#4c4c4c' );
	$h3_size = get_theme_mod( 'h3_size','30');
	$h3_weight = get_theme_mod( 'h3_weight','700');
	$h3_weight == 'bold' ? $h3_weight = '700' : $h3_weight = 'regular';

	Outliner_Kirki::add_field( 'outliner', array(
		'settings' => 'h3',
		'label'    => __( 'H3 Settings', 'outliner' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default' => array(
			'font-family'    => $h3_font,
			'variant'        => $h3_weight,
			'font-size'      => $h3_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h3_color,
		),
		'output'      => array(
			array(
				'element' => 'h3',
			),
		),
		
	) );

	$h4_font = get_theme_mod('h4_family','Droid Sans');
	$h4_color = get_theme_mod( 'h4_color','#4c4c4c' );
	$h4_size = get_theme_mod( 'h4_size','24');
	$h4_weight = get_theme_mod( 'h4_weight','700');
	$h4_weight == 'bold' ? $h4_weight = '700' : $h4_weight = 'regular';


	Outliner_Kirki::add_field( 'outliner', array(
		'settings' => 'h4',
		'label'    => __( 'H4 Settings', 'outliner' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h4_font,
			'variant'        => $h4_weight,
			'font-size'      => $h4_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h4_color,
		),
		'output'      => array(
			array(
				'element' => 'h4',
			),
		),
	
	) );

    $h5_font = get_theme_mod('h5_family','Droid Sans');
	$h5_color = get_theme_mod( 'h5_color','#4c4c4c' );
	$h5_size = get_theme_mod( 'h5_size','18');
	$h5_weight = get_theme_mod( 'h5_weight','700');
	$h5_weight == 'bold' ? $h5_weight = '700' : $h5_weight = 'regular';


	Outliner_Kirki::add_field( 'outliner', array(
		'settings' => 'h5',
		'label'    => __( 'H5 Settings', 'outliner' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h5_font,
			'variant'        => $h5_weight,
			'font-size'      => $h5_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h5_color,
		),
		'output'      => array(
			array(
				'element' => 'h5',
			),
		),
		
	) );

	$h6_font = get_theme_mod('h6_family','Droid Sans');
	$h6_color = get_theme_mod( 'h6_color','#4c4c4c' );
	$h6_size = get_theme_mod( 'h6_size','16');
	$h6_weight = get_theme_mod( 'h6_weight','700');
	$h6_weight == 'bold' ? $h6_weight = '700' : $h6_weight = 'regular';


	Outliner_Kirki::add_field( 'outliner', array(
		'settings' => 'h6',
		'label'    => __( 'H6 Settings', 'outliner' ),
		'section'  => 'heading_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => $h6_font,
			'variant'        => $h6_weight,
			'font-size'      => $h6_size.'px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => $h6_color,
		),
		'output'      => array(
			array(
				'element' => 'h6',
			),
		),
		
	) );

	// navigation font 
	Outliner_Kirki::add_section( 'navigation_section', array(
		'title'          => __( 'Navigation Font','outliner' ),
		'description'    => __( 'Specify Navigation font properties', 'outliner'),
		'panel'          => 'typography', // Not typically needed.
	) );

	Outliner_Kirki::add_field( 'outliner', array(
		'settings' => 'navigation_font',
		'label'    => __( 'Navigation Font Settings', 'outliner' ),
		'section'  => 'navigation_section',
		'type'     => 'typography',
		'default'     => array(
			'font-family'    => 'Droid Sans',
			'variant'        => '700',
			'font-size'      => '16px',
			'line-height'    => '1.4',
			'letter-spacing' => '0',
			'color'          => '',
		),
		'output'      => array(
			array(
				'element' => '.main-navigation a',
			),
		),
	) );
endif; 


// header panel //

Outliner_Kirki::add_panel( 'header_panel', array(     
	'title'       => __( 'Header', 'outliner' ),
	'description' => __( 'Header Related Options', 'outliner' ), 
) );  

Outliner_Kirki::add_section( 'header', array(
	'title'          => __( 'General Header','outliner' ),
	'description'    => __( 'Header options', 'outliner'),
	'panel'          => 'header_panel', // Not typically needed.  
) );    



/* Breaking News section  */
/*Outliner_Kirki::add_section( 'header_breaking_news', array(
	'title'          => __( 'Breaking News','outliner' ),
	'description'    => __( 'Breaking News', 'outliner'),
	'panel'          => 'header_panel', // Not typically needed.
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'header_breaking_news',
	'label'    => __( 'Enable Breaking News', 'outliner' ), 
	'section'  => 'header_breaking_news',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),
	'active_callback' => array(
		array(
			'setting'  => 'home-page-type',
			'operator' => '==',
			'value'    => 'magazine',
		),
    ),
	'default'  => 'off',
) );*/
/* STICKY HEADER section */   

Outliner_Kirki::add_section( 'stricky_header', array(
	'title'          => __( 'Sticky Menu','outliner' ),
	'description'    => __( 'sticky header', 'outliner'),
	'panel'          => 'header_panel', // Not typically needed.
) );
Outliner_Kirki::add_field( 'outliner', array(    
	'settings' => 'sticky_header',
	'label'    => __( 'Enable Sticky Header', 'outliner' ),
	'section'  => 'stricky_header',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),
	'default'  => 'off',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'sticky_header_position',
	'label'    => __( 'Enable Sticky Header Position', 'outliner' ),
	'section'  => 'stricky_header',
	'type'     => 'radio-buttonset',
	'choices' => array(
		'top'  => esc_attr__( 'Top', 'outliner' ),
		'bottom' => esc_attr__( 'Bottom', 'outliner' )
	),
	'active_callback'    => array(
		array(
			'setting'  => 'sticky_header',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'top',
) );
/*
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'header_top_margin',
	'label'    => __( 'Header Top Margin', 'outliner' ),
	'description' => __('Select the top margin of header in pixels','outliner'),
	'section'  => 'header',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1,
	),
	//'default'  => '213',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'header_bottom_margin',
	'label'    => __( 'Header Bottom Margin', 'outliner' ),
	'description' => __('Select the bottom margin of header in pixels','outliner'),
	'section'  => 'header',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1,
	),
	//'default'  => '213',
) );*/

Outliner_Kirki::add_section( 'header_image', array(
	'title'          => __( 'Header Background Image','outliner' ),
	'description'    => __( 'Custom Header Image options', 'outliner'),
	'panel'          => 'header_panel', // Not typically needed.  
) );

Outliner_Kirki::add_field( 'outliner', array(   
	'settings' => 'header_bg_size',
	'label'    => __( 'Header Background Size', 'outliner' ),
	'section'  => 'header_image',
	'type'     => 'radio-buttonset', 
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'outliner' ),
		'contain' => esc_attr__( 'Contain', 'outliner' ),
		'auto'  => esc_attr__( 'Auto', 'outliner' ),
		'inherit'  => esc_attr__( 'Inherit', 'outliner' ),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-size',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'cover',
	'tooltip' => __('Header Background Image Size','outliner'),
) );

/*Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'header_height',
	'label'    => __( 'Header Background Image Height', 'outliner' ),
	'section'  => 'header_image',
	'type'     => 'number',
	'choices' => array(
		'min' => 100,
		'max' => 600,
		'step' => 1,
	),
	'default'  => '213',
) ); */
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'header_bg_repeat',
	'label'    => __( 'Header Background Repeat', 'outliner' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'outliner'),
        'repeat' => esc_attr__('Repeat', 'outliner'),
        'repeat-x' => esc_attr__('Repeat Horizontally','outliner'),
        'repeat-y' => esc_attr__('Repeat Vertically','outliner'),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-repeat',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'repeat',  
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'header_bg_position', 
	'label'    => __( 'Header Background Position', 'outliner' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'outliner'),
        'center center' => esc_attr__('Center Center', 'outliner'),
        'center bottom' => esc_attr__('Center Bottom', 'outliner'),
        'left top' => esc_attr__('Left Top', 'outliner'),
        'left center' => esc_attr__('Left Center', 'outliner'),
        'left bottom' => esc_attr__('Left Bottom', 'outliner'),
        'right top' => esc_attr__('Right Top', 'outliner'),
        'right center' => esc_attr__('Right Center', 'outliner'),
        'right bottom' => esc_attr__('Right Bottom', 'outliner'),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-position',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'center center',  
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'header_bg_attachment',
	'label'    => __( 'Header Background Attachment', 'outliner' ),
	'section'  => 'header_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'outliner'),
        'fixed' => esc_attr__('Fixed', 'outliner'),
	),
	'output'   => array(
		array(
			'element'  => '.header-image',
			'property' => 'background-attachment',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_image',
			'operator' => '!=',
			'value'    => 'remove-header',
		),
	),
	'default'  => 'scroll',  
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'header_overlay',
	'label'    => __( 'Enable Header( Background ) Overlay', 'outliner' ),
	'section'  => 'header_image',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),
	'default'  => 'off',
) );
  
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'header_overlay_color',
	'label'    => __( 'Header Overlay ( Background )color', 'outliner' ),
	'section'  => 'header_image',
	'type'     => 'color',
	'alpha' => true,
	'default'  => '#E5493A', 
	'output'   => array(
		array(
			'element'  => '.overlay-header',
			'property' => 'background-color',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_overlay',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

/*
/* e-option start */
/*
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'custon_favicon',
	'label'    => __( 'Custom Favicon', 'outliner' ),
	'section'  => 'header',
	'type'     => 'upload',
	'default'  => '',
) ); */
/* e-option start */ 
/* Blog page section */


/* Blog panel */

Outliner_Kirki::add_panel( 'blog_panel', array(     
	'title'       => __( 'Blog', 'outliner' ),
	'description' => __( 'Blog Related Options', 'outliner' ),     
) ); 
Outliner_Kirki::add_section( 'blog', array(
	'title'          => __( 'Blog Page','outliner' ),
	'description'    => __( 'Blog Related Options', 'outliner'),
	'panel'          => 'blog_panel', // Not typically needed.
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'blog-slider',
	'label'    => __( 'Enable to show the slider on blog page', 'outliner' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'off',
	'tooltip' => __('To show the slider on posts page','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'blog_layout',
	'label'    => __( 'Select Blog Page Layout you prefer', 'outliner' ),
	'section'  => 'blog',
	'type'     => 'select',
	'multiple'  => 1,
	'choices' => array(
		1  => esc_attr__( 'Default ( One Column )', 'outliner' ),
		2 => esc_attr__( 'Two Columns ', 'outliner' ),
		3 => esc_attr__( 'Three Columns ( Without Sidebar ) ', 'outliner' ),
		4 => esc_attr__( 'Two Columns With Masonry', 'outliner' ),
		5 => esc_attr__( 'Three Columns With Masonry ( Without Sidebar ) ', 'outliner' ),
	),
	'default'  => 1,
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'featured_image',
	'label'    => __( 'Enable Featured Image', 'outliner' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable Featured Image for blog page','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'more_text',
	'label'    => __( 'More Text', 'outliner' ),
	'section'  => 'blog',
	'type'     => 'text',
	'description' => __('Text to display in case of text too long','outliner'),
	'default' => __('Read More','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'featured_image_size',
	'label'    => __( 'Choose the Featured Image Size for Blog Page', 'outliner' ),
	'section'  => 'blog',
	'type'     => 'select',
	'multiple'  => 1,
	'choices' => array(
		1 => esc_attr__( 'Large Featured Image', 'outliner' ),
		2 => esc_attr__( 'Small Featured Image', 'outliner' ),
		3 => esc_attr__( 'Original Size', 'outliner' ),
		4 => esc_attr__( 'Medium', 'outliner' ),
		5 => esc_attr__( 'Large', 'outliner' ), 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'featured_image',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Set large and medium image size: Goto Dashboard => Settings => Media', 'outliner') ,
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'enable_single_post_top_meta',
	'label'    => __( 'Enable to display top post meta data', 'outliner' ),
	'section'  => 'blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable to Display Top Post Meta Details. This will reflect for blog page, single blog page, blog full width & blog large templates','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'single_post_top_meta',
	'label'    => __( 'Activate and Arrange the Order of Top Post Meta elements', 'outliner' ),
	'section'  => 'blog',
	'type'     => 'sortable',
	'choices'     => array(
		1 => esc_attr__( 'date', 'outliner' ),
		2 => esc_attr__( 'author', 'outliner' ),
		3 => esc_attr__( 'comment', 'outliner' ),
		4 => esc_attr__( 'category', 'outliner' ),
		5 => esc_attr__( 'tags', 'outliner' ),
		6 => esc_attr__( 'edit', 'outliner' ),
	),
	'default'  => array(2, 6),
	'active_callback' => array(
		array(
			'setting'  => 'enable_single_post_top_meta',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Click above eye icon in order to activate the field, This will reflect for blog page, single blog page, blog full width & blog large templates','outliner'),

) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'enable_single_post_bottom_meta',
	'label'    => __( 'Enable to display bottom post meta data', 'outliner' ),
	'section'  => 'blog', 
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'tooltip' => __('Enable to Display Top Post Meta Details. This will reflect for blog page, single blog page, blog full width & blog large templates','outliner'),
	'default'  => 'on',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'single_post_bottom_meta',
	'label'    => __( 'Activate and arrange the Order of Bottom Post Meta elements', 'outliner' ),
	'section'  => 'blog',
	'type'     => 'sortable',
	'choices'     => array(
		1 => esc_attr__( 'date', 'outliner' ),
		2 => esc_attr__( 'author', 'outliner' ),
		3 => esc_attr__( 'comment', 'outliner' ),
		4 => esc_attr__( 'category', 'outliner' ),
		5 => esc_attr__( 'tags', 'outliner' ),
		6 => esc_attr__( 'edit', 'outliner' ),
	),
	'default'  => array(3,4,5),
	'active_callback' => array(
		array(
			'setting'  => 'enable_single_post_bottom_meta',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Click above eye icon in order to activate the field, This will reflect for blog page, single blog page, blog full width & blog large templates','outliner'),
) );


/* Single Blog page section */

Outliner_Kirki::add_section( 'single_blog', array(
	'title'          => __( 'Single Blog Page','outliner' ),
	'description'    => __( 'Single Blog Page Related Options', 'outliner'),
	'panel'          => 'blog_panel', // Not typically needed.
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'single_featured_image',
	'label'    => __( 'Enable Single Post Featured Image', 'outliner' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Enable Featured Image for Single Post Page','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'single_featured_image_size',
	'label'    => __( 'Choose the featured image display type for Single Post Page', 'outliner' ),
	'section'  => 'single_blog',
	'type'     => 'radio',
	'choices' => array(
		1  => esc_attr__( 'Large Featured Image', 'outliner' ),
		2 => esc_attr__( 'Small Featured Image', 'outliner' ),
		3 => esc_attr__( 'FullWidth Featured Image', 'outliner' ),
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'single_featured_image',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'social_sharing_box',  
	'label'    => __( 'Enable Social Sharing options Box below single post', 'outliner' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'author_bio_box',
	'label'    => __( 'Enable Author Bio Box below single post', 'outliner' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'off',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'related_posts',
	'label'    => __( 'Show Related Posts', 'outliner' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'off',
	'tooltip' => __('Show the Related Post for Single Blog Page','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'related_posts_hierarchy',
	'label'    => __( 'Related Posts Must Be Shown As:', 'outliner' ),
	'section'  => 'single_blog',
	'type'     => 'radio',
	'choices' => array(
		1  => esc_attr__( 'Related Posts By Tags', 'outliner' ),
		2 => esc_attr__( 'Related Posts By Categories', 'outliner' ) 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'related_posts',
			'operator' => '==',
			'value'    => true,
		),
    ),
    'tooltip' => __('Select the Hierarchy','outliner'),

) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'comments',
	'label'    => __( ' Show Comments', 'outliner' ),
	'section'  => 'single_blog',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
	'tooltip' => __('Show the Comments for Single Blog Page','outliner'),
) );
/* FOOTER SECTION 
footer panel */

Outliner_Kirki::add_panel( 'footer_panel', array(     
	'title'       => __( 'Footer', 'outliner' ),
	'description' => __( 'Footer Related Options', 'outliner' ),     
) );  

Outliner_Kirki::add_section( 'footer', array(
	'title'          => __( 'Footer','outliner' ),
	'description'    => __( 'Footer related options', 'outliner'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_widgets',
	'label'    => __( 'Footer Widget Area', 'outliner' ),
	'description' => sprintf(__('Select widgets, Goto <a href="%1$s"target="_blank"> Customizer </a> => Widgets','outliner'),admin_url('customize.php') ),
	'section'  => 'footer',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
) );
/* Choose No.Of Footer area */
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_widgets_count',
	'label'    => __( 'Choose No.of widget area you want in footer', 'outliner' ),
	'section'  => 'footer',
	'type'     => 'radio-buttonset',
	'choices' => array(
		1  => esc_attr__( '1', 'outliner' ),
		2  => esc_attr__( '2', 'outliner' ),
		3  => esc_attr__( '3', 'outliner' ),
		4  => esc_attr__( '4', 'outliner' ),
	),
	'default'  => 4,
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'copyright',
	'label'    => __( 'Footer Copyright Text', 'outliner' ),
	'section'  => 'footer',
	'type'     => 'textarea',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_top_margin',
	'label'    => __( 'Footer Top Margin', 'outliner' ),
	'description' => __('Select the top margin of footer in pixels','outliner'),
	'section'  => 'footer',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.site-footer',
			'property' => 'margin-top',
			'units' => 'px',
		),
	),
	'default'  => 0,
) );

/* CUSTOM FOOTER BACKGROUND IMAGE 
footer background image section  */

Outliner_Kirki::add_section( 'footer_image', array(
	'title'          => __( 'Footer Image','outliner' ),
	'description'    => __( 'Custom Footer Image options', 'outliner'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_bg_image',
	'label'    => __( 'Upload Footer Background Image', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.footer-widgets',
			'property' => 'background-image',
		),
	),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_bg_size',
	'label'    => __( 'Footer Background Size', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'radio-buttonset',
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'outliner' ),
		'contain' => esc_attr__( 'Contain', 'outliner' ),
		'auto'  => esc_attr__( 'Auto', 'outliner' ),
		'inherit'  => esc_attr__( 'Inherit', 'outliner' ),
	),
	'output'   => array(
		array(
			'element'  => '.footer-widgets',
			'property' => 'background-size',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'cover',
	'tooltip' => __('Footer Background Image Size','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_bg_repeat',
	'label'    => __( 'Footer Background Repeat', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'outliner'),
        'repeat' => esc_attr__('Repeat', 'outliner'),
        'repeat-x' => esc_attr__('Repeat Horizontally','outliner'),
        'repeat-y' => esc_attr__('Repeat Vertically','outliner'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-widgets',
			'property' => 'background-repeat',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_bg_position',
	'label'    => __( 'Footer Background Position', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'outliner'),
        'center center' => esc_attr__('Center Center', 'outliner'),
        'center bottom' => esc_attr__('Center Bottom', 'outliner'),
        'left top' => esc_attr__('Left Top', 'outliner'),
        'left center' => esc_attr__('Left Center', 'outliner'),
        'left bottom' => esc_attr__('Left Bottom', 'outliner'),
        'right top' => esc_attr__('Right Top', 'outliner'),
        'right center' => esc_attr__('Right Center', 'outliner'),
        'right bottom' => esc_attr__('Right Bottom', 'outliner'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-widgets',
			'property' => 'background-position',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'center center',  
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_bg_attachment',
	'label'    => __( 'Footer Background Attachment', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'outliner'),
        'fixed' => esc_attr__('Fixed', 'outliner'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-widgets',
			'property' => 'background-attachment',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'scroll',  
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_overlay',
	'label'    => __( 'Enable Footer( Background ) Overlay', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),
	'default'  => 'off',
) );
  
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_overlay_color',
	'label'    => __( 'Footer Overlay ( Background )color', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'color',
	'alpha' => true,
	'default'  => '#E5493A', 
	'active_callback' => array(
		array(
			'setting'  => 'footer_overlay',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output'   => array(
		array(
			'element'  => '.overlay-footer',
			'property' => 'background-color',
		),
	),
) );


// single page section //

Outliner_Kirki::add_section( 'single_page', array(
	'title'          => __( 'Single Page','outliner' ),
	'description'    => __( 'Single Page Related Options', 'outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'single_page_featured_image',
	'label'    => __( 'Enable Single Page Featured Image', 'outliner' ),
	'section'  => 'single_page',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'single_page_featured_image_size',
	'label'    => __( 'Single Page Featured Image Size', 'outliner' ),
	'section'  => 'single_page',
	'type'     => 'radio-buttonset',
	'choices' => array(
		1  => esc_attr__( 'Normal', 'outliner' ),
		2 => esc_attr__( 'FullWidth', 'outliner' ) 
	),
	'default'  => 1,
	'active_callback' => array(
		array(
			'setting'  => 'single_page_featured_image',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );

// Layout section //

Outliner_Kirki::add_section( 'layout', array(
	'title'          => __( 'Layout','outliner' ),
	'description'    => __( 'Layout Related Options', 'outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'site-style',
	'label'    => __( 'Site Style', 'outliner' ),
	'section'  => 'layout',
	'type'     => 'radio-buttonset',
	'choices' => array(
		'wide' =>  esc_attr__('Wide', 'outliner'),
        'boxed' =>  esc_attr__('Boxed', 'outliner'),
        'fluid' =>  esc_attr__('Fluid', 'outliner'),  
        //'static' =>  esc_attr__('Static ( Non Responsive )', 'outliner'),
    ),
	'default'  => 'wide',
	'tooltip' => __('Select the default site layout. Defaults to "Wide".','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'sidebar_position',
	'label'    => __( 'Main Layout', 'outliner' ),
	'section'  => 'layout',
	'type'     => 'radio-image',   
	'description' => __('Select main content and sidebar arranoutlinerent.','outliner'),
	'choices' => array(
		'left' =>  get_template_directory_uri() . '/admin/kirki/assets/images/2cl.png',
        'right' =>  get_template_directory_uri() . '/admin/kirki/assets/images/2cr.png',
        'two-sidebar' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cm.png',  
        'two-sidebar-left' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cl.png',
        'two-sidebar-right' =>  get_template_directory_uri() . '/admin/kirki/assets/images/3cr.png',
        'fullwidth' =>  get_template_directory_uri() . '/admin/kirki/assets/images/1c.png',
        'no-sidebar' =>  get_template_directory_uri() . '/images/no-sidebar.png',
    ),
	'default'  => 'right',
	'tooltip' => __('This layout will be reflected in all pages unless unique layout template is set for specific page','outliner'),
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'body_top_margin',
	'label'    => __( 'Body Top Margin', 'outliner' ),
	'description' => __('Select the top margin of body element in pixels','outliner'),
	'section'  => 'layout',
	'type'     => 'number',
	'choices' => array(
		'min' => 0,
		'max' => 200,
		'step' => 1,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'margin-top',
			'units'    => 'px',
		),
	),
	'default'  => 0,
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'body_bottom_margin',
	'label'    => __( 'Body Bottom Margin', 'outliner' ),
	'description' => __('Select the bottom margin of body element in pixels','outliner'),
	'section'  => 'layout',
	'type'     => 'number',
	'choices' => array(
		'min' => 0,
		'max' => 200,
		'step' => 1,
	),
	'active_callback'    => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'margin-bottom',
			'units'    => 'px',
		),
	),
	'default'  => 0,
) );

/* LAYOUT SECTION  */
/*
Outliner_Kirki::add_section( 'layout', array(
	'title'          => __( 'Layout','outliner' ),   
	'description'    => __( 'Layout settings that affects overall site', 'outliner'),
	'panel'          => 'outliner_options', // Not typically needed.
) );



Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'primary_sidebar_width',
	'label'    => __( 'Primary Sidebar Width', 'outliner' ),
	'section'  => 'layout',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'1' => __( 'One Column', 'outliner' ),
		'2' => __( 'Two Column', 'outliner' ),
		'3' => __( 'Three Column', 'outliner' ),
		'4' => __( 'Four Column', 'outliner' ),
		'5' => __( 'Five Column ', 'outliner' ),
	),
	'default'  => '5',  
	'tooltip' => __('Select the width of the Primary Sidebar. Please note that the values represent grid columns. The total width of the page is 16 columns, so selecting 5 here will make the primary sidebar to have a width of approximately 1/3 ( 4/16 ) of the total page width.','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'secondary_sidebar_width',
	'label'    => __( 'Secondary Sidebar Width', 'outliner' ),
	'section'  => 'layout',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'1' => __( 'One Column', 'outliner' ),
		'2' => __( 'Two Column', 'outliner' ),
		'3' => __( 'Three Column', 'outliner' ),
		'4' => __( 'Four Column', 'outliner' ),
		'5' => __( 'Five Column ', 'outliner' ),
	),            
	'default'  => '5',  
	'tooltip' => __('Select the width of the Secondary Sidebar. Please note that the values represent grid columns. The total width of the page is 16 columns, so selecting 5 here will make the primary sidebar to have a width of approximately 1/3 ( 4/16 ) of the total page width.','outliner'),
) ); 

*/

/* FOOTER SECTION 
footer panel */

Outliner_Kirki::add_panel( 'footer_panel', array(     
	'title'       => __( 'Footer', 'outliner' ),
	'description' => __( 'Footer Related Options', 'outliner' ),     
) );  

Outliner_Kirki::add_section( 'footer', array(
	'title'          => __( 'Footer','outliner' ),
	'description'    => __( 'Footer related options', 'outliner'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_widgets',
	'label'    => __( 'Footer Widget Area', 'outliner' ),
	'description' => sprintf(__('Select widgets, Goto <a href="%1$s"target="_blank"> Customizer </a> => Widgets','outliner'),admin_url('customize.php') ),
	'section'  => 'footer',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
) );
/* Choose No.Of Footer area */
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_widgets_count',
	'label'    => __( 'Choose No.of widget area you want in footer', 'outliner' ),
	'section'  => 'footer',
	'type'     => 'radio-buttonset',
	'choices' => array(
		1  => esc_attr__( '1', 'outliner' ),
		2  => esc_attr__( '2', 'outliner' ),
		3  => esc_attr__( '3', 'outliner' ),
		4  => esc_attr__( '4', 'outliner' ),
	),
	'default'  => 4,
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'copyright',
	'label'    => __( 'Footer Copyright Text', 'outliner' ),
	'section'  => 'footer',
	'type'     => 'textarea',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_top_margin',
	'label'    => __( 'Footer Top Margin', 'outliner' ),
	'description' => __('Select the top margin of footer in pixels','outliner'),
	'section'  => 'footer',
	'type'     => 'number',
	'choices' => array(
		'min' => 1,
		'max' => 1000,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.site-footer',
			'property' => 'margin-top',
			'units' => 'px',
		),
	),
	'default'  => 0,
) );

/* CUSTOM FOOTER BACKGROUND IMAGE 
footer background image section  */

Outliner_Kirki::add_section( 'footer_image', array(
	'title'          => __( 'Footer Image','outliner' ),
	'description'    => __( 'Custom Footer Image options', 'outliner'),
	'panel'          => 'footer_panel', // Not typically needed.
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_bg_image',
	'label'    => __( 'Upload Footer Background Image', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-image',
		),
	),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_bg_size',
	'label'    => __( 'Footer Background Size', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'radio-buttonset',
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'outliner' ),
		'contain' => esc_attr__( 'Contain', 'outliner' ),
		'auto'  => esc_attr__( 'Auto', 'outliner' ),
		'inherit'  => esc_attr__( 'Inherit', 'outliner' ),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-size',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'cover',
	'tooltip' => __('Footer Background Image Size','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_bg_repeat',
	'label'    => __( 'Footer Background Repeat', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'outliner'),
        'repeat' => esc_attr__('Repeat', 'outliner'),
        'repeat-x' => esc_attr__('Repeat Horizontally','outliner'),
        'repeat-y' => esc_attr__('Repeat Vertically','outliner'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-repeat',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_bg_position',
	'label'    => __( 'Footer Background Position', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'outliner'),
        'center center' => esc_attr__('Center Center', 'outliner'),
        'center bottom' => esc_attr__('Center Bottom', 'outliner'),
        'left top' => esc_attr__('Left Top', 'outliner'),
        'left center' => esc_attr__('Left Center', 'outliner'),
        'left bottom' => esc_attr__('Left Bottom', 'outliner'),
        'right top' => esc_attr__('Right Top', 'outliner'),
        'right center' => esc_attr__('Right Center', 'outliner'),
        'right bottom' => esc_attr__('Right Bottom', 'outliner'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-position',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'center center',  
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_bg_attachment',
	'label'    => __( 'Footer Background Attachment', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'outliner'),
        'fixed' => esc_attr__('Fixed', 'outliner'),
	),
	'output'   => array(
		array(
			'element'  => '.footer-image',
			'property' => 'background-attachment',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'footer_bg_image',
			'operator' => '=',
			'value'    => true,
		),
	),
	'default'  => 'scroll',  
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_overlay',
	'label'    => __( 'Enable Footer( Background ) Overlay', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' )
	),
	'default'  => 'off',
) );
  
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'footer_overlay_color',
	'label'    => __( 'Footer Overlay ( Background )color', 'outliner' ),
	'section'  => 'footer_image',
	'type'     => 'color',
	'alpha' => true,
	'default'  => '#E5493A', 
	'active_callback' => array(
		array(
			'setting'  => 'footer_overlay',
			'operator' => '==',
			'value'    => true,
		),
	),
	'output'   => array(
		array(
			'element'  => '.overlay-footer',
			'property' => 'background-color',
		),
	),
) );
//  social network panel //

Outliner_Kirki::add_panel( 'social_panel', array(
	'title'        =>__( 'Social Networks', 'outliner'),
	'description'  =>__( 'social networks', 'outliner'),
	'priority'  =>11,	
));

//social sharing box section

Outliner_Kirki::add_section( 'social_sharing_box', array(
	'title'          =>__( 'Social Sharing Box', 'outliner'),
	'description'   =>__('Social Sharing box related options', 'outliner'),
	'panel'			 =>'social_panel',
));

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'facebook_sb',
	'label'    => __( 'Enable facebook sharing option below single post', 'outliner' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'twitter_sb',
	'label'    => __( 'Enable twitter sharing option below single post', 'outliner' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'linkedin_sb',
	'label'    => __( 'Enable linkedin sharing option below single post', 'outliner' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'google-plus_sb',
	'label'    => __( 'Enable googleplus sharing option below single post', 'outliner' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'email_sb',
	'label'    => __( 'Enable email sharing option below single post', 'outliner' ),
	'section'  => 'social_sharing_box',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'on',
) );
//  slider panel //

Outliner_Kirki::add_panel( 'slider_panel', array(   
	'title'       => __( 'Slider Settings', 'outliner' ),  
	'description' => __( 'Flex slider related options', 'outliner' ), 
	'priority'    => 11,    
) );

//  flexslider section  //

Outliner_Kirki::add_section( 'flex_caption_section', array(
	'title'          => __( 'Flexcaption Settings','outliner' ),
	'description'    => __( 'Flexcaption Related Options', 'outliner'),
	'panel'          => 'slider_panel', // Not typically needed.
) );
Outliner_Kirki::add_field( 'outliner', array(    
	'settings' => 'enable_flex_caption_edit',
	'label'    => __( 'Enable Custom Flexcaption Settings', 'outliner' ),
	'section'  => 'flex_caption_section',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ) 
	),
	'default'  => 'off',
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'flexcaption_bg',
	'label'    => __( 'Select Flexcaption Background Color', 'outliner' ),
	'section'  => 'flex_caption_section',
	'type'     => 'color',
	'default'  => '',
	'alpha' => true,
	'output'   => array(
		array(
			'element'  => '.flex-caption',
			'property' => 'background-color',
			'suffix' => '!important',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'flexcaption_align',
	'label'    => __( 'Select Flexcaption Alignment', 'outliner' ),
	'section'  => 'flex_caption_section',
	'type'     => 'select',
	'default'  => 'left',
	'choices' => array(
		'left' => esc_attr__( 'Left', 'outliner' ),
		'right' => esc_attr__( 'Right', 'outliner' ),
		'center' => esc_attr__( 'Center', 'outliner' ),
		'justify' => esc_attr__( 'Justify', 'outliner' ),
	),
	'output'   => array(
		array(
			'element'  => '.home .flexslider .slides .flex-caption p,.home .flexslider .slides .flex-caption h1, .home .flexslider .slides .flex-caption h2, .home .flexslider .slides .flex-caption h3, .home .flexslider .slides .flex-caption h4, .home .flexslider .slides .flex-caption h5, .home .flexslider .slides .flex-caption h6,.flexslider .slides .flex-caption,.flexslider .slides .flex-caption h1, .flexslider .slides .flex-caption h2, .flexslider .slides .flex-caption h3, .flexslider .slides .flex-caption h4, .flexslider .slides .flex-caption h5, .flexslider .slides .flex-caption h6,.flexslider .slides .flex-caption p,.flexslider .slides .flex-caption',
			'property' => 'text-align',
			//'suffix' => '!important',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );
 Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'flexcaption_bg_position',
	'label'    => __( 'Select Flexcaption Background Horizontal Position', 'outliner' ),
	'tooltip' => __('Select how far from right','outliner'),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '0',
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .slides .flex-caption,.home .flexslider .slides .flex-caption',
			'property' => 'right',
			'suffix' => '%',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) ); 
 Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'flexcaption_bg_vertical_position',
	'label'    => __( 'Select Flexcaption Background Vertical Position', 'outliner' ),
	'tooltip' => __('Select how far from top','outliner'),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '0',
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .slides .flex-caption,.home .flexslider .slides .flex-caption',
			'property' => 'top',
			'suffix' => '%',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) ); 
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'flexcaption_bg_width',
	'label'    => __( 'Select Flexcaption Background Width', 'outliner' ),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '100',
	'tooltip' => __('Select Flexcaption Background Width , Default width value 100','outliner'),
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .slides .flex-caption,.home .flexslider .slides .flex-caption',
			'property' => 'width',
			'suffix' => '%',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) ); 
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'flexcaption_responsive_bg_width',
	'label'    => __( 'Select Responsive Flexcaption Background Width', 'outliner' ),
	'section'  => 'flex_caption_section',
	'type'     => 'number',
	'default'  => '100',
	'tooltip' => __('Select Responsive Flexcaption Background Width, Default width value 100 ( This value will apply for max-width: 768px )','outliner'),
	'choices'     => array(
		'min'  => 0,
		'max'  => 100,
		'step' => 1, 
	),
	'output'   => array(
		array(
			'element'  => '.flexslider .slides .flex-caption,.home .flexslider .slides .flex-caption',
			'property' => 'width',
			'media_query' => '@media (max-width: 768px)',
			'value_pattern' => 'calc($%)',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'flexcaption_color',
	'label'    => __( 'Select Flexcaption Font Color', 'outliner' ),
	'section'  => 'flex_caption_section',
	'type'     => 'color',
	'default'  => '',
	'alpha' => true,
	'output'   => array(
		array(
			'element'  => '.flex-caption,.home .flexslider .slides .flex-caption p,.flexslider .slides .flex-caption p,.home .flexslider .slides .flex-caption p a,.flexslider .slides .flex-caption p a,.home .flexslider .slides .flex-caption h1, .home .flexslider .slides .flex-caption h2, .home .flexslider .slides .flex-caption h3, .home .flexslider .slides .flex-caption h4, .home .flexslider .slides .flex-caption h5, .home .flexslider .slides .flex-caption h6,.flexslider .slides .flex-caption h1,.flexslider .slides .flex-caption h2,.flexslider .slides .flex-caption h3,.flexslider .slides .flex-caption h4,.flexslider .slides .flex-caption h5,.flexslider .slides .flex-caption h6',
			'property' => 'color',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'enable_flex_caption_edit',
			'operator' => '==',
			'value'    => true,
		),
    ),
) );

 if( class_exists( 'WooCommerce' ) ) {
	Outliner_Kirki::add_section( 'woocommerce_section', array(
		'title'          => __( 'WooCommerce','outliner' ),
		'description'    => __( 'Theme options related to woocommerce', 'outliner'),
		'priority'       => 11, 

		'theme_supports' => '', // Rarely needed.
	) );
	Outliner_Kirki::add_field( 'woocommerce', array(
		'settings' => 'woocommerce_sidebar',
		'label'    => __( 'Enable Woocommerce Sidebar', 'outliner' ),
		'description' => __('Enable Sidebar for shop page','outliner'),
		'section'  => 'woocommerce_section',
		'type'     => 'switch',
		'choices' => array(
			'on'  => esc_attr__( 'Enable', 'outliner' ),
			'off' => esc_attr__( 'Disable', 'outliner' ) 
		),

		'default'  => 'on',
	) );
}
	
// background color ( rename )

Outliner_Kirki::add_section( 'colors', array(
	'title'          => __( 'Background Color','outliner' ),
	'description'    => __( 'This will affect overall site background color', 'outliner'),
	//'panel'          => 'skin_color_panel', // Not typically needed.
	'priority' => 11,
) );
Outliner_Kirki::add_field( 'outliner', array(  
	'settings' => 'enable_general_background_color',
	'label'    => __( 'Enable General Background Color', 'outliner' ),
	'section'  => 'colors',
	'type'     => 'switch',
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ),
	),
	'default'  => 'off', 
	'tooltip' => __('Enable General Background Color','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'general_background_color',
	'label'    => __( 'General Background Color', 'outliner' ),
	'section'  => 'colors',
	'type'     => 'color',
	'alpha' => true,
	'default'  => '',
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-color',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'enable_general_background_color',
			'operator' => '==',
			'value'    => true,
		),
	),
) );
Outliner_Kirki::add_field( 'outliner', array(  
	'settings' => 'enable_content_background_color',
	'label'    => __( 'Enable Content Background Color', 'outliner' ),
	'section'  => 'colors',
	'type'     => 'switch', 
	'choices' => array(
		'on'  => esc_attr__( 'Enable', 'outliner' ),
		'off' => esc_attr__( 'Disable', 'outliner' ),
	),
	'default'  => 'off',
	'tooltip' => __('Enable Content Background Color','outliner'),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'content_background_color',
	'label'    => __( 'Content Background Color', 'outliner' ),
	'section'  => 'colors',
	'type'     => 'color',
	'description' => __('when you are select boxed layout content background color will reflect the grid area','outliner'), 
	'alpha' => true, 
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.boxed-container,#page',
			'property' => 'background-color',
			'suffix' => '!important',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'enable_content_background_color',
			'operator' => '==',
			'value'    => true,
		),
	),
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'general_background_image',
	'label'    => __( 'General Background Image', 'outliner' ),
	'section'  => 'background_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-image',
			//'suffix' => '!important',
		),
	),
) );

// background image ( general & boxed layout ) //


Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'general_background_repeat',
	'label'    => __( 'General Background Repeat', 'outliner' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'outliner'),
        'repeat' => esc_attr__('Repeat', 'outliner'),
        'repeat-x' => esc_attr__('Repeat Horizontally','outliner'),
        'repeat-y' => esc_attr__('Repeat Vertically','outliner'),
	),
	'output'   => array(
		array(
			'element'  => 'body,',
			'property' => 'background-repeat',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'general_background_size',
	'label'    => __( 'General Background Size', 'outliner' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'outliner' ),
		'contain' => esc_attr__( 'Contain', 'outliner' ),
		'auto'  => esc_attr__( 'Auto', 'outliner' ),
		'inherit'  => esc_attr__( 'Inherit', 'outliner' ),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-size',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'cover',  
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'general_background_attachment',
	'label'    => __( 'General Background Attachment', 'outliner' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'outliner'),
        'fixed' => esc_attr__('Fixed', 'outliner'),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-attachment',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image',
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'fixed',  
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'general_background_position',
	'label'    => __( 'General Background Position', 'outliner' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'outliner'),
        'center center' => esc_attr__('Center Center', 'outliner'),
        'center bottom' => esc_attr__('Center Bottom', 'outliner'),
        'left top' => esc_attr__('Left Top', 'outliner'),
        'left center' => esc_attr__('Left Center', 'outliner'),
        'left bottom' => esc_attr__('Left Bottom', 'outliner'),
        'right top' => esc_attr__('Right Top', 'outliner'),
        'right center' => esc_attr__('Right Center', 'outliner'),
        'right bottom' => esc_attr__('Right Bottom', 'outliner'),
	),
	'output'   => array(
		array(
			'element'  => 'body',
			'property' => 'background-position',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'general_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'center top',  
) );


/* CONTENT BACKGROUND ( boxed background image )*/

Outliner_Kirki::add_field( 'outliner', array(  
	'settings' => 'content_background_image',
	'label'    => __( 'Content Background Image', 'outliner' ),
	'description' => __('when you are select boxed layout content background image will reflect the grid area','outliner'),
	'section'  => 'background_image',
	'type'     => 'upload',
	'default'  => '',
	'output'   => array(
		array(
			'element'  => '.boxed-container,.site-content',
			'property' => 'background-image',
			'suffix' => '!important',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',   
		),
	),
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'content_background_repeat',
	'label'    => __( 'Content Background Repeat', 'outliner' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'no-repeat' => esc_attr__('No Repeat', 'outliner'),
        'repeat' => esc_attr__('Repeat', 'outliner'),
        'repeat-x' => esc_attr__('Repeat Horizontally','outliner'),
        'repeat-y' => esc_attr__('Repeat Vertically','outliner'),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container,.site-content',
			'property' => 'background-repeat',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'repeat',  
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'content_background_size',
	'label'    => __( 'Content Background Size', 'outliner' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
    'choices' => array(
		'cover'  => esc_attr__( 'Cover', 'outliner' ),
		'contain' => esc_attr__( 'Contain', 'outliner' ),
		'auto'  => esc_attr__( 'Auto', 'outliner' ),
		'inherit'  => esc_attr__( 'Inherit', 'outliner' ),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container,.site-content',
			'property' => 'background-size',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'cover',  
) );

Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'content_background_attachment',
	'label'    => __( 'Content Background Attachment', 'outliner' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'scroll' => esc_attr__('Scroll', 'outliner'),
        'fixed' => esc_attr__('Fixed', 'outliner'),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container,.site-content',
			'property' => 'background-attachment',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'fixed',  
) );
Outliner_Kirki::add_field( 'outliner', array(
	'settings' => 'content_background_position',
	'label'    => __( 'Content Background Position', 'outliner' ),
	'section'  => 'background_image',
	'type'     => 'select',
	'multiple'    => 1,
	'choices'     => array(
		'center top' => esc_attr__('Center Top', 'outliner'),
        'center center' => esc_attr__('Center Center', 'outliner'),
        'center bottom' => esc_attr__('Center Bottom', 'outliner'),
        'left top' => esc_attr__('Left Top', 'outliner'),
        'left center' => esc_attr__('Left Center', 'outliner'),
        'left bottom' => esc_attr__('Left Bottom', 'outliner'),
        'right top' => esc_attr__('Right Top', 'outliner'),
        'right center' => esc_attr__('Right Center', 'outliner'),
        'right bottom' => esc_attr__('Right Bottom', 'outliner'),
	),
	'output'   => array(
		array(
			'element'  => '.boxed-container,.site-content',
			'property' => 'background-position',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'site-style',
			'operator' => '==',
			'value'    => 'boxed',
		),
		array(
			'setting'  => 'content_background_image', 
			'operator' => '==',
			'value'    => true,
		),
	),
	'default'  => 'center top',  
) );

do_action('wbls-outliner_pro_customizer_options');
do_action('outliner_child_customizer_options');
