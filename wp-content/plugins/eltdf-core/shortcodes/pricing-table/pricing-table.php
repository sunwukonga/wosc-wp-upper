<?php
namespace ElatedCore\CPT\Shortcodes\PricingTable;

use ElatedCore\Lib;

class PricingTable implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_pricing_table';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Elated Pricing Table', 'eltdf-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-pricing-table extended-custom-icon',
					'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'allowed_container_element' => 'vc_row',
					'as_child'                  => array( 'only' => 'eltdf_pricing_tables' ),
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'eltdf-core' ),
							'value'       => esc_html__( 'Basic Plan', 'eltdf-core' ),
							'save_always' => true
						),
						array(
							'type'		=> 'dropdown',
							'param_name'=> 'skin',
							'heading'	=> esc_html__('Skin', 'eltdf-core'),
							'value'		=> array(
								esc_html__('Default','eltdf-core') => '',
								esc_html__('Light','eltdf-core') => 'light',
								esc_html__('Dark','eltdf-core') => 'dark',
							),
						    'group'      => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'content_background_color',
							'heading'    => esc_html__( 'Content Background Color', 'eltdf-core' ),
							'dependency' => array('element' => 'skin', 'value' => array('')),
						    'group'      => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'content_background_image',
							'heading'    => esc_html__( 'Content Background Image', 'eltdf-core' ),
						    'group'      => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'eltdf-core' ),
							'dependency' => array('element' => 'skin', 'value' => array('')),
						    'group'      => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'separator_color',
							'heading'    => esc_html__( 'Separator Below Title Color', 'eltdf-core' ),
							'dependency' => array('element' => 'skin', 'value' => array('')),
						    'group'      => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'price',
							'heading'    => esc_html__( 'Price', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'price_color',
							'heading'    => esc_html__( 'Price Color', 'eltdf-core' ),
							'dependency' => array('element' => 'skin', 'value' => array('')),
						    'group'      => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'currency',
							'heading'     => esc_html__( 'Currency', 'eltdf-core' ),
							'description' => esc_html__( 'Default mark is $', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'currency_color',
							'heading'    => esc_html__( 'Currency Color', 'eltdf-core' ),
							'dependency' => array('element' => 'skin', 'value' => array('')),
						    'group'      => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'price_period',
							'heading'     => esc_html__( 'Price Period', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'price_period_color',
							'heading'    => esc_html__( 'Price Period Color', 'eltdf-core' ),
							'dependency' => array('element' => 'skin', 'value' => array('')),
						    'group'      => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'button_text',
							'heading'     => esc_html__( 'Button Text', 'eltdf-core' ),
							'value'       => esc_html__( 'BUY NOW', 'eltdf-core' ),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link',
							'heading'    => esc_html__( 'Button Link', 'eltdf-core' ),
							'dependency' => array( 'element' => 'button_text', 'not_empty' => true )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'button_type',
							'heading'     => esc_html__( 'Button Type', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Solid', 'eltdf-core' )   => 'solid',
								esc_html__( 'Solid Dark', 'eltdf-core' )   => 'solid-dark'
							),
							'save_always' => true,
							'dependency' => array('element' => 'skin', 'value' => array('')),
						    'group'      => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'button_hover_type',
							'heading'     => esc_html__( 'Button Hover Type', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Default', 'eltdf-core' )   => '',
								esc_html__( 'White', 'eltdf-core' )   => 'white',
							),
							'save_always' => true,
							'dependency' => array('element' => 'skin', 'value' => array('')),
						    'group'      => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'textarea_html',
							'param_name' => 'content',
							'heading'    => esc_html__( 'Content', 'eltdf-core' ),
							'value'      => '<li>content content content</li><li>content content content</li><li>content content content</li>'
						)
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'skin' 					=> '',
			'content_background_color' => '',
			'content_background_image' => '',
			'title'         		=> '',
			'title_color'           => '',
			'separator_color'   	=> '',
			'price'         		=> '100',
			'price_color'           => '',
			'currency'      		=> '$',
			'currency_color'        => '',
			'price_period'  		=> '',
			'price_period_color'    => '',
			'button_text'   		=> '',
			'link'          		=> '',
			'button_type'           => '',
			'button_hover_type'     => '',
		);
		
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html = '';
		
		$params['content']= preg_replace('#^<\/p>|<p>$#', '', $content); // delete p tag before and after content
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['holder_styles'] = $this->getHolderStyles($params);
		$params['title_styles'] = $this->getTitleStyles($params);
		$params['separator_params'] = $this->getSeparatorStyles($params);
		$params['price_styles'] = $this->getPriceStyles($params);
		$params['currency_styles'] = $this->getCurrencyStyles($params);
		$params['price_period_styles'] = $this->getPricePeriodStyles($params);
		$params['button_params'] = $this->getButtonParams($params);

		$html .= eltdf_core_get_shortcode_module_template_part('templates/pricing-table-template', 'pricing-table', '', $params);
		
		return $html;
	}

	private function getHolderClasses($params) {
		$classes = array();
		
		if ($params['skin'] !== '') {
			$classes[] = 'eltdf-pt-'.$params['skin'];
		}
		
		return implode(' ', $classes);
	}

	private function getHolderStyles($params) {
		$itemStyle = array();
		
		if (!empty($params['content_background_color'])) {
			$itemStyle[] = 'background-color: '.$params['content_background_color'];
		}

		if ($params['content_background_image'] !== ''){
			$id = $params['content_background_image'];
			$image_src = wp_get_attachment_image_src($id, 'full');
			
			$itemStyle[] = 'background-image: url('.$image_src[0].')';
		}

		return implode(';', $itemStyle);
	}
	
	private function getTitleStyles($params) {
		$itemStyle = array();

		if (!empty($params['title_color'])) {
            $itemStyle[] = 'color: '.$params['title_color'];
        }

		return implode(';', $itemStyle);
	}

	private function getSeparatorStyles($params) {
		$itemStyle = array();

        if(!empty($params['separator_color'])) {
	        $itemStyle['color'] = $params['separator_color'];
        }

		return $itemStyle;
	}
	
	private function getPriceStyles($params) {
		$itemStyle = array();
		
		if (!empty($params['price_color'])) {
			$itemStyle[] = 'color: '.$params['price_color'];
		}
		
		return implode(';', $itemStyle);
	}
	
	private function getCurrencyStyles($params) {
		$itemStyle = array();
		
		if (!empty($params['currency_color'])) {
			$itemStyle[] = 'color: '.$params['currency_color'];
		}
		
		return implode(';', $itemStyle);
	}
	
	private function getPricePeriodStyles($params) {
		$itemStyle = array();
		
		if (!empty($params['price_period_color'])) {
			$itemStyle[] = 'color: '.$params['price_period_color'];
		}
		
		return implode(';', $itemStyle);
	}

	private function getButtonParams($params){
		$button_params = array();
		$button_params['size'] = 'medium';

		if ($params['link'] !== ''){
			$button_params['link'] = $params['link'];
		}

		if ($params['button_text'] !== ''){
			$button_params['text'] = $params['button_text'];
		}

		if ($params['button_type'] !== ''){
			$button_params['type'] = $params['button_type'];
		}

		if ($params['button_hover_type'] !== ''){
			$button_params['custom_class'] = 'eltdf-pt-btn-hover-'.$params['button_hover_type'];
		}

		return $button_params;
	}
}