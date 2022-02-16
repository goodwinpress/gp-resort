<?php
/*
Template Name: Статическая Главная
*/

// шаблон статической главной, куда подключаем готовые разделы (постер, о нас, номера и т.п.). Сами разделы разделены по файлам и содержатся в gp-resort/home
$titan = TitanFramework::getInstance( 'resort' );

get_header(); 

echo '<main>';

foreach( (array) $titan->getOption('homepage_items' ) as $item) {
	get_template_part('home/home', $item);
} 

echo '</main>';

get_footer(); 
?>