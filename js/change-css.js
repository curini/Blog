$("a.change-css").click(function() {
	$('link[href^="css/style"]').attr('href' , $(this).attr('rel'));
})
