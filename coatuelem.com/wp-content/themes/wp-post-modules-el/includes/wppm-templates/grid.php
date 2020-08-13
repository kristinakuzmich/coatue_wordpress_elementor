<?php
/**
 * grid.php
 * Template part for the WP Post Modules Plugin
 *
 * @since 1.0.0
 * @version 1.5.1
 *
 * All variables coming from parent file wp-post-modules-el.php
 */
	$out = '';
	$count = 0;
	$ad_count = 1;
	$protocol = is_ssl() ? 'https' : 'http';
	$id = 'wppm-ajax-posts-' . $GLOBALS['wppm_ajax_container_count'];
	if ( ! $enable_slider ) {
		$out = sprintf( '%s<div%s%s class="wppm wppm-grid%s clearfix%s%s%s%s%s">',
			$ajaxnav || $ajaxloadmore ? sprintf( '<div id="%s" class="wppm-ajax-posts%s" data-params=\'%s\' data-maxposts="%s">',
			$id,
			$ajaxnav ? ' nav-enabled' : ' loadmore-enabled',
			json_encode( $opts, JSON_FORCE_OBJECT ), $custom_query->found_posts ) : '',
			$enable_schema ? ' itemscope="itemscope" itemtype="' . $protocol . '://schema.org/Blog"' : '',
			$ajaxnav ? ' id="' . $id . '-sub-1"' : '',
			'',
			' ' . esc_attr( $sub_type ),
			$counter ? ' count-enabled' : '',
			isset( $columns ) && is_array( $columns ) ? ' columns-' . $columns['size'] : '',
			isset( $columns_tablet ) && is_array( $columns_tablet ) ? ' columns_tablet-' . $columns_tablet['size'] : '',
			isset( $columns_mobile ) && is_array( $columns_mobile ) ? ' columns_mobile-' . $columns_mobile['size'] : ''
		);
	}

	// Main loop
	while ( $custom_query->have_posts() ) :
		$custom_query->the_post();
		global $multipage;
		$multipage = 0;

		// Set post title
		$title = wppm_el_generate_title( $hsource, $h_cust_field_key, $h_length, $h_meta_box );

		// Post classes
		$post_id = get_the_ID();
		$post_class_obj = get_post_class( $post_id );
		$post_classes = 'wppm-el-post ';
		if ( isset( $post_class_obj ) && is_array( $post_class_obj ) ) {
			$post_classes .= implode( ' ', $post_class_obj );
		}
		if ( is_sticky( $post_id ) ) {
			$post_classes .= ' sticky';
		}

		// Get excerpt based on chosen source
		$excerpt_text = wppm_el_generate_excerpt( $psource, $allowed_tags, $content_filter, $cust_field_key, $excerpt_length );
		$excerpt = ! $show_excerpt ? ''
					: sprintf( '<%1$s%2$s class="post-text%3$s">%4$s</%1$s>',
						$ptag,
						$enable_schema && $excerpt_prop != '' ? ' itemprop="' . esc_attr( $excerpt_prop ) . '"' : '',
						'',
						$excerpt_text
					);

		// User defined post meta
		$user_meta = '';
		$rows = array( 'row_1' => '', 'row_2' => '', 'row_3' => '', 'row_4' => '' );
		$metas = wppm_el_custom_meta();
		if ( $custom_meta ) {
			$user_meta = sprintf( '<span class="entry-meta custom-format">' . $meta_format . '</span>', $metas['author'], $metas['date'], $metas['date_modified'], $metas['categories'], $metas['comments'], $metas['permalink'] );
		}

		else { // Generate post meta
			$meta_args = array(
				'template'	=> 'grid',
				'date_format' => $date_format,
				'enable_schema' => $enable_schema,
				'show_cats' => $show_cats,
				'show_reviews' => $show_reviews,
				'show_date' => $show_date,
				'show_author' => $show_author,
				'show_avatar' => $show_avatar,
				'show_views' => $show_views,
				'show_comments' => $show_comments,
				'readmore' => $readmore,
				'readmore_text' => $readmore_text,
				'publisher_logo' => $publisher_logo,
				'excerpt_length' => $excerpt_length,
				'sharing' => $sharing,
				'share_style' => $share_style,
				'share_btns' => $share_btns,
				'cat_limit'  => $cat_limit,
				'show_more_cats' => $show_more_cats,

				// Schema props
				'datecreated_prop'		=> $datecreated_prop,
				'datemodified_prop'		=> $datemodified_prop,
				'publisher_type'		=> $publisher_type,
				'publisher_prop'		=> $publisher_prop,
				'publisher_name'		=> $publisher_name,
				'publisher_logo'		=> $publisher_logo,
				'authorbox_type'		=> $authorbox_type,
				'authorbox_prop'		=> $authorbox_prop,
				'authorname_prop'		=> $authorname_prop,
				'authoravatar_prop'		=> $authoravatar_prop,
				'category_prop'			=> $category_prop,
				'commentcount_prop'		=> $commentcount_prop,
				'commenturl_prop'		=> $commenturl_prop
			);

			$rows = wppm_el_meta( $meta_args );
		}

		/**
		 * Image thumbnail template
		 * @since 1.5.1
		 */
		$image_path = apply_filters( 'wppm_widget_image_path',  '/' );
		if ( locate_template( $image_path . 'image.php' ) ) {
            require( get_stylesheet_directory() . $image_path . 'image.php' );
        } else {
            require( dirname( __FILE__ ) . $image_path . 'image.php' );
        }

		// Format output
		if ( $sub_type == 's2' ) {
			$format = apply_filters( 'wppm_grid_s2_output', '<article%12$s%13$s  class="%2$s%3$s"><div class="wppm-post-wrap"><div class="entry-content">%5$s<%11$s%14$s class="entry-title%15$s%16$s"><a href="%6$s" title="%17$s">%7$s</a></%11$s>%8$s%4$s%9$s</div>%10$s</div></article>' );
		}

		elseif ( $sub_type == 's3' || $sub_type == 's4' ) {
			$format = apply_filters( 'wppm_grid_s2_output', '<article%12$s%13$s  class="%2$s%3$s"><div class="wppm-post-wrap">%5$s<%11$s%14$s class="entry-title%15$s%16$s"><a href="%6$s" title="%17$s">%7$s</a></%11$s>%8$s<div class="entry-content">%4$s%9$s</div>%10$s</div></article>' );
		}

		else {
			$format = apply_filters( 'wppm_grid_s1_output', '<article%12$s%13$s  class="%2$s%3$s"><div class="wppm-post-wrap">%4$s<div class="entry-content">%5$s<%11$s%14$s class="entry-title%15$s%16$s"><a href="%6$s" title="%17$s">%7$s</a></%11$s>%8$s%9$s</div>%10$s</div></article>' );
		}

		$out .= sprintf ( $format,
			get_the_id(),
			$post_classes,
			'',
			$thumblink,
			( $custom_meta && $meta_pos == '1' ) ? $user_meta : $rows['row_1'],
			esc_url( get_permalink() ),
			$title,
			( $custom_meta && $meta_pos == '2' ) ? $user_meta : ( $readmore ? $rows['row_2'] : '' ),
			$excerpt,
			( $custom_meta && $meta_pos == '3' ) ? $user_meta : $rows['row_3'],
			sanitize_text_field( $htag ),
			$enable_schema && $container_type != '' ? ' itemscope itemtype="' . $protocol . '://schema.org/' . esc_attr( $container_type ) . '"' : '',
			$enable_schema && $container_prop != '' ? ' itemprop="' . esc_attr( $container_prop ) . '"' : '',
			$enable_schema && $heading_prop != '' ? ' itemprop="' . esc_attr( $heading_prop ) . '"' : '',
			'',
			'',
			wp_strip_all_tags( $title )
		);

		$count++;

		// Show ads only if ad offset is set
		if ( '' != $ad_offset || intval( $ad_offset ) > 0 ) {
			if ( ( $count >= ( intval( $ad_offset ) * $ad_count ) ) && $count % ( intval( $ad_offset ) * $ad_count ) == 0 ) {
				if ( isset( $ad_list ) && is_array( $ad_list ) && isset( $ad_list[$ad_count - 1]['ad_code'] ) ) {
					$out .= $ad_list[ $ad_count - 1 ]['ad_code'];
					$ad_count++;
				}
			}
		}

	endwhile;

	if ( ! $enable_slider ) {
		if ( $ajaxnav ) {
			$out .= sprintf( '</div><div class="wppm-loading-spinner"></div><div class="wppm-ajax-nav"><a class="prev-link disabled" href="#"><span class="screen-reader-text">%s</span><i class="eicon eicon-chevron-left"></i></a> <a class="next-link" href="#"><span class="screen-reader-text">%s</span><i class="eicon eicon-chevron-right"></i></a>%s</div></div>',
				__( 'Prev', 'wppm-el' ),
				__( 'Next', 'wppm-el' ),
				$nav_status ? '<span class="nav-status" data-format="' . esc_attr( $nav_status_text ) . '"></span>' : ''
			);
		}
		elseif ( $ajaxloadmore ) {
			$out .= sprintf( '</div><div class="wppm-ajax-loadmore"><div class="wppm-loading-spinner"></div><a class="wppm-more-link" href="#">%s</a></div></div>',
				esc_attr( $loadmore_text )
			);
		}
		else {
			$out .= '</div>';
		}
	}

	echo $out;