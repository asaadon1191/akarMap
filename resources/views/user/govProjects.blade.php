@extends('user.layouts.app2')

@include('user.includes.search')

@section('content')
<div class="properties">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title">{{ $pros->projects->count() }} Properties found</div>
                <div class="section_subtitle">Search your dream home</div>
            </div>
        </div>
        <div class="row properties_row">
            @if ($pros && $pros->count() > 0)
                @foreach ($pros->projects as $pro)
                    <!-- Property -->
                    
                    <div class="col-xl-4 col-lg-6 property_col">
                        <div class="property">
                            <div class="property_image">
                                <img src="{{ asset('assets/admin/images/'. $pro->logo ) }}" style="width: 100%" alt="">
                                <div class="tag_featured property_tag"><a href="{{ route('companyDetailes',$pro->company->id) }}">{{ $pro->company->name }}</a></div>
                            </div>
                            <div class="property_body text-center">
                                <div class="property_location">{{ $pro->city->name }}</div>
                                <div class="property_title"><a href="{{ route('project_detailes',$pro->id) }}">{{ $pro->name }}</a></div>
                                {{-- <div class="property_price"></div> --}}
                            </div>
                            <div class="property_footer d-flex flex-row align-items-center justify-content-start">
                                {{-- <div><div class="property_icon"><img src="{{ asset('assets/user/images/icon_1.png') }}" alt=""></div><span>{{ $pro->buildings->pluck('building_type')->count() }} Projects</span></div> --}}
                                <div><div class="property_icon"><img src="{{ asset('assets/user/images/icon_1.png') }}" alt=""></div><span>{{ $pro->buildings->pluck('total_unites')->sum() }} Total Unites</span></div>
                                <div><div class="property_icon"><img src="{{ asset('assets/user/images/icon_2.png') }}" alt=""></div><span> {{ $pro->buildings->pluck('sold_unites')->sum() }} Sold Unites</span></div>
                                <div><div class="property_icon"><img src="{{ asset('assets/user/images/icon_3.png') }}" alt=""></div><span>{{ $pro->buildings->pluck('aviliable_unites')->sum() }} Aviliable Unites</span></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                    <h1>No Companies</h1>
            @endif
           
            
        </div>
        <div class="row">
            <div class="col">
                <div class="pagination">
                    <ul>
                        <li class="active"><a href="#">01.</a></li>
                        <li><a href="#">02.</a></li>
                        <li><a href="#">03.</a></li>
                        <li><a href="#">04.</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection