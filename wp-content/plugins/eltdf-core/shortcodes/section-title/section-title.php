<?php
namespace ElatedCore\CPT\Shortcodes\SectionTitle;

use ElatedCore\Lib;

class SectionTitle implements Lib\ShortcodeInterface {
	private $base; 
	
	function __construct() {
		$this->base = 'eltdf_section_title';

		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	/**
	* Returns base for shortcode
	* @return string
	 */
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Elated Section Title', 'eltdf-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'                      => 'icon-wpb-section-title extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'position',
							'heading'     => esc_html__( 'Horizontal Position', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Default', 'eltdf-core' ) => '',
								esc_html__( 'Left', 'eltdf-core' )    => 'left',
								esc_html__( 'Center', 'eltdf-core' )  => 'center',
								esc_html__( 'Right', 'eltdf-core' )   => 'right'
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'holder_padding',
							'heading'    => esc_html__( 'Holder Side Padding (px or %)', 'eltdf-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'eltdf-core' ),
							'admin_label' => true
						),
						array(
							'type' => 'textfield',
							'heading' =>  esc_html__( 'Italicize Words','eltdf-core'),
							'param_name' => 'italicized_words',
							'value' => '',
							'description' => esc_html__(  'Enter the position in the string (in number form) of the words you would like to italicize separated by comma (for example, if you would like to italicize the word "or" in "Video or Picture", you would enter the number "2")','eltdf-core' ),
						),
						array(
							'type' => 'dropdown',
							'param_name' => 'display_separator',
							'heading' => esc_html__( 'Display Separator','eltdf-core'),
							'description' => '',
							'value' => array(
								esc_html__( 'Yes','eltdf-core') => 'yes',
								esc_html__( 'No','eltdf-core') => 'no'
							),
							'admin_label' => true,
							'save_always' => true,
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'eltdf-core' ),
							'value'       => array_flip( mrseo_elated_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true ),
						    'group'       => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'eltdf-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true ),
						    'group'       => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'separator_color',
							'heading'    => esc_html__( 'Separator Color', 'eltdf-core' ),
							'dependency' => array( 'element' => 'display_separator', 'value' => array('yes')),
						    'group'       => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'subtitle',
							'heading'    => esc_html__( 'Subtitle', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'subtitle_color',
							'heading'    => esc_html__( 'Subtitle Color', 'eltdf-core' ),
							'dependency' => array( 'element' => 'subtitle', 'not_empty' => true ),
						    'group'       => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'eltdf-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
						    'group'       => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_font_size',
							'heading'    => esc_html__( 'Text Font Size (px)', 'eltdf-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
						    'group'       => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_line_height',
							'heading'    => esc_html__( 'Text Line Height (px)', 'eltdf-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
						    'group'       => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'text_font_weight',
							'heading'     => esc_html__( 'Text Font Weight', 'eltdf-core' ),
							'value'       => array_flip( mrseo_elated_get_font_weight_array( true ) ),
							'save_always' => true,
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
						    'group'       => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_margin',
							'heading'    => esc_html__( 'Text Top Margin (px)', 'eltdf-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true ),
						    'group'       => esc_html__( 'Design Options', 'eltdf-core' )
						)
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'position'         => '',
			'holder_padding'   => '',
			'title'            => '',
			'title_tag'        => 'h2',
			'title_color'      => '',
			'text'             => '',
			'text_color'       => '',
			'text_font_size'   => '',
			'text_line_height' => '',
			'text_font_weight' => '',
			'text_margin'      => '',
			'subtitle'		   => '',
			'subtitle_color'   => '',
			'italicized_words' =>'',
			'display_separator'=>'',
			'separator_color'  => ''
        );
		$params = shortcode_atts($args, $atts);
		
		$params['holder_styles'] = $this->getHolderStyles($params);
		$params['title_tag'] = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles'] = $this->getTitleStyles($params);
		$params['separator_styles'] = $this->getSeparatorStyles($params);
		$params['subtitle_styles'] = $this->getSubtitleStyles($params);
		$params['text_styles'] = $this->getTextStyles($params);
		$params['title_italicized'] = $this->getTitleItalicized($params);
		$params['separator_class']= $this->getSeparatorClass($params);

		$html = eltdf_core_get_shortcode_module_template_part('templates/section-title', 'section-title', '', $params);
		
		return $html;
	}
	
	private function getHolderStyles($params) {
		$styles = array();
		
		if (!empty($params['holder_padding'])) {
			$styles[] = 'padding: 0 '.$params['holder_padding'];
		}
		
		if (!empty($params['position'])) {
			$styles[] = 'text-align: '.$params['position'];
		}
		
		return implode(';', $styles);
	}
	
	private function getTitleStyles($params) {
		$styles = array();
		
		if (!empty($params['title_color'])) {
			$styles[] = 'color: '.$params['title_color'];
		}
		
		return implode(';', $styles);
	}

	private function getSeparatorStyles($params) {
		$styles = array();
		
		if (!empty($params['separator_color'])) {
			$styles[] = 'background-color: '.$params['separator_color'];
		}
		
		return implode(';', $styles);
	}

	private function getSubtitleStyles($params) {
		$styles = array();
		
		if (!empty($params['subtitle_color'])) {
			$styles[] = 'color: '.$params['subtitle_color'];
		}
		
		return implode(';', $styles);
	}
	
	private function getTextStyles($params) {
		$styles = array();
		
		if (!empty($params['text_color'])) {
			$styles[] = 'color: '.$params['text_color'];
		}
		
		if (!empty($params['text_font_size'])) {
			$styles[] = 'font-size: '.mrseo_elated_filter_px($params['text_font_size']).'px';
		}
		
		if (!empty($params['text_line_height'])) {
			$styles[] = 'line-height: '.mrseo_elated_filter_px($params['text_line_height']).'px';
		}
		
		if (!empty($params['text_font_weight'])) {
			$styles[] = 'font-weight: '.$params['text_font_weight'];
		}
		
		if (!empty($params['text_margin'])) {
			$styles[] = 'margin-top: '.mrseo_elated_filter_px($params['text_margin']).'px';
		}
		
		return implode(';', $styles);
	}


	/**
	 * Return Style
	 *
	 * @param $params
	 * @return string
	 */
	private function getTitleItalicized($params) {
		$title_array = explode(' ', $params['title']);
		$words = explode(',', $params['italicized_words']);

		if (is_array($title_array) && count($title_array) && is_array($words) && count($words)){
			foreach ($words as $number) {
				if (is_numeric($number) && count($title_array) >= $number){
					$title_array[$number - 1] = '<span class="eltdf-section-ital">'.$title_array[$number - 1].'</span>';
				}
			}
		}

		return implode(' ', $title_array);
	}

	private function getSeparatorClass($params){
		$class='';

		if($params['display_separator']!=='' && isset($params['display_separator'])){

			switch($params['display_separator']){

				case 'yes':
					$class = 'eltdf-enable-separator';
					break;
				default:
					$class = 'eltdf-disable-separator';
					break;
			}

		}
		return $class;
	}
}