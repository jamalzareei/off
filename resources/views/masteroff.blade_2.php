<!DOCTYPE html>
<html>
<head>
	<base href="/masoud/public/">
	<title>@yield('title')</title>
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
    <link rel="stylesheet prefetch" href="{{{ asset('offs/css/ie.css') }}}">
    <link rel="stylesheet prefetch" href="{{{ asset('offs/css/styles.css') }}}">
    <link rel="stylesheet prefetch" href="{{{ asset('offs/css/mystyles.css') }}}">

	@yield('css')
    <!-- <link rel="shortcut icon" href="{{{ asset('images/logo1.ico') }}}" type="image/x-icon"> -->

</head>
<body>
	<div class="global-wrap">
    <!-- //////////////////////////////////
	//////////////MAIN HEADER///////////// 
	////////////////////////////////////-->
    @include('_menu')
        <!-- SEARCH AREA -->
        <form class="search-area form-group search-area-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 clearfix pull-right">
                        <label class="pull-right"><i class="fa fa-search pull-right"></i><span>من میخوام بگردم دنبال </span>
                        </label>
                        <div class="search-area-division search-area-division-input">
                            <input dir="rtl" class="form-control text-right" type="text" placeholder="رستوران، کالا، زیبایی، آرایشگاه و ..." />
                        </div>
                    </div>
                    <div class="col-md-3 clearfix pull-right">
                        <label class="pull-right"><i class="fa fa-map-marker pull-right"></i><span>در</span>
                        </label>
                        <div class="search-area-division search-area-division-location">
                            <input dir="rtl" class="form-control text-right" type="text" placeholder="تهران، یزد و ..." />
                        </div>
                    </div>
                    <div class="col-md-1 pull-right text-right">
                        <button class="btn btn-block btn-white search-btn" type="submit">Search</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- END SEARCH AREA -->
		<div class="gap"></div>
		<div class="container">
			@yield('content')
		</div>

        @include('_footer')

	</div>
	
    
	@yield('js')
</body>
</html>