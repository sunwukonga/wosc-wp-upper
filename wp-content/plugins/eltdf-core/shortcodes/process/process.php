<?php
namespace ElatedCore\CPT\Shortcodes\Process;

use ElatedCore\Lib;

class Process implements Lib\ShortcodeInterface {

    private $base;

    function __construct() {
        $this->base = 'eltdf_process';
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

        vc_map(array(
            'name' =>esc_html__( 'Process','eltdf-core'),
            'base' => $this->getBase(),
            'as_child' => array('only' => 'eltdf_process_holder'),
            'content_element' => true,
            'category' => 'by ELATED',
            'icon' => 'icon-wpb-process-item extended-custom-icon',
            'show_settings_on_create' => true,
            'params' => array_merge(
                array(
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'type',
                        'heading' => esc_html__('Type','eltdf-core'),
                        'value' => array(
                            esc_html__('Icons in Process','eltdf-core') => 'process_icons',
                            esc_html__('Text in Process','eltdf-core') => 'process_text',
                        ),
                        'admin_label' => true,
                        'save_always' => true
                    )
                ),
                mrseo_elated_icon_collections()->getVCParamsArray(array('element' => 'type', 'value' => 'process_icons')),
                array(
                    array(
                        'type' => 'textfield',
                        'param_name' => 'text_in_process',
                        'heading' => esc_html__('Text in Process','eltdf-core'),
                        'admin_label' => true,
                        'dependency'  => array('element' => 'type', 'value' => 'process_text')
                    ),
                    array(
                        'type' => 'attach_image',
                        'param_name' => 'process_bckg_image',
                        'heading' => esc_html__('Process Background Image','eltdf-core'),
                        'admin_label' => true,
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'title',
                        'heading' => esc_html__('Title','eltdf-core'),
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'text',
                        'heading' => esc_html__('Text','eltdf-core'),
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'hover_type',
                        'heading' => esc_html__('Hover Type','eltdf-core'),
                        'admin_label' => true,
                        'value' => array(
                            ''=>'',
                            esc_html__('Background Image','eltdf-core') => 'background_image_hover',
                            esc_html__('Background Color ','eltdf-core') => 'background_color_hover',
                        ),
                        'dependency'  => array('element' => 'type', 'value' => 'process_text')
                    ),
                    array(
                        'type' => 'attach_image',
                        'param_name' => 'background_image',
                        'heading' => esc_html__('Background Image','eltdf-core'),
                        'admin_label' => true,
                        'dependency'  => array('element' => 'hover_type', 'value' => 'background_image_hover')
                    ),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     => esc_html__('Background Color','eltdf-core'),
                        'param_name'  => 'background_color',
                        'admin_label' => true,
                        'dependency'  => array('element' => 'hover_type', 'value' => 'background_color_hover'),
                        'save_always '=>  true
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'link',
                        'heading' =>esc_html__( 'Link','eltdf-core'),
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'target',
                        'heading' => esc_html__('Target','eltdf-core'),
                        'admin_label' => true,
                        'value' => array(
                            esc_html__('Self','eltdf-core') => '_self',
                            esc_html__('Blank','eltdf-core') => '_blank',
                        ),
                        'dependency' => array('element' => 'type', 'not_empty' => true)
                    ),
                    array(
                        'type' => 'textfield',
                        'param_name' => 'icon_size',
                        'heading' => esc_html__('Icon Size','eltdf-core'),
                        'group' => esc_html__('Design Group','eltdf-core'),
                        'admin_label' => true
                    )
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
            'type' => '',
            'text_in_process' => '',
            'background_image' => '',
            'link' => '',
            'process_bckg_image'    =>'',
            'target' => 'blank',
            'title' => '',
            'text' => '',
            'icon_size' => '38',
            'background_color'=>'',
            'hover_type'=>'',

        );

        $args = array_merge($args, mrseo_elated_icon_collections()->getShortcodeParams());
        $params = shortcode_atts($args, $atts);
        extract($params);

        if($type === 'process_icons'){
            $params['icon'] = $this->getProcessIcon($params);
        }
        $params['type_class'] = $this->getProcessType($params);
        $params['background_image_style'] = $this->getBackgroundImage($params);
        $params['content_background_image_style'] = $this->getBackgroundImageContent($params);
        $params['background_color_hover']=$this->getBackgroundHoverColor($params);
        $params['process_classes']=$this->getProcessClasses($params);

        $html = eltdf_core_get_shortcode_module_template_part('templates/process-template', 'process', '', $params);

        return $html;

    }

    /**
     * Get Icon
     *
     * @param $params
     * @return mixed|string
     */
    private function getProcessIcon($params) {

        $iconPack = $params['icon_pack'];
        $iconParam = mrseo_elated_icon_collections()->getIconCollectionParamNameByKey($iconPack);

        $icon = $params[$iconParam];

        $icon_atts = array(
            'icon_pack' => $iconPack,
            $iconParam => $icon,
            'custom_size' => $params['icon_size']
        );

        return mrseo_elated_execute_shortcode('eltdf_icon', $icon_atts);

    }

    /**
     * Get Type Class
     *
     * @param $params
     * @return string
     */
    private function getProcessType($params) {

        $type_class = '';
        if(isset($params['type']) && $params['type'] !== ''){
            if($params['type'] === 'process_icons'){
                $type_class = 'eltdf-process-with-icon';
            }elseif($params['type'] === 'process_text'){
                $type_class = 'eltdf-process-with-text';
            }
        }

        return $type_class;

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
     * Get Background Image
     *
     * @param $params
     * @return string
     */
    private function getBackgroundImageContent($params){

        $background_image_style = '';
        $background_image = wp_get_attachment_image_src( $params['process_bckg_image'], 'full' );
        if($background_image && $background_image !==''){
            $background_image_style = 'background-image: url('.$background_image[0].');';
            $background_image_style .= ' background-color: transparent;';
        }
        return $background_image_style;

    }

    private function getBackgroundHoverColor($params){
        $background_color = '';

        if ( isset($params['background_color']) && $params['background_color'] !== '' ) {

            $background_color = 'background-color: '.$params['background_color'];
        }

        return $background_color;
    }


    private function getProcessClasses($params){
        $processClasses []='';

        switch($params['hover_type']){
            case 'background_image_hover':
                $processClasses [] = 'eltdf-process-image-hover';
                break;
            case 'background_color_hover':
                $processClasses [] = 'eltdf-process-color-hover';
                break;
            default:
                break;
        }

        return implode(' ',$processClasses);
    }

}