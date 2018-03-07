<?php
namespace ElatedCore\CPT\Shortcodes\InfoBox;

use ElatedCore\Lib;

class InfoBox implements Lib\ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'eltdf_info_box';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map( array(
			'name'                      => esc_html__('Info Box','eltdf-core'),
			'base'                      => $this->base,
			'category'                  => 'by ELATED',
			'icon'                      => 'icon-wpb-info-box extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Title','eltdf-core'),
						'param_name'  => 'title',
						'value'       => '',
						'save_always' => true,
						'admin_label' => true
					),
					array(
						'type' => 'textfield',
						'heading' =>  esc_html__( 'Italicize Title Words','eltdf-core'),
						'param_name' => 'italicized_words',
						'value' => '',
						'description' => esc_html__('Enter the position in the string (in number form) of the words you would like to italicize separated by comma (for example, if you would like to italicize the word "or" in "Video or Picture", you would enter the number "2")','eltdf-core' ),
					),
					array(
						'type'        => 'textarea',
						'heading'     => esc_html__('Text','eltdf-core'),
						'param_name'  => 'text',
						'value'       => '',
						'save_always' => true,
						'admin_label' => true,
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Padding','eltdf-core'),
						'param_name'  => 'padding',
						'description' => esc_html__('Enter padding in form 20px 0 0 20px','eltdf-core' ),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Background Color','eltdf-core'),
						'param_name'  => 'background_color',
						'value'       => '',
						'save_always' => true,
						'admin_label' => true,
					),
					array(
						'type'        => 'attach_image',
						'heading'     => esc_html__('Background Image','eltdf-core'),
						'param_name'  => 'background_image',
						'value'       => '',
						'save_always' => true,
						'admin_label' => true,
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Skin','eltdf-core'),
						'param_name'  => 'skin',
						'value'       => array(
							esc_html__('Dark','eltdf-core') => 'dark',
							esc_html__('Light' ,'eltdf-core') => 'light'
						),
						'save_always' => true,
						'admin_label' => true,
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Link','eltdf-core'),
						'param_name'  => 'link',
						'value'       => '',
						'save_always' => true,
						'admin_label' => true,
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Link Text','eltdf-core'),
						'param_name'  => 'link_text',
						'value'       => 'Read More',
						'save_always' => true,
						'dependency'  => array( 'element' => 'link', 'not_empty' => true )
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Target','eltdf-core'),
						'param_name'  => 'target',
						'value'       => array(
							esc_html__('Same Window','eltdf-core') => '',
							esc_html__('New Window' ,'eltdf-core') => '_blank'
						),
						'save_always' => true,
						'admin_label' => true,
						'dependency'  => array( 'element' => 'link', 'not_empty' => true )
					),
				)
			)
		) );
	}

	public function render( $atts, $content = null ) {
		$defaultAtts = array(
			'title'                     => '',
			'link'               		=> '',
			'link_text'               	=> 'Read More',
			'target'             		=> '',
			'text'                      => '',
			'italicized_words'			=> '',
			'padding'					=> '',
			'background_color'			=> '',
			'background_image'			=>'',
			'skin'						=> ''
		);

		$defaultAtts = array_merge( $defaultAtts, mrseo_elated_icon_collections()->getShortcodeParams() );
		$params      = shortcode_atts( $defaultAtts, $atts );

		$params['link_params']  = $this->getLinkParams( $params );
		$params['holder_styles']  = $this->getHolderStyles( $params );
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['title_italicized'] = $this->getTitleItalicized($params);
		$params['background_image'] = $this->getBackgroundImage($params);
		$params['inner_table_style'] = $this->getInnerTableStyles($params);
		$params['button_parameters'] = $this->getButtonParameters($params);

		return eltdf_core_get_shortcode_module_template_part( 'templates/info-box-template', 'info-box', 'simple', $params );
	}



	private function getLInkParams( $params ) {
		$linkParams = array();

		if ( ! empty( $params['link'] ) ) {
			$linkParams['link'] = $params['link'];
		}

		if ( ! empty( $params['target'] ) ) {
			$linkParams['target'] = $params['target'];
		}

		return $linkParams;
	}
	/**
	 * Get Background Image
	 *
	 * @param $params
	 * @return string
	 */
	private function getBackgroundImage($params){

		$background_image_style = '';
		$background_image = wp_get_attachment_image_src( $params['background_image'], 'full' );
		if($background_image && $background_image !==''){
			$background_image_style = 'background-image: url('.$background_image[0].')';
		}
		return $background_image_style;

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

	private function getHolderStyles( $params ) {
		$styles = array();

		if ( $params['background_color'] !== '' ) {
			$styles[] = 'background-color: ' . $params['background_color'];
		}

		return $styles;
	}

	private function getInnerTableStyles( $params ) {
		$styles = array();

		if ( $params['padding'] !== '' ) {
			$styles[] = 'padding: ' . $params['padding'];
		}

		return $styles;
	}

	private function getHolderClasses($params){
		$classes = array();

		$classes [] = 'eltdf-info-box-holder';

		switch ($params['skin']){

			case 'dark':
				$classes [] = 'eltdf-ib-dark';
				break;

			case 'light':
				$classes [] = 'eltdf-ib-light';
				break;

			default:
				break;
		}

		return implode(' ',$classes);

	}


	private function getButtonParameters($params) {
		$button_params_array = array();
		
		if(!empty($params['link'])) {
			$button_params_array['text'] = $params['link_text'];
			$button_params_array['type'] = 'simple';
			$button_params_array['link'] = $params['link'];
			$button_params_array['icon_pack'] = 'font_awesome';
			$button_params_array['fa_icon'] = 'fa-long-arrow-right';
			$button_params_array['simple_hover_type'] = 'unveiling';
		}

		return $button_params_array;
	}

}