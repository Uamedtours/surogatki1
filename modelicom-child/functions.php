<?php

/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

//load parent CSS
if (!function_exists('modelicom_child_enqueue_static')) :
	/**
	 * modelicom_child_enqueue_static
	 *
	 * @return void
	 * @since 1.0.0
	 */
	function modelicom_child_enqueue_static()
	{
		wp_enqueue_style(
			'modelicom-child-style',
			get_stylesheet_directory_uri() . '/style.css',
			array('modelicom-main'),
			wp_get_theme()->get('Version')
		);
	}
endif;
add_action('wp_enqueue_scripts', 'modelicom_child_enqueue_static', 999);


// подключение скриптов
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
function theme_name_scripts() {
	wp_enqueue_style( 'style-name', get_stylesheet_uri() . '/css/main.css', array(), '4.0.0', true  );
	// wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}

function modelicom_child_register_ogloszenie_page() {
	$page_id = get_option( 'modelicom_child_ogloszenie_page_id' );
	if ( $page_id && get_post_status( $page_id ) ) {
		return;
	}

	$existing_page = get_page_by_path( 'dodaj-swoje-ogloszenie' );
	if ( $existing_page ) {
		update_option( 'modelicom_child_ogloszenie_page_id', $existing_page->ID );
		return;
	}

	$page_id = wp_insert_post(
		array(
			'post_title'   => 'Dodaj swoje ogłoszenie',
			'post_name'    => 'dodaj-swoje-ogloszenie',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
		)
	);

	if ( $page_id && ! is_wp_error( $page_id ) ) {
		update_post_meta( $page_id, '_wp_page_template', 'page-dodaj-swoje-ogloszenie.php' );
		update_option( 'modelicom_child_ogloszenie_page_id', $page_id );
	}
}
add_action( 'init', 'modelicom_child_register_ogloszenie_page' );

// отключение всех автоматических обновлений
add_filter('automatic_updater_disabled', '__return_true');


// add_action( 'template_redirect', 'redirect_to_custom_post_type' );

// function redirect_to_custom_post_type() {
//     // Проверяем, находимся ли мы на главной странице
//     if ( is_front_page() && !is_admin() ) {
//         // URL кастомного типа записи
//         $custom_post_type_url = home_url( '/model/' );
        
//         // Перенаправляем на указанный URL
//         wp_redirect( $custom_post_type_url );
//         exit();
//     }
// }

function modify_unyson_breadcrumbs($items) {
    foreach ($items as $key => $item) {
        if (isset($item['name']) && $item['name'] === 'All Models') {
            unset($items[$key]);
        }
    }
    // Переиндексация массива после удаления
    $items = array_values($items);
    
    return $items;
}

add_filter('fw_ext_breadcrumbs_items', 'modify_unyson_breadcrumbs');




function redirect_model_to_homepage() {
    // Получаем текущий URL
    $current_url = home_url( add_query_arg( NULL, NULL ) );
    
    // URL-адреса, которые необходимо перенаправить
    $model_urls = array(
        home_url( '/model/' ),
        home_url( '/model' ),
		home_url( '/models' ),
		home_url( '/models/' ),
    );
    
    // Если текущий URL совпадает с одним из указанных, перенаправляем на главную страницу
    if ( in_array( $current_url, $model_urls ) ) {
        wp_redirect( home_url( '/' ) );
        exit();
    }
}
add_action( 'template_redirect', 'redirect_model_to_homepage' );
