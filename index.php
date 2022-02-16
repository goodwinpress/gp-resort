<?php
// шаблон блога
$titan = TitanFramework::getInstance( 'resort' );

get_header(); 

// проверем, подключен ли polylang
if (function_exists('pll_current_language')) {
// если да, получаем из него массив	языков
$lang = pll_languages_list();
  // перебираем языки, выделяем ключ и локаль
  foreach ($lang as $key => $slug) {
    // отдаем из консоли темы содержимое полей под данную локаль в зависимости от ключа
    if(pll_current_language() == $slug){
      if ( $key == '0') {
      $blog_title = $titan->getOption( 'blog-title-default' ); 
      }
      if ( $key == '1') {
      $blog_title = $titan->getOption( 'blog-title-lang-1' ); 
      }
      if ( $key == '2') {
      $blog_title = $titan->getOption( 'blog-title-lang-2' ); 
      }
    }
  }		
    // если не подключен, отдаем значения по умолчанию
    } else {	
    $blog_title = $titan->getOption( 'blog-title-default' ); 
    }
  ?>
 
  <div class="blog__header gp-clearfix">	
    <?php
      // изображение в шапке блога
      $imageID = $titan->getOption( 'blog-img' );
      gp_blog_img($imageID);
    ?>
   
    <div class="blog__header__wrapper">	
      <section> 
        <?php
        // хлебные крошки
        if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
        ?>
        <h1 class="blog__title" itemprop="headline"><?php echo $blog_title; ?></h1>
      </section> 
    </div><!-- end single-room__header__wrapper -->
      
  </div><!-- end single-room__header -->

 
<div class="gp-container">
 
  <div class="block-wrapper"> 
    
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
    <main class="main-single"> 
    <?php } else { ?>
    <main class="main"> 
    <?php } ?>
    
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post();  
      
        // выбираем тип записей
        if ($titan->getOption( 'blog-type' ) == '1') {
        get_template_part ('files/front/blog-anons'); 
        } else {
        get_template_part ('files/front/blog-regular'); 
      }
      
      endwhile; 
      else :  
      echo '<p>' . __( 'На сайте пока нет записей', 'gp-resort' ) . ' </p>';
      endif; 
      ?>
      
      <div class="gp-clearfix"></div>
       
      <?php  
      if (  $wp_query->max_num_pages > 1 ) {
      echo '<div class="loadmore-section">' . __( 'Показать больше записей', 'gp-resort' ) . '  </div>'; 
      }  
      ?>
    
    </main><!-- end main -->
  
  <?php 
   get_sidebar('blog');
  ?>
  
  </div><!-- end block-wrapper -->

</div><!-- end gp container -->

  <?php
    // контактный блок
    if ($titan->getOption( 'blog-footer-loc' ) == '1') {
    get_template_part ('home/home-gallery'); 
    } else {
    // или галерея, на выбор
    get_template_part ('files/front/rooms-contact'); 
  }
  ?>	
 
<?php get_footer(); ?>