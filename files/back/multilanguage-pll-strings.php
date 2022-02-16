<?php
 
// добавляем строки для перевода через панель "Строки переводов" в Polylang
if ( !is_admin() ) {
	add_filter( 'gettext', 'my_translate_string', 10, 3 );
}
function my_translate_string( $translated_text, $text, $domain ) {
	if ( $domain <> 'gp-resort' || !function_exists( 'pll__' ) ) {
		return $translated_text;
	}
	return pll__( $text );
}

add_action( 'after_setup_theme', 'my_register_polylang_strings' );
function my_register_polylang_strings() {
	if ( function_exists( 'pll_register_string' ) ) {
	pll_register_string('Персональные данные', 'Я даю согласие на сбор и обработку персональных данных', 'gp-resort' ); 
	pll_register_string('Персональные данные', 'Политика конфиденциальности', 'gp-resort' ); 
	pll_register_string('Шапка', 'Звонок или онлайн-чат', 'gp-resort' ); 
	pll_register_string('Поп-ап', 'Позвоните или напишите нам', 'gp-resort' ); 
	pll_register_string('Поп-ап', 'Позвонить', 'gp-resort' ); 
	pll_register_string('Поп-ап', 'WhatsApp', 'gp-resort' ); 
	pll_register_string('Поп-ап', 'Написать в WhatsApp', 'gp-resort' ); 
	pll_register_string('Поп-ап', 'Либо закажите обратный звонок', 'gp-resort' ); 
	pll_register_string('Моб. меню', 'Выбрать язык', 'gp-resort' ); 
	pll_register_string('Моб. меню', 'Меню сайта', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Оборудование номера', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Площадь номера', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Одна односпальная кровать', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Одна двуспальная кровать', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Две односпальных кровати', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Для некурящих', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Кондиционер', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Ванна или душевая кабина', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'ЖК-телевизор', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Сейф', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Бесплатный Wi-Fi', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Банные принадлежности', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Фен', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Холодильник', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Подробности', 'gp-resort' ); 
	pll_register_string('Раздел Номера', 'Посмотреть все номера', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Раннее заселение', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Ресторан', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Салон красоты', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Трансфер', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Питомцы', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Парковка', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Ресепшн 24/7', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Камера хранения', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Завтраки', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Доставка в номер', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Экскурсии', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Wi-Fi', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Конференц-зал', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Бизнес-услуги', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Бассейн', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Спортзал', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Прачечная', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Утюг', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Услуга Будильник', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Визовая поддержка', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Анти-ковид', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Платно', 'gp-resort' ); 
	pll_register_string('Раздел Услуги', 'Бесплатно', 'gp-resort' ); 
	//pll_register_string('Номерной фонд', 'сутки', 'gp-resort' ); 
	pll_register_string('Номерной фонд', 'Подробнее', 'gp-resort' ); 
	pll_register_string('Номерной фонд', 'Хочу такой номер', 'gp-resort' ); 
	pll_register_string('Карточка номера', 'Номера', 'gp-resort' ); 
	pll_register_string('Карточка номера', 'Площадь', 'gp-resort' ); 
	pll_register_string('Карточка номера', 'Стоимость проживания', 'gp-resort' ); 
	pll_register_string('Карточка номера', 'Другие варианты размещения', 'gp-resort' ); 
	pll_register_string('Подвал', 'Справки и бронирование', 'gp-resort' ); 
	pll_register_string('Блог', 'На сайте пока нет записей', 'gp-resort' ); 
	pll_register_string('Блог', 'Показать больше записей', 'gp-resort' );
	pll_register_string('Блог', 'Следующая запись', 'gp-resort' );
	pll_register_string('Блог', 'Предыдущая запись', 'gp-resort' );
	pll_register_string('Блог', 'Продолжение', 'gp-resort' );
	pll_register_string('Блог', 'Поделитесь с друзьями', 'gp-resort' );
	pll_register_string('Поиск', 'Найти', 'gp-resort' ); 
	pll_register_string('Поиск', 'Вы искали', 'gp-resort' );
	pll_register_string('Поиск', 'Найдено публикаций', 'gp-resort' );
	pll_register_string('Контакты', 'Время', 'gp-resort' );
	pll_register_string('Контакты', 'Заезд', 'gp-resort' );
	pll_register_string('Контакты', 'Выезд', 'gp-resort' );
	pll_register_string('Контакты', 'Показать на карте', 'gp-resort' );
	pll_register_string('Контакты', 'Телефоны', 'gp-resort' );
	pll_register_string('Контакты', 'Набрать номер', 'gp-resort' );
	pll_register_string('Контакты', 'Мессенджер', 'gp-resort' );
	pll_register_string('Контакты', 'Открыть чат', 'gp-resort' );
	pll_register_string('Контакты', 'Посетите наш раздел на Booking.com', 'gp-resort' );
	pll_register_string('Контакты', 'Перейти', 'gp-resort' );
	pll_register_string('Страница Спасибо', 'Сообщение отправлено', 'gp-resort' );
	pll_register_string('Комментарии', 'Обсуждение', 'gp-resort' );
	pll_register_string('Комментарии', 'Открыть обсуждение', 'gp-resort' );
	pll_register_string('Комментарии', 'Скрыть обсуждение', 'gp-resort' );
	pll_register_string('Комментарии', 'пока нет комментариев', 'gp-resort' );
	pll_register_string('Комментарии', 'есть 1 комментарий', 'gp-resort' );
	pll_register_string('Комментарии', 'Предыдущие комментарии', 'gp-resort' );
	pll_register_string('Комментарии', 'Новые комментарии', 'gp-resort' );
	pll_register_string('Комментарии', 'Комментирование закрыто', 'gp-resort' );
	pll_register_string('Комментарии', 'Оставить комментарий', 'gp-resort' );
	pll_register_string('Комментарии', 'Отправить', 'gp-resort' );
	pll_register_string('Комментарии', 'Ваш комментарий будет опубликован после проверки администратором', 'gp-resort');
	pll_register_string('Комментарии', 'Сохранить имя и e-mail в этом браузере для моих последующих комментариев', 'gp-resort');
	pll_register_string('Подвал', 'Тема от GoodwinPress', 'gp-resort' );
	pll_register_string('Хлебные крошки', 'Блог', 'gp-resort' );
	pll_register_string('Хлебные крошки', 'Результаты поиска', 'gp-resort' );
	pll_register_string('Хлебные крошки', 'Ошибка 404', 'gp-resort' );
	}
} 