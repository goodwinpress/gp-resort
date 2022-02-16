<?php
// раздел Услуги на главной странице
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
                $service_title = $titan->getOption( 'service-title-default' ); 
                $service1_desc = $titan->getOption( 'service1-desc-default' ); 
                $service2_desc = $titan->getOption( 'service2-desc-default' ); 
                $service3_desc = $titan->getOption( 'service3-desc-default' ); 
                $service4_desc = $titan->getOption( 'service4-desc-default' ); 
                $service5_desc = $titan->getOption( 'service5-desc-default' ); 
                $service6_desc = $titan->getOption( 'service6-desc-default' ); 
                $service7_desc = $titan->getOption( 'service7-desc-default' ); 
                $service8_desc = $titan->getOption( 'service8-desc-default' ); 
                $service9_desc = $titan->getOption( 'service9-desc-default' ); 
                $service10_desc = $titan->getOption( 'service10-desc-default' ); 
                $service11_desc = $titan->getOption( 'service11-desc-default' ); 
                $service12_desc = $titan->getOption( 'service12-desc-default' ); 
                $service13_desc = $titan->getOption( 'service13-desc-default' ); 
                $service14_desc = $titan->getOption( 'service14-desc-default' ); 
                $service15_desc = $titan->getOption( 'service15-desc-default' ); 
                $service16_desc = $titan->getOption( 'service16-desc-default' ); 
                $service17_desc = $titan->getOption( 'service17-desc-default' ); 
                $service18_desc = $titan->getOption( 'service18-desc-default' ); 
                $service19_desc = $titan->getOption( 'service19-desc-default' ); 
                $service20_desc = $titan->getOption( 'service20-desc-default' ); 
                $service21_desc = $titan->getOption( 'service21-desc-default' ); 
            }
            if ( $key == '1') {
                $service_title = $titan->getOption( 'service-title-lang-1' ); 
                $service1_desc = $titan->getOption( 'service1-desc-lang-1' ); 
                $service2_desc = $titan->getOption( 'service2-desc-lang-1' ); 
                $service3_desc = $titan->getOption( 'service3-desc-lang-1' ); 
                $service4_desc = $titan->getOption( 'service4-desc-lang-1' ); 
                $service5_desc = $titan->getOption( 'service5-desc-lang-1' ); 
                $service6_desc = $titan->getOption( 'service6-desc-lang-1' ); 
                $service7_desc = $titan->getOption( 'service7-desc-lang-1' ); 
                $service8_desc = $titan->getOption( 'service8-desc-lang-1' ); 
                $service9_desc = $titan->getOption( 'service9-desc-lang-1' ); 
                $service10_desc = $titan->getOption( 'service10-desc-lang-1' ); 
                $service11_desc = $titan->getOption( 'service11-desc-lang-1' ); 
                $service12_desc = $titan->getOption( 'service12-desc-lang-1' ); 
                $service13_desc = $titan->getOption( 'service13-desc-lang-1' ); 
                $service14_desc = $titan->getOption( 'service14-desc-lang-1' ); 
                $service15_desc = $titan->getOption( 'service15-desc-lang-1' ); 
                $service16_desc = $titan->getOption( 'service16-desc-lang-1' ); 
                $service17_desc = $titan->getOption( 'service17-desc-lang-1' ); 
                $service18_desc = $titan->getOption( 'service18-desc-lang-1' ); 
                $service19_desc = $titan->getOption( 'service19-desc-lang-1' ); 
                $service20_desc = $titan->getOption( 'service20-desc-lang-1' ); 
                $service21_desc = $titan->getOption( 'service21-desc-lang-1' ); 
            }
            if ( $key == '2') {
                $service_title = $titan->getOption( 'service-title-lang-2' ); 
                $service1_desc = $titan->getOption( 'service1-desc-lang-2' ); 
                $service2_desc = $titan->getOption( 'service2-desc-lang-2' ); 
                $service3_desc = $titan->getOption( 'service3-desc-lang-2' ); 
                $service4_desc = $titan->getOption( 'service4-desc-lang-2' ); 
                $service5_desc = $titan->getOption( 'service5-desc-lang-2' ); 
                $service6_desc = $titan->getOption( 'service6-desc-lang-2' ); 
                $service7_desc = $titan->getOption( 'service7-desc-lang-2' ); 
                $service8_desc = $titan->getOption( 'service8-desc-lang-2' ); 
                $service9_desc = $titan->getOption( 'service9-desc-lang-2' ); 
                $service10_desc = $titan->getOption( 'service10-desc-lang-2' ); 
                $service11_desc = $titan->getOption( 'service11-desc-lang-2' ); 
                $service12_desc = $titan->getOption( 'service12-desc-lang-2' ); 
                $service13_desc = $titan->getOption( 'service13-desc-lang-2' ); 
                $service14_desc = $titan->getOption( 'service14-desc-lang-2' ); 
                $service15_desc = $titan->getOption( 'service15-desc-lang-2' ); 
                $service16_desc = $titan->getOption( 'service16-desc-lang-2' ); 
                $service17_desc = $titan->getOption( 'service17-desc-lang-2' ); 
                $service18_desc = $titan->getOption( 'service18-desc-lang-2' ); 
                $service19_desc = $titan->getOption( 'service19-desc-lang-2' ); 
                $service20_desc = $titan->getOption( 'service20-desc-lang-2' ); 
                $service21_desc = $titan->getOption( 'service21-desc-lang-2' ); 
                }
        }
    }	
        // если не подключен, отдаем значения по умолчанию
        } else {	
                $service_title = $titan->getOption( 'service-title-default' ); 
                $service1_desc = $titan->getOption( 'service1-desc-default' ); 
                $service2_desc = $titan->getOption( 'service2-desc-default' ); 
                $service3_desc = $titan->getOption( 'service3-desc-default' ); 
                $service4_desc = $titan->getOption( 'service4-desc-default' ); 
                $service5_desc = $titan->getOption( 'service5-desc-default' ); 
                $service6_desc = $titan->getOption( 'service6-desc-default' ); 
                $service7_desc = $titan->getOption( 'service7-desc-default' ); 
                $service8_desc = $titan->getOption( 'service8-desc-default' ); 
                $service9_desc = $titan->getOption( 'service9-desc-default' ); 
                $service10_desc = $titan->getOption( 'service10-desc-default' ); 
                $service11_desc = $titan->getOption( 'service11-desc-default' ); 
                $service12_desc = $titan->getOption( 'service12-desc-default' ); 
                $service13_desc = $titan->getOption( 'service13-desc-default' ); 
                $service14_desc = $titan->getOption( 'service14-desc-default' ); 
                $service15_desc = $titan->getOption( 'service15-desc-default' ); 
                $service16_desc = $titan->getOption( 'service16-desc-default' ); 
                $service17_desc = $titan->getOption( 'service17-desc-default' ); 
                $service18_desc = $titan->getOption( 'service18-desc-default' ); 
                $service19_desc = $titan->getOption( 'service19-desc-default' ); 
                $service20_desc = $titan->getOption( 'service20-desc-default' ); 
                $service21_desc = $titan->getOption( 'service21-desc-default' ); 
        }
