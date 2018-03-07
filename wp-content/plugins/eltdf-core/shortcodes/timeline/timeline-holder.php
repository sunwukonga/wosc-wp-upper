<?php
namespace ElatedCore\CPT\Shortcodes\TimelineHolder;

use ElatedCore\Lib;

class TimelineHolder implements Lib\ShortcodeInterface {
    private $base;

    function __construct() {
        $this->base = 'eltdf_timeline_holder';
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
                    'name'            => esc_html__( 'Elated Timeline Holder', 'eltdf-core' ),
                    'base'            => $this->getBase(),
                    'as_parent'       => array( 'only' => 'eltdf_timeline_item' ),
                    'content_element' => true,
                    'category'        => esc_html__( 'by ELATED', 'eltdf-core' ),
                    'icon'              => 'icon-wpb-timeline-holder extended-custom-icon',
                    'js_view'         => 'VcColumnView',
                    'params'          => array(
                        array(
                            'type'        => 'dropdown',
                            'param_name'  => 'skin',
                            'heading'     => esc_html__( 'Skin', 'eltdf-core' ),
                            'value'       => array(
                                esc_html__( 'Light', 'eltdf-core' )   => 'light',
                                esc_html__( 'Dark', 'eltdf-core' ) => 'dark',
                            ),
                            'save_always' => true
                        )
                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {
        $args = array(
            'skin' => ''
        );

        $params  = shortcode_atts($args, $atts);
        extract($params);

        $params['holder_classes'] = $this->getHolderClasses($params);
        $params['content']        = $content;
        $params['data_attrs']       = $this->getDataAttrs($params);

        $output = '';

        $output .= eltdf_core_get_shortcode_module_template_part('templates/timeline-holder-template','timeline', '', $params);

        return $output;
    }

    /**
     * Generates holder classes
     *
     * @param $params
     *
     * @return string
     */
    private function getHolderClasses($params){

        $holder_classes = array();

        $holder_classes[] = 'clearfix';

        $holder_classes[] = !empty($params['skin']) ? 'eltdf-timeline-'.esc_attr($params['skin']) : 'eltdf-timeline-dark';

        return implode(' ', $holder_classes);
    }

    private function getDataAttrs($params){

        $data_attrs = array();

        return  $data_attrs;
    }
}