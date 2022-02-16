<?php
// поп ап бронирование
$titan = TitanFramework::getInstance( 'resort' ); 

// проверем, подключен ли polylang
if (function_exists('pll_current_language')) {
// если да, получаем из него массив	языков
$lang = pll_languages_list();
    // перебираем языки, выделяем ключ и локаль
    foreach ($lang as $key => $slug) {
        // отдаем из консоли темы содержимое полей под данную локаль в зависимости от ключа
        if(pll_current_language() == $slug){
            if ( $key == '0') {
                $policy_url = $titan->getOption( 'policy-url-default' ); 
                $order_form = $titan->getOption( 'rooms-popup-form-default' ); 
            }
            if ( $key == '1') {
                $policy_url = $titan->getOption( 'policy-url-lang-1' ); 
                $order_form = $titan->getOption( 'rooms-popup-form-lang-1' ); 
            }
            if ( $key == '2') {
                $policy_url = $titan->getOption( 'policy-url-lang-2' ); 
                $order_form = $titan->getOption( 'rooms-popup-form-lang-2' ); 
            }
        }
    }	
    // если не подключен, отдаем значения по умолчанию
    } else {	
            $policy_url = $titan->getOption( 'policy-url-default' ); 
            $order_form = $titan->getOption( 'rooms-popup-form-default' ); 
    }
?>

<div class="popup rooms-popup" id="<?php the_ID(); ?>">
    <span class="pop-title"><?php the_title(); ?></span>
    <?php 
    // форма из Contact Form 7
     echo do_shortcode( $order_form );

    // персональные данные
    if ($titan->getOption( 'agree-loc' ) == '1') {  
    echo '<input type="checkbox" class="custom-checkbox" id="wpcf7-checkbox"  name="check" checked>';
    echo '<label for="check">' . __('Я даю согласие на сбор и обработку персональных данных', 'gp-resort') . '. <a href="' . $policy_url . '">' . __('Политика конфиденциальности', 'gp-resort') . '</a></label>';
    }
    ?>
    <button class="close"></button>
</div><!-- end popup  -->