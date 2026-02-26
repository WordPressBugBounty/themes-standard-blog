<?php
/**
 * Breadcrumb settings
 */

$wp_customize->add_section(
	'standard_blog_breadcrumb_section',
	array(
		'title' => esc_html__( 'Breadcrumb Options', 'standard-blog' ),
		'panel' => 'standard_blog_theme_options_panel',
	)
);

// Breadcrumb enable setting.
$wp_customize->add_setting(
	'standard_blog_breadcrumb_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'standard_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Standard_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'standard_blog_breadcrumb_enable',
		array(
			'label'    => esc_html__( 'Enable breadcrumb.', 'standard-blog' ),
			'type'     => 'checkbox',
			'settings' => 'standard_blog_breadcrumb_enable',
			'section'  => 'standard_blog_breadcrumb_section',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'standard_blog_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'standard_blog_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'standard-blog' ),
		'section'         => 'standard_blog_breadcrumb_section',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'standard_blog_breadcrumb_enable' )->value() );
		},
	)
);
