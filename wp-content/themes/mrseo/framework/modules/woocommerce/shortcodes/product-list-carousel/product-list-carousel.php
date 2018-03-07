<?php
namespace ElatedCore\CPT\Shortcodes\ProductListCarousel;

use ElatedCore\Lib;

class ProductListCarousel implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_product_list_carousel';
		
		add_action('vc_before_init', array($this,'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Elated Product List - Carousel', 'mrseo' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-product-list-carousel extended-custom-icon',
					'category'                  => esc_html__( 'by ELATED', 'mrseo' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'       => 'dropdown',
							'param_name' => 'type',
							'heading'    => esc_html__( 'Type', 'mrseo' ),
							'value'      => array(
								esc_html__( 'Standard', 'mrseo' ) => 'standard',
								esc_html__( 'Simple', 'mrseo' )   => 'simple'
							)
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'number_of_posts',
							'heading'    => esc_html__( 'Number of Products', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'space_between_items',
							'heading'    => esc_html__( 'Space Between Items', 'mrseo' ),
							'value'      => array(
								esc_html__( 'Normal', 'mrseo' )   => 'normal',
								esc_html__( 'Small', 'mrseo' )    => 'small',
								esc_html__( 'Tiny', 'mrseo' )     => 'tiny',
								esc_html__( 'No Space', 'mrseo' ) => 'no'
							),
							'dependency' => array( 'element' => 'type', 'value' => array( 'standard' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order_by',
							'heading'     => esc_html__( 'Order By', 'mrseo' ),
							'value'       => array_flip( mrseo_elated_get_query_order_by_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'mrseo' ),
							'value'       => array_flip( mrseo_elated_get_query_order_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'taxonomy_to_display',
							'heading'     => esc_html__( 'Choose Sorting Taxonomy', 'mrseo' ),
							'value'       => array(
								esc_html__( 'Category', 'mrseo' ) => 'category',
								esc_html__( 'Tag', 'mrseo' )      => 'tag',
								esc_html__( 'Id', 'mrseo' )       => 'id'
							),
							'description' => esc_html__( 'If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'mrseo' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'taxonomy_values',
							'heading'     => esc_html__( 'Enter Taxonomy Values', 'mrseo' ),
							'description' => esc_html__( 'Separate values (category slugs, tags, or post IDs) with a comma', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'heading'    => esc_html__( 'Image Proportions', 'mrseo' ),
							'param_name' => 'image_size',
							'value'      => array(
								esc_html__( 'Default', 'mrseo' )        => '',
								esc_html__( 'Original', 'mrseo' )       => 'full',
								esc_html__( 'Square', 'mrseo' )         => 'square',
								esc_html__( 'Landscape', 'mrseo' )      => 'landscape',
								esc_html__( 'Portrait', 'mrseo' )       => 'portrait',
								esc_html__( 'Medium', 'mrseo' )         => 'medium',
								esc_html__( 'Large', 'mrseo' )          => 'large',
								esc_html__( 'Shop Catalog', 'mrseo' )   => 'shop_catalog',
								esc_html__( 'Shop Single', 'mrseo' )    => 'shop_single',
								esc_html__( 'Shop Thumbnail', 'mrseo' ) => 'shop_thumbnail'
							)
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_visible_items',
							'heading'     => esc_html__( 'Number Of Visible Items', 'mrseo' ),
							'value'       => array(
								esc_html__( 'One', 'mrseo' )   => '1',
								esc_html__( 'Two', 'mrseo' )   => '2',
								esc_html__( 'Three', 'mrseo' ) => '3',
								esc_html__( 'Four', 'mrseo' )  => '4',
								esc_html__( 'Five', 'mrseo' )  => '5',
								esc_html__( 'Six', 'mrseo' )   => '6'
							),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'mrseo' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_loop',
							'heading'     => esc_html__( 'Enable Slider Loop', 'mrseo' ),
							'value'       => array_flip( mrseo_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'mrseo' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_autoplay',
							'heading'     => esc_html__( 'Enable Slider Autoplay', 'mrseo' ),
							'value'       => array_flip( mrseo_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'mrseo' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed',
							'heading'     => esc_html__( 'Slide Duration', 'mrseo' ),
							'description' => esc_html__( 'Default value is 5000 (ms)', 'mrseo' ),
							'group'       => esc_html__( 'Slider Settings', 'mrseo' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed_animation',
							'heading'     => esc_html__( 'Slide Animation Duration', 'mrseo' ),
							'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'mrseo' ),
							'group'       => esc_html__( 'Slider Settings', 'mrseo' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_navigation',
							'heading'     => esc_html__( 'Enable Slider Navigation Arrows', 'mrseo' ),
							'value'       => array_flip( mrseo_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'slider_navigation_skin',
							'heading'    => esc_html__( 'Slider Navigation Skin', 'mrseo' ),
							'value'      => array(
								esc_html__( 'Default', 'mrseo' ) => 'default',
								esc_html__( 'Light', 'mrseo' )   => 'light'
							),
							'dependency' => array( 'element' => 'slider_navigation', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Slider Settings', 'mrseo' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_pagination',
							'heading'     => esc_html__( 'Enable Slider Pagination', 'mrseo' ),
							'value'       => array_flip( mrseo_elated_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'slider_pagination_skin',
							'heading'    => esc_html__( 'Slider Pagination Skin', 'mrseo' ),
							'value'      => array(
								esc_html__( 'Default', 'mrseo' ) => 'default',
								esc_html__( 'Light', 'mrseo' )   => 'light'
							),
							'dependency' => array( 'element' => 'slider_pagination', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Slider Settings', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'slider_pagination_pos',
							'heading'    => esc_html__( 'Slider Pagination Position', 'mrseo' ),
							'value'      => array(
								esc_html__( 'Below Carousel', 'mrseo' )  => 'bellow-slider',
								esc_html__( 'Inside Carousel', 'mrseo' ) => 'inside-slider'
							),
							'dependency' => array( 'element' => 'slider_pagination', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Slider Settings', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_title',
							'heading'    => esc_html__( 'Display Title', 'mrseo' ),
							'value'      => array_flip( mrseo_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_tag',
							'heading'    => esc_html__( 'Title Tag', 'mrseo' ),
							'value'      => array_flip( mrseo_elated_get_title_tag( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_transform',
							'heading'    => esc_html__( 'Title Text Transform', 'mrseo' ),
							'value'      => array_flip( mrseo_elated_get_text_transform_array( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_category',
							'heading'    => esc_html__( 'Display Category', 'mrseo' ),
							'value'      => array_flip( mrseo_elated_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_excerpt',
							'heading'    => esc_html__( 'Display Excerpt', 'mrseo' ),
							'value'      => array_flip( mrseo_elated_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'mrseo' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'excerpt_length',
							'heading'     => esc_html__( 'Excerpt Length', 'mrseo' ),
							'description' => esc_html__( 'Number of characters', 'mrseo' ),
							'dependency'  => array( 'element' => 'display_excerpt', 'value' => array( 'yes' ) ),
							'group'       => esc_html__( 'Product Info Style', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_rating',
							'heading'    => esc_html__( 'Display Rating', 'mrseo' ),
							'value'      => array_flip( mrseo_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_price',
							'heading'    => esc_html__( 'Display Price', 'mrseo' ),
							'value'      => array_flip( mrseo_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_button',
							'heading'    => esc_html__( 'Display Button', 'mrseo' ),
							'value'      => array_flip( mrseo_elated_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'mrseo' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'button_skin',
							'heading'    => esc_html__( 'Button Skin', 'mrseo' ),
							'value'      => array(
								esc_html__( 'Default', 'mrseo' ) => 'default',
								esc_html__( 'Light', 'mrseo' )   => 'light',
								esc_html__( 'Dark', 'mrseo' )    => 'dark'
							),
							'dependency' => array( 'element' => 'display_button', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'mrseo' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'shader_background_color',
							'heading'    => esc_html__( 'Shader Background Color', 'mrseo' ),
							'group'      => esc_html__( 'Product Info Style', 'mrseo' )
						)
					)
				)
			);
		}
	}
	
	public function render($atts, $content = null) {
		$default_atts = array(
			'type'					  => 'standard',
            'number_of_posts' 		  => '8',
            'space_between_items'	  => 'normal',
            'order_by' 				  => 'date',
            'order' 				  => 'ASC',
            'taxonomy_to_display' 	  => 'category',
            'taxonomy_values' 		  => '',
            'image_size'			  => 'full',
			'number_of_visible_items' => '1',
			'slider_loop'		      => 'yes',
			'slider_autoplay'		  => 'yes',
			'slider_speed'		      => '5000',
			'slider_speed_animation'  => '600',
			'slider_navigation'	      => 'yes',
			'slider_navigation_skin'  => 'default',
			'slider_pagination'	      => 'yes',
			'slider_pagination_skin'  => 'default',
			'slider_pagination_pos'   => 'bellow-slider',
            'display_title' 		  => 'yes',
            'title_tag'				  => 'h4',
            'title_transform'		  => '',
			'display_category'        => 'no',
			'display_excerpt'		  => 'no',
			'excerpt_length' 		  => '40',
			'display_rating' 		  => 'yes',
			'display_price' 		  => 'yes',
            'display_button' 		  => 'yes',
			'button_skin'             => 'default',
			'shader_background_color' => ''
        );
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['holder_data'] = $this->getProductListCarouselDataAttributes($params);
		$params['class_name'] = 'plc';
		
		$params['type'] = !empty($params['type']) ? $params['type'] : $default_atts['type'];
		
		$params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $default_atts['title_tag'];
		$params['title_styles'] = $this->getTitleStyles($params);

		$params['shader_styles'] = $this->getShaderStyles($params);

		$queryArray = $this->generateProductQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;

		$html = mrseo_elated_get_woo_shortcode_module_template_part('templates/product-list-'.$params['type'], 'product-list-carousel', '', $params);
		
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

		$carouselType = !empty($params['type']) ? 'eltdf-'.$params['type'].'-layout' : 'eltdf-standard-layout';
		
		$columnsSpace = !empty($params['space_between_items']) ? 'eltdf-'.$params['space_between_items'].'-space' : 'eltdf-normal-space';
		
		$carouselClasses = $this->getCarouselClasses($params);
		
		$holderClasses .= ' '. $carouselType . ' '. $columnsSpace . ' ' . $carouselClasses;
		
		return $holderClasses;
	}
	
	/**
	 * Generates carousel classes for product list holder
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getCarouselClasses($params){
		$carouselClasses = '';
		
		if(!empty($params['slider_navigation_skin'])) {
			$carouselClasses .= ' eltdf-plc-nav-'.$params['slider_navigation_skin'].'-skin';
		}
		
		if(!empty($params['slider_pagination_pos'])) {
			$carouselClasses .= ' eltdf-plc-pag-'.$params['slider_pagination_pos'];
		}
		
		if(!empty($params['slider_pagination_skin'])) {
			$carouselClasses .= ' eltdf-plc-pag-'.$params['slider_pagination_skin'].'-skin';
		}
		
		return $carouselClasses;
	}
	
    /**
     * Return all data that product list carousel needs
     *
     * @param $params
     * @return array
     */
    private function getProductListCarouselDataAttributes($params) {
	    $slider_data = array();
	
	    $slider_data['data-number-of-items']        = !empty($params['number_of_visible_items']) && $params['type'] !== 'simple' ? $params['number_of_visible_items'] : '1';
	    $slider_data['data-enable-loop']            = !empty($params['slider_loop']) ? $params['slider_loop'] : '';
	    $slider_data['data-enable-autoplay']        = !empty($params['slider_autoplay']) ? $params['slider_autoplay'] : '';
	    $slider_data['data-slider-speed']           = !empty($params['slider_speed']) ? $params['slider_speed'] : '5000';
	    $slider_data['data-slider-speed-animation'] = !empty($params['slider_speed_animation']) ? $params['slider_speed_animation'] : '600';
	    $slider_data['data-enable-navigation']      = !empty($params['slider_navigation']) ? $params['slider_navigation'] : '';
	    $slider_data['data-enable-pagination']      = !empty($params['slider_pagination']) ? $params['slider_pagination'] : '';
	
	    return $slider_data;
    }

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateProductQueryArray($params){
		$queryArray = array(
			'post_status' => 'publish',
			'post_type' => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page' => $params['number_of_posts'],
			'orderby' => $params['order_by'],
			'order' => $params['order']
		);

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category') {
            $queryArray['product_cat'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag') {
            $queryArray['product_tag'] = $params['taxonomy_values'];
        }

        if ($params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id') {
            $idArray = $params['taxonomy_values'];
            $ids = explode(',', $idArray);
            $queryArray['post__in'] = $ids;
        }

        return $queryArray;
	}
	
	/**
	 * Return Style for Title
	 *
	 * @param $params
	 * @return string
	 */
	public function getTitleStyles($params) {
		$styles = array();
		
		if (!empty($params['title_transform'])) {
			$styles[] = 'text-transform: '.$params['title_transform'];
		}
		
		return implode(';', $styles);
	}
	
	/**
	 * Return Style for Shader
	 *
	 * @param $params
	 * @return string
	 */
	public function getShaderStyles($params) {
		$styles = array();
		
		if (!empty($params['shader_background_color'])) {
			$styles[] = 'background-color: '.$params['shader_background_color'];
		}
		
		return implode(';', $styles);
	}
}