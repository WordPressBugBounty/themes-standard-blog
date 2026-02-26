<?php
/**
 * Single Post Options
 */

$wp_customize->add_section(
	'standard_blog_single_page_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'standard-blog' ),
		'panel' => 'standard_blog_theme_options_panel',
	)
);

// Enable single post category setting.
$wp_customize->add_setting(
	'standard_blog_enable_single_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'standard_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Standard_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'standard_blog_enable_single_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'standard-blog' ),
			'settings' => 'standard_blog_enable_single_category',
			'section'  => 'standard_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post author setting.
$wp_customize->add_setting(
	'standard_blog_enable_single_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'standard_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Standard_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'standard_blog_enable_single_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'standard-blog' ),
			'settings' => 'standard_blog_enable_single_author',
			'section'  => 'standard_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post date setting.
$wp_customize->add_setting(
	'standard_blog_enable_single_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'standard_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Standard_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'standard_blog_enable_single_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'standard-blog' ),
			'settings' => 'standard_blog_enable_single_date',
			'section'  => 'standard_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable single post tag setting.
$wp_customize->add_setting(
	'standard_blog_enable_single_tag',
	array(
		'default'           => true,
		'sanitize_callback' => 'standard_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Standard_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'standard_blog_enable_single_tag',
		array(
			'label'    => esc_html__( 'Enable Post Tag', 'standard-blog' ),
			'settings' => 'standard_blog_enable_single_tag',
			'section'  => 'standard_blog_single_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Single post related Posts title label.
$wp_customize->add_setting(
	'standard_blog_related_posts_title',
	array(
		'default'           => __( 'Related Posts', 'standard-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'standard_blog_related_posts_title',
	array(
		'label'    => esc_html__( 'Related Posts Title', 'standard-blog' ),
		'section'  => 'standard_blog_single_page_options',
		'settings' => 'standard_blog_related_posts_title',
	)
);
