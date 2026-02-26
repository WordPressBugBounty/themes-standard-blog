<?php
/**
 * Sidebar settings
 */

$wp_customize->add_section(
	'standard_blog_sidebar_option',
	array(
		'title' => esc_html__( 'Sidebar Options', 'standard-blog' ),
		'panel' => 'standard_blog_theme_options_panel',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'standard_blog_sidebar_position',
	array(
		'sanitize_callback' => 'standard_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'standard_blog_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'standard-blog' ),
		'section' => 'standard_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'standard-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'standard-blog' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'standard_blog_post_sidebar_position',
	array(
		'sanitize_callback' => 'standard_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'standard_blog_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'standard-blog' ),
		'section' => 'standard_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'standard-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'standard-blog' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'standard_blog_page_sidebar_position',
	array(
		'sanitize_callback' => 'standard_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'standard_blog_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'standard-blog' ),
		'section' => 'standard_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'standard-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'standard-blog' ),
		),
	)
);
