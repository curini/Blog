$(document).ready(function() { 

	setTimeout(location.reload, 60000);
	$('.h2-box').click(function(){
		if($('.content-box').css('display') == 'none'){
			$('.content-box').addClass( "show" );
			$('.window-box').addClass( "pop-up" );
		}
		else{
			$('.content-box').removeClass( "show" );
			$('.window-box').removeClass( "pop-up" );
		}
	});

	$('span').click(function(){
	      var blabla = $(this).text();
	      $('.textarea-box').val($('.textarea-box').val()+blabla+"");
	});
});
