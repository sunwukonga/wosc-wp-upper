<?php

if(!function_exists('eltdf_core_portfolio_meta_box_functions')) {
	function eltdf_core_portfolio_meta_box_functions($post_types) {
		$post_types[] = 'portfolio-item';
		
		return $post_types;
	}
	
	add_filter('mrseo_elated_meta_box_post_types_save', 'eltdf_core_portfolio_meta_box_functions');
	add_filter('mrseo_elated_meta_box_post_types_remove', 'eltdf_core_portfolio_meta_box_functions');
}

if(!function_exists('eltdf_core_portfolio_scope_meta_box_functions')) {
	function eltdf_core_portfolio_scope_meta_box_functions($post_types) {
		$post_types[] = 'portfolio-item';
		
		return $post_types;
	}
	
	add_filter('mrseo_elated_set_scope_for_meta_boxes', 'eltdf_core_portfolio_scope_meta_box_functions');
}

if(!function_exists('eltdf_core_register_portfolio_cpt')) {
	function eltdf_core_register_portfolio_cpt($cpt_class_name) {
		$cpt_class = array(
			'ElatedCore\CPT\Portfolio\PortfolioRegister'
		);
		
		$cpt_class_name = array_merge($cpt_class_name, $cpt_class);
		
		return $cpt_class_name;
	}
	
	add_filter('eltdf_core_filter_register_custom_post_types', 'eltdf_core_register_portfolio_cpt');
}

if(!function_exists('eltdf_core_get_archive_portfolio_list')) {
	function eltdf_core_get_archive_portfolio_list($eltdf_taxonomy_slug = '', $eltdf_taxonomy_name = '') {
		
		$number_of_items = 12;
		$number_of_items_option = mrseo_elated_options()->getOptionValue('portfolio_archive_number_of_items');
		if(!empty($number_of_items_option)) {
			$number_of_items = $number_of_items_option;
		}
		
		$number_of_columns = 4;
		$number_of_columns_option = mrseo_elated_options()->getOptionValue('portfolio_archive_number_of_columns');
		if(!empty($number_of_columns_option)) {
			$number_of_columns = $number_of_columns_option;
		}
		
		$space_between_items = 'normal';
		$space_between_items_option = mrseo_elated_options()->getOptionValue('portfolio_archive_space_between_items');
		if(!empty($space_between_items_option)) {
			$space_between_items = $space_between_items_option;
		}
		
		$image_size = 'landscape';
		$image_size_option = mrseo_elated_options()->getOptionValue('portfolio_archive_image_size');
		if(!empty($image_size_option)) {
			$image_size = $image_size_option;
		}
		
		$item_layout = 'standard-shader';
		$item_layout_option = mrseo_elated_options()->getOptionValue('portfolio_archive_item_layout');
		if(!empty($item_layout_option)) {
			$item_layout = $item_layout_option;
		}
		
		$category = $eltdf_taxonomy_name === 'portfolio-category' && !empty($eltdf_taxonomy_slug) ? $eltdf_taxonomy_slug : '';
		$tag      = $eltdf_taxonomy_name === 'portfolio-tag' && !empty($eltdf_taxonomy_slug) ? $eltdf_taxonomy_slug : '';
		
		$params = array(
			'type'                => 'gallery',
			'number_of_items'     => $number_of_items,
			'number_of_columns'   => $number_of_columns,
			'space_between_items' => $space_between_items,
			'image_proportions'   => $image_size,
			'category'            => $category,
			'tag'                 => $tag,
			'item_layout'         => $item_layout,
			'pagination_type'     => 'load-more'
		);
		
		$html = mrseo_elated_execute_shortcode('eltdf_portfolio_list', $params);
		
		print $html;
	}
}

