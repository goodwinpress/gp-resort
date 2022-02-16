<?php
// шаблон стандартной записи
$titan = TitanFramework::getInstance( 'resort' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('gp-entry gp-clearfix'); ?> itemscope itemtype="http://schema.org/Article">
 
<?php
    echo '<span class="post-info">';
    // рубрика
    the_category(', ');  
     
    // дата публикации
    if ($titan->getOption( 'date-loc' ) == '1') {
    echo '&nbsp; &mdash; &nbsp;';
    echo get_the_time('d F Y'); 
    }
    echo '</span>';
?>

    <h2 class="post-title"><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    <div class="post-content" itemprop="articleBody"><?php the_content(); ?></div> 
    <?php 
    //микроразметка
    get_template_part ('files/back/microdata');
    ?>
</article><!-- end entry --> 