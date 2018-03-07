<?php

class MrSeoElatedBlogListWidget extends MrSeoElatedWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_blog_list_widget',
            esc_html__('Elated Blog List Widget', 'mrseo'),
            array( 'description' => esc_html__( 'Display a list of your blog posts', 'mrseo'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type'  => 'textfield',
                'name'  => 'widget_title',
                'title' => esc_html__('Widget Title', 'mrseo')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'type',
                'title'   => esc_html__('Type', 'mrseo'),
                'options' => array(
                    'simple'  => esc_html__('Simple', 'mrseo'),
                    'minimal' => esc_html__('Minimal', 'mrseo')
                )
            ),
            array(
                'type'  => 'textfield',
                'name'  => 'number_of_posts',
                'title' => esc_html__('Number of Posts', 'mrseo')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'space_between_columns',
                'title'   => esc_html__('Space Between items', 'mrseo'),
                'options' => array(
                    'normal' => esc_html__('Normal', 'mrseo'),
                    'small'  => esc_html__('Small', 'mrseo'),
                    'tiny'   => esc_html__('Tiny', 'mrseo'),
                    'no'     => esc_html__('No Space', 'mrseo')
                )
            ),
	        array(
		        'type'    => 'dropdown',
		        'name'    => 'order_by',
		        'title'   => esc_html__('Order By', 'mrseo'),
		        'options' => mrseo_elated_get_query_order_by_array()
	        ),
	        array(
		        'type'    => 'dropdown',
		        'name'    => 'order',
		        'title'   => esc_html__('Order', 'mrseo'),
		        'options' => mrseo_elated_get_query_order_array()
	        ),
            array(
                'type'        => 'textfield',
                'name'        => 'category',
                'title'       => esc_html__('Category Slug', 'mrseo'),
                'description' => esc_html__('Leave empty for all or use comma for list', 'mrseo')
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'title_tag',
                'title'   => esc_html__('Title Tag', 'mrseo'),
                'options' => mrseo_elated_get_title_tag(true)
            ),
            array(
                'type'    => 'dropdown',
                'name'    => 'title_transform',
                'title'   => esc_html__('Title Text Transform', 'mrseo'),
                'options' => mrseo_elated_get_text_transform_array(true)
            ),
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        $params = '';

        if (!is_array($instance)) { $instance = array(); }

        $instance['post_info_section'] = 'yes';
        $instance['number_of_columns'] = '1';

        // Filter out all empty params
        $instance = array_filter($instance, function($array_value) { return trim($array_value) != ''; });

        //generate shortcode params
        foreach($instance as $key => $value) {
            $params .= " $key='$value' ";
        }

        $available_types = array('simple', 'classic');

        if (!in_array($instance['type'], $available_types)) {
            $instance['type'] = 'simple';
        }

        echo '<div class="widget eltdf-blog-list-widget">';
            if(!empty($instance['widget_title'])) {
                print $args['before_title'].$instance['widget_title'].$args['after_title'];
            }

            echo do_shortcode("[eltdf_blog_list $params]"); // XSS OK
        echo '</div>';
    }
}