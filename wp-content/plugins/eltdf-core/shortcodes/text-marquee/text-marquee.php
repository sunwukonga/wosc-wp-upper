<?php
namespace ElatedCore\CPT\Shortcodes\TextMarquee;

use ElatedCore\Lib;

class TextMarquee implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_text_marquee';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}
	
	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 */
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Elated Text Marquee', 'eltdf-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'                      => 'icon-wpb-text-marquee extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'eltdf-core' ),
							'admin_label'=> true,
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_size',
							'heading'    => esc_html__( 'Text Size', 'eltdf-core' ),
							'description'    => esc_html__( 'Specify font size in pixels', 'eltdf-core' ),
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'eltdf-core' ),
						),
					)
				)
			);
		}
	}
	
	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 *
	 * @return string
	 */
	public function render( $atts, $content = null ) {
		$args   = array(
			'text'			=> '',
			'text_size'   	=> '',
			'text_color'    => '',
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['text_styles'] = $this->getTextStyles( $params );
		
		$html = eltdf_core_get_shortcode_module_template_part( 'templates/text-marquee', 'text-marquee', '', $params );
		
		return $html;
	}
	
	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['text_size'] ) ) {
			$styles[] = 'font-size: ' . mrseo_elated_filter_px($params['text_size']).'px';
		}

		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}
		
		return implode( ';', $styles );
	}

}