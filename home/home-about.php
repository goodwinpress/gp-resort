<?php

// раздел О нас на главной странице
$titan = TitanFramework::getInstance( 'resort' );

//получаем значения из консоли
$benefit1_number = $titan->getOption('benefit1-number'); 
$benefit2_number = $titan->getOption('benefit2-number'); 
$benefit3_number = $titan->getOption('benefit3-number'); 
$benefit4_number = $titan->getOption('benefit4-number'); 

// проверем, подключен ли polylang
if (function_exists('pll_current_language')) {
// если да, получаем из него массив	языков
$lang = pll_languages_list();
	// перебираем языки, выделяем ключ и локаль
	foreach ($lang as $key => $slug) {
		// отдаем из консоли темы содержимое полей под данную локаль в зависимости от ключа
		if(pll_current_language() == $slug){
			if ( $key == '0') {
				$about_title = $titan->getOption( 'about-title-default' ); 
				$about_text = $titan->getOption( 'about-text-default' );
				$benefit1_text = $titan->getOption( 'benefit1-text-default' );
				$benefit2_text = $titan->getOption( 'benefit2-text-default' );
				$benefit3_text = $titan->getOption( 'benefit3-text-default' );
				$benefit4_text = $titan->getOption( 'benefit4-text-default' );
			}
			if ( $key == '1') {
				$about_title = $titan->getOption( 'about-title-lang-1' ); 
				$about_text = $titan->getOption( 'about-text-lang-1' );
				$benefit1_text = $titan->getOption( 'benefit1-text-lang-1' );
				$benefit2_text = $titan->getOption( 'benefit2-text-lang-1' );
				$benefit3_text = $titan->getOption( 'benefit3-text-lang-1' );
				$benefit4_text = $titan->getOption( 'benefit4-text-lang-1' );
			}
			if ( $key == '2') {
				$about_title = $titan->getOption( 'about-title-lang-2' ); 
				$about_text = $titan->getOption( 'about-text-lang-2' );
				$benefit1_text = $titan->getOption( 'benefit1-text-lang-2' );
				$benefit2_text = $titan->getOption( 'benefit2-text-lang-2' );
				$benefit3_text = $titan->getOption( 'benefit3-text-lang-2' );
				$benefit4_text = $titan->getOption( 'benefit4-text-lang-2' );
			}
		}
	}		
		// если не подключен, отдаем значения по умолчанию
		} else {	
				$about_title = $titan->getOption( 'about-title-default' ); 
				$about_text = $titan->getOption( 'about-text-default' );
				$benefit1_text = $titan->getOption( 'benefit1-text-default' );
				$benefit2_text = $titan->getOption( 'benefit2-text-default' );
				$benefit3_text = $titan->getOption( 'benefit3-text-default' );
				$benefit4_text = $titan->getOption( 'benefit4-text-default' );
		}
?>


<div class="gp-container">
 
	<div class="flex-port block-wrapper">
		
	<div class="about-text">
	<h2 class="gp-container__title"><?php echo $about_title; ?></h2>
	<?php echo $about_text; ?>
	</div><!-- end about-text -->
		
	<div class="about-img">
	<?php	if ($titan->getOption( 'video-loc' ) == '1') { ?>
	<div class="about-img__button-wrapper"><button class="video-btn open_modal" rel="popup2"></button></div>
	<?php } ?>
	</div><!-- end about-img --> 
		
	</div><!-- end flex-port -->
	
</div><!-- end gp-container -->	
	
	
<div class="gp-container">
	<div class="flex-port block-wrapper">
	<?php
	echo '<div class="benefit-item"><span>' . $benefit1_number . '</span> <p>' . $benefit1_text . '</p></div>';
	echo '<div class="benefit-item"><span>' . $benefit2_number . '</span> <p>' . $benefit2_text . '</p></div>';
	echo '<div class="benefit-item"><span>' . $benefit3_number . '</span> <p>' . $benefit3_text . '</p></div>';
	echo '<div class="benefit-item"><span>' . $benefit4_number . '</span> <p>' . $benefit4_text . '</p></div>';
	?>
	</div><!-- end flex-port -->
</div><!-- end gp-container -->


<?php	
	// поп-ап с видео
	if ($titan->getOption( 'video-loc' ) == '1') { ?>
	<div class="popup popup__video" id="popup2">
	<?php echo $titan->getOption( 'video-code' ); ?>
	<span class="pop-title"><?php echo $about_title; ?></span>
	<button class="close"></button>
	</div><!-- end popup 2 -->
<?php } ?>