if(!function_exists('eltdf_core_set_portfolio_single_info_follow_body_class')) {
	/**
	 * Function that adds follow portfolio info class to body if sticky sidebar is enabled on portfolio single layouts
	 *
	 * @param $classes array of body classes
	 *
	 * @return array with follow portfolio info class body class added
	 */
	function eltdf_core_set_portfolio_single_info_follow_body_class($classes) {
		if(is_singular('portfolio-item') && mrseo_elated_options()->getOptionValue('portfolio_single_sticky_sidebar') == 'yes'){
			$classes[] = 'eltdf-follow-portfolio-info';
		}
		
		return $classes;
	}
	
	add_filter('body_class', 'eltdf_core_set_portfolio_single_info_follow_body_class');
}

if(!function_exists('eltdf_core_single_portfolio_title_display')) {
    /**
     * Function that checks option for single product title and overrides it with filter
     * @param $show_title_area - boolean, default value from title function @see mrseo_elated_get_title()
     * @return boolean
     */
    function eltdf_core_single_portfolio_title_display($show_title_area) {
        if(is_singular('portfolio-item')) {
            //Override displaying title based on blog option
            $show_title_area_meta = mrseo_elated_get_meta_field_intersect('show_title_area_portfolio_single');
            if(!empty($show_title_area_meta)) {
                $show_title_area = $show_title_area_meta == 'yes' ? true : false;
            }
        }

        return $show_title_area;
    }

    add_filter('mrseo_elated_show_title_area', 'eltdf_core_single_portfolio_title_display');
}

if(!function_exists('eltdf_core_get_single_portfolio')) {
	function eltdf_core_get_single_portfolio() {
		$portfolio_template = mrseo_elated_get_meta_field_intersect('portfolio_single_template');
		
		$params = array(
			'holder_classes' => 'eltdf-ps-'.$portfolio_template.'-layout',
			'item_layout'    => $portfolio_template
		);
		
		eltdf_core_get_cpt_single_module_template_part('templates/single/holder', 'portfolio', $portfolio_template, $params);
	}
}

if( !function_exists('eltdf_core_set_single_portfolio_style') ) {
	/**
	 * Function that return padding for content
	 */
	function eltdf_core_set_single_portfolio_style($style) {
		$id = mrseo_elated_get_page_id();
		$class_prefix = mrseo_elated_get_unique_page_class($id);
		
		$current_styles = '';
		$current_style = array();
		
		$current_selector = array(
			$class_prefix . ' .eltdf-portfolio-single-holder .eltdf-ps-info-holder'
		);
		
		$info_padding_top = get_post_meta($id, 'portfolio_info_top_padding', true);
		
		if(!empty($info_padding_top)) {
			$current_style['padding-top'] = mrseo_elated_filter_px($info_padding_top).'px';
			
			$current_styles .= mrseo_elated_dynamic_css($current_selector, $current_style);
		}
		
		$current_style = $current_styles . $style;
		
		return $current_style;
	}
	
	add_filter('mrseo_elated_add_page_custom_style', 'eltdf_core_set_single_portfolio_style');
}

if(!function_exists('eltdf_core_add_portfolio_attachment_custom_field')){
	function eltdf_core_add_portfolio_attachment_custom_field( $form_fields, $post = null ) {
		if(wp_attachment_is_image($post->ID)){
			$field_value = get_post_meta( $post->ID, 'portfolio_single_masonry_image_size', true );
			
			$form_fields['portfolio_single_masonry_image_size'] = array(
				'input' => 'html',
				'label' => esc_html__( 'Image Size', 'eltdf-core'),
				'helps' => esc_html__( 'Choose image size for portfolio single item - Masonry layout', 'eltdf-core')
			);
			
			$form_fields['portfolio_single_masonry_image_size']['html']  = "<select name='attachments[{$post->ID}][portfolio_single_masonry_image_size]'>";
			$form_fields['portfolio_single_masonry_image_size']['html'] .= '<option '.selected($field_value, 'eltdf-default-masonry-item', false).' value="eltdf-default-masonry-item">'.esc_html__('Default Size','eltdf-core').'</option>';
			$form_fields['portfolio_single_masonry_image_size']['html'] .= '<option '.selected($field_value, 'eltdf-large-masonry-item', false).' value="eltdf-large-masonry-item">'.esc_html__('Large Size','eltdf-core').'</option>';
			$form_fields['portfolio_single_masonry_image_size']['html'] .= '</select>';
		}
		
		return $form_fields;
	}
	
	add_filter( 'attachment_fields_to_edit', 'eltdf_core_add_portfolio_attachment_custom_field' , 10, 2 );
}

