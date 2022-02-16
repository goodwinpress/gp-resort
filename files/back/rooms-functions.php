<?php
// здесь собираем все функции и метабоксы, относящиеся к номерам

// метабокс для добавления в популярные
add_action( 'add_meta_boxes', 'gp_room_popular_box' );
function gp_room_popular_box() {
add_meta_box('gp_room_popular', 'Добавить в популярные?', 'gp_room_box', 'rooms', 'normal');
}
function gp_room_box($post) {
wp_nonce_field( 'room_popular', 'room_popular_nonce' );
$saved = get_post_meta( $post->ID, 'room_popular', true);

if( !$saved )
$saved = 'default';
$fields = array(
'add_post'     => __('Поставьте галочку для вывода на Главной странице', 'gp-resort'),
);

	foreach($fields as $key => $label) {
		printf(
			'<input type="checkbox" name="room_popular" value="%1$s" id="room_popular[%1$s]" %3$s />'.
			'<label for="room_popular[%1$s]"> %2$s ' .
			'</label><br>',
			esc_attr($key),
			esc_html($label),
			checked($saved, $key, false)
		);
	}
}

add_action( 'save_post', 'room_popular_save_postdata' );
	function room_popular_save_postdata( $post_id ) {
	if ( ! isset( $_POST['room_popular_nonce'] ) ) {
	return;
	}

if ( ! wp_verify_nonce( $_POST['room_popular_nonce'], 'room_popular' ) ) {
return;
}

if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
return;
}

if ( isset($_POST['room_popular']) && $_POST['room_popular'] != "" ){
update_post_meta( $post_id, 'room_popular', $_POST['room_popular'] );
	} else {
	delete_post_meta($post_id, 'room_popular');
	} 
}


// стоимость проживания
add_action('add_meta_boxes', 'gp_room_price');
function gp_room_price(){
$screens = array( 'rooms' );
add_meta_box('r_price', 'Стоимость проживания', 'room_price', 'rooms', 'normal');
}
function room_price( $post, $meta ){
$screens = $meta['args'];
wp_nonce_field( plugin_basename(__FILE__), 'room_price_nonce' );
$value = get_post_meta( $post->ID, 'roomprice', 1 );
echo '<p><label for="room_price">Укажите стоимость проживания в номере за сутки</label> </p>';
echo '<input type="text" id="room_price" name="room_price" value="'. $value .'" size="25" />';
}
 
add_action( 'save_post', 'room_price_save_postdata' );
function room_price_save_postdata( $post_id ) {
if ( ! isset( $_POST['room_price'] ) )
return;
if ( ! wp_verify_nonce( $_POST['room_price_nonce'], plugin_basename(__FILE__) ) )
return;
if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
return;
if( ! current_user_can( 'edit_post', $post_id ) )
return;
$gp_data = sanitize_text_field( $_POST['room_price'] );
update_post_meta( $post_id, 'roomprice', $gp_data );
}

// площадь номера
add_action('add_meta_boxes', 'gp_room_square');
function gp_room_square(){
$screens = array( 'rooms' );
add_meta_box('r_square', 'Площадь номера', 'room_square', 'rooms', 'normal');
}
function room_square( $post, $meta ){
$screens = $meta['args'];
wp_nonce_field( plugin_basename(__FILE__), 'room_square_nonce' );
$value = get_post_meta( $post->ID, 'square', 1 );
echo '<p><label for="room_square">Укажите площадь номера</label> </p>';
echo '<input type="text" id="room_square" name="room_square" value="'. $value .'" size="25" />';
}
 
add_action( 'save_post', 'room_square_save_postdata' );
function room_square_save_postdata( $post_id ) {
if ( ! isset( $_POST['room_square'] ) )
return;
if ( ! wp_verify_nonce( $_POST['room_square_nonce'], plugin_basename(__FILE__) ) )
return;
if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
return;
if( ! current_user_can( 'edit_post', $post_id ) )
return;
$gp_data = sanitize_text_field( $_POST['room_square'] );
update_post_meta( $post_id, 'square', $gp_data );
}



