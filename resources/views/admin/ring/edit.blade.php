@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                     <h3 class="card-title">Choose a Setting</h3>
                        <div class="card-tools p-0">
                            <a href="{{url('admin/product')}}" class="btn btn-outline btn-md">Back</a>
                        </div>
                    </div>
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div id="message"></div>
                    <!-- /.card-header -->
                    <!-- form start -->
                     <form action="{{ route('ring.update', $ring->id) }}" id="updateProductStore"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden"  id="id" name="id"  class="form-control" value="{{ $ring->id}}"/> 
                      <div class="card-body">
                        <div class="row">
                            <div class="col-4 form-group ">
                                <label for="exampleSelectRounded0">Name </label>
                                <input type="text"  id="name" name="name"  class="form-control" value="{{ $ring->name }}"/> 
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span id="name-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group">
                                <label for="exampleSelectRounded0">Shape </label>
                                <select class="custom-select rounded-0" id="shape" name="shape">
                                    <option value="Round" {{ ($ring->shape =='Round') ? 'selected' : '' }}>Round</option>
                                    <option value="Oval" {{ ($ring->shape =='Oval') ? 'selected' : '' }}>Oval</option>
                                    <option value="Emerald" {{ ($ring->shape =='Emerald') ? 'selected' : '' }}>Emerald</option>
                                    <option value="Radiant" {{ ($ring->shape =='Radiant') ? 'selected' : '' }}>Radiant</option>
                                    <option value="Pear" {{ ($ring->shape =='Pear') ? 'selected' : '' }}>Pear</option>
                                    <option value="Cushion" {{ ($ring->shape =='Cushion') ? 'selected' : '' }}>Cushion</option>
                                    <option value="Elongated cushion" {{ ($ring->shape =='Elongated cushion') ? 'selected' : '' }}>Elongated Cushion</option>
                                    <option value="Elongated hexagon" {{ ($ring->shape =='Elongated hexagon') ? 'selected' : '' }}>Elongated Hexagon</option>
                                    <option value="Marquise" {{ ($ring->shape =='Marquise') ? 'selected' : '' }}>Marquise</option>
                                    <option value="Princess" {{ ($ring->shape =='Princess') ? 'selected' : '' }}>Princess</option>
                                    <option value="Asscher" {{ ($ring->shape =='Asscher') ? 'selected' : '' }}>Asscher</option>
                                    <option value="Heart" {{ ($ring->shape =='Heart') ? 'selected' : '' }}>Heart</option>
                                </select>
                                @error('shape')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                               <span id="shape-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group">
                                     <label for="exampleSelectRounded0">Metal Type </label>
                                    <select class="custom-select rounded-0" id="metal_type" name="metal_type">
                                        <option value="Platinum" {{ ($ring->metal_type =='Platinum') ? 'selected' : '' }}>Platinum</option>
                                        <option value="18k Yellow Gold" {{ ($ring->metal_type =='18k Yellow Gold') ? 'selected' : '' }}>18k Yellow Gold</option>
                                        <option value="18k Red Gold" {{ ($ring->metal_type =='18k Red Gold') ? 'selected' : '' }}>18k Red Gold</option>
                                        <option value="18k White Gold" {{ ($ring->metal_type =='18k White Gold') ? 'selected' : '' }}>18k White Gold</option>
                                    </select>
                                    @error('metal_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <span id="metal_type-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group mt-2">
                                <label for="exampleSelectRounded0">Setting Style</label>
                                <select class="custom-select rounded-0" id="setting_style" name="setting_style">
                                    <option value="Trilogy" {{ ($ring->setting_style =='Trilogy') ? 'selected' : '' }}>Trilogy</option>
                                    <option value="Solitaire" {{ ($ring->setting_style =='Solitaire') ? 'selected' : '' }}>Solitaire</option>
                                    <option value="Halo" {{ ($ring->setting_style =='Halo') ? 'selected' : '' }}>Halo</option>
                                    <option value="Toi et Moi" {{ ($ring->setting_style =='Toi et Moi') ? 'selected' : '' }}>Toi et Moi</option> 
                                </select>
                                @error('setting_style')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span id="setting_style-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group mt-2">
                                <label for="exampleSelectRounded0">Band Type </label>
                                <select class="custom-select rounded-0" id="band_type" name="band_type">
                                  <option value="Plain" {{ ($ring->band_type =='Plain') ? 'selected' : '' }}>Plain</option>
                                  <option value="Pave" {{ ($ring->band_type =='Pave') ? 'selected' : '' }}>Pave</option>
                                  <option value="Accents" {{ ($ring->band_type =='Accents') ? 'selected' : '' }}>Accents</option> 
                                </select>
                                 @error('setting_style')
                                      <div class="text-danger">{{ $message }}</div>
                                 @enderror
                                 <span id="band_type-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group mt-2">
                                <label for="exampleSelectRounded0">Setting Profile </label>
                                <select class="custom-select rounded-0" id="setting_profile" name="setting_profile">
                                    <option value="High Set" {{ ($ring->setting_profile =='High Set') ? 'selected' : '' }}>High Set</option>
                                    <option value="Low set" {{ ($ring->setting_profile =='Low set') ? 'selected' : '' }}>Low set</option>
                                </select>
                                @error('setting_profile')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span id="setting_profile-error" class="invalid-feedback"></span>
                            </div> 
                            <div class="col-4 form-group mt-2">
                                <label for="exampleSelectRounded0">Description </label><br/>
                                <textarea cols="54" rows="5" id="setting_description" name="setting_description">
                                    {{$ring->setting_description}}
                                </textarea>
                                @error('setting_description')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span id="setting_description-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group mt-2">
                                <label for="exampleSelectRounded0">Image </label>
                                <input type="file" class="form-control" id="setting_image" name="setting_image"  onchange="previewImage(this,'setting-preview')" />
                                @error('setting_image')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span id="setting_image-error" class="invalid-feedback"></span>
                                <span>
                                    <img id="setting-preview" src="{{asset('storage/'.$ring->setting_image)}}" alt="Image Preview" style="max-width: 200px; max-height: 200px;"> 
                                </span>
                            </div>
                        </div> 
                      </div>
                      <!-- /.card-body -->
                      <div class="card-header bg-blue ">
                        <h3 class="card-title">Stone Details</h3>
                      </div>
                      
                      {{-- Added Version --}}
      
                      <div class="card-body">
                        <div class="row">
                            <div class="col-4 form-group">
                                <label for="stoneType">Stone Type</label>
                                <select class="custom-select rounded-0" id="stoneType" name="stoneType" >
                                  <option value="">Select Stone Type</option>
                                  <option value="lab-grown-diamond" {{($ring->stoneType =='lab-grown-diamond') ?'selected':''}}>Lab-Grown Diamond</option>
                                  <option value="coloured-lab-grown-diamond" {{($ring->stoneType =='coloured-lab-grown-diamond') ?'selected':''}}>Coloured Lab-Grown Diamond</option>
                                  <option value="moissanite" {{($ring->stoneType =='moissanite') ?'selected':''}}>Moissanite</option>
                                  <option value="sapphire" {{($ring->stoneType =='sapphire') ?'selected':''}}>Sapphire</option>
                                </select>
                                 @error('stoneType')
                                      <div class="text-danger">{{ $message }}</div>
                                 @enderror
                                 <span id="stoneType-error" class="invalid-feedback"></span>
                              </div>
                               <div class="col-4 form-group mt-2">
                                    <label for="exampleSelectRounded0">Image </label>
                                    <input type="file" class="form-control" id="stone_image" name="stone_image" onchange="previewImage(this,'stone-preview')"/>
                                    @error('stone_image')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <span id="stone_image-error" class="invalid-feedback"></span>
                                    <span>
                                        <img id="stone-preview" src="{{asset('storage/'.$ring->stone_image)}}" alt="Image Preview" style="max-width: 200px; max-height: 200px;">
                       
                                    </span>
                                </div>
                        </div> 
                         
                           <div class="row" id="additionalFields">
                            @if ($ring->stoneType =='lab-grown-diamond')
                                <div class="col-4 mt-2">
                                    <label for="exampleSelectRounded0">Shape </label>
                                    <select class="custom-select rounded-0" name="stone_shape_type" id="stone_shape_type">
                                            <option value="Round" {{($ring->stone_shape_type =='Round') ?'selected':''}}>Round</option>
                                            <option value="Oval" {{($ring->stone_shape_type =='Oval') ?'selected':''}}>Oval</option>
                                            <option value="Emerald" {{($ring->stone_shape_type =='Emerald') ?'selected':''}}>Emerald</option>
                                            <option value="Radiant" {{($ring->stone_shape_type =='Radiant') ?'selected':''}}>Radiant</option>
                                            <option value="Pear" {{($ring->stone_shape_type =='Pear') ?'selected':''}}>Pear</option>
                                            <option value="Cushion" {{($ring->stone_shape_type =='Cushion') ?'selected':''}}>Cushion</option>
                                            <option value="Elongated cushion" {{($ring->stone_shape_type =='Elongated cushion') ?'selected':''}}>Elongated Cushion</option>
                                            <option value="Elongated hexagon" {{($ring->stone_shape_type =='Elongated hexagon') ?'selected':''}}>Elongated Hexagon</option>
                                            <option value="Marquise" {{($ring->stone_shape_type =='Marquise') ?'selected':''}}>Marquise</option>
                                            <option value="Princess" {{($ring->stone_shape_type =='Princess') ?'selected':''}}>Princess</option>
                                            <option value="Asscher" {{($ring->stone_shape_type =='Asscher') ?'selected':''}}>Asscher</option>
                                            <option value="Heart" {{($ring->stone_shape_type =='Heart') ?'selected':''}}>Heart</option>
                                    </select> 
                                    <span id="stone_shape_type-error" class="invalid-feedback"></span>
                                </div>
                                <div class="col-4 mt-2">
                                    <label for="shape">Carat</label>
                                    <input type="text" class="form-control" name="stone_carat" id="stone_carat" value="{{$ring->stone_carat}}">
                                    <span id="stone_carat-error" class="invalid-feedback"></span>
                                </div>
                                <div class="col-4 mt-2">
                                    <label for="shape">Price</label>
                                    <input type="text" class="form-control" name="stone_price" id="stone_price" value="{{$ring->stone_price}}">
                                    <span id="stone_price-error" class="invalid-feedback"></span>
                                </div>
                                <div class="col-4 mt-2">
                                    <label for="exampleSelectRounded0">Colour</label>
                                    <select class="custom-select rounded-0" name="stone_color" id="stone_color">
                                        <option value="J" {{($ring->stone_color =='J') ?'selected':''}}>J</option>
                                        <option value="I" {{($ring->stone_color =='I') ?'selected':''}}>I</option>
                                        <option value="H" {{($ring->stone_color =='H') ?'selected':''}}>H</option>
                                        <option value="G" {{($ring->stone_color =='G') ?'selected':''}}>G</option>
                                        <option value="F" {{($ring->stone_color =='F') ?'selected':''}}>F</option>
                                        <option value="E" {{($ring->stone_color =='E') ?'selected':''}}>E</option>
                                        <option value="D" {{($ring->stone_color =='D') ?'selected':''}}>D</option>
                                    </select> 
                                    <span id="stone_color-error" class="invalid-feedback"></span>
                                </div>
                                <div class="col-4 mt-2">
                                    <label for="exampleSelectRounded0">Cut</label>
                                    <select class="custom-select rounded-0" name="stone_cut" id="stone_cut">
                                        <option value="Excellent" {{($ring->stone_cut =='Excellent') ?'selected':''}}>Excellent</option>
                                        <option value="Ideal" {{($ring->stone_cut =='Ideal') ?'selected':''}}>Ideal</option>
                                    </select> 
                                    <span id="stone_cut-error" class="invalid-feedback"></span>
                                </div>
                                <div class="col-4 mt-2">
                                    <label for="exampleSelectRounded0">Clarity</label>
                                    <select class="custom-select rounded-0" name="stone_clarity" id="stone_clarity">
                                        <option value="I1" {{($ring->stone_clarity =='I1') ?'selected':''}}>I1</option>
                                        <option value="SI2" {{($ring->stone_clarity =='SI2') ?'selected':''}}>SI2</option>
                                        <option value="SI1" {{($ring->stone_clarity =='SI1') ?'selected':''}}>SI1</option>
                                        <option value="VS2" {{($ring->stone_clarity =='VS2') ?'selected':''}}>VS2</option>
                                        <option value="VS1" {{($ring->stone_clarity =='VS1') ?'selected':''}}>VS1</option>
                                        <option value="VVS2" {{($ring->stone_clarity =='VVS2') ?'selected':''}}>VVS2</option>
                                        <option value="VVS1" {{($ring->stone_clarity =='VVS1') ?'selected':''}}>VVS1</option>
                                        <option value="IF" {{($ring->stone_clarity =='IF') ?'selected':''}}>IF</option>
                                        <option value="FL" {{($ring->stone_clarity =='FL') ?'selected':''}}>FL</option>
                                    </select> 
                                    <span id="stone_clarity-error" class="invalid-feedback"></span>
                                </div>
                                <div class="col-4 mt-2">
                                    <label for="shape">Depth %</label>
                                    <input type="text" class="form-control" name="stone_depth" id="stone_depth" value="{{$ring->stone_depth}}">
                                    
                                </div>
                                <div class="col-4 mt-2">
                                    <label for="shape">Table %</label>
                                    <input type="text" class="form-control" name="stone_table" id="stone_table" value="{{$ring->stone_table}}">
                                    
                                </div>
                                <div class="col-4 mt-2">
                                    <label for="shape">Length/Width Ratio</label>
                                    <input type="text" class="form-control" name="stone_ratio" id="stone_ratio"  value="{{$ring->stone_ratio}}">
                                    
                                </div>
                            @elseif ($ring->stoneType =='coloured-lab-grown-diamond')
                            
                               <div class="col-4 mt-2">
                                  <label for="exampleSelectRounded0">Shape </label>
                                  <select class="custom-select rounded-0" name="stone_shape_type" id="stone_shape_type">
                                      <option value="Round">Round</option>
                                      <option value="Oval">Oval</option>
                                      <option value="Emerald">Emerald</option>
                                      <option value="Radiant">Radiant</option>
                                      <option value="Pear">Pear</option>
                                      <option value="Cushion">Cushion</option>
                                      <option value="Elongated cushion">Elongated Cushion</option>
                                      <option value="Elongated hexagon">Elongated Hexagon</option>
                                      <option value="Marquise">Marquise</option>
                                      <option value="Princess">Princess</option>
                                      <option value="Asscher">Asscher</option>
                                      <option value="Heart">Heart</option>
                                  </select> 
                              </div>
                              <div class="col-4 mt-2">
                                  <label for="exampleSelectRounded0">Color </label>
                                  <select class="custom-select rounded-0" name="stone_color" id="stone_color">
                                    <option value="Pink">Pink</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Yellow">Yellow</option>
                                  </select> 
                              </div>
                              <div class="col-4 mt-2">
                                  <label for="exampleSelectRounded0">Clarity</label>
                                  <select class="custom-select rounded-0" name="stone_clarity" id="stone_clarity">
                                    <option value="I1">I1</option>
                                    <option value="SI2">SI2</option>
                                    <option value="SI1">SI1</option>
                                    <option value="VS2">VS2</option>
                                    <option value="VS1">VS1</option>
                                    <option value="VVS2">VVS2</option>
                                    <option value="VVS1">VVS1</option>
                                    <option value="IF">IF</option>
                                    <option value="FL">FL</option>
                                  </select> 
                              </div> 
                            @elseif ($ring->stoneType =='moissanite')
                                <div class="col-4 mt-2">
                                    <label for="exampleSelectRounded0">Shape </label>
                                    <select class="custom-select rounded-0" id="stone_shape_type" name="stone_shape_type">
                                        <option value="Round" {{($ring->stone_shape_type =='Round') ?'selected':''}}>Round</option>
                                        <option value="Oval" {{($ring->stone_shape_type =='Oval') ?'selected':''}}>Oval</option>
                                        <option value="Emerald" {{($ring->stone_shape_type =='Emerald') ?'selected':''}}>Emerald</option>
                                        <option value="Radiant" {{($ring->stone_shape_type =='Radiant') ?'selected':''}}>Radiant</option>
                                        <option value="Pear" {{($ring->stone_shape_type =='Pear') ?'selected':''}}>Pear</option>
                                        <option value="Cushion" {{($ring->stone_shape_type =='Cushion') ?'selected':''}}>Cushion</option>
                                        <option value="Elongated cushion" {{($ring->stone_shape_type =='Elongated cushion') ?'selected':''}}>Elongated Cushion</option>
                                        <option value="Elongated hexagon" {{($ring->stone_shape_type =='Elongated hexagon') ?'selected':''}}>Elongated Hexagon</option>
                                        <option value="Marquise" {{($ring->stone_shape_type =='Marquise') ?'selected':''}}>Marquise</option>
                                        <option value="Princess" {{($ring->stone_shape_type =='Princess') ?'selected':''}}>Princess</option>
                                        <option value="Asscher" {{($ring->stone_shape_type =='Asscher') ?'selected':''}}>Asscher</option>
                                        <option value="Heart" {{($ring->stone_shape_type =='Heart') ?'selected':''}}>Heart</option>
                                    </select> 
                                </div>
                                <div class="col-4 mt-2">
                                    <label for="exampleSelectRounded0">Color </label>
                                    <select class="custom-select rounded-0" id="stone_color" name="stone_color">
                                    <option value="Colourless">Colourless</option>
                                    <option value="Clover green">Clover Green</option>
                                    <option value="Smokey grey">Smokey Grey</option>
                                    <option value="Sunshine yello">Sunshine Yello</option>
                                    <option value="Champagne">Champagne</option>
                                    <option value="Midnight blue">Midnight Blue</option>
                                    <option value="Seafoam green">Seafoam Green</option>
                                    <option value="Sandy yellow">Sandy Yellow</option>
                                    </select> 
                                </div>
                            @elseif ($ring->stoneType =='sapphire')   
                                <div class="col-4 mt-2">
                                    <label for="exampleSelectRounded0">Shape </label>
                                    <select class="custom-select rounded-0" id="stone_shape_type" name="stone_shape_type">
                                        <option value="Round" {{($ring->stone_shape_type =='Round') ?'selected':''}}>Round</option>
                                        <option value="Oval" {{($ring->stone_shape_type =='Oval') ?'selected':''}}>Oval</option>
                                        <option value="Emerald" {{($ring->stone_shape_type =='Emerald') ?'selected':''}}>Emerald</option>
                                        <option value="Radiant" {{($ring->stone_shape_type =='Radiant') ?'selected':''}}>Radiant</option>
                                        <option value="Pear" {{($ring->stone_shape_type =='Pear') ?'selected':''}}>Pear</option>
                                        <option value="Cushion" {{($ring->stone_shape_type =='Cushion') ?'selected':''}}>Cushion</option>
                                        <option value="Elongated cushion" {{($ring->stone_shape_type =='Elongated cushion') ?'selected':''}}>Elongated Cushion</option>
                                        <option value="Elongated hexagon" {{($ring->stone_shape_type =='Elongated hexagon') ?'selected':''}}>Elongated Hexagon</option>
                                        <option value="Marquise" {{($ring->stone_shape_type =='Marquise') ?'selected':''}}>Marquise</option>
                                        <option value="Princess" {{($ring->stone_shape_type =='Princess') ?'selected':''}}>Princess</option>
                                        <option value="Asscher" {{($ring->stone_shape_type =='Asscher') ?'selected':''}}>Asscher</option>
                                        <option value="Heart" {{($ring->stone_shape_type =='Heart') ?'selected':''}}>Heart</option>
                                    </select> 
                                </div>
                                <div class="col-4 mt-2">
                                    <label for="exampleSelectRounded0">Color </label>
                                    <select class="custom-select rounded-0" id="stone_color" name="stone_color">
                                    <option value="Colourless">Colourless</option>
                                    <option value="Clover green">Clover Green</option>
                                    <option value="Smokey grey">Smokey Grey</option>
                                    <option value="Sunshine yello">Sunshine Yello</option>
                                    <option value="Champagne">Champagne</option>
                                    <option value="Midnight blue">Midnight Blue</option>
                                    <option value="Seafoam green">Seafoam Green</option>
                                    <option value="Sandy yellow">Sandy Yellow</option>
                                    </select> 
                                </div> 
                            @endif     
                        </div>
                       
                      </div>
                     
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </form>
                    
                  </div>
                </div>
                <!--/.col (left) -->
      
              </div>
        </div>
    </section>
@endsection
@push('scripts')
<script src="{{asset('admin/custom-validation.js')}}"></script>
<script src="{{asset('admin/helper.js')}}"></script>
<script>
      
    $('#updateProductStore').validate({
        rules: {
            name: {
                required: true
            },
            shape: {
                required: true 
            },
            metal_type: {
                required: true 
            },
            setting_style: {
                required: true 
            },
            band_type: {
                required: true
            },
            setting_profile: {
                required: true
            },
            
            setting_description: {
                required: true
            },
            stoneType :{
                required: true
            },
            stone_shape_type: {
                required: true
            },
            stone_carat: {
                required: true
            },
            stone_price: {
                required: true
            },
            stone_color: {
                required: true
            },
            stone_cut: {
                required: true
            },
            stone_clarity: {
                required: true
            },
            stone_depth: {
                required: true
            },
            stone_table: {
                required: true
            },
            stone_ratio: {
                required: true
            },
            
        },
        messages: {
            name: {
                required: 'This field is required'
            },
            shape: {
                required: 'This field is required'
            },
            metal_type: {
                required: 'This field is required'
            },
            setting_style: {
                required: 'This field is required'
            },
            band_type: {
                required: 'This field is required'
            },
            setting_profile: {
                required: 'This field is required'
            },
            
            setting_description: {
                required: 'This field is required'
            },
            stoneType :{
                required: 'This field is required'
            },
            stone_shape_type: {
                required: 'This field is required'
            },
            stone_carat: {
                required: 'This field is required'
            },
            stone_price: {
                required: 'This field is required'
            },
            stone_color: {
                required: 'This field is required'
            },
            stone_cut: {
                required: 'This field is required'
            },
            stone_clarity: {
                required: 'This field is required'
            },
            stone_depth: {
                required: 'This field is required'
            },
            stone_table: {
                required: 'This field is required',
            },
            stone_ratio: {
                required: 'This field is required'
            }  
        },
        errorElement: 'span', // Error element
        errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid'); // Add is-invalid class to the invalid input
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid'); // Remove is-invalid class from the valid input
            },
        submitHandler: function(form) {
            
            //var formData = $(form).serialize(); // Serialize form data
            var formData = new FormData(form);
            $('#message').html('');
            $.ajax({
                url: $(form).attr('action'), // Form action URL
                method: 'POST', // Form submit method
                data: formData, // Form data 
                contentType: false,
                processData: false,
                success: function(response) {
                        console.log(response.url)
                    if(response.success){ 
                        window.location.href = response.url;
                    } else {
                        toastr.error(response.message)  
                    } 
                    
                },
                error: function(xhr) {
                    // Handle errors here
                    if (xhr.status === 422) {
                        // Validation error
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            $('#' + key).addClass('is-invalid'); // Add is-invalid class to the field
                            $('#' + key + '-error').text(value); // Display error message
                        });
                    } else {
                        // Other errors
                        console.error('Error:', xhr);
                    }
                }
            });
        }
    }); 
     
    </script>
@endpush
