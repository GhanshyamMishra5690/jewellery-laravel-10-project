
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
                  <!-- general form elements -->
                  <div class="card">
                    <div class="card-header ">
                        <div class="card-tools">
                            <a href="{{route('categories.index')}}" class="btn btn-primary btn-md">Back</a>
                        </div> 
                    </div> 
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                      <div class="card-body">
                        <div class="col-4 form-group mt-2">
                            <label for="gst">Category Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror 
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
<script src="{{asset('admin/helper.js')}}"></script>
@endpush
