<?php
// шаблон страницы
$titan = TitanFramework::getInstance( 'resort' );

get_header(); ?>

<div class="gp-container single-page-wrapper">
  <div class="block-wrapper"> 
  
    <?php
     // основная колонка на всю ширину
    $sidebar_loc =  get_post_meta( $post->ID, 'gp_sidebar', true);
    gp_main_fullwidth( $sidebar_loc);
    ?>
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
      <article id="post-<?php the_ID(); ?>" <?php post_class('gp-single-post'); ?>  itemscope itemtype="http://schema.org/Article">
        <div class="post-header">
        <?php
        // хлебные крошки
        if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
        ?>
        <h1 class="post-title"  itemprop="headline"><?php the_title(); ?></h1>
        </div> <!-- end post header -->
        
        <div class="post-content" itemprop="articleBody">
        <?php
        the_content();
        ?>
        </div><!-- end post-content -->
      </article><!-- end article -->
  
  <?php 
  endwhile;
  endif;
  
  // комментарии
  if ($titan->getOption( 'com-page-loc' ) == '1') { 
      if ( comments_open() ) { 
        comments_template();
        echo '<div id="gp-comments"  class="toggle-comments">&nbsp;</div>';
      }
    }
  ?>
  
  </main>
  
  <?php
    // отключение сайдбара
    gp_sidebar_off( $sidebar_loc);
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