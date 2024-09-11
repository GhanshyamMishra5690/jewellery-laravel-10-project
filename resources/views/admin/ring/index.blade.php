@push('styles')
   
@endpush
@extends('layouts.admin')

@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ring</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ring</li>
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
            

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Rings</h3>
                <div class="card-tools p-0">
                    <a href="{{url('admin/ring/create')}}" class="btn btn-primary btn-md">Create</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Setting Info</th>
                            <th>Stone Info</th>
                            <th>Setting/Stone Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($rings as $ring)
                          <tr>
                            <td>{{$ring->name}}</td>
                            <td>
                              <div class="col-7">
                                <p class="text-muted text-sm mb-0"><b>Shape: </b> {{$ring->shape}}</p>
                                <p class="text-muted text-sm mb-0"><b>Metal Type: </b> {{$ring->metal_style}}</p>
                                <p class="text-muted text-sm mb-0"><b>Setting Type: </b>  {{$ring->setting_style}}</p>
                                <p class="text-muted text-sm mb-0"><b>Band Type: </b>  {{$ring->band_type}}</p>
                                <p class="text-muted text-sm mb-0"><b>Setting Profile: </b>  {{$ring->setting_profile}}</p>
                              </div>
                            </td>
                            <td>
                              @if($ring->stoneType == 'lab-grown-diamond')
                              <div class="col-7">
                                <p class="text-muted text-sm mb-0"><b>Stone Type: </b> {{$ring->stoneType}}</p>
                                <p class="text-muted text-sm mb-0"><b>Shape: </b> {{$ring->stone_shape_type}}</p>
                                <p class="text-muted text-sm mb-0"><b>Carat: </b> {{$ring->stone_carat}}</p>
                                <p class="text-muted text-sm mb-0"><b>Price: </b>  {{$ring->stone_price}}</p>
                                <p class="text-muted text-sm mb-0"><b>Colour: </b>  {{$ring->stone_color}}</p>
                                <p class="text-muted text-sm mb-0"><b>Cut: </b>     {{$ring->stone_cut}}</p>
                                <p class="text-muted text-sm mb-0"><b>Clarity: </b>  {{$ring->stone_clarity}}</p>
                                <p class="text-muted text-sm mb-0"><b>Depth %: </b>  {{$ring->product}}</p>
                                <p class="text-muted text-sm mb-0"><b>Table %: </b>  {{$ring->stone_table}}</p>
                                <p class="text-muted text-sm mb-0"><b>Length/Width Ratio: </b>  {{$ring->stone_ratio}}</p>
                              </div>
                              @elseif ($ring->stoneType == 'coloured-lab-grown-diamond')
                                <div class="col-7">
                                  <p class="text-muted text-sm mb-0"><b>Stone Type: </b> {{$ring->stoneType}}</p>
                                  <p class="text-muted text-sm mb-0"><b>Shape: </b> {{$ring->stone_shape_type}}</p>
                                  <p class="text-muted text-sm mb-0"><b>Colour: </b>  {{$ring->stone_color}}</p>
                                  <p class="text-muted text-sm mb-0"><b>Clarity: </b>  {{$ring->stone_clarity}}</p> 
                                </div>
                              @elseif ($ring->stoneType == 'moissanite')
                              <div class="col-7">
                                <p class="text-muted text-sm mb-0"><b>Stone Type: </b> {{$ring->stoneType}}</p> 
                                <p class="text-muted text-sm mb-0"><b>Colour: </b>  {{$ring->stone_color}}</p>  
                              </div>
                              @elseif ($ring->stoneType == 'sapphire')
                              <div class="col-7">
                                <p class="text-muted text-sm mb-0"><b>Stone Type: </b>{{$ring->stoneType}}</p> 
                                <p class="text-muted text-sm mb-0"><b>Colour: </b>  {{$ring->stone_color}}</p>  
                              </div>
                              @endif
                            </td>
                            <td> 
                               
                              <div class="row">
                                  <div class="col-5  text-center">
                                    <img src="{{ asset('storage/'.$ring->setting_image) }}" alt="user-avatar" class="img-circle" style="max-width: 80px; max-height: 80px;">
                                   </div>
                                  <div class="col-5 text-center">
                                    <img src="{{url('storage/'.$ring->stone_image)}}" alt="user-avatar" class="img-circle " style="max-width: 80px; max-height: 80px;">
                                  </div>
                                </div>
                            </td>
                            <td >
                              <a href="{{ route('ring.show', $ring->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-folder"> </i> View</a>
                              <a href="{{ route('ring.edit', $ring->id) }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
                              <a href="{{ route('ring.destroy', $ring->id) }}" class="btn btn-danger btn-sm"
                                        onclick="event.preventDefault();   document.getElementById('destroy-user').submit();">
                                        <i class="fas fa-trash"></i> Delete</a>
                                <form id="destroy-user" action="{{ route('ring.destroy', $ring->id) }}" method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')
                              </form>

                              
                               
                            </td>
                        </tr>
                      @endforeach 
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                    </tfoot>
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
 
@endpush