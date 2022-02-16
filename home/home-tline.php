<?php
// Раздел для размещения модуля бронирования на главной
$titan = TitanFramework::getInstance( 'resort' );
?>
<div class="gp-container">
    <div class="block-wrapper tl-wrapper">
    <?php
        $tl_code = $titan->getOption( 'tl-code' ); 
        echo $tl_code; 
    ?>
    </div><!-- end tl-wrapper -->
</div><!-- end gp-container -->