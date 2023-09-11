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
<style type="text/css">
	@import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700);
	/* written by riliwan balogun http://www.facebook.com/riliwan.rabo*/
	.board{
		width: 75%;
		margin: 60px auto;
		height: 500px;
		background: #fff;
		/*box-shadow: 10px 10px #ccc,-10px 20px #ddd;*/
	}
	.board .nav-tabs {
		position: relative;
		/* border-bottom: 0; */
		/* width: 80%; */
		margin: 40px auto;
		margin-bottom: 0;
		box-sizing: border-box;

	}

	.board > div.board-inner{
		background: #fafafa url(http://subtlepatterns.com/patterns/geometry2.png);
		background-size: 30%;
	}

	p.narrow{
		width: 60%;
		margin: 10px auto;
	}

	.liner{
		height: 2px;
		background: #ddd;
		position: absolute;
		width: 80%;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: 50%;
		z-index: 1;
	}

	.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
		color: #555555;
		cursor: default;
		/* background-color: #ffffff; */
		border: 0;
		border-bottom-color: transparent;
	}

	span.round-tabs{
		width: 70px;
		height: 70px;
		line-height: 70px;
		display: inline-block;
		border-radius: 100px;
		background: white;
		z-index: 2;
		position: absolute;
		left: 0;
		text-align: center;
		font-size: 25px;
	}

	span.round-tabs.one{
		color: rgb(34, 194, 34);border: 2px solid rgb(34, 194, 34);
	}

	li.active span.round-tabs.one{
		background: #fff !important;
		border: 2px solid #ddd;
		color: rgb(34, 194, 34);
	}

	span.round-tabs.two{
		color: #febe29;border: 2px solid #febe29;
	}

	li.active span.round-tabs.two{
		background: #fff !important;
		border: 2px solid #ddd;
		color: #febe29;
	}

	span.round-tabs.three{
		color: #3e5e9a;border: 2px solid #3e5e9a;
	}

	li.active span.round-tabs.three{
		background: #fff !important;
		border: 2px solid #ddd;
		color: #3e5e9a;
	}

	span.round-tabs.four{
		color: #f1685e;border: 2px solid #f1685e;
	}

	li.active span.round-tabs.four{
		background: #fff !important;
		border: 2px solid #ddd;
		color: #f1685e;
	}

	span.round-tabs.five{
		color: #999;border: 2px solid #999;
	}

	li.active span.round-tabs.five{
		background: #fff !important;
		border: 2px solid #ddd;
		color: #999;
	}

	.nav-tabs > li.active > a span.round-tabs{
		background: #fafafa;
	}
	.nav-tabs > li {
		width: 20%;
	}
/*li.active:before {
    content: " ";
    position: absolute;
    left: 45%;
    opacity:0;
    margin: 0 auto;
    bottom: -2px;
    border: 10px solid transparent;
    border-bottom-color: #fff;
    z-index: 1;
    transition:0.2s ease-in-out;
}*/
.nav-tabs > li:after {
	content: " ";
	position: absolute;
	left: 45%;
	opacity:0;
	margin: 0 auto;
	bottom: 0px;
	border: 5px solid transparent;
	border-bottom-color: #ddd;
	transition:0.1s ease-in-out;

}
.nav-tabs > li.active:after {
	content: " ";
	position: absolute;
	left: 45%;
	opacity:1;
	margin: 0 auto;
	bottom: 0px;
	border: 10px solid transparent;
	border-bottom-color: #ddd;

}
.nav-tabs > li a{
	width: 70px;
	height: 70px;
	margin: 20px auto;
	border-radius: 100%;
	padding: 0;
}

.nav-tabs > li a:hover{
	background: transparent;
}

.tab-content{
}
.tab-pane{
	position: relative;
	padding-top: 10px;
}
.tab-content .head{
	font-family: 'Roboto Condensed', sans-serif;
	font-size: 25px;
	text-transform: uppercase;
	padding-bottom: 10px;
}
.btn-outline-rounded{
	padding: 10px 40px;
	margin: 20px 0;
	border: 2px solid transparent;
	border-radius: 25px;
}

