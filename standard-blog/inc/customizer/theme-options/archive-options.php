<?php
/**
 * Blog / Archive Options
 */

$wp_customize->add_section(
	'standard_blog_archive_page_options',
	array(
		'title' => esc_html__( 'Blog / Archive Pages Options', 'standard-blog' ),
		'panel' => 'standard_blog_theme_options_panel',
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'standard_blog_excerpt_length',
	array(
		'default'           => 30,
		'sanitize_callback' => 'standard_blog_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'standard_blog_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'standard-blog' ),
		'section'     => 'standard_blog_archive_page_options',
		'settings'    => 'standard_blog_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 5,
			'max'  => 200,
			'step' => 1,
		),
	)
);

// Grid Column layout options.
$wp_customize->add_setting(
	'standard_blog_archive_grid_column_layout',
	array(
		'default'           => 'grid-column-2',
		'sanitize_callback' => 'standard_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'standard_blog_archive_grid_column_layout',
	array(
		'label'   => esc_html__( 'Grid Column Layout', 'standard-blog' ),
		'section' => 'standard_blog_archive_page_options',
		'type'    => 'select',
		'choices' => array(
			'grid-column-2' => __( 'Column 2', 'standard-blog' ),
			'grid-column-3' => __( 'Column 3', 'standard-blog' ),
		),
	)
);

// Enable archive page category setting.
$wp_customize->add_setting(
	'standard_blog_enable_archive_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'standard_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Standard_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'standard_blog_enable_archive_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'standard-blog' ),
			'settings' => 'standard_blog_enable_archive_category',
			'section'  => 'standard_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page author setting.
$wp_customize->add_setting(
	'standard_blog_enable_archive_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'standard_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Standard_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'standard_blog_enable_archive_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'standard-blog' ),
			'settings' => 'standard_blog_enable_archive_author',
			'section'  => 'standard_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable archive page date setting.
$wp_customize->add_setting(
	'standard_blog_enable_archive_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'standard_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Standard_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'standard_blog_enable_archive_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'standard-blog' ),
			'settings' => 'standard_blog_enable_archive_date',
			'section'  => 'standard_blog_archive_page_options',
			'type'     => 'checkbox',
		)
	)
);
