<?php

class MrSeoElatedSearchOpener extends MrSeoElatedWidget {
    public function __construct() {
        parent::__construct(
            'eltdf_search_opener',
	        esc_html__('Elated Search Opener', 'mrseo'),
	        array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'mrseo'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
	            'type'        => 'textfield',
	            'name'        => 'search_icon_size',
                'title'       => esc_html__('Icon Size (px)', 'mrseo'),
                'description' => esc_html__('Define size for search icon', 'mrseo')
            ),
            array(
	            'type'        => 'textfield',
	            'name'        => 'search_icon_color',
                'title'       => esc_html__('Icon Color', 'mrseo'),
                'description' => esc_html__('Define color for search icon', 'mrseo')
            ),
            array(
	            'type'        => 'textfield',
	            'name'        => 'search_icon_hover_color',
                'title'       => esc_html__('Icon Hover Color', 'mrseo'),
                'description' => esc_html__('Define hover color for search icon', 'mrseo')
            ),
	        array(
		        'type' => 'textfield',
		        'name' => 'search_icon_margin',
		        'title' => esc_html__('Icon Margin', 'mrseo'),
		        'description' => esc_html__('Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'mrseo')
	        ),
            array(
	            'type'        => 'dropdown',
	            'name'        => 'show_label',
                'title'       => esc_html__('Enable Search Icon Text', 'mrseo'),
                'description' => esc_html__('Enable this option to show search text next to search icon in header', 'mrseo'),
                'options'     => mrseo_elated_get_yes_no_select_array()
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
        global $mrseo_elated_options, $mrseo_elated_IconCollections;

	    $search_type_class    = 'eltdf-search-opener eltdf-icon-has-hover';
	    $styles = array();
	    $show_search_text     = $instance['show_label'] == 'yes' || $mrseo_elated_options['enable_search_icon_text'] == 'yes' ? true : false;

	    if(!empty($instance['search_icon_size'])) {
		    $styles[] = 'font-size: '.intval($instance['search_icon_size']).'px';
	    }

	    if(!empty($instance['search_icon_color'])) {
		    $styles[] = 'color: '.$instance['search_icon_color'].';';
	    }

	    if (!empty($instance['search_icon_margin'])) {
		    $styles[] = 'margin: ' . $instance['search_icon_margin'].';';
	    }
	    ?>

	    <a <?php mrseo_elated_inline_attr($instance['search_icon_hover_color'], 'data-hover-color'); ?> <?php mrseo_elated_inline_style($styles); ?>
		    <?php mrseo_elated_class_attribute($search_type_class); ?> href="javascript:void(0)">
            <span class="eltdf-search-opener-wrapper">
                <?php if(isset($mrseo_elated_options['search_icon_pack'])) {
	                $mrseo_elated_IconCollections->getSearchIcon($mrseo_elated_options['search_icon_pack'], false);
                } ?>
	            <?php if($show_search_text) { ?>
		            <span class="eltdf-search-icon-text"><?php esc_html_e('Search', 'mrseo'); ?></span>
	            <?php } ?>
            </span>
	    </a>
    <?php }
}