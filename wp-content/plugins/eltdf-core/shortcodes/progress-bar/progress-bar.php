<?php
namespace ElatedCore\CPT\Shortcodes\ProgressBar;

use ElatedCore\Lib;

class ProgressBar implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'eltdf_progress_bar';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Elated Progress Bar', 'eltdf-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-progress-bar extended-custom-icon',
					'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'Horizontal', 'eltdf-core' )  => 'horizontal',
								esc_html__( 'Vertical', 'eltdf-core' ) => 'vertical',
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'height',
							'heading'    => esc_html__( 'Height (px)', 'eltdf-core' ),
							'dependency'  => Array( 'element' => 'type', 'value' => array( 'vertical' ) ),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'percent',
							'heading'    => esc_html__( 'Percentage', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'eltdf-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'eltdf-core' ),
							'value'       => array_flip( mrseo_elated_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'eltdf-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'color_active',
							'heading'    => esc_html__( 'Active Color', 'eltdf-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'color_inactive',
							'heading'    => esc_html__( 'Inactive Color', 'eltdf-core' )
						)
					)
				)
			);
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'percent'        => '100',
			'title'          => '',
			'title_tag'      => 'h5',
			'title_color'    => '',
			'color_active'   => '',
			'color_inactive' => '',
			'type'			 => '',
			'height'		 =>  '459'
        );
		
		$params = shortcode_atts($args, $atts);
		
		$params['percent'] = $this->getCleanPercent($params);
		$params['title_tag']          = !empty($params['title_tag']) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']       = $this->getTitleStyles($params);
		$params['holder_classes']		= $this->getHolderClasses($params);

		$params['active_bar_style']   = $this->getActiveColor($params);
		$params['inactive_bar_style'] = $this->getInactiveColor($params);
		
        //init variables
		$html = eltdf_core_get_shortcode_module_template_part('templates/progress-bar-template', 'progress-bar', '', $params);
		
        return $html;
	}


	/**
	 * Return percent without sign
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getCleanPercent($params) {
		$percent = '';
		
		if(!empty($params['percent'])) {
			$percent = mrseo_elated_filter_suffix($params['percent'],'%');
		}
		
		return $percent;
	}
	
	/**
	 * Return styles for title
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getTitleStyles($params) {
		$styles = array();
		
		if(!empty($params['title_color'])) {
			$styles[] = 'color: '.$params['title_color'];
		}
		
		return $styles;
	}

    /**
     * Return active color for active bar
     *
     * @param $params
     *
     * @return array
     */
    private function getActiveColor($params) {
        $styles = array();

        if(!empty($params['color_active'])) {
            $styles[] = 'background-color: '.$params['color_active'];
        }

        return $styles;
    }

    /**
     * Return active color for inactive bar
     *
     * @param $params
     *
     * @return array
     */
    private function getInactiveColor($params) {
        $styles = array();

        if(!empty($params['color_inactive'])) {
            $styles[] = 'background-color: '.$params['color_inactive'];
        }

		if(!empty($params['height']) && $params['type'] == 'vertical'){
			$styles[] = 'height: '.mrseo_elated_filter_px( $params['height']).'px';
		}

        return $styles;
    }

	private function getHolderClasses($params){
		$classes = array();

		if($params['type'] === 'vertical'){
			$classes[] = 'eltdf-progress-vertical';
		}

		else {
			$classes[] = 'eltdf-progress-horizontal';
		}

		return implode($classes, ' ');
	}
}