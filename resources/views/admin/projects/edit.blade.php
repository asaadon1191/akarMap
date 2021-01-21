@extends('admin.layouts.app')

@section('title')
    Update Project
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Basic form</h4>
            <form action="{{ route('project.update',$project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="text-center">
                    <img src="{{ asset('assets/admin/images/'. $project->logo) }}" alt="" style="height: 100px; width:100px">
                    <img src="{{ asset('assets/admin/images/'. $project->map_desigen) }}" alt="" style="height: 100px; width:100px">
                </div>

                <div class="row">   

                    {{--  PROJECT_ID  --}}
                    <div class="form-group col-md-6">
                        <input type="hidden" name="id" value="{{ $project->ProTranslation->pluck('id')->implode(', ') }}" class="form-control">
                    </div>
            
                    {{-- ADMIN_ID  --}}
                    <div class="form-group col-md-6" hidden>
                        <label for="exampleInputEmail1">Admin Id</label>
                        <input type="hidden" class="form-control" name="admin_id" value="{{ auth()->user()->id }}">
                    </div>   

                    {{-- NAME  --}}
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Project Name</label>
                        <input type="text" class="form-control" placeholder="Project Name" name="name" value="{{ $project->name }}">
                        @error("name")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>    

                    {{-- SPACE  --}}
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Project Space</label>
                        <input type="integer" class="form-control" placeholder="Project Space" name="space" value="{{ $project->space }}">
                        @error("space")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>   

                    {{-- TOTAL UNITES  --}}
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Total Units</label>
                        <input type="integer" class="form-control" placeholder="Total Units" name="total_units" value="{{ $project->total_units }}">
                        @error("total_units")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>     

                
                    {{-- GOVERNORATE ID  --}}
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Governorate Name</label>
                        <select class="form-control input-lg dynamic" id="gov" name="gov_id">
                            <option> Select Governorate</option>
                            @foreach ($governorates as $gov)
                                <option value="{{ $gov->id }}" @if ($gov->id == $project->gov_id)
                                    selected
                                @endif>
                                    {{ $gov->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>  

                    {{-- CITY ID  --}}
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">City Name</label>
                        <select class="form-control input-lg dynamic" name="city_id" id="city" disabled>
                            <option>Select City</option>
                    
                        </select>
                        @error("city_id")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>  
                    
                    {{-- COMPANY ID  --}}
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Company Name</label>
                        <select class="form-control" name="company_id">
                            <option> Select Company</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" @if ($company->id == $project->company_id)
                                    selected
                                @endif>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                        @error("company_id")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>  

                    {{-- LOGO --}}
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Company Logo</label>
                        <input type="file" name="logo" class="form-control">
                        @error("logo")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- Map Desigen  --}}
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Map Desigen</label>
                        <input type="file" class="form-control" name="map_desigen">
                        @error("map_desigen")
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>  

                    {{-- IS_ACTIVE  --}}
                    <div class="form-group col-md-6">
                        <div class="form-group mt-1">
                            <input type="checkbox"  value="1" 
                                name="is_active"
                                id="switcheryColor4"
                                class="switchery" data-color="success"
                                @if ($project->is_active == 1)
                                    checked
                                @endif/>
                            <label for="switcheryColor4"
                                class="card-title ml-1">Status 
                            </label>
                            @error("is_active")
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div> 
                </div> 

                {{-- INPUT MAP SEARCH --}}
                <div class="row">
                    <div class="col-md-12">
                    <div class="">
                        <label>  Adress </label>
                        <input type="text"
                        id="pac-input"
                        style="z-index: 0 ; position: absolute; right:0; top:0"
                        class="form-control"
                        name="adress" 
                        value="{{ $project->adress }}">
                        @error('adress')
                                <span class="text-danger">  {{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                </div>   
                
                {{-- MAP --}}
                <div id="map" style="height: 500px; width:100%">

                </div>

                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
            </form>
        </div>
    </div>   
@endsection

@section('script')
    <script>
        $("#pac-input").focusin(function() {
            $(this).val('');
        });
        $('#latitudef').val('');
        $('#longitudef').val('');
            // This example adds a search box to a map, using the Google Place Autocomplete
            // feature. People can enter geographical searches. The search box will return a
            // pick list containing a mix of places and predicted search terms.
            // This example requires the Places library. Include the libraries=places
            // parameter when you first load the API. For example:
            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 24.740691, lng: 46.6528521 },
                zoom: 13,
                mapTypeId: 'roadmap'
            });
            // move pin and current location
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: 'موقعك الحالي'
                    });
                    markers.push(marker);
                    marker.addListener('click', function() {
                        geocodeLatLng(geocoder, map, infoWindow,marker);
                    });
                    // to get current position address on load
                    google.maps.event.trigger(marker, 'click');
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
            var geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function(event) {
                SelectedLatLng = event.latLng;
                geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            deleteMarkers();
                            addMarkerRunTime(event.latLng);
                            SelectedLocation = results[0].formatted_address;
                            console.log( results[0].formatted_address);
                            splitLatLng(String(event.latLng));
                            $("#pac-input").val(results[0].formatted_address);
                        }
                    }
                });
            });
            function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
                var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
                /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                $('#latitudef').val(markerCurrent.position.lat());
                $('#longitudef').val(markerCurrent.position.lng());
                geocoder.geocode({'location': latlng}, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(8);
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            SelectedLocation = results[0].formatted_address;
                            $("#pac-input").val(results[0].formatted_address);
                            infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });
                SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
            }
            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }
            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }
            function clearMarkers() {
                setMapOnAll(null);
            }
            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            $("#pac-input").val("أبحث هنا ");
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });
            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));
                    $('#latitudef').val(place.geometry.location.lat());
                    $('#longitudef').val(place.geometry.location.lng());
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
        function splitLatLng(latLng){
            var newString = latLng.substring(0, latLng.length-1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng  = trainindIdArray[1];
            $("#latitudef").val(lat);
            $("#longitudef").val(Lng);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initAutocomplete&language=en&region=EG
    async defer">
    </script>
    
    <script>
        $(document).ready(function()
        {
            var geve = $('#gov').val();
            
            if(geve != null)
            {
                alert(geve);
                $("#city").removeAttr('disabled');

                $.ajax(
                {
                    url:"{{ url('/admin/project/cities/') }}/" + geve,
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

                $('#gov').on('change',function()
                {
                    var gov = $(this).val();
    
                    if(gov)
                    {
                        $.ajax(
                            {
                                url:"{{ url('/admin/project/cities/') }}/" + gov,
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
                    }
                });
            }
        });
    </script>

@endsection