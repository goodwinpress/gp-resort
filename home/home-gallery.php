<?php
// раздел Карусель (фото) на главной странице
$titan = TitanFramework::getInstance( 'resort' );
?>

<div class="gp-container gallery-container">
	<div class="owl-carousel gallery-carousel">
		
	<?php
		$gallery = explode(",",  $titan->getOption( 'home-gallery' ));
		gp_homepage_gallery($gallery);
	?>
			 
	</div> <!--owl-carousel -->
</div><!-- end gp-container -->	