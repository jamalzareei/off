@extends('_master')

@section('_master')
		
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

        <div class="gap"></div>
        <div class="container">
            @yield('content')
        </div>
@endsection