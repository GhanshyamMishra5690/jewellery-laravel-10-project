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
            <h1>Jewellery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Jewellery Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            @if(Session::has('success'))
              <div class="alert alert-success">
                  {{ Session::get('success') }}
              </div>
          @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Jewellery Category</h3>
                <div class="card-tools p-0">
                    <a href="{{ route('jewelleries.create') }}" class="btn btn-primary mb-3">Add Jewellery</a>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">  
              <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Gross Weight</th>
                            <th>Size</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jewelleries as $jewellery)
                        <tr>
                            <td>{{ $jewellery->id }}</td>
                            <td>{{ $jewellery->product_id }}</td>
                            <td>{{ $jewellery->name }}</td>
                            <td>{{ $jewellery->description }}</td>
                            <td>{{ $jewellery->price }}</td>
                            <td>{{ $jewellery->gross_weight }}</td>
                            <td>{{ $jewellery->product_size }}</td>
                            <td>
                                <a href="{{ route('jewelleries.edit', $jewellery->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('jewelleries.destroy', $jewellery->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div> 
    </section>
@endsection
@push('scripts')   
<script src="{{asset('admin/helper.js')}}"></script>
     
@endpush