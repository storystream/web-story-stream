$(document).ready(function () {
	if($('.lightbox').length) { $('.lightbox').lightBox(); }
	
	
	$('#inputName').focus(function() { if(this.value=='name'||this.value=='Imię'||this.value=='Name'||this.value=='Nazwa') { this.value=''; } });
	$('#inputEmail').focus(function() { if(this.value=='email'||this.value=='Email'||this.value=='Adres'||this.value=='Address') { this.value=''; } });
	$('#inputMessage').focus(function() { if(this.value=='message'||this.value=='Wiadomość'||this.value=='Description'||this.value=='Opis') { this.value=''; } });
	
	$('#inputLogin').focus(function() { if(this.value=='User') { this.value=''; } });
	$('#inputPassword').focus(function() { if(this.value=='Hasło'||this.value=='Password') { this.value=''; } });
	
	$('.faq .question').click(function(){
		if($(this)[0].parentNode.className=='') { $(this)[0].parentNode.className='show'; }
		else { $(this)[0].parentNode.className=''; }
	});
	
	$(".linkPoi").fancybox({
        'autoScale'     	: true,
        'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});
	
	$(".point2 a").fancybox({
		'titlePosition'		: 'inside',
		'transitionIn'		: 'none',
		'transitionOut'		: 'none'
	});

});