@component('mail::message')
<h1>
   <strong>
        From :
    </strong> {{ $data->email }}
</h1>

<h3>
  <strong>Email Subject</strong>  {{ $data->subject }}
</h3><br><br>

<p>
  <strong>Name</strong>  {{ $data->name }} <br>
  <strong>Message</strong>  {{ $data->message }}
</p>



{{--  @component('mail::button', ['url' => ''])
Button Text
@endcomponent  --}}

Thanks,<br>
    Thanks For Contact Us
@endcomponent
