$(document).ready(function(){
	$('#slideshow ul').cycle({
		fx:'curtainX,curtainY,turnUp,turnDown,turnRight,turnLeft,fade,scrollLeft,scrollRight,scrollUp,scrollDown',
		timeout:3000,
		pager:'#slideshow .pager_buttons',
		next:'#slideshow .next_button',
		prev:'#slideshow .prev_button',
		pause:1,
		easing:'easeInOut',
		random:1,
	});
	
	$('.p_rotator').jcarousel({ 
		scroll:1,
		auto:4,
		rtl:true,
		wrap:'circular',
		animation:'slow',
		buttonNextHTML:'<div class="button_right"></div>',
		buttonPrevHTML:'<div class="button_left"></div>'
	});
});

function updateCartCount()
{
	ajax_custom('cart/count',$('#cart_menu'),$('#cart_count'));
}

function select_row(obj)
{
	$('tr').removeClass('selected');
	$(obj).parent().parent().addClass('selected');
}

function offer_info(product_id)
{
	$('#offer_info').html('<img src="upload/product_thumb_'+product_id+'.jpg" width="123px" height="165px" />');
	$('.offers li a').css({backgroundColor : ''});
	$('#offer_'+product_id+' a').css({backgroundColor : '#D0D0D0'});
}