<?php
// шаблон записи

$titan = TitanFramework::getInstance( 'resort' );

get_header(); ?>

<div class="gp-container single-page-wrapper">
  
  <div class="block-wrapper"> 
   
    <?php
    // основная колонка на всю ширину / main
    $sidebar_loc =  get_post_meta( $post->ID, 'gp_sidebar', true);
    gp_main_fullwidth( $sidebar_loc);
    ?>
    
    <?php
    // начало цикла
    if ( have_posts() ) : while ( have_posts() ) : the_post();  
    ?>
  
    <article id="post-<?php the_ID(); ?>" <?php post_class('gp-single-post'); ?> itemscope itemtype="http://schema.org/Article">
    
      <div class="post-header">
        
        <?php
        // хлебные крошки
        if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
        ?>
        <h1 class="post-title" itemprop="headline"><?php the_title(); ?></h1>
        
        <?php 
        // дата публикации
        if ($titan->getOption( 'date-loc' ) == '1') {  
        echo '<span class="post-header__items">' . get_the_time('d F Y') . '</span>';
        } ?>
      
      </div> <!-- end post header -->
    
      <div class="post-content" itemprop="articleBody">
        <?php
          // изображение записи
          if ($titan->getOption( 'featured-img-loc' ) == '1') {
          single_thumbnail();
        }
          // контент записи
          the_content();
          // панель навигации внутри записи
          wp_link_pages(array('before' => '<div class="post-nav"><p>' . __('Продолжение', 'gp-resort') . ':</p>', 'after' => '</div>', 'next_or_number' => 'number')); 
          //микроразметка
          get_template_part ('files/back/microdata');
        ?>
      </div><!-- end post-content -->
    
      <div class="post-footer">
        <?php
          // поделиться в соц. сетях
          if ($titan->getOption( 'single-social-loc' ) == '1') { 
          get_template_part ('files/front/share-btns');
          }
        ?>
      </div> <!-- end post-footer -->
      
     <?php
     //метки
       if ($titan->getOption( 'tags-loc' ) == '1') {  
         echo '<span class="gp-post-tags">';
           the_tags('');  
         echo '</span> <!-- end gp-post-tags-->';
        } 
      ?>
      
    </article><!-- end article -->
  
    <?php 
      endwhile;  
      endif; 
  
    // комментарии
    if ($titan->getOption( 'com-post-loc' ) == '1') { 
    if ( comments_open() ) { 
    comments_template();
  
    if ($titan->getOption( 'com-spoiler-loc' ) == '1') { 
          echo '<div id="gp-comments"  class="toggle-comments">&nbsp;</div>';
        }
      }
    }
  ?>
  <?php 
    // Внутренняя навигация 
   gp_single_post_navigation();
  ?>
    
  </main>

    <?php
    // отключение сайдбара
    gp_sidebar_off( $sidebar_loc);
    ?>
  
  </div><!-- end block-wrapper -->

</div><!-- end  gp-container   -->
   
 
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