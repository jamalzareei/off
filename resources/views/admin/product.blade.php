@extends('admin.master')

<!-- title -->
@section('title')
title
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('keywords')
keywords
@endsection
@section('description')
description
@endsection

<!-- cascle style sheet -->
@section('css')
@endsection

<!-- content -->
@section('content')



<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				لیست تخفیفات

			</header>
			<table class="table table-striped table-advance table-hover text-center">
				<thead>
					<tr>
						<th class="text-center"><i class="icon-bullhorn"></i> شرکت</th>
						<th class="text-center"><i class="icon-question-sign"></i> عنوان</th>
						<th class="text-center"><i class="icon-bookmark"></i> قیمت</th>
						<th class="text-center"><i class=" icon-"></i> تاریخ اتمام</th>
						<th class="text-center"><i class=" icon-edit"></i> وضعیت</th>
						<th class="text-center"><i class=" icon-edit"></i> #</th>
						<th class="text-center">ویژه</th>
					</tr>
				</thead>
				<tbody>
				@if($list->count()!=0)
				@foreach($list as $key)
					<tr>
						<td>@if($key->seller) {{$key->seller->name_seller}} @endif</td>
						<td class="hidden-phone"><a href="product/{{$key->id_product}}/{{str_replace(' ','-',$key->name_product)}}" target="_blank">{{$key->name_product}}</a></td>
						<td>@if($key->price) {{$key->price->discount_price}} {{$key->price->t_r_value}} @endif </td>
						<td class="text-center"><span class="text-left" dir="ltr">@if($key->date) {{$key->date->date_end_fa}} @endif</span></td>
						<td class="text-center">
						@if($key->active_product==1)
						<form id="publish-product">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input type="hidden" name="id_product" value="{{$key->id_product}}">
							<input type="hidden" name="active_product" value="0">
							<span class="text-success">فعال</span><br>
							<button class="btn btn-danger btn-xs" type="submit"><i class="icon-trash "></i> غیر فعال کردن</button>
						</form>
						@else
						<form id="publish-product">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<input type="hidden" name="id_product" value="{{$key->id_product}}">
							<input type="hidden" name="active_product" value="1">
							<span class="text-danger">فعال</span><br>
							<button class="btn btn-success btn-xs" type="submit"><i class="icon-ok "></i> فعال کردن</button>
						</form>
						@endif
						</td>
						<td>
							<a class="btn btn-primary btn-xs" href="admin/masoud/addpost/{{$key->id_product}}" target="_blank" "><i class="icon-pencil"></i></a>
						</td>
						<td>
						@if($key->spesial==1)
							<a class="btn btn-xs" id="btn-sosial-{{$key->id_product}}" data-sosial="0" onclick="sosial({{$key->id_product}})"><i class="icon-star" id="sosial-{{$key->id_product}}"></i></a>
						@else
							<a class="btn btn-xs" id="btn-sosial-{{$key->id_product}}" data-sosial="1" onclick="sosial({{$key->id_product}})"><i class="icon-star-empty" id="sosial-{{$key->id_product}}"></i></a>
						@endif
						</td>
					</tr>
				@endforeach
				@endif
				</tbody>
			</table>
		</section>
	</div>
</div>

@endsection

<!-- javascript -->
@section('js')

<script type="text/javascript">
	$(function(){
		active();
	});

	function active(){
		$("form#publish-product").submit(function(e) {
			e.preventDefault();
			// alert('jamal');
			var formData= new FormData(this);
			$.ajax({
			    url: "admin/masoud/active", 
			    type: "POST",             
			    data: formData,
			    contentType: false,
			    cache: false,
			    processData:false,
			    dataType: 'html',
			    success: function(data) {
			        console.log(data);
			        $('.fa-product').remove();
			        $('.alert-publish').show();
			    }
			});
			return false;
		});
	}


	function sosial(id){
		var sosial=$('#btn-sosial-'+id).data('sosial');
		var _token= $('meta[name="csrf-token"]').attr('content');
		// alert(id);
		$.ajax({
			type: 'POST',
			url: 'admin/masoud/sosial',
			data: {'_token': _token,id_product:id,sosial:sosial},
			success: function(data){
				console.log(data);
				if(sosial==0){
					$('#sosial-'+id).removeClass('icon-star').addClass('icon-star-empty');
					$('#btn-sosial-'+id).data('sosial','1');
				}else{
					$('#sosial-'+id).removeClass('icon-star-empty').addClass('icon-star');
					$('#btn-sosial-'+id).data('sosial','0');
				}
			}
		});
	}
</script>



@endsection