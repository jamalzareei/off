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
	.nav-tabs.nav-stacked.nav-coupon-category > li > a .fa{
		left: inherit;right: 0;
	}
	.nav-tabs.nav-stacked.nav-coupon-category > li > a{
		padding: 0px 55px 0px 0px;text-align: right;width: 100%;display: table;
	}
	.nav-tabs.nav-stacked.nav-coupon-category > li > a:hover{
		background: #fbfbfb;
		padding-right: 65px;
		padding-left: inherit;
		color: #2a8fbd;
	}
	.product-thumb{margin-bottom: 0}

	.product-thumb:hover .product-actions-list{
		top: 25%;
	}
	.product-actions-list{
		position: absolute;top: 100%;width: 100%;
	    -webkit-transition: all 0.5s; /* Safari */
    	transition: all 0.5s;
	}
</style>
@endsection

<!-- content -->
@section('content')
<div class="row">
	<div class="col-md-3 pull-right">
		@include('sidebar')
	</div>
	<div class="col-md-9 pull-right">
		<div class="row">
			<div class="col-md-3"><!-- 
				<div class="product-sort">
					<span class="product-sort-selected">sort by <b>Price</b></span>
					<a href="#" class="product-sort-order fa fa-angle-down"></a>
					<ul>
						<li><a href="#">sort by Name</a>
						</li>
						<li><a href="#">sort by Date</a>
						</li>
						<li><a href="#">sort by Popularity</a>
						</li>
						<li><a href="#">sort by Rating</a>
						</li>
					</ul>
				</div> -->
			</div>
			<div class="col-md-2 col-md-offset-7">
				<!-- <div class="product-view pull-right">
					<button class="fa fa-th-large active btn-column"></button>
					<button class="fa fa-list btn-horizontal"></button>
				</div> -->
			</div>
		</div>
		<div class="row row-wrap">
		@foreach($product as $pro)
			<a href="product/{{$pro->id_product}}/{{str_replace(' ','-',$pro->name_product)}}">
				<div class="col-md-6">
					<div class="product-thumb">
						<header class="product-header hover-img">
							<span class="product-label label label-danger">Hot</span>
							<img class="img-shop" src="uploadajax/{{$pro->photo}}" alt="{{$pro->details}}" title="{{$pro->name_product}}" />
							<h5 class="hover-title hover-title-center hover-title-hide">
							@if(!$pro->ended)
								<a class="btn btn-sm btn-danger" onclick="addCard({{$pro->id_product}})"><i class="fa fa-shopping-cart pull-right"></i> اضافه به سبد</a>
								@endif
								<a class="btn btn-sm btn-success" href="product/{{$pro->id_product}}/{{str_replace(' ','-',$pro->name_product)}}"><i class="fa fa-bars pull-right"></i> جزئیات تخفیف</a>
							</h5>
							<div class="hover-inner hover-inner-hide dr">
								<span class="label small"><i class="fa fa-users"></i>{{$pro->buier_number}} خرید</span>
		                        <span class="label small"><i class="fa fa-eye"></i>{{$pro->viewers_number}} بیننده</span>
		                        @if($pro->ended)
		                        <span class="label small text-danger"><span class="text
		                        "><i class="fa fa-eyes"></i> به پایان رسیده</span></span>
		                        @endif
							</div>
							<div class="product-buy-counter">
		                        
	                        </div>
						</header>
						<div class="product-inner">
							<ul class="icon-group icon-list-rating @if($pro->rate[0]->rate==null) icon-list-non-rated @endif text-color" title="@if($pro->rate[0]->rate==null) امتیازی داده نشده @else {{($pro->rate[0]->rate)}} امتیاز @endif">
							
							@for($i=1;$i<=($pro->rate[0]->rate);$i++)
				                <li><i class="fa fa-star"></i>
				                </li>
				            @endfor
							@if(floor(($pro->rate[0]->rate)) < ($pro->rate[0]->rate))
				                <li><i class="fa fa-star-half-empty"></i>
				                </li>
				            @endif
							@for($i=5;$i>ceil(($pro->rate[0]->rate));$i--)
				                <li><i class="fa fa-star-o"></i>
				                </li>
				            @endfor
							</ul>
							<h5 class="product-title">{{$pro->name_product}}</h5>
							<p class="product-desciption">{{--$pro->details--}}</p>
							<div class="product-meta">
								<span class="product-time dr">
		                        	<i class="fa fa-clock-o pull-right"></i>
		                        	<?php
		                        	if($pro->ended){
		                        		echo "<span class='text-danger'>زمان این محصول به پایان رسیده است</span>";
		                        	}else{
                                        $date = new DateTime($pro->date->date_end);
										$now = new DateTime();
										if($date->diff($now)->format("%d")==0){
											echo $date->diff($now)->format("%h ساعت و %i دقیقه باقیمانده");
										}else{
											echo $date->diff($now)->format("%d روز, %h ساعت و %i دقیقه باقیمانده");
										}		                        		
		                        	}
                                    ?>
		                        </span>
	                            <ul class="product-price-list">
	                                <li><span class="product-price">
	                                	{{number_format($pro->price->main_price)}} {{($pro->price->t_r_value)}} 
	                                </span>
	                                </li>
	                                <li><span class="product-old-price">
	                                	{{number_format($pro->price->discount_price)}} {{($pro->price->t_r_value)}}
	                                </span>
	                                </li>
	                                <li><span class="product-save">
	                                	{{($pro->price->discount_percent)}}%
	                                </span>
	                                </li>
	                            </ul>
							</div>
						</div>
					</div>
				</div>
			</a>
		@endforeach
		</div>
		<div class="row text-center">
			<?php echo $product->links(); ?>
		</div>
		<div class="gap"></div>
	</div>
</div>
@endsection

<!-- javascript -->
@section('js')
<script type="text/javascript">
	(function($) {
		$(document).on("click", ".btn-column",function(e){
			$(".product-thumb").parent('div').removeClass('col-md-12').addClass('col-md-4');
			$(".product-thumb").removeClass('product-thumb-horizontal');
			$(this).addClass('active');
			$(".btn-horizontal").removeClass('active');
		});
		$(document).on("click", ".btn-horizontal",function(e){
			$(".product-thumb").parent('div').removeClass('col-md-4').addClass('col-md-12');
			$(".product-thumb").addClass('product-thumb-horizontal');
			$(this).addClass('active');
			$(".btn-column").removeClass('active');
		});
	})(jQuery);
</script>
@endsection