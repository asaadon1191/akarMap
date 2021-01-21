@extends('user.layouts.app2')

@include('user.includes.search')

@section('content')
<div class="properties">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title">{{ $project->buildings->count() }} Buildings found</div>
                <div class="section_subtitle">Search your dream home</div>
            </div>
        </div>
        <div class="row properties_row">

            <!-- Property -->
           @if($project->buildings && $project->buildings->count() > 0)
                @foreach ($project->buildings as $pro)
                    <div class="col-xl-4 col-lg-6 property_col">
                        <div class="property">
                            {{--  {{ $pro->buildingImages }}  --}}
                            <div class="property_image">
                                <img src="{{ asset('assets/admin/images/'.$pro->buildingImages->pluck('photos')->first()) }}" alt="">
                                <div class="tag_featured property_tag"><a href="#">Featured</a></div>
                            </div>
                            <div class="property_body text-center">
                                <div class="property_location">{{ $pro->building_type->name }}</div>
                                <div class="property_title"><a href="{{ route('buildingDetailes',$pro->id) }}">{{ $pro->name }}</a></div>
                                <div class="property_price">{{ $pro->total_price }} L.E</div>
                            </div>
                            <div class="property_footer d-flex flex-row align-items-center justify-content-start">
                                <div><div class="property_icon"><img src="{{ asset('assets/user/images/icon_1.png') }}" alt=""></div><span>{{ $pro->space }} M</span></div>
                                <div><div class="property_icon"><img src="{{ asset('assets/user/images/icon_2.png') }}" alt=""></div><span>{{ $pro->bed_Room_Number }} Bedrooms</span></div>
                                <div><div class="property_icon"><img src="{{ asset('assets/user/images/icon_3.png') }}" alt=""></div><span>{{ $pro->bath_Room_Number }} Bathrooms</span></div>
                            </div>
                        </div>
                    </div>
                @endforeach
           @else
                    <h1 class="text-center">
                        No Buildings In This Project
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