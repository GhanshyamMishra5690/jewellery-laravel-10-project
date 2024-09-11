
@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Jewellery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Jewellery</li>
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
                    <div class="card-body">
                        <h5 class="card-title">{{ $jewellery->name }}</h5>
                        <p class="card-text"><strong>Product ID:</strong> {{ $jewellery->product_id }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $jewellery->description }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ number_format($jewellery->price, 2) }}</p>
                        <p class="card-text"><strong>Gross Weight:</strong> {{ $jewellery->gross_weight }}</p>
                        <p class="card-text"><strong>Size:</strong> {{ $jewellery->product_size }}</p>
                        <a href="{{ route('jewelleries.index') }}" class="btn btn-primary">Back to List</a>
                        <a href="{{ route('jewelleries.edit', $jewellery->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('jewelleries.destroy', $jewellery->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
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
