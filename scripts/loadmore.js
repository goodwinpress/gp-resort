 /*
 * Load More Posts with AJAX
 * автор: Misha Rudrastyh
*/

jQuery(function($){
	$('.loadmore-section').click(function(){
 
		var section = $(this),
		    data = {
			'action': 'loadmore',
			'query': loadmore_params.posts,  
			'page' : loadmore_params.current_page
		};
 
		$.ajax({
			url : loadmore_params.ajaxurl,  
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				section.text('Загрузка...');  
			},
			success : function( data ){
				if( data ) { 
					section.text( 'Показать еще' ).prev().before(data);  
        
					loadmore_params.current_page++;
 
					if ( loadmore_params.current_page == loadmore_params.max_page ) 
						section.remove();  
				} else {
					section.remove();  
				}
			}
		});
	});
});