if(!function_exists('eltdf_core_save_image_portfolio_attachment_fields')){
	/**
	 * @param array $post
	 * @param array $attachment
	 * @return array
	 */
	function eltdf_core_save_image_portfolio_attachment_fields($post, $attachment) {
		
		if( isset($attachment['portfolio_single_masonry_image_size']) ){
			update_post_meta($post['ID'], 'portfolio_single_masonry_image_size', $attachment['portfolio_single_masonry_image_size']);
		}
		
		return $post;
	}
	
	add_filter( 'attachment_fields_to_save', 'eltdf_core_save_image_portfolio_attachment_fields',10,2 );
}

if(!function_exists('eltdf_core_get_portfolio_single_media')) {
	function eltdf_core_get_portfolio_single_media() {
		$image_ids       = get_post_meta(get_the_ID(), 'eltdf-portfolio-image-gallery', true);
		$videos          = get_post_meta(get_the_ID(), 'eltdf_portfolio_images', true);
		$portfolio_media = array();
		
		if($image_ids !== '') {
			$image_ids = explode(',', $image_ids);
			
			foreach($image_ids as $image_id) {
				$media                = array();
				$media['title']       = get_the_title($image_id);
				$media['type']        = 'image';
				$media['description'] = get_post_meta($image_id, '_wp_attachment_image_alt', true);
				$media['image_src']   = wp_get_attachment_image_src($image_id, 'full');
				$media['holder_classes'] = '';
				
				$image_size = get_post_meta($image_id, 'portfolio_single_masonry_image_size', true);
				
				switch($image_size){
					case 'eltdf-default-masonry-item':
						$media['holder_classes'] = 'eltdf-ps-masonry-normal-item';
						break;
					case 'eltdf-large-masonry-item':
						$media['holder_classes'] = 'eltdf-ps-masonry-large-item';
						break;
				}
				
				$portfolio_media[] = $media;
			}
		}
		
		if(is_array($videos) && count($videos)) {
			usort($videos, 'eltdf_core_compare_portfolio_videos');
			foreach($videos as $video) {
				$media = array();
				
				if(!empty($video['portfoliovideotype'])) {
					$media['title']       = $video['portfoliotitle'];
					$media['type']        = $video['portfoliovideotype'];
					$media['description'] = 'video';
					$media['video_url']   = eltdf_core_get_portfolio_video_url($video);
					
					if($video['portfoliovideotype'] == 'self') {
						$media['video_cover'] = !empty($video['portfoliovideoimage']) ? $video['portfoliovideoimage'] : '';
					}
					
					if($video['portfoliovideotype'] !== 'self') {
						$media['video_id'] = $video['portfoliovideoid'];
					}
				} elseif(!empty($video['portfolioimgtype'])) {
					$media['title']     = $video['portfoliotitle'];
					$media['type']      = $video['portfolioimgtype'];
					$media['image_src'] = $video['portfolioimg'];
				}
				
				$portfolio_media[] = $media;
			}
		}
		
		return $portfolio_media;
	}
}

if(!function_exists('eltdf_core_get_portfolio_video_url')) {
	function eltdf_core_get_portfolio_video_url($video) {
		switch($video['portfoliovideotype']) {
			case 'youtube':
				return 'https://www.youtube.com/embed/'.$video['portfoliovideoid'].'?wmode=transparent';
				break;
			case 'vimeo';
				return 'http://player.vimeo.com/video/'.$video['portfoliovideoid'].'?title=0&amp;byline=0&amp;portrait=0';
				break;
			case 'self':
				$return_array = array();
				
				if(!empty($video['portfoliovideomp4'])) {
					$return_array['mp4'] = $video['portfoliovideomp4'];
				}
				
				return $return_array;
				
				break;
		}
	}
}

