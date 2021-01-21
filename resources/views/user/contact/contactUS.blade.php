@extends('user.layouts.app2')

@section('content')
    @include('user.includes.search')
    <br>
    <div class="text-center container">
        <h1>
            @include('admin.layouts.alerts.success')
            @include('admin.layouts.alerts.errors')
        </h1>
    </div>

    <div class="contact">
		<div class="container">
			<div class="row">

				<!-- Contact Info -->
				<div class="col-lg-4">
					<div class="contact_info">
						<div class="section_title">Get in touch with us</div>
						<div class="section_subtitle">Say hello</div>
						<div class="contact_info_text"><p>Donec ullamcorper nulla non metus auctor fringi lla. Curabitur blandit tempus porttitor.Sed lectus urna, ultricies sit amet risus eget.</p></div>
						<div class="contact_info_content">
							<ul class="contact_info_list">
								<li>
									<div>Address:</div>
									<div>1481 Creekside Lane Avila Beach, CA 93424</div>
								</li>
								<li>
									<div>Phone:</div>
									<div>+53 345 7953 32453</div>
								</li>
								<li>
									<div>Email:</div>
									<div>yourmail@gmail.com</div>
								</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Contact Form -->
				<div class="col-lg-8">
					<div class="contact_form_container">
						<form action="{{ route('submitMessage') }}" class="contact_form" id="contact_form" method="POST">
                            @csrf

							<div class="row">
								<!-- Name -->
								<div class="col-lg-6 contact_name_col">
                                    <input type="text" class="contact_input" placeholder="Name" required="required" name="name">
                                    @error("name")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
								<!-- Email -->
								<div class="col-lg-6">
                                    <input type="email" class="contact_input" placeholder="E-mail" required="required" name="email">
                                    @error("email")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
								</div>
                            </div>
                            
							<div><input type="text" class="contact_input" placeholder="Subject" name="subject"></div>
							<div><textarea class="contact_textarea contact_input" placeholder="Message" required="required" name="message"></textarea></div>
							<button class="contact_button button">send</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection