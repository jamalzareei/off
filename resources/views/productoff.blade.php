@extends('masteroff')

<!-- title -->
@section('title')
{{$product->name_product}}
@endsection
@section('keywords')
{{str_replace(' ','-',$product->name_product)}}
@endsection
@section('description')
{{$product->details}}
@endsection

<!-- cascle style sheet -->
@section('css')
<style type="text/css">
/*	
	@media (min-width: 1200px){
		.container {
			width: 1250px;
		}
	}*/
	.tabbable .nav-tabs > li{float: right;}
	.tabbable .nav-tabs{padding-right: 0}
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
	.fotorama__nav__shaft.fotorama__grab{
		display: none;
	}
	.comment .comment-author{float: right;margin-left: 10px;}
	aside .nav-tabs > li{width: 100%;}
	.product-page-meta .product-page-meta-info .product-page-meta-price{
		font-size: 12px;
	}
	small{font-size: 10px !important;}
	.global-wrap.btn-lg.btn-block{
		position: relative;
		padding-right: 10px;
	}
    .btn-circle.btn-lg
    {
        width: 70px;
        height: 70px;
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 50%;
        top: -8px;
        left: -15px;
        position: absolute;
    }
    /* BELL */
@keyframes ring {
	0%{transform:rotate(-15deg)}
	2%{transform:rotate(15deg)}
	4%{transform:rotate(-18deg)}
	6%{transform:rotate(18deg)}
	8%{transform:rotate(-22deg)}
	10%{transform:rotate(22deg)}
	12%{transform:rotate(-18deg)}
	14%{transform:rotate(18deg)}
	16%{transform:rotate(-12deg)}
	18%{transform:rotate(12deg)}
	20%,100%{transform:rotate(0deg)}
}
.faa-ring.animated,
.faa-ring.animated-hover:hover,
.faa-parent.animated-hover:hover > .faa-ring {
	animation: ring 2s ease infinite;
	transform-origin-x: 50%;
	transform-origin-y: 0px;
	transform-origin-z: initial;
}
.faa-ring.animated.faa-fast,
.faa-ring.animated-hover.faa-fast:hover,
.faa-parent.animated-hover:hover > .faa-ring.faa-fast {
	animation: ring 1s ease infinite;
}
.faa-ring.animated.faa-slow,
.faa-ring.animated-hover.faa-slow:hover,
.faa-parent.animated-hover:hover > .faa-ring.faa-slow {
	animation: ring 3s ease infinite;
}
</style>
@endsection

