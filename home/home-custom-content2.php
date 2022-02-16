<?php
// Второй раздел для произвольного контента на главной
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
				$custom2_title = $titan->getOption( 'custom2-title-default' ); 
				$custom2_text = $titan->getOption( 'custom2-text-default' );
			}
			if ( $key == '1') {
				$custom2_title = $titan->getOption( 'custom2-title-lang-1' ); 
				$custom2_text = $titan->getOption( 'custom2-text-lang-1' );
			}
			if ( $key == '2') {
				$custom2_title = $titan->getOption( 'custom2-title-lang-2' ); 
				$custom2_text = $titan->getOption( 'custom2-text-lang-2' );
			}
		}
	}	
// если не подключен, отдаем значения по умолчанию
	} else {	
		$custom2_title = $titan->getOption( 'custom2-title-default' ); 
		$custom2_text = $titan->getOption( 'custom2-text-default' );
	}
?>

<div class="gp-container gp-custom-content">
	
	<div class="container-center-title">
		<h2 class="gp-container__title"><?php echo $custom2_title; ?></h2>
	</div><!-- end container-center-title -->	
			
	<div class="block-wrapper">
		<?php echo do_shortcode($custom2_text); ?>
	</div><!-- end block-wrapper -->
	
</div><!-- end gp container -->