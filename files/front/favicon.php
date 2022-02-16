<?php 
// выводим фавикон, установленный в консоли темы
$titan = TitanFramework::getInstance( 'resort' );

$imageID = $titan->getOption( 'favicon' );
$imageSrc = $imageID;  
	if ( is_numeric( $imageID ) ) {
		$imageAttachment = wp_get_attachment_image_src( $imageID, $size = 'full', $icon = false );
		$imageSrc = $imageAttachment[0];
	}
echo '<link rel="icon" href="' .esc_url( $imageSrc ). '" sizes="192x192" type="image/png">';
echo '<link rel="apple-touch-icon" href="' .esc_url( $imageSrc ). '">';
?>