@extends('admin.layouts.app')

@section('title')
    Update  Building Image
@endsection

@section('content')
    <div class="card">
        <div class="card-title">
            <h3> Update Building Image </h3>
        </div>
        <div class="card-body">
           
            {{--  IMAGES FORM  --}}
            <form class="form-image" action="{{ route('BuildingImage.update',$buildingImage->id) }}"
               method="post" enctype="multipart/form-data">
               @csrf 
               @method('PUT')

               <div class="form-body">

                

                <div class="text-center">
                    <img src="{{ asset('assets/admin/images/'. $buildingImage->photos) }}" alt="" style="height: 100px; width:100px">
                </div>

                 {{--  IMAGE ID   --}}
                <input type="hidden" name="id" value="{{ $buildingImage->id }}">

                    {{--  IMAGES INPUT  --}}
                   <div class="form-group">
                       <label for="">Building Image</label>
                       <input type="file" name="photos" multiple accept="image/*" class="form-control" id="uploader">
                       <div id ="img_list" class="img_list"></div>
                   </div> 

                  {{--  PROJECT ID INPUT  --}}                                            
                  <div class="form-group">
                    <label for="">Project Name</label>
                   <select name="building_id" id="" class="form-control">
                       <option >Select Project</option>
                       @foreach ($buildings as $building)
                           <option value="{{ $building->id }}" @if ($building->id == $buildingImage->building_id )
                               selected
                           @endif>
                               {{ $building->name }}
                           </option>
                       @endforeach
                   </select>
                    @error("building_id")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>                   

               
               
                {{-- PHOTOS TYPE --}}
             <div class="form-group">
                <label for="exampleInputEmail1">Photo Type</label>
                <select name="photo_type" id="select-beast" class="form-control  nice-select  custom-select">
                    <option value="0" @if ($building->photo_type == 1)
                        selected
                    @endif >Image</option>
                    <option value="1" @if ($building->photo_type == 0)
                        selected
                    @endif> Map</option>
                </select>
                @error("status")
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>                                              
               
                   <div class="form-actions">
                       <button type="button" class="btn btn-warning mr-1"
                               onclick="history.back();">
                           <i class="ft-x"></i> {{ __('admin/profile.Back') }}
                       </button>
                       <button type="submit" class="btn btn-primary">
                           <i class="la la-check-square-o"></i> {{ __('admin/profile.Save') }}
                       </button>
                   </div>
               </div>
           </form>
       </div>
    </div>
@endsection