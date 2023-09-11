<?php 
    $user='';
    if(Cookie::get('email')){
        $user=\App\models\User::user(Cookie::get('email'));
    }
?>
<!DOCTYPE html>
<html>
<head>
	<base href="/off/public/">
	<title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- meta info -->
 <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
 <meta name="keywords" content="@yield('keywords')" />
 <meta name="description" content="@yield('description')">
 <meta name="author" content="J.Zareie">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Google fonts -->
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>


 <link rel="stylesheet prefetch" href="{{{ asset('offs/css/boostrap.css') }}}">
 <link rel="stylesheet prefetch" href="{{{ asset('offs/css/font_awesome.css') }}}">
 <link rel="stylesheet prefetch" href="{{{ asset('icon/css/font-awesome.min.css') }}}">
 <link rel="stylesheet prefetch" href="{{{ asset('offs/css/ie.css') }}}">
 <link rel="stylesheet prefetch" href="{{{ asset('offs/css/styles.css') }}}">
 <link rel="stylesheet prefetch" href="{{{ asset('offs/css/mystyles.css') }}}">
 <link rel="stylesheet prefetch" href="{{{ asset('offs/css/toastr.css') }}}">

<style type="text/css">
    .dr{
        direction: rtl;
    }
</style>
@yield('css')
<!-- <link rel="shortcut icon" href="{{{ asset('images/logo1.ico') }}}" type="image/x-icon"> -->

