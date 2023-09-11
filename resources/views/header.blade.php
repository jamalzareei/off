<?php
    $type= \App\models\Sidebar::getType();
    $url=urldecode($_SERVER['REQUEST_URI']);
?>
<header class="main main-color">
    <div class="container">
        <ul class="nav nav-pills flexnav flexnav-icons flexnav-icons-top flexnav-border lg-screen" id="flexnav">
        @foreach($type as $t)
            <li class="@if(isset(explode('shop/',$url)[1]) && (explode('shop/',$url)[1]==str_replace(' ','-',$t->name_typeoff))) active @endif"><a href="shop/{{str_replace(' ','-',$t->name_typeoff)}}">
            <i class="fa fa-{{$t->icon}}"><label class="badge count">{{$t->count}}</label></i>
            {{$t->name_typeoff}}
            
            </a>
        @endforeach
            <!-- <li><a href="#"><i class="fa fa-cutlery"></i>Food &amp; Drink</a>
            </li>
            <li><a href="#"><i class="fa fa-calendar"></i>Events</a>
            </li>
            <li><a href="#"><i class="fa fa-female"></i>Beauty</a>
            </li>
            <li><a href="#"><i class="fa fa-bolt"></i>Fitness</a>
            </li>
            <li><a href="#"><i class="fa fa-headphones"></i>Electronics</a>
            </li>
            <li><a href="#"><i class="fa fa-image"></i>Furniture</a>
            </li>
            <li><a href="#"><i class="fa fa-umbrella"></i>Fashion</a>
            </li>
            <li><a href="#"><i class="fa fa-shopping-cart"></i>Shopping</a>
            </li>
            <li><a href="#"><i class="fa fa-home"></i>Home &amp; Graden</a>
            </li>
            <li><a href="#"><i class="fa fa-plane"></i>Travel</a>
            </li> -->
        </ul>
    </div>
</header>