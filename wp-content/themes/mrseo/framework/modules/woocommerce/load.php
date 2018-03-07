<?php
include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/woocommerce-functions.php';

if (mrseo_elated_is_woocommerce_installed()) {
	include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/admin/options-map/map.php';
	include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/admin/meta-boxes/woocommerce-meta-boxes.php';
	include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/woocommerce-template-hooks.php';
	include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/woocommerce-config.php';
	
	include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/shortcodes/shortcodes-functions.php';
	include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/widgets/woocommerce-dropdown-cart.php';

	foreach(glob(ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/woocommerce/plugins/*/load.php') as $plugin_load) {
		include_once $plugin_load;
	}
}