<?php

// Author Info Widget.
require get_template_directory() . '/inc/widgets/info-author-widget.php';

// Featured Posts Widget.
require get_template_directory() . '/inc/widgets/featured-posts-widget.php';

// Social Widget.
require get_template_directory() . '/inc/widgets/social-widget.php';

/**
 * Register Widgets
 */
function standard_blog_register_widgets() {

	register_widget( 'Standard_Blog_Author_Info_Widget' );

	register_widget( 'Standard_Blog_Featured_Posts_Widget' );

	register_widget( 'Standard_Blog_Social_Widget' );
}
add_action( 'widgets_init', 'standard_blog_register_widgets' );
