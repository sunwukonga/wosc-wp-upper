<?php
namespace ElatedCore\CPT\Team;

use ElatedCore\Lib\PostTypeInterface;

/**
 * Class TeamRegister
 * @package ElatedCore\CPT\Team
 */
class TeamRegister implements PostTypeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'team-member';
        $this->taxBase = 'team-category';

        add_filter('archive_template', array($this, 'registerArchiveTemplate'));
        add_filter('single_template', array($this, 'registerSingleTemplate'));
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Registers custom post type with WordPress
     */
    public function register() {
        $this->registerPostType();
        $this->registerTax();
    }
	
	/**
	 * Registers team archive template if one does'nt exists in theme.
	 * Hooked to archive_template filter
	 * @param $archive string current template
	 * @return string string changed template
	 */
	public function registerArchiveTemplate($archive) {
		global $post;
		
		if($post->post_type == $this->base) {
			if(!file_exists(get_template_directory().'/archive-'.$this->base.'.php')) {
				return ELATED_CORE_CPT_PATH.'/team/templates/archive-'.$this->base.'.php';
			}
		}
		
		return $archive;
	}

    /**
     * Registers team single template if one does'nt exists in theme.
     * Hooked to single_template filter
     * @param $single string current template
     * @return string string changed template
     */
    public function registerSingleTemplate($single) {
        global $post;

        if($post->post_type == $this->base) {
            if(!file_exists(get_template_directory().'/single-'.$this->base.'.php')) {
                return ELATED_CORE_CPT_PATH.'/team/templates/single-'.$this->base.'.php';
            }
        }

        return $single;
    }

    /**
     * Registers custom post type with WordPress
     */
    private function registerPostType() {
        global $mrseo_elated_Framework, $mrseo_elated_options;

        $menuPosition = 4;
        $menuIcon = 'dashicons-admin-post';
        $slug = $this->base;

        if(eltdf_core_theme_installed()) {
            $menuPosition = $mrseo_elated_Framework->getSkin()->getMenuItemPosition('team');
            $menuIcon = $mrseo_elated_Framework->getSkin()->getMenuIcon('team');

            if(isset($mrseo_elated_options['team_single_slug'])) {
                if($mrseo_elated_options['team_single_slug'] != ""){
                    $slug = $mrseo_elated_options['team_single_slug'];
                }
            }
        }

        register_post_type( $this->base,
            array(
                'labels' => array(
                    'name'          => esc_html__('Elated Team','eltdf-core'),
                    'singular_name' => esc_html__('Elated Team Member','eltdf-core'),
                    'add_item'      => esc_html__('New Team Member','eltdf-core'),
                    'add_new_item'  => esc_html__('Add New Team Member','eltdf-core'),
                    'edit_item'     => esc_html__('Edit Team Member','eltdf-core')
                ),
                'public'        => true,
                'has_archive'   => true,
                'rewrite'       => array('slug' => $slug),
                'menu_position' => $menuPosition,
                'show_ui'       => true,
                'supports'      => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'comments'),
                'menu_icon'     =>  $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name'              => esc_html__('Team Categories', 'eltdf-core'),
            'singular_name'     => esc_html__('Team Category', 'eltdf-core'),
            'search_items'      => esc_html__('Search Team Categories','eltdf-core'),
            'all_items'         => esc_html__('All Team Categories','eltdf-core'),
            'parent_item'       => esc_html__('Parent Team Category','eltdf-core'),
            'parent_item_colon' => esc_html__('Parent Team Category:','eltdf-core'),
            'edit_item'         => esc_html__('Edit Team Category','eltdf-core'),
            'update_item'       => esc_html__('Update Team Category','eltdf-core'),
            'add_new_item'      => esc_html__('Add New Team Category','eltdf-core'),
            'new_item_name'     => esc_html__('New Team Category Name','eltdf-core'),
            'menu_name'         => esc_html__('Team Categories','eltdf-core')
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'query_var'         => true,
            'show_admin_column' => true,
            'rewrite'           => array('slug' => $this->taxBase)
        ));
    }
}