<?php
/**
 * Template part for displaying front page introduction.
 *
 * @package Standard Blog Pro
 */

// Banner Section.
$banner_section = get_theme_mod( 'standard_blog_banner_section_enable', false );

if ( false === $banner_section ) {
	return;
}

$content_ids         = array();
$banner_content_type = get_theme_mod( 'standard_blog_banner_content_type', 'post' );

if ( $banner_content_type === 'post' ) {

	for ( $i = 1; $i <= 5; $i++ ) {
		$content_ids[] = get_theme_mod( 'standard_blog_banner_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $content_ids ) ) ) {
		$args['post__in'] = array_filter( $content_ids );
		$args['orderby']  = 'post__in';
	} else {
		$args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'standard_blog_banner_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 5 ),
	);
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {
	?>

	<div id="standard_blog_banner_section" class="frontpage banner-section style-2">
		<div class="theme-wrapper">
			<div class="banner-post-wrapper">
				<?php
				$i = 1;
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<div class="post-item post-grid <?php echo esc_attr( $i === 1 ? '' : 'overlay-revised' ); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="post-item-image">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'post-thumbnail' ); ?>
								</a>
								<div class="read-time-comment">
									<span class="reading-time">
										<i class="far fa-clock"></i>
										<?php
										echo standard_blog_time_interval( get_the_content() );
										echo esc_html__( ' min read', 'standard-blog' );
										?>
									</span>
									<span class="comment">
										<i class="far fa-comment"></i>
										<?php echo absint( get_comments_number( get_the_ID() ) ); ?>
									</span>
								</div>
								<?php if ( $i !== 1 ) { ?>
									<?php get_template_part( 'template-parts/card-corner' ); ?>
								<?php } ?>
							</div>
						<?php } ?>
						<div class="post-item-content">
							<?php if ( $i === 1 ) { ?>
								<?php get_template_part( 'template-parts/card-corner' ); ?>
								<div class="entry-cat">
									<?php the_category( '', '', get_the_ID() ); ?>
								</div>
							<?php } ?>
							<h3 class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>  
							<?php if ( $i === 1 ) { ?>
								<ul class="entry-meta">
									<li class="post-author"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="far fa-user"></i><?php echo esc_html( get_the_author() ); ?></a></li>
									<li class="post-date"><i class="far fa-calendar-alt"></i></span><?php echo esc_html( get_the_date() ); ?></li>
								</ul>
								<div class="post-exerpt">
									<p><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 30 ) ); ?></p>
								</div>
							<?php } ?>
						</div>
					</div>
					<?php
					$i++;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

	<?php
}