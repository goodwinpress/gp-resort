<?php
// подключаем консоль темы
if (! defined('ABSPATH')) {
  exit;
}
 
add_action( 'tf_create_options', 'resort_create_options' );
function resort_create_options() {
$titan = TitanFramework::getInstance( 'resort' );
$adminPanel = $titan->createAdminPanel( array(
    'name' => 'GP RESORT',
));

$adminPanel->createOption( array(
'name' => 'О теме',
'type' => 'heading',
));

$adminPanel->createOption( array(
'type' => 'note',
'desc' => '<img src="/wp-content/themes/gp-resort/screenshot.png" style="width:500px; float:left; margin:0 40px 30px 0" alt="">
<p><br /> "GP Resort" - новая тема от Гудвина для создания сайта гостиницы, гостевого дома на основе CMS WordPress. Красивый, быстрый, оптимизированный шаблон с мощным функционалом по демонстрации номеров.</p><br /><p>Вы находитесь в консоли темы, где расположены пункты настройки. Здесь вы можете наполнить контентом разделы темы, перекрасить основные её элементы, добавить статистику,  включить / отключить разные блоки и т.п.</p><br /><p>Чтобы изучить все возможности, ознакомьтесь с инструкцией, которая  предоставлена  вместе с темой.  Инструкция находится в файле readme.html и открывается при помощи любого браузера. В ней описаны все опции темы, рассказано, что и как настроить.</p><br /><p>Для клиентов работает бесплатная и бессрочная техподдержка.  Вы получаете ее все время, пока пользуетесь темой. Если нужна помощь, <a href="https://goodwinpress.ru/contact/" target="_blank">нажмите сюда</a> и напишите о возникшей проблеме.</p> <br /><p>GoodwinPress <a href="https://vk.com/alexey.goodwinpress" target="_blank" rel="nofollow">ВКонтакте</a> &nbsp; &middot; &nbsp;  GoodwinPress в <a href="https://twitter.com/goodwinpress/" target="_blank" rel="nofollow">Twitter</a>&nbsp; &middot; &nbsp; 
  GoodwinPress в <a href="https://www.facebook.com/goodwinpress/" target="_blank" rel="nofollow">Facebook</a>&nbsp; &middot; &nbsp; 
GoodwinPress в  <a href="https://t.me/goodwinpress/" target="_blank" rel="nofollow">Telegram</a></p><br />'
));

$adminPanel->createOption( array(
'name' => 'Другие темы от GoodwinPress:',
'type' => 'heading',
));

$adminPanel->createOption( array(
'type' => 'note',
'desc' => '<p>Если пожелаете приобрести какой-нибудь другой шаблон от GoodwinPress, постоянным клиентам предоставляется скидка 25 процентов.</p>
<br /><p>
<a href="https://www.goodwinpress.ru/wp-tema-blogpost-3/" target="_blank"><img class="panel-img" src="/wp-content/themes/gp-resort/img/gpress/bp3.jpg" width="400" alt="BlogPost 3"></a>
<a href="https://www.goodwinpress.ru/wp-tema-law-factory/" target="_blank"><img class="panel-img" src="/wp-content/themes/gp-resort/img/gpress/lawfactory.jpg" width="400" alt="Law Factory"></a>
<a href="https://www.goodwinpress.ru/tema-wp-commander/" target="_blank"><img class="panel-img" src="/wp-content/themes/gp-resort/img/gpress/wpcomm.jpg" width="400" alt="WP Commander"></a>
</p>'
));

$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => 'Профиль',
  'id'=> 'profile-options',
));
 
$normalPanel->createOption( array(
'type' => 'note',
'desc' => 'Заполните профиль. Указанные данные будут использованы при выводе контактных блоков, поп-апов, в микроразметке, подвале, номерах. ',
  ));

$normalPanel->createOption( array(
 'name' => 'Название',
 'id' => 'profile-name-default',
 'type' => 'text',
 'desc' => 'Название отеля, гостевого дома.',
 'default' => 'Название отеля',
)); 

$normalPanel->createOption( array(
  'name' => 'Валюта',
  'type' => 'heading',
) );

$normalPanel->createOption( array(
'name' => 'Валюта',
'id' => 'currency',
'type' => 'radio',
'options' => array(
'RUB' => 'Рубль',
'UAH' => 'Гривна',
'KZT' => 'Тенге',
'USD' => 'Доллар',
'EUR' => 'Евро',
),
'default' => 'RUB',
 'desc' => 'Выберите валюту, в которой будет представлена стоимость проживания на сайте.'
) );

$normalPanel->createOption( array(
  'name' => 'Раписание',
  'type' => 'heading',
) );

$normalPanel->createOption( array(
  'name' => 'Время заезда',
  'id' => 'profile-in',
  'type' => 'text',
  'desc' => 'Укажите время заезда',
  'default' => '14:00',
));

$normalPanel->createOption( array(
'name' => 'Время выезда (рассчетный час)',
'id' => 'profile-out',
'type' => 'text',
'desc' => 'Укажите время выезда',
 'default' => '12:00',
));

$normalPanel->createOption( array(
  'name' => 'Локация',
  'type' => 'heading',
) );

$normalPanel->createOption( array(
'name' => 'Город',
'id' => 'profile-city-default',
'type' => 'text',
'desc' => 'Название города или населенного пункта.',
'default' => 'Название населенного пункта',
));   

$normalPanel->createOption( array(
'name' => 'Адрес',
 'id' => 'profile-adress-default',
 'type' => 'text',
  'desc' => 'Адрес, местонахождение.',
 'default' => 'Адрес',
)); 

$normalPanel->createOption( array(
  'name' => 'Контакты',
  'type' => 'heading',
) );

$normalPanel->createOption( array(
'name' => 'Контактный телефон 1',
'id' => 'profile-phone-1',
'type' => 'text',
'desc' => 'Номер для звонков.',
'default' => '(812) 123-45-67',
)); 

$normalPanel->createOption( array(
'name' => 'Контактный телефон 2',
'id' => 'profile-phone-2',
'type' => 'text',
'desc' => 'Номер для звонков.',
'default' => '+7 (921) 123-56-89',
)); 

$normalPanel->createOption( array(
'name' => 'Онлайн-чат WhatsApp',
'id' => 'profile-whatsapp',
'type' => 'text',
'desc' => 'Номер для общения в мессенджере WhatsApp.',
'default' => '+7 (921) 123-56-89',
)); 

$normalPanel->createOption( array(
'name' => 'E-mail',
'id' => 'profile-email',
'type' => 'text',
'desc' => 'Адрес электронной почты.',
'default' => 'hotel@resort.com',
)); 

$normalPanel->createOption( array(
  'name' => 'Booking.com',
  'type' => 'heading',
) );

$normalPanel->createOption( array(
'name' => 'Booking.com',
'id' => 'profile-booking',
'type' => 'text',
'desc' => 'Адрес вашей страницы на Booking.com.',
'default' => '',
)); 

$normalPanel->createOption( array(
  'name' => 'Социальные сети',
  'type' => 'heading',
));

$normalPanel->createOption( array(
'name' => 'ВКонтакте - включить',
'id' => 'vk-loc',
'type' => 'enable',
'default' => true,
'desc' => 'Включить кнопку ВКонтакте',
) );

$normalPanel->createOption( array(
'name' => 'ВКонтакте - ссылка',
 'id' => 'vk-link',
'type' => 'text',
'desc' => 'Вставьте ссылку на Вашу страницу ВКонтакте.',
'default' => 'https://vk.com',
) );
 
$normalPanel->createOption( array(
'name' => 'Instagram - включить',
'id' => 'inst-loc',
'type' => 'enable',
'default' => true,
'desc' => 'Включить кнопку Instagram',
) );

$normalPanel->createOption( array(
'name' => 'Instagram - ссылка',
'id' => 'inst-link',
'type' => 'text',
'desc' => 'Вставьте ссылку на Вашу страницу в Instagram',
 'default' => 'https://instagram.com',
) );

$normalPanel->createOption( array(
'name' => 'Facebook - включить',
'id' => 'fb-loc',
'type' => 'enable',
 'default' => true,
'desc' => 'Включить кнопку Facebook',
) );

$normalPanel->createOption( array(
'name' => 'Facebook - ссылка',
'id' => 'fb-link',
'type' => 'text',
'desc' => 'Вставьте ссылку на Вашу страницу в Facebook. Например, https://www.facebook.com/goodwinpress/',
'default' => 'https://facebook.com',
) );

$normalPanel->createOption( array(
'name' => 'Twitter - включить',
'id' => 'twi-loc',
'type' => 'enable',
'default' => false,
'desc' => 'Включить кнопку Twitter',
) );

$normalPanel->createOption( array(
'name' => 'Twitter - ссылка',
'id' => 'twi-link',
'type' => 'text',
'desc' => 'Вставьте ссылку на Вашу страницу в Twitter. Например, https://twitter.com/goodwinpress/',
'default' => 'https://twitter.com',
));

$normalPanel->createOption( array(
'name' => 'Telegram - включить',
'id' => 'tg-loc',
 'type' => 'enable',
'default' => true,
 'desc' => 'Включить кнопку Telegram',
) );

$normalPanel->createOption( array(
'name' => 'Telegram - ссылка',
'id' => 'tg-link',
 'type' => 'text',
'desc' => 'Вставьте ссылку на Ваш аккаунт в Telegram. Например, https://t.me/goodwinpress/',
'default' => 'https://telegram.org',
));

$normalPanel->createOption( array(
'name' => 'YouTube - включить',
'id' => 'yt-loc',
 'type' => 'enable',
'default' => true,
'desc' => 'Включить кнопку YouTube',
) );

$normalPanel->createOption( array(
'name' => 'YouTube - ссылка',
'id' => 'yt-link',
'type' => 'text',
'desc' => 'Вставьте ссылку на Ваш канал в YouTube',
 'default' => 'https://youtube.com',
) );

$normalPanel->createOption( array(
'name' => 'Одноклассники - включить',
'id' => 'od-loc',
'type' => 'enable',
'default' => false,
'desc' => 'Включить кнопку Одноклассники',
) );

$normalPanel->createOption( array(
'name' => 'Одноклассники - ссылка',
'id' => 'od-link',
'type' => 'text',
'desc' => 'Вставьте ссылку на Ваш аккаунт в Одноклассниках',
'default' => 'https://odnoklassniki.ru',
) );

$normalPanel->createOption( array(
  'type' => 'save',
) );


$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => 'Общие настройки',
   'id'=> 'general-options',
));

 $normalPanel->createOption( array(
 'type' => 'note',
 'desc' => 'Здесь настроим элементы, общие для всего сайта - фавикон, персональные данные, валюту сайта и т.д.',
));

$normalPanel->createOption( array(
  'name' => 'Favicon',
   'type' => 'heading',
));

$normalPanel->createOption( array(
'name' => 'Favicon - установить',
'id' => 'favicon',
'type' => 'upload',
'desc' => 'Создайте изображение с нужным рисунком, сохраните в формате png  и загрузите его здесь.',
'default' => '/wp-content/themes/gp-resort/img/demo/icon.png',
) );

$normalPanel->createOption( array(
'name' => 'Персональные данные',
 'type' => 'heading',
) );

$normalPanel->createOption( array(
'name' => 'Подтверждение на сбор персональных данных', 
'id' => 'agree-loc',
'type' => 'radio',
'options' => array(
 '1' => 'Включить подтверждение',
 '2' => 'Не включать',
),
'default' => '1',
 'desc' => 'Оповещение посетителя о том, что он дает согласие на сбор и обработку своих персональных данных при отправке сообщений через формы сайта.'
));

$normalPanel->createOption( array(
'name' => 'Ссылка на текст соглашения',
 'id' => 'policy-url-default',
'type' => 'text',
 'desc' => 'Разместите здесь адрес страницы с документом -  политикой конфиденциальности. Не забываем http:// или https://',
'default' => '',
));
 

$normalPanel->createOption( array(
    'name' => 'Верификация сайта в Google и Яндекс',
    'type' => 'heading',
));

$normalPanel->createOption( array(
'name' => 'HTML-тэг для подтверждения прав на сайт',
'id' => 'verification',
'type' => 'textarea',
'desc' => 'Если нужно подтвердить права на сайт в Яндексе и Гугле, это можно сделать здесь, разместив в данное поле код предложенных Вам html метатэгов. Они будут выводиться в разделе head.',
));

$normalPanel->createOption( array(
    'name' => 'Cтатистика и аналитика',
    'type' => 'heading',
));

$normalPanel->createOption( array(
  'name' => 'Статистика Google Analytics',
  'id' => 'googlecode',
  'type' => 'textarea',
  'desc' => 'Если вы используете статистику от Google Analytics, вставьте код статистики в это поле. Другие счетчики сюда ставить не рекомендуется.',
));

$normalPanel->createOption( array(
    'name' => 'Статистика без кнопки - Яндекс.Метрика',
    'id' => 'yandexcode',
    'type' => 'textarea', 
    'desc' => 'Если вы используете статистику Яндекс.Метрика, вставьте код статистики в это поле.  Другие счетчики сюда ставить не рекомендуется.',
));

$normalPanel->createOption( array(
    'name' => 'Любая статистика с кнопкой',
    'id' => 'anycode',
    'type' => 'textarea', 
    'desc' => 'Если у вас имеется  счетчик  с кнопкой типа LiveInternet или Mail.ru, кнопка каталога, или Яндекс Метрика с кнопкой-информером,  поставьте их код в это поле.',
));

$normalPanel->createOption( array(
    'name' => 'Пиксель Facebook',
    'id' => 'pixel',
    'type' => 'textarea', 
    'desc' => 'Если у вас есть код Пикселя Facebook, поставьте его в это поле.',
));

$normalPanel->createOption( array(
    'name' => '404 страница',
    'type' => 'heading',
));