if(!function_exists('eltdf_core_get_portfolio_single_media_html')) {
	function eltdf_core_get_portfolio_single_media_html($media) {
		global $wp_filesystem;
		$params = array();
		
		if($media['type'] == 'image') {
			$params['lightbox'] = mrseo_elated_options()->getOptionValue('portfolio_single_lightbox_images') == 'yes';
			
			$media['image_url'] = is_array($media['image_src']) ? $media['image_src'][0] : $media['image_src'];
			if(empty($media['description'])) {
				$media['description'] = $media['title'];
			}
		}
		
		if(in_array($media['type'], array('youtube', 'vimeo'))) {
			$params['lightbox'] = mrseo_elated_options()->getOptionValue('portfolio_single_lightbox_videos') == 'yes';
			
			if($params['lightbox']) {
				switch($media['type']) {
					case 'vimeo':
						WP_Filesystem();
						$url      = 'http://vimeo.com/api/v2/video/'.$media['video_id'].'.php';
						$response = unserialize($wp_filesystem->get_contents($url));
						
						$params['video_title']    = $response[0]['title'];
						$params['lightbox_thumb'] = $response[0]['thumbnail_large'];
						break;
					case 'youtube':
						$params['video_title'] = $media['title'];
						
						$params['lightbox_thumb'] = 'https://img.youtube.com/vi/'.trim($media['video_id']).'/maxresdefault.jpg';
						break;
				}
			}
		}
		
		$params['media'] = $media;
		
		eltdf_core_get_cpt_single_module_template_part('templates/single/media/'.$media['type'], 'portfolio', '', $params);
	}
}

if(!function_exists('eltdf_core_portfolio_single_show_share')) {
	function eltdf_core_portfolio_single_show_share() {
		$global_share = mrseo_elated_options()->getOptionValue('enable_social_share') == 'yes';
		$portfolio_share = mrseo_elated_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes';

        $enable_share_meta = mrseo_elated_get_meta_field_intersect('title_area_enable_share') == 'yes';

        return $global_share && $portfolio_share && !$enable_share_meta;		
	}
}

if(!function_exists('eltdf_core_compare_portfolio_videos')) {
	/**
	 * Function that compares two portfolio image for sorting
	 *
	 * @param $a int first image
	 * @param $b int second image
	 *
	 * @return int result of comparison
	 */
	function eltdf_core_compare_portfolio_videos($a, $b) {
		if(isset($a['portfolioimgordernumber']) && isset($b['portfolioimgordernumber'])) {
			if($a['portfolioimgordernumber'] == $b['portfolioimgordernumber']) {
				return 0;
			}
			
			return ($a['portfolioimgordernumber'] < $b['portfolioimgordernumber']) ? -1 : 1;
		}
		
		return 0;
	}
}

if(!function_exists('eltdf_core_compare_portfolio_options')) {
	/**
	 * Function that compares two portfolio options for sorting
	 *
	 * @param $a int first option
	 * @param $b int second option
	 *
	 * @return int result of comparison
	 */
	function eltdf_core_compare_portfolio_options($a, $b) {
		if(isset($a['optionlabelordernumber']) && isset($b['optionlabelordernumber'])) {
			if($a['optionlabelordernumber'] == $b['optionlabelordernumber']) {
				return 0;
			}
			
			return ($a['optionlabelordernumber'] < $b['optionlabelordernumber']) ? -1 : 1;
		}
		
		return 0;
	}
}

