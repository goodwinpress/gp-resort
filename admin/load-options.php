<?php
//выводим на фронт изображения и стили, заданные в консоли темы в разделе Оформление в head
if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly.
}

add_action( 'wp_head', 'titan_fr_head' );
function titan_fr_head() {
$titan = TitanFramework::getInstance( 'resort' );
?>

<style>
<?php
  // подключаем логотип
  if ($titan->getOption( 'site-title' ) == '2') {
  $imageID = $titan->getOption( 'themelogo' );$imageSrc = $imageID; if ( is_numeric( $imageID ) ) { $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); $imageSrc = $imageAttachment[0];} echo '.logo-title a{width:300px;height:90px;display:block;text-indent:-9999px;background-image:url('. esc_url( $imageSrc ).');background-repeat:no-repeat}';
  }
  //чёткость логотипа
  if ($titan->getOption( 'hd-loc' ) == '1') {
  echo '.logo-title a{background-size:cover}';
  }

  // изображение в Постере
  $imageID = $titan->getOption( 'poster-img' );$imageSrc = $imageID; if ( is_numeric( $imageID ) ) { $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); $imageSrc = $imageAttachment[0];} echo '.poster__img, .feedback-container, .contact-page__img-wrapper{background:url('. esc_url( $imageSrc ).'); background-position: center center; background-repeat: no-repeat;background-size:cover}';

  // изображение в разделе О нас
  $imageID = $titan->getOption( 'about-img' );$imageSrc = $imageID; if ( is_numeric( $imageID ) ) { $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); $imageSrc = $imageAttachment[0];} echo '.about-img {background:url('. esc_url( $imageSrc ).'); background-position: center center; background-repeat: no-repeat; background-size: cover}';
  
  // изображение в контактном блоке на странице Контакты
  $imageID = $titan->getOption( 'rooms-contact-img' );$imageSrc = $imageID; if ( is_numeric( $imageID ) ) { $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); $imageSrc = $imageAttachment[0];}
  echo '.call-block-img { background:url('. esc_url( $imageSrc ).');  background-position: center center; background-repeat:no-repeat;  background-size: cover }';
  
  // изображение в выплывающем блоке
  $imageID = $titan->getOption( 'float-block-img' );$imageSrc = $imageID; if ( is_numeric( $imageID ) ) { $imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false ); $imageSrc = $imageAttachment[0];}
  echo '.modal__img-wrapper { background:url('. esc_url( $imageSrc ).'); background-position: center center; background-repeat:no-repeat; background-size: cover}';
  
  // выключить крупные изображения в шапке страниц и постере на моб устройствах
  if ($titan->getOption( 'speed-up' ) == '1') {
  echo '@media only screen and (max-width:600px){.poster__img {background: none !important; height: 190px}.inner-header-img {display: none !important}} @media only screen and (max-width:375px){.poster__img {height: 240px}}';
  }

  // берем данные из раздела Оформление в консоли
  $color = $titan->getOption( 'body-col' );
  $a_link = $titan->getOption( 'alink' );
  $a_hover = $titan->getOption( 'ahover' );
  $drop_nav_bg = $titan->getOption( 'nav-drop-bg' );
  $drop_nav_color = $titan->getOption( 'nav-drop-col' );
  $btn_color = $titan->getOption( 'btn-color' );
  $btn_bg = $titan->getOption( 'btn-bg' );
  $btn_bg_hover = $titan->getOption( 'btn-bg-hov' );
  $icons_bg = $titan->getOption( 'icons-bg' );
  $banner_title_bg = $titan->getOption( 'banner-bg' );
  $float_block_bg = $titan->getOption( 'float-block-bg' );
  $float_block_color = $titan->getOption( 'float-block-col' );
  
  // и помещаем их в свойства селекторов в head
  echo 'body {color:' .$color. '}';
  echo 'a {color:' .$a_link. '}';
  echo 'a:hover, .header-phone:hover {color:' .$a_hover. '}';
  echo 'a.vk-icon:hover,a.fb-icon:hover,a.twi-icon:hover,a.tele-icon:hover,a.ytube-icon:hover,.odnkl-icon:hover,a.whats-icon:hover,a.viber-icon:hover{background:' .$a_hover.'}';
  echo '.lang-item.current-lang a {color:' .$a_link. ' !important}'; 
  echo '.lang-item:hover a {color:' .$a_hover. ' !important}';
  echo '.menunav ul li ul {background:' .$drop_nav_bg. '}';
  echo '.menunav ul li ul li a, .menunav ul li ul li a:hover, .sub-menu .menu-item-has-children:before {color:' .$drop_nav_color. '}';
  echo 'a.poster-btn, .popup-call, .video-btn, a.all-rooms-btn,.color-button, .modal .close:before,.comment-form input[type="submit"] {background-color:'.$btn_bg.'; color:'.$btn_color.'}';
  echo 'a.poster-btn:hover, a.popup-btn:hover, .about-img__button-wrapper:hover .video-btn, a.all-rooms-btn:hover,.color-button:hover,.transparent-button:hover, .wpcf7 input[type="submit"]:hover,.comment-form input[type="submit"]:hover, a.room-hover-btn:hover,.service-icon:hover:before {background-color:'.$btn_bg_hover.'; color:'.$btn_color.'}';
  echo '.transparent-button, .wpcf7 input[type="submit"]{color:' .$color. ';border:1px solid ' .$color. '}';
  echo '.transparent-button:hover,.wpcf7 input[type="submit"]:hover,  a.room-hover-btn:hover{border-color:'.$btn_bg_hover.'}';
  echo '.benefit-item span, .service-icon:before, .call-block-text:before, .single-room__icons-block .room-icons,.contact-page__item.contact-list__phone:before, .contact-page__item.contact-list__chat:before, .contact-page__item.contact-list__adress:before, .booking:before,.contact-page__item:after {background-color:'.$icons_bg. '}';
  echo '.gp-banner span{background-color:'.$banner_title_bg.'}';
  echo '.modal{background-color:'.$float_block_bg.'; color:'.$float_block_color.'}';
  echo '.modal__content a{color:'.$float_block_color.'}';
  echo '@media only screen and (max-width:1460px){.sub-menu{background:' .$drop_nav_bg. '}}';
  echo '.owl-dot.active span,.owl-dot:hover span{background:'.$btn_bg.'}';
  echo '.owl-dot span{background:'.$btn_bg_hover.'}';
  echo '.owl-dot.active{border:1px solid '.$btn_bg.'}';
  echo '.owl-dot{border-color:'.$btn_bg.'}';
  
  // убираем маску, если выключено видео в разделе О нас
  if ($titan->getOption( 'video-loc' ) == '1') { 
  echo '.about-img:before {content: ""; background: #000; opacity: .15; position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1}';
  }
  
  // убираем бордюр, если в разделе Номера включен режим показывать все
  if ($titan->getOption( 'rooms-view-loc' ) == '2') {  
  echo '.rooms-home-container:before {content: ""; width: 100%; height: 1px; background: #e6e6e6; position: absolute; bottom:-90px; left: 0; right: 0; z-index: -1 }
  .rooms-home-container {margin-bottom:0}';
  }

  // меняем отступы в шапке в зависимости от статуса polylang
  if(in_array('polylang/polylang.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
    echo '.header-phone   {  margin-left: 0  }';
  } else {
    echo '.header-phone   {  margin-left: auto  }';
  }
  
  // меняем отступы контейнера в карточке Номера, если выключена кнопка Хочу такой номер, на некоторых экранах
  echo '@media only screen and (max-width:1180px){';
  if ($titan->getOption( 'single-room-popup-btn-loc' ) == '1') {  
  echo '.single-room__info {margin-bottom: 2.8rem}';
  } else {
  echo '.single-room__info {margin-bottom: 0.5rem}';
  }
  echo '}';

  // спойлер для комментариев
  if ($titan->getOption( 'com-spoiler-loc' ) == '1') { 
    echo '.toggle-comments{width:100%;float:left;text-align:center;font-size:.8rem;letter-spacing:.5px; cursor:pointer;text-transform:uppercase;padding:16px 0; transition:all 0.3s ease-in; color:' .$color. ';position:relative;margin:40px 0 20px; border:1px solid ' .$color. '; font-weight:700;} .toggle-comments:hover, .toggle-comments.opened:hover {background:'.$btn_bg_hover.'; color:'.$btn_color.'; border-color:'.$btn_bg_hover.'}';
    echo '.toggle-comments:before{content:"'. esc_attr__('Открыть обсуждение', 'gp-resort') .'"}';
    echo '.toggle-comments.opened:before{content:"'. esc_attr__('Cкрыть обсуждение', 'gp-resort') .'"}';
    echo '.toggle-comments.opened{padding:15px;display:inline-block;margin:40px 0}.comments-box.open{height:auto;display:block; margin:50px 0 0;overflow:visible}.comments-box{height:0; display:none; width:100%;float:left; overflow:hidden}';
  } else {
    echo '.comments-box{height:auto; width:100%;float:left; overflow:hidden; margin-top:50px}';
  }
  
  // перенос кнопки вверх справа налево
  if ($titan->getOption( 'backtop-loc' ) == '1') {
  echo '.backtop{left: 30px}  @media only screen and (max-width:414px){.backtop{left: 10px}}';
  } else {
  echo '.backtop{right: 30px}   @media only screen and (max-width:414px){.backtop{right: 10px}}';
  }
?>
</style>
<?php
}