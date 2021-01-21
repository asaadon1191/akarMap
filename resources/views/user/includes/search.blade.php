
<div class="home">

    <!-- Home Slider -->
    <div class="home_slider_container">
        <div class="owl-carousel owl-theme home_slider">
            
            <!-- Slide -->
            <div class="owl-item">
                <div class="home_slider_background" style="background-image:url(assets/user/images/home_slider_1.jpg)"></div>
                <div class="slide_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="slide_content">
                                    <div class="home_subtitle">super offer</div>
                                    <div class="home_title">Villa with sea view</div>
                                    <div class="home_details">
                                        <ul class="home_details_list d-flex flex-row align-items-center justify-content-start">
                                            <li>
                                                <div class="home_details_image"><img src="{{ asset('assets/user/images/icon_1.png') }}" alt=""></div>
                                                <span> 650 Ftsq</span>
                                            </li>
                                            <li>
                                                <div class="home_details_image"><img src="{{ asset('assets/user/images/icon_2.png') }}" alt=""></div>
                                                <span> 3 Bedrooms</span>
                                            </li>
                                            <li>
                                                <div class="home_details_image"><img src="{{ asset('assets/user/images/icon_3.png') }}" alt=""></div>
                                                <span> 2 Bathrooms</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="home_price">$ 1. 245 999</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide -->
            <div class="owl-item">
                <div class="home_slider_background" style="background-image:url(assets/user/images/home_slider_1.jpg)"></div>
                <div class="slide_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="slide_content">
                                    <div class="home_subtitle">super offer</div>
                                    <div class="home_title">Villa with sea view</div>
                                    <div class="home_details">
                                        <ul class="home_details_list d-flex flex-row align-items-center justify-content-start">
                                            <li>
                                                <div class="home_details_image"><img src="{{ asset('assets/user/images/icon_1.png') }}" alt=""></div>
                                                <span> 650 Ftsq</span>
                                            </li>
                                            <li>
                                                <div class="home_details_image"><img src="{{ asset('assets/user/images/icon_2.png') }}" alt=""></div>
                                                <span> 3 Bedrooms</span>
                                            </li>
                                            <li>
                                                <div class="home_details_image"><img src="{{ asset('assets/user/images/icon_3.png') }}" alt=""></div>
                                                <span> 2 Bathrooms</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="home_price">$ 1. 245 999</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide -->
            <div class="owl-item">
                <div class="home_slider_background" style="background-image:url(assets/user/images/home_slider_1.jpg)"></div>
                <div class="slide_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="slide_content">
                                    <div class="home_subtitle">super offer</div>
                                    <div class="home_title">Villa with sea view</div>
                                    <div class="home_details">
                                        <ul class="home_details_list d-flex flex-row align-items-center justify-content-start">
                                            <li>
                                                <div class="home_details_image"><img src="{{ asset('assets/user/images/icon_1.png') }}" alt=""></div>
                                                <span> 650 Ftsq</span>
                                            </li>
                                            <li>
                                                <div class="home_details_image"><img src="{{ asset('assets/user/images/icon_2.png') }}" alt=""></div>
                                                <span> 3 Bedrooms</span>
                                            </li>
                                            <li>
                                                <div class="home_details_image"><img src="{{ asset('assets/user/images/icon_3.png') }}" alt=""></div>
                                                <span> 2 Bathrooms</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="home_price">$ 1. 245 999</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="home_search">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="home_search_container">
                    <div class="home_search_content">
                        <form action="{{ route('search') }}" class="search_form d-flex flex-row align-items-start justfy-content-start" method="POST">
                            <div class="search_form_content d-flex flex-row align-items-start justfy-content-start flex-wrap">
                                @csrf
                                
                                {{-- GOV NAME --}}
                                <div>
                                    <select class="search_form_select" id="gov" name="gov_id">
                                        <option disabled selected>Governorate</option>
                                       @foreach ($govs as $gov)
                                           <option value="{{ $gov->id }}">
                                                {{ $gov->name }}
                                           </option>
                                       @endforeach
                                    </select>
                                    @error("gov_id")
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                {{-- CITY ID  --}}
                                <div>
                                    <select class="search_form_select" name="city_id" id="city">
                                        <option disabled selected>Select City</option>
                                
                                    </select>
                                    @error("city_id")
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 

                                {{-- PROJECT NAME --}}
                                <div>
                                    <select class="search_form_select" name="project_id" id="pro">
                                        <option disabled selected>Project</option>
                                        
                                    </select>
                                </div>

                                {{-- BED ROOM NUMBER --}}
                                <div>
                                    <select class="search_form_select" name="bedRoomNumber" id="bed_number">
                                        <option disabled selected>Bedrooms</option>
                                        
                                    </select>
                                </div>

                                {{-- BATH ROOM NUMBER --}}  
                                <div>
                                    <select class="search_form_select" id="bathRoom">
                                        <option disabled selected>Bathrooms</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <button class="search_form_button ml-auto">search</button>
                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        // GET CITIES
        $(document).ready(function()
        {
            $('#gov').on('change',function()
            {
                var gov = $(this).val();

                if(gov)
                {
                    $.ajax(
                        {
                            url:"{{ url('/user/cities/') }}/" + gov,
                            type:"GET",
                            dataType:"json",
                            success:function(data)
                            {
                                $("#city").empty();
                                $.each(data,function(key,value)
                                {
                                    $("#city").append('<option value="'+value.id+'">'+value.name+'</option>')
                                });
                            }
                        });
                }else
                {
                    alert('Error');
                }
            });
        });


        // GET PROJECTS
        $(document).ready(function()
        {
            $('#city').on('change',function()
            {
                var pro = $(this).val();

                if(pro)
                {
                    $.ajax(
                        {
                            url:"{{ url('/user/projects/') }}/" + pro,
                            type:"GET",
                            dataType:"json",
                            success:function(data)
                            {
                                $("#pro").empty();
                                $.each(data,function(key,value)
                                {
                                    $("#pro").append('<option value="'+value.id+'">'+value.name+'</option>')
                                });
                            }
                        });
                }else
                {
                    alert('Error');
                }
            });
        });

        // GET BED ROOM NUMBER
        $(document).ready(function()
        {
            $('#pro').on('change',function()
            {
                var pro = $(this).val();

                if(pro)
                {
                    $.ajax(
                        {
                            url:"{{ url('/user/bedRoom/') }}/" + pro,
                            type:"GET",
                            dataType:"json",
                            success:function(data)
                            {
                                $("#bed_number").empty();
                                $.each(data,function(key,value)
                                {
                                    $("#bed_number").append('<option value="'+value.id+'">'+value.bed_Room_Number+'</option>')
                                });
                            }
                        });
                }else
                {
                    alert('Error');
                }
            });
        });

        // GET BED ROOM NUMBER
        $(document).ready(function()
        {
            $('#pro').on('change',function()
            {
                var pro = $(this).val();
               

                if(pro)
                {
                    $.ajax(
                        {
                            url:"{{ url('/user/bathRoom/') }}/" + pro,
                            type:"GET",
                            dataType:"json",
                            success:function(data)
                            {
                                $("#bathRoom").empty();
                                $.each(data,function(key,value)
                                {
                                    $("#bathRoom").append('<option value="'+value.id+'">'+value.bath_Room_Number+'</option>')
                                });
                            }
                        });
                }else
                {
                    alert('Error');
                }
            });
        });
    </script>
@endsection