<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
$disable_element = '';
$output = $after_output = '';

$row_content_width = $anchor = $content_text_aligment = $eltdf_row_wrapper_start = $eltdf_row_wrapper_end = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );


$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') ) || $video_bg || $parallax) {
	$css_classes[]='vc_row-has-fill';
}

if (!empty($atts['gap'])) {
	$css_classes[] = 'vc_column-gap-'.$atts['gap'];
}

if (!empty($content_text_aligment)){
	$css_classes[] = 'eltdf-content-aligment-' . $content_text_aligment;
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}
if(!empty($anchor)){
	$wrapper_attributes[] = 'data-eltdf-anchor="' . esc_attr($anchor ) . '"';
}
if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

if($row_content_width === 'grid'){
	$eltdf_row_wrapper_start .= '<div class="eltdf-row-grid-section">';
	$eltdf_row_wrapper_end .= '</div>';
}

$eltdf_after_wrapper_open = '';
$eltdf_before_wrapper_close = '';


switch ($angled_shape) {
	case 'yes':
			$css_classes[] = 'eltdf-row-has-shape';
			$svg_top_output = '';
			$svg_bottom_output = '';

			$angled_shape_style = '';
			if($angled_shape_background != ""){
				$angled_shape_style = 'fill:' . $angled_shape_background;
			}

			if($angled_shape_top == 'yes') {
				$svg_top_output .= '<svg class="eltdf-angled-shape eltdf-svg-top" preserveAspectRatio="none" viewBox="0 0 86 86" width="100%" height="185">';
				if($angled_shape_top_direction == 'from_right_to_left_top'){
					$svg_top_output .= '<polygon points="0,0 0,86 86,86" ' . mrseo_elated_get_inline_style($angled_shape_style) . ' />';
				}
				if($angled_shape_top_direction == 'from_left_to_right_top'){
					$svg_top_output .= '<polygon points="0,86 86,0 86,86" ' . mrseo_elated_get_inline_style($angled_shape_style) . ' />';
				}
				$svg_top_output .= '</svg>';
				$eltdf_after_wrapper_open .= $svg_top_output;
			}


			if($angled_shape_bottom == 'yes') {
				$svg_bottom_output .= '<svg class="eltdf-angled-shape eltdf-svg-bottom" preserveAspectRatio="none" viewBox="0 0 86 86" width="100%" height="185">';
				if($angled_shape_bottom_direction == 'from_left_to_right_bottom'){
					$svg_bottom_output .= '<polygon points="0,0 86,0 86,86" ' . mrseo_elated_get_inline_style($angled_shape_style) . ' />';
				}
				if($angled_shape_bottom_direction == 'from_right_to_left_bottom'){
					$svg_bottom_output .= '<polygon points="0,0 0,86 86,0" ' . mrseo_elated_get_inline_style($angled_shape_style) . ' />';
				}
				$svg_bottom_output .= '</svg>';
				$eltdf_before_wrapper_close = $svg_bottom_output;
			}
		break;
	case 'angled-bckg':
			$css_classes[] = 'eltdf-row-has-shape';
			$angle_classes = array();
			$angle_bckg_classes = array();

			$angle_classes[] = 'eltdf-row-angled-bckg';
			$angle_bckg_classes[] = 'eltdf-angled-bckg-inner';

			if($angled_bckg_parallax === 'yes'){
				$angle_bckg_classes[] = 'eltdf-parallax-holder';
				$data_parallax = 'data-parallax-speed=0.2';
			}

			switch ($angled_bckg_direction) {
				case 'from_left_to_right_top':
					$angle_classes[] = 'eltdf-angled-left-to-right';
					break;				
				case 'from_right_to_left_top':
					$angle_classes[] = 'eltdf-angled-right-to-left';
					break;
			}

			$bck_image_obj = wp_get_attachment_image_src($angled_bckg_image, 'full');
			$bck_image_url = $bck_image_obj[0];
			$bck_style = '';
			if($bck_image_url !== ''){
				$bck_style = 'background-image: url('.esc_url($bck_image_url).')';
			}

			$angled_bckg = '';
			$angled_bckg.= '<div class="'.implode(' ', $angle_classes ).'">';
			$angled_bckg.= '<div class="'.implode(' ', $angle_bckg_classes ).'" style="'.$bck_style.'" '.$data_parallax.'></div>';
			$angled_bckg.= '</div>';
			$eltdf_after_wrapper_open .= $angled_bckg;
		break;
	default:
		break;
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= $eltdf_row_wrapper_start;
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . '>';
$output .= $eltdf_after_wrapper_open;
$output .= wpb_js_remove_wpautop( $content );
$output .= $eltdf_before_wrapper_close;
$output .= '</div>';
$output .= $eltdf_row_wrapper_end;
$output .= $after_output;

print $output;
