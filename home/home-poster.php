<?php
// раздел Постер на главной странице
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
				$poster_title = $titan->getOption( 'poster-title-default' ); 
				$poster_desc = $titan->getOption( 'poster-desc-default' );
				$poster_btn = $titan->getOption( 'poster-btn-default' );
				$poster_btn_url = $titan->getOption( 'poster-btn-url-default' );
			}
			if ( $key == '1') {
				$poster_title = $titan->getOption( 'poster-title-lang-1' ); 
				$poster_desc = $titan->getOption( 'poster-desc-lang-1' );
				$poster_btn = $titan->getOption( 'poster-btn-lang-1' );
				$poster_btn_url = $titan->getOption( 'poster-btn-url-lang-1' );
			}
			if ( $key == '2') {
				$poster_title = $titan->getOption( 'poster-title-lang-2' ); 
				$poster_desc = $titan->getOption( 'poster-desc-lang-2' );
				$poster_btn = $titan->getOption( 'poster-btn-lang-2' );
				$poster_btn_url = $titan->getOption( 'poster-btn-url-lang-2' );
			}
		}
	}	
	// если не подключен, отдаем значения по умолчанию
	} else {	
			$poster_title = $titan->getOption( 'poster-title-default' ); 
			$poster_desc = $titan->getOption( 'poster-desc-default' );
			$poster_btn = $titan->getOption( 'poster-btn-default' );
			$poster_btn_url = $titan->getOption( 'poster-btn-url-default' );
	}
	?>


<div class="poster gp-clearfix">
	
	<div class="poster__img-wrapper">
		<div class="poster__img">
		</div><!-- end poster img -->
	</div><!-- end poster img wrapper  -->
	
	<div class="poster-caption">
		<h2 class="poster-caption__title"><?php echo $poster_title; ?></h2>
			<?php 
			// текст
			echo '<p>'. $poster_desc . '</p>';
			// кнопка
			echo' <a class="poster-btn" href="' . $poster_btn_url . '">' . $poster_btn . '</a>';
			?>
	</div><!-- end poster caption -->
		
</div><!-- end poster -->