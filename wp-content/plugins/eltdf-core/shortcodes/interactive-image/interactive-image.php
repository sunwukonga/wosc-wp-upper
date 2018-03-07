<?php
namespace ElatedCore\CPT\Shortcodes\InteractiveImage;

use ElatedCore\Lib;

class InteractiveImage implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'eltdf_interactive_image';
		
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
					'name'                      => esc_html__( 'Elated Interactive Image', 'eltdf-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'                      => 'icon-wpb-interactive-image extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'       => 'dropdown',
							'param_name' => 'layout_type',
							'heading'    => esc_html__( 'Layout Type', 'eltdf-core' ),
							'value'      => array(
								esc_html__( 'With Title', 'eltdf-core' ) => 'with-title',
								esc_html__( 'Without Title', 'eltdf-core' )  => 'without-title',
							),
							'save_always'=> true,
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Image', 'eltdf-core' ),
							'description' => esc_html__( 'Select image from media library', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'image_title',
							'heading'    => esc_html__( 'Image Title', 'eltdf-core' ),
							'dependency' => array( 'element' => 'layout_type', 'value' => array( 'with-title' ) ),
							'admin_label'=> true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link',
							'heading'    => esc_html__( 'Link', 'eltdf-core' ),
							'admin_label'=> true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'link_target',
							'heading'    => esc_html__( 'Link Target', 'eltdf-core' ),
							'value'      => array_flip( mrseo_elated_get_link_target_array() ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true ),
							'save_always'=> true,
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'eltdf-core' ),
							'dependency' => array( 'element' => 'image_title', 'not_empty' => true ),
							'group'      => esc_html__( 'Design Options', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_box_background_color',
							'heading'    => esc_html__( 'Title Box Background Color', 'eltdf-core' ),
							'dependency' => array( 'element' => 'image_title', 'not_empty' => true ),
							'group'      => esc_html__( 'Design Options', 'eltdf-core' )
						)
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
			'layout_type'		=> 'with-title',
			'image'         	=> '',
			'image_title'     	=> '',
			'link'              => '',
			'link_target'       => '_self',
			'title_color'        => '',
			'title_box_background_color'   => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']   = $this->getHolderClasses( $params );
		$params['title_styles']     = $this->getTitleStyles( $params );
		$params['title_holder_styles'] = $this->getTitleHolderStyles( $params );
		
		$html = eltdf_core_get_shortcode_module_template_part( 'templates/interactive-image', 'interactive-image', '', $params );
		
		return $html;
	}
	
	/**
	 * Generates holder classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = 'eltdf-ii-' . $params['layout_type'] ;
		
		return implode( ' ', $holderClasses );
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTitleHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_box_background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['title_box_background_color'];
		}
		
		return implode( ';', $styles );
	}
}