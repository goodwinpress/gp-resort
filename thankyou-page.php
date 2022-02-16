<?php
/*
Template Name: Страница Спасибо
*/
get_header(); 
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
			$thankyou_text = $titan->getOption( 'thankyou-text-default' ); 
			}
			if ( $key == '1') {
			$thankyou_text = $titan->getOption( 'thankyou-text-lang-1' ); 
			}
			if ( $key == '2') {
			$thankyou_text = $titan->getOption( 'thankyou-text-lang-2' ); 
			}
		}
	}		
		// если не подключен, отдаем значения по умолчанию
		} else {	
		$thankyou_text = $titan->getOption( 'thankyou-text-default' );  
		}
	?>
 


<div class="gp-container thanks-wrapper">
	
	<div class="block-wrapper"> 
		
		<main> 
			
			<article <?php post_class('gp-single-post'); ?>  itemscope itemtype="http://schema.org/Article">
			  
					<div class="post-header">
					<?php
					// хлебные крошки
					  if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
					?>
					
					<h1 class="post-title"  itemprop="headline"><?php _e('Сообщение отправлено', 'gp-resort'); ?></h1>
					</div> <!-- end post header -->
			  
				<div class="post-content" itemprop="articleBody">
				<?php echo $thankyou_text; ?>
				</div><!-- end post-content -->
			  
			 </article><!-- end article -->
		
		</main>
	
	</div><!-- end block-wrapper -->
	
</div><!-- end gp container -->

	 <?php
	// контактный блок
	if ($titan->getOption( 'thankyou-page-footer-loc' ) == '1') {
	get_template_part ('home/home-gallery'); 
	  } 
	  
	if ($titan->getOption( 'thankyou-page-footer-loc' ) == '2') {
	// или галерея, на выбор
	get_template_part ('files/front/rooms-contact'); 
	}

	if ($titan->getOption( 'thankyou-page-footer-loc' ) == '3') {
	get_template_part ('files/front/recent-posts'); 
	}
	?>

<?php get_footer(); ?>