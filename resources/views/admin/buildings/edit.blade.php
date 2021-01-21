@extends('admin.layouts.app')

@section('title')
    Update Building
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Update Building {{ $buildings->name }}</h4>
            <form action="{{ route('Building.update',$buildings->id) }}" method="POST">
                @csrf
                @method('PUT')

                 {{-- HIDDEN INPUT ID  --}}
                 <div class="form-group">
                    <input type="hidden" class="form-control"name="id" value="{{ $buildings->buildingTranslate->pluck('id')->implode(', ') }}">   
                </div>

               {{-- NAME  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Building Name</label>
                    <input type="text" class="form-control" placeholder="Building Name" name="name" value="{{ $buildings->name }}">
                    @error("name")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>  

                {{--  SPACE  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Space</label>
                    <input type="number" class="form-control" placeholder="Space" name="space" id="space" value="{{ $buildings->space }}">
                    @error("space")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>   
                
                
               {{-- TOTAL UNTIES  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Total Units</label>
                    <input type="number" class="form-control" placeholder="Total Unites" name="total_units" id="total_unites" value="{{ $buildings->total_unites }}">
                    @error("total_units")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>  
                
                
               {{-- SOLIED UNTIES  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Solied Units</label>
                    <input type="number" class="form-control" placeholder="Solied Unites" name="sold_unites" id="sold_unites" value="{{ $buildings->sold_unites }}">
                    @error("sold_unites")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>    


               {{-- Aviliable UNTIES  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Aviliable Units</label>
                    <input type="number" class="form-control" placeholder="Aviliable Unites" name="aviliable_unites" id="aviliable_unites" value="{{ $buildings->aviliable_unites }}">
                    @error("aviliable_unites")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>    
                
                
               {{-- PRICE METER  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Price/Meter</label>
                    <input type="number" class="form-control" placeholder="Price/Meter" name="price_meter" id="P_meter" value="{{ $buildings->price_meter }}">
                    @error("price_meter")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>     
                

                 {{--  TOTAL PRICE  --}}
                 <div class="form-group">
                    <label for="exampleInputEmail1">Total Price</label>
                    <input type="number" class="form-control" placeholder="Total Price" name="total_price" id="T_price" value="{{ $buildings->total_price }}">
                    @error("total_price")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>     

                 {{--  BED ROOM NUMBER  --}}
                 <div class="form-group">
                    <label for="exampleInputEmail1">Bed Room Number</label>
                    <input type="number" class="form-control" placeholder="Bed Room Number" name="bed_Room_Number" value="{{ $buildings->bed_Room_Number }}">
                    @error("total_price")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>    
                
                
                 {{--  BATH ROOM NUMBER  --}}
                 <div class="form-group">
                    <label for="exampleInputEmail1">Bath Room Number</label>
                    <input type="number" class="form-control" placeholder="Bath Room Number" name="bath_Room_Number" value="{{ $buildings->bath_Room_Number }}">
                    @error("total_price")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>     
                
               {{-- project ID  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Project Name</label>
                    <select name="project_id" class="form-control">
                        @foreach ($projects as $pro)
                            <option value="{{ $pro->id }}" @if ($pro->id == $buildings->project_id)
                                selected
                            @endif>
                                {{ $pro->name }}
                            </option>
                        @endforeach
                    </select>
                    @error("project_id")
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>  
                
                
               {{-- buildType ID  --}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Project Name</label>
                    <select name="buildingType_id" class="form-control">
                        @foreach ($buildingTypes as $buildType)
                            <option value="{{ $buildType->id }}" @if ($buildType->id == $buildings->buildingType_id)
                                selected
                            @endif>
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
                    <label for="exampleInputEmail1">Project Name</label>
                    <select name="attribute_id[]" class="form-control" multiple>
                        @foreach ($attributes as $attr)
                            <option value="{{ $attr->id }}" {{ in_array($attr->id,$data) ? 'selected' : '' }}>
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
                            @if ($buildings->is_active == 1)
                                checked
                            @endif/>
                        <label for="switcheryColor4"
                            class="card-title ml-1">Status </label>
                    </div>
                </div> 
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
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