<?php
// шаблон страницы поиска
$titan = TitanFramework::getInstance( 'resort' );

get_header(); ?>

<div class="gp-container search-page-wrapper">
	
	<div class="block-wrapper"> 
	
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
		<main class="main-single"> 
		   <?php } else { ?>
		<main class="main"> 
		<?php } ?>
		
			<div class="search-header">
			
				<?php
				// хлебные крошки
				if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); 
				?>
		 
				<h1 class="post-title"><?php _e('Вы искали', 'gp-resort'); ?>: <?php the_search_query(); ?></h1>
				<span class="search-desc"><?php _e( 'Найдено публикаций', 'gp-resort' ); ?>: &nbsp;<?php echo $wp_query->found_posts; ?></span>
			 
		 	</div><!-- end search-header -->
 
			<?php 
			if ( have_posts() ) : while ( have_posts() ) : the_post();  
			
			get_template_part ('files/front/search-anons'); 
			
			 endwhile; 
			 endif; 
			 
			 gp_search_pagination();
			 ?>
			 
		</main>
		
		<?php
		 get_sidebar('blog');
		 ?>

	</div><!-- end block-wrapper -->

</div><!-- end gp container -->
	
<?php get_footer(); ?>