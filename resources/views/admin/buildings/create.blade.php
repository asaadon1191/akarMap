@extends('admin.layouts.app')

@section('title')
    Create New Building
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Basic form</h4>
            <form action="{{ route('Building.store') }}" method="POST">
                @csrf

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Building Name</label>
                    <input type="text" class="form-control" placeholder="Building Name" name="name">
                    @error("name")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>  


                {{--  SPACE  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Space</label>
                    <input type="number" class="form-control" placeholder="Space" name="space" id="space">
                    @error("space")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>   
                
                
               {{-- TOTAL UNTIES  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Total Units</label>
                    <input type="number" class="form-control" placeholder="Total Unites" name="total_unites" id="total_unites">
                    @error("total_unites")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>  
                
                
               {{-- SOLIED UNTIES  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Solied Units</label>
                    <input type="number" class="form-control" placeholder="Solied Unites" name="sold_unites" id="sold_unites">
                    @error("sold_unites")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>    


               {{-- Aviliable UNTIES  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Aviliable Units</label>
                    <input type="number" class="form-control" placeholder="Aviliable Unites" name="aviliable_unites" id="aviliable_unites">
                    @error("aviliable_unites")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>    
                
                
               {{-- PRICE METER  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Price/Meter</label>
                    <input type="number" class="form-control" placeholder="Price/Meter" name="price_meter" id="P_meter">
                    @error("price_meter")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>     
                

                 {{--  TOTAL PRICE  --}}
                 <div class="form-group">
                    <label for="exampleInputEmail1">Total Price</label>
                    <input type="number" class="form-control" placeholder="Total Price" name="total_price" id="T_price">
                    @error("total_price")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>     

                 {{--  BED ROOM NUMBER  --}}
                 <div class="form-group">
                    <label for="exampleInputEmail1">Bed Room Number</label>
                    <input type="number" class="form-control" placeholder="Bed Room Number" name="bed_Room_Number">
                    @error("bed_Room_Number")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                 </div>    
                
                
                 {{--  BATH ROOM NUMBER  --}}
                 <div class="form-group">
                    <label for="exampleInputEmail1">Bath Room Number</label>
                    <input type="number" class="form-control" placeholder="Bath Room Number" name="bath_Room_Number">
                    @error("bath_Room_Number")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                 </div>
                  
                
               {{-- project ID  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Project Name</label>
                    <select name="project_id" class="form-control">
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
                
                
               {{-- BUILDING TYPE ID  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Building Type</label>
                    <select name="building_type_id" class="form-control">
                        @foreach ($buildingTypes as $buildType)
                            <option value="{{ $buildType->id }}">
                                {{ $buildType->name }}
                            </option>
                        @endforeach
                    </select>
                    @error("buildingType_id")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>       
                
                
               {{-- ATTRIBUTES ID  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Building Attribute</label>
                    <select name="attribute_id[]" class="form-control" multiple>
                        @foreach ($attributes as $attr)
                            <option value="{{ $attr->id }}">
                                {{ $attr->name }}
                            </option>
                        @endforeach
                    </select>
                    @error("attribute_id")
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
                            checked/>
                        <label for="switcheryColor4"
                            class="card-title ml-1">Status 
                        </label>
                        @error("is_active")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                </div> 
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
            </form>
        </div>


        
    {{--  ################################################ Building Images #####################  --}}

        <div class="card-body">
            
            {{--  IMAGES FORM  --}}
            <form class="form-image" action="{{ route('building.images',$lastBuilding) }}"
                method="post" enctype="multipart/form-data">
                @csrf 

                <div class="form-body">

                    <h4 class="form-section"><i class="ft-home"></i>  Building Images </h4>
                    <div class="form-group">
                        <div id="dpz-multiple-files" class="dropzone dropzone-area">
                            <div class="dz-message">Upload Multiable Images</div>
                        </div>
                        <br><br>
                    </div>
                    <div>
                        <input type="file" name="photos[]" multiple accept="image/*" class="form-control" id="uploader">
                        <div id ="img_list" class="img_list">

                        </div>
                    </div>  
                    
                     {{-- PHOTOS TYPE --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Photo Type</label>
                        <select name="photo_type" id="select-beast" class="form-control  nice-select  custom-select">
                            <option value="0">Image</option>
                            <option value="1"> Map</option>
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

@section('script')
   <script>
    $(document).ready(function()
    {
        
        //GET TOTAL PRICE
        $('#P_meter').change(function()
        {
            var tot = $('#space').val() * $('#P_meter').val();
           $(T_price).val(tot);
        });  

        //GET TOTAL PRICE
        $('#space').change(function()
        {
            var tot = $('#space').val() * $('#P_meter').val();
            $(T_price).val(tot);
        });    


        //GET TOTAL UNITES
        $('#total_unites').change(function()
        {
            // GET DATA
            var T_unites            = $('#total_unites').val();
            $('#aviliable_unites').val(T_unites);
        });     

        // GET SOLIED UNITES
        $('#aviliable_unites').change(function()
        {
            // GET DATA
            var soldUnites = $('#total_unites').val() - $('#aviliable_unites').val();
            $('#sold_unites').val(soldUnites);
        });    


        // GET AVILIABLE UNITES
        $('#sold_unites').change(function()
        {
            // GET DATA
            var avilaibleUnites = $('#total_unites').val() - $('#sold_unites').val();
            $('#aviliable_unites').val(avilaibleUnites);
        });    
        
        
    }); 
   </script>
@endsection