$normalPanel->createOption( array(
    'name' => '404 - текст',
    'id' => 'text404-default',
    'type' => 'textarea', 
    'desc' => 'Впишите свой текст для 404 страницы или используйте текст по умолчанию.',
    'default'=> 'Дорогой посетитель! Страница, которую Вы искали, не существует, либо была перемещена на другой адрес. Перейдите на <a href="/">Главную</a>, где собран весь основной контент. Либо посмотрите несколько наших недорогих и комфортных номеров. Спасибо!',
));
 
$normalPanel->createOption( array(
  'name' => 'Кнопка Вверх в подвале',
  'type' => 'heading',
  ));
  
$normalPanel->createOption( array(
'name' => 'Перенести кнопку Вверх на левую сторону?',
'id' => 'backtop-loc',
 'type' => 'checkbox',
'default' => false,
'desc' => 'Если вы используете онлайн-чат типа Jivo, кнопку звонка или мессенджера, перенесите кнопку Вверх на левую сторону сайта, чтобы все данные элементы не накладывались друг на друга.',
));

  $normalPanel->createOption( array(
  'name' => 'Ссылка GoodwinPress',
  'type' => 'heading',
));

$normalPanel->createOption( array(
 'name' => 'GoodwinPress',
'id' => 'gpr-loc',
 'type' => 'enable',
 'default' => true,
  'desc' => 'Авторская индексируемая ссылка в подвале сайта, вкл / выкл',
  ) );
  
$normalPanel->createOption( array(
  'type' => 'save',
) );

$normalPanel = $adminPanel->createAdminPanel( array(
    'name' => 'Шапка',
    'id'=> 'header',
) );

 $normalPanel->createOption( array(
    'type' => 'note',
    'desc' => 'Здесь включим и настроим элементы шапки (все, кроме меню, поскольку оно создаётся и настраивается независимо от темы, в админке сайта в разделе "Внешний вид > Меню").',
));

$normalPanel->createOption( array(
    'name' => 'Заголовок сайта',
    'type' => 'heading',
));

$normalPanel->createOption( array(
  'name' => 'Текст или логотип',
  'id' => 'site-title',
  'type' => 'select',
  'desc' => 'Выберите, что выводить - текст или логотип. <br />Если выбран текст, то в шапке будет выводиться заголовок, заданный вами в <a target="_blank" href="options-general.php">настройках в админке</a>.',
    'options' => array(
        '1' => 'Текст',
        '2' => 'Логотип',
        ),
     'default' => '2',
) );

$normalPanel->createOption( array(
   'name' => 'Если выбран логотип',
   'id' => 'themelogo',
   'type' => 'upload',
   'desc' => 'Если выбран логотип - загрузите его здесь. <br />Рекомендуемый размер логотипа - 300х90 пикс. ',
   'default' => '/wp-content/themes/gp-resort/img/demo/logo.png'
) );

$normalPanel->createOption( array(
    'name' => 'Повышенная чёткость логотипа',
    'id' => 'hd-loc',
    'type' => 'checkbox',
    'default' => true,
    'desc' => 'Создайте и загрузите логотип в 2 раза больше размером (600x180 пикс.), после чего поставьте здесь галочку. ',
 ) );
 
$normalPanel->createOption( array(
    'name' => 'Поп-ап в шапке',
    'type' => 'heading',
));
 
$normalPanel->createOption( array(
  'name' => 'Заказ звонка',
  'id' => 'header-shortcode-default',
  'type' => 'text', 
  'desc' => 'Создайте форму для заказа звонка при помощи плагина Contact Form7 и разместите здесь ее шорткод. Остальные данные берем из Профиля.',
  'default'=> '',
));

$normalPanel->createOption( array(
    'type' => 'save',
) );


$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => 'Главная страница',
  'id'=> 'forntpage-options',
) );

$normalPanel->createOption( array(
'name' => 'Разделы статической главной страницы',
'type' => 'heading',
) );

$normalPanel->createOption( array(
'name' => 'Готовые разделы',
'id' => 'homepage_items',
'type' => 'sortable',
'desc' => 'Включить, отключить, поменять местами разделы статической главной страницы.',
'options' => array(
'poster' => '1. Постер',
'tline' => '2. TravelLine',
'about' => '3. О нас',
'rooms' => '4. Номера',
'services' => '5. Сервисы',
'feedback' => '6. Отзывы',
'custom-content1' => '7. Произвольный контент 1',
'custom-content2' => '8. Произвольный контент 2',
'gallery' => '9. Фотогалерея',
),
'default' => array( 'poster', 'tline', 'about', 'services', 'feedback' )
) );

$normalPanel->createOption( array(
  'type' => 'save',
) );


$normalPanel = $adminPanel->createAdminPanel( array(
    'name' => '&middot; Постер',
    'id'=> 'slider-options',
));

$normalPanel->createOption( array(
    'type' => 'note',
    'desc' => 'В этом разделе включим и настроим Постер на Главной странице.',
));

$normalPanel->createOption( array(
  'name' => 'Постер - изображение',
  'id' => 'poster-img',
  'type' => 'upload',
  'desc' => 'Установите изображение в Постер. Рекомендуемый размер - 1920х650 пикс. Вес - как можно меньше. Для экономии, данная картинка также будет использована в фоне раздела Отзывы и на странице Контакты. ',
  'default' => '/wp-content/themes/gp-resort/img/demo/poster-img.jpg'
));

$normalPanel->createOption( array(
  'name' => 'Заголовок постера',
  'id' => 'poster-title-default',
  'type' => 'text', 
  'desc' => 'Впишите заголовок постера.',
  'default'=> 'Отдых для Вас и Вашей семьи на побережье Чёрного моря',
));

$normalPanel->createOption( array(
  'name' => 'Текст постера',
  'id' => 'poster-desc-default',
'type' => 'textarea', 
  'desc' => 'Впишите текст постера.',
  'default'=> 'Посетите наш замечательный отель. Наша динамично развивающаяся команда молодых профессионалов сделает Ваш отдых незабываемым!',
));

$normalPanel->createOption( array(
  'name' => 'Кнопка - текст',
  'id' => 'poster-btn-default',
  'type' => 'text', 
  'desc' => 'Разместите текст на кнопке.',
  'default'=> 'Текст на кнопке',
));

 $normalPanel->createOption( array(
   'name' => 'Кнопка - ссылка',
   'id' => 'poster-btn-url-default',
   'type' => 'text', 
   'desc' => 'Разместите адрес страницы, которая откроется по клику на кнопку.',
   'default'=> '',
 ));
 
$normalPanel->createOption( array(
    'type' => 'save',
));


$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => '&middot; Travelline',
  'id'=> 'tline-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'Если вы используете в работе на сайте модуль TL: Отель от TravelLine или аналогичные решения для создания системы бронирования, разместить код скрипта можете в данном разделе.',
) );

$normalPanel->createOption( array(
  'name' => 'Код',
  'id' => 'tl-code',
  'type' => 'textarea',
  'desc' => 'Разместите здесь код модуля.',
  'default' => '',
) );

$normalPanel->createOption( array(
  'type' => 'save',
));

$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => '&middot; О нас',
  'id'=> 'about-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'В этом разделе кратко разместим основную информацию о гостинице. ',
));

$normalPanel->createOption( array(
'name' => 'О нас - левая колонка',
'type' => 'heading',
));

$normalPanel->createOption( array(
  'name' => 'Заголовок раздела',
  'id' => 'about-title-default',
  'type' => 'text',
  'desc' => 'Разместите заголовок',
  'default' => 'Ваш комфортный отдых во время отпуска',
));

$normalPanel->createOption( array(
  'name' => 'Текст',
  'id' => 'about-text-default',
  'type' => 'editor',
  'desc' => 'Разместите текст.',
  'default' => '<p>Посетите наш замечательный отель. Наша динамично развивающаяся команда молодых профессионалов сделает Ваш отдых незабываемым ))</p>',
));

$normalPanel->createOption( array(
  'name' => 'О нас - правая колонка',
  'type' => 'heading',
  ));

$normalPanel->createOption( array(
  'name' => 'Загрузить изображение',
  'id' => 'about-img',
  'type' => 'upload',
  'desc' => 'Установите фото, изображение. Рекомендуемый размер - 700х400 пикс. Вес - как можно меньше.',
'default' => '/wp-content/themes/gp-resort/img/demo/about-img.jpg'
));

$normalPanel->createOption( array(
  'name' => 'Добавить видео?',
  'id' => 'video-loc',
  'type' => 'enable',
  'desc' => 'Добавить поверх изображения кнопку, клик по которой открывает поп-ап с видео-роликом, вкл / выкл.',
  'default' => true,
));
 
$normalPanel->createOption( array(
  'name' => 'Код видео',
  'id' => 'video-code',
  'type' => 'textarea',
  'desc' => 'Разместите здесь код видео-ролика. Это может быть как внешний iframe с Youtube, так и загруженный в медиабиблиотеку файл mp4. Если скорость сайта - максимальный приоритет, не используйте видео вообще.',
  'default' => '',
) );
 
$normalPanel->createOption( array(
    'name' => 'Преимущества, достижения - ячейка 1',
    'type' => 'heading',
    ) );
    
  $normalPanel->createOption( array(
    'name' => 'Число',
     'id' => 'benefit1-number',
    'type' => 'text',
     'desc' => 'Укажите значение, цифру, целое число без пробелов.',
     'default' => '10',
    ) );
    
    $normalPanel->createOption( array(
     'name' => 'Текст',
     'id' => 'benefit1-text-default',
     'type' => 'text',
     'desc' => 'Разместите пояснение, короткий текст, 5-6 слов.',
     'default' => 'лет радушно принимаем гостей',
    ) );
    
  $normalPanel->createOption( array(
      'name' => 'Преимущества, достижения - ячейка 2',
      'type' => 'heading',
   ) );
      
  $normalPanel->createOption( array(
   'name' => 'Число',
     'id' => 'benefit2-number',
    'type' => 'text',
    'desc' => 'Укажите значение, цифру, целое число без пробелов.',
      'default' => '45',
  ) );

 $normalPanel->createOption( array(
     'name' => 'Текст',
      'id' => 'benefit2-text-default',
      'type' => 'text',
      'desc' => 'Разместите пояснение, короткий текст, 5-6 слов.',
      'default' => 'современных комфортных номеров',
  ) );
      
  $normalPanel->createOption( array(
    'name' => 'Преимущества, достижения - ячейка 3',
    'type' => 'heading',
    ) );
    
$normalPanel->createOption( array(
 'name' => 'Число',
  'id' => 'benefit3-number',
  'type' => 'text',
  'desc' => 'Укажите значение, цифру, целое число без пробелов.',
   'default' => '9',
    ) );
    
$normalPanel->createOption( array(
   'name' => 'Текст',
   'id' => 'benefit3-text-default',
   'type' => 'text',
   'desc' => 'Разместите пояснение, короткий текст, 5-6 слов.',
   'default' => 'минут прогулка пешком до пляжа',
    ) );
    
 $normalPanel->createOption( array(
   'name' => 'Преимущества, достижения - ячейка 4',
   'type' => 'heading',
   ) );
   
$normalPanel->createOption( array(
    'name' => 'Число',
    'id' => 'benefit4-number',
    'type' => 'text',
    'desc' => 'Укажите значение, цифру, целое число без пробелов.',
    'default' => '15',
   ) );
   
  $normalPanel->createOption( array(
    'name' => 'Текст',
    'id' => 'benefit4-text-default',
    'type' => 'text',
    'desc' => 'Разместите пояснение, короткий текст, 5-6 слов.',
    'default' => '% скидка по промокоду HOTEL',
   ) ); 

$normalPanel->createOption( array(
  'type' => 'save',
));


$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => '&middot; Номера',
  'id'=> 'rooms-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'Настроим показ раздела Номера на главной странице.',
));

$normalPanel->createOption( array(
    'name' => 'Сценарий раздела', 
    'id' => 'rooms-view-loc',
    'type' => 'radio',
    'options' => array(
    '1' => 'Показать все опубликованные номера',
    '2' => 'Показать только избранные номера',
),
    'default' => '1',
    'desc' => 'Выберите, по какому принципу выводить карточки номеров. Либо все подряд, либо только те, которые вы отметили галочкой в настройках.'
));

$normalPanel->createOption( array(
  'name' => 'Заголовок',
  'id' => 'rooms-title-default',
  'type' => 'text',
  'desc' => 'Разместите заголовок раздела',
  'default' => 'Популярные предложения',
));

$normalPanel->createOption( array(
  'name' => 'Текст',
  'id' => 'rooms-text-default',
  'type' => 'editor',
  'desc' => 'Разместите дополнительный текст, что предлагаем клиентам и почему это хорошо.',
  'default' => '<p>В каждом номере есть санузел, ванна или душевая кабина, кондиционер, ЖК-телевизор и кабельное ТВ, средства гигиены и полотенца.</p>',
));

