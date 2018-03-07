<?php

require_once ELATED_FRAMEWORK_ROOT_DIR."/lib/eltdf.kses.php";
require_once ELATED_FRAMEWORK_ROOT_DIR."/lib/eltdf.layout1.php";
require_once ELATED_FRAMEWORK_ROOT_DIR."/lib/eltdf.layout2.php";
require_once ELATED_FRAMEWORK_ROOT_DIR."/lib/eltdf.layout3.php";
require_once ELATED_FRAMEWORK_ROOT_DIR."/lib/eltdf.optionsapi.php";
require_once ELATED_FRAMEWORK_ROOT_DIR."/lib/eltdf.framework.php";
require_once ELATED_FRAMEWORK_ROOT_DIR."/lib/eltdf.functions.php";
require_once ELATED_FRAMEWORK_ROOT_DIR."/lib/eltdf.icons/eltdf.icons.php";
require_once ELATED_FRAMEWORK_ROOT_DIR."/admin/options/eltdf-options-setup.php";
require_once ELATED_FRAMEWORK_ROOT_DIR."/admin/meta-boxes/eltdf-meta-boxes-setup.php";
require_once ELATED_FRAMEWORK_ROOT_DIR."/modules/eltdf-modules-loader.php";

if(!function_exists('mrseo_elated_admin_scripts_init')) {
	/**
	 * Function that registers all scripts that are necessary for our back-end
	 */
	function mrseo_elated_admin_scripts_init() {
        /**
         * @see ElatedSkinAbstract::registerScripts - hooked with 10
         * @see ElatedSkinAbstract::registerStyles - hooked with 10
         */
        do_action('mrseo_elated_admin_scripts_init');
	}

	add_action('admin_init', 'mrseo_elated_admin_scripts_init');
}

