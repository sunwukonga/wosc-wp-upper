<?php

function eltdf_core_import_object(){
	$eltdf_core_import_object = new ElatedCoreImport();
}

add_action('init', 'eltdf_core_import_object');

if(!function_exists('eltdf_core_data_import')){
    function eltdf_core_data_import(){
		$importObject = ElatedCoreImport::getInstance();

        if ($_POST['import_attachments'] == 1)
			$importObject->attachments = true;
        else
            $importObject->attachments = false;

        $folder = "mrseo/";
        if (!empty($_POST['example']))
            $folder = $_POST['example']."/";

		$importObject->import_content($folder.$_POST['xml']);

        die();
    }

    add_action('wp_ajax_eltdf_core_data_import', 'eltdf_core_data_import');
}

if(!function_exists('eltdf_core_widgets_import')){
    function eltdf_core_widgets_import(){
		$importObject = ElatedCoreImport::getInstance();

        $folder = "mrseo/";
        if (!empty($_POST['example']))
            $folder = $_POST['example']."/";

		$importObject->import_widgets($folder.'widgets.txt',$folder.'custom_sidebars.txt');

        die();
    }

    add_action('wp_ajax_eltdf_core_widgets_import', 'eltdf_core_widgets_import');
}

if(!function_exists('eltdf_core_options_import')){
    function eltdf_core_options_import(){
		$importObject = ElatedCoreImport::getInstance();

        $folder = "mrseo/";
        if (!empty($_POST['example']))
            $folder = $_POST['example']."/";

		$importObject->import_options($folder.'options.txt');

		die();
    }

    add_action('wp_ajax_eltdf_core_options_import', 'eltdf_core_options_import');
}

if(!function_exists('eltdf_core_other_import')){
    function eltdf_core_other_import(){
		$importObject = ElatedCoreImport::getInstance();

        $folder = "mrseo/";
        if (!empty($_POST['example']))
            $folder = $_POST['example']."/";

		$importObject->import_options($folder.'options.txt');
		$importObject->import_widgets($folder.'widgets.txt',$folder.'custom_sidebars.txt');
		$importObject->import_menus($folder.'menus.txt');
		$importObject->import_settings_pages($folder.'settingpages.txt');

		if(eltdf_core_is_revolution_slider_installed()){
			$importObject->rev_slider_import($folder);
		}

		eltdf_core_update_meta_fields_after_import();

        die();
    }

    add_action('wp_ajax_eltdf_core_other_import', 'eltdf_core_other_import');
}

if(!function_exists('eltdf_core_update_meta_fields_after_import')){
	function eltdf_core_update_meta_fields_after_import(){
		$url = home_url( '/' );

		$global_options = get_option( 'eltdf_options_mrseo');
		$new_global_values = eltdf_core_recalcserializedlengths(str_replace('http://mrseo.elated-themes.com/', $url, $global_options));
		update_option( 'eltdf_options_mrseo', $new_global_values);
	}
}

if(!function_exists('eltdf_core_recalcserializedlengths')){
	function eltdf_core_recalcserializedlengths($sObject) {

		$ret = preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $sObject );

		return $ret;
	}
}
