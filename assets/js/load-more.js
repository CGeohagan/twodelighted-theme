//JQuery Code for Infinite Scroll via http://www.billerickson.net/infinite-scroll-in-wordpress/


jQuery(function($){

	$('.col').append( '<span class="load-more">Load More</span>' );
	$('#main-nav-below').hide();
	var button = $('.col .load-more');
	var page = 2;
	var loading = false;
	var scrollHandling = {
	    allow: true,
	    reallow: function() {
	        scrollHandling.allow = true;
	    },
	    delay: 400 //(milliseconds) adjust to the highest acceptable value
	};

	$('body').on('click', '.load-more', function(){
		if( ! loading ) {
				loading = true;
				$(button).html('Loading...');
				var data = {
					action: 'be_ajax_load_more',
					nonce: beloadmore.nonce,
					page: page,
					query: beloadmore.query,
				};
				$.post(beloadmore.url, data, function(res) {
					if( res.success) {
						$(res.data).hide().appendTo('.col').fadeIn(1000);
						//if( page >= maxpage ) {
						//	$(button).remove();
						//} else {
							$(button).html('Load More');
							$('.col').append( button );
						//}
						page = page + 1;
						loading = false;
					} else {
						// console.log(res);
					}
				}).fail(function(xhr, textStatus, e) {
					// console.log(xhr.responseText);
				});

		}
	});
});
