<?php
// архивная динамическая страница, витрина номеров
$titan = TitanFramework::getInstance( 'resort' );

get_header(); 

// проверем, подключен ли polylang
if (function_exists('pll_current_language')) {
// если да, получаем из него массив	языков
$lang = pll_languages_list();
	// перебираем языки, выделяем ключ и локаль
	foreach ($lang as $key => $slug) {
		// отдаем из консоли темы содержимое полей под данную локаль в зависимости от ключа
		if(pll_current_language() == $slug){
			if ( $key == '0') {
			$rooms_archive_title = $titan->getOption( 'rooms-archive-title-default' ); 
			$rooms_custom_text = $titan->getOption( 'rooms-custom-text-default' ); 
			}
			if ( $key == '1') {
			$rooms_archive_title = $titan->getOption( 'rooms-archive-title-lang-1' ); 
			$rooms_custom_text = $titan->getOption( 'rooms-custom-text-lang-1' );
			}
			if ( $key == '2') {
			$rooms_archive_title = $titan->getOption( 'rooms-archive-title-lang-2' ); 
			$rooms_custom_text = $titan->getOption( 'rooms-custom-text-lang-2' );
			}
		}
	}		
		// если не подключен, отдаем значения по умолчанию
		} else {	
			$rooms_archive_title = $titan->getOption( 'rooms-archive-title-default' ); 
			$rooms_custom_text = $titan->getOption( 'rooms-custom-text-default' );
		}
?>
 
<main class="rooms-archive"> 
	
<div class="rooms-archive__header gp-clearfix">	
	<?php
	// изображение в шапке страницы
	$imageID = $titan->getOption( 'rooms-archive-img' );
	gp_rooms_archive_img($imageID);
	?>
 
	<div class="rooms-archive__header-wrapper">	
		<section class="rooms-archive__header-caption"> 
			<?php
			// хлебные крошки
			if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
			?>
			<h1 class="rooms-archive__title" itemprop="headline">
			<?php
			// заголовок страницы
			echo $rooms_archive_title;
			?>
			</h1>
		</section> <!-- end rooms-archive__header-caption-->
	</div><!-- end rooms-archive__header-wrapper -->
</div><!-- end rooms-archive__header-->
	 
<?php if ($titan->getOption( 'show-tl-loc' ) == '1') {  ?>
	<div class="block-wrapper tl-wrapper rooms-archive__tl-wrapper">
	<?php
	// модуль Traveline, если есть
	$tl_code = $titan->getOption( 'tl-code' ); 
	echo $tl_code; ?>
	</div> <!-- end tl-wrapper -->
<?php } ?>

	<div class="gp-container"> 
		
		<div class="block-wrapper">
		<?php
		// начало цикла
		if ( have_posts() ) : while ( have_posts() ) : the_post();  
		?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('rooms-archive-item flex-port mod-flex-wrap'); ?> itemscope itemtype="http://schema.org/Article">
			
				<div class="rooms-archive-item__slider">
				<?php
					 if ($titan->getOption( 'rooms-archive-media-loc' ) == '1') {   
					// слайдер в карточке номера
					$room_id = get_the_ID();
					gp_rooms_archive_slider($room_id );
					} else {
					// или одно статичное Изображение номера	
					gp_rooms_item_img();	
					}
				?>
				</div><!-- end rooms-archive-item__slider -->
				
				<div class="rooms-archive-item__description">
					
					<h2 class="rooms-archive-item__title" itemprop="headline"><a href="<?php echo get_permalink(); ?>" rel="bookmark">
						<?php
						// заголовок
						the_title(); 
						?></a>
					</h2>
					<span class="rooms-archive-item__price">
					<?php 
						// стоимость проживания
						$price = get_post_meta($post->ID, 'roomprice', true); 
						if( ! empty( $price) )  {
						echo  $price; 
					}
						// валюта
						$currency = $titan->getOption( 'currency' );
						gp_currency($currency);
					?>
					</span><!-- end single-room__info__price -->
					
					<?php 
						// площадь номера
						$square = get_post_meta($post->ID, 'square', true); 
					?>
					<p class="rooms-archive-item__text">&#8212; <?php _e('Площадь', 'gp-resort'); ?> <?php echo $square; ?> м² </p>
				
					<?php 
						// количество и тип кровати
						$val =  get_post_meta( $post->ID, 'beds', true  );
						gp_beds( $val);
					?>
					<div itemprop="articleBody">
					<?php 
						// короткое описание номера
						$description = get_post_meta($post->ID, 'room_desc', true); 
						gp_rooms_short_desc( $description);
					?>
					</div><!-- end articleBody -->
						<div class="rooms-archive-item__buttons">
							<a class="gp-button color-button" href="<?php echo get_permalink(); ?>"><?php _e('Подробнее', 'gp-resort'); ?></a> 
							<?php if ($titan->getOption( 'rooms-popup-btn-loc' ) == '1') { ?>
							<button class="gp-button transparent-button open_modal" rel="<?php the_ID(); ?>"><?php _e('Хочу такой номер', 'gp-resort'); ?></button> 
							<?php  } ?>
						</div><!-- end rooms-archive-item__buttons -->
							
				</div><!-- end rooms-archive-item__description -->
					
					
			<?php
			//микроразметка
			get_template_part ('files/back/microdata');
	
			// поп-ап Забронировать номер
			if ($titan->getOption( 'rooms-popup-btn-loc' ) == '1') {
			get_template_part ('files/front/popup-rooms'); 
			}
			?>
			
			</article><!-- end article -->
			
		<?php 
		 endwhile;  
		 endif; 
		?>
		
		</div><!-- end block-wrapper  -->
			
	</div><!-- end gp-container -->

	<div class="gp-container"> 
		<div class="block-wrapper static-page-content-wrapper"> 
		<?php
		// дополнительный текст
		echo $rooms_custom_text;
		?>
		</div><!-- end block-wrapper -->
	</div><!-- end gp-container -->

</main><!-- end main -->

<?php
	// контактный блок
	if ($titan->getOption( 'rooms-contact-loc' ) == '1') {
	get_template_part ('files/front/rooms-contact'); 
	}
?>	

<?php get_footer(); ?>