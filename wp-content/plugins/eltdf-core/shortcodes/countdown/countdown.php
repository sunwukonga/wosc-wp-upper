<?php
namespace ElatedCore\CPT\Shortcodes\Countdown;

use ElatedCore\Lib;

class Countdown implements Lib\ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'eltdf_countdown';

		add_action('vc_before_init', array($this, 'vcMap'));
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
		if(function_exists('vc_map')) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Elated Countdown', 'eltdf-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by ELATED', 'eltdf-core' ),
					'icon'                      => 'icon-wpb-countdown extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'       => 'dropdown',
							'param_name' => 'skin',
							'heading'    => esc_html__( 'Skin', 'eltdf-core' ),
							'value'      => array(
								esc_html__( 'Default', 'eltdf-core' ) => 'eltdf-default-skin',
								esc_html__( 'Dark', 'eltdf-core' )    => 'eltdf-dark-skin',
								esc_html__( 'Light', 'eltdf-core' )   => 'eltdf-light-skin',
							)
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'year',
							'heading'     => esc_html__( 'Year', 'eltdf-core' ),
							'value'       => array(
								'2016' => '2016',
								'2017' => '2017',
								'2018' => '2018',
								'2019' => '2019',
								'2020' => '2020'
							),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'month',
							'heading'     => esc_html__( 'Month', 'eltdf-core' ),
							'value'       => array(
								esc_html__( 'January', 'eltdf-core' )   => '1',
								esc_html__( 'February', 'eltdf-core' )  => '2',
								esc_html__( 'March', 'eltdf-core' )     => '3',
								esc_html__( 'April', 'eltdf-core' )     => '4',
								esc_html__( 'May', 'eltdf-core' )       => '5',
								esc_html__( 'June', 'eltdf-core' )      => '6',
								esc_html__( 'July', 'eltdf-core' )      => '7',
								esc_html__( 'August', 'eltdf-core' )    => '8',
								esc_html__( 'September', 'eltdf-core' ) => '9',
								esc_html__( 'October', 'eltdf-core' )   => '10',
								esc_html__( 'November', 'eltdf-core' )  => '11',
								esc_html__( 'December', 'eltdf-core' )  => '12'
							),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'day',
							'heading'     => esc_html__( 'Day', 'eltdf-core' ),
							'value'       => array(
								'1'  => '1',
								'2'  => '2',
								'3'  => '3',
								'4'  => '4',
								'5'  => '5',
								'6'  => '6',
								'7'  => '7',
								'8'  => '8',
								'9'  => '9',
								'10' => '10',
								'11' => '11',
								'12' => '12',
								'13' => '13',
								'14' => '14',
								'15' => '15',
								'16' => '16',
								'17' => '17',
								'18' => '18',
								'19' => '19',
								'20' => '20',
								'21' => '21',
								'22' => '22',
								'23' => '23',
								'24' => '24',
								'25' => '25',
								'26' => '26',
								'27' => '27',
								'28' => '28',
								'29' => '29',
								'30' => '30',
								'31' => '31',
							),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'hour',
							'heading'     => esc_html__( 'Hour', 'eltdf-core' ),
							'value'       => array(
								'0'  => '0',
								'1'  => '1',
								'2'  => '2',
								'3'  => '3',
								'4'  => '4',
								'5'  => '5',
								'6'  => '6',
								'7'  => '7',
								'8'  => '8',
								'9'  => '9',
								'10' => '10',
								'11' => '11',
								'12' => '12',
								'13' => '13',
								'14' => '14',
								'15' => '15',
								'16' => '16',
								'17' => '17',
								'18' => '18',
								'19' => '19',
								'20' => '20',
								'21' => '21',
								'22' => '22',
								'23' => '23',
								'24' => '24'
							),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'minute',
							'heading'     => esc_html__( 'Minute', 'eltdf-core' ),
							'value'       => array(
								'0'  => '0',
								'1'  => '1',
								'2'  => '2',
								'3'  => '3',
								'4'  => '4',
								'5'  => '5',
								'6'  => '6',
								'7'  => '7',
								'8'  => '8',
								'9'  => '9',
								'10' => '10',
								'11' => '11',
								'12' => '12',
								'13' => '13',
								'14' => '14',
								'15' => '15',
								'16' => '16',
								'17' => '17',
								'18' => '18',
								'19' => '19',
								'20' => '20',
								'21' => '21',
								'22' => '22',
								'23' => '23',
								'24' => '24',
								'25' => '25',
								'26' => '26',
								'27' => '27',
								'28' => '28',
								'29' => '29',
								'30' => '30',
								'31' => '31',
								'32' => '32',
								'33' => '33',
								'34' => '34',
								'35' => '35',
								'36' => '36',
								'37' => '37',
								'38' => '38',
								'39' => '39',
								'40' => '40',
								'41' => '41',
								'42' => '42',
								'43' => '43',
								'44' => '44',
								'45' => '45',
								'46' => '46',
								'47' => '47',
								'48' => '48',
								'49' => '49',
								'50' => '50',
								'51' => '51',
								'52' => '52',
								'53' => '53',
								'54' => '54',
								'55' => '55',
								'56' => '56',
								'57' => '57',
								'58' => '58',
								'59' => '59',
								'60' => '60',
							),
							'admin_label' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'month_label',
							'heading'    => esc_html__( 'Month Label', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'day_label',
							'heading'    => esc_html__( 'Day Label', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'hour_label',
							'heading'    => esc_html__( 'Hour Label', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'minute_label',
							'heading'    => esc_html__( 'Minute Label', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'second_label',
							'heading'    => esc_html__( 'Second Label', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'digit_font_size',
							'heading'    => esc_html__( 'Digit Font Size (px)', 'eltdf-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'label_font_size',
							'heading'    => esc_html__( 'Label Font Size (px)', 'eltdf-core' )
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
	 * @return string
	 */
	public function render($atts, $content = null) {
		$args = array(
			'skin'            => '',
			'year'            => '',
			'month'           => '',
			'day'             => '',
			'hour'            => '',
			'minute'          => '',
			'month_label'     => 'Months',
			'day_label'       => 'Days',
			'hour_label'      => 'Hours',
			'minute_label'    => 'Minutes',
			'second_label'    => 'Seconds',
			'digit_font_size' => '',
			'label_font_size' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['id'] = mt_rand(1000, 9999);
		$params['holder_classes'] = $this->getHolderClasses($params);

		//Get HTML from template
		$html = eltdf_core_get_shortcode_module_template_part('templates/countdown', 'countdown', '', $params);

		return $html;
	}

    /**
     * Return Classes for Countdown
     *
     * @param $params
     * @return string
     */
    private function getHolderClasses($params) {
        return !empty($params['skin']) ? $params['skin'] : '';
    }
}