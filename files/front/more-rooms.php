<?php
// другие варианты размещения, выводим другие номера в карточке просматриваемого номера
$titan = TitanFramework::getInstance( 'resort' );
?>

<div class="gp-container">
	  
		<div class="more-rooms__container flex-port block-wrapper gp-clearfix">
			
			<h2 class="more-rooms__title"><?php _e('Другие варианты размещения', 'gp-resort'); ?></h2>
			
			 <?php 
			 $currentID = get_the_ID();
			 $query = new WP_Query( array('post_type' => 'rooms',  'posts_per_page' => 3, 'orderby'=> 'rand',  'post__not_in' => array($currentID) ) );
			 while ( $query->have_posts() ) : $query->the_post(); 
			 ?>	
			 
			<div class="more-rooms__item">
			  <?php
			  // миниатюра
			   more_rooms_thumb(); 
			   ?>	
			   
				<div class="more-rooms-item__wrapper">
				  <a class="more-rooms-item__title" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
			 
				   <?php 
					// стоимость проживания
					$price = get_post_meta($post->ID, 'roomprice', true); 
					if( ! empty( $price) )  {
					echo '<span class="more-rooms-item__price">' . $price . ' <em>'; 
					}
					
					// валюта
					$currency = $titan->getOption( 'currency' );
					gp_currency($currency);
					echo '</em></span>';
				   ?>	
		
				</div><!-- end more-rooms-item__wrapper -->
			</div><!-- end more-rooms-item -->
		 
		  <?php 
		  endwhile;
		  wp_reset_postdata(); 
		  ?>
	</div><!-- end more-rooms__container -->
		
</div><!-- end gp-container -->