// метабокс для определения типа кровати
add_action( 'add_meta_boxes', function() {
	add_meta_box( 'bed', 'Тип кровати', 'room_bed', 'rooms', 'normal' );
});

function room_bed( $post ) {
	wp_nonce_field( basename(__FILE__), 'bed_nonce' );

	// How to use 'get_post_meta()' for multiple checkboxes as array?
	$postmeta = maybe_unserialize( get_post_meta( $post->ID, 'beds', true ) );

	// Our associative array here. id = value
	$elements = array(
		'one'  => 'Одна односпальная кровать',
		'two' => 'Одна двуспальная кровать (King Size)',
		'three' => 'Две односпальные кровати'
	);

	// Loop through array and make a checkbox for each element
	foreach ( $elements as $id => $element) {

		// If the postmeta for checkboxes exist and 
		// this element is part of saved meta check it.
		if ( is_array( $postmeta ) && in_array( $id, $postmeta ) ) {
			$checked = 'checked="checked"';
		} else {
			$checked = null;
		}
		?>
		<p>
			<input  type="checkbox" name="bed[]" value="<?php echo $id;?>" <?php echo $checked; ?> />
			<?php echo $element;?>
		</p>
		<?php
	}
}

add_action( 'save_post', function( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'bed_nonce' ] ) && wp_verify_nonce( $_POST[ 'bed_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}

	// If the checkbox was not empty, save it as array in post meta
	if ( ! empty( $_POST['bed'] ) ) {
		update_post_meta( $post_id, 'beds', $_POST['bed'] );

	// Otherwise just delete it if its blank value.
	} else {
		delete_post_meta( $post_id, 'beds' );
	}
});

// короткое описание номера
add_action('add_meta_boxes', 'gp_room_desc');
function gp_room_desc(){
$screens = array( 'rooms' );
add_meta_box( 'gp_room_desc', 'Короткое описание номера', 'gp_room_desc_callback', $screens );
}
 
function gp_room_desc_callback( $post, $meta ){
$screens = $meta['args'];
wp_nonce_field( plugin_basename(__FILE__), 'room_desc_nonce' );
$value = get_post_meta( $post->ID, 'room_desc', 1 );
echo '<label for="gp_room_desc">' . __("Короткое описание используется в анонсе на странице номеров", 'gp-resort' ) . '</label> ';
echo '<textarea  rows="5" id="gp_room_desc" name="gp_room_desc" value="'. $value .'" />'. $value.'</textarea>';
}
 
add_action( 'save_post', 'gp_room_desc_save_postdata' );
function gp_room_desc_save_postdata( $post_id ) {
if ( ! isset( $_POST['gp_room_desc'] ) )
return;
if ( ! wp_verify_nonce( $_POST['room_desc_nonce'], plugin_basename(__FILE__) ) )
return;
if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
return;
if( ! current_user_can( 'edit_post', $post_id ) )
return;
$gp_data = sanitize_text_field( $_POST['gp_room_desc'] );
update_post_meta( $post_id, 'room_desc', $gp_data );
}



// метабокс для добавления параметров номера
add_action( 'add_meta_boxes', function() {
	add_meta_box( 'equipment', 'Профиль и оснащение номера', 'room_equipment', 'rooms', 'normal' );
});

function room_equipment( $post ) {
	wp_nonce_field( basename(__FILE__), 'equip_nonce' );

	$postmeta = maybe_unserialize( get_post_meta( $post->ID, 'elements', true ) );

	// Our associative array here. id = value
	$elements = array(
		'nosmoke'  => 'Для некурящих',
		'cond'  => 'Кондиционер',
		'tv' => 'ЖК телевизор',
		'safe' => 'Сейф',
		'wifi' => 'Wi Fi',
		'bath' => 'Ванна или душевая кабина',
		'robe' => 'Банные принадлежности',
		'dryer' => 'Фен',
		'fridge' => 'Холодильник',
	);

	foreach ( $elements as $id => $element) {
		if ( is_array( $postmeta ) && in_array( $id, $postmeta ) ) {
			$checked = 'checked="checked"';
		} else {
			$checked = null;
		}
	?>
		<p>
			<input  type="checkbox" name="equip[]" value="<?php echo $id;?>" <?php echo $checked; ?> />
			<label for="equip[<?php echo $id;?>]"><?php echo $element;?></label> 
		</p>
		<?php
	}
}