if(!function_exists('mrseo_elated_enqueue_admin_styles')) {
	/**
	 * Function that enqueues styles for options page
	 */
	function mrseo_elated_enqueue_admin_styles() {
		wp_enqueue_style('wp-color-picker');

        /**
         * @see ElatedSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('mrseo_elated_enqueue_admin_styles');
	}
}

if(!function_exists('mrseo_elated_enqueue_admin_scripts')) {
	/**
	 * Function that enqueues styles for options page
	 */
	function mrseo_elated_enqueue_admin_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
		wp_enqueue_media();
		wp_enqueue_script("eltdf-dependence", get_template_directory_uri().'/framework/admin/assets/js/eltdf-ui/eltdf-dependence.js', array(), false, true);
        wp_enqueue_script("eltdf-twitter-connect", get_template_directory_uri().'/framework/admin/assets/js/eltdf-twitter-connect.js', array(), false, true);

        /**
         * @see ElatedSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('mrseo_elated_enqueue_admin_scripts');
	}
}

if(!function_exists('mrseo_elated_enqueue_meta_box_styles')) {
	/**
	 * Function that enqueues styles for meta boxes
	 */
	function mrseo_elated_enqueue_meta_box_styles() {
		wp_enqueue_style( 'wp-color-picker' );

        /**
         * @see ElatedSkinAbstract::enqueueStyles - hooked with 10
         */
        do_action('mrseo_elated_enqueue_meta_box_styles');
	}
}

if(!function_exists('mrseo_elated_enqueue_meta_box_scripts')) {
	/**
	 * Function that enqueues scripts for meta boxes
	 */
	function mrseo_elated_enqueue_meta_box_scripts() {
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('jquery-ui-accordion');
		wp_enqueue_script('common');
		wp_enqueue_script('wp-lists');
		wp_enqueue_script('postbox');
		wp_enqueue_media();
		wp_enqueue_script('eltdf-dependence');

        /**
         * @see ElatedSkinAbstract::enqueueScripts - hooked with 10
         */
        do_action('mrseo_elated_enqueue_meta_box_scripts');
	}
}

if(!function_exists('mrseo_elated_enqueue_nav_menu_script')) {
	/**
	 * Function that enqueues styles and scripts necessary for menu administration page.
	 * It checks $hook variable
	 * @param $hook string current page hook to check
	 */
	function mrseo_elated_enqueue_nav_menu_script($hook) {
		if($hook == 'nav-menus.php') {
			wp_enqueue_script('eltdf-nav-menu', get_template_directory_uri().'/framework/admin/assets/js/eltdf-nav-menu.js');
			wp_enqueue_style('eltdf-nav-menu', get_template_directory_uri().'/framework/admin/assets/css/eltdf-nav-menu.css');
		}
	}

	add_action('admin_enqueue_scripts', 'mrseo_elated_enqueue_nav_menu_script');
}

if(!function_exists('mrseo_elated_enqueue_widgets_admin_script')) {
	/**
	 * Function that enqueues styles and scripts for admin widgets page.
	 * @param $hook string current page hook to check
	 */
	function mrseo_elated_enqueue_widgets_admin_script($hook) {
		if($hook == 'widgets.php') {
			wp_enqueue_script('eltdf-dependence');
		}
	}

	add_action('admin_enqueue_scripts', 'mrseo_elated_enqueue_widgets_admin_script');
}

if(!function_exists('mrseo_elated_enqueue_styles_slider_taxonomy')) {
	/**
	 * Enqueue styles when on slider taxonomy page in admin
	 */
	function mrseo_elated_enqueue_styles_slider_taxonomy() {
		if(isset($_GET['taxonomy']) && $_GET['taxonomy'] == 'slides_category') {
			mrseo_elated_enqueue_admin_styles();
		}
	}

	add_action('admin_print_scripts-edit-tags.php', 'mrseo_elated_enqueue_styles_slider_taxonomy');
}

if(!function_exists('mrseo_elated_init_theme_options_array')) {
	/**
	 * Function that merges $mrseo_elated_options and default options array into one array.
	 *
	 * @see array_merge()
	 */
	function mrseo_elated_init_theme_options_array() {
        global $mrseo_elated_options, $mrseo_elated_Framework;

		$db_options = get_option('eltdf_options_mrseo');

		//does eltdf_options exists in db?
		if(is_array($db_options)) {
			//merge with default options
			$mrseo_elated_options  = array_merge($mrseo_elated_Framework->eltdfOptions->options, get_option('eltdf_options_mrseo'));
		} else {
			//options don't exists in db, take default ones
			$mrseo_elated_options = $mrseo_elated_Framework->eltdfOptions->options;
		}
	}

	add_action('mrseo_elated_after_options_map', 'mrseo_elated_init_theme_options_array', 0);
}

if(!function_exists('mrseo_elated_init_theme_options')) {
	/**
	 * Function that sets $mrseo_elated_options variable if it does'nt exists
	 */
	function mrseo_elated_init_theme_options() {
		global $mrseo_elated_options;
		global $mrseo_elated_Framework;
		if(isset($mrseo_elated_options['reset_to_defaults'])) {
			if( $mrseo_elated_options['reset_to_defaults'] == 'yes' ) delete_option( "eltdf_options_mrseo");
		}

		if (!get_option("eltdf_options_mrseo")) {
			add_option( "eltdf_options_mrseo",
				$mrseo_elated_Framework->eltdfOptions->options
			);

			$mrseo_elated_options = $mrseo_elated_Framework->eltdfOptions->options;
		}
	}
}

if(!function_exists('mrseo_elated_register_theme_settings')) {
	/**
	 * Function that registers setting that will be used to store theme options
	 */
	function mrseo_elated_register_theme_settings() {
		register_setting( 'mrseo_elated_theme_menu', 'eltdf_options' );
	}

	add_action('admin_init', 'mrseo_elated_register_theme_settings');
}

if(!function_exists('mrseo_elated_get_admin_tab')) {
	/**
	 * Helper function that returns current tab from url.
	 * @return null
	 */
	function mrseo_elated_get_admin_tab(){
		return isset($_GET['page']) ? mrseo_elated_strafter($_GET['page'],'tab') : NULL;
	}
}

if(!function_exists('mrseo_elated_strafter')) {
	/**
	 * Function that returns string that comes after found string
	 * @param $string string where to search
	 * @param $substring string what to search for
	 * @return null|string string that comes after found string
	 */
	function mrseo_elated_strafter($string, $substring) {
		$pos = strpos($string, $substring);
		if ($pos === false) {
			return NULL;
		}

		return(substr($string, $pos+strlen($substring)));
	}
}

if(!function_exists('mrseo_elated_save_options')) {
	/**
	 * Function that saves theme options to db.
	 * It hooks to ajax wp_ajax_eltdf_save_options action.
	 */
	function mrseo_elated_save_options() {
		global $mrseo_elated_options;
		if(current_user_can('administrator')) {

			$_REQUEST = stripslashes_deep($_REQUEST);

	        unset($_REQUEST['action']);

	        check_ajax_referer('eltdf_ajax_save_nonce', 'eltdf_ajax_save_nonce');

			$mrseo_elated_options = array_merge($mrseo_elated_options, $_REQUEST);

			update_option( 'eltdf_options_mrseo', $mrseo_elated_options );

			do_action('mrseo_elated_after_theme_option_save');
			echo esc_html__('Saved', 'mrseo');

			die();
		}
	}

	add_action('wp_ajax_mrseo_elated_save_options', 'mrseo_elated_save_options');
}

if(!function_exists('mrseo_elated_meta_box_add')) {
	/**
	 * Function that adds all defined meta boxes.
	 * It loops through array of created meta boxes and adds them
	 */
	function mrseo_elated_meta_box_add() {
		global $mrseo_elated_Framework;
		
		foreach ($mrseo_elated_Framework->eltdfMetaBoxes->metaBoxes as $key=>$box ) {
			$hidden = false;
			if (!empty($box->hidden_property)) {
				foreach ($box->hidden_values as $value) {
					if (mrseo_elated_option_get_value($box->hidden_property) == $value) {
						$hidden = true;
					}
				}
			}

			if(is_string($box->scope)) {
				$box->scope = array($box->scope);
			}

			if(is_array($box->scope) && count($box->scope)) {
				foreach($box->scope as $screen) {
					add_meta_box(
						'eltdf-meta-box-'.$key,
						$box->title,
                        'mrseo_elated_render_meta_box',
						$screen,
						'advanced',
						'high',
						array( 'box' => $box)
					);

					if ($hidden) {
						add_filter('postbox_classes_'.$screen.'_eltdf-meta-box-'.$key, 'mrseo_elated_meta_box_add_hidden_class');
					}
				}
			}
		}

		add_action('admin_enqueue_scripts', 'mrseo_elated_enqueue_meta_box_styles');
		add_action('admin_enqueue_scripts', 'mrseo_elated_enqueue_meta_box_scripts');
	}

	add_action('add_meta_boxes', 'mrseo_elated_meta_box_add');
}

if(!function_exists('mrseo_elated_meta_box_save')) {
	/**
	 * Function that saves meta box to postmeta table
	 * @param $post_id int id of post that meta box is being saved
	 * @param $post WP_Post current post object
	 */
	function mrseo_elated_meta_box_save( $post_id, $post ) {
		global $mrseo_elated_Framework;

		$nonces_array = array();
		$meta_boxes = mrseo_elated_framework()->eltdfMetaBoxes->getMetaBoxesByScope($post->post_type);

		if(is_array($meta_boxes) && count($meta_boxes)) {
			foreach($meta_boxes as $meta_box) {
				$nonces_array[] = 'mrseo_elated_meta_box_'.$meta_box->name.'_save';
			}
		}

		if(is_array($nonces_array) && count($nonces_array)) {
			foreach($nonces_array as $nonce) {
				if(!isset($_POST[$nonce]) || !wp_verify_nonce($_POST[$nonce], $nonce)) {
					return;
				}
			}
		}
		
		$postTypes = apply_filters('mrseo_elated_meta_box_post_types_save', array('post', 'page'));

		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		if (!isset( $_POST[ '_wpnonce' ])) {
			return;
		}

		if (!current_user_can('edit_post', $post_id)) {
			return;
		}

		if (!in_array($post->post_type, $postTypes)) {
			return;
		}

		foreach ($mrseo_elated_Framework->eltdfMetaBoxes->options as $key=>$box ) {

			if (isset($_POST[$key]) && trim($_POST[$key] !== '')) {

				$value = $_POST[$key];

				update_post_meta( $post_id, $key, $value );
			} else {
				delete_post_meta( $post_id, $key );
			}
		}

		$portfolios = false;
		if (isset($_POST['optionLabel'])) {
			foreach ($_POST['optionLabel'] as $key => $value) {
				$portfolios_val[$key] = array('optionLabel'=>$value,'optionValue'=>$_POST['optionValue'][$key],'optionUrl'=>$_POST['optionUrl'][$key],'optionlabelordernumber'=>$_POST['optionlabelordernumber'][$key]);
				$portfolios = true;

			}
		}

		if ($portfolios) {
			update_post_meta( $post_id,  'eltdf_portfolios', $portfolios_val );
		} else {
			delete_post_meta( $post_id, 'eltdf_portfolios' );
		}

		$portfolio_images = false;
		if (isset($_POST['portfolioimg'])) {
			foreach ($_POST['portfolioimg'] as $key => $value) {
				$portfolio_images_val[$key] = array('portfolioimg'=>$_POST['portfolioimg'][$key],'portfoliotitle'=>$_POST['portfoliotitle'][$key],'portfolioimgordernumber'=>$_POST['portfolioimgordernumber'][$key], 'portfoliovideotype'=>$_POST['portfoliovideotype'][$key], 'portfoliovideoid'=>$_POST['portfoliovideoid'][$key], 'portfoliovideoimage'=>$_POST['portfoliovideoimage'][$key], 'portfoliovideowebm'=>$_POST['portfoliovideowebm'][$key], 'portfoliovideomp4'=>$_POST['portfoliovideomp4'][$key], 'portfoliovideoogv'=>$_POST['portfoliovideoogv'][$key], 'portfolioimgtype'=>$_POST['portfolioimgtype'][$key] );
				$portfolio_images = true;
			}
		}

		if ($portfolio_images) {
			update_post_meta( $post_id,  'eltdf_portfolio_images', $portfolio_images_val );
		} else {
			delete_post_meta( $post_id,  'eltdf_portfolio_images' );
		}
	}

	add_action( 'save_post', 'mrseo_elated_meta_box_save', 1, 2 );
}

if(!function_exists('mrseo_elated_render_meta_box')) {
	/**
	 * Function that renders meta box
	 * @param $post WP_Post post object
	 * @param $metabox array array of current meta box parameters
	 */
	function mrseo_elated_render_meta_box($post, $metabox) {?>
		<div class="eltdf-meta-box eltdf-page">
			<div class="eltdf-meta-box-holder">
				<?php $metabox['args']['box']->render(); ?>
				<?php wp_nonce_field('mrseo_elated_meta_box_'.$metabox['args']['box']->name.'_save', 'mrseo_elated_meta_box_'.$metabox['args']['box']->name.'_save'); ?>
			</div>
		</div>
	<?php
	}
}

if(!function_exists('mrseo_elated_meta_box_add_hidden_class')) {
	/**
	 * Function that adds class that will initially hide meta box
	 * @param array $classes array of classes
	 * @return array modified array of classes
	 */
	function mrseo_elated_meta_box_add_hidden_class( $classes=array() ) {
		if( !in_array( 'eltdf-meta-box-hidden', $classes ) )
			$classes[] = 'eltdf-meta-box-hidden';

		return $classes;
	}
}

if(!function_exists('mrseo_elated_remove_default_custom_fields')) {
	/**
	 * Function that removes default WordPress custom fields interface
	 */
	function mrseo_elated_remove_default_custom_fields() {
		foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
			foreach ( apply_filters('mrseo_elated_meta_box_post_types_remove', array( 'post', 'page')) as $postType ) {
				remove_meta_box( 'postcustom', $postType, $context );
			}
		}
	}

	add_action('do_meta_boxes', 'mrseo_elated_remove_default_custom_fields');
}

