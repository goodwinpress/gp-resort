<?php
// шаблон записи с анонсом и миниатюрой
$titan = TitanFramework::getInstance( 'resort' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('gp-entry gp-clearfix'); ?> itemscope itemtype="http://schema.org/Article">

<?php
    // изображение записи
    blog_thumbnail();
    
    echo '<span class="post-info">';
    // рубрики
    the_category(', ');  
   
   // дата публикации
   if ($titan->getOption( 'date-loc' ) == '1') {
   echo '&nbsp; &mdash; &nbsp;';
   echo get_the_time('d F Y'); 
   }
   echo '</span>';
?>
 
   <h2 class="post-title"><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
   <p class="post-content" itemprop="articleBody"><?php  truncate_post(320); ?></p> 
   <?php 
   	 //микроразметка
   	 get_template_part ('files/back/microdata');
    ?>
 </article><!-- end entry --> 