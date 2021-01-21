@extends('user.layouts.app2')

@section('content')

    <!-- Home Search -->
        @include('user.includes.search')

       <div class="container">
        <div class="sidebar_search">
            <div class="sidebar_search_title">Search your home</div>
            <div class="sidebar_search_form_container">
                <form action="{{ route('rate',$company->id) }}" class="sidebar_search_form" id="sidebar_search_form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="" style="padding-right: 10px">One</label>
                        <input type="radio" name="rate" value="1" id="one">
                    </div>
                    <div class="form-group">
                        <label for="" style="padding-right: 10px">Two</label>
                        <input type="radio" name="rate" value="2" id="two">
                    </div>
                    <div class="form-group">
                        <label for="" style="padding-right: 10px">Three</label>
                        <input type="radio" name="rate" value="3" id="three">
                    </div>
                    <div class="form-group">
                        <label for="" style="padding-right: 10px">Four</label>
                        <input type="radio" name="rate" value="4" id="four">
                    </div>
                    <div class="form-group">
                        <label for="" style="padding-right: 10px">Five</label>
                        <input type="radio" name="rate" value="5" id="five">
                    </div>
                    @error("rate")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                
                    <button class="sidebar_search_button_2 search_form_button_2">search</button>
                </form>
            </div>
        </div>
       </div>
@endsection