$normalPanel->createOption( array(
  'type' => 'save',
));


 $normalPanel = $adminPanel->createAdminPanel( array(
   'name' => '&middot; Услуги',
   'id'=> 'service-options',
 ));
 
 $normalPanel->createOption( array(
   'type' => 'note',
   'desc' => 'Настройка услуг, предоставляемых отелем. Здесь размещен список из 21-й предустановленной услуги. Выберите, какие услуги вы предлагаете, включите их и снабдите описанием, если требуется.',
 ));
 
 $normalPanel->createOption( array(
   'name' => 'Заголовок',
   'id' => 'service-title-default',
   'type' => 'text',
   'desc' => 'Разместите заголовок раздела',
   'default' => 'Наши услуги',
 ));
 
 $normalPanel->createOption( array(
   'name' => 'Раннее заселение',
   'type' => 'heading',
   ) );
   
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service1',
   'type' => 'enable',
   'default' => true,
   'desc' => 'Ранее заселение - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service1-fee',
   'type' => 'checkbox',
   'default' => false,
   'desc' => 'Поставьте галочку, если услуга платная.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service1-desc-default',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Заселение раньше расчётного часа',
 ));
 
  
 $normalPanel->createOption( array(
   'name' => 'Ресторан',
   'type' => 'heading',
   ) );
   
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service2',
   'type' => 'enable',
 'default' => false,
   'desc' => 'Есть свой ресторан - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service2-fee',
   'type' => 'checkbox',
   'default' => false,
   'desc' => 'Поставьте галочку, если услуга платная.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service2-desc-default',
    'type' => 'text',
    'desc' => 'Краткое описание услуги',
    'default' => 'Завтраки, обеды, ужины, мероприятия',
  ));
 
 $normalPanel->createOption( array(
   'name' => 'Салон красоты',
   'type' => 'heading',
   ) );
   
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service3',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Есть салон красоты - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service3-fee',
   'type' => 'checkbox',
   'default' => false,
   'desc' => 'Поставьте галочку, если услуга платная.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service3-desc-default',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Парикмахерский зал, косметология, солярий',
 ));
 
 $normalPanel->createOption( array(
   'name' => 'Трансфер',
   'type' => 'heading',
   ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service4',
   'type' => 'enable',
   'default' => true,
   'desc' => 'Трансфер из аэропорта, вокзала и обратно - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service4-fee',
   'type' => 'checkbox',
   'default' => true,
   'desc' => 'Поставьте галочку, если услуга платная.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service4-desc-default',
    'type' => 'text',
    'desc' => 'Краткое описание услуги',
    'default' => 'Заберем из аэропорта или вокзала, отвезем обратно',
  ));
  
 $normalPanel->createOption( array(
   'name' => 'Размещение с питомцами',
   'type' => 'heading',
   ) );
   
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service5',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Размещение с домашними животными - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service5-fee',
   'type' => 'checkbox',
   'default' => false,
   'desc' => 'Поставьте галочку, если услуга платная.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service5-desc-default',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Размещение с домашними животными',
 ));
 
 $normalPanel->createOption( array(
   'name' => 'Парковка',
   'type' => 'heading',
   ) );
   
 $normalPanel->createOption( array(
   'name' => '',
   'id' => 'service6',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Автостоянка у отеля - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service6-fee',
   'type' => 'checkbox',
   'default' => false,
   'desc' => 'Поставьте галочку, если услуга платная.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service6-desc-default',
    'type' => 'text',
    'desc' => 'Краткое описание услуги',
    'default' => 'Автостоянка у отеля',
  ));
  
 $normalPanel->createOption( array(
   'name' => 'Ресепшн 24/7',
   'type' => 'heading',
   ) );
   
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service7',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Круглосуточный ресепшн - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service7-fee',
   'type' => 'checkbox',
   'default' => false,
   'desc' => 'Поставьте галочку, если услуга платная.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service7-desc-default',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Круглосуточный ресепшн',
 ));
 
 $normalPanel->createOption( array(
   'name' => 'Камера хранения',
   'type' => 'heading',
   ) );
   
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service8',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Камера хранения на ресепшене - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service8-fee',
   'type' => 'checkbox',
   'default' => false,
   'desc' => 'Поставьте галочку, если услуга платная.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service8-desc-default',
    'type' => 'text',
    'desc' => 'Краткое описание услуги',
    'default' => 'Камера хранения на ресепшене',
  ));
  
 $normalPanel->createOption( array(
   'name' => 'Завтраки',
   'type' => 'heading',
   ) );
   
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service9',
   'type' => 'enable',
   'default' => true,
   'desc' => 'Завтрак в копмлекте - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service9-fee',
   'type' => 'checkbox',
   'default' => false,
   'desc' => 'Поставьте галочку, если услуга платная.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service9-desc-default',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Завтрак в комплекте',
 ));
 
 $normalPanel->createOption( array(
   'name' => 'Доставка в номер',
   'type' => 'heading',
   ) );
   
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service10',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Доставка в номер еды из ресторана или кафе - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service10-fee',
   'type' => 'checkbox',
   'default' => false,
   'desc' => 'Поставьте галочку, если услуга платная.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service10-desc-default',
    'type' => 'text',
    'desc' => 'Краткое описание услуги',
    'default' => 'Доставка еды в номер',
  ));
  
  $normalPanel->createOption( array(
    'name' => 'Экскурсии',
    'type' => 'heading',
    ) );
    
  $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service11',
    'type' => 'enable',
    'default' => true,
    'desc' => 'Организация экскурсий - вкл / выкл.',
  ) );
  
  $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service11-fee',
    'type' => 'checkbox',
    'default' => true,
    'desc' => 'Поставьте галочку, если услуга платная.',
  ) );
  
  $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service11-desc-default',
    'type' => 'text',
    'desc' => 'Краткое описание услуги',
    'default' => 'Организация экскурсий',
  ));
  
  $normalPanel->createOption( array(
     'name' => 'Wi-Fi',
     'type' => 'heading',
     ) );
     
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service12',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Доступ в интернет - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service12-fee',
    'type' => 'checkbox',
    'default' => false,
    'desc' => 'Поставьте галочку, если услуга платная.',
  ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service12-desc-default',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Доступ в интернет',
 ));
 
 $normalPanel->createOption( array(
   'name' => 'Конференц-зал',
   'type' => 'heading',
   ) );
   
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service13',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Организация мероприятий - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service13-fee',
    'type' => 'checkbox',
    'default' => false,
    'desc' => 'Поставьте галочку, если услуга платная.',
  ) );
  
  $normalPanel->createOption( array(
     'name' => ' ',
     'id' => 'service13-desc-default',
     'type' => 'text',
     'desc' => 'Краткое описание услуги',
     'default' => 'Организация мероприятий, конференций',
   ));
   
  $normalPanel->createOption( array(
    'name' => 'Бизнес-услуги',
    'type' => 'heading',
    ) );
    
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service14',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Оргтехника, корреспенденция - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service14-fee',
    'type' => 'checkbox',
    'default' => false,
    'desc' => 'Поставьте галочку, если услуга платная.',
  ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service14-desc-default',
    'type' => 'text',
    'desc' => 'Краткое описание услуги',
    'default' => 'Оргтехника, корреспенденция',
  ));
  
 $normalPanel->createOption( array(
    'name' => 'Бассейн',
    'type' => 'heading',
    ) );
    
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service15',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Бассейн в отеле - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service15-fee',
    'type' => 'checkbox',
    'default' => false,
    'desc' => 'Поставьте галочку, если услуга платная.',
  ) );
  
  $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service15-desc-default',
    'type' => 'text',
    'desc' => 'Краткое описание услуги',
    'default' => 'Подогреваемый бассейн на территории',
  ));
  
 $normalPanel->createOption( array(
    'name' => 'Спортзал',
    'type' => 'heading',
    ) );
  
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service16',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Спорзал, фитнес - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service16-fee',
    'type' => 'checkbox',
    'default' => false,
    'desc' => 'Поставьте галочку, если услуга платная.',
  ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service16-desc-default',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Спортзал, фитнес в отеле',
 ));
 
 $normalPanel->createOption( array(
    'name' => 'Прачечная',
    'type' => 'heading',
    ) );
    
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service17',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Услуги прачечной - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service17-fee',
    'type' => 'checkbox',
    'default' => false,
    'desc' => 'Поставьте галочку, если услуга платная.',
  ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service17-desc-default',
    'type' => 'text',
    'desc' => 'Краткое описание услуги',
    'default' => 'Услуги прачечной',
  ));
  
 $normalPanel->createOption( array(
    'name' => 'Утюг',
    'type' => 'heading',
    ) );
    
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service18',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Гладильная доска и утюг - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service18-fee',
    'type' => 'checkbox',
    'default' => false,
    'desc' => 'Поставьте галочку, если услуга платная.',
  ) );
 
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service18-desc-default',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Утюг, гладильная доска на прокат',
 ));
 
 $normalPanel->createOption( array(
    'name' => 'Услуга Будильник',
    'type' => 'heading',
    ) );
    
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service19',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Утренняя побудка - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service19-fee',
    'type' => 'checkbox',
    'default' => false,
    'desc' => 'Поставьте галочку, если услуга платная.',
  ) );
  
  $normalPanel->createOption( array(
     'name' => ' ',
     'id' => 'service19-desc-default',
     'type' => 'text',
     'desc' => 'Краткое описание услуги',
     'default' => 'Утренняя побудка',
   ));
 
 $normalPanel->createOption( array(
   'name' => 'Визовая поддержка',
   'type' => 'heading',
   ) );
   
 $normalPanel->createOption( array(
   'name' => ' ',
   'id' => 'service20',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Визовое приглашение - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service20-fee',
    'type' => 'checkbox',
    'default' => false,
    'desc' => 'Поставьте галочку, если услуга платная.',
  ) );
  
  $normalPanel->createOption( array(
     'name' => ' ',
     'id' => 'service20-desc-default',
     'type' => 'text',
     'desc' => 'Краткое описание услуги',
     'default' => 'Оформление визового приглашения',
   ));
   
  $normalPanel->createOption( array(
    'name' => 'Анти-ковид',
    'type' => 'heading',
    ) );
 
 $normalPanel->createOption( array(
   'name' => 'Анти-ковид',
   'id' => 'service21',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Маски, перчатки, санитайзер - вкл / выкл.',
 ) );
 
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service21-fee',
    'type' => 'checkbox',
    'default' => false,
    'desc' => 'Поставьте галочку, если услуга платная.',
  ) );
  
 $normalPanel->createOption( array(
    'name' => ' ',
    'id' => 'service21-desc-default',
    'type' => 'text',
    'desc' => 'Краткое описание услуги',
    'default' => 'Маски, перчатки, санитайзеры',
  ));
 $normalPanel->createOption( array(
   'type' => 'save',
 ));
 

$normalPanel = $adminPanel->createAdminPanel( array(
    'name' => '&middot; Отзывы',
    'id'=> 'feedback-options',
));

$normalPanel->createOption( array(
    'type' => 'note',
    'desc' => 'В этом разделе разместим отзывы клиентов. Отзывы собраны в карусель из 7-и ячеек. Первые две включены по умолчанию, остальные включим по желанию.',
));

 $normalPanel->createOption( array(
   'name' => 'Заголовок раздела',
   'id' => 'feedback-title-default',
   'type' => 'text',
   'desc' => 'Разместите заголовок раздела',
   'default' => 'Отзывы наших гостей',
 ));

$normalPanel->createOption( array(
'name' => '1 отзыв',
'type' => 'heading',
) );

$normalPanel->createOption( array(
  'name' => 'Текст',
  'id' => 'feedback1-text-default',
  'type' => 'textarea', 
  'desc' => 'Разместите текст отзыва. ',
  'default' => 'Текст отзыва 1. Следим за длиной, при необходимости отредактируйте, чтобы отзывы были примено одного объема. Вариант, при котором в одном отзыве 3 строки, а в другом - 12, очевидно неудачный.',
));

$normalPanel->createOption( array(
  'name' => 'Имя клиента',
  'id' => 'feedback1-name',
  'type' => 'text', 
  'desc' => 'Имя или псевдоним автора отзыва',
  'default' => 'Имя Фамилия',
));

$normalPanel->createOption( array(
  'name' => 'Изображение',
  'id' => 'feedback1-img',
  'type' => 'upload',
  'desc' => 'Фото или аватар клиента. Рекомендуемый размер 100х100 пикс. Или хотя бы просто квадратной формы.',
  'default' => '/wp-content/themes/gp-resort/img/demo/feedback1.jpg'
));

$normalPanel->createOption( array(
  'name' => 'Рейтинг', 
  'id' => 'feedback1-rating',
  'type' => 'radio',
  'options' => array(
  '1' => '1 звезда',
  '2' => '2 звезды',
  '3' => '3 звезды',
  '4' => '4 звезды',
  '5' => '5 звезд',
),
  'default' => '1',
'desc' => 'Поставьте нужное количество звезд.'
));


$normalPanel->createOption( array(
'name' => '2 отзыв',
'type' => 'heading',
) );

$normalPanel->createOption( array(
  'name' => 'Текст отзыва',
  'id' => 'feedback2-text-default',
'type' => 'textarea', 
  'default' => 'Текст отзыва 2. Следим за длиной, при необходимости отредактируйте, чтобы отзывы были примено одного объема. Вариант, при котором в одном отзыве 3 строки, а в другом - 12, очевидно неудачный.'
));

$normalPanel->createOption( array(
  'name' => 'Имя',
  'id' => 'feedback2-name',
  'type' => 'text', 
  'desc' => 'Имя или псевдоним автора отзыва',
  'default' => 'Имя Фамилия',
));

 $normalPanel->createOption( array(
   'name' => 'Изображение',
   'id' => 'feedback2-img',
   'type' => 'upload',
   'desc' => 'Фото или аватар клиента. Рекомендуемый размер 100х100 пикс. Или хотя бы просто квадратной формы.',
'default' => '/wp-content/themes/gp-resort/img/demo/feedback2.jpg'
 ));

$normalPanel->createOption( array(
  'name' => 'Рейтинг', 
  'id' => 'feedback2-rating',
  'type' => 'radio',
  'options' => array(
  '1' => '1 звезда',
  '2' => '2 звезды',
  '3' => '3 звезды',
  '4' => '4 звезды',
  '5' => '5 звезд',
),
  'default' => '1',
'desc' => 'Поставьте нужное количество звезд.'
));

$normalPanel->createOption( array(
  'name' => '3 отзыв',
  'type' => 'heading',
) );

$normalPanel->createOption( array(
   'name' => 'Включить отзыв',
   'id' => 'feedback3-loc',
   'type' => 'enable',
'default' => true,
   'desc' => 'Выключить третий отзыв',
   ) );

