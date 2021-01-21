@extends('user.layouts.app2')



@section('content')
@include('user.includes.search')
    <div class="properties">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section_title">25 Properties found</div>
                    <div class="section_subtitle">Search your dream home</div>
                </div>
            </div>
            <div class="row properties_row">
                @if ($company->projects && $company->projects->count() > 0)
                    
                    @foreach ($company->projects as $comp)
                        <!-- Property -->
                        <div class="col-xl-4 col-lg-6 property_col">
                            <div class="property">
                                <div class="property_image">
                                    <img src="{{ asset('assets/admin/images/'. $comp->logo ) }}" style="width: 100%" alt="">
                                    <div class="tag_featured property_tag"><a href="{{ route('govProjects',$comp->city->governorate->id) }}">{{ $comp->city->governorate->name }}</a></div>
                                </div>
                                <div class="property_body text-center">
                                    <div class="property_location">{{ $comp->city->name }}</div>
                                    <div class="property_title"><a href="property.html">{{ $comp->name }}</a></div>
                                    <div class="property_price">{{ $comp->phone }}</div>
                                </div>
                                <div class="property_footer d-flex flex-row align-items-center justify-content-start">
                                    <div><div class="property_icon"><img src="{{ asset('assets/user/images/icon_1.png') }}" alt=""></div><span>{{ $comp->space }} M</span></div>
                                    <div><div class="property_icon"><img src="{{ asset('assets/user/images/icon_2.png') }}" alt=""></div><span>{{ $comp->total_units }} Buildings</span></div>
                                    {{-- <div><div class="property_icon"><img src="images/icon_3.png" alt=""></div><span>3 Bathrooms</span></div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                        <h1 class="text-center">
                            No Projects In This Company
                        </h1>
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