</head>
<body>
	<div class="global-wrap">
        <!-- //////////////////////////////////
    	//////////////MAIN HEADER///////////// 
    	////////////////////////////////////-->
        <!-- ///////////////////////////////// -->
        <div class="top-main-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-md-offset-4 pull-right">
                        <a href="index.html" class="logo mt5">
                            <img src="offs/img/logo-small-dark.png" alt="Image Alternative text" title="Image Title" />
                        </a>
                    </div>
                    <div class="col-md-6 pull-right">
                        <div class="pull-left">
                            @if(Cookie::get('email') && $user)
                            <ul class="login-register nav-user">
                                <li><a class="-text" href="logout"><strong>خروج</strong><i class="fa fa-sign-out"></i></a>
                                </li>
                                <!-- <li class=""><a href="account/edit" data-effect="mfp-move-from-top"><strong>سلام {{$user->firstname}}</strong><i class="fa fa-user"></i></a>
                                    
                                </li> -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong>سلام {{$user->firstname}} </strong><i class="fa fa-user"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="account/edit">ویرایش اطلاعات <span class="fa fa-cog pull-right"></span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="account/orders">خرید های شما <span class="fa fa-credit-card-alt pull-right"></span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="account/wishlist">مورد علاقه ها <span class="fa fa-heart pull-right"></span></a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">خروج <span class="fa fa-sign-out pull-right"></span></a></li>
                                    </ul>
                                </li>
                                <li class="shopping-cart shopping-cart-white bold"><a href="card"><strong>سبد من</strong><i class="fa fa-shopping-cart"></i></a>
                                    <div class="shopping-cart-box">
                                        <ul class="shopping-cart-items text-right">
                                            <?php $card_user=\App\models\Card::getCardUser($user->id_user); ?>
                                            @if($card_user)
                                            @foreach($card_user as $card)
                                            <li>
                                                <a href="product/{{$card->id_product}}/{{str_replace(' ','-',$card->name_product)}}">
                                                    <img src="uploadajax/{{$card->photo}}" alt="{{$card->details}}" title="{{$card->name_product}}" />
                                                    <h5><strong>{{$card->name_product}}</strong></h5>
                                                </a>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                        <ul class="list-inline text-center">
                                            <li><a href="card"><i class="fa fa-shopping-cart pull-right"></i> سبد خرید</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            @else
                            <ul class="login-register">
                                <li><a class="popup-text" href="#register-dialog" data-effect="mfp-move-from-top"><strong>ثبت نام</strong><i class="fa fa-edit"></i></a>
                                </li>
                                <li><a class="popup-text" href="#login-dialog" data-effect="mfp-move-from-top"><strong>ورود</strong><i class="fa fa-sign-in"></i></a>
                                </li>
                                <li class="shopping-cart shopping-cart-white bold"><a href="card"><strong>سبد من</strong><i class="fa fa-shopping-cart"></i></a>
                                    <div class="shopping-cart-box">
                                        <ul class="shopping-cart-items text-right">
                                            <?php
                                            if(Cookie::get('cookie_ip')){
                                                $card_user=\App\models\Card::getCardCookie(Cookie::get('cookie_ip'));
                                            }
                                             ?>
                                            @if($card_user)
                                            @foreach($card_user as $card)
                                            <li>
                                                <a href="product/{{$card->id_product}}/{{str_replace(' ','-',$card->name_product)}}">
                                                    <img src="uploadajax/{{$card->photo}}" alt="{{$card->details}}" title="{{$card->name_product}}" />
                                                    <h5><strong>{{$card->name_product}}</strong></h5>
                                                </a>
                                            </li>
                                            @endforeach
                                            @endif
                                        </ul>
                                        <ul class="list-inline text-center">
                                            <li><a href="card"><i class="fa fa-shopping-cart pull-right"></i> سبد خرید</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('header')

        <!-- LOGIN REGISTER LINKS CONTENT -->
        <div id="login-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
            <i class="fa fa-sign-in dialog-icon"></i>
            <h3 class="text-right">ورود به حساب کاربری</h3>
            <h5 class="text-right">وارد حساب خود شوید و از امکانات سایت استفاده نمایید.</h5>
            <form class="dialog-form" method="post" action="login">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label class="pull-right">ایمیل</label>
                    <input type="email" placeholder="E-mail: admin@domain.com" class="form-control" name="email-login" value="<?php echo old('email-login') ?>">
                            <?php if($errors->has('email-login')){
                                echo '<p class="text-danger text-right f-yekan">'
                                . $errors->first('email-login') .'</p>';
                            } ?>
                </div>
                <div class="form-group">
                    <label class="pull-right">رمز عبور</label>
                    <input type="password" placeholder="رمز عبور: Aa123456" class="form-control" name="password-login" value="<?php echo old('password-login') ?>">
                        <?php if($errors->has('password-login')){
                            echo '<p class="text-danger text-right f-yekan">'
                                . $errors->first('password-login') .'</p>';
                        } ?>
                </div>
                <div class="form-group">
                    <label class="pull-right">
                        <input type="checkbox" class="pull-right" name="remember" value="<?php echo old('remember') ?>"> ذخیره رمز عبور &nbsp
                    </label>
                </div>
                <br>
                <input type="submit" value="ورود به حساب کاربری" class="btn btn-primary btn-block">
            </form>
            <hr>
            <ul class="dialog-alt-links">
                <li><a class="popup-text" dir="rtl" href="#register-dialog" data-effect="mfp-zoom-out">هنوز ثبت نام نکرده اید</a>
                </li>
                <li><a class="popup-text" dir="rtl" href="#password-recover-dialog" data-effect="mfp-zoom-out">فراموشی رمز عبور!</a>
                </li>
            </ul>
        </div>
        <div id="register-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
            <i class="fa fa-edit dialog-icon"></i>
            <h3 class="text-right">ثبت نام</h3>
            <h5 class="text-right">میخواهید از پیشنهادات جدید سایت با خبر بشید و از امکانات سایت استفاده کنید؟ </h5>
            <form class="dialog-form" method="post" action="register">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-md-5 pull-right">
                        <div class="form-group">
                            <!-- <label class="pull-right">نام</label> -->
                            <input type="text" placeholder="نام" class="form-control text-right" name="firstname" value="<?php echo old('firstname') ?>">
                            <?php if($errors->has('firstname')){
                                echo '<p class="text-danger text-right f-yekan">'
                                . $errors->first('firstname') .'</p>';
                            } ?>
                        </div>
                    </div>
                    <div class="col-md-7 pull-right">
                        <div class="form-group">
                            <!-- <label class="pull-right">نام خانوادگی</label> -->
                            <input type="text" placeholder="نام خانوادگی" class="form-control text-right" name="lastname" value="<?php echo old('lastname') ?>">
                            <?php if($errors->has('lastname')){
                                echo '<p class="text-danger text-right f-yekan">'
                                . $errors->first('lastname') .'</p>';
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label class="pull-right">ایمیل</label> -->
                    <input type="email" placeholder="ایمیل: email@domain.com" class="form-control" name="email" value="<?php echo old('email') ?>">
                    <?php if($errors->has('email')){
                        echo '<p class="text-danger text-right f-yekan">'
                        . $errors->first('email') .'</p>';
                    } ?>
                </div>
                <div class="form-group">
                    <!-- <label class="pull-right">تلفن</label> -->
                    <input type="tel" placeholder="تلفن: 09130000000" class="form-control" name="tell" value="<?php echo old('tell') ?>">
                    <?php if($errors->has('tell')){
                        echo '<p class="text-danger text-right f-yekan">'
                        . $errors->first('tell') .'</p>';
                    } ?>
                </div>
                <div class="row">
                    <div class="col-md-3 pull-right">
                        <div class="form-group">
                            <label class="pull-right">
                            <input type="radio" class="text-right pull-right" name="sex" value="male" checked> مذکر &nbsp
                            <?php if($errors->has('firstname')){
                                echo '<p class="text-danger text-right f-yekan">'
                                . $errors->first('firstname') .'</p>';
                            } ?>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 pull-right">
                        <div class="form-group">
                            <label class="pull-right">
                            <input type="radio" class="text-right pull-right" name="sex" value="famel"> مونث &nbsp
                            <?php if($errors->has('lastname')){
                                echo '<p class="text-danger text-right f-yekan">'
                                . $errors->first('lastname') .'</p>';
                            } ?>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="pull-right">
                        <input type="checkbox" class="pull-right" name="get-offer" value="<?php echo old('get-offer') ?>"> دریافت پیشنهادات سایت در ایمیل &nbsp
                    </label>
             </div>
             <br>
             <input type="submit" value="ثبت نام" class="btn btn-primary btn-block">
         </form>
         <hr>
         <ul class="dialog-alt-links">
            <li>
            <a class="popup-text" href="#login-dialog" data-effect="mfp-zoom-out">
                <label>قبلا ثبت نام کرده ام</label>
            </a>
            </li>
        </ul>
    </div>
    <div id="password-recover-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
        <i class="icon-retweet dialog-icon"></i>
        <h3 class="text-right" dir="rtl">بازیابی رمز عبور</h3>
        <h5 class="text-right" dir="rtl">رمز عبور خود را با وارد کردن ایمیل خود بازیابی نمایید.</h5>
        <form class="dialog-form" method="post" action="password-forget">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label class="pull-right">ایمیل</label>
            <input type="email" placeholder="E-mail: admin@domain.com" class="form-control" name="email-forget" value="<?php echo old('email-forget') ?>">
                        <?php if($errors->has('email-forget')){
                            echo '<p class="text-danger text-right f-yekan">'
                                . $errors->first('email-forget') .'</p>';
                        } ?>
            <input type="submit" value="درخواست بازیابی رمز عبور" class="btn btn-primary btn-block">
        </form>
    </div>
    <!-- END LOGIN REGISTER LINKS CONTENT -->
    <!-- SEARCH AREA -->

            @yield('_master')
		<!-- //////////////////////////////////
		//////////////MAIN FOOTER////////////// 
		////////////////////////////////////-->
                <!-- //////////////////////////////////
        //////////////MAIN FOOTER////////////// 
        ////////////////////////////////////-->
        <footer class="main">
            <div class="footer-top-area">
                <div class="container">
                    <div class="row row-wrap">
                        <div class="col-md-3">
                            <a href="index.html">
                                <img src="offs/img/logo.png" alt="logo" title="logo" class="logo">
                            </a>
                            <ul class="list list-social">
                                <li>
                                    <a class="fa fa-facebook box-icon" href="#" data-toggle="tooltip" title="Facebook"></a>
                                </li>
                                <li>
                                    <a class="fa fa-twitter box-icon" href="#" data-toggle="tooltip" title="Twitter"></a>
                                </li>
                                <li>
                                    <a class="fa fa-flickr box-icon" href="#" data-toggle="tooltip" title="Flickr"></a>
                                </li>
                                <li>
                                    <a class="fa fa-linkedin box-icon" href="#" data-toggle="tooltip" title="LinkedIn"></a>
                                </li>
                                <li>
                                    <a class="fa fa-tumblr box-icon" href="#" data-toggle="tooltip" title="Tumblr"></a>
                                </li>
                            </ul>
                            <p>Sagittis accumsan pulvinar montes aliquet adipiscing himenaeos enim suscipit cras suscipit justo porta lectus justo tincidunt molestie molestie risus a</p>
                        </div>
                        <div class="col-md-3">
                            <h4>Sign Up to the Newsletter</h4>
                            <div class="box">
                                <form>
                                    <div class="form-group mb10">
                                        <label>E-mail</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                    <p class="mb10">Eleifend libero cum varius mus porttitor quam</p>
                                    <input type="submit" class="btn btn-primary" value="Sign Up" />
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4>Couponia on Twitter</h4>
                            <!-- START TWITTER -->
                            <div class="twitter-ticker" id="twitter-ticker"></div>
                            <!-- END TWITTER -->
                        </div>
                        <div class="col-md-3">
                            <h4>Recent News</h4>
                            <ul class="thumb-list">
                                <li>
                                    <a href="#">
                                        <img src="offs/img/70x70.png" alt="Image Alternative text" title="Urbex Esch/Lux with Laney and Laaaaag" />
                                    </a>
                                    <div class="thumb-list-item-caption">
                                        <p class="thumb-list-item-meta">Jul 18, 2014</p>
                                        <h5 class="thumb-list-item-title"><a href="#">Enim elementum</a></h5>
                                        <p class="thumb-list-item-desciption">Urna id lacinia convallis quam</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="offs/img/70x70.png" alt="Image Alternative text" title="AMaze" />
                                    </a>
                                    <div class="thumb-list-item-caption">
                                        <p class="thumb-list-item-meta">Jul 18, 2014</p>
                                        <h5 class="thumb-list-item-title"><a href="#">Rhoncus cubilia</a></h5>
                                        <p class="thumb-list-item-desciption">Justo sapien sagittis nullam vehicula</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="offs/img/70x70.png" alt="Image Alternative text" title="The Hidden Power of the Heart" />
                                    </a>
                                    <div class="thumb-list-item-caption">
                                        <p class="thumb-list-item-meta">Jul 18, 2014</p>
                                        <h5 class="thumb-list-item-title"><a href="#">Adipiscing aliquam</a></h5>
                                        <p class="thumb-list-item-desciption">Netus aptent tristique nisi enim</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <p>Copyright © 2014, Your Store, All Rights Reserved</p>
                        </div>
                        <div class="col-md-6 col-md-offset-2">
                            <div class="pull-right">
                                <ul class="list-inline list-payment">
                                    <li>
                                        <img src="offs/img/payment/american-express-curved-32px.png" alt="Image Alternative text" title="Image Title" />
                                    </li>
                                    <li>
                                        <img src="offs/img/payment/cirrus-curved-32px.png" alt="Image Alternative text" title="Image Title" />
                                    </li>
                                    <li>
                                        <img src="offs/img/payment/discover-curved-32px.png" alt="Image Alternative text" title="Image Title" />
                                    </li>
                                    <li>
                                        <img src="offs/img/payment/ebay-curved-32px.png" alt="Image Alternative text" title="Image Title" />
                                    </li>
                                    <li>
                                        <img src="offs/img/payment/maestro-curved-32px.png" alt="Image Alternative text" title="Image Title" />
                                    </li>
                                    <li>
                                        <img src="offs/img/payment/mastercard-curved-32px.png" alt="Image Alternative text" title="Image Title" />
                                    </li>
                                    <li>
                                        <img src="offs/img/payment/visa-curved-32px.png" alt="Image Alternative text" title="Image Title" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- //////////////////////////////////
        //////////////END MAIN  FOOTER///////// 
        ////////////////////////////////////-->
        
        <!-- //////////////////////////////////
		//////////////END MAIN  FOOTER///////// 
		////////////////////////////////////-->
	</div>
	
    <script src="{{{ asset('offs/js/jquery.js') }}}"></script>
    <script src="{{{ asset('offs/js/boostrap.min.js') }}}"></script>
    <script src="{{{ asset('offs/js/countdown.min.js') }}}"></script>
    <script src="{{{ asset('offs/js/flexnav.min.js') }}}"></script>
    <script src="{{{ asset('offs/js/magnific.js') }}}"></script>
    <script src="{{{ asset('offs/js/tweet.min.js') }}}"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> -->
    <script src="{{{ asset('offs/js/fitvids.min.js') }}}"></script>
    <script src="{{{ asset('offs/js/mail.min.js') }}}"></script>
    <script src="{{{ asset('offs/js/ionrangeslider.js') }}}"></script>
    <script src="{{{ asset('offs/js/icheck.js') }}}"></script>
    <script src="{{{ asset('offs/js/fotorama.js') }}}"></script>
    <script src="{{{ asset('offs/js/card-payment.js') }}}"></script>
    <script src="{{{ asset('offs/js/owl-carousel.js') }}}"></script>
    <script src="{{{ asset('offs/js/masonry.js') }}}"></script>
    <script src="{{{ asset('offs/js/nicescroll.js') }}}"></script>
    <!-- <script src="{{{ asset('offs/js/toastr.min.js') }}}"></script> -->
    <script src="{{{ asset('offs/js/bootstrap-notify.min.js') }}}"></script>

    <!-- Custom scripts -->
    <script src="{{{ asset('offs/js/custom.js') }}}"></script>
    <script src="{{{ asset('offs/js/zareie.js') }}}"></script>

    <script>

        @if(Session::has('notification'))
            var type = "{{ Session::get('notification.alert-type', 'info') }}";
            $.notify({
                icon: 'fa fa-paw',
                title: '',
                message: "<?php echo htmlspecialchars_decode(Session::get('notification.message')) ?>"
            },{
                type: "{{ Session::get('notification.alert-type', 'info') }}",
                delay: 500000
            });

        <?php session()->forget('notification'); ?>
        @endif
    </script>
    

    @yield('js')
</body>
</html>