<?php
// шаблон записи с анонсом и миниатюрой
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('gp-entry gp-clearfix'); ?> itemscope itemtype="http://schema.org/Article">
    <h2 class="post-title"><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    <p class="post-content"><?php  truncate_post(500); ?></p> 
</article><!-- end entry --> 