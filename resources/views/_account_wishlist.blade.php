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
				<li><a href="account/orders">خرید های شما</a>
				</li>
				<li class="active"><a href="account/wishlist">مورد علاقه ها</a>
				</li>
			</ul>
		</aside>
	</div>
	<div class="col-md-9 pull-right">
		<div class="row row-wrap">
		@if(isset($wish))
		@foreach ($wish as $key)
			<div class="col-md-4" id="div-wish-{{$key->id_product}}-{{$user->id_user}}">
				<a href="product/{{$key->id_product}}/{{str_replace(' ','-',$key->name_product)}}">
				<div class="product-thumb">
					<header class="product-header">
						<img src="uploadajax/{{$key->photo}}" alt="{{$key->details}}" title="{{$key->name_product}}" />
					</header>
					<div class="product-inner">
						<!-- <ul class="icon-group icon-list-rating" title="3.7/5 rating">
							<li><i class="fa fa-star"></i>
							</li>
							<li><i class="fa fa-star"></i>
							</li>
							<li><i class="fa fa-star"></i>
							</li>
							<li><i class="fa fa-star"></i>
							</li>
							<li><i class="fa fa-star-o"></i>
							</li>
						</ul> -->
						<h5 class="product-title">{{$key->name_product}}</h5>
						<div class="product-meta">
							<ul class="product-price-list">
								<li><span class="product-price">{{$key->price->discount_price}} تومان</span>
								</li>
							</ul>
							<ul class="product-actions-list">
								<li><a href="product/{{$key->id_product}}/{{str_replace(' ','-',$key->name_product)}}" class="btn btn-sm"><i class="fa fa-bars"></i> جزئیات</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="product-wishlist-remove"><a class="btn btn-ghost btn-sm dr text-right" onclick="addWishlist({{$key->id_product}},{{$user->id_user}},0)"><i class="fa fa-times"></i> حذف از علاقه مندی ها</a>
				</div>
				</a>
			</div>
			
		@endforeach
		@endif
		</div>
		<div class="gap"></div>
	</div>
</div>
@endsection

<!-- javascript -->
@section('js')

@endsection