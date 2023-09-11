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
	<div class="row">
		<div class="col-md-3 pull-right">
			<aside class="sidebar-left">
				<h3 class="text-right">من دنبال اینم</h3>
				<ul class="nav nav-tabs nav-stacked nav-coupon-category nav-coupon-category-left">
					<li><a href="#"><i class="fa fa-cutlery"></i><span>40</span><strong>رستوران و کافیشاپ</strong></a>
					</li>
					<li><a href="#"><i class="fa fa-calendar"></i><span>42</span><strong>حوادث</strong></a>
					</li>
					<li><a href="#"><i class="fa fa-female"></i><span>48</span><strong>زیبایی آرایشگاه</strong></a>
					</li>
					<li><a href="#"><i class="fa fa-bolt"></i><span>33</span><strong>باشگاه</strong></a>
					</li>
					<li><a href="#"><i class="fa fa-headphones"></i><span>40</span><strong>الکترونیک</strong></a>
					</li>
					<li><a href="#"><i class="fa fa-image"></i><span>50</span><strong>آتلیه</strong></a>
					</li>
					<li><a href="#"><i class="fa fa-umbrella"></i><span>33</span><strong>مد</strong></a>
					</li>
					<li><a href="#"><i class="fa fa-shopping-cart"></i><span>37</span><strong>کالا</strong></a>
					</li>
					<li><a href="#"><i class="fa fa-home"></i><span>30</span><strong>خانه و اجاره</strong></a>
					</li>
					<li><a href="#"><i class="fa fa-plane"></i><span>48</span><strong>سفر و تور</strong></a>
					</li>
				</ul>
			</aside>
		</div>
		<div class="col-md-9 pull-right">
			<div class="owl-carousel owl-slider" id="owl-carousel-slider" data-pagination="false" data-nav="top-right">
				<div>
					<div class="bg-holder">
						<img src="offs/img/900x500.png" alt="Image Alternative text" title="Bridge" />
						<div class="text-white text-center slider-caption slider-caption-bottom">
							<h2 class="text-uc">پیتزای سالسا</h2>
							<div class="countdown countdown-big" data-countdown="June 10, 2017 6:35:52"></div><a class="btn btn-lg btn-ghost btn-white" href="#" dir="rtl">تخفیف 60%</a>
						</div>
					</div>
				</div>
				<div>
					<div class="bg-holder">
						<img src="offs/img/900x500.png" alt="Image Alternative text" title="4 Strokes of Fun" />
						<div class="text-white text-center slider-caption slider-caption-bottom">
							<h2 class="text-uc">پیتزای سالسا</h2>
							<div class="countdown countdown-big" data-countdown="Jul 5, 2014 1:30:00"></div><a class="btn btn-lg btn-ghost btn-white" href="#">تخفیف 60%</a>
						</div>
					</div>
				</div>
				<div>
					<div class="bg-holder">
						<img src="offs/img/900x500.png" alt="Image Alternative text" title="LHOTEL PORTO BAY SAO PAULO luxury suite" />
						<div class="text-white text-center slider-caption slider-caption-bottom">
							<h2 class="text-uc">آپارتمان دوبلکس</h2>
							<div class="countdown countdown-big" data-countdown="Jul 1, 2014 5:30:00"></div><a class="btn btn-lg btn-ghost btn-white" href="#">Save 60% Now</a>
						</div>
					</div>
				</div>
				<div>
					<div class="bg-holder">
						<img src="offs/img/900x500.png" alt="Image Alternative text" title="LHOTEL PORTO BAY SAO PAULO luxury suite" />
						<div class="text-white text-center slider-caption slider-caption-bottom">
							<h2 class="text-uc">آپارتمان دوبلکس</h2>
							<div class="countdown countdown-big" data-countdown="Jul 1, 2014 5:30:00"></div><a class="btn btn-lg btn-ghost btn-white" href="#" dir="rtl">Save 60% Now</a>
						</div>
					</div>
				</div>
				<div>
					<div class="bg-holder">
						<img src="offs/img/900x500.png" alt="Image Alternative text" title="LHOTEL PORTO BAY SAO PAULO luxury suite" />
						<div class="text-white text-center slider-caption slider-caption-bottom">
							<h2 class="text-uc">آپارتمان دوبلکس</h2>
							<div class="countdown countdown-big" data-countdown="Jul 1, 2014 5:30:00"></div><a class="btn btn-lg btn-ghost btn-white" href="#">Save 60% Now</a>
						</div>
					</div>
				</div>
				<div>
					<div class="bg-holder">
						<img src="offs/img/900x500.png" alt="Image Alternative text" title="LHOTEL PORTO BAY SAO PAULO luxury suite" />
						<div class="text-white text-center slider-caption slider-caption-bottom">
							<h2 class="text-uc">آپارتمان دوبلکس</h2>
							<div class="countdown countdown-big" data-countdown="Jul 1, 2014 5:30:00"></div><a class="btn btn-lg btn-ghost btn-white" href="#">Save 60% Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="gap"></div>
	<h1 class="mb20 text-right">در آینده خواهید دید <small><a href="#">دیدن همه</a></small></h1>
	<div class="row row-wrap">
		<a class="col-md-4" href="#">
			<div class="product-thumb">
				<header class="product-header">
					<img src="offs/img/800x600.png" alt="Image Alternative text" title="AMaze" />
				</header>
				<div class="product-inner">
					<h5 class="product-title">ست لیوان</h5>
					<p class="product-desciption">ست لیوان سرامیکی شیش تیکه</p>
					<div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 3 روز و 1 ساعت مانده</span>
						<ul class="product-price-list" dir="rtl">
							<li><span class="product-price">5000 تومان</span>
							</li>
							<li><span class="product-old-price">20000 تومان</span>
							</li>
							<li><span class="product-save">75% تخفیف</span>
							</li>
						</ul>
					</div>
					<p class="product-location"><i class="fa fa-map-marker"></i> یزد</p>
				</div>
			</div>
		</a>
		<a class="col-md-4" href="#">
			<div class="product-thumb">
				<header class="product-header">
					<img src="offs/img/800x600.png" alt="Image Alternative text" title="AMaze" />
				</header>
				<div class="product-inner">
					<h5 class="product-title">تور تابستانی</h5>
					<p class="product-desciption">تور های تابستانه لحظه آخری</p>
					<div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 5 روز و 10 ساعت مانده</span>
						<ul class="product-price-list" dir="rtl">
							<li><span class="product-price">2000000 تومان</span>
							</li>
							<li><span class="product-old-price">1000000 تومان</span>
							</li>
							<li><span class="product-save">50% تخفیف</span>
							</li>
						</ul>
					</div>
					<p class="product-location"><i class="fa fa-map-marker"></i> یزد</p>
				</div>
			</div>
		</a>
		<a class="col-md-4" href="#">
			<div class="product-thumb">
				<header class="product-header">
					<img src="offs/img/800x600.png" alt="Image Alternative text" title="AMaze" />
				</header>
				<div class="product-inner">
					<h5 class="product-title">تدریس ویولون</h5>
					<p class="product-desciption">تدریس تکی و گروهی ویولون</p>
					<div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 1 روز و 5 ساعت مانده</span>
						<ul class="product-price-list" dir="rtl">
							<li><span class="product-price">20000 تومان</span>
							</li>
							<li><span class="product-old-price">9000 تومان</span>
							</li>
							<li><span class="product-save">55% تخفیف</span>
							</li>
						</ul>
					</div>
					<p class="product-location"><i class="fa fa-map-marker"></i> یزد</p>
				</div>
			</div>
		</a>
	</div>
	<div class="gap gap-small"></div>
	<h1 class="mb20 text-right"><small><a href="#">دیدن همه</a></small> New Deals</h1>
	<div class="row row-wrap">
		<a class="col-md-4" href="#">
			<div class="product-thumb">
				<header class="product-header">
					<img src="offs/img/800x600.png" alt="Image Alternative text" title="iPhone 5 iPad mini iPad 3" />
				</header>
				<div class="product-inner">
					<h5 class="product-title">Electronics Big Deal</h5>
					<p class="product-desciption">Feugiat dui eros himenaeos viverra mauris aptent morbi</p>
					<div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 1 day 35 h remaining</span>
						<ul class="product-price-list">
							<li><span class="product-price">$57</span>
							</li>
							<li><span class="product-old-price">$168</span>
							</li>
							<li><span class="product-save">Save 34%</span>
							</li>
						</ul>
					</div>
					<p class="product-location"><i class="fa fa-map-marker"></i> Boston</p>
				</div>
			</div>
		</a>
		<a class="col-md-4" href="#">
			<div class="product-thumb">
				<header class="product-header">
					<img src="offs/img/800x600.png" alt="Image Alternative text" title="Aspen Lounge Chair" />
				</header>
				<div class="product-inner">
					<h5 class="product-title">Aspen Lounge Chair</h5>
					<p class="product-desciption">Feugiat dui eros himenaeos viverra mauris aptent morbi</p>
					<div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 7 days 39 h remaining</span>
						<ul class="product-price-list">
							<li><span class="product-price">$115</span>
							</li>
							<li><span class="product-old-price">$261</span>
							</li>
							<li><span class="product-save">Save 44%</span>
							</li>
						</ul>
					</div>
					<p class="product-location"><i class="fa fa-map-marker"></i> Boston</p>
				</div>
			</div>
		</a>
		<a class="col-md-4" href="#">
			<div class="product-thumb">
				<header class="product-header">
					<img src="offs/img/800x600.png" alt="Image Alternative text" title="Urbex Esch/Lux with Laney and Laaaaag" />
				</header>
				<div class="product-inner">
					<h5 class="product-title">Best Camera</h5>
					<p class="product-desciption">Feugiat dui eros himenaeos viverra mauris aptent morbi</p>
					<div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 9 days 34 h remaining</span>
						<ul class="product-price-list">
							<li><span class="product-price">$120</span>
							</li>
							<li><span class="product-old-price">$219</span>
							</li>
							<li><span class="product-save">Save 55%</span>
							</li>
						</ul>
					</div>
					<p class="product-location"><i class="fa fa-map-marker"></i> Boston</p>
				</div>
			</div>
		</a>
	</div>
	<div class="row row-wrap">
		<a class="col-md-3" href="#">
			<div class="product-thumb">
				<header class="product-header">
					<img src="offs/img/800x600.png" alt="Image Alternative text" title="the best mode of transport here in maldives" />
				</header>
				<div class="product-inner">
					<h5 class="product-title">Finshing in Maldives</h5>
					<p class="product-desciption">Viverra netus platea duis faucibus tincidunt sem rhoncus</p>
					<div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 5 days 31 h remaining</span>
						<ul class="product-price-list">
							<li><span class="product-price">$116</span>
							</li>
							<li><span class="product-old-price">$275</span>
							</li>
							<li><span class="product-save">Save 42%</span>
							</li>
						</ul>
					</div>
					<p class="product-location"><i class="fa fa-map-marker"></i> Boston</p>
				</div>
			</div>
		</a>
		<a class="col-md-3" href="#">
			<div class="product-thumb">
				<header class="product-header">
					<img src="offs/img/800x600.png" alt="Image Alternative text" title="Food is Pride" />
				</header>
				<div class="product-inner">
					<h5 class="product-title">Best Pasta</h5>
					<p class="product-desciption">Viverra netus platea duis faucibus tincidunt sem rhoncus</p>
					<div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 8 days 56 h remaining</span>
						<ul class="product-price-list">
							<li><span class="product-price">$71</span>
							</li>
							<li><span class="product-old-price">$222</span>
							</li>
							<li><span class="product-save">Save 32%</span>
							</li>
						</ul>
					</div>
					<p class="product-location"><i class="fa fa-map-marker"></i> Boston</p>
				</div>
			</div>
		</a>
		<a class="col-md-3" href="#">
			<div class="product-thumb">
				<header class="product-header">
					<img src="offs/img/800x600.png" alt="Image Alternative text" title="Our Coffee miss u" />
				</header>
				<div class="product-inner">
					<h5 class="product-title">Coffe Shop Discount</h5>
					<p class="product-desciption">Viverra netus platea duis faucibus tincidunt sem rhoncus</p>
					<div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 9 days 54 h remaining</span>
						<ul class="product-price-list">
							<li><span class="product-price">$56</span>
							</li>
							<li><span class="product-old-price">$186</span>
							</li>
							<li><span class="product-save">Save 30%</span>
							</li>
						</ul>
					</div>
					<p class="product-location"><i class="fa fa-map-marker"></i> Boston</p>
				</div>
			</div>
		</a>
		<a class="col-md-3" href="#">
			<div class="product-thumb">
				<header class="product-header">
					<img src="offs/img/800x600.png" alt="Image Alternative text" title="My Ice Cream and Your Ice Cream Spoons" />
				</header>
				<div class="product-inner">
					<h5 class="product-title">Lovely Ice Cream Spoons</h5>
					<p class="product-desciption">Viverra netus platea duis faucibus tincidunt sem rhoncus</p>
					<div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 7 days 56 h remaining</span>
						<ul class="product-price-list">
							<li><span class="product-price">$73</span>
							</li>
							<li><span class="product-old-price">$187</span>
							</li>
							<li><span class="product-save">Save 39%</span>
							</li>
						</ul>
					</div>
					<p class="product-location"><i class="fa fa-map-marker"></i> Boston</p>
				</div>
			</div>
		</a>
	</div>
	<div class="gap gap-small"></div>
	<h1 class="mb20 text-right"><small><a href="#">View All</a></small> Puplar</h1>
	<div class="row row-wrap">
		<a class="col-md-4" href="#">
			<div class="product-thumb">
				<header class="product-header">
					<img src="offs/img/800x600.png" alt="Image Alternative text" title="Green Furniture" />
				</header>
				<div class="product-inner">
					<h5 class="product-title">Green Furniture Pack</h5>
					<p class="product-desciption">Habitasse adipiscing cum lectus dolor iaculis eget pulvinar</p>
					<div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 3 days 56 h remaining</span>
						<ul class="product-price-list">
							<li><span class="product-price">$44</span>
							</li>
							<li><span class="product-old-price">$121</span>
							</li>
							<li><span class="product-save">Save 36%</span>
							</li>
						</ul>
					</div>
					<p class="product-location"><i class="fa fa-map-marker"></i> Boston</p>
				</div>
			</div>
		</a>
		<a class="col-md-4" href="#">
			<div class="product-thumb">
				<header class="product-header">
					<img src="offs/img/800x600.png" alt="Image Alternative text" title="The Hidden Power of the Heart" />
				</header>
				<div class="product-inner">
					<h5 class="product-title">Beach Holidays</h5>
					<p class="product-desciption">Habitasse adipiscing cum lectus dolor iaculis eget pulvinar</p>
					<div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 5 days 32 h remaining</span>
						<ul class="product-price-list">
							<li><span class="product-price">$64</span>
							</li>
							<li><span class="product-old-price">$116</span>
							</li>
							<li><span class="product-save">Save 55%</span>
							</li>
						</ul>
					</div>
					<p class="product-location"><i class="fa fa-map-marker"></i> Boston</p>
				</div>
			</div>
		</a>
		<a class="col-md-4" href="#">
			<div class="product-thumb">
				<header class="product-header">
					<img src="offs/img/800x600.png" alt="Image Alternative text" title="Hot mixer" />
				</header>
				<div class="product-inner">
					<h5 class="product-title">Modern DJ Set</h5>
					<p class="product-desciption">Habitasse adipiscing cum lectus dolor iaculis eget pulvinar</p>
					<div class="product-meta"><span class="product-time"><i class="fa fa-clock-o"></i> 10 days 8 h remaining</span>
						<ul class="product-price-list">
							<li><span class="product-price">$46</span>
							</li>
							<li><span class="product-old-price">$136</span>
							</li>
							<li><span class="product-save">Save 34%</span>
							</li>
						</ul>
					</div>
					<p class="product-location"><i class="fa fa-map-marker"></i> Boston</p>
				</div>
			</div>
		</a>
	</div>
	<div class="gap gap-small"></div>
</div>
@endsection

<!-- javascript -->
@section('js')

@endsection