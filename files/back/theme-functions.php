<?php
// добавляем микроразметку в меню
function add_menu_atts( $atts, $item, $args ) {
$atts['itemprop'] = 'url';
return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_atts', 10, 3 );

// добавляем микроразметку к изображениям
function add_image_atts($content) { 
global $post; 
$pattern = "<img"; 
$replacement = '<img itemprop="image"'; 
$content = str_replace($pattern, $replacement, $content); 
return $content; } 
add_filter('the_content', 'add_image_atts'); 

// создаем анонс
function truncate_post($amount,$echo=true,$post='') {
global $shortname; 
if ( $post == '' ) global $post; 
$postExcerpt = '';
$postExcerpt = $post->post_excerpt;
if (get_option($shortname.'_use_excerpt') == 'on' && $postExcerpt <> '') { 
if ($echo) echo $postExcerpt;
else return $postExcerpt; 
} else {
$truncate = $post->post_content;    
$truncate = preg_replace('@\[caption[^\]]*?\].*?\[\/caption]@si', '', $truncate);   
if ( strlen($truncate) <= $amount ) $echo_out = ''; else $echo_out = '...';
$truncate = apply_filters('the_content', $truncate);
$truncate = preg_replace('@<script[^>]*?>.*?</script>@si', '', $truncate);
$truncate = preg_replace('@<style[^>]*?>.*?</style>@si', '', $truncate);  
$truncate = strip_tags($truncate);
if ($echo_out == '...') $truncate = substr($truncate, 0, strrpos(substr($truncate, 0, $amount), ' '));
else $truncate = substr($truncate, 0, $amount);
if ($echo) echo $truncate,$echo_out;
else return ($truncate . $echo_out);
};
}


// декларируем совместимость с woocommerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
add_theme_support( 'woocommerce' );
}

// отключаем стили галереи по-умочалнию
add_filter( 'use_default_gallery_style', '__return_false' );

// увеличим ширину текстового поля в редакторе
function custom_admin_css() {
echo '<style type="text/css">
/* Main column width */
.wp-block {
max-width: 800px;
}
/* Width of "wide" blocks */
.wp-block[data-align="wide"] {
max-width: 1080px;
}
/* Width of "full-wide" blocks */
.wp-block[data-align="full"] {
max-width: none;
}
</style>';
}
add_action('admin_head', 'custom_admin_css');


// меню в шапке
add_action('gp_navigation_menu_header', 'gp_header_nav');
function gp_header_nav() {
echo'<nav id="menu" class="menunav gp-clearfix" itemscope itemtype="http://www.schema.org/SiteNavigationElement">';
$menu = wp_nav_menu( array( 
'theme_location' => 'primary',
'container' => '', 
'container_class' => '',
'menu_class' => 'top-menu', 
'link_before'   => '<span itemprop="name">',
'link_after'   => '</span>'
));
echo strip_tags( $menu , '<ul><li><a>');
echo'</nav><!-- end menunav -->';
}

