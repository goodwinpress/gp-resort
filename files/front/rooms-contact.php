<?php
// контактный блок в архиве номеров и в карточке номера
$titan = TitanFramework::getInstance( 'resort' );

$rooms_contact_phone = $titan->getOption( 'profile-phone-1' );
// проверем, подключен ли polylang
if (function_exists('pll_current_language')) {
// если да, получаем из него массив	языков
$lang = pll_languages_list();
	// перебираем языки, выделяем ключ и локаль
	foreach ($lang as $key => $slug) {
		// отдаем из консоли темы содержимое полей под данную локаль в зависимости от ключа
		if(pll_current_language() == $slug){
			if ( $key == '0') {
			$rooms_contact_text = $titan->getOption( 'rooms-contact-text-default' ); 
			}
			if ( $key == '1') {
			$rooms_contact_text = $titan->getOption( 'rooms-contact-text-lang-1' );
			}
			if ( $key == '2') {
			$rooms_contact_text = $titan->getOption( 'rooms-contact-text-lang-2' );
			}
		}
	}		
		// если не подключен, отдаем значения по умолчанию
		} else {	
		$rooms_contact_text = $titan->getOption( 'rooms-contact-text-default' );
		}
?>

 <div class="flex-port call-block">
		<div class="call-block-img">
		</div><!-- end call-block-img  -->	

		<div class="call-block-text">
			<?php echo $rooms_contact_text; ?>
			<p class="phone-number"> <?php echo $rooms_contact_phone; ?></p>
		</div><!-- end call-block-text  -->	
</div><!-- end flex-port  -->