if (!function_exists('eltdf_core_get_portfolio_single_related_posts')) {
	/**
	 * Function for returning portfolio single related posts
	 *
	 * @param $post_id
	 * @return WP_Query
	 */
	function eltdf_core_get_portfolio_single_related_posts($post_id) {
		//Get tags
		$tags = wp_get_object_terms($post_id, 'portfolio-tag');
		
		//Get categories
		$categories = wp_get_object_terms($post_id, 'portfolio-category');
		
		$tag_ids = array();
		if ($tags) {
			foreach ($tags as $tag) {
				$tag_ids[] = $tag->term_id;
			}
		}
		
		$category_ids = array();
		if ($categories) {
			foreach ($categories as $category) {
				$category_ids[] = $category->term_id;
			}
		}
		
		$hasRelatedByTag = false;
		
		if ($tag_ids) {
			$related_by_tag = eltdf_core_get_portfolio_single_related_posts_by_param($post_id, $tag_ids, 'portfolio-tag');
			
			if (!empty($related_by_tag->posts)) {
				$hasRelatedByTag = true;
				
				return $related_by_tag;
			}
		}
		
		if ($categories && !$hasRelatedByTag) {
			$related_by_category = eltdf_core_get_portfolio_single_related_posts_by_param($post_id, $category_ids, 'portfolio-category');
			
			if (!empty($related_by_category->posts)) {
				return $related_by_category;
			}
		}
	}
}

if (!function_exists('eltdf_core_get_portfolio_single_related_posts_by_param')) {
	/**
	 * @param $post_id - Post ID
	 * @param $term_ids - Category or Tag IDs
	 * @param $taxonomy
	 * @return WP_Query
	 */
	function eltdf_core_get_portfolio_single_related_posts_by_param($post_id, $term_ids, $taxonomy) {
		$args = array(
			'post_status'    => 'publish',
			'post__not_in'   => array($post_id),
			'order'          => 'DESC',
			'orderby'        => 'date',
			'posts_per_page' => '4',
			'tax_query'      => array(
				array(
					'taxonomy'  => $taxonomy,
					'field'     => 'term_id',
					'terms'     => $term_ids,
				),
			)
		);
		
		$related_by_taxonomy = new WP_Query($args);
		
		return $related_by_taxonomy;
	}
}

/**
 * Loads more function for portfolio.
 */
if(!function_exists('eltdf_core_portfolio_ajax_load_more')) {
	function eltdf_core_portfolio_ajax_load_more() {
		$shortcode_params = array();
		
		if(!empty($_POST)) {
			foreach ($_POST as $key => $value) {
				if($key !== '') {
					$addUnderscoreBeforeCapitalLetter = preg_replace('/([A-Z])/', '_$1', $key);
					$setAllLettersToLowercase = strtolower($addUnderscoreBeforeCapitalLetter);
					
					$shortcode_params[$setAllLettersToLowercase] = $value;
				}
			}
		}
		
		$html = '';
		
		$port_list = new \ElatedCore\CPT\Shortcodes\Portfolio\PortfolioList();
		
		$query_array = $port_list->getQueryArray($shortcode_params);
		$query_results = new \WP_Query($query_array);
		$shortcode_params['this_object'] = $port_list;
		
		if($query_results->have_posts()):
			while ( $query_results->have_posts() ) : $query_results->the_post();
				$shortcode_params['current_id'] = get_the_ID();
				$article_classes = $port_list->getArticleClasses($shortcode_params);
				$article_class = get_post_class(array($article_classes));
				$shortcode_params['article_class'] = implode(' ', $article_class);
				
				$shortcode_params['item_link'] = $port_list->getItemLink($shortcode_params);
				
				$html .= eltdf_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-item', $shortcode_params['item_style'], $shortcode_params);
			endwhile;
		else:
			$html .= eltdf_core_get_cpt_shortcode_module_template_part('portfolio', 'parts/posts-not-found', '', $shortcode_params);
		endif;
		
		wp_reset_postdata();
		
		$return_obj = array(
			'html' => $html,
		);
		
		echo json_encode($return_obj); exit;
	}
}

add_action('wp_ajax_nopriv_eltdf_core_portfolio_ajax_load_more', 'eltdf_core_portfolio_ajax_load_more');
add_action( 'wp_ajax_eltdf_core_portfolio_ajax_load_more', 'eltdf_core_portfolio_ajax_load_more' );