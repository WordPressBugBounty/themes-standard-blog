<?php
/**
 * Pagination setting
 */

// Pagination setting.
$wp_customize->add_section(
	'standard_blog_pagination',
	array(
		'title' => esc_html__( 'Pagination', 'standard-blog' ),
		'panel' => 'standard_blog_theme_options_panel',
	)
);

// Pagination enable setting.
$wp_customize->add_setting(
	'standard_blog_pagination_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'standard_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Standard_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'standard_blog_pagination_enable',
		array(
			'label'    => esc_html__( 'Enable Pagination.', 'standard-blog' ),
			'settings' => 'standard_blog_pagination_enable',
			'section'  => 'standard_blog_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Style.
$wp_customize->add_setting(
	'standard_blog_pagination_type',
	array(
		'default'           => 'numeric',
		'sanitize_callback' => 'standard_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'standard_blog_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Style', 'standard-blog' ),
		'section'         => 'standard_blog_pagination',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'standard-blog' ),
			'numeric' => __( 'Numeric', 'standard-blog' ),
		),
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'standard_blog_pagination_enable' )->value() );
		},
	)
);
