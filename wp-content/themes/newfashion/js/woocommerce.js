!function ($) {
	"use strict";
	$(document).ready(function() {
		// Ajax Swich Layout
		$('#wpo-filter .display a').click(function(){
            var query = $(this).data('query');
            var type = $(this).data('type');
            var $this = $(this);

            if(!$(this).hasClass('active')){
	            $.ajax({
	                url: ajaxurl,
	                data:{action:'wpo_display_layout',query:query,type:type},
	                type: 'POST',
	                beforeSend:function(){
	                	$this.addClass('waiting').append('<span class="loading" style="background:url('+woocommerce_params.ajax_loader_url+') no-repeat center center;display:block;background-size:16px 16px;width:100%;height:100%;position:absolute;top:0;left:0"></span>');
	                },
	                success: function(response){
	                	$this.removeClass('waiting');
	                    $('.products-layout').html(response);
	                    $('#wpo-filter .display a .loading').remove();
	                }
	            });
	        }
	        $('#wpo-filter .display a').removeClass('active');
            $(this).addClass('active');
            return false;
        });
		$(document).ready(function(){
        // Ajax QuickView
			$('a.quickview').click(function (e) {
				e.preventDefault();
			    var productslug = $(this).data('productslug');
			    var url = ajaxurl + '?action=wpo_quickview&productslug=' + productslug;
			     $.get(url,function(data,status){
			     		$('#wpo_modal_quickview .modal-body').html(data);
			     });
			    //$("#quickview-carousel").carousel();
			    //$('#wpo_modal_quickview .modal-body').html('<iframe src="'+url+'"></iframe>' + '</div>');
			});
		})

		$('#wpo_modal_quickview').on('hidden.bs.modal',function(){
			$(this).find('.modal-body').empty().append('<span class="spinner"></span>');
		});
		
		//Show popup add to cart
       var pbrproductcatid = null; 
	    var product = null;

	    jQuery('body').bind('adding_to_cart', function( button, data , data2 ){
	       pbrproductcatid =  data.data('product_id');
	       product = data;

	    });
	    jQuery('body').bind('added_to_cart', function( fragments, cart_hash ){
	        if( pbrproductcatid ){
	            var imgtodrag = $('[data-product-id="'+pbrproductcatid+'"] .image img').eq(0);
	            var cart =  $('#xcart');
	            if (imgtodrag) {
	                var imgclone = imgtodrag.clone()
	                    .offset({
	                    top: product.offset().top-imgtodrag.height(),
	                    left: product.offset().left
	                })
	                .css({
	                    'opacity': '0.7',
	                        'position': 'absolute',
	                        'height': '150px',
	                        'width': 'auto',
	                        'z-index': '100000'
	                })
	                    .appendTo($('body'))
	                    .animate({
	                    'top': cart.offset().top + 10,
	                        'left': cart.offset().left + 10,
	                        'width': 75,
	                        'height': 75
	                }, 1000);
	            
	              setTimeout(function () {
	                    cart.stop().animate({'margin-left':10},100).animate( {'margin-left':-10}, 200 ).animate( {'margin-left':0}, 100);
	                }, 1500);
	            
	                imgclone.animate({
	                    'width': 0,
	                    'height': 0
	                }, function () {
	                    $(this).detach()
	                });
	            }
	            $("html, body").stop().animate({ scrollTop:  cart.offset().top-50  }, "slow");
	        }
	    });
 
	});
}(jQuery);
