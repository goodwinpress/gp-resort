<?php

class Custom_Banner_Widget extends WP_Widget {

public function __construct() {
parent::__construct(
			'banner-widget',
			_x( 'GP Resort: баннер', 'widget title', 'banner-widget' ),
			array(
				'classname'   => 'banner-widget',
				'description' => _x( 'Виджет Баннер', 'widget description', 'banner-widget' )
			)
		);
add_action('admin_enqueue_scripts', array($this, 'scripts'));
}
	
public function scripts()
{
   wp_enqueue_script( 'media-upload' );
   wp_enqueue_media();
   wp_enqueue_script('our_admin', get_template_directory_uri() . '/files/back/js/upload.js', array('jquery'));
}
	 	
public function widget( $args, $instance ) {
extract( $args );
$image = ( ! empty( $instance['image'] ) ) ? $instance['image'] : '';
$banner_title = ( ! empty( $instance['banner_title'] ) ) ? $instance['banner_title'] : '';
$text = ( ! empty( $instance['text'] ) ) ? $instance['text'] : '';
$gp_url = ( ! empty( $instance['gp_url'] ) ) ? $instance['gp_url'] : '';
?>
		
<div id="gp-custom-banner-widget" class="widget gp-banner gp-clearfix">
<a href="<?php echo $gp_url; ?>"><img src="<?php echo esc_url($image); ?>" alt="<?php echo $banner_title; ?>"></a>
<span><a href="<?php echo $gp_url; ?>"><?php echo $banner_title; ?></a></span> 
<div class="gp-banner-inner">
 
<p><?php echo $text; ?></p>
<a class="gp-button transparent-button banner-widget-button" href="<?php echo $gp_url; ?>">Подробности</a> 
</div><!-- end // gp-banner-inner  -->
</div><!-- end // gp-banner -->

<?php
}

public function update( $new_instance, $old_instance ) {
	 $instance = $old_instance;
	 $instance['image'] = strip_tags( $new_instance['image']  );
     $instance[ 'banner_title' ]  = strip_tags( $new_instance['banner_title'] );
     $instance[ 'text' ] = strip_tags( $new_instance['text'] );
	 $instance[ 'gp_url' ] = strip_tags( $new_instance['gp_url'] );
return $instance;
	}

 public function form( $instance ) {
		$instance = wp_parse_args(
			$instance,
			array(
				'image' => '',
				'banner_title' => '',
				'text' => '',
				'gp_url' => ''
			)
		);

	$image = esc_attr( $instance[ 'image' ] );
	$banner_title = esc_attr( $instance[ 'banner_title' ] );
	$text = esc_attr( $instance[ 'text' ] );
    $gp_url = esc_attr( $instance[ 'gp_url' ] );
?>
		
<p>
Установите изображение, впишите текст, добавьте ссылку. Изменить фон виджета можно в настройках темы, страница  <a href="/wp-admin/admin.php?page=diy">Оформление</a>.
</p>
 	
<p>
<label for="<?php echo $this->get_field_id( 'image' ); ?>">Изображение:</label>
<input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
<button class="upload_gallery_button button button-primary">Загрузить картинку</button>
</p>

<p>
<label for="<?php echo $this->get_field_id( 'banner_title' ); ?>">Заголовок акции или события:</label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'banner_title' ); ?>" name="<?php echo $this->get_field_name( 'banner_title' ); ?>" type="text" value="<?php echo $banner_title; ?>">
</p>

<p>
<label for="<?php echo $this->get_field_id( 'text' ); ?>">Текст об акции или событии:</label><br>
<textarea class="widefat" rows="5" name="<?php echo $this->get_field_name('text') ?>"><?php echo $text; ?></textarea>
</p>

<p>
 <label for="<?php echo $this->get_field_id( 'gp_url' ); ?>">Ссылка на страницу с подробностями:</label> 
 <input class="widefat" id="<?php echo $this->get_field_id( 'gp_url' ); ?>" name="<?php echo $this->get_field_name( 'gp_url' ); ?>" type="text" value="<?php echo $gp_url; ?>">
</p>

<?php
	}
}

add_action( 'widgets_init', function() {
	register_widget( 'Custom_Banner_Widget' );
} );