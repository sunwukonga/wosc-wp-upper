<?php
namespace ElatedCore\CPT\Shortcodes\Accordion;

use ElatedCore\Lib;

class Accordion implements Lib\ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'eltdf_accordion';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return	$this->base;
	}

	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Elated Accordion', 'eltdf-core' ),
					'base'                    => $this->base,
					'as_parent'               => array( 'only' => 'eltdf_accordion_tab' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'                    => 'icon-wpb-accordion extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'el_class',
							'heading'    => esc_html__( 'Custom CSS Class', 'eltdf-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'style',
							'heading'    => esc_html__( 'Style', 'eltdf-core' ),
							'value'      => array(
								esc_html__( 'Accordion', 'eltdf-core' ) => 'accordion',
								esc_html__( 'Toggle', 'eltdf-core' )    => 'toggle'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'layout',
							'heading'    => esc_html__( 'Layout', 'eltdf-core' ),
							'value'      => array(
								esc_html__( 'Boxed', 'eltdf-core' )  => 'boxed',
								esc_html__( 'Simple', 'eltdf-core' ) => 'simple'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'background_skin',
							'heading'    => esc_html__( 'Background Skin', 'eltdf-core' ),
							'value'      => array(
								esc_html__( 'Default', 'eltdf-core' ) => '',
								esc_html__( 'White', 'eltdf-core' )   => 'white'
							),
							'dependency' => array( 'element' => 'layout', 'value' => array( 'boxed' ) )
						)
					)
				)
			);
		}
	}
	
	public function render($atts, $content = null) {
		$default_atts = array(
			'el_class'        => '',
			'style'           => 'accordion',
			'layout'          => 'boxed',
			'background_skin' => ''
		);
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);

		$params['acc_class'] = $this->getAccordionClasses($params);
		$params['content'] = $content;

		$output = '';

		$output .= eltdf_core_get_shortcode_module_template_part('templates/accordion-holder-template','accordions', '', $params);

		return $output;
	}

	/**
	   * Generates accordion classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getAccordionClasses($params){
		$holder_classes = array('eltdf-ac-default');

		switch($params['style']) {
            case 'toggle':
                $holder_classes[] = 'eltdf-toggle';
                break;
            default:
	            $holder_classes[] = 'eltdf-accordion';
                break;
        }
		
		if (!empty($params['layout'])) {
			$holder_classes[] = 'eltdf-ac-'.esc_attr($params['layout']);
		}
		
		if (!empty($params['background_skin'])) {
			$holder_classes[] = 'eltdf-'.esc_attr($params['background_skin']).'-skin';
		}

		if (!empty($params['el_class'])) {
			$holder_classes[] = esc_attr($params['el_class']);
		}

        return implode(' ', $holder_classes);
	}
}
