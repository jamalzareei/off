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
				<li class="active"><a href="account/edit">ویرایش اطلاعات</a>
				</li>
				<!-- <li><a href="account/addressbook">آدرس</a>
				</li> -->
				<li><a href="account/orders">خرید های شما</a>
				</li>
				<li><a href="account/wishlist">مورد علاقه ها</a>
				</li>
			</ul>
		</aside>
	</div>
	<div class="col-md-9 pull-right">
		<div class="row">
			<div class="col-md-2 pull-right"></div>
			<div class="col-md-8 col-md-offset-2 pull-right">
				<form class="dialog-form" method="post" action="" id="formUpUser">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<legend class="text-center">ویرایش پروفایل کاربری</legend>
					<div class="row">
						<div class="col-md-5 pull-right">
							<div class="form-group">
								<label class="pull-right">نام</label>
								<input type="text" placeholder="نام" class="form-control text-right" name="firstname" value="{{$user->firstname}}">
							</div>
						</div>
						<div class="col-md-7 pull-right">
							<div class="form-group">
								<label class="pull-right">نام خانوادگی</label>
								<input type="text" placeholder="نام خانوادگی" class="form-control text-right" name="lastname" value="{{$user->lastname}}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull-right">
							<div class="form-group">
								<label class="pull-right">ایمیل</label>
								<input type="email" readonly="" placeholder="ایمیل: email@domain.com" class="form-control" name="email" value="{{$user->email}}">
							</div>
						</div>
						<div class="col-md-6 pull-right">
							<div class="form-group">
								<label class="pull-right">تلفن</label>
								<input type="tel" placeholder="تلفن: 09130000000" class="form-control" name="tell" value="{{$user->tell}}">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 pull-right">
							<div class="form-group">
								<label class="pull-right">
									<input type="radio" class="text-right pull-right" name="sex" value="male" @if($user->sex=='male') checked="checked" @endif> مذکر &nbsp;
								</label>
							</div>
						</div>
						<div class="col-md-3 pull-right">
							<div class="form-group">
								<label class="pull-right">
									<input type="radio" class="text-right pull-right" name="sex" value="famle" @if($user->sex=='famle') checked="checked" @endif> مونث &nbsp;
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="pull-right">
							<input type="checkbox" class="pull-right" name="get-offer" value="1" @if($user->get_offer==1) checked="checked" @endif> دریافت پیشنهادات سایت در ایمیل &nbsp;
						</label>
					</div>
					<br>
					<input type="submit" value="ثبت نام" class="btn btn-primary btn-block">
				</form>

			</div>
		</div>
		<div class="gap"></div>
	</div>
</div>
@endsection

<!-- javascript -->
@section('js')

@endsection