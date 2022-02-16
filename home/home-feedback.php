<?php
// Раздел Отзывы на главной станице
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
				$feedback_title = $titan->getOption( 'feedback-title-default' ); 
				$feedback1_text = $titan->getOption( 'feedback1-text-default' );
				$feedback2_text = $titan->getOption( 'feedback2-text-default' ); 
				$feedback3_text = $titan->getOption( 'feedback3-text-default' ); 
				$feedback4_text = $titan->getOption( 'feedback4-text-default' ); 
				$feedback5_text = $titan->getOption( 'feedback5-text-default' ); 
				$feedback6_text = $titan->getOption( 'feedback6-text-default' ); 
				$feedback7_text = $titan->getOption( 'feedback7-text-default' );  
			}
			if ( $key == '1') {
				$feedback_title = $titan->getOption( 'feedback-title-lang-1' ); 
				$feedback1_text = $titan->getOption( 'feedback1-text-lang-1' );
				$feedback2_text = $titan->getOption( 'feedback2-text-lang-1' ); 
				$feedback3_text = $titan->getOption( 'feedback3-text-lang-1' ); 
				$feedback4_text = $titan->getOption( 'feedback4-text-lang-1' ); 
				$feedback5_text = $titan->getOption( 'feedback5-text-lang-1' ); 
				$feedback6_text = $titan->getOption( 'feedback6-text-lang-1' ); 
				$feedback7_text = $titan->getOption( 'feedback7-text-lang-1' ); 
			}
			if ( $key == '2') {
				$feedback_title = $titan->getOption( 'feedback-title-lang-2' ); 
				$feedback1_text = $titan->getOption( 'feedback1-text-lang-2' );
				$feedback2_text = $titan->getOption( 'feedback2-text-lang-2' ); 
				$feedback3_text = $titan->getOption( 'feedback3-text-lang-2' ); 
				$feedback4_text = $titan->getOption( 'feedback4-text-lang-2' ); 
				$feedback5_text = $titan->getOption( 'feedback5-text-lang-2' ); 
				$feedback6_text = $titan->getOption( 'feedback6-text-lang-2' ); 
				$feedback7_text = $titan->getOption( 'feedback7-text-lang-2' ); 
			}
		}
	}		
		// если не подключен, отдаем значения по умолчанию
		} else {	
		$feedback_title = $titan->getOption( 'feedback-title-default' ); 
		$feedback1_text = $titan->getOption( 'feedback1-text-default' );
		$feedback2_text = $titan->getOption( 'feedback2-text-default' ); 
		$feedback3_text = $titan->getOption( 'feedback3-text-default' ); 
		$feedback4_text = $titan->getOption( 'feedback4-text-default' ); 
		$feedback5_text = $titan->getOption( 'feedback5-text-default' ); 
		$feedback6_text = $titan->getOption( 'feedback6-text-default' ); 
		$feedback7_text = $titan->getOption( 'feedback7-text-default' );  
		}
	?>

