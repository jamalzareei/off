@extends('masteroff')

<!-- title -->
@section('title')
title
@endsection
@section('keywords')
keywords
@endsection
@section('description')
description
@endsection

<!-- cascle style sheet -->
@section('css')
<style type="text/css">
	.nav-pills.nav-stacked.nav-arrow > li.active a:after{
		left: -15px;right: inherit;
	}
	.nav-pills.nav-stacked.nav-arrow > li{width: 100%;}
</style>
@endsection

<!-- content -->
@section('content')
<div class="row">
	<div class="col-md-3 pull-right">
		<aside class="sidebar-left">
			<ul class="nav nav-pills nav-stacked nav-arrow text-right">
				<li><a href="account/edit">ویرایش اطلاعات</a>
				</li>
				<!-- <li><a href="account/addressbook">آدرس</a>
				</li> -->
				<li class="active"><a href="account/orders">خرید های شما</a>
				</li>
				<li><a href="account/wishlist">مورد علاقه ها</a>
				</li>
			</ul>
		</aside>
	</div>
	<div class="col-md-9 pull-right">
		
		<div class="row">
			<div class="col-md-12">
				<table class="table table-order text-center dr">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">نام</th>
							<th class="text-center">تعداد</th>
							<th class="text-center">قیمت</th>
							<th class="text-center">تاریخ</th>
						</tr>
					</thead>
					<tbody>
					@if($order->count()!=0)
					@foreach($order as $value)
						<tr>
							<td class="table-order-img">
								<a href="product/{{$value->id_product}}/{{str_replace(' ','-',$value->name_product)}}">
									<img src="uploadajax/{{$value->photo}}" alt="{{$value->details}}" title="{{$value->name_product}}" width="100%" />
								</a>
							</td>
							<td><a href="product/{{$value->id_product}}/{{str_replace(' ','-',$value->name_product)}}">{{$value->name_product}}</a>
							</td>
							<td>{{$value->count}}</td>
							<td>{{$value->price->discount_price}}</td>
							<td>{{$value->date_insert}}</td>
						</tr>
					@endforeach
					@else
					<tr>
						<td colspan="5">
							<p class="text-danger">هیچ خریدی ندارید.</p>
						</td>
					</tr>
					@endif
					</tbody>
				</table>
			</div>
		</div>
		<div class="gap"></div>
	</div>
</div>
@endsection

<!-- javascript -->
@section('js')

@endsection