$normalPanel->createOption( array(
'name' => 'Текст',
'id' => 'feedback3-text-default',
'type' => 'textarea', 
 'desc' => 'Разместите текст отзыва.',
'default' => 'Текст отзыва 2. Следим за длиной, при необходимости отредактируйте, чтобы отзывы были примено одного объема. Вариант, при котором в одном отзыве 3 строки, а в другом - 12, очевидно неудачный.',
));

$normalPanel->createOption( array(
  'name' => 'Имя',
  'id' => 'feedback3-name',
  'type' => 'text', 
  'desc' => 'Имя или псевдоним автора отзыва',
  'default' => 'Имя Фамилия',
));

$normalPanel->createOption( array(
  'name' => 'Изображение',
  'id' => 'feedback3-img',
  'type' => 'upload',
  'desc' => 'Фото или аватар клиента. Рекомендуемый размер 110х110 пикс. Или хотя бы просто квадратной формы.',
'default' => '/wp-content/themes/gp-resort/img/demo/feedback3.jpg'
));

$normalPanel->createOption( array(
  'name' => 'Рейтинг', 
  'id' => 'feedback3-rating',
  'type' => 'radio',
  'options' => array(
  '1' => '1 звезда',
  '2' => '2 звезды',
  '3' => '3 звезды',
  '4' => '4 звезды',
  '5' => '5 звезд',
),
  'default' => '1',
'desc' => 'Поставьте нужное количество звезд.'
));

$normalPanel->createOption( array(
  'name' => '4 отзыв',
  'type' => 'heading',
  ) );
  
$normalPanel->createOption( array(
  'name' => 'Включить отзыв',
  'id' => 'feedback4-loc',
  'type' => 'enable',
  'default' => false,
  'desc' => 'Выключить четвертый отзыв',
     ) );
     
 $normalPanel->createOption( array(
'name' => 'Текст',
'id' => 'feedback4-text-default',
'type' => 'textarea', 
'desc' => 'Разместите текст отзыва. Следим за длиной, при необходимости отредактируйте, чтобы отзывы были примено одной длины.',
'default' => 'Текст отзыва 4',
  ));
  
$normalPanel->createOption( array(
   'name' => 'Имя клиента',
   'id' => 'feedback4-name',
   'type' => 'text', 
   'desc' => 'Имя или псевдоним автора отзыва',
   'default' => 'Имя Фамилия',
  ));
  
$normalPanel->createOption( array(
  'name' => 'Изображение',
   'id' => 'feedback4-img',
   'type' => 'upload',
   'desc' => 'Фото или аватар клиента. Рекомендуемый размер 100х100 пикс. Или хотя бы просто квадратной формы.',
   'default' => ' '
  ));
  
$normalPanel->createOption( array(
   'name' => 'Рейтинг', 
   'id' => 'feedback4-rating',
   'type' => 'radio',
   'options' => array(
   '1' => '1 звезда',
   '2' => '2 звезды',
   '3' => '3 звезды',
   '4' => '4 звезды',
   '5' => '5 звезд',
  ),
    'default' => '1',
    'desc' => 'Поставьте нужное количество звезд.'
  ));


$normalPanel->createOption( array(
  'name' => '5 отзыв',
  'type' => 'heading',
) );

$normalPanel->createOption( array(
   'name' => 'Включить отзыв',
   'id' => 'feedback5-loc',
   'type' => 'enable',
'default' => false,
   'desc' => 'Выключить пятый отзыв',
   ) );
   
$normalPanel->createOption( array(
  'name' => 'Текст',
  'id' => 'feedback5-text-default',
'type' => 'textarea', 
  'desc' => 'Разместите текст отзыва. Следим за длиной, при необходимости отредактируйте, чтобы отзывы были примено одной длины.',
  'default' => 'Текст отзыва 5',
));

$normalPanel->createOption( array(
  'name' => 'Имя',
  'id' => 'feedback5-name',
  'type' => 'text', 
  'desc' => 'Имя или псевдоним автора отзыва',
  'default' => 'Имя Фамилия',
));

$normalPanel->createOption( array(
  'name' => 'Изображение',
  'id' => 'feedback5-img',
  'type' => 'upload',
  'desc' => 'Фото или аватар клиента. Рекомендуемый размер 110х110 пикс. Или хотя бы просто квадратной формы.',
  'default' => ' '
));

$normalPanel->createOption( array(
  'name' => 'Рейтинг', 
  'id' => 'feedback5-rating',
  'type' => 'radio',
  'options' => array(
  '1' => '1 звезда',
  '2' => '2 звезды',
  '3' => '3 звезды',
  '4' => '4 звезды',
  '5' => '5 звезд',
),
  'default' => '1',
'desc' => 'Поставьте нужное количество звезд.'
));

$normalPanel->createOption( array(
  'name' => '6 отзыв',
  'type' => 'heading',
  ) );

$normalPanel->createOption( array(
   'name' => 'Включить отзыв',
   'id' => 'feedback6-loc',
   'type' => 'enable',
'default' => false,
   'desc' => 'Выключить шестой отзыв',
   ) );
   
  $normalPanel->createOption( array(
    'name' => 'Текст отзыва',
    'id' => 'feedback6-text-default',
'type' => 'textarea', 
    'desc' => 'Разместите текст отзыва. Следим за длиной, при необходимости отредактируйте, чтобы отзывы были примено одной длины.',
    'default' => 'Текст отзыва 6',
  ));
  
  $normalPanel->createOption( array(
    'name' => 'Имя',
    'id' => 'feedback6-name',
    'type' => 'text', 
    'desc' => 'Имя или псевдоним автора отзыва',
    'default' => 'Имя Фамилия',
  ));
  
   $normalPanel->createOption( array(
     'name' => 'Изображение',
     'id' => 'feedback6-img',
     'type' => 'upload',
     'desc' => 'Фото или аватар клиента. Рекомендуемый размер 100х100 пикс. Или хотя бы просто квадратной формы.',
     'default' => ' '
   ));
  
  $normalPanel->createOption( array(
    'name' => 'Рейтинг', 
    'id' => 'feedback6-rating',
    'type' => 'radio',
    'options' => array(
    '1' => '1 звезда',
    '2' => '2 звезды',
    '3' => '3 звезды',
    '4' => '4 звезды',
    '5' => '5 звезд',
  ),
    'default' => '1',
  'desc' => 'Поставьте нужное количество звезд.'
  ));
  
$normalPanel->createOption( array(
  'name' => '7 отзыв',
  'type' => 'heading',
  ) );

$normalPanel->createOption( array(
   'name' => 'Включить отзыв',
   'id' => 'feedback7-loc',
   'type' => 'enable',
   'default' => false,
   'desc' => 'Выключить седьмой отзыв',
   ) );
   
  $normalPanel->createOption( array(
    'name' => 'Текст',
    'id' => 'feedback7-text-default',
'type' => 'textarea', 
    'desc' => 'Разместите текст отзыва. Следим за длиной, при необходимости отредактируйте, чтобы отзывы были примено одной длины.',
    'default' => 'Текст отзыва 7',
  ));
  
  $normalPanel->createOption( array(
    'name' => 'Имя клиента',
    'id' => 'feedback7-name',
    'type' => 'text', 
    'desc' => 'Имя или псевдоним автора отзыва',
    'default' => 'Имя Фамилия',
  ));
  
  $normalPanel->createOption( array(
    'name' => 'Изображение',
    'id' => 'feedback7-img',
    'type' => 'upload',
    'desc' => 'Фото или аватар клиента. Рекомендуемый размер 100х100 пикс. Или хотя бы просто квадратной формы.',
    'default' => ' '
  ));
  
  $normalPanel->createOption( array(
    'name' => 'Рейтинг', 
    'id' => 'feedback7-rating',
    'type' => 'radio',
    'options' => array(
    '1' => '1 звезда',
    '2' => '2 звезды',
    '3' => '3 звезды',
    '4' => '4 звезды',
    '5' => '5 звезд',
  ),
    'default' => '1',
    'desc' => 'Поставьте нужное количество звезд.'
  ));
  
$normalPanel->createOption( array(
    'type' => 'save',
));


$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => '&middot; Произвольный контент 1',
  'id'=> 'custom-content1-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'В данном разделе можно вывести на Главную любой произвольный контент. Например, заголовки, тексты, галерею, видео, списки, цитату, таблицу. Либо что-то иное, на ваше усмотрение. Этот блок поддерживает вывод любых шорткодов, что делает его использование гибким и универсальным.',
) );

$normalPanel->createOption( array(
  'name' => 'Заголовок раздела',
  'id' => 'custom1-title-default',
  'type' => 'text', 
  'desc' => 'Впишите заголовок раздела',
  'default' => 'Произвольный контент 1',
) );

$normalPanel->createOption( array(
  'name' => 'Наполнение',
  'id' => 'custom1-text-default',
  'type' => 'editor',
  'desc' => 'Разместите здесь любой контент.',
  'default' => ' <p>Кроме готовых разделов, на статической Главной имеется блок для размещения любых материалов. Например, для которых нет готового раздела. Размещайте сюда текст из консоли темы, форматируйте по вкусу, добавляйте свои изображения, видео, таблицу, галерею, списки, ссылки и т.п. Данный блок также поддерживает вывод шорткодов!</p>',
) );

$normalPanel->createOption( array(
  'type' => 'save',
));


$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => '&middot; Произвольный контент 2',
  'id'=> 'custom-content2-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'В данном разделе можно вывести на Главную любой произвольный контент. Например, заголовки, тексты, галерею, видео, списки, цитату, таблицу. Либо что-то иное, на ваше усмотрение. Этот блок поддерживает вывод любых шорткодов, что делает его использование гибким и универсальным.',
) );

$normalPanel->createOption( array(
  'name' => 'Заголовок раздела',
  'id' => 'custom2-title-default',
  'type' => 'text', 
  'desc' => 'Впишите заголовок раздела',
  'default' => 'Произвольный контент 2',
) );

$normalPanel->createOption( array(
  'name' => 'Наполнение',
  'id' => 'custom2-text-default',
  'type' => 'editor',
  'desc' => 'Разместите здесь любой контент.',
  'default' => ' <p>Кроме готовых разделов, на статической Главной имеется блок для размещения любых материалов. Например, для которых нет готового раздела. Размещайте сюда текст из консоли темы, форматируйте по вкусу, добавляйте свои изображения, видео, таблицу, галерею, списки, ссылки и т.п. Данный блок также поддерживает вывод шорткодов!</p>',
) );

$normalPanel->createOption( array(
  'type' => 'save',
));


$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => '&middot; Фотогалерея',
  'id'=> 'gallery-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'При помощи данного раздела выведем на главную галерею с фотографиями. Галерея собрана в карусель, количество картинок в карусели - любое. Если активирован плагин Simple lightbox, то фото по клику откроются с эффектом лайтбокса.',
) );

$normalPanel->createOption( array(
  'name' => 'Галерея',
  'type' => 'heading',
));

 $normalPanel->createOption( array(
   'name' => 'Галерея',
   'id' => 'home-gallery',
   'type' => 'gallery',
   'desc' => 'Добавление изображений из медиабиблиотеки производится через множественный выбор - выбираем все нужные фото за один прием, зажимая клавишу Shift (на Windows) или Command (на Маке) и кликая на подходящие фото мышью. ',
) );

$normalPanel->createOption( array(
  'type' => 'save',
));

$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => 'Номерной фонд',
  'id'=> 'rooms-archive-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'Динамическая страница, витрина номеров, которая появляется на сайте при активации темы, доступная по адресу ' . home_url() .'/rooms/ <br />
  Не забудьте добавить ее в меню.',
));

$normalPanel->createOption( array(
  'name' => 'Заголовок страницы',
  'id' => 'rooms-archive-title-default',
  'type' => 'text',
  'desc' => 'Разместите заголовок страницы. Обратите внимание, это h1.',
  'default' => 'Номерной фонд',
));

$normalPanel->createOption( array(
  'name' => 'Изображение',
  'id' => 'rooms-archive-img',
  'type' => 'upload',
  'desc' => 'Установите изображение в шапку страницы. Рекомендуемый размер - 1920х500 пикс. Вес - как можно меньше.',
  'default' => ''
));

 $normalPanel->createOption( array(
   'name' => 'Модуль TravelLine',
   'id' => 'show-tl-loc',
   'type' => 'checkbox',
   'default' => false,
   'desc' => 'Поставьте галочку, если хотите выводить скрипт TravelLine на данной странице.',
 ) );

$normalPanel->createOption( array(
   'name' => 'Слайдер или статичная картинка', 
   'id' => 'rooms-archive-media-loc',
 'type' => 'radio',
     'options' => array(
       '1' => 'Слайдер',
       '2' => 'Одно изображение номера',
),
   'default' => '2',
   'desc' => 'Выберите, что показывать в карточках номеров на странице Номерной фонд - либо слайдер с несколькими изображениями, либо одну картинку, установленную в блоке Изображение номера.'
) );

$normalPanel->createOption( array(
  'name' => 'Хочу такой номер',
  'id' => 'rooms-popup-btn-loc',
  'type' => 'enable',
  'default' => true,
  'desc' => 'Кнопка "Хочу такой номер", открывающая поп-ап с формой заказа  - вкл / выкл.',
) );

$normalPanel->createOption( array(
  'name' => 'Форма заказа',
  'id' => 'rooms-popup-form-default',
  'type' => 'text', 
  'desc' => 'Создайте форму при помощи плагина Contact Form7 и готового кода из инструкции и разместите здесь ее шорткод.',
  'default'=> ' ',
));

