<?php

class MrSeoElatedLike {

	private static $instance;

	private function __construct() {
		add_action('wp_ajax_mrseo_elated_like', array( $this, 'ajax'));
		add_action('wp_ajax_nopriv_mrseo_elated_like', array( $this, 'ajax'));
	}

	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	function ajax(){

		//update
		if( isset($_POST['likes_id']) ) {
			$post_id = str_replace('eltdf-like-', '', $_POST['likes_id']);
			$post_id = substr($post_id, 0, -4);
			$type    = isset($_POST['type']) ? $_POST['type'] : '';

			echo wp_kses($this->like_post($post_id, 'update', $type), array(
				'span' => array(
					'class' => true,
					'aria-hidden' => true,
					'style' => true,
					'id' => true
				),
				'i' => array(
					'class' => true,
					'style' => true,
					'id' => true
				)
			));
		}

		//get
		else {
			$post_id = str_replace('eltdf-like-', '', $_POST['likes_id']);
			$post_id = substr($post_id, 0, -4);
			echo wp_kses($this->like_post($post_id, 'get'), array(
				'span' => array(
					'class' => true,
					'aria-hidden' => true,
					'style' => true,
					'id' => true
				),
				'i' => array(
					'class' => true,
					'style' => true,
					'id' => true
				)
			));
		}
		exit;
	}

	public function like_post($post_id, $action = 'get', $type = ''){
		if(!is_numeric($post_id)) return;

		switch($action) {

			case 'get':
				$like_count = get_post_meta($post_id, '_eltdf-like', true);
				if(isset($_COOKIE['eltdf-like_'. $post_id])){
					$icon = '<i class="fa fa-heart" aria-hidden="true"></i>';
				}else{
					$icon = '<i class="fa fa-heart-o" aria-hidden="true"></i>';
				}
				if( !$like_count ){
					$like_count = 0;
					add_post_meta($post_id, '_eltdf-like', $like_count, true);
					$icon = '<i class="fa fa-heart-o" aria-hidden="true"></i>';
				}
				$return_value = $icon . "<span>" . $like_count . "</span>";

				return $return_value;
				break;

			case 'update':
				$like_count = get_post_meta($post_id, '_eltdf-like', true);

				if(isset($_COOKIE['eltdf-like_'. $post_id])) {
					return $like_count;
				}

				$like_count++;

				update_post_meta($post_id, '_eltdf-like', $like_count);
				setcookie('eltdf-like_'. $post_id, $post_id, time()*20, '/');

				$return_value = "<i class='fa fa-heart' aria-hidden='true'></i><span>" . $like_count . "</span>";

				return $return_value;
				break;
			default:
				return '';
				break;
		}
	}

	public function add_like() {
		global $post;

		$output = $this->like_post($post->ID);

		$class = 'eltdf-like';
		$rand_number = rand(100, 999);
		$title = esc_html__('Like this', 'mrseo');
		if( isset($_COOKIE['eltdf-like_'. $post->ID]) ){
			$class = 'eltdf-like liked';
			$title = esc_html__('You already like this!', 'mrseo');
		}

		return '<a href="#" class="'. $class .'" id="eltdf-like-'. $post->ID .'-'. $rand_number.'" title="'. $title .'">'. $output .'</a>';
	}
}

if (!function_exists('mrseo_elated_create_like')) {
    function mrseo_elated_create_like() {
        MrSeoElatedLike::get_instance();
    }

    add_action('after_setup_theme', 'mrseo_elated_create_like');
}