
var url      = window.location.href;
var domain = $('<a>').prop('href', url).prop('hostname');
var baseURL = 'http://'+domain+'/shop/public/';

(function($){

$.checkCart = function checkCart(){
	$.get( baseURL+"api/cart/getQty", function( data ) {
		if ( data > 0){
			$('#menu-cart a span').html(data);
		} else {
			$('#menu-cart').addClass('disabled');
			$('#menu-cart a span').html('');
		}
	});
}

$.checkCart();

$(".form-add-cart").submit( function(event) {
	event.preventDefault();
	var id = $(this).find('input[name="id"]').attr('value');
	var data = $( this ).serialize();
	var url = $( this ).attr('action');
	var jqxhr = $.post( url, data, function(product) {
		console.log(product);
					productAdded(product);
					$.checkCart();
					$('#menu-cart').removeClass('disabled');
				});
});

function productAdded(product){
	$.notify({
		title: "<strong>Produtto Aggiunto: </strong>",
		message: product
	},{
		type: 'success',
		newest_on_top: true,
		mouse_over: 'pause',
		allow_dismiss: true,
		animate: {
			enter: 'animated zoomInDown',
			exit: 'animated zoomOutUp'
		},
	});
}


$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
	event.preventDefault(); 
	event.stopPropagation(); 
	$(this).parent().siblings().removeClass('open');
	$(this).parent().toggleClass('open');
});





cleanPaginator();

function cleanPaginator(){
	var paginator = $('ul.pagination');
	if ( paginator.length > 0){
	    $("ul.pagination li").each(function(){
		    var href = $(this).find('a').attr('href');
		    if ( typeof href !== "undefined" ){
		    	var href = href.replace(" ", "+");
		    	$(this).find('a').attr('href', href);
		    }
	    });
	}
	
}


})(jQuery);