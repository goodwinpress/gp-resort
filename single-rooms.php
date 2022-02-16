<?php
// шаблон страницы номера
$titan = TitanFramework::getInstance( 'resort' );
get_header(); ?>
 
<main> 
	<?php
	if ( have_posts() ) : while ( have_posts() ) : the_post();  
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
	
		<div class="single-room__header gp-clearfix">		
			<?php
			single_room_poster();
			 ?>
			<div class="single-room__header-wrapper">	
				<section class="single-room__header-caption"> 
					<?php
					// хлебные крошки
					if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
					?>
					<h1 class="single-room__title" itemprop="headline"><?php the_title(); ?></h1>
				</section><!-- end single-room__header-caption -->
			</div><!-- end single-room__header__wrapper -->
		</div><!-- end single-room__header -->
		  
		<div class="gp-container"> 	

		<div class="flex-port block-wrapper">
	
			<div class="single-room__info flex-port">
				
				<div class="single-room__info__price">
					<p><?php _e('Стоимость проживания', 'gp-resort'); ?></p>
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
				</div><!-- end single-room__info__price -->
		
				<div class="single-room__info__square">
				<?php 
					// площадь
					$square = get_post_meta($post->ID, 'square', true);  
					echo  __('Площадь номера', 'gp-resort') .': ' . $square . ' м²';
					?>
					<br />
					<?php 
					// количество и тип кровати
					$val =  get_post_meta( $post->ID, 'beds', true  );
					gp_beds( $val);
				?>
				</div><!-- end single-room__info__square -->
		
				<div class="single-room__description">
				<?php 
					// короткое описание номера
					$description = get_post_meta($post->ID, 'room_desc', true); 
					gp_rooms_short_desc( $description);
				?>
				</div><!-- end single-room__description -->	
		
				<?php if ($titan->getOption( 'single-room-popup-btn-loc' ) == '1') { ?>		
					<div class="single-room__info__btn">
					<button class="gp-button transparent-button open_modal" rel="<?php the_ID(); ?>"><?php _e('Хочу такой номер', 'gp-resort'); ?></button> 
					</div><!-- end single-room__info__btn -->
				<?php  } ?>
			
			</div><!-- end single-room__info -->
			
		</div><!-- end flex port -->
			

		<div class="block-wrapper">
			<div class="single-room__wrapper gp-clearfix">
				<?php
				// слайдер с фотографиями номера
				$id = get_the_ID();
				gp_rooms_slider($id);
				?>
			
				<div class="single-room__icons-block">  
				<?php 
				// оборудование номера, иконки и текст
				$items =  get_post_meta( $post->ID, 'elements', true  );
				gp_room_equipment_list($items);
				?>
				</div><!-- end single-room__icons-block -->  
			</div><!-- end single-room__wrapper -->
		
				<div class="post-content" itemprop="articleBody">			  
				<?php
					// контент 
					the_content();
					?>
				</div><!-- end post-content -->	 
					
				<?php
					//микроразметка
					get_template_part ('files/back/microdata');
			
					// поп-ап Забронировать номер
					get_template_part ('files/front/popup-rooms'); 
				?>	
					 
				 
			</div><!-- end block-wrapper -->
		</div><!-- end gp-container -->
	</article><!-- end article -->
	 
	<?php 
	endwhile;  
	endif; 
    ?>

	<?php 
		if ($titan->getOption( 'more-rooms-loc' ) == '1') {  
		// другие варианты размещения
		get_template_part ('files/front/more-rooms');
		}	
		
		// контактный блок
		if ($titan->getOption( 'single-room-contact-loc' ) == '1') {
		get_template_part ('files/front/rooms-contact'); 
		}
	?>

</main>

<?php get_footer(); ?>