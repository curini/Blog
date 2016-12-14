$(document).ready(function() { 

        $('.shoutbox').load('php/load.php',function(){
          $(".shoutbox").find("p").each(function(){ 
          $('#'+this.id).html($.emoticons.replace($('#'+this.id).text()));
          });
        });



	setInterval(function(){
	$('.shoutbox').load('php/load.php',function(){
            $(".shoutbox").find("p").each(function(){ 
            $('#'+this.id).html($.emoticons.replace($('#'+this.id).text()));
            });
        });
	},5000); 

});
