<?php
// шаблон архивов

$titan = TitanFramework::getInstance( 'resort' );

get_header(); ?>

<div class="gp-container archive-page-wrapper">
 
  <div class="block-wrapper"> 
  
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
     <main class="main-single"> 
       <?php } else { ?>
      <main class="main"> 
      <?php } ?>
    
      <div class="arch-header">
      	<?php
      	// хлебные крошки
      	if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
      	
      	// заголовок
      	the_archive_title( '<h1 class="post-title">', '</h1>' );
      	
      	// описание архива
      	if ($paged < 2) {  
      	cat_description();	 
       }
      	?>
      </div> <!-- end arch-header -->
    
     
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
    get_template_part ('files/front/rooms-contact'); 
    }
  ?>

<?php get_footer(); ?>