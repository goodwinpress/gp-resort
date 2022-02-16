<?php
// раздел Номера на Главной
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
			$rooms_title = $titan->getOption( 'rooms-title-default' ); 
			$rooms_text = $titan->getOption( 'rooms-text-default' );
			}
			
			if ( $key == '1') {
			$rooms_title = $titan->getOption( 'rooms-title-lang-1' ); 
			$rooms_text = $titan->getOption( 'rooms-text-lang-1' );
			}
			
			if ( $key == '2') {
			$rooms_title = $titan->getOption( 'rooms-title-lang-2' ); 
			$rooms_text = $titan->getOption( 'rooms-text-lang-2' );
			}
		}
	}		
	// если не подключен, отдаем значения по умолчанию
	} else {	
		$rooms_title = $titan->getOption( 'rooms-title-default' ); 
		$rooms_text = $titan->getOption( 'rooms-text-default' );
	}
?>
	

<div class="gp-container">
	
	<div class="flex-port block-wrapper">
		<div class="container-title">
			<h2 class="gp-container__title"><?php echo $rooms_title; ?></h2>
		</div><!-- end container-title -->
		
		<div class="container-text">
			<?php echo $rooms_text; ?>
		</div><!-- end container-text -->
	</div><!-- end flex-port -->
	
	 
	<div class="flex-port block-wrapper rooms-home-container">
		
		<?php 
		// на выбор - выводим либо все номера подряд 	
			if ($titan->getOption( 'rooms-view-loc' ) == '1') {
			$key =  '0';
		} else {
			// либо только номера, выбранные админом
			$key =  'room_popular';
		}	
		
		// начало цикла
		$query = new WP_Query( array('post_type' => 'rooms', 'meta_key' => $key,  'posts_per_page' => 99 ) );
		while ( $query->have_posts() ) : $query->the_post(); 
		?>	
	
		<div class="room-item" itemscope itemtype="http://schema.org/Article"> 
			
			<?php
			// изображение номера
			home_rooms_thumb(); 
			?>	
			
			<div class="room-item__caption">
				<h2 class="room-item__title"><?php the_title(); ?></h2>
				
				<?php 
					// стоимость проживания
					$price = get_post_meta($post->ID, 'roomprice', true); 
					if( ! empty( $price) )  {
					echo '<span class="room-price">&#8212; ' . $price . ' <em>'; 
				}
					// валюта
					$currency = $titan->getOption( 'currency' );
					gp_currency($currency);
					echo '</em></span>'; 
				?>	 
		    </div><!-- end room caption -->
				
			<div class="room-hover-caption">
				<span class="hover-caption__title"><?php _e('Оборудование номера', 'gp-resort'); ?>:</span>
				
					<div class="room-icons-wrapper">  
						<?php 
							// площадь номера
							$square = get_post_meta($post->ID, 'square', true); 
							echo '<span class="room-icons square-icon" title="' . __('Площадь номера', 'gp-resort') .': ' .  $square . ' м²">' . $square . ' м²</span>';
							
							// тип кровати
							$val =  get_post_meta( $post->ID, 'beds', true  );
							gp_home_beds( $val);
							 
							// оборудование номера, иконки
							$items =  get_post_meta( $post->ID, 'elements', true  );
							gp_room_equipment($items);
						?>
					</div><!-- end room-icons-wrapper -->
						
				<a class="room-hover-btn" href="<?php echo get_permalink(); ?>" rel="bookmark"><?php _e('Подробности', 'gp-resort'); ?></a>
			</div><!-- end room-hover-caption -->
			
			<?php 
			//микроразметка
			get_template_part ('files/back/microdata'); 
			?>
			
		</div><!-- end room-item -->
	
		<?php 
			endwhile;
			wp_reset_postdata(); 
		?>
	
	</div><!-- end flex-port -->
	
		<?php
			// если выводятся все опубликованные номера, то убираем и кнопку
			if ($titan->getOption( 'rooms-view-loc' ) == '2') { ?>
			<a class="all-rooms-btn" href="<?php bloginfo('url'); ?>/rooms/"><?php _e('Посмотреть все номера', 'gp-resort'); ?></a>
		<?php } ?>
	
</div><!-- end gp-container -->