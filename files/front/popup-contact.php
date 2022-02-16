<?php
// поп ап чат + заказ звонка

$titan = TitanFramework::getInstance( 'resort' ); 

// получаем данные из консоли темы
$profile_phone1 = $titan->getOption( 'profile-phone-1' );
$profile_whatsapp = $titan->getOption( 'profile-whatsapp' );


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
                $header_form = $titan->getOption( 'header-shortcode-default' ); 
            }
            if ( $key == '1') {
                $policy_url = $titan->getOption( 'policy-url-lang-1' ); 
                $header_form = $titan->getOption( 'header-shortcode-lang-1' ); 
            }
            if ( $key == '2') {
                $policy_url = $titan->getOption( 'policy-url-lang-2' ); 
                $header_form = $titan->getOption( 'header-shortcode-lang-2' ); 
            }
        }
    }	
        // если не подключен, отдаем значения по умолчанию
        } else {	
                $policy_url = $titan->getOption( 'policy-url-default' ); 
                $header_form = $titan->getOption( 'header-shortcode-default' ); 
        }
?>

<div class="popup" id="popup1">
    <span class="pop-title"><?php _e('Позвоните или напишите нам', 'gp-resort'); ?></span>
        <?php
        $vars = array('(', ')', ' ','-');
        echo '<a href="tel:' . str_replace($vars, '', $profile_phone1) .'" class="popup-btn popup-call">' . __('Позвонить', 'gp-resort') . '</a>';
        $vars = array('+', '(', ')', ' ','-');
        echo '<a href="https://wa.me/' . str_replace($vars, '', $profile_whatsapp) .'" class="popup-btn popup-chat">' . __('Написать в WhatsApp', 'gp-resort') . '</a>';
        ?>
    <span class="pop-title"><?php _e('Либо закажите обратный звонок', 'gp-resort'); ?></span>
     
    <?php
        // форма contact form 7
        echo do_shortcode( $header_form );
        
        // персональные данные
        if ($titan->getOption( 'agree-loc' ) == '1') {  
        echo '<input type="checkbox" class="custom-checkbox" id="wpcf7-checkbox"  name="check" checked>';
        echo '<label for="check">' . __('Я даю согласие на сбор и обработку персональных данных', 'gp-resort') . '. <a href="' . $policy_url . '">' . __('Политика конфиденциальности', 'gp-resort') . '</a></label>';
        }
    ?>
    <button class="close"></button>
</div><!-- end popup 1 -->