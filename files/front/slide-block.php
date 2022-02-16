<?php
// выплывающее окно
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
		$float_block_title = $titan->getOption( 'float-block-title-default' ); 
		$float_block_text = $titan->getOption( 'float-block-text-default' );
		$float_block_url = $titan->getOption( 'float-block-url-default' );
	  }
	  if ( $key == '1') {
		$float_block_title = $titan->getOption( 'float-block-title-lang-1' ); 
		$float_block_text = $titan->getOption( 'float-block-text-lang-1' );
		$float_block_url = $titan->getOption( 'float-block-url-lang-1' );
	  }
	  if ( $key == '2') {
		$float_block_title = $titan->getOption( 'float-block-title-lang-2' ); 
		$float_block_text = $titan->getOption( 'float-block-text-lang-2' );
		$float_block_url = $titan->getOption( 'float-block-url-lang-2' );
	  }
	}
  }		
	// если не подключен, отдаем значения по умолчанию
	} else {	
		$float_block_title = $titan->getOption( 'float-block-title-default' ); 
		$float_block_text = $titan->getOption( 'float-block-text-default' );
		$float_block_url = $titan->getOption( 'float-block-url-default' );
	}
?>

<div class="flex-port modal">
	<div class="modal__img">
		<div class="modal__img-wrapper">
		</div><!-- end modal img wrapper-->
	</div><!-- end modal img -->
		
	<div class="modal__content">
		<span class="modal__title"><?php echo $float_block_title; ?></span>
		<span class="modal__text"> <?php echo $float_block_text; ?> 
		<a href="<?php echo $float_block_url; ?>"><?php _e('Подробности', 'gp-resort'); ?></a> 
	    </span>
	</div><!-- end modal content -->
	 
	<button class="close"></button>
</div><!-- end modal --> 