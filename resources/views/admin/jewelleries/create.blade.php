@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Jewellery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Jewellery</li>
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
                  <form action="{{ route('jewelleries.store') }}" method="POST" id="jewelleriesCreate">
                        @csrf
                    <div class="card">
                        <div class="card-header ">
                            <h3 class="card-title">Product Info</h3>
                            <div class="card-tools p-0">
                                <a href="{{ route('jewelleries.index') }}" class="btn btn-primary btn-md" style="float: right">Back</a>
                            </div>
                          </div> 
                        <div class="row card-body">
                            <div class="col-3 form-group mb-2">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="custom-select rounded-0" id="category_id" name="category_id">
                                    @foreach ($categories as $row)
                                        <option value="{{ $row->id }}" data-value="{{ $row->slug }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-3 form-group mb-2">
                                <label for="product_id" class="form-label">Product ID</label>
                                <input type="text" class="form-control" id="product_id" name="product_id"
                                    value="{{ old('product_id') }}" >
                                @error('product_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3 form-group mb-2">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3 form-group mb-2">
                                <label for="price" class="form-label">Product Price</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price"
                                    value="{{ old('price') }}">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3 form-group mb-2">
                                <label for="gross_weight" class="form-label">Gross Weight</label>
                                <input type="text" class="form-control" id="gross_weight" name="gross_weight"
                                    value="{{ old('gross_weight') }}">
                                @error('gross_weight')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3 form-group mb-2" style="display:none;"  id="size_input">
                                <label for="size" class="form-label">Size</label>
                                <input type="text" class="form-control" id="size" name="size"
                                    value="{{ old('size') }}">
                                @error('size')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                            <div class="col-3 form-group mb-2">
                                <label for="product_images" class="form-label">Product Images</label>
                                <input type="file" id="product_images" name="product_images[]" onchange="previewImage(this,'create-jewellert-img')" class="form-control"
                                    multiple>
                                @error('product_images.*')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3 form-group mt-4" > 
                                <div  id="create-jewellert-img"></div>
                              </div>
                            <div class="col-3 form-group mb-2">
                                <label for="gender" class="form-label">Gender</label>
                                <select id="gender" name="gender" class="custom-select">
                                    <option value="">Select Gender</option>
                                    <option value="men" {{ old('gender') == 'men' ? 'selected' : '' }}>Men</option>
                                    <option value="women" {{ old('gender') == 'women' ? 'selected' : '' }}>Women
                                    </option>
                                    <option value="kit" {{ old('gender') == 'kit' ? 'selected' : '' }}>Kit</option>
                                    <option value="unisex" {{ old('gender') == 'unisex' ? 'selected' : '' }}>Unisex
                                    </option>
                                </select>
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-3 form-group mb-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                    value="{{ old('description') }}"></textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-3 form-group mb-2 category-input" style="display:none;">  
                                <label for="product_type" class="form-label">Product Type</label>
                                <select id="product_type" name="product_type" class="custom-select">
                                    <option value="">Select Occasion</option>
                                    @foreach (config('constants.jewellery.PRODUCT_TYPE') as $product_type)
                                        @php
                                            $ptName = strtolower(str_replace(' ', '_', $product_type));
                                        @endphp
                                        <option value="{{ $ptName }}"
                                            {{ old('product_type') == $ptName ? 'selected' : '' }}>
                                            {{ $product_type }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('occasion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                            <div class="col-3 form-group mb-2 pendant_input category-input" style="display:none;"   >
                                <label for="pendant_width" class="form-label">Pendant Width</label>
                                <input type="text" class="form-control" id="pendant_width" name="pendant_width"
                                value="{{ old('pendant_width') }}">
                                @error('pendant_width')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror 
                            </div>   
                            <div class="col-3 form-group mb-2 pendant_input category-input" style="display:none;">
                                <label for="pendant_height" class="form-label">Pendant Height</label>
                                <input type="text" class="form-control" id="pendant_height" name="pendant_height"
                                value="{{ old('pendant_height') }}">
                                @error('pendant_height')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror 
                            </div>  
                            <div class="col-3 form-group mb-2 earrings_input category-input" style="display:none;"   >
                                <label for="earring_width" class="form-label">Earring Width</label>
                                <input type="text" class="form-control" id="earring_width" name="earring_width"
                                value="{{ old('earring_width') }}">
                                @error('earring_width')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror 
                            </div>   
                            <div class="col-3 form-group mb-2 earrings_input category-input" style="display:none;">
                                <label for="earring_height" class="form-label">Earring Height</label>
                                <input type="text" class="form-control" id="earring_height" name="earring_height"
                                value="{{ old('earring_height') }}">
                                @error('earring_height')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror 
                            </div>
                            <div class="col-3 form-group mb-2 nothing_input category-input" style="display:none;">
                                <label for="nothing_extra" class="form-label">Nothing extra</label>
                                <input type="text" class="form-control" id="nothing_extra" name="nothing_extra"
                                value="{{ old('nothing_extra') }}">
                                @error('nothing_extra')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror 
                            </div> 
                            <div class="col-3 form-group mb-2 watchs_input category-input" style="display:none;"   >
                                <label for="watch_width" class="form-label">Watch Width</label>
                                <input type="text" class="form-control" id="watch_width" name="watch_width"
                                value="{{ old('watch_width') }}">
                                @error('watch_width')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror 
                            </div>   
                            <div class="col-3 form-group mb-2 watchs_input category-input" style="display:none;">
                                <label for="watch_height" class="form-label">Watch Height</label>
                                <input type="text" class="form-control" id="watch_height" name="watch_height"
                                value="{{ old('watch_height') }}">
                                @error('watch_height')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror 
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product Details</h3>
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3 form-group mb-2">
                                    
                                    <label for="occasion" class="form-label">Occasion</label>
                                    <select id="occasion" name="occasion" class="custom-select">
                                        <option value="">Select Occasion</option>
                                        @foreach (config('constants.jewellery.OCCASION') as $occasion)
                                            @php
                                                $ocName = strtolower(str_replace(' ', '_', $occasion));
                                            @endphp
                                            <option value="{{ $ocName }}"
                                                {{ old('occasion') == $ocName ? 'selected' : '' }}>
                                                {{ $occasion }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('occasion')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Material Color -->
                                <div class="col-3 form-group mb-2">
                                    <label for="material_color" class="form-label">Material Color</label>
                                    <select id="material_color" name="material_color" class="custom-select">
                                        <option value="">Select Material Color</option>
                                        @foreach (config('constants.jewellery.MATERIAL_COLOR') as $color)
                                            @php
                                                $colorName = strtolower(str_replace(' ', '_', $color));
                                            @endphp
                                            <option value="{{ $colorName }}"
                                                {{ old('material_color') == $colorName ? 'selected' : '' }}>
                                                {{ $color }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('material_color')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jewellery Type -->
                                <div class="col-3 form-group mb-2">
                                    <label for="jewellery_type" class="form-label">Jewellery Type</label>
                                    <select id="jewellery_type" name="jewellery_type" class="custom-select">
                                        <option value="">Select Jewellery Type</option>
                                        @foreach (config('constants.jewellery.JEWELLERY_TYPE') as $type)
                                            @php
                                                $typeName = strtolower(str_replace(' ', '_', $type));
                                            @endphp
                                            <option value="{{ $typeName }}"
                                                {{ old('jewellery_type') == $typeName ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jewellery_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Diamond Clarity -->
                                <div class="col-3 form-group mb-2">
                                    <label for="diamond_clarity" class="form-label">Diamond Clarity</label>
                                    <select id="diamond_clarity" name="diamond_clarity" class="custom-select">
                                        <option value="">Select Diamond Clarity</option>
                                        @foreach (config('constants.jewellery.DIAMOND_CLARITY') as $clarity)
                                            @php
                                                $clarityName = strtolower(str_replace(' ', '_', $clarity));
                                            @endphp
                                            <option value="{{ $clarityName }}"
                                                {{ old('diamond_clarity') == $clarityName ? 'selected' : '' }}>
                                                {{ $clarity }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('diamond_clarity')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Diamond Color -->
                                <div class="col-3 form-group mb-2">
                                    <label for="diamond_color" class="form-label">Diamond Color</label>
                                    <select id="diamond_color" name="diamond_color" class="custom-select">
                                        <option value="">Select Diamond Color</option>
                                        @foreach (config('constants.jewellery.DIAMOND_COLOR') as $color)
                                            @php
                                                $colorName = strtolower(str_replace(' ', '_', $color));
                                            @endphp
                                            <option value="{{ $colorName }}"
                                                {{ old('diamond_color') == $colorName ? 'selected' : '' }}>
                                                {{ $color }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('diamond_color')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Diamond Weight -->
                                <div class="col-3 form-group mb-2">
                                    <label for="diamond_weight" class="form-label">Diamond Weight</label>
                                    <input type="number" id="diamond_weight" name="diamond_weight" class="form-control"
                                    value="{{ old('diamond_weight') }}"> 
                                    @error('diamond_weight')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> 
                                <div class="col-3 form-group mb-2">
                                    <label for="no_of_diamonds" class="form-label">No of Diamonds</label>
                                    <input type="number" id="no_of_diamonds" name="no_of_diamonds" class="form-control"
                                        value="{{ old('no_of_diamonds') }}">
                                    @error('no_of_diamonds')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Diamond Shape -->
                                <div class="col-3 form-group mb-2">
                                    <label for="diamond_shape" class="form-label">Diamond Shape</label>
                                    <select id="diamond_shape" name="diamond_shape" class="custom-select">
                                        <option value="">Select Diamond Shape</option>
                                        @foreach (config('constants.jewellery.DIAMOND_SHAPE') as $shape)
                                            @php
                                                $shapeName = strtolower(str_replace(' ', '_', $shape));
                                            @endphp
                                            <option value="{{ $shapeName }}"
                                                {{ old('diamond_shape') == $shapeName ? 'selected' : '' }}>
                                                {{ $shape }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('diamond_shape')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Diamond Setting -->
                                <div class="col-3 form-group mb-2">
                                    <label for="diamond_setting" class="form-label">Diamond Setting</label>
                                    <select id="diamond_setting" name="diamond_setting" class="custom-select">
                                        <option value="">Select Diamond Setting</option>
                                        @foreach (config('constants.jewellery.DIAMOND_SETTING') as $setting)
                                            @php
                                                $settingName = strtolower(str_replace(' ', '_', $setting));
                                            @endphp
                                            <option value="{{ $settingName }}"
                                                {{ old('diamond_setting') == $settingName ? 'selected' : '' }}>
                                                {{ $setting }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('diamond_setting')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Diamond Price -->
                                <div class="col-3 form-group mb-2">
                                    <label for="diamond_price" class="form-label">Diamond Price</label>
                                    <input type="text" id="diamond_price" name="diamond_price" class="form-control"
                                        value="{{ old('diamond_price') }}">
                                    @error('diamond_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Metal -->
                                <div class="col-3 form-group mb-2">
                                    <label for="metal" class="form-label">Metal</label>
                                    <select id="metal" name="metal" class="custom-select">
                                        <option value="">Select Metal</option>
                                        @foreach (config('constants.jewellery.METAL') as $metal)
                                            @php
                                                $metalName = strtolower(str_replace(' ', '_', $metal));
                                            @endphp
                                            <option value="{{ $metalName }}"
                                                {{ old('metal') == $metalName ? 'selected' : '' }}>
                                                {{ $metal }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('metal')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gold Purity -->
                                <div class="col-3 form-group mb-3">
                                    <label for="gold_purity" class="form-label">Gold Purity</label>
                                    <input type="text" id="gold_purity" name="gold_purity" class="form-control"
                                        value="{{ old('gold_purity') }}">
                                    @error('gold_purity')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gold Price Per Gram -->
                                <div class="col-3 form-group mb-3">
                                    <label for="gold_price_per_gram" class="form-label">Gold Price Per Gram</label>
                                    <input type="text" id="gold_price_per_gram" name="gold_price_per_gram"
                                        class="form-control" value="{{ old('gold_price_per_gram') }}">
                                    @error('gold_price_per_gram')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div> 
                                <!-- Gold Weight in GM -->
                                <div class="col-3 form-group mb-3">
                                    <label for="gold_weight_in_gm" class="form-label">Gold Weight in GM</label>
                                    <input type="text" id="gold_weight_in_gm" name="gold_weight_in_gm"
                                        class="form-control" value="{{ old('gold_weight_in_gm') }}">
                                    @error('gold_weight_in_gm')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-3 form-group mb-3">
                                    <label for="making_charge" class="form-label">Making Charge</label>
                                    <input type="text" id="making_charge" name="making_charge" class="form-control"
                                        value="{{ old('making_charge') }}">
                                    @error('making_charge')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- GST -->
                                <div class="col-3 form-group mb-3">
                                    <label for="gst" class="form-label">GST</label>
                                    <input type="text" id="gst" name="gst" class="form-control"
                                        value="{{ old('gst') }}">
                                    @error('gst')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div> 
                    <button type="submit" class="btn btn-success mb-5">Submit</button>
                 </form>                    
               </div>
            </div> 
        </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('admin/helper.js') }}"></script>
    <script>
         $('#category_id').on('change', function() {
            var selectedCategory = $(this).find('option:selected').data('value');
           
            $('.category-input').find('input').val('');
            $('.category-input').hide(); 
            if (selectedCategory === 'bracelets' || selectedCategory === 'bangles' || selectedCategory === 'banglchainses' ||  selectedCategory==='mangalsutra') {
                $('#size_input').show();
            }else if (selectedCategory === 'pendants') {
                $('.pendant_input').show();
            } else if (selectedCategory === 'earrings') {
                $('.earrings_input').show();
            } else if (selectedCategory === 'nose-pin') {
                $('.nothing_input').show();
            } else if (selectedCategory === 'watchs') {
                $('.watchs_input').show();
            }
        });        
    </script>
@endpush