.btn.green{
	background-color:#5cb85c;
	/*border: 2px solid #5cb85c;*/
	color: #ffffff;
}



@media( max-width : 585px ){

	.board {
		width: 90%;
		height:auto !important;
	}
	span.round-tabs {
		font-size:16px;
		width: 50px;
		height: 50px;
		line-height: 50px;
	}
	.tab-content .head{
		font-size:20px;
	}
	.nav-tabs > li a {
		width: 50px;
		height: 50px;
		line-height:50px;
	}

	.nav-tabs > li.active:after {
		content: " ";
		position: absolute;
		left: 35%;
	}

	.btn-outline-rounded {
		padding:12px 20px;
	}
}
.nav-tabs>li>a>span>i{top:16px;}
.full-width{
    float:left;width:100%;min-height:30px;position:relative;
}
.form-style-fake{position:absolute;top:0px;}
.form-style-base{position:absolute;top:0px;z-index: 999;opacity: 0;}
.imgCircle{border-radius: 50%;}
.form-control{color: #797979;}
.form-input{height:30px;border-radius: 0px;}
.Profile-input-file{
    height:180px;width:180px;left:33%;
    position: absolute;
    top: 0px;
    z-index: 999;
    opacity: 0 !important;
}
.input-place{
    position: absolute;top:5px;left: 10px;font-size:17px;color:gray;}
/*====== style for placeholder ========*/

.form-control::-webkit-input-placeholder {
    color:lightgray;
}
.form-control:-moz-placeholder {
    color:lightgray;
}
.form-control::-moz-placeholder {
    color:lightgray;
}
.form-control:-ms-input-placeholder {
    color:lightgray;
}
#img-upload{
    width: 100%;
}
.btn-preview + .tooltip.fade.bottom .tooltip-inner{
	max-width: 500px !important;width: 320px !important;
}
/*form{ display: none; }*/
.table tbody > tr > td{
	font-size: 14px;
}
.btn-delete{font-size: 20px;}
</style>

     <link rel="stylesheet prefetch" href="{{{ asset('uploadajax/assets/dropzone.min.css') }}}">
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet"> -->
@endsection

<!-- content -->
@section('content')



