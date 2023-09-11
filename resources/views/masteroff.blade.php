@extends('_master')

@section('_master')

         <!-- SEARCH AREA -->
        <!-- <form class="search-area form-group search-area-white text-right dr">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 clearfix pull-right">
                        <label class="pull-right col-md-1">
                            <i class="fa fa-search pull-right"></i>
                        </label>
                        <div class=" col-md-10 pull-right">
                            <input dir="rtl" name="search-name" class="form-control text-right col-md-12" type="text" placeholder="رستوران، کالا، زیبایی، آرایشگاه و ..." />
                        </div>
                    </div>
                    <div class="col-md-4 clearfix pull-right">
                        <label class="pull-right col-md-1">
                            <i class="fa fa-map-marker pull-right"></i>
                        </label>
                        <div class=" col-md-8 pull-right">
                            <select name="payment_type" id="search-type" class="form-control select-insurance-information dr text-right col-md-12" style="padding: 0">
                                <option>--Select Payment Type *--</option>
                                <option value="self-pay"> Self Pay </option>
                                <option value="self-pay2"> Self Pay 2 </option>
                                <option value="self-pay3"> Self Pay 3</option>
                                <option value="insurance"> Insurance </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1 pull-right text-right">
                        <button class="btn btn-block btn-white search-btn" type="submit">جستجو</button>
                    </div>
                </div>
            </div>
        </form> -->

        <div class="gap"></div>
        <div class="container">
            @yield('content')
        </div>
@endsection