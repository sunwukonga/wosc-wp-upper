<?php

class MrSeoElatedSeparatorWidget extends MrSeoElatedWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_separator_widget',
	        esc_html__('Elated Separator Widget', 'mrseo'),
	        array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'mrseo'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'name' => 'type',
                'title' => esc_html__('Type', 'mrseo'),
                'options' => array(
                    'normal' => esc_html__('Normal', 'mrseo'),
                    'full-width' => esc_html__('Full Width', 'mrseo')
                )
            ),
            array(
                'type' => 'dropdown',
                'name' => 'position',
                'title' => esc_html__('Position', 'mrseo'),
                'options' => array(
                    'center' => esc_html__('Center', 'mrseo'),
                    'left' => esc_html__('Left', 'mrseo'),
                    'right' => esc_html__('Right', 'mrseo')
                )
            ),
            array(
                'type' => 'dropdown',
                'name' => 'border_style',
                'title' => esc_html__('Style', 'mrseo'),
                'options' => array(
                    'solid' => esc_html__('Solid', 'mrseo'),
                    'dashed' => esc_html__('Dashed', 'mrseo'),
                    'dotted' => esc_html__('Dotted', 'mrseo')
                )
            ),
            array(
                'type' => 'textfield',
                'name' => 'color',
                'title' => esc_html__('Color', 'mrseo')
            ),
            array(
                'type' => 'textfield',
                'name' => 'width',
                'title' => esc_html__('Width', 'mrseo')
            ),
            array(
                'type' => 'textfield',
                'name' => 'thickness',
                'title' => esc_html__('Thickness (px)', 'mrseo')
            ),
            array(
                'type' => 'textfield',
                'name' => 'top_margin',
                'title' => esc_html__('Top Margin', 'mrseo')
            ),
            array(
                'type' => 'textfield',
                'name' => 'bottom_margin',
                'title' => esc_html__('Bottom Margin', 'mrseo')
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget eltdf-separator-widget">';
            echo do_shortcode("[eltdf_separator $params]"); // XSS OK
        echo '</div>';
    }
}