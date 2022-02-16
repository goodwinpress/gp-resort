<?php
// подключаем post_type для Номеров

function rooms() {

	$labels = array(
		'name'                  => __( 'Номера', '', 'gp-resort' ),
		'singular_name'         => __( 'Номер', '', 'gp-resort' ),
		'menu_name'             => __( 'Номера', 'gp-resort' ),
		'name_admin_bar'        => __( 'Номер', 'gp-resort' ),
		'archives'              => __( 'Архив Номеров', 'gp-resort' ),
		'attributes'            => __( 'Свойства', 'gp-resort' ),
		'parent_item_colon'     => __( 'Родительская карточка Номера:', 'gp-resort' ),
		'all_items'             => __( 'Все Номера', 'gp-resort' ),
		'add_new_item'          => __( 'Добавить новый Номер', 'gp-resort' ),
		'add_new'               => __( 'Добавить новый Номер', 'gp-resort' ),
		'new_item'              => __( 'Новая Номер', 'gp-resort' ),
		'edit_item'             => __( 'Редактировать ', 'gp-resort' ),
		'update_item'           => __( 'Обновить ', 'gp-resort' ),
		'view_item'             => __( 'Посмотреть', 'gp-resort' ),
		'view_items'            => __( 'Посмотреть', 'gp-resort' ),
		'search_items'          => __( 'Искать Номера', 'gp-resort' ),
		'not_found'             => __( 'Номера не найдены', 'gp-resort' ),
		'not_found_in_trash'    => __( 'Не найдено', 'gp-resort' ),
		'featured_image'        => __( 'Изображение Номера', 'gp-resort' ),
		'set_featured_image'    => __( 'Установить изображение Номера', 'gp-resort' ),
		'remove_featured_image' => __( 'Удалить изображение Номера', 'gp-resort' ),
		'use_featured_image'    => __( 'Использовать как изображение Номера', 'gp-resort' ),
		'insert_into_item'      => __( 'Вставить в ', 'gp-resort' ),
		'uploaded_to_this_item' => __( 'Загружено', 'gp-resort' ),
		'items_list'            => __( 'Список Номеров', 'gp-resort' ),
		'items_list_navigation' => __( 'Навигация по Номерам', 'gp-resort' ),
		'filter_items_list'     => __( 'Фильтр Номеров', 'gp-resort' ),
	);

	$rewrite = array(
		'slug'   =>   'rooms',
		'with_front'    => true,
		'pages'          => true,
		'feeds'           => false,
	);

	$args = array(
		'label'                 => __( 'Номер', 'gp-resort' ),
		'description'           => __( 'Номера', 'gp-resort' ),
		'labels'                => $labels,
		 
		'taxonomies'      => array( 'cat' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_icon' => 'dashicons-yes-alt',  
		'menu_position'         => 4,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'          => $rewrite,
		'capability_type'       => 'post',
		'show_in_rest' => true,
		'supports' => array('title','editor', 'thumbnail')
	);
	register_post_type( 'rooms', $args );

}
add_action( 'init', 'rooms', 0 );
