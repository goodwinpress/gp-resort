<?php
/*
Template Name: Страница Контакты
*/
get_header(); 
$titan = TitanFramework::getInstance( 'resort' ); 

// получаем данные из консоли, для которых не требуется перевод
$profile_phone1 = $titan->getOption( 'profile-phone-1' ); 
$profile_phone2 = $titan->getOption( 'profile-phone-2' );
$profile_whatsapp = $titan->getOption( 'profile-whatsapp' );  
$profile_booking = $titan->getOption( 'profile-booking' ); 
$map_url = $titan->getOption( 'map-url' ); 

// проверем, подключен ли polylang
if (function_exists('pll_current_language')) {
// если да, получаем из него массив	языков
$lang = pll_languages_list();
  // перебираем языки, выделяем ключ и локаль
  foreach ($lang as $key => $slug) {
	// отдаем из консоли темы содержимое полей под данную локаль в зависимости от ключа
	if(pll_current_language() == $slug){
	  if ( $key == '0') {
	  $contact_page_title = $titan->getOption( 'contact-page-title-default' ); 
	  $profile_name = $titan->getOption( 'profile-name-default' ); 
	  $profile_city = $titan->getOption( 'profile-city-default' );
	  $profile_adress = $titan->getOption( 'profile-adress-default' );
	  }
	  if ( $key == '1') {
	  $contact_page_title = $titan->getOption( 'contact-page-title-lang-1' );
	  $profile_name = $titan->getOption( 'profile-name-lang-1' ); 
	   $profile_city = $titan->getOption( 'profile-city-lang-1' );
	   $profile_adress = $titan->getOption( 'profile-adress-lang-1' );
	  }
	  if ( $key == '2') {
	  $contact_page_title = $titan->getOption( 'contact-page-title-lang-2' );
	  $profile_name = $titan->getOption( 'profile-name-lang-2' ); 
	  $profile_city = $titan->getOption( 'profile-city-lang-2' );
	  $profile_adress = $titan->getOption( 'profile-adress-lang-2' );
	  }
	}
  }		
	// если не подключен, отдаем значения по умолчанию
	} else {	
	$contact_page_title = $titan->getOption( 'contact-page-title-default' ); 
	  $profile_name = $titan->getOption( 'profile-name-default' ); 
	  $profile_city = $titan->getOption( 'profile-city-default' );
	  $profile_adress = $titan->getOption( 'profile-adress-default' );
	}
  ?>

<div class="contact-page__header gp-clearfix">	
	
	<?php
	// изображение в шапке страницы
	$imageID = $titan->getOption( 'contact-page-img' );
	gp_contact_page_img($imageID);
	?>
	 
		<div class="contact-page__header-wrapper">	
			
			<section class="contact-page__header-caption"> 
			<?php
			// хлебные крошки
			if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
			?>
			<h1 class="contact-page__title" itemprop="headline"><?php echo $contact_page_title; ?></h1>
			</section> <!-- end contact-page__header-caption-->
			
		</div><!-- end contact-page__header-wrapper -->
		
</div><!-- end contact-page__header -->

<div class="gp-container">
 
	<div class="contact-page flex-port block-wrapper">
		
		<div class="contact-page__img">
			<div class="contact-page__img-wrapper">
				<div class="contact-page__img-caption">
					<span class="img-caption__title"><?php _e('Время', 'gp-resort' ); ?>:</span>
					<span class="img-caption__time checkin"><?php _e('Заезд', 'gp-resort' ); ?> - 14:00</span>
					<span class="img-caption__time checkin"><?php _e('Выезд', 'gp-resort' ); ?> - 12:00</span>
				</div><!-- end contact-page__img-caption -->
			</div><!-- end contact-page__img-wrapper -->
		</div><!-- end contact-page__img -->
	
		<div class="contact-page__items">
			<div class="contact-page__wrapper flex-port">
				
				<div class="contact-page__item contact-list__adress">
				<span class="contact-item__title"><?php echo $profile_name; ?></span>
				<span><?php echo $profile_city; ?>, <?php echo $profile_adress; ?> </span>
				<span class="do-action"><a href="<?php echo $map_url; ?>" rel="nofollow nooper" target="_blank"><?php _e('Показать на карте', 'gp-resort' ); ?></a></span>
				</div><!-- end contact-page__item -->
				
				<div class="contact-page__item contact-list__phone">
				<span class="contact-item__title"><?php _e('Телефоны', 'gp-resort' ); ?></span>
				<span><?php echo $profile_phone1; ?> <br /> <?php echo $profile_phone2; ?> </span>
				<span class="do-action">
				<?php
				$vars = array('(', ')', ' ','-');
				echo '<a href="tel:' . str_replace($vars, '', $profile_phone1) .'">' . __('Набрать номер', 'gp-resort') . '</a>';	
				?>
				</span>
				</div><!-- end contact-page__item -->
						
				<div class="contact-page__item contact-list__chat">
				<span class="contact-item__title"><?php _e('WhatsApp', 'gp-resort' ); ?></span>
				<span><?php _e('Мессенджер', 'gp-resort' ); ?> <br /> <?php echo $profile_whatsapp; ?> </span>
				<span class="do-action">
				<?php
				$vars = array('+', '(', ')', ' ','-');
				echo '<a href="https://wa.me/' . str_replace($vars, '', $profile_whatsapp) .'">' . __('Открыть чат', 'gp-resort') . '</a>';
				?>
				</span>
				</div><!-- end contact-page__item -->
						
				<div class="contact-page__item booking">
				<span class="contact-item__title"><?php _e('Booking.com', 'gp-resort' ); ?></span>
				<span><?php _e('Посетите наш раздел на Booking.com', 'gp-resort' ); ?> </span>
				<span class="do-action"><a href="<?php echo $profile_booking; ?>" rel="nofollow nooper" target="_blank"><?php _e('Перейти', 'gp-resort' ); ?></a> </span>
				</div><!-- end contact-page__item -->
				
			</div><!--	 contact-page__wrapper  -->
		</div><!-- end contact-page__items -->
			
	</div><!-- end flex port -->

	<div class="block-wrapper static-page-content-wrapper"> 
	<?php
		// контент страницы
		  the_content();
	 ?>
	</div><!-- end block-wrapper -->
	
</div><!-- end gp-container -->	
	
<?php
// контактный блок
if ($titan->getOption( 'contact-page-footer-loc' ) == '1') {
get_template_part ('home/home-gallery'); 
} else {
// или галерея, на выбор
get_template_part ('files/front/rooms-contact'); 
}
?>

<?php get_footer(); ?>