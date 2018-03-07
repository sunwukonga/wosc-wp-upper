<?php
namespace ElatedCore\CPT\Shortcodes\ProcessHolder;

use ElatedCore\Lib;

/**
 * Class Tabs
 * @package eltdf-coreElated\Modules\Process
 */
class ProcessHolder implements Lib\ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'eltdf_process_holder';
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
     *
     * @see eltdf_core_get_carousel_slider_array_vc()
     */
    public function vcMap() {

        vc_map(array(
            'name' =>esc_html__( 'Process Holder','eltdf-core'),
            'base' => $this->getBase(),
            'as_parent' => array('only' => 'eltdf_process'),
            'content_element' => true,
            'category' => 'by ELATED',
            'icon' => 'icon-wpb-process-holder extended-custom-icon',
            'show_settings_on_create' => true,
            'js_view' => 'VcColumnView',
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Skin','eltdf-core'),
                    'param_name' => 'skin',
                    'value' => array(
                        esc_html__('Dark' ,'eltdf-core')     => 'dark',
                        esc_html__('Light','eltdf-core')      => 'light'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Loading Animation','eltdf-core'),
                    'param_name' => 'loading_animation_effect',
                    'value' => array(
                        esc_html__('Yes' ,'eltdf-core')     => 'yes',
                        esc_html__('No','eltdf-core')      => 'no'
                    ),
                    'save_always' => true,
                    'admin_label' => true,
                )
            )
        ));
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
            'skin' => '',
            'loading_animation_effect' => 'yes',
        );

        $params = shortcode_atts($args, $atts);
        $params['content'] = $content;
        $params['classes'] = 'eltdf-processes-holder eltdf-ph-resp eltdf-process-'.$params['skin'].' clearfix eltdf-loading-animation-'. $params['loading_animation_effect'] ;

        $html = eltdf_core_get_shortcode_module_template_part('templates/process-holder-template', 'process', '', $params);

        return $html;


    }

}