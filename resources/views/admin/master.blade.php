<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/off/public/">
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="@yield('keyword')">
    <link rel="shortcut icon" href="admin/img/favicon.html">


    <!-- Bootstrap core CSS -->
     <link rel="stylesheet prefetch" href="{{{ asset('admin/css/bootstrap.min.css') }}}">
     <link rel="stylesheet prefetch" href="{{{ asset('admin/css/bootstrap-reset.css') }}}">
     <link rel="stylesheet prefetch" href="{{{ asset('admin/assets/font-awesome/css/font-awesome.css') }}}">
     <link rel="stylesheet prefetch" href="{{{ asset('icon/css/font-awesome.min.css') }}}">
     <link rel="stylesheet prefetch" href="{{{ asset('admin/css/style.css') }}}">
     <link rel="stylesheet prefetch" href="{{{ asset('admin/css/style-responsive.css') }}}">
     <link rel="stylesheet prefetch" href="{{{ asset('datePicker/css/persianDatepicker-default.css') }}}">

    <style type="text/css">
        .pdp-default .header,.pdp-default .footer{
            position: relative;min-height: 25px;
        }
    </style>
    @yield('css')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <section id="container" class="">
        <!--header start-->
        <!-- <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <a href="#" class="logo">فلت<span>لب</span></a>
            <div class="nav notify-row" id="top_menu">
                <ul class="nav top-menu">
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-tasks"></i>
                            <span class="badge bg-success">6</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">شما 6 برنامه در دست کار دارید</p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">پنل مدیریت</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">بروزرسانی دیتابیس</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">برنامه نویسی  IPhone</div>
                                        <div class="percent">87%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                            <span class="sr-only">87% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">برنامه موبایل</div>
                                        <div class="percent">33%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                            <span class="sr-only">33% Complete (danger)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">پروفایل v1.3</div>
                                        <div class="percent">45%</div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                            <span class="sr-only">45% Complete</span>
                                        </div>
                                    </div>

                                </a>
                            </li>
                            <li class="external">
                                <a href="#">برنامه های بیشتر</a>
                            </li>
                        </ul>
                    </li>
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-alt"></i>
                            <span class="badge bg-important">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-red"></div>
                            <li>
                                <p class="red">شما 5 پیام جدید دارید</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo">
                                        <img alt="avatar" src="admin/img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                        <span class="from">سجاد باقرزاده</span>
                                        <span class="time">همین حالا</span>
                                    </span>
                                    <span class="message">سلام،متن پیام نمایشی جهت تست
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo">
                                        <img alt="avatar" src="admin/img/avatar-mini2.jpg"></span>
                                    <span class="subject">
                                        <span class="from">ایمان مدائنی</span>
                                        <span class="time">10 دقیقه قبل</span>
                                    </span>
                                    <span class="message">سلام، چطوری شما؟
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo">
                                        <img alt="avatar" src="admin/img/avatar-mini3.jpg"></span>
                                    <span class="subject">
                                        <span class="from">صبا ذاکر</span>
                                        <span class="time">3 ساعت قبل</span>
                                    </span>
                                    <span class="message">چه پنل مدیریتی فوق العاده ایی
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo">
                                        <img alt="avatar" src="admin/img/avatar-mini4.jpg"></span>
                                    <span class="subject">
                                        <span class="from">مسعود شریفی</span>
                                        <span class="time">همین حالا</span>
                                    </span>
                                    <span class="message">سلام،متن پیام نمایشی جهت تست
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">نمایش تمامی پیام ها</a>
                            </li>
                        </ul>
                    </li>
                    <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-alt"></i>
                            <span class="badge bg-warning">7</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">شما 7 اعلام جدید دارید</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="icon-bolt"></i></span>
                                    سرور شماره 3 توقف کرده
                                   
                                    <span class="small italic">34 دقیقه قبل</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-warning"><i class="icon-bell"></i></span>
                                    سرور شماره 4 بارگزاری نمی شود
                                   
                                    <span class="small italic">1 ساعت قبل</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="icon-bolt"></i></span>
                                    پنل مدیریت 24% پیشرفت داشته است
                                   
                                    <span class="small italic">4 ساعت قبل</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-success"><i class="icon-plus"></i></span>
                                    ثبت نام کاربر جدید
                                   
                                    <span class="small italic">همین حالا</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                    برنامه پیام خطا دارد
                                   
                                    <span class="small italic">10 دقیقه قبل</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">نمایش تمامی اعلام ها</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="top-nav ">
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="admin/img/avatar1_small.jpg">
                            <span class="username">سجاد باقرزاده</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class=" icon-suitcase"></i>پروفایل</a></li>
                            <li><a href="#"><i class="icon-cog"></i>تنظیمات</a></li>
                            <li><a href="#"><i class="icon-bell-alt"></i>اعلام ها</a></li>
                            <li><a href="admin/masoud/logout"><i class="icon-key"></i>خروج</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </header> -->
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu">
                    <li class="active">
                        <a class="" href="admin/masoud/index">
                            <i class="icon-dashboard"></i>
                            <span>صفحه اصلی</span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="" href="admin/masoud/addpost">
                            <i class="icon-dashboard"></i>
                            <span>اضافه کردن پست جدید</span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="" href="admin/masoud/list">
                            <i class="icon-dashboard"></i>
                            <span>لیست پست ها</span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="" href="admin/masoud/list">
                            <i class="icon-dashboard"></i>
                            <span>سفارشات</span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="" href="admin/masoud/list">
                            <i class="icon-dashboard"></i>
                            <span>کامنت کاربران</span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="" href="admin/masoud/logout">
                            <i class="icon-dashboard"></i>
                            <span>خروج</span>
                        </a>
                    </li>
                    <!-- <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-book"></i>
                            <span>عناصر صفحه</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="general.html">عمومی</a></li>
                            <li><a class="" href="buttons.html">دکمه ها</a></li>
                            <li><a class="" href="widget.html">ویجت ها</a></li>
                            <li><a class="" href="slider.html">اسلایدر ها</a></li>
                            <li><a class="" href="font_awesome.html">فونت های شکل دار</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-cogs"></i>
                            <span>کامنت ها</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="grids.html">گرید</a></li>
                            <li><a class="" href="calendar.html">تقویم</a></li>
                            <li><a class="" href="charts.html">چارت</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-tasks"></i>
                            <span>ابزارهای فرم</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="form_component.html">کامنت فرم</a></li>
                            <li><a class="" href="form_wizard.html">فرم Wizard</a></li>
                            <li><a class="" href="form_validation.html">ارزیابی فرم</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-th"></i>
                            <span>اطلاعات جدول</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="basic_table.html">جدول ساده</a></li>
                            <li><a class="" href="dynamic_table.html">جدول داینامیک</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="" href="inbox.html">
                            <i class="icon-envelope"></i>
                            <span>ایمیل </span>
                            <span class="label label-danger pull-right mail-info">2</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" class="">
                            <i class="icon-glass"></i>
                            <span>عناصر اضافی</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li><a class="" href="blank.html">صفحه خالی</a></li>
                            <li><a class="" href="profile.html">پروفایل</a></li>
                            <li><a class="" href="invoice.html">فاکتور</a></li>
                            <li><a class="" href="404.html">404 Error</a></li>
                            <li><a class="" href="500.html">500 Error</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="" href="login.html">
                            <i class="icon-user"></i>
                            <span>صفحه ورود به سایت</span>
                        </a>
                    </li> -->
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                @yield('content')
             
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{{ asset('admin/js/jquery.js') }}}"></script>
    <script src="{{{ asset('admin/js/bootstrap.min.js') }}}"></script>
    <script src="{{{ asset('admin/js/jquery.scrollTo.min.js') }}}"></script>
    <script src="{{{ asset('admin/js/jquery.nicescroll.js') }}}"></script>
    <script src="{{{ asset('offs/js/bootstrap-notify.min.js') }}}"></script>
    <!--common script for all pages-->
    <script src="{{{ asset('admin/js/common-scripts.js') }}}"></script>
    <script src="{{{ asset('admin/js/966e86384d.js') }}}"></script>
    <!-- <script src="{{{ asset('datePicker/js/persian-date.js') }}}"></script> -->
    <script src="{{{ asset('datePicker/js/persianDatepicker.min.js') }}}"></script>

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
    @yield('js')

</body>
</html>