<!-- content -->
@section('content')
<div class="row">
	<div class="col-md-3 pull-right">
		<aside class="sidebar-left">
			<ul class="nav nav-tabs nav-stacked nav-coupon-category nav-coupon-category-left">
				<li class="active"><a href="#"><i class="fa fa-ticket"></i> <span>40</span> <strong>همه</strong></a>
                </li>
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
	<div class="col-md-9">
		<div class="col-md-4">
			<div class="product-page-meta box">
				<ul class="icon-group icon-list-rating text-color" title="{{$rate_users}}/5 rating">
				
					@for($i=1;$i<=$rate_users;$i++)
		                <li><i class="fa fa-star"></i>
		                </li>
		            @endfor
					@if(floor($rate_users) < $rate_users)
		                <li><i class="fa fa-star-half-empty"></i>
		                </li>
		            @endif
					@for($i=5;$i>ceil($rate_users);$i--)
		                <li><i class="fa fa-star-o"></i>
		                </li>
		            @endfor
	            </ul>	
	            <small><a class="text-muted dr">از {{$count_star}} رای داده شده</a></small>
				<h4 class="text-right" dir="rtl"><?php echo htmlspecialchars_decode($product->name_product) ?></h4>
				<!-- <p class="text-right text-justify" dir="rtl">{{--$product->details--}}</p> -->
				@if(isset($price))
				<div class="global-wrap btn-lg btn-block dr numberFa">
					<h3 class="text-right"><strong>{{number_format($price->discount_price)}} تومان</strong></h3>
					
        			<button type="button" class="btn btn-danger btn-circle btn-lg"><i class="fa fa-fw fa-bell faa-ring animated"></i><br>
						<span class="product-page-meta-price dr"><span class="numberFa">{{$price->discount_percent}}</span>%</span>
        			</button>
				</div>
				@endif
				<ul class="list product-page-meta-info">
				@if(isset($price))
					<li>
						<ul class="list product-page-meta-price-list">
							<div class="col-sm-6">
								<span class="product-page-meta-title text-center">قیمت اصلی</span>
								<span class="product-page-meta-price dr">{{$price->main_price}} تومان</span>
							</div>
							<div class="col-sm-6">
								<span class="product-page-meta-title text-center">سود شما</span>
								<span class="product-page-meta-price dr">{{$price->save_you}} تومان</span>
							</div>
						</ul>
					</li>
				@endif
				@if(isset($date))
					@if($date->ended)
					<li>
						<span class="product-page-meta-title dr text-center text-danger">زمان خرید به پایان رسیده است.</span>
					</li>
					@else
					<li>
						<span class="product-page-meta-title dr text-right">زمان باقی مانده برای خرید</span>
						<!-- COUNTDOWN -->
						<div data-countdown="{{$date->date_one}}" class="countdown countdown-inline dr text-center"></div>
					</li>
					@endif
				@endif
					<li>
				@if($date->ended)
				@else
						<a class="btn btn-lg btn-primary dr btn-block" onclick="addCard({{$product->id_product}})">
							<i class="fa fa-shopping-cart"></i> اضافه به سبد خرید
						</a>
					@endif
						<span class="product-page-meta-title"><span class="numberFa">500</span> خریداری شده</span>
					</li>
					@if(Cookie::get('email') && $user)
					<li>
						<a class="btn btn-sm dr btn-block" onclick="addWishlist({{$product->id_product}},{{$user->id_user}},0)">
							<i class="fa fa-star"></i> اضافه به علقه مندی ها
						</a>
					</li>
					@endif
				</ul>
			</div>
		</div>

        <div id="review-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
        @if(Cookie::get('email') && $user)
            <h4 class="text-right dr">اضافه کردن کامنت و امتیاز دهی به محصول</h4>
            <form class="form-post" id="comment" method="post" enctype="multipart/form-data">
	            <input type="hidden" name="_token" value="{{csrf_token()}}">
	            <input type="hidden" name="id_user" value="@if(isset($user)){{$user->id_user}}@else 0 @endif">
	            <input type="hidden" name="id_product" value="{{$product->id_product}}">
                <div class="form-group">
                    <label class="dr text-right pull-right">نام</label>
                    <input type="text" name="name_comment" placeholder="مثال: جمال" class="form-control text-right dr" value="@if(isset($user)) {{$user->firstname}}@else @endif" />
                </div>
                <div class="form-group">
                    <label class="dr text-right pull-right">ایمیل (جهت ارسال ایمیل در صورت جواب)</label>
                    <input type="text" name="email_comment" placeholder="Example: jogndoe@gmail.com" class="form-control" value="@if(isset($user)) {{$user->email}}@else @endif" />
                </div>
                <div class="form-group">
                    <label class="dr text-right pull-right">کامنت شما</label>
                    <textarea class="form-control text-right dr" name="message_comment"></textarea>
                </div>
                <div class="form-group">
                    <label class="dr text-right pull-right">امتیاز شما</label>
                    <ul class="icon-list icon-list-inline star-rating text-right dr" id="star-rating">
                        <li class="selected"><i class="fa fa-star"></i>
                        </li>
                        <li class="selected"><i class="fa fa-star"></i>
                        </li>
                        <li class="selected"><i class="fa fa-star"></i>
                        </li>
                        <li class="selected"><i class="fa fa-star"></i>
                        </li>
                        <li class="selected"><i class="fa fa-star"></i>
                        </li>
                    </ul>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="ارسال بررسی شما" />
                <div class="alert alert-success alert-comment text-center dr" style="display: none">
                	کامنت شما اضافه گردید پس از تایید مدیر نمایش داده خواهد شد.
                </div>
            </form>
        @else
        	<p class="text-right dr">ابتدا وارد سایت شوید.</p>
        @endif
        </div>
		<div class="col-md-8">
			<div class="fotorama" data-nav="thumbs" data-allowfullscreen="1" data-thumbheight="150" data-thumbwidth="150">
			@if(isset($photo))
			@foreach($photo as $path)
			<img class="img-product" src="uploadajax/{{$path->path_photo}}" alt="{{$product->name_product}}" title="{{$product->name_product}}" />
			@endforeach
			@endif
            </div>
		</div>
		<div class="gap gap-small"></div>
		<div class="col-md-12">
			<div class="tabbable">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-spinner fa-spin fa-product"></i>توضیحات</a>
                    </li>
                    <li><a href="#tab-2" data-toggle="tab"><i class="fa fa-info"></i>اطلاعات اضافی</a>
                    </li>
                    <li><a href="#tab-5" data-toggle="tab"><i class="fa fa-comments"></i>آدرس فروشنده</a>
                    </li>
                    <li><a href="#tab-3" data-toggle="tab"><i class="fa fa-truck"></i>توضیحات خرید و پرداخت</a>
                    </li>
                    <li><a href="#tab-4" data-toggle="tab"><i class="fa fa-comments"></i>بررسی کاربران</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active text-right dr" id="tab-1">
                    <?php echo htmlspecialchars_decode($product->details) ?> <br>
                    </div>
                    <div class="tab-pane fade" id="tab-2">
                    @if(isset($property))
                        <table class="table table-striped mb0 text-right dr">
                            <tbody>
                            @foreach($property as $prop)
                                <tr>
                                    <td>{{$prop->question_property}}</td>
                                    <td><?php echo htmlspecialchars_decode($prop->answer_property) ?></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    </div>
                    <div class="tab-pane fade dr text-right" id="tab-5">
					@if(isset($seller))
                        {{$seller->name_seller}}<br>
                        {{$seller->address_seller}}<br>
                        {{$seller->latitude}}<br>
                        {{$seller->longitude}}<br>
                        {{$seller->address_map}}<br>
						<div id="map" style="width:100%;height:400px;"></div>
						<input type="hidden" id="lat" name="lat" value="{{$seller->latitude}}">
						<br>
						<input type="hidden" id="lng" name="lng" value="{{$seller->longitude}}">
                    @endif
                    </div>
                    <div class="tab-pane fade text-right dr" id="tab-3">
                        <p>Felis elit netus sed iaculis interdum nullam sem habitasse vulputate laoreet turpis fringilla duis suspendisse arcu ullamcorper scelerisque elit quam dignissim velit lacus urna quam interdum quisque bibendum platea iaculis</p>
                        <p>Blandit dapibus non natoque purus pellentesque nibh duis neque metus elementum aliquet ut egestas orci elit pellentesque pulvinar in nam class mollis netus dolor augue nec senectus torquent velit fusce</p>
                    </div>
                    <div class="tab-pane fade" id="tab-4">
                    	<a class="popup-text btn btn-primary" href="#review-dialog" data-effect="mfp-zoom-out">
                    		<i class="fa fa-pencil"></i> امتیاز دهی و کامنت
                    	</a>
                    	@if($comment)
                        <ul class="comments-list">
                        @foreach($comment as $com)
                            <li>
                                <!-- REVIEW -->
                                <article class="comment">
                                    <div class="comment-author pull-right">
                                        <img src="offs/img/50x50.png" alt="Image Alternative text" title="Gamer Chick" />
                                    </div>
                                    <div class="comment-inner dr text-right pull-right">
                                        <ul class="icon-group icon-list-rating comment-review-rate col-md-12" title="{{$com->rate}} امتیاز">
                                        	@for($i=1;$i<=$com->rate;$i++ )
                                            <li><i class="fa fa-star"></i>
                                            </li>
                                            @endfor
                                        	@for($i=5;$i>$com->rate;$i-- )
                                            <li><i class="fa fa-star-o"></i>
                                            </li>
                                            @endfor
                                        </ul>
                                        <span class="comment-author-name">{{$com->name_comment}}</span>
                                        <p class="comment-content col-md-12 dr">
                                        <?php echo htmlentities($com->message, ENT_QUOTES, 'utf-8') ?>
                                        </p>
                                        <span class="comment-time col-md-12 dr">
                                        <?php
	                                        $date = new DateTime($com->date_insert);
											$now = new DateTime();
											echo $date->diff($now)->format("%d روز, %h ساعت و %i دقیقه پیش");
                                        ?>
                                        </span>
                                    </div>
                                </article>
                            </li>
                        @endforeach
                        @else
                        	<li>
                                <article class="comment text-center dr">
                        			هنوز کامنتی اضافه نشده است.
                        		</article>
                        	</li>
                        </ul>
						@endif

						<div class="row text-center">
							<?php echo $comment->links(); ?>
						</div>
                    </div>
                </div>
            </div>
			<div class="gap gap-small"></div>
			<h3 class="mb20">Top Deals For You <small><a href="#">see all</a></small></h3>
			<div class="row row-wrap">
				<a class="col-md-4" href="#">
					<div class="product-thumb">
						<header class="product-header">
							<img src="offs/img/800x600.png" alt="Image Alternative text" title="Aspen Lounge Chair" />
						</header>
						<div class="product-inner">
							<ul class="icon-group icon-list-rating" title="3.3/5 rating">
								<li><i class="fa fa-star"></i>
								</li>
								<li><i class="fa fa-star"></i>
								</li>
								<li><i class="fa fa-star"></i>
								</li>
								<li><i class="fa fa-star-half-empty"></i>
								</li>
								<li><i class="fa fa-star-o"></i>
								</li>
							</ul>
							<h5 class="product-title">Aspen Lounge Chair</h5>
							<p class="product-desciption">Ipsum imperdiet tincidunt suspendisse facilisi urna amet ligula</p>
							<div class="product-meta">
								<ul class="product-price-list">
									<li><span class="product-price">$83</span>
									</li>
									<li><span class="product-old-price">$236</span>
									</li>
									<li><span class="product-save">Save 35%</span>
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
							<img src="offs/img/800x600.png" alt="Image Alternative text" title="Green Furniture" />
						</header>
						<div class="product-inner">
							<ul class="icon-group icon-list-rating" title="3.8/5 rating">
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
							</ul>
							<h5 class="product-title">Green Furniture Pack</h5>
							<p class="product-desciption">Ipsum imperdiet tincidunt suspendisse facilisi urna amet ligula</p>
							<div class="product-meta">
								<ul class="product-price-list">
									<li><span class="product-price">$63</span>
									</li>
									<li><span class="product-old-price">$185</span>
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
							<img src="offs/img/800x600.png" alt="Image Alternative text" title="cascada" />
						</header>
						<div class="product-inner">
							<ul class="icon-group icon-list-rating" title="3.4/5 rating">
								<li><i class="fa fa-star"></i>
								</li>
								<li><i class="fa fa-star"></i>
								</li>
								<li><i class="fa fa-star"></i>
								</li>
								<li><i class="fa fa-star-half-empty"></i>
								</li>
								<li><i class="fa fa-star-o"></i>
								</li>
							</ul>
							<h5 class="product-title">Adventure in Woods</h5>
							<p class="product-desciption">Ipsum imperdiet tincidunt suspendisse facilisi urna amet ligula</p>
							<div class="product-meta">
								<ul class="product-price-list">
									<li><span class="product-price">$135</span>
									</li>
									<li><span class="product-old-price">$276</span>
									</li>
									<li><span class="product-save">Save 49%</span>
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
	</div>
</div>
@endsection

<!-- javascript -->
@section('js')
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACVORBxInG9ZAYBw7MwKrDr0Nyc_T64ME&callback=initMap"
  type="text/javascript"></script>
<!--   176.58.100.68
 -->
<!-- lat
lng -->
<script>
	$(function(){
		console.log($('#lat').val());
	});
	function initMap() {
		var uluru = {lat: $('#lat').val(), lng: $('#lng').val()};
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 4,
			center: uluru
		});
		var marker = new google.maps.Marker({
			position: uluru,
			map: map
		});
	}
	function initialize(){
		var myLatlng = new google.maps.LatLng($('#lat').val(),$('#lng').val());
		var myOptions = {
			zoom: 4,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		map = new google.maps.Map(document.getElementById("map"), myOptions);
		var marker = new google.maps.Marker({
			position: myLatlng, 
			map: map,
			title:"Fast marker"
		});
	} 

	google.maps.event.addDomListener(window,'load', initialize);
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACVORBxInG9ZAYBw7MwKrDr0Nyc_T64ME&callback=initMap">
@endsection