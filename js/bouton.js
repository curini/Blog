$(document).ready(function() { 

         $(".add").click(function(){
              var id = $(this).attr('id').replace('add', ''); 
              var vote = $('#vote'+id).text();
			  var message = $('#texte-box'+id).text();
              vote++;
              //$('.profil').html(vote); 
              $.get( "php/vote.php", { id: id , vote: vote, message:message } );
         });

         $(".min").click(function(){
              var id = $(this).attr('id').replace('min', ''); 
              var vote = $('#vote'+id).text();
			  var message = $('#texte-box'+id).text();
              vote--;
              //$('.profil').html(vote); 
              $.get( "php/vote.php", { id: id , vote: vote, message:message } );
         });

});