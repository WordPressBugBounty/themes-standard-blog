<?php
/**
 * Footer copyright
 */

// Footer copyright
$wp_customize->add_section(
	'standard_blog_footer_section',
	array(
		'title' => esc_html__( 'Footer Options', 'standard-blog' ),
		'panel' => 'standard_blog_theme_options_panel',
	)
);

$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'standard-blog' ), '[the-year]', '[site-link]' );

// Footer copyright setting.
$wp_customize->add_setting(
	'standard_blog_copyright_txt',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'standard_blog_sanitize_html',
	)
);

$wp_customize->add_control(
	'standard_blog_copyright_txt',
	array(
		'label'   => esc_html__( 'Copyright text', 'standard-blog' ),
		'section' => 'standard_blog_footer_section',
		'type'    => 'textarea',
	)
);
