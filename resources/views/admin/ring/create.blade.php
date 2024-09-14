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
                    <h1>Add Product</h1>
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
                            <a href="{{url('admin/ring')}}" class="btn btn-outline btn-md">Back</a>
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
                     <form action="{{ route('ring.store') }}" id="ringStore"  enctype="multipart/form-data">
                        @csrf
                      <div class="card-body">
                        <div class="row">
                             
                            <div class="col-4 form-group ">
                                <label for="exampleSelectRounded0">Name </label>
                                <input type="text"  id="name" name="name"  class="form-control" /> 
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span id="name-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group">
                                <label for="exampleSelectRounded0">Shape </label>
                                <select class="custom-select rounded-0" id="shape" name="shape">
                                    @foreach ($shapes as $row)
                                    <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endforeach
                                  
                                </select>
                                @error('shape')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <span id="shape-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group">
                                     <label for="exampleSelectRounded0">Metal Type </label>
                                    <select class="custom-select rounded-0" id="metal_type" name="metal_type">
                                        @foreach ($metal_types as $row)
                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('metal_type')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <span id="metal_type-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group mt-2">
                                <label for="exampleSelectRounded0">Setting Style</label>
                                <select class="custom-select rounded-0" id="setting_style" name="setting_style">
                                    @foreach ($setting_styles as $row)
                                    <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                                @error('setting_style')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span id="setting_style-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group mt-2">
                                <label for="exampleSelectRounded0">Band Type </label>
                                <select class="custom-select rounded-0" id="band_type" name="band_type">
                                    @foreach ($band_types as $row)
                                    <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                                 @error('setting_style')
                                      <div class="text-danger">{{ $message }}</div>
                                 @enderror
                                 <span id="band_type-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group mt-2">
                                <label for="exampleSelectRounded0">Setting Profile </label>
                                <select class="custom-select rounded-0" id="setting_profile" name="setting_profile">
                                    @foreach ($setting_profiles as $row)
                                    <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                                @error('setting_profile')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span id="setting_profile-error" class="invalid-feedback"></span>
                            </div>  
                            <div class="col-4 form-group mt-2">
                                <label for="exampleSelectRounded0">Image </label>
                                <input type="file" class="form-control" id="setting_image" name="setting_image" />
                                @error('setting_image')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span id="setting_image-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group mt-2">
                                <label for="exampleSelectRounded0">Setting User Price </label><br/>
                                <input type="text" id="setting_user_price" name="setting_user_price" class="form-control"/>
                                @error('setting_user_price')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span id="setting_user_price-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group mt-2">
                                <label for="exampleSelectRounded0">Setting Wholesaler Price </label><br/>
                                <input type="text" id="setting_wholesaler_price" name="setting_wholesaler_price" class="form-control"/>
                                @error('setting_wholesaler_price')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span id="setting_wholesaler_price-error" class="invalid-feedback"></span>
                            </div>
                            <div class="col-4 form-group mt-2">
                                <label for="exampleSelectRounded0">Description </label><br/>
                                <textarea cols="54" rows="5" id="setting_description" name="setting_description"></textarea>
                                @error('setting_description')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <span id="setting_description-error" class="invalid-feedback"></span>
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
                                <select class="custom-select rounded-0" id="stoneType" name="stoneType" onchange="updateFormFields()">
                                  <option value="">Select Stone Type</option>
                                  @foreach ($stone_types as $row)
                                  <option value="{{ \Str::slug($row->name)}}">{{$row->name}}</option>
                                  @endforeach
                                </select>
                                 @error('stoneType')
                                      <div class="text-danger">{{ $message }}</div>
                                 @enderror
                                 <span id="stoneType-error" class="invalid-feedback"></span>
                              </div>
                               <div class="col-4 form-group mt-2">
                                    <label for="exampleSelectRounded0">Image </label>
                                    <input type="file" class="form-control" id="stone_image" name="stone_image" />
                                    @error('stone_image')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <span id="stone_image-error" class="invalid-feedback"></span>
                                </div>
                                <div class="col-4 form-group mt-2">
                                    <label for="exampleSelectRounded0">Stone User Price </label><br/>
                                    <input type="text" id="stone_user_price" name="stone_user_price" class="form-control"/>
                                    @error('stone_user_price')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <span id="stone_user_price-error" class="invalid-feedback"></span>
                                </div>
                                <div class="col-4 form-group mt-2">
                                    <label for="exampleSelectRounded0">Stone Wholesaler Price </label><br/>
                                    <input type="text" id="stone_wholesaler_price" name="stone_wholesaler_price" class="form-control"/>
                                    @error('stone_wholesaler_price')
                                            <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <span id="stone_wholesaler_price-error" class="invalid-feedback"></span>
                                </div>
                        </div> 
                        <div class="row" id="additionalFields">
                             
                        </div>
                         
                      </div>
                      <!-- /.card-body -->
      
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
<script>
  
            $('#ringStore').validate({
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
                    setting_image: {
                        required: true
                    },
                    setting_description: {
                        required: true
                    },
                    setting_user_price: {
                        required: true
                    },
                    setting_wholesaler_price: {
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
                    stone_image: {
                        required: true
                    },
                    stone_price: {
                        required: true
                    },
                    stone_user_price: {
                        required: true
                    },
                    stone_wholesaler_price: {
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
                    setting_image: {
                        required: 'This field is required'
                    },
                    setting_description: {
                        required: 'This field is required'
                    },
                    setting_user_price: {
                        required: 'This field is required'
                    },
                    setting_wholesaler_price: {
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
                    },
                    stone_image: {
                        required: 'This field is required'
                    }  ,
                    stone_user_price: {
                        required: 'This field is required'
                    },
                    stone_wholesaler_price: {
                       required: 'This field is required'
                    },
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
                    $("#loader").show();
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
                            $("#loader").hide();
                            if(response.success){ 
                                window.location.href = response.url;
                                toastr.success(response.message)  
                            } else {
                                toastr.error(response.message)  
                            } 
                          
                        },
                        error: function(xhr) {
                            $("#loader").hide();
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
