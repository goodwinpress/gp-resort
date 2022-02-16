<?php
/**
 * GP Resort функции и подключения
 */

function gp_theme_support() {

// подключаем фид
add_theme_support( 'automatic-feed-links' );

//подключаем фон
add_theme_support(
'custom-background',
array(
'default-color' => 'ffffff',
    )
);

// задаем ширину
global $content_width;
if ( ! isset( $content_width ) ) {
$content_width = 800;
}

//подключаем изображение записи
add_theme_support( 'post-thumbnails' );

//подключаем title
add_theme_support( 'title-tag' );

// поддержка html5 
add_theme_support(
'html5',
array(
'search-form',
'comment-form',
'comment-list',
'gallery',
'caption',
'script',
'style',
)
);

//подключаем локализации
load_theme_textdomain( 'gp-resort', get_template_directory() . '/languages' );

// поддержка для full и wide align картинок
add_theme_support('align-wide');

//адаптивное видео
add_theme_support('responsive-embeds'); 

// стили для редактора
add_theme_support( 'editor-styles' );
add_editor_style( 'style-editor.css' );

// кастомная шапка, если кому надо
add_theme_support( 'custom-header' );

// отключаем блочный редактор виджетов
remove_theme_support('widgets-block-editor');

}
add_action('after_setup_theme', 'gp_theme_support');

// подключаем  разные функции для темы
require get_template_directory() . '/files/back/theme-functions.php';

// подключем custom post type для номеров
require get_template_directory() . '/files/back/rooms-post_type.php';

// разные элементы номеров
require get_template_directory() . '/files/back/rooms-functions.php';

// хлебные крошки от DIMOX.NAME
require get_template_directory() . '/files/back/breadcrumbs.php';

// добавляем микроразметку в комментарии
require get_template_directory() . '/files/back/comments-atts.php';

// оптимизируем код, выключаем лишнее
require get_template_directory() . '/files/back/optimize.php';

// подключаем ajax загрузку для записей блога
 require_once(get_template_directory() . '/files/back/load-posts.php' );
 
// встроенные виджеты
require get_template_directory() . '/files/back/custom-widgets.php';

// добавляем перевод темы через панель Polylang
 require get_template_directory() . '/files/back/multilanguage-pll-strings.php';
 
// custom script loader class
 require get_template_directory() . '/files/back/gpress-script-loader.php';
 

// подключаем стили темы
function gp_register_styles() {
$theme_version = wp_get_theme()->get( 'Version' );
wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), $theme_version );
}
add_action( 'wp_enqueue_scripts', 'gp_register_styles' );

// асонхронная загрузка скриптов
$loader = new Gpress_Script_Loader();
 add_filter( 'script_loader_tag', array( $loader, 'filter_script_loader_tag' ), 10, 2 );

//подключаем скрипты
function gp_register_scripts() {
$theme_version = wp_get_theme()->get( 'Version' );
if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
wp_script_add_data( 'comment-reply', 'async', true );
}
 
wp_enqueue_script( 'custom', get_template_directory_uri() . '/scripts/custom.js', array('jquery'), $theme_version, true );
wp_script_add_data( 'custom', 'async', true );
}

add_action( 'wp_enqueue_scripts', 'gp_register_scripts' );

// добавляем меню
function gp_menu() {
$locations = array(
'primary'  =>  'Меню сайта',
);
register_nav_menus( $locations );
}
add_action( 'init', 'gp_menu' );

// сайдбары и виджет подвала
function gp_sidebar_registration() {

if (function_exists('register_sidebar') )
register_sidebar(array(	
'name' =>  __( 'Сайдбар:  блог и рубрики', 'gp-resort' ),
'id' => 'sidebar-1',
 'before_title' => '<span class="widget-title">',
'after_title' => '</span>',
'before_widget' => '<div id="%1$s" class="widget %2$s gp-clearfix"> ',
'after_widget' => '</div> ',
));

if (function_exists('register_sidebar') )
register_sidebar(array(	
'name' =>  __( 'Сайдбар: записи и страницы', 'gp-resort' ),
'id' => 'sidebar-2',
 'before_title' => '<span class="widget-title">',
'after_title' => '</span>',
'before_widget' => '<div id="%1$s" class="widget %2$s gp-clearfix"> ',
'after_widget' => '</div> ',
));


if ( function_exists('register_sidebar') )
register_sidebar(array(	
'name' =>  __( 'Подвал: правая колонка', 'gp-resort' ),
'id' => 'sidebar-3',
'before_title' => '<span class="footer-col__title">',
'after_title' => '</span> ',
'before_widget' => '<div id="%1$s" class="widget %2$s gp-clearfix"> ',
'after_widget' => '</div> ',
));
 
}
add_action( 'widgets_init', 'gp_sidebar_registration' );


/****************************************************************/

// подключаем лицензию, не удаляем эту строчку
require_once('admin/license.php' );

/****************************************************************/


/***** Если нужно добавить какой-то код в functions.php, разместите его под этой строкой *******/
