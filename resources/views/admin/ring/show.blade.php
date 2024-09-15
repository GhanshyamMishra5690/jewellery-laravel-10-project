@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Show Product</li>
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
                            <h3 class="card-title">Setting Details</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-4 form-group ">
                                    <label>Name : <b>{{ $ring->name }}</b> </label>

                                </div>
                                <div class="col-4 form-group">
                                    <label>Shape : <b>{{ $ring->shape }}</b> </label>
                                </div>
                                <div class="col-4 form-group">
                                    <label>Metal Type : <b>{{ $ring->metal_type }}</b>
                                    </label>
                                </div>
                                <div class="col-4 form-group mt-2">
                                    <label>Setting Style :
                                        <b>{{ $ring->setting_style }}</b></label>
                                </div>
                                <div class="col-4 form-group mt-2">
                                    <label>Band Type : <b>{{ $ring->band_type }}</b> </label>
                                </div>
                                <div class="col-4 form-group mt-2">
                                    <label>Setting Profile :
                                        <b>{{ $ring->setting_profile }}</b> </label>
                                </div>
                                <div class="col-4 form-group mt-2">
                                    <label>Description :
                                        <b>{{ $ring->setting_description }}</b> </label>
                                </div>
                                <div class="col-4 form-group mt-2">
                                    <label>Image : <b>---- </b></label>
                                    <img src="{{asset('storage/'.$ring->setting_image)}}" width="100px" class="img-responsive" />
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
                                    <label for="stoneType">Stone Type : <b>{{ $ring->stoneType }}</b></label>
                                </div>
                                <div class="col-4 form-group mt-2">
                                    <label>Image : <b> </b> </label>
                                    <img src="{{asset('storage/'.$ring->stone_image)}}" width="100px" class="img-responsive" />
                                </div>
                            </div>
                            @if ($ring->stoneType == 'lab-grown-diamond"')
                                <div class="row">
                                    <div class="col-4 mt-2">
                                        <label>Shape : <b>{{ $ring->stone_shape_type }}</b> </label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label for="shape">Carat : <b>{{ $ring->stone_carat }}</b></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label for="shape">Price : <b>{{ $ring->stone_price }}</b></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label>Colour : <b>{{ $ring->stone_color }}</b></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label>Cut : <b>{{ $ring->stone_cut }}</b></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label>Clarity : <b>{{ $ring->stone_clarity }}</b></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label for="shape">Depth % : <b>{{ $ring->stone_depth }}</b></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label for="shape">Table % : <b>{{ $ring->stone_table }}</label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label for="shape">Length/Width Ratio : <b>{{ $ring->stone_ratio }}</label> 
                                    </div>
                                </div>  
                            @elseif ($ring->stoneType == 'coloured-lab-grown-diamond')
                                <div class="row">
                                    <div class="col-4 mt-2">
                                        <label>Shape : <b>{{ $ring->stone_shape_type }}</b> </label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label>Colour : <b>{{ $ring->stone_color }}</b></label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label>Clarity : <b>{{ $ring->stone_clarity }}</b></label> 
                                    </div> 
                                </div>  
                            @elseif ($ring->stoneType == 'moissanite')
                                <div class="row">
                                    <div class="col-4 mt-2">
                                        <label>Shape : <b>{{ $ring->stone_shape_type }}</b> </label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label>Colour : <b>{{ $ring->stone_color }}</b></label> 
                                    </div> 
                                </div>
                            @elseif ($ring->stoneType == 'sapphire')
                                <div class="row">
                                    <div class="col-4 mt-2">
                                        <label>Shape : <b>{{ $ring->stone_shape_type }}</b> </label> 
                                    </div>
                                    <div class="col-4 mt-2">
                                        <label>Colour : <b>{{ $ring->stone_color }}</b></label> 
                                    </div> 
                                </div>
                            @endif
                          
                        </div> 
                    </div>
                </div>
                <!--/.col (left) -->

            </div>
        </div>
    </section>
@endsection
