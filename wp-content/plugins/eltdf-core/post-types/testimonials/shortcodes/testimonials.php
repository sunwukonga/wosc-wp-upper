<?php
namespace ElatedCore\CPT\Shortcodes\Testimonials;

use ElatedCore\Lib;

class Testimonials implements Lib\ShortcodeInterface{
    private $base;

    public function __construct() {
        $this->base = 'eltdf_testimonials';

        add_action('vc_before_init', array($this, 'vcMap'));
	
	    //Testimonials category filter
	    add_filter( 'vc_autocomplete_eltdf_testimonials_category_callback', array( &$this, 'testimonialsCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
	
	    //Testimonials category render
	    add_filter( 'vc_autocomplete_eltdf_testimonials_category_render', array( &$this, 'testimonialsCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     */
    public function vcMap() {
        if(function_exists('vc_map')) {
            vc_map( array(
                'name' => esc_html__('Elated Testimonials', 'eltdf-core'),
                'base' => $this->base,
                'category' => esc_html__('by ELATED', 'eltdf-core'),
                'icon' => 'icon-wpb-testimonials extended-custom-icon',
                'allowed_container_element' => 'vc_row',
                'params' => array(
	                array(
		                'type'       => 'dropdown',
		                'param_name' => 'type',
		                'heading'    => esc_html__('Type', 'eltdf-core'),
		                'value'      => array(
			                esc_html__('Standard', 'eltdf-core') => 'standard',
			                esc_html__('Boxed', 'eltdf-core') => 'boxed',
			                esc_html__('Split', 'eltdf-core') => 'split',
		                ),
		                'save_always' => true,
		                'admin_label' => true,
	                ),
                    array(
                        'type'       => 'dropdown',
                        'param_name' => 'skin',
                        'heading'    => esc_html__('Skin', 'eltdf-core'),
                        'value'      => array(
                            esc_html__('Dark', 'eltdf-core') => 'dark',
                            esc_html__('Light', 'eltdf-core') => 'light',
                        ),
                        'save_always' => true,
		                'admin_label' => true,
                    ),
                    array(
                        'type'        => 'textfield',
                        'param_name'  => 'number',
                        'heading'     => esc_html__('Number', 'eltdf-core'),
                        'description' => esc_html__('Number of Testimonials', 'eltdf-core')
                    ),
                    array(
                        'type'        => 'autocomplete',
                        'param_name'  => 'category',
                        'heading'     => esc_html__('Category', 'eltdf-core'),
                        'description' => esc_html__('Enter one category slug (leave empty for showing all categories)', 'eltdf-core')
                    ),
	                array(
		                'type'       => 'colorpicker',
		                'param_name' => 'box_color',
		                'heading'    => esc_html__('Content Box Color', 'eltdf-core'),
		                'dependency' => Array('element' => 'type', 'value' => 'boxed')
	                ),
	                array(
	                	'type'		 => 'attach_image',
	                	'param_name' => 'content_background_image',
	                	'heading'	 => esc_html__('Text Background Image','eltdf-core'),
		                'dependency' => Array('element' => 'type', 'value' => 'split')
                	),
	                array(
		                'type'       => 'dropdown',
		                'param_name' => 'number_of_visible_items',
		                'heading'    => esc_html__('Number Of Visible Items', 'eltdf-core'),
		                'value'      => array(
			                esc_html__('One', 'eltdf-core')   => '1',
			                esc_html__('Two', 'eltdf-core')   => '2',
			                esc_html__('Three', 'eltdf-core') => '3',
			                esc_html__('Four', 'eltdf-core')  => '4',
			                esc_html__('Five', 'eltdf-core')  => '5',
			                esc_html__('Six', 'eltdf-core')   => '6'
		                ),
		                'save_always' => true,
		                'dependency'  => Array('element' => 'type', 'value' => 'boxed'),
		                'group'       => esc_html__('Slider Settings', 'eltdf-core')
	                ),
	                array(
		                'type'        => 'dropdown',
		                'param_name'  => 'slider_loop',
		                'heading'     => esc_html__('Enable Slider Loop', 'eltdf-core'),
		                'value'       => array_flip(mrseo_elated_get_yes_no_select_array(false, true)),
		                'save_always' => true,
		                'group'       => esc_html__('Slider Settings', 'eltdf-core'),
						'dependency' => array( 'element' => 'type', 'value' => array( 'standard', 'boxed' ) )
	                ),
	                array(
		                'type'        => 'dropdown',
		                'param_name'  => 'slider_autoplay',
		                'heading'     => esc_html__('Enable Slider Autoplay', 'eltdf-core'),
		                'value'       => array_flip(mrseo_elated_get_yes_no_select_array(false, true)),
		                'save_always' => true,
		                'group'       => esc_html__('Slider Settings', 'eltdf-core')

	                ),
	                array(
		                'type'        => 'textfield',
		                'param_name'  => 'slider_speed',
		                'heading'     => esc_html__('Slide Duration', 'eltdf-core'),
		                'description' => esc_html__('Default value is 5000 (ms)', 'eltdf-core'),
		                'group'       => esc_html__('Slider Settings', 'eltdf-core'),
						'dependency' => array( 'element' => 'type', 'value' => array( 'standard', 'boxed' ) )
	                ),
	                array(
		                'type'        => 'textfield',
		                'param_name'  => 'slider_speed_animation',
		                'heading'     => esc_html__('Slide Animation Duration', 'eltdf-core'),
		                'description' => esc_html__('Speed of slide animation in milliseconds. Default value is 600.', 'eltdf-core'),
		                'group'       => esc_html__('Slider Settings', 'eltdf-core'),
						'dependency' => array( 'element' => 'type', 'value' => array( 'standard', 'boxed' ) )
	                ),
	                array(
		                'type'		  => 'dropdown',
		                'param_name'  => 'slider_navigation',
		                'heading'	  => esc_html__('Enable Slider Navigation Arrows', 'eltdf-core'),
		                'value'       => array_flip(mrseo_elated_get_yes_no_select_array(false, true)),
		                'save_always' => true,
		                'group'       => esc_html__('Slider Settings', 'eltdf-core')
	                ),
	                array(
		                'type'		  => 'dropdown',
		                'param_name'  => 'slider_pagination',
		                'heading'	  => esc_html__('Enable Slider Pagination', 'eltdf-core'),
		                'value'       => array_flip(mrseo_elated_get_yes_no_select_array(false, false)),
		                'save_always' => true,
		                'group'       => esc_html__('Slider Settings', 'eltdf-core')
	                )
                )
            ) );
        }
    }

    /**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
    public function render($atts, $content = null) {
        $args = array(
	        'type'                    => '',
	        'skin'                    => '',
            'number'                  => '-1',
            'category'                => '',
            'box_color'               => '',
            'content_background_image'=> '',
	        'number_of_visible_items' => '3',
	        'slider_loop'		      => 'yes',
	        'slider_autoplay'		  => 'yes',
	        'slider_speed'		      => '5000',
	        'slider_speed_animation'  => '600',
	        'slider_navigation'	      => 'yes',
	        'slider_pagination'	      => 'no'
        );

        $params = shortcode_atts($args, $atts);
        extract($params);

	    $available_type_values = array('standard', 'boxed', 'split');
	    if (!isset($params['type']) || !in_array($params['type'], $available_type_values)) {
		    $params['type'] = 'standard';
	    }

	    $holder_classes = $this->getHolderClasses($params);

        $query_args = $this->getQueryParams($params);
        $query_results = new \WP_Query($query_args);

	    $params['box_styles'] = $this->getBoxStyles($params);
        $params['content_image'] = $this->getSplitContentStyles($params);
        $data_attr = $this->getSliderData($params);
    
        $html = '';
        $html_image = '';

        $html .= '<div class="eltdf-testimonials-holder ' . $holder_classes . ' clearfix">';
            $html .= '<div class="eltdf-testimonials eltdf-owl-slider" ' . mrseo_elated_get_inline_attrs($data_attr) . '>';

            if ($params['type'] == 'split') {
            	$html .= '<div class="eltdf-testimonials-content-holder-outer">';
            	$html .= '<span class="eltdf-testimonial-angled-bckg-holder">';
            	$html .= '<span class="eltdf-testimonial-angled-bckg-image" '. mrseo_elated_get_inline_style($params['content_image']).'></span>';
            	$html .= '</span>';
            	$html .= '<div class="eltdf-testimonials-content-holder">';
            	$html .= '<div class="eltdf-testimonials-content-holder-inner">';
            }

            if ($query_results->have_posts()):
                while ($query_results->have_posts()) : $query_results->the_post();
                    $title = get_post_meta(get_the_ID(), 'eltdf_testimonial_title', true);
                    $text = get_post_meta(get_the_ID(), 'eltdf_testimonial_text', true);
                    $author = get_post_meta(get_the_ID(), 'eltdf_testimonial_author', true);
                    $image_url = get_the_post_thumbnail_url(get_the_ID());

                    $params['current_id'] = get_the_ID();
                    $params['title'] = $title;
                    $params['text'] = $text;
                    $params['author'] = $author;
                    $params['split_image'] = $image_url;

                    $html .= eltdf_core_get_cpt_shortcode_module_template_part('testimonials', 'testimonials-' . $params['type'], '', $params);
                    $html_image .= eltdf_core_get_cpt_shortcode_module_template_part('testimonials', 'testimonials-' . $params['type'] .'-image', '', $params);

                endwhile;
            else:
                $html .= esc_html__('Sorry, no posts matched your criteria.', 'eltdf-core');
            endif;

            wp_reset_postdata();

            if ($params['type'] == 'split') {
            	$html .= '</div>'; // close eltdf-testimonials-content-holder-inner
            	$html .= '</div>'; // close eltdf-testimonials-content-holder
            	$html .= '</div>'; // close eltdf-testimonials-content-holder-outer
            	$html .= '<div class="eltdf-testimonials-images-holder">';
            	$html .= $html_image;
            	$html .= '</div>';
            }

            $html .= '</div>';
    
        $html .= '</div>';
    
        return $html;
    }

	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses($params){
		$holderClasses = '';

		$holderClasses .= ' eltdf-testimonials-' . $params['type'];

		$holderClasses .= ' eltdf-testimonials-' . $params['skin'];

		return $holderClasses;
	}

    /**
     * Generates testimonials query attribute array
     *
     * @param $params
     *
     * @return array
     */
    private function getQueryParams($params) {
        $args = array(
            'post_status' => 'publish',
            'post_type' => 'testimonials',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => $params['number']
        );
        
        if ($params['category'] != '') {
            $args['testimonials-category'] = $params['category'];
        }
        
        return $args;
    }

	/**
	 * Returns array of box styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getBoxStyles($params) {
		$styles = array();

		if($params['type'] === 'boxed' && !empty($params['box_color'])) {
			$styles[] = 'background-color: '.$params['box_color'];
		}

		return $styles;
	}
	
	/**
	 * Returns array of split coontent styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getSplitContentStyles($params) {
		$style = array();

		if ($params['content_background_image'] !== ''){
			$id = $params['content_background_image'];
			$image_src = wp_get_attachment_image_src($id, 'full');
			
			$style[] = 'background-image: url('.$image_src[0].')';
		}

		return implode(';', $style);
	}

	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getSliderData($params) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = !empty($params['number_of_visible_items']) && $params['type'] === 'boxed' ? $params['number_of_visible_items'] : '1';
		$slider_data['data-enable-loop']            = !empty($params['slider_loop']) ? $params['slider_loop'] : '';
		$slider_data['data-enable-autoplay']        = !empty($params['slider_autoplay']) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           = !empty($params['slider_speed']) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] = !empty($params['slider_speed_animation']) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-enable-navigation']      = !empty($params['slider_navigation']) ? $params['slider_navigation'] : '';
		$slider_data['data-enable-pagination']      = !empty($params['slider_pagination']) ? $params['slider_pagination'] : '';
		
		return $slider_data;
	}
	
	/**
	 * Filter testimonials categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function testimonialsCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos       = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS testimonials_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'testimonials-category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['testimonials_category_title'] ) > 0 ) ? esc_html__( 'Category', 'eltdf-core' ) . ': ' . $value['testimonials_category_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
		
	}
	
	/**
	 * Find testimonials category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function testimonialsCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$testimonials_category = get_term_by( 'slug', $query, 'testimonials-category' );
			if ( is_object( $testimonials_category ) ) {
				
				$testimonials_category_slug = $testimonials_category->slug;
				$testimonials_category_title = $testimonials_category->name;
				
				$testimonials_category_title_display = '';
				if ( ! empty( $testimonials_category_title ) ) {
					$testimonials_category_title_display = esc_html__( 'Category', 'eltdf-core' ) . ': ' . $testimonials_category_title;
				}
				
				$data          = array();
				$data['value'] = $testimonials_category_slug;
				$data['label'] = $testimonials_category_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
}