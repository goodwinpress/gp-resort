<?php

// шаблон подвала

$titan = TitanFramework::getInstance( 'resort' ); 

//получаем данные из консоли, не требующие перевода
$profile_phone1 = $titan->getOption( 'profile-phone-1' ); 
$profile_whatsapp = $titan->getOption( 'profile-whatsapp' ); 
$profile_email = $titan->getOption( 'profile-email' ); 

// проверем, подключен ли polylang
if (function_exists('pll_current_language')) {
// если да, получаем из него массив	языков
$lang = pll_languages_list();
  // перебираем языки, выделяем ключ и локаль
  foreach ($lang as $key => $slug) {
    // отдаем из консоли темы содержимое полей под данную локаль в зависимости от ключа
    if(pll_current_language() == $slug){
      if ( $key == '0') {
          $profile_name = $titan->getOption( 'profile-name-default' ); 
          $profile_city = $titan->getOption( 'profile-city-default' );
          $profile_adress = $titan->getOption( 'profile-adress-default' );
          $thankyou_url = $titan->getOption( 'thankyou-url-default' );
      }
      if ( $key == '1') {
          $profile_name = $titan->getOption( 'profile-name-lang-1' ); 
          $profile_city = $titan->getOption( 'profile-city-lang-1' );
          $profile_adress = $titan->getOption( 'profile-adress-lang-1' );
          $thankyou_url = $titan->getOption( 'thankyou-url-lang-1' );
      }
      if ( $key == '2') {
          $profile_name = $titan->getOption( 'profile-name-lang-2' ); 
          $profile_city = $titan->getOption( 'profile-city-lang-2' );
          $profile_adress = $titan->getOption( 'profile-adress-lang-2' );
          $thankyou_url = $titan->getOption( 'thankyou-url-lang-2' );
      }
    }
  }		
  // если не подключен, отдаем значения по умолчанию
  } else {	
    $profile_name = $titan->getOption( 'profile-name-default' );
    $profile_city = $titan->getOption( 'profile-city-default' );
    $profile_adress = $titan->getOption( 'profile-adress-default' );
    $thankyou_url = $titan->getOption( 'thankyou-url-default' );
  }
?>

<footer class="gp-clearfix" itemscope itemtype="http://schema.org/WPFooter">

  <div class="gp-container">
    <div class="flex-port block-wrapper">
    
      <div class="footer-col footer-col-left">
      <span class="footer-col__title"><?php echo $profile_name; ?></span>
      <p><?php echo $profile_city; ?>, <?php echo $profile_adress; ?></p>
      
      <?php
      // кнопки социальных сетей
      get_template_part ('files/front/social-btns'); 
      ?>
      
      </div><!-- end footer col  -->
      
      <div class="footer-col footer-col-center">
      <span class="footer-col__title"><?php _e('Справки и бронирование', 'gp-resort'); ?></span>
      <ul class="footer__contact-list">
        <li class="contact-list__phone"><?php echo $profile_phone1; ?></li>
        <li class="contact-list__chat"><?php echo $profile_whatsapp; ?></li>
        <li class="contact-list__mail"><?php echo $profile_email; ?></li>
      </ul>
      </div><!-- end footercol   -->
    
      <div class="footer-col footer-col-right">
      <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
      <?php dynamic_sidebar( 'sidebar-3' ); ?>
      <?php endif; ?>
      </div><!-- end footercol   -->
    
     
      <div class="credits">
      &copy; <span itemprop="copyrightYear"><?php echo date('Y'); ?></span>
      <span itemprop="name"><?php bloginfo('name'); ?></span>&nbsp; &middot;  &nbsp;   <span itemprop="description"><?php bloginfo('description'); ?></span>  
      
      <?php if ($titan->getOption( 'gpr-loc' ) == '1') { 
        echo '&nbsp; &middot; &nbsp;  <span><a class="gpress" href="https://goodwinpress.ru" target="_blank">' . __('Тема от GoodwinPress', 'gp-resort') . '</a></span>';
      }
      ?>
      
      <div class="anycode">
      <span>
      <?php 
      // любая статистика с кнопкой
      echo $titan->getOption( 'anycode' ); 
      ?></span>
      </div><!-- end anycode -->
      
      </div><!-- end credits -->
    
    </div><!-- end flex-port -->
   
  </div><!-- end gp-container -->	

</footer><!-- end footer -->

<button class="backtop"></button>

<?php
  // выплывающий блок
  if ($titan->getOption( 'float-block-loc' ) == '1') { 
  get_template_part ('files/front/slide-block'); 
  }
  
  // мобильное меню
  gp_mobile_nav($profile_phone1, $profile_whatsapp);
  
  // заказ звонка + чат
  get_template_part ('files/front/popup-contact'); 
?>

<div class="overlay"></div>
<div class="overlay_popup"></div>

</div><!-- end wrap-->

<?php wp_footer();  ?> 

<?php if ($titan->getOption( 'com-spoiler-loc' ) == '1') { 
// тоггл комментариев в записях и страницах
if (is_single() || is_page() ) { ?> 
  <script>
  /* <![CDATA[ */
    jQuery(document).ready(function($) {
    $('.toggle-comments').click(function(){ 
    $('.comments-box').toggleClass('open'); 
    $(this).toggleClass('opened'); 
    	return false; 
    	}); 
    }); 
  /* ]]> */
  </script>
  <?php 
  } 
} 
?>

<script>
  /* <![CDATA[ */
  document.addEventListener( 'wpcf7mailsent', function( event ) {
  location = '<?php echo $thankyou_url; ?>';
  }, false );
  /* ]]> */
</script>

 
</body>
</html>