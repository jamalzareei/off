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

@endsection

<!-- content -->
@section('content')
<div class="row">
	<div class="col-md-8 pull-right">
	@if($card_user)
		<table class="table cart-table text-right dr">
			<thead>
				<tr>
					<th class="text-right">#</th>
					<th class="text-right">نام</th>
					<th class="text-right">تعداد</th>
					<th class="text-right">قیمت واحد</th>
					<th class="text-right">قیمت</th>
					<th class="text-right">حذف</th>
				</tr>
			</thead>
			<tbody>
			@if($card_user->count()!=0)
				@foreach($card_user as $card)
				<tr id="card-removed-item-{{$card->id_card}}">
					<td class="cart-item-image">
						<a href="product/{{$card->id_product}}/{{str_replace(' ','-',$card->name_product)}}">
							<img src="uploadajax/{{$card->photo}}" height="50" alt="{{$card->details}}" title="{{$card->name_product}}" />
						</a>
					</td>
					<td><a href="product/{{$card->id_product}}/{{str_replace(' ','-',$card->name_product)}}">{{$card->name_product}}</a>
					</td>
					@if($card->ended)
						<td colspan="3">
							<span class="text-danger">کالا به دلیل اتمام زمان ارائه تخفیف از سبد شما حذف میشود</span>
						</td>
					@else
					<td class="cart-item-quantity"><i id="card-item-change" data-id="{{$card->id_card}}" class="fa fa-minus cart-item-minus card-item-change"></i>
						<input id="countcard-{{$card->id_card}}" type="text" name="cart-quantity" class="cart-quantity" value="{{$card->count}}" /><i id="card-item-change" data-id="{{$card->id_card}}" class="fa fa-plus cart-item-plus card-item-change"></i>
					</td>
					<td>
						<div class="price-one-{{$card->id_card}}">{{$card->price->discount_price}}</div> {{$card->price->t_r_value}}
					</td>
					<td>
						<div class="price-{{$card->id_card}}">{{$card->price->discount_price*$card->count}}</div> {{$card->price->t_r_value}}
					</td>
					@endif
					<td class="cart-item-remove ">
						<a class="fa fa-times" onclick="deleteCard({{$card->id_card}})"></a>
					</td>
				</tr>
				@endforeach
				@else
				<tr class="">
					<td colspan="6"><p class="text-danger text-center">هیچ کالایی در سبد شما موجود نیست</p></td>
				</tr>
				@endif
				</tbody>
		</table>	
		<a href="#" class="btn btn-primary">بروز کردن سبد خرید</a>

		@endif
	</div>
	<div class="col-md-3">
		<ul class="cart-total-list text-right dr">
			<li><span>جمع کل</span><span><div class="price-final">{{$sum}}</div> تومان</span>
			</li><!-- 
			<li><span>تخفیف</span><span></span>
			</li> -->
			<li><span>پرداخت نهایی</span><span><div class="price-final">{{$sum}}</div> تومان</span>
			</li>
		</ul>
		<a href="#" class="btn btn-primary btn-block">پرداخت</a>
	</div>
</div>
<div class="gap"></div>
@endsection

<!-- javascript -->
@section('js')

@endsection