if(!function_exists('mrseo_elated_generate_icon_pack_options')) {
    /**
     * Generates options HTML for each icon in given icon pack
     * Hooked to wp_ajax_update_admin_nav_icon_options action
     */
    function mrseo_elated_generate_icon_pack_options() {
        global $mrseo_elated_IconCollections;

        $html = '';
        $icon_pack = isset($_POST['icon_pack']) ? $_POST['icon_pack'] : '';
        $collections_object = $mrseo_elated_IconCollections->getIconCollection($icon_pack);

        if($collections_object) {
            $icons = $collections_object->getIconsArray();
            if(is_array($icons) && count($icons)) {
                foreach ($icons as $key => $icon) {
                    $html .= '<option value="'.esc_attr($key).'">'.esc_html($key).'</option>';
                }
            }
        }

        print $html;
    }

    add_action('wp_ajax_update_admin_nav_icon_options', 'mrseo_elated_generate_icon_pack_options');
}

if(!function_exists('mrseo_elated_save_dismisable_notice')) {
    /**
     * Updates user meta with dismisable notice. Hooks to admin_init action
     * in order to check this on every page request in admin
     */
    function mrseo_elated_save_dismisable_notice() {
        if(is_admin() && !empty($_GET['eltdf_dismis_notice'])) {
            $notice_id = sanitize_key($_GET['eltdf_dismis_notice']);
            $current_user_id = get_current_user_id();

            update_user_meta($current_user_id, 'dismis_'.$notice_id, 1);
        }
    }

    add_action('admin_init', 'mrseo_elated_save_dismisable_notice');
}