<div class="gp-container feedback-container">
	<div class="block-wrapper feedback-wrapper">
			
		<div class="container-center-title">
		<h2 class="gp-container__title"><?php echo $feedback_title; ?></h2>
		</div><!-- end container-center-title -->	
			
			
		<div class="owl-carousel feedback-carousel">
		<div class="feedback-item">
		<?php
		// имя автора
		$author_name = $titan->getOption( 'feedback1-name' );
		// фото или аватар автора
		$imageID = $titan->getOption( 'feedback1-img' );
		gp_feedback_thumbnail($imageID);
		// текст отзыва
		echo '<p>' . $feedback1_text . '</p>';
		// имя автора
		echo '<span class="client-name">&#8212; '. $author_name .'</span>';
		// рейтинг
		$rating = $titan->getOption( 'feedback1-rating' );
		echo '<div class="client-rating">' . str_repeat("<span class='star'></span>", $rating) . '</div>';
		?>
		</div><!-- end feedback-item 1 -->
		
		<div class="feedback-item">
		<?php 
		// имя автора
		$author_name = $titan->getOption( 'feedback2-name' );
		// фото или аватар автора
		$imageID = $titan->getOption( 'feedback2-img' );
		gp_feedback_thumbnail($imageID);
		// текст отзыва
		echo '<p>' . $feedback2_text . '</p>';
		// имя автора
		echo '<span class="client-name">&#8212; '. $author_name .'</span>';
		// рейтинг
		$rating = $titan->getOption( 'feedback2-rating' );
		echo '<div class="client-rating">' . str_repeat("<span class='star'></span>", $rating) . '</div>';
		?>
		</div><!-- end feedback-item 2 -->	
		
		<?php  if ($titan->getOption( 'feedback3-loc' ) == '1') { ?>
		<div class="feedback-item">
		<?php 
		// имя автора
		$author_name = $titan->getOption( 'feedback3-name' );
		// фото или аватар автора
		$imageID = $titan->getOption( 'feedback3-img' );
		gp_feedback_thumbnail($imageID);
		// текст отзыва
		echo '<p>' . $feedback3_text . '</p>';
		echo '<span class="client-name">&#8212; '. $author_name .'</span>';
		// рейтинг
		$rating = $titan->getOption( 'feedback1-rating' );
		echo '<div class="client-rating">' . str_repeat("<span class='star'></span>", $rating) . '</div>';
		?>
		</div><!-- end feedback-item 3 -->		
		<?php } ?>
		
		
		<?php  if ($titan->getOption( 'feedback4-loc' ) == '1') { ?>
		<div class="feedback-item">
		<?php 
		// имя автора
		$author_name = $titan->getOption( 'feedback4-name' );
		// фото или аватар автора
		$imageID = $titan->getOption( 'feedback4-img' );
		gp_feedback_thumbnail($imageID);
		// текст отзыва
		echo '<p>' . $feedback4_text . '</p>';
		echo '<span class="client-name">&#8212; '. $author_name .'</span>';
		// рейтинг
		$rating = $titan->getOption( 'feedback4-rating' );
		echo '<div class="client-rating">' . str_repeat("<span class='star'></span>", $rating) . '</div>';
		?>
		</div><!-- end feedback-item 4 -->		
		<?php } ?>
		
		<?php  if ($titan->getOption( 'feedback5-loc' ) == '1') { ?>
		<div class="feedback-item">
		<?php 
		// имя автора
		$author_name = $titan->getOption( 'feedback5-name' );
		// фото или аватар автора
		$imageID = $titan->getOption( 'feedback5-img' );
		gp_feedback_thumbnail($imageID);
		// текст отзыва
		echo '<p>' . $feedback5_text . '</p>';
		echo '<span class="client-name">&#8212; '. $author_name .'</span>';
		// рейтинг
		$rating = $titan->getOption( 'feedback5-rating' );
		echo '<div class="client-rating">' . str_repeat("<span class='star'></span>", $rating) . '</div>';
		?>
		</div><!-- end feedback-item 5 -->		
		<?php } ?>
		
		<?php  if ($titan->getOption( 'feedback6-loc' ) == '1') { ?>
		<div class="feedback-item">
		<?php 
		// имя автора
		$author_name = $titan->getOption( 'feedback6-name' );
		// фото или аватар автора
		$imageID = $titan->getOption( 'feedback6-img' );
		gp_feedback_thumbnail($imageID);
		// текст отзыва
		echo '<p>' . $feedback6_text . '</p>';
		echo '<span class="client-name">&#8212; '. $author_name .'</span>';
		// рейтинг
		$rating = $titan->getOption( 'feedback6-rating' );
		echo '<div class="client-rating">' . str_repeat("<span class='star'></span>", $rating) . '</div>';
		?>
		</div><!-- end feedback-item 6 -->		
		<?php } ?>
		
		<?php  if ($titan->getOption( 'feedback7-loc' ) == '1') { ?>
		<div class="feedback-item">
		<?php 
		// имя автора
		$author_name = $titan->getOption( 'feedback7-name' );
		// фото или аватар автора
		$imageID = $titan->getOption( 'feedback7-img' );
		gp_feedback_thumbnail($imageID);
		// текст отзыва
		echo '<p>' . $feedback7_text . '</p>'; 
		echo '<span class="client-name">&#8212; '. $author_name .'</span>';
		// рейтинг
		$rating = $titan->getOption( 'feedback7-rating' );
		echo '<div class="client-rating">' . str_repeat("<span class='star'></span>", $rating) . '</div>';
		?>
		</div><!-- end feedback-item 7 -->		
		<?php } ?>
		
		</div><!-- end feedback-carousel -->
	</div><!-- end feedback-wrapper -->
</div><!-- end feedback-container -->