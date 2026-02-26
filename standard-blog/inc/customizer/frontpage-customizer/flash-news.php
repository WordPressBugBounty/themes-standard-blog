<?php
/**
 * Adore Themes Customizer
 *
 * @package Standard Blog
 *
 * Topbar Section Section
 */

$wp_customize->add_section(
	'standard_blog_topbar_section',
	array(
		'title' => esc_html__( 'Topbar Section', 'standard-blog' ),
		'panel' => 'standard_blog_frontpage_panel',
	)
);

// Topbar enable.
$wp_customize->add_setting(
	'standard_blog_topbar_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'standard_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Standard_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'standard_blog_topbar_section_enable',
		array(
			'label'    => esc_html__( 'Enable Topbar Section', 'standard-blog' ),
			'type'     => 'checkbox',
			'settings' => 'standard_blog_topbar_section_enable',
			'section'  => 'standard_blog_topbar_section',
		)
	)
);

// Flash Articles section enable settings.
$wp_customize->add_setting(
	'standard_blog_flash_articles_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'standard_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Standard_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'standard_blog_flash_articles_section_enable',
		array(
			'label'           => esc_html__( 'Enable Flash Articles Section', 'standard-blog' ),
			'type'            => 'checkbox',
			'settings'        => 'standard_blog_flash_articles_section_enable',
			'section'         => 'standard_blog_topbar_section',
			'active_callback' => 'standard_blog_if_topbar_section_enabled',
		)
	)
);

// Flash Articles title settings.
$wp_customize->add_setting(
	'standard_blog_flash_articles_title',
	array(
		'default'           => __( 'Hot Topics', 'standard-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'standard_blog_flash_articles_title',
	array(
		'label'           => esc_html__( 'Title', 'standard-blog' ),
		'section'         => 'standard_blog_topbar_section',
		'active_callback' => 'standard_blog_if_flash_articles_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'standard_blog_flash_articles_title',
		array(
			'selector'            => '.articles-ticker-section .theme-wrapper',
			'settings'            => 'standard_blog_flash_articles_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'standard_blog_flash_articles_title_text_partial',
		)
	);
}

// Flash Articles speed controller setting.
$wp_customize->add_setting(
	'standard_blog_flash_articles_speed_controller',
	array(
		'default'           => 100,
		'sanitize_callback' => 'standard_blog_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'standard_blog_flash_articles_speed_controller',
	array(
		'label'           => esc_html__( 'Speed Controller', 'standard-blog' ),
		'description'     => esc_html__( 'Default speed value is 200.', 'standard-blog' ),
		'section'         => 'standard_blog_topbar_section',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
		),
		'active_callback' => 'standard_blog_if_flash_articles_enabled',
	)
);

// flash_articles content type settings.
$wp_customize->add_setting(
	'standard_blog_flash_articles_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'standard_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'standard_blog_flash_articles_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'standard-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'standard-blog' ),
		'section'         => 'standard_blog_topbar_section',
		'type'            => 'select',
		'active_callback' => 'standard_blog_if_flash_articles_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'standard-blog' ),
			'category' => esc_html__( 'Category', 'standard-blog' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// flash_articles post setting.
	$wp_customize->add_setting(
		'standard_blog_flash_articles_post_' . $i,
		array(
			'sanitize_callback' => 'standard_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'standard_blog_flash_articles_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'standard-blog' ), $i ),
			'section'         => 'standard_blog_topbar_section',
			'type'            => 'select',
			'choices'         => standard_blog_get_post_choices(),
			'active_callback' => 'standard_blog_flash_articles_section_content_type_post_enabled',
		)
	);

}

// flash_articles category setting.
$wp_customize->add_setting(
	'standard_blog_flash_articles_category',
	array(
		'sanitize_callback' => 'standard_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'standard_blog_flash_articles_category',
	array(
		'label'           => esc_html__( 'Category', 'standard-blog' ),
		'section'         => 'standard_blog_topbar_section',
		'type'            => 'select',
		'choices'         => standard_blog_get_post_cat_choices(),
		'active_callback' => 'standard_blog_flash_articles_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function standard_blog_if_topbar_section_enabled( $control ) {
	return $control->manager->get_setting( 'standard_blog_topbar_section_enable' )->value();
}
function standard_blog_if_flash_articles_enabled( $control ) {
	$flash_articles = $control->manager->get_setting( 'standard_blog_flash_articles_section_enable' )->value();
	return standard_blog_if_topbar_section_enabled( $control ) && ( true === $flash_articles );
}
function standard_blog_flash_articles_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'standard_blog_flash_articles_content_type' )->value();
	return standard_blog_if_flash_articles_enabled( $control ) && ( 'post' === $content_type );
}
function standard_blog_flash_articles_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'standard_blog_flash_articles_content_type' )->value();
	return standard_blog_if_flash_articles_enabled( $control ) && ( 'category' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'standard_blog_flash_articles_title_text_partial' ) ) :
	// Title.
	function standard_blog_flash_articles_title_text_partial() {
		return esc_html( get_theme_mod( 'standard_blog_flash_articles_title' ) );
	}
endif;
