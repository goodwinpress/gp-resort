<?php
// загрузка записей в блоге и архивах через ajax, по клику на кнопку
// решение основано на статье Load More Posts with AJAX by Misha Rudrastyh

function load_more_scripts() {
global $wp_query; 
  
wp_register_script( 'loadmore', get_stylesheet_directory_uri() . '/scripts/loadmore.js', array('jquery') );

wp_localize_script( 'loadmore', 'loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',  
		'posts' => json_encode( $wp_query->query_vars ), 
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
) );
 
wp_enqueue_script( 'loadmore' );
}
add_action( 'wp_enqueue_scripts', 'load_more_scripts' );


function loadmore_ajax_handler(){
 
$args = json_decode( stripslashes( $_POST['query'] ), true );
$args['paged'] = $_POST['page'] + 1; 
$args['post_status'] = 'publish';
// it is always better to use WP_Query but not here
query_posts( $args );
if ( have_posts() ) : 
while ( have_posts() ) : the_post(); 
$titan = TitanFramework::getInstance( 'resort' );

// выбираем тип записей
if ($titan->getOption( 'blog-type' ) == '1') {
get_template_part ('files/front/blog-anons'); 
} else {
get_template_part ('files/front/blog-regular'); 
}
 
endwhile; 
endif; 
die; 
}

add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); 
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); 