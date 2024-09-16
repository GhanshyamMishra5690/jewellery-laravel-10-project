@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <style>
      .pdfobject-container { height: 500px; border: 1px solid #ccc; }
    </style>
@endpush
@extends('layouts.admin')

@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
          <div id="message"></div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Users</h3>
                <div class="card-tools p-0">
                    {{-- <a href="{{url('admin/user/create')}}" class="btn btn-primary btn-md">Create</a> --}}
                </div>
            </div>  
            <!-- /.card-header -->
            <div class="card-body">
                <table id="userDatatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Name</th>
                            <th>Email</th> 
                            <th>User Role</th>
                            <th>Status</th>
                            <th>Created Date</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                      <?php $i =0;  ?>
                      @foreach ($users as $user)
                      <?php $i++; ?>
                      
                        <tr>
                           <td>{{ $i }}</td>
                           <td>{{$user->name}}</td>
                           <td>{{ $user->email }}</td> 
                           <td>
                            @foreach (config('constants.USER_TYPES') as $key => $value )
                                @if ($user->userType == $value)
                                    <span class="badge bg-warning float-center">{{ $key}}</span>
                                 @endif  
                            @endforeach
                            
                          </td>
                           <td id="status_{{$user->id}}">
                            @if ($user->status == 0)
                              <span class="badge bg-danger float-center" id="status_{{$user->id}}">Pending</span>
                            @else
                              <span class="badge badge-success float-center" >Active</span></td>  
                            @endif 
                           <td>{{ $user->created_at->format('j M  Y ') }}</td>
                           <td>
                              @if ($user->userType == config('constants.USER_TYPES.WHOLESALER') )
                                <button  class="btn btn-info btn-sm" onclick="openPdfModal('{{ url('/document/view') }}','{{$user->id}}','{{ asset('storage/'.$user->document)}}')">
                                  KYC
                              </button>
                              @endif  
                              @if ($user->userType == config('constants.USER_TYPES.WHOLESALER') AND $user->status == 0)
                                  <button type="button" id="btn_{{$user->id}}" onclick="approveAccount('{{$user->id}}','{{ route('admin.user.approve') }}')" class="btn btn-primary btn-sm" >Approve</button>
                              @else 
                               <button id=" " class="btn btn-primary btn-sm " disabled>Approved</button>
                               @endif 
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
    <div class="modal fade bd-example-modal-lg" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">KYC Verification</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> 
                  <iframe id="document_pdfFrame" style="display: none; width: 100%; height: 500px;"></iframe> 
                  <img id="image_Frame" style="display: none; width: 100%; max-height: 500px;" />
                  <div id="error_message" style="display: none; color: red; text-align: center;">
                    Unable to display the file. Unsupported file type or invalid path.
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
            </div>
          </div>
        </div>
      </div>  
@endsection
@push('scripts')
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.3.0/pdfobject.min.js"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.6/pdfobject.min.js"></script> --}}


    <script>
      // $(function () {
      //   $("#example1").DataTable({
      //     "responsive": true, "lengthChange": false, "autoWidth": false,
      //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      //   $('#userDatatable').DataTable({
      //     "paging": true,
      //     "lengthChange": false,
      //     "searching": false,
      //     "ordering": true,
      //     "info": true,
      //     "autoWidth": false,
      //     "responsive": true,
      //   });
      // });
      function approveAccount(id, url){
          var id = id;
          var url = url;
          Swal.fire({
             
              title: "Are you sure?",
              text: "you want to approve this user?",
              icon: "info",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              confirmButtonText: "Yes, approved it!" 
             
            }).then((result) => {
              if(result.isConfirmed){
                $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  $.ajax({
                      url: url,
                      method: 'POST',
                      data: {
                        id: id,
                      }, 
                      success: function(response) { 
                        if(response.success){
                          $("#btn_"+id).prop("disabled", true);
                          $("#status_"+id).html("<span class='badge badge-success float-center'>Active</span>");
                          toastr.success(response.message) 
                        
                        } else {
                          toastr.error(response.message) 
                        }
                      },
                      error: function(xhr) {
                        toastr.error(response.message) 
                      }
                    });
              }         
            });
        };
      </script>
      
      <script src="https://unpkg.com/pdfobject"></script>

      <script>
         function openPdfModal(url, id, filepath) {
          var fileExtension = filepath.split('.').pop().toLowerCase();

          // Hide all elements initially
          document.getElementById('document_pdfFrame').style.display = 'none';
          document.getElementById('image_Frame').style.display = 'none';
          document.getElementById('error_message').style.display = 'none';

          if (fileExtension === 'pdf') {
              // If it's a PDF, show the PDF iframe
              let pdfUrl = "{{ url('/document/view') }}/" + id;
              document.getElementById('document_pdfFrame').src = pdfUrl;
              document.getElementById('document_pdfFrame').style.display = 'block';
          } else if (['jpg', 'jpeg', 'png', 'gif'].includes(fileExtension)) {
              // If it's an image, show the image element
              document.getElementById('image_Frame').src = filepath;
              document.getElementById('image_Frame').style.display = 'block';
          } else {
              // If the file type is unsupported or can't be extracted, show an error message
              document.getElementById('error_message').style.display = 'block';
          }

          // Show the modal
          $('#pdfModal').modal('show');
      }
    </script>
@endpush