add_action( 'save_post', function( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'equip_nonce' ] ) && wp_verify_nonce( $_POST[ 'equip_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}

	// If the checkbox was not empty, save it as array in post meta
	if ( ! empty( $_POST['equip'] ) ) {
		update_post_meta( $post_id, 'elements', $_POST['equip'] );

	// Otherwise just delete it if its blank value.
	} else {
		delete_post_meta( $post_id, 'elements' );
	}
});


 // multimedia-uploader-metabox
 //https://gist.github.com/webbycrown/c9c78fb71d0cc8b6be5c1ed2346dbbac
 
 add_action( 'add_meta_boxes', 'multi_media_uploader_meta_box' );
 function multi_media_uploader_meta_box() {
 add_meta_box( 'my-post-box', 'Фотографии номера', 'multi_media_uploader_meta_box_func', 'rooms', 'normal' );
 }
 function multi_media_uploader_meta_box_func($post) {
 $banner_img = get_post_meta($post->ID,'room_slider_img',true);
 ?>
 <style type="text/css">
		 .multi-upload-medias ul li .delete-img { position: absolute; right: 3px; top: 2px; background: aliceblue; border-radius: 50%; cursor: pointer; font-size: 14px; line-height: 20px; color: red; }
		 .multi-upload-medias ul li { width: 120px; display: inline-block; vertical-align: middle; margin: 5px; position: relative; }
		 .multi-upload-medias ul li img { width: 100%; }
 </style>
 <p>Выберите изображения для размещения в слайдере.</p>
 <table cellspacing="10" cellpadding="10">
 <tr>
 <td>
 <?php echo multi_media_uploader_field( 'room_slider_img', $banner_img ); ?>
 </td>
 </tr>
 </table>
 <script type="text/javascript">
 jQuery(function($) {
 $('body').on('click', '.wc_multi_upload_image_button', function(e) {
 e.preventDefault();
 var button = $(this),
 custom_uploader = wp.media({
 title: 'Insert image',
 button: { text: 'Добавить фото' },
 multiple: true 
 }).on('select', function() {
 var attech_ids = '';
 attachments
 var attachments = custom_uploader.state().get('selection'),
 attachment_ids = new Array(),
 i = 0;
 attachments.each(function(attachment) {
 attachment_ids[i] = attachment['id'];
 attech_ids += ',' + attachment['id'];
 if (attachment.attributes.type == 'image') {
 $(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.url + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
 } else {
 $(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.icon + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
 }
 i++;
 });
 var ids = $(button).siblings('.attechments-ids').attr('value');
 if (ids) {
 var ids = ids + attech_ids;
 $(button).siblings('.attechments-ids').attr('value', ids);
 } else {
 $(button).siblings('.attechments-ids').attr('value', attachment_ids);
 }
 $(button).siblings('.wc_multi_remove_image_button').show();
 })
 .open();
 });
 $('body').on('click', '.wc_multi_remove_image_button', function() {
 $(this).hide().prev().val('').prev().addClass('button').html('Добавить фото');
 $(this).parent().find('ul').empty();
 return false;
 });
 });
 jQuery(document).ready(function() {
 jQuery(document).on('click', '.multi-upload-medias ul li i.delete-img', function() {
 var ids = [];
 var this_c = jQuery(this);
 jQuery(this).parent().remove();
 jQuery('.multi-upload-medias ul li').each(function() {
 ids.push(jQuery(this).attr('data-attechment-id'));
 });
 jQuery('.multi-upload-medias').find('input[type="hidden"]').attr('value', ids);
 });
 })
 </script>
 <?php
 }
 function multi_media_uploader_field($name, $value = '') {
 $image = '">Добавить фото';
 $image_str = '';
 $image_size = 'full';
 $display = 'none';
 $value = explode(',', $value);
 if (!empty($value)) {
 foreach ($value as $values) {
 if ($image_attributes = wp_get_attachment_image_src($values, $image_size)) {
 $image_str .= '<li data-attechment-id=' . $values . '><a href="' . $image_attributes[0] . '" target="_blank"><img src="' . $image_attributes[0] . '" /></a><i class="dashicons dashicons-no delete-img"></i></li>';
			 }
		 }
	 }
 if($image_str){
 $display = 'inline-block';
	 }
 return '<div class="multi-upload-medias"><ul>' . $image_str . '</ul><a href="#" class="wc_multi_upload_image_button button' . $image . '</a><input type="hidden" class="attechments-ids ' . $name . '" name="' . $name . '" id="' . $name . '" value="' . esc_attr(implode(',', $value)) . '" /><a href="#" class="wc_multi_remove_image_button button" style="display:inline-block;display:' . $display . '">Убрать все фото</a></div>';
 }
 // Save Meta Box values.
 add_action( 'save_post', 'wc_meta_box_save' );
 function wc_meta_box_save( $post_id ) {
 if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
 return;	
	 }
 if( isset( $_POST['room_slider_img'] ) ){
 update_post_meta( $post_id, 'room_slider_img', $_POST['room_slider_img'] );
	 }
 }

// изображение в списке номеров на главной
 add_action( 'gp_thumbs', 'home_rooms_thumb' );
 function home_rooms_thumb() {
 if(has_post_thumbnail()):
 echo '<figure class="room-thumbnail"><a href="' .get_permalink(). '">';
 $thumb = get_post_thumbnail_id();
 $img_url = wp_get_attachment_url( $thumb,'full' );  
 $image = aq_resize( $img_url, 420, 500, true, true, true );  
 echo '<img data-src="' .$image. '" alt="' .get_the_title(). '" width="420" height="500">';
 echo '</a></figure>';
 endif; 
}
 
// изображение на странице номера  
 add_action( 'gp_rooms', 'single_room_poster' );
 function single_room_poster() {
	 if(has_post_thumbnail()) {
		 $thumb = get_post_thumbnail_id();
		 $img_url = wp_get_attachment_url( $thumb,'full' );  
		 $image = aq_resize( $img_url, 1920, 550, true, true, true  );  
		 echo '<img class="inner-header-img" data-src="' .$image. '" alt="' .get_the_title(). '" width="1920" height="550">';
	 }
 }
 
// изображение в разделе Другие варианты размещения
add_action( 'gp_rooms', 'more_rooms_thumb' );
function more_rooms_thumb() {
if(has_post_thumbnail()):
echo '<figure class="more-room-thumbnail"><a href="' .get_permalink(). '">';
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' );  
$image = aq_resize( $img_url, 360, 260, true, true, true );  
echo '<img data-src="' .$image. '" alt="' .get_the_title(). '" width="420" height="500">';
echo '</a></figure>';
endif; 
}

// слайдеры в карточках на странице Номерой фонд
add_action('gp_thumbs', 'gp_rooms_archive_slider');
function gp_rooms_archive_slider($id) { 
$banner_img = get_post_meta($id, 'room_slider_img', true);	
$banner_img = explode(',', $banner_img);
$banner_caption =  wp_get_attachment_caption( $banner_img );
if( ! empty($banner_img)) {
?>
<div class="owl-carousel rooms-archive-item__carousel">
<?php  foreach ($banner_img as $attachment_id) { ?>
<div class="room-gallery-item">
<a href="<?php echo get_permalink(); ?>"><img class="owl-lazy" data-src="<?php echo wp_get_attachment_url( $attachment_id );?>" alt="<?php echo $banner_caption; ?>"></a>
</div>
 <?php } ?>
</div> <!--owl-carousel -->
<?php
 }
 }
 

// валюта
add_action('gp_rooms', 'gp_currency');
function gp_currency( $currency) { 
if ($currency == 'RUB') {
  echo ' руб';
    } else if ($currency == 'UAH') {
    echo ' грн ';
    } else if ($currency == 'KZT') {
    echo ' тнг ';
    } else if ($currency == 'USD') {
    echo ' $ ';
    } else if  ($currency == 'EUR') {
    echo ' &#8364; ';
    }	 
   // echo ' / ' . __('сутки', 'gp-resort');
} 

// тип и количество кроватей в карточках в Номерном фонде
add_action('gp_rooms', 'gp_beds');
function gp_beds( $val) { 
  if (! empty( $val ) ) {
    foreach ($val as $key ) {
      if ( $key == 'one') {
      echo ' <p class="rooms-archive-item__text">&#8212; ' . __('Одна односпальная кровать', 'gp-resort') . '</p>';
      }
      if ( $key == 'two') {
      echo ' <p class="rooms-archive-item__text">&#8212; ' . __('Одна двуспальная кровать', 'gp-resort') . '</p>';
      }
      if ( $key == 'three') {
      echo ' <p class="rooms-archive-item__text">&#8212; ' . __('Две односпальных кровати', 'gp-resort') . '</p>';
      }
    } 
  }
}

// тип и количество кроватей в карточках на Главной
add_action('gp_rooms', 'gp_home_beds');
function gp_home_beds( $val) { 
  if (! empty( $val ) ) {
    foreach ($val as $key ) {
      if ( $key == 'one') {
      echo '<span class="room-icons single-bed" title="' . __('Одна односпальная кровать', 'gp-resort') . '"></span>';
      }
      if ( $key == 'two') {
      echo '<span class="room-icons kingsize-bed" title="' . __('Одна двуспальная кровать', 'gp-resort') . '"></span>';
      }
      if ( $key == 'three') {
      echo '<span class="room-icons single-bed" title="' . __('Две односпальных кровати', 'gp-resort') . '"></span>';
      echo '<span class="room-icons single-bed" title="' . __('Две односпальных кровати', 'gp-resort') . '"></span>';
      }
    } 
  }
}  

// короткое описание номера
add_action('gp_rooms', 'gp_rooms_short_desc');
function gp_rooms_short_desc( $description) { 
  if( ! empty( $description) )  {
  echo  '<p class="rooms-archive-item__text">' . $description . '</p>';
  }
}

// одно статичное Изображение номера вместо слайдера, на выбор
add_action( 'gp_rooms', 'gp_rooms_item_img' );
function gp_rooms_item_img() {
if(has_post_thumbnail()):
echo '<a href="' .get_permalink(). '">';
$thumb = get_post_thumbnail_id();
$img_url = wp_get_attachment_url( $thumb,'full' );  
$image = aq_resize( $img_url, 670, 450, true  );  
echo '<img data-src="' .$image. '" alt="' .get_the_title(). '" width="670" height="450">';
echo '</a>';
endif; 
}

// слайдер внутри карточки номера
add_action('gp_thumbs', 'gp_rooms_slider');
function gp_rooms_slider($id) { 
$banner_img = get_post_meta($id, 'room_slider_img', true);	
$banner_img = explode(',', $banner_img);
$banner_caption =  wp_get_attachment_caption( $banner_img );
if( ! empty($banner_img)) {
?>
<div class="owl-carousel single-room-carousel">
<?php  foreach ($banner_img as $attachment_id) { ?>
<div class="room-gallery-item">
<a rel="lightbox" href="<?php echo wp_get_attachment_url( $attachment_id );?>"><img class="owl-lazy" data-src="<?php echo wp_get_attachment_url( $attachment_id );?>" alt="<?php echo $banner_caption; ?>"></a>
</div>
<?php } ?>
</div> <!--owl-carousel -->
<?php
}
}

// оборудование номера - на Главной странице
add_action('gp_rooms', 'gp_room_equipment');
function gp_room_equipment($items) { 
  if (! empty( $items ) ) {
     foreach ($items as $key ) {
       if (  $key == 'nosmoke') {
         echo '<span class="room-icons no-smoke" title="' . __('Для некурящих', 'gp-resort') . '"></span>';
       }
       if (  $key == 'cond') {
         echo '<span class="room-icons cond-icon" title="' . __('Кондиционер', 'gp-resort') . '"></span>';
       }
       if (  $key == 'bath') {
         echo '<span class="room-icons bath-icon" title="' . __('Ванна или душевая кабина', 'gp-resort') . '"></span>';
       }
       if (  $key == 'tv') {
         echo '<span class="room-icons tv-icon" title="' . __('ЖК-телевизор', 'gp-resort') . '"></span>';
       }
       if (  $key == 'safe') {
         echo '<span class="room-icons safe-icon" title="' . __('Сейф', 'gp-resort') . '"></span>';
       }
       if (  $key == 'wifi') {
         echo '<span class="room-icons wifi-icon" title="' . __('Бесплатный Wi-Fi', 'gp-resort') . '"></span>';
       }
       if (  $key == 'robe') {
         echo '<span class="room-icons robe-icon" title="' . __('Банные принадлежности', 'gp-resort') . '"></span>';
       }
       if (  $key == 'dryer') {
         echo '<span class="room-icons fen-icon" title="' . __('Фен', 'gp-resort') . '"></span>';
       }
       if (  $key == 'fridge') {
         echo '<span class="room-icons fridge-icon" title="' . __('Холодильник', 'gp-resort') . '"></span>';
       }
     } 
  }
}

// оборудование номера - внутри карточки номера
add_action('gp_rooms', 'gp_room_equipment_list');
function gp_room_equipment_list($items) { 
  if (! empty( $items ) ) {
  echo '<ul>';
    foreach ($items as $key ) {
      if (  $key == 'nosmoke') {
        echo '<li><span class="room-icons no-smoke"></span> ' . __('Для некурящих', 'gp-resort') . '</li>';
      }
      if (  $key == 'cond') {
        echo '<li><span class="room-icons cond-icon"></span> ' . __('Кондиционер', 'gp-resort') . '</li>';
      }
      if (  $key == 'bath') {
        echo '<li><span class="room-icons bath-icon"></span> ' . __('Ванна или душевая кабина', 'gp-resort') . '</li>';
      }
      if (  $key == 'tv') {
        echo '<li><span class="room-icons tv-icon"></span> ' . __('ЖК-телевизор', 'gp-resort') . '</li>';
      }
      if (  $key == 'safe') {
        echo '<li><span class="room-icons safe-icon"></span> ' . __('Сейф', 'gp-resort') . '</li>';
      }
      if (  $key == 'wifi') {
        echo '<li><span class="room-icons wifi-icon"></span> ' . __('Бесплатный Wi-Fi', 'gp-resort') . '</li>';
      }
      if (  $key == 'robe') {
        echo '<li><span class="room-icons robe-icon"></span> ' . __('Банные принадлежности', 'gp-resort') . '</li>';
      }
      if (  $key == 'dryer') {
        echo '<li><span class="room-icons fen-icon"></span> ' . __('Фен', 'gp-resort') . '</li>';
      }
      if (  $key == 'fridge') {
        echo '<li><span class="room-icons fridge-icon"></span> ' . __('Холодильник', 'gp-resort') . '</li>';
      }
    } 
  echo '</ul>';
  }
}

 // установим количество карточек в Номерном фонде
 add_filter('pre_get_posts', 'products_per_page');
 function products_per_page( $query ) {
     if( is_archive('rooms') ) {
         $query->set('posts_per_page',99);  
     }
     return $query;
 }