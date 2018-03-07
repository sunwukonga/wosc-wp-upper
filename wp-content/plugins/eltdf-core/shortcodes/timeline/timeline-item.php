<?php
namespace ElatedCore\CPT\Shortcodes\TimelineItem;

use ElatedCore\Lib;

class TimelineItem implements Lib\ShortcodeInterface {
    private $base;

    function __construct() {
        $this->base = 'eltdf_timeline_item';
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
                    'name'                    => esc_html__( 'Elated Timeline Item', 'eltdf-core' ),
                    'base'                    => $this->getBase(),
                    'as_child'                => array( 'only' => 'eltdf_timeline_holder' ),
                    'category'                => esc_html__( 'by ELATED', 'eltdf-core' ),
                    'icon' => 'icon-wpb-timeline-item extended-custom-icon',
                    'allowed_container_element' => 'vc_row',
                    'params'                  => array(
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title',
                            'heading'    => esc_html__( 'Title', 'eltdf-core' ),
                            'save_always'  => true,
                            'admin_label'   => true,
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'item_link',
                            'heading'    => esc_html__( 'Item Link', 'eltdf-core' ),
                            'save_always'  => true,
                            'admin_label'   => true,
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'item_link_target',
                            'heading'    => esc_html__( 'Item Link Target', 'eltdf-core' ),
                            'value' => array(
                                esc_html__( 'New Window', 'eltdf-core' ) => '_blank',
                                esc_html__( 'Same Window', 'eltdf-core' ) => '_self',
                            ),
                            'dependency' => array( 'element' => 'item_link', 'not_empty' => true ),
                            'save_always'  => true,
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'subtitle',
                            'heading'    => esc_html__( 'Subtitle', 'eltdf-core' ),
                            'save_always'  => true
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'date',
                            'save_always'  => true,
                            'heading'    => esc_html__( 'Date', 'eltdf-core' )
                        ),
                       array(
                           'type'        => 'attach_image',
                           'param_name' => 'image',
                           'save_always'  => true,
                           'heading'    => esc_html__( 'Image', 'eltdf-core' )
                       )

                    )
                )
            );
        }
    }

    public function render($atts, $content = null) {
        $default_atts = array(
            'title'     => '',
            'item_link' => '',
            'item_link_target' => '_blank',
            'subtitle'  => '',
            'date'      => '',
            'image'     => ''
        );

        $params       = shortcode_atts($default_atts, $atts);
        extract($params);

        $params['content'] = $content;

        $output = '';

        $output .= eltdf_core_get_shortcode_module_template_part('templates/timeline-item-template','timeline', '', $params);

        return $output;
    }
}