<?php
/*
шаблон ответа при ошибке 404
*/
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
        $text404 = $titan->getOption( 'text404-default' ); 
      }
      if ( $key == '1') {
      $text404 = $titan->getOption( 'text404-lang-1' ); 
      }
      if ( $key == '2') {
      $text404 = $titan->getOption( 'text404-lang-2' ); 
      }
    }
  }	
  
// если не подключен, отдаем значения по умолчанию
} else {	
  $text404 = $titan->getOption( 'text404-default' ); 
}

get_header(); 
?>

<div class="gp-container error404-wrapper">

  <div class="block-wrapper"> 
    
    <main> 
    
      <article <?php post_class('gp-single-post'); ?>  itemscope itemtype="http://schema.org/Article">
      
        <div class="post-header">
          <?php
            // хлебные крошки
            if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
          ?>
          
          <h1 class="post-title"  itemprop="headline">404</h1>
        </div> <!-- end post header -->
      
        <div class="post-content" itemprop="articleBody">
        <p><?php echo $text404; ?></p>
        </div><!-- end post-content -->
      
      </article><!-- end article -->
    
    </main>

  </div><!-- end block-wrapper -->

</div><!-- end gp container -->
  
  <?php
  // выводим список номеров
  get_template_part ('home/home-rooms');
?>

<?php get_footer(); ?>