<?php
 // блок с 4 последними записями
 ?>
<div class="block-wrapper"> 
	<div class="thp-recent-posts flex-port">
		<?php 
			 $query = new WP_Query( array('posts_per_page' => 4) );
			 while ( $query->have_posts() ) : $query->the_post(); 
		?>
			<div class="thp-recent-post-item">
			<?php
			// изображение записи 
			blog_thumbnail();
			?>
			<span><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></span>
			</div><!-- end thp-recent-post item -->
		<?php 
		endwhile;
		wp_reset_postdata(); 
		?>
	</div><!-- end thp-recent-posts -->
</div><!-- end block-wrapper -->