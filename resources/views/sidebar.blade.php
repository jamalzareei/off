<?php
 	$type= \App\models\Sidebar::getType();
 	$url=urldecode($_SERVER['REQUEST_URI']);
?>
<aside class="sidebar-left">
	<ul class="nav nav-tabs nav-stacked nav-coupon-category nav-coupon-category-left">
		<li class="@if(!isset(explode('shop/',$url)[1])) active @endif"><a href="shop"><i class="fa fa-ticket"></i><strong>همه</strong></a>
        </li>
        @foreach($type as $t)
		<li class="@if(isset(explode('shop/',$url)[1]) && (explode('shop/',$url)[1]==str_replace(' ','-',$t->name_typeoff))) active @endif"><a href="shop/{{str_replace(' ','-',$t->name_typeoff)}}"><i class="fa fa-{{$t->icon}}"></i> &nbsp<span>{{$t->count}}</span> &nbsp<strong>{{$t->name_typeoff}}</strong></a>
		</li>
		@endforeach
		<!-- <li><a href="#"><i class="fa fa-calendar"></i><span>42</span><strong>حوادث</strong></a>
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
		</li> -->
	</ul>
</aside>