<?php
// шаблон коммнтариев
$titan = TitanFramework::getInstance( 'resort' );  

// проверем, подключен ли polylang
if (function_exists('pll_current_language')) {
// если да, получаем из него массив	языков
$lang = pll_languages_list();
	// перебираем языки, выделяем ключ и локаль
	foreach ($lang as $key => $slug) {
		// отдаем из консоли темы содержимое полей под данную локаль в зависимости от ключа
		if(pll_current_language() == $slug){
			if ( $key == '0') {
			$policy_url = $titan->getOption( 'policy-url-default' ); 
			}
			if ( $key == '1') {
			$policy_url = $titan->getOption( 'policy-url-lang-1' ); 
			}
			if ( $key == '2') {
			$policy_url = $titan->getOption( 'policy-url-lang-2' ); 
			}
		}
	}	
	
	// если не подключен, отдаем значения по умолчанию
	} else {	
			$policy_url = $titan->getOption( 'policy-url-default' ); 
	}

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-box gp-clearfix"> 
	
	<?php if ( have_comments() ) : ?>
	<span class="comment-title"> <?php _e('Обсуждение:', 'gp-resort'); ?> <?php comments_number('' . __('пока нет комментариев', 'gp-resort') . '','' . __('1 комментарий', 'gp-resort') . '','' . __('% коммент.', 'gp-resort') . '' );?></span>
	
		<ol class="commentlist">
		<?php
		wp_list_comments( array(
			'style'       => 'ol',
			'short_ping'  => false,
			'avatar_size' =>  50,
			'callback' => 'comment_atts'
		) );
		?>
		</ol> 
	<?php endif; ?>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
		<div class="navigation gp-clearfix" role="navigation">
		<div class="nav-previous"><?php previous_comments_link( __( 'Предыдущие комментарии', 'gp-resort' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Новые комментарии', 'gp-resort' ) ); ?></div>
		</div><!-- end navigation -->
	<?php endif; ?>

	<?php
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<p><?php _e('Комментирование закрыто', 'gp-resort'); ?></p> 
	<?php endif; ?>

<div class="gp-comment-form gp-clearfix">
	
	<?php
	// подключаем согласие на сбор персональных данных
	if ($titan->getOption( 'agree-loc' ) == '1') { 
	
		$args = array( 
		'title_reply' => ''. __('Оставить комментарий', 'gp-resort') . '',
		'label_submit' => ''. __('Отправить', 'gp-resort') . '',
		'comment_notes_after' => '<p class="gp-notice"><input type="radio"   id="comments-checkbox" checked>' . __('Я даю согласие на сбор и обработку персональных данных.', 'gp-resort') . '  <a href="' . $policy_url . '">' . __('Политика конфиденциальности', 'gp-resort') . '</a>.</p> ',
		);
	
	} else {
	
		$args = array( 
		'title_reply' => ''. __('Оставить комментарий', 'gp-resort') . '',
		'label_submit' => ''. __('Отправить', 'gp-resort') . '',
		);
	}
	
		comment_form( $args );
	?>

</div><!-- end  gp-comment-form -->
</div> <!-- end comments-box -->