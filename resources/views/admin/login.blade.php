<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->    
    <link rel="stylesheet prefetch" href="{{{ asset('admin/css/bootstrap.min.css') }}}">
    <link rel="stylesheet prefetch" href="{{{ asset('admin/css/bootstrap-reset.css') }}}">
    <link rel="stylesheet prefetch" href="{{{ asset('admin/assets/font-awesome/css/font-awesome.css') }}}">
    <link rel="stylesheet prefetch" href="{{{ asset('admin/css/style.css') }}}">
    <link rel="stylesheet prefetch" href="{{{ asset('admin/css/style-responsive.css') }}}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

    <div class="container">

        <form class="form-signin" action="login-admin" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <h2 class="form-signin-heading">...</h2>
            <div class="login-wrap">
                <?php if($errors->has('username')){
                                echo '<label class="text-danger text-right f-yekan">'
                                . $errors->first('username') .'</label>';
                            } ?>
                <input type="text" class="form-control text-left" placeholder="نام کاربری" autofocus name="username" value="<?php echo old('username') ?>">
                <?php if($errors->has('password')){
                                echo '<label class="text-danger text-right f-yekan">'
                                . $errors->first('password') .'</label>';
                            } ?>
                <input type="password" class="form-control text-left" placeholder="کلمه عبور" name="password" value="<?php echo old('password') ?>">
                <!-- <label class="checkbox">
                    <input type="checkbox" value="remember-me"> مرا به خاطر بسپار
                    <span class="pull-right"> <a href="#"> کلمه عبور را فراموش کرده اید؟</a></span>
                </label> -->
                <button class="btn btn-lg btn-login btn-block" type="submit">ورود</button>


            </div>

        </form>

    </div>

    <script src="{{{ asset('admin/js/jquery.js') }}}"></script>
    <script src="{{{ asset('admin/js/bootstrap.min.js') }}}"></script>
    <script src="{{{ asset('offs/js/bootstrap-notify.min.js') }}}"></script>

    <script>

        @if(Session::has('notification'))
            var type = "{{ Session::get('notification.alert-type', 'info') }}";
            $.notify({
                icon: 'fa fa-paw',
                title: '',
                message: "{{ Session::get('notification.message') }}"
            },{
                type: "{{ Session::get('notification.alert-type', 'info') }}",
                delay: 500000
            });

        <?php session()->forget('notification'); ?>
        @endif
    </script>
</body>
</html>