// мобильное меню
add_action('gp_navigation_menu_mob', 'gp_mobile_nav');
function gp_mobile_nav($profile_phone1, $profile_whatsapp) {
echo '<div class="mob-menu">';
if(in_array('polylang/polylang.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
echo '<div class="mob-menu__info">';
echo '<span class="mob-menu__title">' . __('Выбрать язык', 'gp-resort') . '</span>';
echo '<ul class="pl-lang-select">';
pll_the_languages( array( 'show_flags' => 0,'show_names' => 1 ) );
echo '</ul></div>';
} 
echo '<span class="mob-menu__title">' . __('Меню сайта', 'gp-resort') . '</span>';
$menu = wp_nav_menu( array( 
'theme_location' => 'primary',
'menu_class' => 'top-mob-menu',
));
echo strip_tags( $menu , '<ul><li><a>'); 
echo '<span class="mob-menu__title">' . __('Звонок или онлайт-чат', 'gp-resort') . '</span>';
$vars = array('(', ')', ' ','-');
echo '<a href="tel:' . str_replace($vars, '', $profile_phone1) .'" class="popup-btn popup-call">' . __('Позвонить', 'gp-resort') . '</a>';
$vars = array('+', '(', ')', ' ','-');
echo '<a href="https://wa.me/' . str_replace($vars, '', $profile_whatsapp) .'" class="popup-btn popup-chat">' . __('WhatsApp', 'gp-resort') . '</a>';
echo '</div>';
}

 
// миниатюра в блоге и рубриках
add_action( 'gp_home_news_thumb', 'blog_thumbnail' );
function blog_thumbnail() {
if(has_post_thumbnail()):
echo '<figure class="blog-thumbnail"><a href="' .get_permalink(). '">';
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' );  
$image = aq_resize( $img_url, 300, 300, true  );  
echo '<img data-src="' .$image. '" alt="' .get_the_title(). '" width="300" height="255">';
echo '</a></figure>';
endif; 
}

// кнопка открытия мобильного меню
add_action( 'gp_header', 'mob_menu_button' );
function mob_menu_button() {
echo '<div class="open_mob"><button class="hamburger hamburger--spin" type="button">
<span class="hamburger-box"><span class="hamburger-inner"></span></span> 
</button></div>';
}

// кнопка триггер для открытия субменю в мобильной навигации
function gp_menu_arrow($item_output, $item, $depth, $args) {
if (in_array('menu-item-has-children', $item->classes)) {
$arrow = '<div class="menu-trigger"></div>';
$item_output = str_replace('</a>', '</a>'. $arrow .'', $item_output);
}
return $item_output;
}
add_filter('walker_nav_menu_start_el', 'gp_menu_arrow', 10, 4);

 
// текстовый заголовок в шапке
add_action( 'gp_header', 'header_text_title' );
function header_text_title() {
echo '<div class="site-title text-title">';
if( is_front_page() ) {
echo '<h1 itemprop="name"><a href="' .esc_url( home_url( '/' ) ). '">' .get_bloginfo('name'). '</a></h1>';
} else {
echo '<span itemprop="name"><a href="' .esc_url( home_url( '/' ) ). '">' .get_bloginfo('name'). '</a></span>';
}
echo '</div><!-- end site-title text-title -->';
}

// логотип в шапке
add_action( 'gp_header', 'header_logo_title' );
function header_logo_title() {
echo '<div class="site-title logo-title">';
if( is_front_page()  ) {
echo '<h1 itemprop="name"><a href="' .esc_url( home_url( '/' ) ). '">' .get_bloginfo('name'). '</a></h1>';
} else {
echo '<span itemprop="name"><a href="' .esc_url( home_url( '/' ) ). '">' .get_bloginfo('name'). '</a></span>';
}
echo '</div><!-- end site-title logo-title -->';
}
 
// описание в архивах
add_action( 'gp_archive', 'cat_description' );
function cat_description() {
$description = get_the_archive_description();
if( ! empty( $description) )  {
echo '<div class="archive-desc">';
the_archive_description();
echo '</div>';
 } 
}

// отключение сайдбара в записях и страницах
add_action('add_meta_boxes', 'gp_sidebar');
function gp_sidebar(){
add_meta_box('gp_sidebar', 'Выключить сайдбар', 'gp_sidebar_option', array('post', 'page'), 'side','high');
}

function gp_sidebar_option( $post, $meta ){
$screens = $meta['args'];
wp_nonce_field( plugin_basename(__FILE__), 'gp_sidebar_nonce' );
$value = get_post_meta( $post->ID, 'gp_sidebar', 1 );
echo '<p><label for="gp_sidebar">' . __("Боковая колонка (сайдбар)", 'gp-resort' ) . '</label><p>';
echo '<p><select name="gp_sidebar" id="gp_sidebar">';
echo '<option' . selected( get_post_meta($post->ID, 'gp_sidebar', true), 'Включить' ) .'>Включить</option>';
echo '<option' . selected( get_post_meta($post->ID, 'gp_sidebar', true), 'Выключить' ) . '>Выключить</option>';
echo '</select><p>';
}

add_action( 'save_post', 'gp_sidebar_save_postdata' );
function gp_sidebar_save_postdata( $post_id ) {
if ( ! isset( $_POST['gp_sidebar'] ) )
return;
if ( ! wp_verify_nonce( $_POST['gp_sidebar_nonce'], plugin_basename(__FILE__) ) )
return;
if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
return;
if( ! current_user_can( 'edit_post', $post_id ) )
return;
$gp_data = sanitize_text_field( $_POST['gp_sidebar'] );
update_post_meta( $post_id, 'gp_sidebar', $gp_data );
}

// изображение внутри записи (single)
add_action( 'gp_thumbs', 'single_thumbnail' );
function single_thumbnail() {
if(has_post_thumbnail()):
$thumb = get_post_thumbnail_id();
$image_attributes = wp_get_attachment_image_src( $thumb, 'full' );
echo '<figure class="single-thumb"><img data-src="' .$image_attributes[0] . '" alt="'. get_the_title() . '" width="' . $image_attributes[1] . '" height="' . $image_attributes[2] . '"></figure>';
endif; 
}

// оптимизируем разметку в навигации внутри записей
add_filter('navigation_markup_template', 'my_navigation_markup_template');
function my_navigation_markup_template() {
return '<nav class="navigation %1$s" role="navigation"><div class="nav-links">%3$s</div></nav>';
}

// миниатюра для виджета Свежие записи
add_action( 'gp_thumbs', 'small_thumbnail' );
function small_thumbnail() {
if(has_post_thumbnail()):
echo '<figure class="small-thumbnail"><a href="' .get_permalink(). '">';
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' );  
$image = aq_resize( $img_url, 90, 90, true, true, true );  
echo '<img data-src="' .$image. '" alt="' .get_the_title(). '" width="90" height="90">';
echo '</a></figure>';
endif; 
}
 
// выводим  текстовое поле комментариев по-старинке, под полями автор, почта etc
 add_filter( 'comment_form_fields', 'comment_form_fields', 99 );
 function comment_form_fields( $fields ) {
 if ( isset( $fields['comment'] ) ) {
 $comment_field = $fields['comment'];
 unset( $fields['comment'] );
 $fields['comment'] = $comment_field;
 }
 return $fields;
 }

// переключатель языков для polylang
add_action('gp_header', 'gp_lang_select');
function gp_lang_select() {
if(in_array('polylang/polylang.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
echo '<ul class="pl-lang-select">';
pll_the_languages( array( 'show_flags' => 0,'show_names' => 1 ) );
echo '</ul>';
} 
} 

// фото или аватар автора отзыва в разделе Отзывы на главной странице
add_action('gp_thumbs', 'gp_feedback_thumbnail');
function gp_feedback_thumbnail($imageID) { 
$imageSrc = $imageID;  
if ( is_numeric( $imageID ) ) { 
   $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); 
   $imageSrc = $imageAttachment[0];
}  
$image = aq_resize( $imageSrc, 110, 110, true, true, true );  
echo '<img class="client-img owl-lazy" data-src="' .$imageSrc. '" alt="отзыв" width="110" height="110">';
 } 

// карусель в разделе Фотогалерея на главной странице
add_action('gp_thumbs', 'gp_homepage_gallery');
function gp_homepage_gallery($gallery) { 
foreach( $gallery as $item ) {
  $imageSrc = $item; 
  if ( is_numeric( $item ) ) { $imageAttachment = wp_get_attachment_image_src( $item, $size = 'full', $icon = false ); 
  $imageSrc = $imageAttachment[0];
}
$attachment_url =  $imageSrc;
$image = aq_resize($attachment_url, 478, 388, true, true, true);
$imageCapt =  wp_get_attachment_caption( $item );
?>
<div class="home-gallery-item">
<a rel="lightbox" href="<?php echo $imageSrc; ?>"><img class="owl-lazy" data-src="<?php echo $image; ?>" alt="<?php echo $imageCapt; ?>" width="478" height="388"></a>
</div>
<?php } 
}
 
// изображение в шапке страницы Номерой фонд
add_action('gp_thumbs', 'gp_rooms_archive_img');
function gp_rooms_archive_img($imageID) { 
$imageSrc = $imageID; if ( is_numeric( $imageID ) ) { $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); $imageSrc = $imageAttachment[0];}
$attachment_url =  $imageSrc;
$image = aq_resize($attachment_url, 1920, 500, true, true, true);
echo '<img class="inner-header-img" data-src="' .$image. '" alt="' .get_the_title(). '" width="1920" height="500">';
}


