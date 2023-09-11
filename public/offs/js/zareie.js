$(function(){
	// var arabicNumbers = ['۰', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
	// $('.numberFa').text(function(i, v) {
	// 	var chars = v.split('');
	// 	for (var i = 0; i < chars.length; i++) {
	// 		if (/\d/.test(chars[i])) {
	// 			chars[i] = arabicNumbers[chars[i]];
	// 		}
	// 	}
	// 	return chars.join('');
	// })
	comment();
	updateUser();
	// $('body').on('click','.card-item-change',function(){
	$('.card-item-change').click(function(){
		var id=$(this).data('id');
		var _token= $('meta[name="csrf-token"]').attr('content');
		var price_one=$('.price-one-'+id).text()*1;
		var count= $('#countcard-'+id).val()*1;
		$('.price-'+id).text(count*price_one);
		console.log(count*price_one);
		$.ajax({
		type: 'POST',
		url: 'updatecountcard',
		data: {'_token': _token,id_card:id,count:count},
		success: function(data){
			if(data!='error'){
				console.log(data);
				$(".price-final").text(data);
	            $.notify({
	                icon: 'fa fa-paw',
	                title: 'با موفقیت به سبد شما اضافه گردید.',
	                message: "هم اکنون میتوانید خرید خود را نهایی نمایید."
	            },{
	                type: "success",
	                delay: 500000
	            });				
			}else{
				$.notify({
	                icon: 'fa fa-paw',
	                title: 'دوباره امتحان نمایید.',
	                message: ""
	            },{
	                type: "danger",
	                delay: 500000
	            });	
			}
		}
	});
	});
});
function comment(){
	$("form#comment").submit(function(e) {
		e.preventDefault();
		var star=$(this).find("#star-rating").find('li.selected').length;
		// alert(star);
		$(this).find('[type=submit]').append(' <i class="fa fa-spinner fa-spin fa-product"></i>');
		var formData= new FormData(this);
		formData.append('star', star);
		$('.alert-product').hide();
		$.ajax({
		    url: "addcomment", 
		    type: "POST",             
		    data: formData,
		    contentType: false,
		    cache: false,
		    processData:false,
		    dataType: 'html',
		    success: function(data) {
		        console.log(data);
		        $('.fa-product').remove();
		        $(".alert-comment").show();
		        $("form#comment")[0].reset();
		        // $('form').find('input[type=text], textarea').val('');
		        $.notify({
	                icon: 'fa fa-paw',
	                title: 'نظر شما ثبت گردید.',
	                message: ""
	            },{
	                type: "success",
	                delay: 500000
	            });	
		    }
		});
		return false;

	});
}


function addCard(id){
 	var _token= $('meta[name="csrf-token"]').attr('content');
 	$.ajax({
		type: 'POST',
		url: 'addcard',
		data: {'_token': _token,id_product:id},
		success: function(data){
			if(data!='error'){
				console.log(data);
	            $.notify({
	                icon: 'fa fa-paw',
	                title: 'با موفقیت به سبد شما اضافه گردید.',
	                message: "هم اکنون میتوانید خرید خود را نهایی نمایید."
	            },{
	                type: "success",
	                delay: 500000
	            });				
			}else{
				$.notify({
	                icon: 'fa fa-paw',
	                title: 'دوباره امتحان نمایید.',
	                message: ""
	            },{
	                type: "danger",
	                delay: 500000
	            });	
			}
		}
	});
}

function deleteCard(id){
	var _token= $('meta[name="csrf-token"]').attr('content');
 	$.ajax({
		type: 'POST',
		url: 'deletecard',
		data: {'_token': _token,id_card:id},
		success: function(data){
			if(data!='error'){
				console.log(data);
				$('#card-removed-item-'+id).remove();
	            $.notify({
	                icon: 'fa fa-paw',
	                title: 'سبد خرید شما بروز شد.',
	                message: "هم اکنون میتوانید خرید خود را نهایی نمایید."
	            },{
	                type: "success",
	                delay: 500000
	            });				
			}else{
				$.notify({
	                icon: 'fa fa-paw',
	                title: 'دوباره امتحان نمایید.',
	                message: ""
	            },{
	                type: "danger",
	                delay: 500000
	            });	
			}
		}
	});
}

function updateUser(){
	$("form#formUpUser").submit(function(e) {
		e.preventDefault();
		$(this).find('[type=submit]').append(' <i class="fa fa-spinner fa-spin fa-product"></i>');
		var formData= new FormData(this);
		$.ajax({
		    url: "updateuser",
		    type: "POST",             
		    data: formData,
		    contentType: false,
		    cache: false,
		    processData:false,
		    dataType: 'html',
		    success: function(data) {
		        console.log(data);
		        $.notify({
	                icon: 'fa fa-paw',
	                title: 'اطلاعات با موفقیت ویرایش گردید.',
	                message: ""
	            },{
	                type: "success",
	                delay: 500000
	            });	
		    }
		});
		return false;

	});
}

function addWishlist(id_product,id_user,wish){
	var _token= $('meta[name="csrf-token"]').attr('content');
 	$.ajax({
		type: 'POST',
		url: 'addwishlist',
		data: {'_token': _token,id_product:id_product,id_user:id_user,wish:wish},
		success: function(data){
			console.log(data);
            $.notify({
                icon: 'fa fa-paw',
                title: 'علاقه مندی های شما بروز شد.',
                message: ""
            },{
                type: "success",
                delay: 5000
            });
			$('#div-wish-'+id_product+'-'+id_user).remove();
		}
	});
}