<section style="background:#efefe9;">
	<div class="container">
		<div class="row">
			<div class="board">
				<!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
				<div class="board-inner">
					<ul class="nav nav-tabs" id="myTab">
						<div class="liner"></div>
						<li class="active">
							<a href="#addpost" data-toggle="tab" title="اضافه کردن پست">
								<span class="round-tabs one">
									<i class="glyphicon glyphicon-home"></i>
								</span> 
							</a>
						</li>
						<li>
							<a href="#details" data-toggle="tab" title="جزئیات">
								<span class="round-tabs two">
									<i class="glyphicon glyphicon-user"></i>
								</span> 
							</a>
						</li>
						<li>
							<a href="#upload" data-toggle="tab" title="اپلود عکس ها">
								<span class="round-tabs three">
									<i class="glyphicon glyphicon-gift"></i>
								</span> 
							</a>
						</li>
						<li>
							<a href="#property" data-toggle="tab" title="پراپرتی">
								<span class="round-tabs four">
									<i class="glyphicon glyphicon-comment"></i>
								</span> 
							</a>
						</li>
						<li>
							<a href="#doner" data-toggle="tab" title="پایان">
								<span class="round-tabs five">
									<i class="glyphicon glyphicon-ok"></i>
								</span> 
							</a>
						</li>

					</ul></div>

					<div class="tab-content">
						<div class="tab-pane fade in active" id="addpost">
							
							<h3 class="head text-center">ایجاد تخفیف<sup>جدید</sup> محصول یا ...</h3>
							<p class="narrow text-center">
								شما از این قسمت میتوانید محصول تخفیفی خود را اضافه نمایید.<br><br>
								برای شروع نام انتخابی تخفیف را وارد و کلید ایجاد تخفیف را کلیک نمایید.
							</p>
							<div class=" col-md-12 form-group">
							@if(!isset($product))
								<input type="text" name="title" data-id="0" id="title-addpost" placeholder="نام تخفیف خود را وارد نمایید ..." class="form-control title-addpost round-input">
							@else
								<input type="text" value="{{$product->name_product}}" data-id="{{$product->id_product}}" name="title" id="title-addpost" placeholder="نام تخفیف خود را وارد نمایید ..." class="form-control title-addpost round-input">
							@endif								
							</div>
							@if(isset($typeoff))
								<div class="col-md-12">
									<select class="form-control m-bot15 m-top15" id="typeoff" style="padding: 0 10px">
										<option value="1">انتخاب نمایید ...</option>
										@foreach($typeoff as $type)
		                                	<option @if(isset($product)) @if($product->id_typeoff==$type->id_typeoff) selected @endif @endif value="{{$type->id_typeoff}}">{{$type->name_typeoff}}</option>
		                                @endforeach
		                            </select>
								</div>
	                        @endif
							<p class="text-center">
								<a id="addpost" onclick="addpost()" class="btn btn-success btn-outline-rounded green">
								 ایجاد تخفیف جدید <i class="glyphicon glyphicon-edit"></i>
								 </a>
							</p>
	                        <div class="col-md-12 alert-addpost" style="display: none">
	                        	<div class="alert alert-success alert-block fade in">
                                    اطلاعات با موفقیت ارسال شدند.
                                </div>
	                        </div>
						</div>
						<div class="tab-pane fade" id="details">
							<div class="panel-group" id="accordion">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true">
												جزئیات محصول
											</a>
										</h3>
									</div>
									<div id="collapse-1" class="panel-collapse collapse in" aria-expanded="true">
										<form class="form-post" id="product" method="post" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<input type="hidden" name="id_product" class="id-product form-control hidden" @if(isset($product->id_product)) value="{{$product->id_product}}" @endif>
											<div class="panel-body">
												<div class="col-md-9 form-group">
													<div class="full-width">
												        <input type="file" name="file-main" id="base-input" class="form-control form-input form-style-base">
												        <input type="text" id="fake-input" class="form-control form-input form-style-fake" placeholder="Choose your File" readonly="" name="fake-file" value="@if(isset($product->photo)) {{$product->photo}} @else @endif">
												        <span class="glyphicon glyphicon-open input-place"></span>
												    </div>
												    <img class="hidden" id='img-upload' rel='tooltip' data-original-title='یش نمایش'/>
												</div>

												<div class="col-md-3 form-group">
													<button type="button" class="btn btn-danger btn-preview" data-toggle="tooltip" title="" data-original-title="@if(isset($product->photo)) <img src='uploadajax/{{$product->photo}}' width='300' /> @endif">
														<i class="glyphicon glyphicon-eye-open"></i> پیش نمایش
													</button>
												</div>
												<hr>
												<div class="col-md-12 form-group">
													<textarea name="detail-product" class="form-control" rows="8" style="max-width: 100%;">@if(isset($product->details)) {{$product->details}} @endif</textarea>
												</div>
											</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-sm btn-info btn-product">
													ارسال اطلاعات و ذخیره	
												</button>
											</div>

					                        <div class="col-md-12 alert-product" style="display: none">
					                        	<div class="alert alert-success alert-block fade in">
				                                    اطلاعات با موفقیت ارسال شدند.
				                                </div>
					                        </div>
										</form>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">
											<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="false">
												تاریخ شروع و پایان
											</a>
										</h3>
									</div>
									<div id="collapse-2" class="panel-collapse collapse" aria-expanded="false">
										<form class="form-post" id="date" method="post" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<input type="hidden" name="id_product" class="id-product form-control hidden" @if(isset($product->id_product)) value="{{$product->id_product}}" @endif>
											<div class="panel-body">
												<div class="row">
													<div class="col-sm-6 form-group">
														<label for="dateStart">تاریخ شروع تخفیف</label>
														<input name="dateStart" type="text" placeholder="date start" id="dateStart" class="sample-input form-control text-left" dir="ltr" @if(isset($date->date_start_fa)) value="{{$date->date_start_fa}}" @endif />
														<input name="dateStart-milad" type="hidden" id="dateStart-milad" class="sample-input form-control text-left" dir="ltr" @if(isset($date->date_start)) value="{{$date->date_start}}" @endif />
													</div>
													<div class="col-sm-6 form-group">
														<label for="dateEnd">تاریخ پایان تخفیف</label>
														<input name="dateEnd" type="text" placeholder="date end" id="dateEnd" class="sample-input form-control text-left" dir="ltr" @if(isset($date->date_end_fa)) value="{{$date->date_end_fa}}" @endif />
														<input name="dateEnd-milad1" type="hidden" id="dateEnd-milad1" class="sample-input form-control text-left" dir="ltr" @if(isset($date->date_one)) value="{{$date->date_one}}" @endif />
														<input name="dateEnd-milad2" type="hidden" id="dateEnd-milad2" class="sample-input form-control text-left" dir="ltr" @if(isset($date->date_two)) value="{{$date->date_two}}" @endif />
													</div>
												</div>
											</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-sm btn-info btn-date">
													ثبت تاریخ
												</button>
											</div>
					                        <div class="col-md-12 alert-date" style="display: none">
					                        	<div class="alert alert-success alert-block fade in">
				                                    تاریخ با موفقیت اضافه شد.
				                                </div>
					                        </div>
										</form>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">
											<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="false">
												قیمت اصلی و تخفیف
											</a>
										</h3>
									</div>
									<div id="collapse-3" class="panel-collapse collapse" aria-expanded="false">
										<form class="form-post" id="price" method="post" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<input type="hidden" name="id_product" class="id-product form-control hidden" @if(isset($product->id_product)) value="{{$product->id_product}}" @endif>
											<div class="panel-body">
												<div class="col-md-4 form-group">
													<label for="main-price">قیمت اصلی (تومان)</label>
													<input type="text" @if(isset($price->main_price)) value="{{$price->main_price}}" @else value="0" @endif name="main-price" placeholder="قیمت اصلی" id="main-price" class="form-control">
												</div>
												<div class="col-md-4 form-group">
													<label for="discount-price">قیمت با تخفیف (تومان)</label>
													<input type="text" @if(isset($price->discount_price)) value="{{$price->discount_price}}" @else value="0" @endif name="discount-price" placeholder="قیمت با تخفیف" id="discount-price" class="form-control">
												</div>
												<div class="col-md-4 form-group">
													<label for="discount-percent">درصد تخفیف (%)</label>
													<input type="text" @if(isset($price->discount_percent)) value="{{$price->discount_percent}}" @else value="0" @endif name="discount-percent" placeholder="درصد تخفیف" id="discount-percent" class="form-control" readonly="true">
												</div>
											</div>
											<div class="panel-footer">												
												<button type="submit" class="btn btn-sm btn-info btn-date">
													ثبت تاریخ
												</button>
											</div>
					                        <div class="col-md-12 alert-price" style="display: none">
					                        	<div class="alert alert-success alert-block fade in">
				                                    قیمت با موفقیت بروز شد.
				                                </div>
					                        </div>
										</form>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">
											<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-4" aria-expanded="false">
												اطلاعات فروشنده
											</a>
										</h3>
									</div>
									<div id="collapse-4" class="panel-collapse collapse" aria-expanded="false">
										<form class="form-post" id="seller" method="post" enctype="multipart/form-data">
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<input type="hidden" name="id_product" class="id-product form-control hidden" @if(isset($product->id_product)) value="{{$product->id_product}}" @endif>
											<div class="panel-body">
												<div class="col-md-12 form-group">
													<label for="name-seller">نام فروشنده</label>
													<input type="text" placeholder="نام فروشنده" name="name-seller" class="form-control" id="name-seller" @if(isset($seller->name_seller)) value="{{$seller->name_seller}}" @endif>
												</div>
												<div class="col-md-12 form-group">
													<label for="address-seller">آدرس فروشنده</label>
													<textarea placeholder="آدرس فروشنده" name="address-seller" class="form-control" id="address-seller" rows="3"> @if(isset($seller->address_seller)) {{$seller->address_seller}} @endif</textarea>
												</div>
												<div class="row">
													<div class="col-md-6 form-group">
														<label for="latitude-seller">عرض جغرافیایی</label>
														<input type="text" placeholder="عرض جغرافیایی" name="latitude" class="form-control" id="latitude-seller" @if(isset($seller->latitude)) value="{{$seller->latitude}}" @endif>
													</div>
													<div class="col-md-6 form-group">
														<label for="longitude-seller">طول جغرافیایی</label>
														<input type="text" placeholder="طول جغرافیایی" name="longitude" class="form-control" id="longitude-seller" @if(isset($seller->longitude)) value="{{$seller->longitude}}" @endif>
													</div>
												</div>
												<div class="col-md-12 form-group">
													<label for="map-seller">جستجوی نام روی نقشه</label>
													<input type="text" placeholder="جستجوی نام روی نقشه" name="address-map" class="form-control" id="map-seller" @if(isset($seller->address_map)) value="{{$seller->address_map}}" @endif>
												</div>
												<div class="col-md-12">
													<input type="hidden" id="us2-radius"/>
													<div id="us2" style="width: 100%; height: 400px;"></div>
												</div>
											</div>
											<div class="panel-footer">
												<button type="submit" class="btn btn-sm btn-info btn-date">
													اضافه کردن فروشنده
												</button>
											</div>
					                        <div class="col-md-12 alert-seller" style="display: none">
					                        	<div class="alert alert-success alert-block fade in">
				                                    فروشنده با موفقیت اضافه شد.
				                                </div>
					                        </div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="upload">
							<h3 class="head text-center">آپلود عکس های هر تخفیف</h3>
							<p class="narrow text-center">
								عکس های خود را از قسمت زیر انتخاب نمایید.
								<br>
								با قابلیت درگ اند دراپ
							</p>
							@if(isset($photo))
							<div class="panel-body">
								<div class="row">
								@foreach($photo as $path)
									<div class="col-md-2" id="row-photo-{{$path->id_photo}}">
		                                <button class="close close-sm" type="button" onclick="deletephoto({{$path->id_photo}})">
		                                    <i class="icon-remove"></i>
		                                </button>
		                                <img src="uploadajax/{{$path->path_photo}}" width="100%" height="100">
									</div>
								@endforeach
								</div>
							</div>
							@endif
							<form action="upload" method="post" class="dropzone" id="image-upload">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="hidden" name="id_product" class="id-product form-control hidden" @if(isset($product->id_product)) value="{{$product->id_product}}" @endif>
							</form>
						</div>
						<div class="tab-pane fade" id="property">
							<!-- <h3 class="head text-center">Drop comments!</h3>
							<p class="narrow text-center">
								Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
							</p>

							<p class="text-center">
								<a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
							</p> -->
							<div class="col-md-12">
	                            <table class="table table-striped table-advance table-hover">
	                            	<thead>
		                            	<tr>
		                            		<th>#</th>
		                            		<th>پراپرتی</th>
		                            		<th>جواب پراپرتی</th>
		                            		<td>#</td>
		                            	</tr>
		                            	<tr>
		                            		<form id="property" class="" role="form" method="post">
		                            			<input type="hidden" name="_token" value="{{csrf_token()}}">
												<input type="hidden" name="id_product" class="id-product form-control hidden" @if(isset($product->id_product)) value="{{$product->id_product}}" @endif>	                            											
			                            		<td>
			                            			<input type="text" name="question-property" class="form-control" id="question-property" placeholder="مثال: وزن یا مدل ...">
			                            		</td>
			                            		<td>
			                            			<input type="text" name="answer-property" class="form-control" id="answer-property" placeholder="مثال: 50 کیلو یا قرمز ...">
			                            		</td>
			                            		<td>
			                            			<button type="submit" class="btn btn-sm btn-info btn-product">
														<i class="glyphicon glyphicon-plus"></i>&nbsp اضافه کردن
													</button>
			                            		</td>
		                            		</form>
		                            	</tr>
	                            	</thead>
	                            	<tbody id="row-property">
		                            	@if(isset($property))
		                            	@foreach($property as $prop)
		                            	<tr id="row-property-{{$prop->id_property}}">
			                            	<td>{{$prop->question_property}}</td>
			                            	<td>{{$prop->answer_property}}</td>
			                            	<td>
			                            		<i class="btn-delete glyphicon glyphicon-minus-sign text-danger" onclick="delete_property({{$prop->id_property}})" id="{{$prop->id_property}}"></i>
			                            	</td>
		                            	</tr>
		                            	@endforeach
		                            	@endif
		                            	<!-- <tr>
		                            		<td>پراپرتی</td>
		                            		<td>جواب پراپرتی</td>
		                            		<td>
		                            			<i class="btn-delete glyphicon glyphicon-minus-sign text-danger" id="1"></i>
		                            		</td>
		                            	</tr> -->	                            		
	                            	</tbody>
	                            </table>								
							</div>
						</div>
						<div class="tab-pane fade" id="doner">
							<h3 class="head text-center">تخفیف شما تکمیل و در پیش نویس ها ذخیره گردید</h3>
							<p class="narrow text-center">
								برای نهایی کردن تخفیف و انتشار آن دکمه زیر را کلیک نمایید.
							</p>
							<form id="publish" class="" role="form" method="post">
                    			<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="hidden" name="id_product" class="id-product form-control hidden" @if(isset($product->id_product)) value="{{$product->id_product}}" @endif>	                            											
                        		<hr>
                        		<div class="col-md-4 col-md-offset-4">
	                    			<button type="submit" class="btn btn-success btn-block">
										<i class="glyphicon glyphicon-send"></i>&nbsp انتشار
									</button>
                        		</div>
		                        <div class="col-md-12 alert-publish" style="display: none">
		                        	<div class="alert alert-success alert-block fade in">
		                        		<button data-dismiss="alert" class="close close-sm" type="button">
		                        			<i class="icon-remove"></i>
		                        		</button>
	                                    تخفیف با موفقیت تکمیل و ارسال گردید.
	                                </div>
		                        </div>
                    		</form>
						</div>
						<div class="clearfix"></div>
					</div>

				</div>
			</div>
		</div>
	</section>

	@endsection

	<!-- javascript -->
	@section('js')


	<!-- <script src="uploadajax/assets/dropzone.js"></script> -->
	<!-- <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyDrSXuiTAy-W6eDj-AnPIpGAS8SUHnapWI'></script> -->
	<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyDrSXuiTAy-W6eDj-AnPIpGAS8SUHnapWI'></script>
	<script src="location/dist/locationpicker.jquery.js"></script>						    
	<script>
		$('#us2').locationpicker({
			location: {latitude: 30.683743, longitude: 51.5252719},
			radius: 300,
			//markerIcon: 'http://www.iconsdb.com/icons/preview/tropical-blue/map-marker-2-xl.png',// ایکون سایت گذاشته شود
			inputBinding: {
		        latitudeInput: $('#latitude-seller'),
		        longitudeInput: $('#longitude-seller'),
		        radiusInput: $('#us2-radius'),
		        locationNameInput: $('#map-seller')
		    }
		});
	</script>
	
    <script src="{{{ asset('uploadajax/assets/dropzone.js') }}}"></script>
	<script type="text/javascript">
		$(function(){
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$('a[title]').tooltip();
			$("[rel=tooltip]").tooltip({html:true});
			$('[data-toggle=tooltip]').tooltip({
			    animated: 'fade',
			    placement: 'bottom',
			    html: true
			});

			// $("#dateStart").pDatepicker();
			// $("#dateEnd").pDatepicker();
			// $("#dateStart, #dateEnd").persianDatepicker(); 
			// $("#dateStart, #dateEnd").persianDatepicker(); 
			var pd = new persianDate();
			var jdf = new jDateFunctions();
			//May 30, 2017 13:30:00
			$("#dateStart").persianDatepicker({
		        formatDate: "YYYY-0M-0D hh:mm:ss",
        		cellWidth: 50, 
			    cellHeight: 20,
			    fontSize: 12,
			    onSelect: function () {
			    	var data=$('#dateStart').val();
			    	var arr_ = data.split(' ');
			    	var arr = arr_[0].split('-');
		            pd.year = parseInt(arr[0]);
		            pd.month = parseInt(arr[1]);
		            pd.date = parseInt(arr[2]);
		            $('#dateStart-milad').val(jdf.getGDate(pd)._toString("YYYY-0M-0D hh:mm:ss"));
		            // alert();

		        }
		    });
			$("#dateEnd").persianDatepicker({
		        formatDate: "YYYY-0M-0D hh:mm:ss",
        		cellWidth: 50, 
			    cellHeight: 20,
			    fontSize: 12,
			    onSelect: function () {
			    	var data=$('#dateEnd').val();
			    	var arr_ = data.split(' ');
			    	var arr = arr_[0].split('-');
		            pd.year = parseInt(arr[0]);
		            pd.month = parseInt(arr[1]);
		            pd.date = parseInt(arr[2]);
		            $('#dateEnd-milad1').val(jdf.getGDate(pd)._toString("NM DD, YYYY ")+arr_[1]);
		            $('#dateEnd-milad2').val(jdf.getGDate(pd)._toString("YYYY-0M-0D ")+arr_[1]);

		        }
		    });
		    
		    $('#main-price').keyup(function(){
		    	var price_main=$(this).val()*1;
		    	var dis_price=$('#discount-price').val()*1;
		    	percent_=100-[(dis_price*100)/price_main];
		    	$('#discount-percent').val(percent_);
		    });
		    $('#discount-price').keyup(function(){
		    	var dis_price=$(this).val()*1;
		    	var price_main=$('#main-price').val()*1;
		    	percent_=100-[(dis_price*100)/price_main];
		    	$('#discount-percent').val(percent_);
		    });


			product();
			date();
			price();
			seller();
			property();
			publish();
		});

		// function showConverted() {
	 //        try{
	 //            var pd = new persianDate();
	 //            pd.year = parseInt($("#year").val());
	 //            pd.month = parseInt($("#month").val());
	 //            pd.date = parseInt($("#day").val());
	                                       
	 //            var jdf = new jDateFunctions();
	 //            $("#converted").html("Gregorian :  " + jdf.getGDate(pd)._toString("YYYY/MM/DD") + "     [" + jdf.getGDate(pd) + "]Julian:  " + jdf.getJulianDayFromPersian(pd));
	 //        } catch (e) {
	 //            $("#converted").html("Enter the year correctly!");
	 //        }
	 //    }

		Dropzone.options.imageUpload = {
			maxFilesize         :       1,
			acceptedFiles: ".jpeg,.jpg,.png,.gif"
		};
		$('input[id=base-input]').change(function() {
	        $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
	        readURL(this);
	    });



		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		            $('.btn-preview').attr('data-original-title','<img src="'+e.target.result+'"  width="300"/>');
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		function addpost(){
			var _token= $('meta[name="csrf-token"]').attr('content');
			var title= $('#title-addpost').val();
			var id= $('#title-addpost').data('id');
			var id_typeoff=$("#typeoff option:selected").val();
			$('body').find('a#addpost').append(' <i class="fa fa-spinner fa-spin fa-product"></i>');
			// alert(id_typeoff);
			$('.alert-addpost').fadeOut();
			$.ajax({
				type: 'POST',
				url: 'admin/masoud/addpost',
				data: {'_token': _token,name_product:title,id_product:id,id_typeoff:id_typeoff},
				success: function(data){
					console.log(data);
					$('.id-product').val(data);
					$('form').css({"display":"block"});
				    $('.fa-product').remove();
				    $('.alert-addpost').fadeIn();
				}
			});
		}

		function product(){
			$("form#product").submit(function(e) {
				e.preventDefault();
				$(this).find('[type=submit]').append(' <i class="fa fa-spinner fa-spin fa-product"></i>');
				var formData= new FormData(this);
				$('.alert-product').hide();
				$.ajax({
				    url: "admin/masoud/updateproduct", 
				    type: "POST",             
				    data: formData,
				    contentType: false,
				    cache: false,
				    processData:false,
				    dataType: 'html',
				    success: function(data) {
				        console.log(data);
				        $('.fa-product').remove();
				    	$('.alert-product').show();
				    }
				});
				return false;

			});
		}

		function date(){
			$("form#date").submit(function(e) {
				e.preventDefault();
				$(this).find('[type=submit]').append(' <i class="fa fa-spinner fa-spin fa-product"></i>');
				var formData= new FormData(this);
				$('.alert-date').hide();
				$.ajax({
				    url: "admin/masoud/insertdate", 
				    type: "POST",             
				    data: formData,
				    contentType: false,
				    cache: false,
				    processData:false,
				    dataType: 'html',
				    success: function(data) {
				        console.log(data);
				        $('.fa-product').remove();
				    	$('.alert-date').show();
				    }
				});
				return false;
			});
		}

		function price(){
			$("form#price").submit(function(e) {
				e.preventDefault();
				// alert('jamal');
				$(this).find('[type=submit]').append(' <i class="fa fa-spinner fa-spin fa-product"></i>');
				var formData= new FormData(this);
				$('.alert-price').hide();
				$.ajax({
				    url: "admin/masoud/insertprice", 
				    type: "POST",             
				    data: formData,
				    contentType: false,
				    cache: false,
				    processData:false,
				    dataType: 'html',
				    success: function(data) {
				        console.log(data);
				        $('.fa-product').remove();
				    	$('.alert-price').show();
				    }
				});
				return false;
			});
		}

		function seller(){
			$("form#seller").submit(function(e) {
				e.preventDefault();
				// alert('jamal');
				$(this).find('[type=submit]').append(' <i class="fa fa-spinner fa-spin fa-product"></i>');
				var formData= new FormData(this);
				$('.alert-seller').hide();
				$.ajax({
				    url: "admin/masoud/insertseller", 
				    type: "POST",             
				    data: formData,
				    contentType: false,
				    cache: false,
				    processData:false,
				    dataType: 'html',
				    success: function(data) {
				        console.log(data);
				        $('.fa-product').remove();
				    	$('.alert-seller').show();
				    }
				});
				return false;
			});
		}


		function property(){
			$("form#property").submit(function(e) {
				e.preventDefault();
				// alert('jamal');
				$(this).find('[type=submit]').append(' <i class="fa fa-spinner fa-spin fa-product"></i>');
				var formData= new FormData(this);
				$.ajax({
				    url: "admin/masoud/insertproperty", 
				    type: "POST",
				    data: formData,
				    contentType: false,
				    cache: false,
				    processData:false,
				    dataType: 'html',
				    success: function(data) {
				    	var d=JSON.parse(data);
				        // console.log(d.id_property);
				        var append='<tr id="row-property-'+d.id_property+'">'+
                    		'<td>'+d.question_property+'</td>'+
                    		'<td>'+d.answer_property+'</td>'+
                    		'<td>'+
                            '<i class="btn-delete glyphicon glyphicon-minus-sign text-danger"'+
                            ' id="'+d.id_property+'" onclick="delete_property('+d.id_property+')"></i>'+
                            '</td>'+
                            '</tr>';
                        $('#row-property').prepend(append);
				        $('.fa-product').remove();
				    }
				});
				return false;
			});
		}

		function delete_property(id){
			var _token= $('meta[name="csrf-token"]').attr('content');
			// alert(id);
			$.ajax({
				type: 'POST',
				url: 'admin/masoud/deleteproperty',
				data: {'_token': _token,id_property:id},
				success: function(data){
					console.log(data);
					$('#row-property-'+data).fadeOut().remove();
				}
			});
		}


		function publish(){
			$("form#publish").submit(function(e) {
				e.preventDefault();
				// alert('jamal');
				$(this).find('[type=submit]').append(' <i class="fa fa-spinner fa-spin fa-product"></i>');
				var formData= new FormData(this);
				$('.alert-publish').hide();
				$.ajax({
				    url: "admin/masoud/publish", 
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

		function deletephoto(id){
			var _token= $('meta[name="csrf-token"]').attr('content');
			// alert(id);
			$.ajax({
				type: 'POST',
				url: 'admin/masoud/deletephoto',
				data: {'_token': _token,id_photo:id},
				success: function(data){
					console.log(data);
					$('#row-photo-'+data).fadeOut().remove();
				}
			});
		}

	</script>


	@endsection