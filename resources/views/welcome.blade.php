@extends('user.layouts.app2')

@section('content')

    <!-- Home Search -->
        @include('user.includes.search')
    <br>
        <div class="text-center container">
            <h1>
                @include('admin.layouts.alerts.success')
                @include('admin.layouts.alerts.errors')
            </h1>
        </div>

    <!-- Recent -->

        <div class="recent">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title">New Companies</div>
                        <div class="section_subtitle">Search your dream home</div>
                    </div>
                </div>
                <div class="row recent_row">
                    <div class="col">
                        <div class="recent_slider_container">
                            <div class="owl-carousel owl-theme recent_slider">
                                
                                <!-- Slide -->
                                @foreach ($lastCompanies as $company)
                                    <div class="owl-item">
                                        <div class="recent_item">
                                            <div class="recent_item_inner">
                                                <div class="recent_item_image">
                                                    <img src="{{ asset('assets/admin/images/'. $company->logo) }}" alt="" style="height: 30%">
                                                    <div class="tag_featured property_tag"> 
                                                        <a href="{{ route('ratePage',$company->id) }}">Rate Company</a>
                                                        {{--  {{ $company['rates']->count() }} <br>
                                                        {{ $company['rates']->pluck('rate')->sum() }} <br>  --}}
                                                        @if ($company['rates']->pluck('rate')->sum() != 0)
                                                            {{ $company['rates']->pluck('rate')->sum() /$company['rates']->count()   }}
                                                        @endif
                                                       
                                                    </div>
                                                </div>
                                                <div class="recent_item_body text-center">
                                                    <div class="recent_item_location">{{ $company->phone }}</div>
                                                    <div class="recent_item_title"><a href="{{ route('companyDetailes',$company->id) }}">{{ $company->name }}</a></div><br>

                                                    @if ($company['rates']->pluck('rate')->sum() != 0)
                                                        <div class="rating_r rating_r_{{  ceil($company['rates']->pluck('rate')->sum() /$company['rates']->count()) }} testimonial_rating">
                                                            <i></i>
                                                            <i></i>
                                                            <i></i>
                                                            <i></i>
                                                            <i></i>
                                                        </div>
                                                            
                                                    @endif
                                                    
                                                    
                                                </div>
                                                <div class="recent_item_footer d-flex flex-row align-items-center justify-content-start">
                                                    <div><div class="recent_icon"><img src="{{ asset('assets/user/images/icon_1.png') }}" alt=""></div><span>{{ $company['projects']->count() }} Projects</span></div>
                                                    {{-- <div><div class="recent_icon"><img src="images/icon_2.png" alt=""></div><span>3 Bedrooms</span></div>
                                                    <div><div class="recent_icon"><img src="images/icon_3.png" alt=""></div><span>3 Bathrooms</span></div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                               
                                

                            </div>

                            <div class="recent_slider_nav_container d-flex flex-row align-items-start justify-content-start">
                                <div class="recent_slider_nav recent_slider_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
                                <div class="recent_slider_nav recent_slider_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                            </div>
                        </div>
                        <div class="button recent_button"><a href="{{ route('allCompanies') }}">see more</a></div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Cities -->

        <div class="cities">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title">Find New Projects</div>
                        <div class="section_subtitle">Search your dream home</div>
                    </div>
                </div>
            </div>
            
            <div class="cities_container d-flex flex-row flex-wrap align-items-start justify-content-between">

               

                

                @foreach ($lastProjects as $project)
                <!-- City -->
                <div class="city">
                    <img src="{{ asset('assets/admin/images/'.$project->logo) }}" alt="https://unsplash.com/@mathewwaters">
                    <div class="city_overlay">
                        <a href="{{ route('project_detailes',$project->id) }}" class="d-flex flex-column align-items-center justify-content-center">
                            <div class="city_title">{{ $project->name }}</div>
                            <div class="city_subtitle">Rentals from {{ $project->created_at->format('m') }}/month</div>
                        </a>	
                    </div>
                </div>
                @endforeach

               
            </div>
        </div>

    <!-- Testimonials -->

        <div class="testimonials">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section_title">What our clients say</div>
                        <div class="section_subtitle">Search your dream home</div>
                    </div>
                </div>
                <div class="row testimonials_row">
                    
                    <!-- Testimonial Item -->
                    <div class="col-lg-4 testimonial_col">
                        <div class="testimonial">
                            <div class="testimonial_title">Amazing home for me</div>
                            <div class="testimonial_text">Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.</div>
                            <div class="testimonial_author_image"><img src="images/testimonial_1.jpg" alt=""></div>
                            <div class="testimonial_author"><a href="#">Diane Smith</a><span>, Client</span></div>
                            <div class="rating_r rating_r_5 testimonial_rating"><i></i><i></i><i></i><i></i><i></i></div>
                        </div>
                    </div>

                    <!-- Testimonial Item -->
                    <div class="col-lg-4 testimonial_col">
                        <div class="testimonial">
                            <div class="testimonial_title">Friendly Realtors</div>
                            <div class="testimonial_text">Nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Pellentesque sit amet tellus blandit.</div>
                            <div class="testimonial_author_image"><img src="images/testimonial_2.jpg" alt=""></div>
                            <div class="testimonial_author"><a href="#">Michael Duncan</a><span>, Client</span></div>
                            <div class="rating_r rating_r_5 testimonial_rating"><i></i><i></i><i></i><i></i><i></i></div>
                        </div>
                    </div>

                    <!-- Testimonial Item -->
                    <div class="col-lg-4 testimonial_col">
                        <div class="testimonial">
                            <div class="testimonial_title">Very good communication</div>
                            <div class="testimonial_text">Retiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.</div>
                            <div class="testimonial_author_image"><img src="images/testimonial_3.jpg" alt=""></div>
                            <div class="testimonial_author"><a href="#">Shawn Gaines</a><span>, Client</span></div>
                            <div class="rating_r rating_r_5 testimonial_rating">
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    <!-- Newsletter -->

        <div class="newsletter">
            <div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/newsletter.jpg" data-speed="0.8"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="newsletter_content d-flex flex-lg-row flex-column align-items-start justify-content-start">
                            <div class="newsletter_title_container">
                                <div class="newsletter_title">Are you buying or selling?</div>
                                <div class="newsletter_subtitle">Search your dream home</div>
                            </div>
                            <div class="newsletter_form_container">
                                <form action="#" class="newsletter_form">
                                    <input type="email" class="newsletter_input" placeholder="Your e-mail address" required="required">
                                    <button class="newsletter_button">subscribe now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
    <script>
        $(document).ready(function()
        {
            $('.btn_showModel').click(function()
            {
                $('#delete_model').modal('show');
            });

            $('.modal_close').click(function()
            {
                $('#delete_model').modal('hide');
            });
        });
    </script>
@endsection

