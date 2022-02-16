<?php
// раздел шапки, отвечащий за вывод контактного телефона и поп-апа с кнопками и формой заказа обратного звонка (files/front/popup-1.php)

$titan = TitanFramework::getInstance( 'resort' );
$profile_phone1 = $titan->getOption( 'profile-phone-1' );
?>

<div class="header-phone open_modal" rel="popup1"><p><?php echo $profile_phone1; ?></p>
<em><?php _e('Звонок или онлайн-чат', 'gp-resort'); ?></em>
</div><!-- end header-phone -->