// изображение в шапке блога
add_action('gp_thumbs', 'gp_blog_img');
function gp_blog_img($imageID ) { 
$imageSrc = $imageID; if ( is_numeric( $imageID ) ) { $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); $imageSrc = $imageAttachment[0];}
$attachment_url =  $imageSrc;
$image = aq_resize($attachment_url, 1920, 500, true, true, true);
echo '<img class="inner-header-img" data-src="' .$image. '" alt="' .get_the_title(). '" width="1920" height="500">';
 
}
 
// устанавливаем ссылку для режима Обычный пост
function modify_read_more_link() {
return '<a class="gp-button transparent-button" href="' . get_permalink() . '">'. __('Подробнее', 'gp-resort') . '</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );
 
 
// отключение сайдбара
add_action('gp_blog', 'gp_main_fullwidth');
function gp_main_fullwidth( $sidebar_loc) { 
if ($sidebar_loc == 'Выключить') {
      echo '<main>';
    } else { 
      echo ' <main class="main-single">';
    }
}

// отключение сайдбара
add_action('gp_blog', 'gp_sidebar_off');
function gp_sidebar_off( $sidebar_loc) { 
if ($sidebar_loc == 'Выключить') {
} else {
get_sidebar('single');
} 
}

// внутренняя навигация 
add_action('gp_single', 'gp_single_post_navigation');
function gp_single_post_navigation() { 
$gp_next_label     = esc_html__( 'Следующая запись', 'gp-resort' );
$gp_previous_label = esc_html__( 'Предыдущая запись', 'gp-resort' );

the_post_navigation(
     array(
       'next_text' => '<p class="meta-nav">' . $gp_next_label .   '</p><p class="post-title">%title</p>',
       'prev_text' => '<p class="meta-nav">' .  $gp_previous_label . '</p><p class="post-title">%title</p>',
     )
   );
}

// навигация в поиске
add_action('gp_search', 'gp_search_pagination');
function gp_search_pagination() { 
the_posts_navigation( array(
  'prev_text'          => __('Назад', 'gp-resort' ),
  'next_text'          => __('Вперёд', 'gp-resort' ),
  'screen_reader_text' => __('Навигация', 'gp-resort' )
) ); 
}
 
// изображение в шапке страницы Контакты
add_action('gp_thumbs', 'gp_contact_page_img');
function gp_contact_page_img($imageID) { 
$imageSrc = $imageID; if ( is_numeric( $imageID ) ) { $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); $imageSrc = $imageAttachment[0];}
$attachment_url =  $imageSrc;
$image = aq_resize($attachment_url, 1920, 500, true, true, true);
echo '<img class="inner-header-img" data-src="' .$image. '" alt="' .get_the_title(). '" width="1920" height="500">';
}


// добавляем календарь в форму CF7
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );


// дополнительные поля формы CF7 для передачи в сообщение
if ( function_exists( 'wpcf7' )) {
function cf7_extra_fields_func() {
$current_id = get_the_ID();
$price = get_post_meta($current_id, 'roomprice', true); 

$html = '';
$html .= '<input type="hidden" name="room-title" value="'.get_the_title().'" />';
if( ! empty( $price) )  {
$html .= '<input type="hidden" name="room-price" value="'. $price .'" />';
}
$html .= '<input type="hidden" name="room-url" value="'.get_the_permalink().'" />';
return $html;
}
wpcf7_add_form_tag('cf7_extra_fields', 'cf7_extra_fields_func');
}