?>


<div class="gp-container">
    
	<div class="container-center-title">
		<h2 class="gp-container__title"><?php echo $service_title; ?></h2>
	</div><!-- end container-center-title -->
        

    <div class="flex-port block-wrapper hotel-service-list">		
    
        <?php 	
        if ($titan->getOption( 'service1' ) == '1') {  
        echo '<div class="service-item service-icon checkin">';
        echo '<span class="service-title">' . __('Раннее заселение', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        	if ($titan->getOption( 'service1-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
        	 } else {
        echo __('Бесплатно', 'gp-resort');
        	}
        echo '</span>';
        echo '<p>'. $service1_desc . '</p>';
        echo '</div><!-- end service-item 1 -->';
        }
        
        if ($titan->getOption( 'service2' ) == '1') {  		
        echo '<div class="service-item service-icon cafe">';
        echo '<span class="service-title">' . __('Ресторан', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service2-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service2_desc . '</p>';
        echo '</div><!-- end service-item 2 -->';
        }
        	
        	if ($titan->getOption( 'service3' ) == '1') {  	
        echo '<div class="service-item service-icon beauty">';
        echo '<span class="service-title">' . __('Салон красоты', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service3-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service3_desc . '</p>';
        echo '</div><!-- end service-item 3 -->';
        }
        	
        if ($titan->getOption( 'service4' ) == '1') {  
        echo '<div class="service-item service-icon transfer">';
        echo '<span class="service-title">' . __('Трансфер', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service4-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service4_desc . '</p>';
        echo '</div><!-- end service-item 4-->';
        }
        		
        if ($titan->getOption( 'service5' ) == '1') {  
        echo '<div class="service-item service-icon pet">';
        echo '<span class="service-title">' . __('Питомцы', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service5-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service5_desc . '</p>';
        echo '</div><!-- end service-item 5-->';
        }
        
        if ($titan->getOption( 'service6' ) == '1') {  
        echo '<div class="service-item service-icon parking">';
        echo '<span class="service-title">' . __('Парковка', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service6-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service6_desc . '</p>';
        echo '</div><!-- end service-item 6-->';
        }
        
        if ($titan->getOption( 'service7' ) == '1') {  
        echo '<div class="service-item service-icon reception">';
        echo '<span class="service-title">' . __('Ресепшн 24/7', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service7-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service7_desc . '</p>';
        echo '</div><!-- end service-item 7-->';
        }
        
        if ($titan->getOption( 'service8' ) == '1') {  
        echo '<div class="service-item service-icon storage">';
        echo '<span class="service-title">' . __('Камера хранения', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service8-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service8_desc . '</p>';
        echo '</div><!-- end service-item 8--> ';
        }
        
        if ($titan->getOption( 'service9' ) == '1') {  
        echo '<div class="service-item service-icon breakfast">';
        echo '<span class="service-title">' . __('Завтраки', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service9-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service9_desc . '</p>';
        echo '</div><!-- end service-item 9-->';
        }
        
        if ($titan->getOption( 'service10' ) == '1') {  
        echo '<div class="service-item service-icon room-service">';
        echo '<span class="service-title">' . __('Доставка в номер', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service10-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service10_desc . '</p>';
        echo '</div><!-- end service-item 10-->';
        }
        
        if ($titan->getOption( 'service11' ) == '1') {  
        echo '<div class="service-item service-icon excursions">';
        echo '<span class="service-title">' . __('Экскурсии', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service11-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service11_desc . '</p>';
        echo '</div><!-- end service-item 11-->'; 
        }
        
        if ($titan->getOption( 'service12' ) == '1') {  
        echo '<div class="service-item service-icon internet">';
        echo '<span class="service-title">' . __('Wi-Fi', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service12-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service12_desc . '</p>';
        echo '</div><!-- end service-item 12-->'; 
        }
        
        if ($titan->getOption( 'service13' ) == '1') {  
        echo '<div class="service-item service-icon conference">';
        echo '<span class="service-title">' . __('Конференц-зал', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service13-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service13_desc . '</p>';
        echo '</div><!-- end service-item 13-->';
        }
        
        if ($titan->getOption( 'service14' ) == '1') {  
        echo '<div class="service-item service-icon business">';
        echo '<span class="service-title">' . __('Бизнес-услуги', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service14-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service14_desc . '</p>';
        echo '</div><!-- end service-item 14-->';
        }
        
        if ($titan->getOption( 'service15' ) == '1') {  
        echo '<div class="service-item service-icon pool">';
        echo '<span class="service-title">' . __('Бассейн', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service15-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service15_desc . '</p>';
        echo '</div><!-- end service-item 15-->';
        }
        
        if ($titan->getOption( 'service16' ) == '1') {  
        echo '<div class="service-item service-icon gym">';
        echo '<span class="service-title">' . __('Спортзал', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service16-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service16_desc . '</p>';
        echo '</div><!-- end service-item 16-->';
        }
        
        if ($titan->getOption( 'service17' ) == '1') {  
        echo '<div class="service-item service-icon laundry">';
        echo '<span class="service-title">' . __('Прачечная', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service17-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service17_desc . '</p>';
        echo '</div><!-- end service-item 17-->';
        }
        
        if ($titan->getOption( 'service18' ) == '1') {  
        echo '<div class="service-item service-icon iron">';
        echo '<span class="service-title">' . __('Утюг', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service18-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service18_desc . '</p>';
        echo '</div><!-- end service-item 18-->';
        }
        
        if ($titan->getOption( 'service19' ) == '1') {  
        echo '<div class="service-item service-icon wakeup">';
        echo '<span class="service-title">' . __('Услуга Будильник', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service19-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service19_desc . '</p>';
        echo '</div><!-- end service-item 19-->';	
        }
        
        if ($titan->getOption( 'service20' ) == '1') {  
        echo '<div class="service-item service-icon visa">';
        echo '<span class="service-title">' . __('Визовая поддержка', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service20-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service20_desc . '</p>';
        echo '</div><!-- end service-item 20-->';	
        }
        
        if ($titan->getOption( 'service21' ) == '1') {  
        echo '<div class="service-item service-icon covid">';
        echo '<span class="service-title">' . __('Анти-ковид', 'gp-resort') . '</span>';
        echo '<span class="service-fee">';
        if ($titan->getOption( 'service21-fee' ) == '1') {  
        echo  __('Платно', 'gp-resort');
         } else {
        echo __('Бесплатно', 'gp-resort');
        }
        echo '</span>';
        echo '<p>'. $service21_desc . '</p>';
        echo '</div><!-- end service-item 21-->';	
        }
        ?>
        
        <div class="service-item flex-align-fix"></div>
    
    </div><!-- end flex-port -->
        
</div><!-- end gp-container -->	
