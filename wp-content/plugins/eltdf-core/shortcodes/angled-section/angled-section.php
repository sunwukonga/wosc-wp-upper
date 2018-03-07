<?php
namespace ElatedCore\CPT\Shortcodes\AngledSection;

use ElatedCore\Lib;

class AngledSection implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_angled_section';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'      => esc_html__( 'Elated Angled Section', 'eltdf-core' ),
					'base'      => $this->base,
					'icon'      => 'icon-wpb-angled-section extended-custom-icon',
					'category'  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'as_parent' => array('except' => 'vc_row'),
					'js_view'   => 'VcColumnView',
					'params'    => array(
						array(
							'type' => 'dropdown',
							'param_name' => 'content_position',
							'heading' => esc_html__('Content Position','eltdf-core'),
							'value' => array(
								esc_html__('Right','eltdf-core') => 'right',
								esc_html__('Left','eltdf-core') => 'left',
							)
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'background_color',
							'heading'    => esc_html__('Background Color', 'eltdf-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'background_image',
							'heading'     => esc_html__('Background Image', 'eltdf-core' ),
							'description' => esc_html__('Select image from media library', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'angled_background_color',
							'heading'    => esc_html__('Content Background Color', 'eltdf-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'angled_background_image',
							'heading'     => esc_html__('Content Background Image', 'eltdf-core' ),
							'description' => esc_html__('Select image from media library', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'angled_padding',
							'heading'    => esc_html__('Content Padding', 'eltdf-core' ),
							'description' => esc_html__('Please insert padding in format 0px 10px 0px 10px', 'eltdf-core')
						),
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'content_position' => 'right',
			'background_color' 	=> '',
			'background_image'	=> '',
			'angled_background_color' 	=> '',
			'angled_background_image'	=> '',
			'angled_padding' => ''
		);
		
		$params = shortcode_atts($args, $atts);

		$params['content'] = $content;
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['holder_style'] = $this->getHolderStyle($params);
		$params['angled_style'] = $this->getAngledStyle($params);
		$params['angled_holder_style'] = $this->getAngledHolderStyle($params);
		
		$html = eltdf_core_get_shortcode_module_template_part('templates/angled-section-template', 'angled-section', '', $params);

		return $html;
	}


	private function getHolderClasses($params){
		$classes = '';

		if ($params['content_position'] !== ''){
			$classes[] = 'eltdf-angled-content-'.$params['content_position'];
		}

		return implode(' ', $classes);
	}

	private function getHolderStyle($params){
		$style = array();

		if ($params['background_image'] !== ''){
			$id = $params['background_image'];
			$image_src = wp_get_attachment_image_src($id, 'full');
			
			$style[] = 'background-image: url('.$image_src[0].')';
		}

		if ($params['background_color'] !== ''){
			$style[] = 'background-color: '.$params['background_color'];
		}

		return implode(';', $style);
	}

	private function getAngledStyle($params){
		$style = array();

		if ($params['angled_background_image'] !== ''){
			$id = $params['angled_background_image'];
			$image_src = wp_get_attachment_image_src($id, 'full');
			
			$style[] = 'background-image: url('.$image_src[0].')';
		}

		if ($params['angled_background_color'] !== ''){
			$style[] = 'background-color: '.$params['angled_background_color'];
		}

		return implode(';', $style);
	}

	private function getAngledHolderStyle($params){
		$style = array();

		if ($params['angled_padding'] !== ''){
			$style[] = 'padding: '.$params['angled_padding'];
		}

		return implode(';', $style);
	}
}
