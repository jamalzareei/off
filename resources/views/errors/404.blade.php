<html>
<head>

 <link rel="stylesheet prefetch" href="{{{ asset('offs/css/boostrap.css') }}}">
 <link rel="stylesheet prefetch" href="{{{ asset('offs/css/font_awesome.css') }}}">

	<style>
		.nb-error {
			margin: 0 auto;
			text-align: center;
			max-width: 480px;
			padding: 60px 30px;
		}

		.nb-error .error-code {
			color: #2d353c;
			font-size: 96px;
			line-height: 100px;
		}

		.nb-error .error-desc {
			font-size: 12px;
			color: #647788;
		}
		.nb-error .input-group{
			margin: 30px 0;
		}
		.btn-default{
			padding: 9px;
		}
	</style>
	
</head>
<body>
	<div class="nb-error">
		<div class="error-code">404</div>
		<h3 class="font-bold">We couldn't find the page..</h3>

		<div class="error-desc">
			Sorry, but the page you are looking for was either not found or does not exist. <br/>
			Try refreshing the page or click the button below to go back to the Homepage.
			<div class="input-group">
				<input type="text" placeholder="Try with a search" class="form-control">
				<span class="input-group-btn">
					<button type="button" class="btn btn-default">
						<em class="fa fa-search"></em>
					</button>
				</span>
			</div>
			<ul class="list-inline text-center text-sm">
				<li class="list-inline-item"><a href="http://nextbootstrap.com" class="text-muted">Go to App</a>
				</li>
				<li class="list-inline-item"><a href="http://nextbootstrap.com" class="text-muted">Login</a>
				</li>
				<li class="list-inline-item"><a href="http://nextbootstrap.com" class="text-muted">Register</a>
				</li>
			</ul>
			<div class="text-center">
				<span>©</span>
				<span>2017</span>
				<span>-</span>
				<span>تخفیف</span>
				<br>
				<span>سایت تخفیف گروهی</span>
			</div>
		</div>
	</div>
</body>
</html>
