<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<?php
// шаблон шапки сайта
$titan = TitanFramework::getInstance( 'resort' ); ?>

<head>
  <?php 
  // выводим код статистики Google Analytics
  echo $titan->getOption( 'googlecode' ); 
  ?>
  
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="<?php echo $titan->getOption( 'browser' ); ?>">
    <?php
       //подключаем favicon
       if ( ! empty( $titan->getOption( 'favicon' )) ) {
       get_template_part('/files/front/favicon');
       }
       
       //верификация сайта
       echo $titan->getOption('verification');
       
       //выводим facebook pixel, если есть
       echo $titan->getOption('pixel');
    
       wp_head(); 
    ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
  <?php wp_body_open(); ?>
  
  <?php 
     // выводим статистику яндекс метрики (без кнопки)
     echo $titan->getOption( 'yandexcode' ); 
  ?>

<div class="wrap">
 
<header class="gp-clearfix" itemscope itemtype="http://schema.org/WPHeader">
  <div class="flex-port">
  <?php 
     // текстовый заголовок или логотип, на выбор
     if ($titan->getOption( 'site-title' ) == '1') {
       header_text_title();
       } else {
       header_logo_title();
     }
   
     // меню в шапке 
     gp_header_nav();
  
     // выводим переключатель для языков, если активирован Polylang
     gp_lang_select();
  
     // номер телефона + поп-ап с кнопками и заказом звонка
     get_template_part('/files/front/header-contact');
  
     // кнопка открытия мобильного меню
     mob_menu_button();
   ?>
  </div> <!-- end  flex-port -->  
</header> <!-- end header -->