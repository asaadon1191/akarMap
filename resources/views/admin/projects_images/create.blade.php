@extends('admin.layouts.app')

@section('title')
    Create New Project Image
@endsection

@section('content')
    <div class="card">
        <div class="card-title">
            <h3> Create Product Image </h3>
        </div>
        <div class="card-body">
           
            {{--  IMAGES FORM  --}}
            <form class="form-image" action="{{ route('project_images.store') }}"
               method="post" enctype="multipart/form-data">
               @csrf 

               <div class="form-body">

                    {{--  IMAGES INPUT  --}}
                   <div class="form-group">
                       <label for="">Project Image</label>
                       <input type="file" name="photos[]" multiple accept="image/*" class="form-control" id="uploader">
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
                              <option value="{{ $pro->id }}">
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