$normalPanel->createOption( array(
  'name' => 'Дополнительный текст',
  'id' => 'rooms-custom-text-default',
  'type' => 'editor',
  'desc' => 'На странице Номерной фонд также предусмотрен блок для размещения произвольного контента. С его помощью вы можете вывести любой дополнительный текст - для посетителей, для SEO и т.п. Отформатрируйте текст, добавьте изображение, таблицу, ссылки. Блок поддерживает шорткоды.',
  'default' => '<p>На странице Номерной фонд также предусмотрен блок для размещения произвольного контента. С его помощью вы можете вывести любой дополнительный текст - для посетителей, для SEO.  Отформатрируйте текст, добавьте изображение, таблицу, ссылки. Блок поддерживает шорткоды.</p>',
) );

$normalPanel->createOption( array(
  'name' => 'Контактный блок',
  'type' => 'heading',
));

$normalPanel->createOption( array(
  'name' => 'Включить',
  'id' => 'rooms-contact-loc',
  'type' => 'enable',
  'default' => true,
  'desc' => 'Контактный блок в нижней части страницы  - вкл / выкл.',
) );

$normalPanel->createOption( array(
  'name' => 'Текст',
  'id' => 'rooms-contact-text-default',
  'type' => 'editor', 
  'desc' => 'Разместите текст в контактном блоке. Номер телефона вписывать не нужно, он берется из профиля гостиницы.',
  'default'=> '<p>Остались вопросы? Хотите узнать больше? <br />Забронировать номер? <br />Звоните нам, мы всегда на связи!</p>',
));

$normalPanel->createOption( array(
  'name' => 'Изображение',
  'id' => 'rooms-contact-img',
  'type' => 'upload',
  'desc' => 'Установите изображение в левую часть блока. Рекомендуемый размер - 960х280 пикс. Вес - как можно меньше.',
  'default' => ''
));

$normalPanel->createOption( array(
  'type' => 'save',
));



$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => 'Карточки номеров',
  'id'=> 'single-room-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'Несколько настроек для элементов внутри карточки номера.',
));

$normalPanel->createOption( array(
  'name' => 'Хочу такой номер',
  'id' => 'single-room-popup-btn-loc',
  'type' => 'enable',
  'default' => true,
  'desc' => 'Кнопка "Хочу такой номер", такая же, как на странице Номерной фонд - вкл / выкл.',
) );

$normalPanel->createOption( array(
  'name' => 'Другие варианты размещения',
  'id' => 'more-rooms-loc',
  'type' => 'enable',
  'default' => false,
  'desc' => 'Блок с тройкой других случайных номеров  - вкл / выкл.',
) );

$normalPanel->createOption( array(
  'name' => 'Контактный блок',
  'id' => 'single-room-contact-loc',
  'type' => 'enable',
  'default' => true,
  'desc' => 'Такой же контактный блок в нижней части, как на странице Номерной фонд  - вкл / выкл.',
) );

$normalPanel->createOption( array(
  'type' => 'save',
));
 
 
$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => 'Блог, записи и страницы',
  'id'=> 'blog-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'Настройка элементов блога, записей и страниц сайта.',
));

$normalPanel->createOption( array(
  'name' => 'Заголовок страницы блога',
  'id' => 'blog-title-default',
  'type' => 'text', 
  'desc' => 'Разместите свой заголовок для страницы блога. Обратите внимание, это h1.',
  'default'=> 'Статьи и новости отеля',
));

$normalPanel->createOption( array(
  'name' => 'Изображение',
  'id' => 'blog-img',
  'type' => 'upload',
  'desc' => 'Установите изображение в шапку блога. Рекомендуемый размер - 1920х500 пикс. Вес - как можно меньше.',
  'default' => ''
));
 
$normalPanel->createOption( array(
  'name' => 'Вид записей в блоге',
   'type' => 'heading',
   ) );

  $normalPanel->createOption( array(
  'name' => 'Вид записей', 
  'id' => 'blog-type',
  'type' => 'radio',
   'options' => array(
     '1' => 'Вариант 1 - анонс с миниатюрой',
     '2' => 'Вариант 2 - стандартный пост без миниатюры',
      ),
  'default' => '1',
  'desc' => 'Выберите, как выводить записи в блоге и рубриках.'
  ) );
   
 $normalPanel->createOption( array(
   'name' => 'Настройка записей',
   'type' => 'heading',
   ) );
   
 $normalPanel->createOption( array(
   'name' => 'Дата публикации',
   'id' => 'date-loc',
   'type' => 'enable',
   'desc' => 'Показывать дату публикации, вкл / выкл.',
   'default' => true,
 ) );

$normalPanel->createOption( array(
  'name' => 'Изображение записи',
 'id' => 'featured-img-loc',
  'type' => 'enable',
  'desc' => 'Выводить Изображение внутри записи под заголовком, вкл / выкл ',
 'default' => false,
  ) );
  
  $normalPanel->createOption( array(
 'name' => 'Метки',
  'id' => 'tags-loc',
 'type' => 'enable',
  'desc' => 'Выводить блок с метками (тэгами) в нижней части записи, вкл / выкл ',
 'default' => false,
 ) );
 
 $normalPanel->createOption( array(
    'name' => 'Обсуждение',
    'type' => 'heading',
    ) ); 

$normalPanel->createOption( array(
 'name' => 'Комментарии в записях',
 'id' => 'com-post-loc',
 'type' => 'enable',
 'default' => true,
 'desc' => 'Выключить показ комментариев во всех записях',
 ) );

 $normalPanel->createOption( array(
 'name' => 'Комментарии на страницах',
 'id' => 'com-page-loc',
 'type' => 'enable',
 'default' => false,
 'desc' => 'Выключить показ комментариев на всех страницах сайта',
 ) );

 $normalPanel->createOption( array(
 'name' => 'Спойлер для комментариев',
 'id' => 'com-spoiler-loc',
 'type' => 'radio',
 'desc' => 'Если комментарии включены, показывать их как есть или убрать в спойлер',
 'options' => array(
 '1' => 'Убрать в спойлер',
 '2' => 'Оставить как есть',
 ),
 'default' => '1',
  ) );   
 
$normalPanel->createOption( array(
  'name' => 'Кнопки Поделиться',
  'type' => 'heading',
));
   
 $normalPanel->createOption( array(
 'name' => 'Включить',
 'id' => 'single-social-loc',
 'type' => 'enable',
 'desc' => 'Выводить блок c  кнопками "Поделиться" в записях, вкл / выкл ',
 'default' => true,
 ) );
 
$normalPanel->createOption( array(
  'name' => 'Кнопки Поделиться',
  'id' => 'share-options',
  'type' => 'multicheck',
  'desc' => 'Выберите, какие кнопки желаете использовать. С их помощью посетитель сможет поделиться записью в социальных сетях и мессенджерах.',
  'options' => array(
      'wh' => 'WhatsApp',
      'vk' => 'ВКонтакте',
      'fb' => 'Facebook',
      'tg' => 'Telegram',
      'tw' => 'Twitter',
      'od' => 'Одноклассники',
      'vb' => 'Viber',
          ),
'default' => array( 'wh', 'fb' )
) );

$normalPanel->createOption( array(
   'name' => 'Нижняя часть блога и записей',
   'type' => 'heading',
   ) );
   
$normalPanel->createOption( array(
  'name' => 'Галерея или контакты',
  'id' => 'blog-footer-loc',
  'type' => 'radio',
  'desc' => 'Выберите, что выводить в нижней части блога и записей:',
  'options' => array(
   '1' => 'Фотогалерею, как на Главной странице',
   '2' => 'Контактный блок, как на странице Номерной фонд',
   ),
   'default' => '1',
 ) );   

$normalPanel->createOption( array(
  'type' => 'save',
));


$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => 'Страница Контакты',
  'id'=> 'contact-page-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'Здесь настроим статическую страницу Контакты. Настроек немного, преимущественно декор, поскольку основные данные вы уже указали в Профиле и они берутся оттуда.',
));
$normalPanel->createOption( array(
  'name' => 'Заголовок страницы',
  'id' => 'contact-page-title-default',
  'type' => 'text', 
  'desc' => 'Разместите заголовок для страницы блога. Обратите внимание, это h1.',
  'default'=> 'Контакты отеля',
));

$normalPanel->createOption( array(
  'name' => 'Изображение',
  'id' => 'contact-page-img',
  'type' => 'upload',
  'desc' => 'Установите изображение в шапку страницы. Это может быть как фото, так и скриншот карты. Рекомендуемый размер - 1920х500 пикс. Вес - как можно меньше.',
  'default' => ''
));

$normalPanel->createOption( array(
  'name' => 'Показать на карте',
  'id' => 'map-url',
  'type' => 'text',
  'desc' => 'Разместите ссылку на карту.',
  'default' => '',
) );

$normalPanel->createOption( array(
  'name' => 'Галерея или контакты',
  'id' => 'contact-page-footer-loc',
  'type' => 'radio',
  'desc' => 'Выберите, что выводить в нижней части страницы Контакты:',
  'options' => array(
  '1' => 'Фотогалерею, как на Главной странице',
  '2' => 'Контактный блок, как на странице Номерной фонд',
  ),
  'default' => '1',
   ) ); 

 $normalPanel->createOption( array(
   'type' => 'save',
 ));


 $normalPanel = $adminPanel->createAdminPanel( array(
   'name' => 'Страница Спасибо',
   'id'=> 'thankyou-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'Это страница, на которую тема редиректит посетителя после успешной отправки сообщения из форм сайта (заказ звонка, бронирование).',
));

$normalPanel->createOption( array(
  'name' => 'Адрес страницы',
  'id' => 'thankyou-url-default',
  'type' => 'text', 
  'desc' => 'Создайте страницу Спасибо по инструкции, здесь разместите адрес данной страницы. Не забываем про http:// или https://',
  'default' => '',
) );

$normalPanel->createOption( array(
  'name' => 'Текст',
  'id' => 'thankyou-text-default',
  'type' => 'editor',
  'desc' => 'Разместите текст.',
  'default' => '<p>Уважаемый посетитель, Ваше сообщение благополучно отправлено. Спасибо, что написали нам.  Через несколько минут менеджер перезвонит для уточнения деталей. Пока ожидаете звонок, посмотрите  последние новости в блоге отеля, чтобы узнать больше о месте, где можете провести несколько незабываемых дней!</p>',
));

$normalPanel->createOption( array(
  'name' => 'Что добавить',
  'id' => 'thankyou-page-footer-loc',
  'type' => 'radio',
  'desc' => 'Выберите, что выводить в нижней части страницы Спасибо:',
  'options' => array(
  '1' => 'Фотогалерею, как на Главной странице',
  '2' => 'Контактный блок, как на странице Номерной фонд',
  '3' => 'Четыре свежих записи из блога',
  ),
  'default' => '1',
   ) ); 

 $normalPanel->createOption( array(
    'type' => 'save',
  ));


  $normalPanel = $adminPanel->createAdminPanel( array(
    'name' => 'Выплывающий блок',
    'id'=> 'float-block-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'Небольшой блок с картинкой и текстом, предназначенный для привлечения внимания к акции, событию, новости, предупреждению. Плавно выплывает с левой стороны экрана при скроллинге любой страницы. <br /> Внимание! Подобные элементы сайта являются сильными раздражителями, поэтому на него установлено ограничение. Если посетитель закрыл блок, нажав на соответствующую иконку, больше он его не увидит (пока не будет очищено локальное хранилище браузера).',
));

$normalPanel->createOption( array(
   'name' => 'Включить',
   'id' => 'float-block-loc',
   'type' => 'enable',
   'desc' => 'Выплывающий блок, вкл / выкл ',
   'default' => true,
   ) );

$normalPanel->createOption( array(
  'name' => 'Изображение',
  'id' => 'float-block-img',
  'type' => 'upload',
  'desc' => 'Установите изображение, которое будет выводиться в левой части блока. Рекомендуемый размер - 200х200 пикс. Вес - как можно меньше. На моб. устройствах не выводится для экономии места.',
  'default' => ''
));

$normalPanel->createOption( array(
  'name' => 'Заголовок',
  'id' => 'float-block-title-default',
  'type' => 'text',
  'desc' => 'Разместите заголовок. Оптимально 5-6 слов.',
  'default' => 'Скидка 15% при прямом бронировании',
));
$normalPanel->createOption( array(
  'name' => 'Текст',
  'id' => 'float-block-text-default',
  'type' => 'textarea',
  'desc' => 'Разместите текст. Оптимально 10-12 слов.',
  'default' => 'Забронируйте проживание на сайте или по телефону +7 (921) 925-30-10 и получите скидку 15%',
));

$normalPanel->createOption( array(
  'name' => 'Ссылка',
  'id' => 'float-block-url-default',
  'type' => 'text',
  'desc' => 'Разместите адрес страницы, которая откроется по клику на ссылку. Не забываем http:// или https://',
  'default' => '',
));

$normalPanel->createOption( array(
  'type' => 'save',
));


$normalPanel = $adminPanel->createAdminPanel( array(
    'name' => 'Оформление',
    'id'=> 'style-options',
));

$normalPanel->createOption( array(
    'type' => 'note',
    'desc' => 'Здесь вы можете изменить цвета шаблона, задать свои. Если же вам нравится оформление, которые вы видели на демо-сайте, просто нажмите на кнопку сохранения настроек внизу этой страницы. Подробнее об оформлении см инструкцию, которая приложена к теме.',
));

$normalPanel->createOption( array(
  'name' => 'Браузер',
  'type' => 'heading',
  ) );

 $normalPanel->createOption( array(
   'name' => 'Цвет темы браузера',
   'id' => 'browser',
   'type' => 'color',
   'desc' => 'Цвет темы браузера, в котором просматривается сайт (функция поддерживается еще не во всех браузерах и не на всех устройствах!).',
   'default' => '#7C83FD',
)); 

$normalPanel->createOption( array(
'name' => 'Общие',
'type' => 'heading',
) );

