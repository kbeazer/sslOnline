$(document).ready(function(){

	$('.button').hover(function(){
		$(this).css('backgroundColor', '#9e918c');
	}, function(){
		$(this).css('backgroundColor', '#e86f41');
	})

	$('.quoteToggle').hover(function(){
		$(this).css('backgroundColor', '#9e918c');
	}, function(){
		$(this).css('backgroundColor', '#e86f41');
	})

	$('#signUp a').hover(function(){
		$(this).css('color', '#9e918c');
	}, function(){
		$(this).css('color', '#e86f41');
	})

	$('.passSet').hover(function(){
		$(this).css('color', '#ede8e4');
	}, function(){
		$(this).css('color', '#9e918c');
	})

	$('.favLogo').hover(function(){
		$(this).attr('src', '/images/favorites2.png');
	}, function(){
		$(this).attr('src', '/images/favorites.png');
	})

	$('.comFix').hover(function(){
		$(this).attr('src', '/images/comment2.png');
	}, function(){
		$(this).attr('src', '/images/comment.png');
	})
  
  	$('.regHeading a, .userUpdate a').hover(function(){
		$(this).css('backgroundColor', '#9e918c');
	}, function(){
		$(this).css('backgroundColor', '#e86f41');
	})

  	$('.logout').hover(function(){
		$(this).css('backgroundColor', '#9e918c');
	}, function(){
		$(this).css('backgroundColor', '#e86f41');
	})

	$( "#comToggle" ).click(function(e) {
		e.preventDefault();
  		$( ".comHide" ).slideToggle( "slow" );
	});

	$( ".quoteToggle" ).click(function(e) {
		e.preventDefault();
  		$( ".quoteHide" ).slideToggle( "slow" );
	});
})