@extends('admin.layouts.app')

@section('title')
    Update  Project Image
@endsection

@section('content')
    <div class="card">
        <div class="card-title">
            <h3> Update Product Image </h3>
        </div>
        <div class="card-body">
           
            {{--  IMAGES FORM  --}}
            <form class="form-image" action="{{ route('project_images.update',$proImage->id) }}"
               method="post" enctype="multipart/form-data">
               @csrf 
               @method('PUT')

               <div class="form-body">

                

                <div class="text-center">
                    <img src="{{ asset('assets/admin/images/'. $proImage->photos) }}" alt="" style="height: 100px; width:100px">
                </div>

                 {{--  IMAGE ID   --}}
                <input type="hidden" name="id" value="{{ $proImage->id }}">

                    {{--  IMAGES INPUT  --}}
                   <div class="form-group">
                       <label for="">Project Image</label>
                       <input type="file" name="photos" multiple accept="image/*" class="form-control" id="uploader">
                       <div id ="img_list" class="img_list"></div>
                       @error("photos")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                   </div> 

                   {{--  PROJECT ID INPUT  --}}                                            
                   <div class="form-group">
                       <label for="">Project Name</label>
                      <select name="project_id" id="" class="form-control">
                          <option >Select Project</option>
                          @foreach ($projects as $pro)
                              <option value="{{ $pro->id }}" @if ($pro->id == $proImage->project_id) selected @endif>
                                  {{ $pro->name }} 
                              </option>
                          @endforeach
                      </select>
                      @error("project_id")
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