$normalPanel->createOption( array(
    'name' => 'Тексты сайта: цвет шрифта',
    'id' => 'body-col',
    'type' => 'color',
    'desc' => 'Цвет шрифта текстов сайта',
    'default' => '#293b5f',
));

$normalPanel->createOption( array(
    'name' => 'Ссылки: цвет шрифта',
    'id' => 'alink',
    'type' => 'color',
    'desc' => 'Цвет шрифта ссылки в тексте.',
    'default' => '#293b5f',
));

$normalPanel->createOption( array(
    'name' => 'Ссылки при наведении мыши: цвет шрифта',
    'id' => 'ahover',
    'type' => 'color',
    'desc' => 'Цвет шрифта ссылки при наведении мыши (hover).',
    'default' => '#7C83FD',
));
 
$normalPanel->createOption( array(
    'name' => 'Меню в шапке',
    'type' => 'heading',
));
 
$normalPanel->createOption( array(
    'name' => 'Выпадающее меню',
    'id' => 'nav-drop-bg',
    'type' => 'color',
    'desc' => 'Цвет фона выпадающего меню (дочерние пункты)',
    'default' => '#111111',
));

$normalPanel->createOption( array(
  'name' => 'Цвет шрифта выпадающего меню ',
  'id' => 'nav-drop-col',
  'type' => 'color',
  'desc' => 'Цвет шрифта пункта меню при наведении мыши (hover) в выпадающем (дочернем) меню',
  'default' => '#ffffff',
));

$normalPanel->createOption( array(
'name' => 'Кнопки сайта',
'type' => 'heading',
) );

$normalPanel->createOption( array(
  'name' => 'Текста кнопки',
  'id' => 'btn-color',
  'type' => 'color',
  'desc' => 'Цвет шрифта в тексте кнопки.',
  'default' => '#fff',
) );

$normalPanel->createOption( array(
    'name' => 'Фон кнопки',
    'id' => 'btn-bg',
    'type' => 'color',
    'desc' => 'Фон кнопки.',
    'default' => '#7C83FD',
) );

$normalPanel->createOption( array(
    'name' => 'Фон при наведении мыши',
    'id' => 'btn-bg-hov',
    'type' => 'color',
    'desc' => 'Цвет фона кнопки при наведении мыши.',
    'default' => '#3C5186',
) );

$normalPanel->createOption( array(
    'name' => 'Иконки и достижения',
    'type' => 'heading',
));
 
$normalPanel->createOption( array(
    'name' => 'Цвет фона',
    'id' => 'icons-bg',
    'type' => 'color',
    'desc' => 'Цвет фона иконок в Услугах, Номерах, контактном блоке, а также фон числовых ячеек в разделе О нас.',
    'default' => '#185adb',
));

$normalPanel->createOption( array(
  'name' => 'Мобильное меню',
  'type' => 'heading',
));

$normalPanel->createOption( array(
   'name' => 'Цвет фона',
   'id' => 'mob-nav-bg',
   'type' => 'color',
   'desc' => 'Цвет фона мобильного меню.',
   'default' => '#2b2e4a',
));

$normalPanel->createOption( array(
   'name' => 'Цвет шрифта',
   'id' => 'mob-nav-col',
   'type' => 'color',
   'desc' => 'Цвет шрифта пунктов мобильного меню.',
   'default' => '#ffffff',
));

$normalPanel->createOption( array(
  'name' => 'Виджет Баннер',
  'type' => 'heading',
));

$normalPanel->createOption( array(
   'name' => 'Цвет фона',
   'id' => 'banner-bg',
   'type' => 'color',
   'desc' => 'Цвет фона заголовка во встроенном виджете Баннер.',
   'default' => '#006848',
));

$normalPanel->createOption( array(
  'name' => 'Выплывающий блок',
  'type' => 'heading',
));

$normalPanel->createOption( array(
   'name' => 'Цвет фона',
   'id' => 'float-block-bg',
   'type' => 'color',
   'desc' => 'Цвет фона выплывающего блока.',
   'default' => '#111',
));

$normalPanel->createOption( array(
   'name' => 'Цвет шрифта',
   'id' => 'float-block-col',
   'type' => 'color',
   'desc' => 'Цвет текста выплывающего блока.',
   'default' => '#fff',
));

$normalPanel->createOption( array(
  'type' => 'save',
));
 
 
$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => 'Язык 2',
  'id'=> 'lang2-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'Здесь дублируем контент консоли для вывода на втором языке. Заполнить нужно не все поля, а только текстовые, это ускоряет процесс. Чтобы не запутаться в настройках, все поля содержат заполнитель на дефолтном языке темы.',
));

$normalPanel->createOption( array(
  'name' => 'Профиль гостиницы',
  'type' => 'heading',
));

$normalPanel->createOption( array(
   'name' => 'Название',
   'id' => 'profile-name-lang-1',
   'type' => 'text',
   'desc' => 'Название отеля, гостевого дома.',
   'default' => 'Название отеля',
)); 

$normalPanel->createOption( array(
   'name' => 'Город',
   'id' => 'profile-city-lang-1',
   'type' => 'text',
   'desc' => 'Название города или населенного пункта.',
   'default' => 'Название населенного пункта',
));   

$normalPanel->createOption( array(
   'name' => 'Адрес',
   'id' => 'profile-adress-lang-1',
   'type' => 'text',
   'desc' => 'Адрес, местонахождение.',
   'default' => 'Адрес',
)); 

$normalPanel->createOption( array(
  'name' => 'Персональные данные',
  'type' => 'heading',
) );

$normalPanel->createOption( array(
  'name' => 'Ссылка на Политику конфиденциальности',
  'id' => 'policy-url-lang-1',
  'type' => 'text',
  'desc' => 'Разместите адрес страницы с текстом политики конфиденциальности. Не забываем http:// или https://',
  'default' => '',
));

$normalPanel->createOption( array(
  'name' => '404 страница',
  'type' => 'heading',
));

$normalPanel->createOption( array(
  'name' => '404 - текст',
  'id' => 'text404-lang-1',
  'type' => 'textarea', 
  'desc' => 'Разместите текст для вывода на 404 странице.',
  'default'=> 'Дорогой посетитель! Страница, которую Вы искали, не существует, либо была перемещена на другой адрес.',
));
 
 
$normalPanel->createOption( array(
  'name' => 'Форма заказа звонка в поп-апе',
  'type' => 'heading',
));
 $normalPanel->createOption( array(
   'name' => 'Заказ звонка',
   'id' => 'header-shortcode-lang-1',
   'type' => 'text', 
   'desc' => 'Создайте форму для заказа звонка на втором языке и разместите здесь ее шорткод.',
   'default'=> '',
 ));
 
  $normalPanel->createOption( array(
    'name' => 'Постер',
    'type' => 'heading',
  ));
 
 $normalPanel->createOption( array(
   'name' => 'Заголовок постера - 2 язык',
 'id' => 'poster-title-lang-1',
   'type' => 'text', 
   'desc' => 'Впишите заголовок постера на втором языке.',
   'default'=> 'Отдых для Вас и Вашей семьи на побережье Чёрного моря',
 ));
 
 $normalPanel->createOption( array(
   'name' => 'Текст постера - 2 язык',
   'id' => 'poster-desc-lang-1',
 'type' => 'textarea', 
   'desc' => 'Впишите текст постера на втором языке.',
   'default'=> 'Посетите наш замечательный отель. Наша команда сделает Ваш отдых незабываемым!',
 ));
 
 $normalPanel->createOption( array(
   'name' => 'Кнопка - текст',
   'id' => 'poster-btn-lang-1',
   'type' => 'text', 
   'desc' => 'Разместите текст на кнопке на втором языке.',
   'default'=> 'Текст на кнопке',
 ));
 
 $normalPanel->createOption( array(
    'name' => 'Кнопка - ссылка',
    'id' => 'poster-btn-url-lang-1',
    'type' => 'text', 
    'desc' => 'Разместите адрес страницы, которая откроется по клику на кнопку.',
    'default'=> '',
  ));
 
 $normalPanel->createOption( array(
   'name' => 'Раздел О нас на главной странице',
   'type' => 'heading',
   ));
   
   $normalPanel->createOption( array(
     'name' => 'Заголовок раздела',
     'id' => 'about-title-lang-1',
     'type' => 'text',
     'desc' => 'Разместите заголовок',
     'default' => 'Ваш комфортный отдых во время отпуска',
   ));
   
   $normalPanel->createOption( array(
     'name' => 'Текст',
     'id' => 'about-text-lang-1',
     'type' => 'editor',
     'desc' => 'Разместите текст.',
     'default' => '<p>Откройте для себя первоклассный отель GP Resort. В нашем отеле на берегу Чёрного моря вас ждут новые современные номера и апартаменты со стильным и уютным интерьером... </p>',
   ));

$normalPanel->createOption( array(
'name' => 'Преимущества, достижения в разделе О нас',
'type' => 'heading',
 ));

$normalPanel->createOption( array(
'name' => 'Ячейка 1 - текст',
'id' => 'benefit1-text-lang-1',
'type' => 'text',
'desc' => 'Разместите пояснение, короткий текст, 5-6 слов.',
'default' => 'лет радушно принимаем гостей',
) );
 
$normalPanel->createOption( array(
'name' => 'Ячейка 2 - текст',
'id' => 'benefit2-text-lang-1',
'type' => 'text',
'desc' => 'Разместите пояснение, короткий текст, 5-6 слов.',
'default' => 'современных комфортных номеров',
) );

$normalPanel->createOption( array(
'name' => 'Ячейка 3 - текст',
'id' => 'benefit3-text-lang-1',
'type' => 'text',
'desc' => 'Разместите пояснение, короткий текст, 5-6 слов.',
'default' => 'минут прогулка пешком до пляжа',
) );
 
$normalPanel->createOption( array(
'name' => 'Ячейка 4 - текст',
'id' => 'benefit4-text-lang-1',
'type' => 'text',
'desc' => 'Разместите пояснение, короткий текст, 5-6 слов.',
'default' => '% скидка по промокоду HOTEL',
) ); 
 
 $normalPanel->createOption( array(
 'name' => 'Раздел Номера',
 'type' => 'heading',
 ));

$normalPanel->createOption( array(
  'name' => 'Заголовок раздела',
  'id' => 'rooms-title-lang-1',
  'type' => 'text',
  'desc' => 'Разместите заголовок раздела',
  'default' => 'Комфортабельные номера',
));

$normalPanel->createOption( array(
  'name' => 'Текст',
  'id' => 'rooms-text-lang-1',
  'type' => 'editor',
  'desc' => 'Разместите дополнительный текст, что предлагаем клиентам и почему это хорошо.',
  'default' => '<p>В каждом номере есть санузел, ванна или душевая кабина, кондиционер, ЖК-телевизор и кабельное ТВ, средства гигиены...</p>',
));

$normalPanel->createOption( array(
  'name' => 'Раздел Услуги',
  'type' => 'heading',
  ));
  
  $normalPanel->createOption( array(
     'name' => 'Заголовок раздела',
     'id' => 'service-title-lang-1',
     'type' => 'text',
     'desc' => 'Разместите заголовок раздела',
     'default' => 'Наши услуги',
   ));
   
$normalPanel->createOption( array(
   'name' => 'Раннее заселение',
   'id' => 'service1-desc-lang-1',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Заселение раньше расчётного часа',
 ));
 
 $normalPanel->createOption( array(
  'name' => 'Ресторан',
  'id' => 'service2-desc-lang-1',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Завтраки, обеды, ужины, мероприятия',
  ));

 $normalPanel->createOption( array(
   'name' => 'Салон красоты',
   'id' => 'service3-desc-lang-1',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Парикмахерский зал, косметология, солярий',
 ));
 
 $normalPanel->createOption( array(
  'name' => 'Трансфер',
  'id' => 'service4-desc-lang-1',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Заберем из аэропорта или вокзала, отвезем обратно',
  ));

 $normalPanel->createOption( array(
   'name' => 'Размещение с питомцами',
   'id' => 'service5-desc-lang-1',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Размещение с домашними животными',
 ));
 
 $normalPanel->createOption( array(
  'name' => 'Парковка',
  'id' => 'service6-desc-lang-1',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Автостоянка у отеля',
  ));

 $normalPanel->createOption( array(
   'name' => 'Ресепшн 24/7',
   'id' => 'service7-desc-lang-1',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Круглосуточный ресепшн',
 ));

 $normalPanel->createOption( array(
  'name' => 'Камера хранения',
  'id' => 'service8-desc-lang-1',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Камера хранения на ресепшене',
  ));

 $normalPanel->createOption( array(
   'name' => 'Завтраки',
   'id' => 'service9-desc-lang-1',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Завтрак в комплекте',
 ));

 $normalPanel->createOption( array(
  'name' => 'Доставка в номер',
  'id' => 'service10-desc-lang-1',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Доставка еды в номер',
  ));

  $normalPanel->createOption( array(
  'name' => 'Экскурсии',
  'id' => 'service11-desc-lang-1',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Организация экскурсий',
  ));

 $normalPanel->createOption( array(
   'name' => 'Wi-Fi',
   'id' => 'service12-desc-lang-1',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Доступ в интернет',
 ));

  $normalPanel->createOption( array(
   'name' => 'Конференц-зал',
   'id' => 'service13-desc-lang-1',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Организация мероприятий, конференций',
   ));

 $normalPanel->createOption( array(
  'name' => 'Бизнес-услуги',
  'id' => 'service14-desc-lang-1',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Оргтехника, корреспенденция',
  ));

  $normalPanel->createOption( array(
  'name' => 'Бассейн',
  'id' => 'service15-desc-lang-1',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Подогреваемый бассейн на территории',
  ));

 $normalPanel->createOption( array(
   'name' => 'Спортзал',
   'id' => 'service16-desc-lang-1',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Спортзал, фитнес в отеле',
 ));

 $normalPanel->createOption( array(
  'name' => 'Прачечная',
  'id' => 'service17-desc-lang-1',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Услуги прачечной',
  ));

 $normalPanel->createOption( array(
   'name' => 'Утюг',
   'id' => 'service18-desc-lang-1',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Утюг, гладильная доска на прокат',
 ));

  $normalPanel->createOption( array(
   'name' => 'Услуга Будильник',
   'id' => 'service19-desc-lang-1',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Утренняя побудка',
   ));

  $normalPanel->createOption( array(
   'name' => 'Визовая поддержка',
   'id' => 'service20-desc-lang-1',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Оформление визового приглашения',
   ));

 $normalPanel->createOption( array(
  'name' => 'Анти-ковид',
  'id' => 'service21-desc-lang-1',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Маски, перчатки, санитайзеры',
  ));