if(!function_exists('mrseo_elated_hook_twitter_request_ajax')) {
    /**
     * Wrapper function for obtaining twitter request token.
     * Hooks to wp_ajax_eltdf_twitter_obtain_request_token ajax action
     *
     * @see ElatedTwitterApi::obtainRequestToken()
     */
    function mrseo_elated_hook_twitter_request_ajax() {
        ElatedTwitterApi::getInstance()->obtainRequestToken();
    }

    add_action('wp_ajax_eltdf_twitter_obtain_request_token', 'mrseo_elated_hook_twitter_request_ajax');
}

if (!function_exists('mrseo_elated_comment')) {
    /**
     * Function which modify default wordpress comments
     *
     * @return comments html
     */
    function mrseo_elated_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;

        global $post;

        $is_pingback_comment = $comment->comment_type == 'pingback';
        $is_author_comment  = $post->post_author == $comment->user_id;

        $comment_class = 'eltdf-comment clearfix';

        if($is_author_comment) {
            $comment_class .= ' eltdf-post-author-comment';
        }

        if($is_pingback_comment) {
            $comment_class .= ' eltdf-pingback-comment';
        }
        ?>

        <li class="eltdf-comment-li">
        <div class="<?php echo esc_attr($comment_class); ?>">
            <?php if(!$is_pingback_comment) { ?>
                <div class="eltdf-comment-image"> <?php echo mrseo_elated_kses_img(get_avatar($comment, '112')); ?> </div>
            <?php } ?>
            <div class="eltdf-comment-text">
                <div class="eltdf-comment-info">
                    <h5 class="eltdf-comment-name">
                        <?php if($is_pingback_comment) { esc_html_e('Pingback:', 'mrseo'); } ?>
                        <?php echo wp_kses_post(get_comment_author_link()); ?>
                    </h5>
                	<span class="eltdf-comment-date"><?php comment_time(get_option('date_format')); ?></span>
                </div>
                <?php if(!$is_pingback_comment) { ?>
                    <div class="eltdf-text-holder" id="comment-<?php echo comment_ID(); ?>">
                        <?php comment_text(); ?>
                    </div>
                <?php } ?>
                <?php
                comment_reply_link( array_merge( $args, array('reply_text' => esc_html__('Reply', 'mrseo'), 'depth' => $depth, 'max_depth' => $args['max_depth'])));
                edit_comment_link(esc_html__('Edit','mrseo'));
                ?>
            </div>
        </div>
        <?php //li tag will be closed by WordPress after looping through child elements ?>
        <?php
    }
}
?>