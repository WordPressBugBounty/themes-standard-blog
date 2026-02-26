<?php
/**
 * Adore Themes Customizer
 *
 * @package Standard Blog
 *
 * Banner Section
 */

$wp_customize->add_section(
	'standard_blog_banner_section',
	array(
		'title' => esc_html__( 'Banner Section', 'standard-blog' ),
		'panel' => 'standard_blog_frontpage_panel',
	)
);

// Banner enable setting.
$wp_customize->add_setting(
	'standard_blog_banner_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'standard_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Standard_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'standard_blog_banner_section_enable',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'standard-blog' ),
			'type'     => 'checkbox',
			'settings' => 'standard_blog_banner_section_enable',
			'section'  => 'standard_blog_banner_section',
		)
	)
);

// posts carousel content type settings.
$wp_customize->add_setting(
	'standard_blog_banner_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'standard_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'standard_blog_banner_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'standard-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'standard-blog' ),
		'section'         => 'standard_blog_banner_section',
		'type'            => 'select',
		'active_callback' => 'standard_blog_if_banner_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'standard-blog' ),
			'category' => esc_html__( 'Category', 'standard-blog' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// posts carousel post setting.
	$wp_customize->add_setting(
		'standard_blog_banner_post_' . $i,
		array(
			'sanitize_callback' => 'standard_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'standard_blog_banner_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'standard-blog' ), $i ),
			'section'         => 'standard_blog_banner_section',
			'type'            => 'select',
			'choices'         => standard_blog_get_post_choices(),
			'active_callback' => 'standard_blog_banner_section_content_type_post_enabled',
		)
	);

}

// posts carousel category setting.
$wp_customize->add_setting(
	'standard_blog_banner_category',
	array(
		'sanitize_callback' => 'standard_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'standard_blog_banner_category',
	array(
		'label'           => esc_html__( 'Category', 'standard-blog' ),
		'section'         => 'standard_blog_banner_section',
		'type'            => 'select',
		'choices'         => standard_blog_get_post_cat_choices(),
		'active_callback' => 'standard_blog_banner_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function standard_blog_if_banner_enabled( $control ) {
	return $control->manager->get_setting( 'standard_blog_banner_section_enable' )->value();
}
function standard_blog_banner_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'standard_blog_banner_content_type' )->value();
	return standard_blog_if_banner_enabled( $control ) && ( 'post' === $content_type );
}
function standard_blog_banner_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'standard_blog_banner_content_type' )->value();
	return standard_blog_if_banner_enabled( $control ) && ( 'category' === $content_type );
}