$normalPanel->createOption( array(
  'name' => 'Раздел Отзывы',
  'type' => 'heading',
  ) );

$normalPanel->createOption( array(
'name' => 'Отзыв 1 - текст',
'id' => 'feedback1-text-lang-1',
'type' => 'textarea', 
'desc' => 'Разместите текст отзыва. ',
'default' => 'Текст отзыва 1',
));

$normalPanel->createOption( array(
'name' => 'Отзыв 2 - текст',
'id' => 'feedback2-text-lang-1',
'type' => 'textarea', 
'desc' => 'Разместите текст отзыва. ',
'default' => 'Текст отзыва 2',
)); 

$normalPanel->createOption( array(
 'name' => 'Отзыв 3 - текст',
'id' => 'feedback3-text-lang-1',
'type' => 'textarea', 
 'desc' => 'Разместите текст отзыва. ',
'default' => 'Текст отзыва 3',
 ));
 
$normalPanel->createOption( array(
'name' => 'Отзыв 4 - текст',
'id' => 'feedback4-text-lang-1',
'type' => 'textarea', 
'desc' => 'Разместите текст отзыва. ',
'default' => 'Текст отзыва 4',
 )); 
 
$normalPanel->createOption( array(
'name' => 'Отзыв 5 - текст',
  'id' => 'feedback5-text-lang-1',
'type' => 'textarea', 
  'desc' => 'Разместите текст отзыва. ',
  'default' => 'Текст отзыва 5',
)); 

$normalPanel->createOption( array(
'name' => 'Отзыв 6 - текст',
'id' => 'feedback6-text-lang-1',
'type' => 'textarea', 
'desc' => 'Разместите текст отзыва. ',
'default' => 'Текст отзыва 6',
));

$normalPanel->createOption( array(
'name' => 'Отзыв 7 - текст',
 'id' => 'feedback7-text-lang-1',
'type' => 'textarea', 
 'desc' => 'Разместите текст отзыва. ',
'default' => 'Текст отзыва 7',
));

$normalPanel->createOption( array(
 'name' => 'Раздел Произвольный контент 1',
'type' => 'heading',
  ) );

$normalPanel->createOption( array(
'name' => 'Заголовок раздела',
'id' => 'custom1-title-lang-1',
'type' => 'text', 
'desc' => 'Впишите заголовок раздела',
 'default' => 'Произвольный контент 1',
) );

$normalPanel->createOption( array(
'name' => 'Наполнение',
 'id' => 'custom1-text-lang-1',
'type' => 'editor',
 'desc' => 'Разместите здесь любой контент.',
'default' => ' <p>Кроме готовых разделов, на статической Главной имеется блок для размещения любых материалов. Например, для которых нет готового раздела. Размещайте сюда текст из консоли темы, форматируйте по вкусу, добавляйте свои изображения...</p>',
) );

$normalPanel->createOption( array(
 'name' => 'Раздел Произвольный контент 2',
 'type' => 'heading',
  ) );
  
$normalPanel->createOption( array(
  'name' => 'Заголовок раздела',
  'id' => 'custom2-title-lang-1',
  'type' => 'text', 
  'desc' => 'Впишите заголовок раздела',
  'default' => 'Произвольный контент 2',
) );

$normalPanel->createOption( array(
  'name' => 'Наполнение',
  'id' => 'custom2-text-lang-1',
  'type' => 'editor',
  'desc' => 'Разместите здесь любой контент.',
  'default' => ' <p>Кроме готовых разделов, на статической Главной имеется блок для размещения любых материалов. Например, для которых нет готового раздела. Размещайте сюда текст из консоли темы, форматируйте по вкусу, добавляйте свои изображения....</p>',
) );

$normalPanel->createOption( array(
  'name' => 'Страница Номерной фонд',
  'type' => 'heading',
  ) );
  
  $normalPanel->createOption( array(
    'name' => 'Заголовок страницы',
    'id' => 'rooms-archive-title-lang-1',
    'type' => 'text',
    'desc' => 'Разместите заголовок страницы',
    'default' => 'Номерной фонд',
  ));
  
$normalPanel->createOption( array(
  'name' => 'Форма заказа для поп-апа',
  'id' => 'rooms-popup-form-lang-1',
  'type' => 'text', 
  'desc' => 'Создайте форму  Contact Form7 на втором языке и разместите здесь ее шорткод.',
  'default'=> ' ',
));
$normalPanel->createOption( array(
  'name' => 'Дополнительный текст',
  'id' => 'rooms-custom-text-lang-1',
  'type' => 'editor',
  'desc' => 'На странице Номерной фонд также предусмотрен блок для размещения произвольного контента. С его помощью вы можете вывести любой дополнительный текст - для посетителей, для SEO и т.п. Отформатрируйте текст, добавьте изображение, таблицу, ссылки. Блок поддерживает шорткоды.',
  'default' => '<p>На странице Номерной фонд также предусмотрен блок для размещения произвольного контента. С его помощью вы можете вывести любой дополнительный текст - для посетителей, для SEO...</p>',
) );

$normalPanel->createOption( array(
  'name' => 'Текст в контактном блоке',
  'id' => 'rooms-contact-text-lang-1',
  'type' => 'editor', 
  'desc' => 'Разместите текст в контактном блоке для страницы Номерной фонд и карточек номеров.',
  'default'=> '<p>Остались вопросы? Хотите узнать больше? <br /> Забронировать номер? <br />Звоните нам, мы всегда на связи!</p>',
));

$normalPanel->createOption( array(
  'name' => 'Блог',
  'type' => 'heading',
  ) );
  
$normalPanel->createOption( array(
  'name' => 'Заголовок страницы блога',
  'id' => 'blog-title-lang-1',
  'type' => 'text', 
  'desc' => 'Разместите заголовок для страницы блога. Обратите внимание, это h1.',
  'default'=> 'Статьи и новости',
));

$normalPanel->createOption( array(
  'name' => 'Страница Контакты',
  'type' => 'heading',
  ) );
$normalPanel->createOption( array(
  'name' => 'Заголовок страницы',
  'id' => 'contact-page-title-lang-1',
  'type' => 'text', 
  'desc' => 'Разместите  заголовок для страницы Контакты. Обратите внимание, это h1.',
  'default'=> 'Контакты отеля',
));

$normalPanel->createOption( array(
  'name' => 'Страница Спасибо',
  'type' => 'heading',
  ) );
  
  $normalPanel->createOption( array(
    'name' => 'Адрес страницы',
    'id' => 'thankyou-url-lang-1',
    'type' => 'text', 
    'desc' => 'Создайте страницу Спасибо по инструкции, здесь разместите адрес данной страницы. Не забываем про http:// или https://',
    'default' => '',
  ) );
  
$normalPanel->createOption( array(
  'name' => 'Текст',
  'id' => 'thankyou-text-lang-1',
  'type' => 'editor',
  'desc' => 'Разместите текст на странице Спасибо, куда редиректится посетитель после отправки сообщения через формы сайта.',
  'default' => '<p>Уважаемый посетитель, Ваше сообщение благополучно отправлено. Спасибо, что написали нам. Через несколько минут менеджер перезвонит для уточнения деталей...</p>',
));

$normalPanel->createOption( array(
  'name' => 'Выплывающий блок',
  'type' => 'heading',
  ) );
$normalPanel->createOption( array(
  'name' => 'Заголовок',
  'id' => 'float-block-title-lang-1',
  'type' => 'text',
  'desc' => 'Разместите заголовок. Оптимально 5-6 слов.',
  'default' => ' Скидка 15% при прямом бронировании',
));
$normalPanel->createOption( array(
  'name' => 'Текст',
  'id' => 'float-block-text-lang-1',
  'type' => 'textarea',
  'desc' => 'Разместите текст. Оптимально 10-12 слов.',
  'default' => 'Забронируйте проживание на сайте или по телефону и получите скидку 15%',
));

$normalPanel->createOption( array(
  'name' => 'Ссылка',
  'id' => 'float-block-url-lang-1',
  'type' => 'text',
  'desc' => 'Разместите адрес страницы, которая откроется по клику на ссылку. Не забываем http:// или https://',
  'default' => '',
));

$normalPanel->createOption( array(
  'type' => 'save',
));

$normalPanel = $adminPanel->createAdminPanel( array(
  'name' => 'Язык 3',
  'id'=> 'lang3-options',
));

$normalPanel->createOption( array(
  'type' => 'note',
  'desc' => 'Здесь дублируем текстовый контент консоли для вывода на третьем языке.',
));

$normalPanel->createOption( array(
  'name' => 'Профиль гостиницы',
  'type' => 'heading',
));

$normalPanel->createOption( array(
   'name' => 'Название',
   'id' => 'profile-name-lang-2',
   'type' => 'text',
   'desc' => 'Название отеля, гостевого дома.',
   'default' => 'Название отеля',
)); 

$normalPanel->createOption( array(
   'name' => 'Город',
   'id' => 'profile-city-lang-2',
   'type' => 'text',
   'desc' => 'Название города или населенного пункта.',
   'default' => 'Название населенного пункта',
));   

$normalPanel->createOption( array(
   'name' => 'Адрес',
   'id' => 'profile-adress-lang-2',
   'type' => 'text',
   'desc' => 'Адрес, местонахождение.',
   'default' => 'Адрес',
)); 

$normalPanel->createOption( array(
  'name' => 'Персональные данные',
  'type' => 'heading',
) );

$normalPanel->createOption( array(
  'name' => 'Ссылка на Политику конфиденциальности',
  'id' => 'policy-url-lang-2',
  'type' => 'text',
  'desc' => 'Разместите адрес страницы с текстом политики конфиденциальности. Не забываем http:// или https://',
  'default' => '',
));

$normalPanel->createOption( array(
  'name' => '404 страница',
  'type' => 'heading',
));

$normalPanel->createOption( array(
  'name' => '404 - текст',
  'id' => 'text404-lang-2',
  'type' => 'textarea', 
  'desc' => 'Разместите текст для вывода на 404 странице.',
  'default'=> 'Дорогой посетитель! Страница, которую Вы искали, не существует, либо была перемещена на другой адрес.',
));
 
 
$normalPanel->createOption( array(
  'name' => 'Форма заказа звонка в поп-апе',
  'type' => 'heading',
));
 $normalPanel->createOption( array(
   'name' => 'Заказ звонка',
   'id' => 'header-shortcode-lang-2',
   'type' => 'text', 
   'desc' => 'Создайте форму для заказа звонка на втором языке и разместите здесь ее шорткод.',
   'default'=> '',
 ));
 
  $normalPanel->createOption( array(
  'name' => 'Постер',
  'type' => 'heading',
  ));
 
 $normalPanel->createOption( array(
   'name' => 'Заголовок постера - 2 язык',
 'id' => 'poster-title-lang-2',
   'type' => 'text', 
   'desc' => 'Впишите заголовок постера на втором языке.',
   'default'=> 'Отдых для Вас и Вашей семьи на побережье Чёрного моря',
 ));
 
 $normalPanel->createOption( array(
   'name' => 'Текст постера - 2 язык',
   'id' => 'poster-desc-lang-2',
 'type' => 'textarea', 
   'desc' => 'Впишите текст постера на втором языке.',
   'default'=> 'Посетите наш замечательный отдель. Наша команда сделает Ваш отдых незабываемым!',
 ));
 
 $normalPanel->createOption( array(
   'name' => 'Кнопка - текст',
   'id' => 'poster-btn-lang-2',
   'type' => 'text', 
   'desc' => 'Разместите текст на кнопке на втором языке.',
   'default'=> 'Текст на кнопке',
 ));
 
 $normalPanel->createOption( array(
  'name' => 'Кнопка - ссылка',
  'id' => 'poster-btn-url-lang-2',
  'type' => 'text', 
  'desc' => 'Разместите адрес страницы, которая откроется по клику на кнопку.',
  'default'=> '',
  ));
 
 $normalPanel->createOption( array(
   'name' => 'Раздел О нас на главной странице',
   'type' => 'heading',
   ));
   
   $normalPanel->createOption( array(
   'name' => 'Заголовок раздела',
   'id' => 'about-title-lang-2',
   'type' => 'text',
   'desc' => 'Разместите заголовок',
   'default' => 'Ваш комфортный отдых во время отпуска',
   ));
   
   $normalPanel->createOption( array(
   'name' => 'Текст',
   'id' => 'about-text-lang-2',
   'type' => 'editor',
   'desc' => 'Разместите текст.',
   'default' => '<p>Откройте для себя первоклассный отель GP Resort. В нашем отеле на берегу Чёрного моря вас ждут новые современные номера и апартаменты со стильным и уютным интерьером... </p>',
   ));

$normalPanel->createOption( array(
'name' => 'Преимущества, достижения в разделе О нас',
'type' => 'heading',
 ));

$normalPanel->createOption( array(
'name' => 'Ячейка 1 - текст',
'id' => 'benefit1-text-lang-2',
'type' => 'text',
'desc' => 'Разместите пояснение, короткий текст, 5-6 слов.',
'default' => 'лет радушно принимаем гостей',
) );
 
$normalPanel->createOption( array(
'name' => 'Ячейка 2 - текст',
'id' => 'benefit2-text-lang-2',
'type' => 'text',
'desc' => 'Разместите пояснение, короткий текст, 5-6 слов.',
'default' => 'современных комфортных номеров',
) );

$normalPanel->createOption( array(
'name' => 'Ячейка 3 - текст',
'id' => 'benefit3-text-lang-2',
'type' => 'text',
'desc' => 'Разместите пояснение, короткий текст, 5-6 слов.',
'default' => 'минут прогулка пешком до пляжа',
) );
 
$normalPanel->createOption( array(
'name' => 'Ячейка 4 - текст',
'id' => 'benefit4-text-lang-2',
'type' => 'text',
'desc' => 'Разместите пояснение, короткий текст, 5-6 слов.',
'default' => '% скидка по промокоду HOTEL',
) ); 
 
 $normalPanel->createOption( array(
 'name' => 'Раздел Номера',
 'type' => 'heading',
 ));

$normalPanel->createOption( array(
  'name' => 'Заголовок раздела',
  'id' => 'rooms-title-lang-2',
  'type' => 'text',
  'desc' => 'Разместите заголовок раздела',
  'default' => 'Комфортабельные номера',
));

$normalPanel->createOption( array(
  'name' => 'Текст',
  'id' => 'rooms-text-lang-2',
  'type' => 'editor',
  'desc' => 'Разместите дополнительный текст, что предлагаем клиентам и почему это хорошо.',
  'default' => '<p>В каждом номере есть санузел, ванна или душевая кабина, кондиционер, ЖК-телевизор и кабельное ТВ, средства гигиены...</p>',
));

$normalPanel->createOption( array(
  'name' => 'Раздел Услуги',
  'type' => 'heading',
  ));
  
  $normalPanel->createOption( array(
   'name' => 'Заголовок раздела',
   'id' => 'service-title-lang-2',
   'type' => 'text',
   'desc' => 'Разместите заголовок раздела',
   'default' => 'Наши услуги',
   ));
   
$normalPanel->createOption( array(
   'name' => 'Раннее заселение',
   'id' => 'service1-desc-lang-2',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Заселение раньше расчётного часа',
 ));
 
 $normalPanel->createOption( array(
  'name' => 'Ресторан',
  'id' => 'service2-desc-lang-2',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Завтраки, обеды, ужины, мероприятия',
  ));

 $normalPanel->createOption( array(
   'name' => 'Салон красоты',
   'id' => 'service3-desc-lang-2',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Парикмахерский зал, косметология, солярий',
 ));
 
 $normalPanel->createOption( array(
  'name' => 'Трансфер',
  'id' => 'service4-desc-lang-2',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Заберем из аэропорта или вокзала, отвезем обратно',
  ));

 $normalPanel->createOption( array(
   'name' => 'Размещение с питомцами',
   'id' => 'service5-desc-lang-2',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Размещение с домашними животными',
 ));
 
 $normalPanel->createOption( array(
  'name' => 'Парковка',
  'id' => 'service6-desc-lang-2',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Автостоянка у отеля',
  ));

 $normalPanel->createOption( array(
   'name' => 'Ресепшн 24/7',
   'id' => 'service7-desc-lang-2',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Круглосуточный ресепшн',
 ));

 $normalPanel->createOption( array(
  'name' => 'Камера хранения',
  'id' => 'service8-desc-lang-2',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Камера хранения на ресепшене',
  ));

 $normalPanel->createOption( array(
   'name' => 'Завтраки',
   'id' => 'service9-desc-lang-2',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Завтрак в комплекте',
 ));

 $normalPanel->createOption( array(
  'name' => 'Доставка в номер',
  'id' => 'service10-desc-lang-2',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Доставка еды в номер',
  ));

  $normalPanel->createOption( array(
  'name' => 'Экскурсии',
  'id' => 'service11-desc-lang-2',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Организация экскурсий',
  ));

 $normalPanel->createOption( array(
   'name' => 'Wi-Fi',
   'id' => 'service12-desc-lang-2',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Доступ в интернет',
 ));

  $normalPanel->createOption( array(
   'name' => 'Конференц-зал',
   'id' => 'service13-desc-lang-2',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Организация мероприятий, конференций',
   ));

 $normalPanel->createOption( array(
  'name' => 'Бизнес-услуги',
  'id' => 'service14-desc-lang-2',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Оргтехника, корреспенденция',
  ));

  $normalPanel->createOption( array(
  'name' => 'Бассейн',
  'id' => 'service15-desc-lang-2',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Подогреваемый бассейн на территории',
  ));

 $normalPanel->createOption( array(
   'name' => 'Спортзал',
   'id' => 'service16-desc-lang-2',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Спортзал, фитнес в отеле',
 ));

 $normalPanel->createOption( array(
  'name' => 'Прачечная',
  'id' => 'service17-desc-lang-2',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Услуги прачечной',
  ));

 $normalPanel->createOption( array(
   'name' => 'Утюг',
   'id' => 'service18-desc-lang-2',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Утюг, гладильная доска на прокат',
 ));

  $normalPanel->createOption( array(
   'name' => 'Услуга Будильник',
   'id' => 'service19-desc-lang-2',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Утренняя побудка',
   ));

  $normalPanel->createOption( array(
   'name' => 'Визовая поддержка',
   'id' => 'service20-desc-lang-2',
   'type' => 'text',
   'desc' => 'Краткое описание услуги',
   'default' => 'Оформление визового приглашения',
   ));

 $normalPanel->createOption( array(
  'name' => 'Анти-ковид',
  'id' => 'service21-desc-lang-2',
  'type' => 'text',
  'desc' => 'Краткое описание услуги',
  'default' => 'Маски, перчатки, санитайзеры',
  ));

$normalPanel->createOption( array(
  'name' => 'Раздел Отзывы',
  'type' => 'heading',
  ) );

$normalPanel->createOption( array(
'name' => 'Отзыв 1 - текст',
'id' => 'feedback1-text-lang-2',
'type' => 'textarea', 
'desc' => 'Разместите текст отзыва. ',
'default' => 'Текст отзыва 1',
));

$normalPanel->createOption( array(
'name' => 'Отзыв 2 - текст',
'id' => 'feedback2-text-lang-2',
'type' => 'textarea', 
'desc' => 'Разместите текст отзыва. ',
'default' => 'Текст отзыва 2',
)); 

$normalPanel->createOption( array(
 'name' => 'Отзыв 3 - текст',
'id' => 'feedback3-text-lang-2',
'type' => 'textarea', 
 'desc' => 'Разместите текст отзыва. ',
'default' => 'Текст отзыва 3',
 ));
 
$normalPanel->createOption( array(
'name' => 'Отзыв 4 - текст',
'id' => 'feedback4-text-lang-2',
'type' => 'textarea', 
'desc' => 'Разместите текст отзыва. ',
'default' => 'Текст отзыва 4',
 )); 
 
$normalPanel->createOption( array(
'name' => 'Отзыв 5 - текст',
  'id' => 'feedback5-text-lang-2',
'type' => 'textarea', 
  'desc' => 'Разместите текст отзыва. ',
  'default' => 'Текст отзыва 5',
)); 

$normalPanel->createOption( array(
'name' => 'Отзыв 6 - текст',
'id' => 'feedback6-text-lang-2',
'type' => 'textarea', 
'desc' => 'Разместите текст отзыва. ',
'default' => 'Текст отзыва 6',
));

$normalPanel->createOption( array(
'name' => 'Отзыв 7 - текст',
 'id' => 'feedback7-text-lang-2',
'type' => 'textarea', 
 'desc' => 'Разместите текст отзыва. ',
'default' => 'Текст отзыва 7',
));

$normalPanel->createOption( array(
 'name' => 'Раздел Произвольный контент 1',
'type' => 'heading',
  ) );

$normalPanel->createOption( array(
'name' => 'Заголовок раздела',
'id' => 'custom1-title-lang-2',
'type' => 'text', 
'desc' => 'Впишите заголовок раздела',
 'default' => 'Произвольный контент 1',
) );

$normalPanel->createOption( array(
'name' => 'Наполнение',
 'id' => 'custom1-text-lang-2',
'type' => 'editor',
 'desc' => 'Разместите здесь любой контент.',
'default' => ' <p>Кроме готовых разделов, на статической Главной имеется блок для размещения любых материалов. Например, для которых нет готового раздела. Размещайте сюда текст из консоли темы, форматируйте по вкусу, добавляйте свои изображения...</p>',
) );

$normalPanel->createOption( array(
 'name' => 'Раздел Произвольный контент 2',
 'type' => 'heading',
  ) );
  
$normalPanel->createOption( array(
  'name' => 'Заголовок раздела',
  'id' => 'custom2-title-lang-2',
  'type' => 'text', 
  'desc' => 'Впишите заголовок раздела',
  'default' => 'Произвольный контент 2',
) );

$normalPanel->createOption( array(
  'name' => 'Наполнение',
  'id' => 'custom2-text-lang-2',
  'type' => 'editor',
  'desc' => 'Разместите здесь любой контент.',
  'default' => ' <p>Кроме готовых разделов, на статической Главной имеется блок для размещения любых материалов. Например, для которых нет готового раздела. Размещайте сюда текст из консоли темы, форматируйте по вкусу, добавляйте свои изображения....</p>',
) );

$normalPanel->createOption( array(
  'name' => 'Страница Номерной фонд',
  'type' => 'heading',
  ) );
  
  $normalPanel->createOption( array(
  'name' => 'Заголовок страницы',
  'id' => 'rooms-archive-title-lang-2',
  'type' => 'text',
  'desc' => 'Разместите заголовок страницы',
  'default' => 'Номерной фонд',
  ));
  
$normalPanel->createOption( array(
  'name' => 'Форма заказа для поп-апа',
  'id' => 'rooms-popup-form-lang-2',
  'type' => 'text', 
  'desc' => 'Создайте форму  Contact Form7 на втором языке и разместите здесь ее шорткод.',
  'default'=> ' ',
));
$normalPanel->createOption( array(
  'name' => 'Дополнительный текст',
  'id' => 'rooms-custom-text-lang-2',
  'type' => 'editor',
  'desc' => 'На странице Номерной фонд также предусмотрен блок для размещения произвольного контента. С его помощью вы можете вывести любой дополнительный текст - для посетителей, для SEO и т.п. Отформатрируйте текст, добавьте изображение, таблицу, ссылки. Блок поддерживает шорткоды.',
  'default' => '<p>На странице Номерной фонд также предусмотрен блок для размещения произвольного контента. С его помощью вы можете вывести любой дополнительный текст - для посетителей, для SEO...</p>',
) );

$normalPanel->createOption( array(
  'name' => 'Текст в контактном блоке',
  'id' => 'rooms-contact-text-lang-2',
  'type' => 'editor', 
  'desc' => 'Разместите текст в контактном блоке для страницы Номерной фонд и карточек номеров.',
  'default'=> '<p>Остались вопросы? Хотите узнать больше? <br /> Забронировать номер? <br />Звоните нам, мы всегда на связи!</p>',
));

$normalPanel->createOption( array(
  'name' => 'Блог',
  'type' => 'heading',
  ) );
  
$normalPanel->createOption( array(
  'name' => 'Заголовок страницы блога',
  'id' => 'blog-title-lang-2',
  'type' => 'text', 
  'desc' => 'Разместите заголовок для страницы блога. Обратите внимание, это h1.',
  'default'=> 'Статьи и новости',
));

$normalPanel->createOption( array(
  'name' => 'Страница Контакты',
  'type' => 'heading',
  ) );
$normalPanel->createOption( array(
  'name' => 'Заголовок страницы',
  'id' => 'contact-page-title-lang-2',
  'type' => 'text', 
  'desc' => 'Разместите  заголовок для страницы Контакты. Обратите внимание, это h1.',
  'default'=> 'Контакты отеля',
));

$normalPanel->createOption( array(
  'name' => 'Страница Спасибо',
  'type' => 'heading',
  ) );
  
  $normalPanel->createOption( array(
    'name' => 'Адрес страницы',
    'id' => 'thankyou-url-lang-2',
    'type' => 'text', 
    'desc' => 'Создайте страницу Спасибо по инструкции, здесь разместите адрес данной страницы. Не забываем про http:// или https://',
    'default' => '',
  ) );
  
$normalPanel->createOption( array(
  'name' => 'Текст',
  'id' => 'thankyou-text-lang-2',
  'type' => 'editor',
  'desc' => 'Разместите текст на странице Спасибо, куда редиректится посетитель после отправки сообщения через формы сайта.',
  'default' => '<p>Уважаемый посетитель, Ваше сообщение благополучно отправлено. Спасибо, что написали нам. Через несколько минут менеджер перезвонит для уточнения деталей...</p>',
));

$normalPanel->createOption( array(
  'name' => 'Выплывающий блок',
  'type' => 'heading',
  ) );
$normalPanel->createOption( array(
  'name' => 'Заголовок',
  'id' => 'float-block-title-lang-2',
  'type' => 'text',
  'desc' => 'Разместите заголовок. Оптимально 5-6 слов.',
  'default' => ' Скидка 15% при прямом бронировании',
));
$normalPanel->createOption( array(
  'name' => 'Текст',
  'id' => 'float-block-text-lang-2',
  'type' => 'textarea',
  'desc' => 'Разместите текст. Оптимально 10-12 слов.',
  'default' => 'Забронируйте проживание на сайте или по телефону и получите скидку 15%',
));

$normalPanel->createOption( array(
  'name' => 'Ссылка',
  'id' => 'float-block-url-lang-2',
  'type' => 'text',
  'desc' => 'Разместите адрес страницы, которая откроется по клику на ссылку. Не забываем http:// или https://',
  'default' => '',
));
 
$normalPanel->createOption( array(
  'type' => 'save',
));

}
