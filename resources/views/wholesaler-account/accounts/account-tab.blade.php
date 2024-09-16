<div class="col-lg-9">  
     <div class="axil-dashboard-account">
       <form action="{{route('wholesaler.update.profile')}}" method="POST"  id="dashboardAccount"  enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="user_id" class="form-control" value="{{auth()->user()->id}}">
           <div class="row">
               <div class="col-lg-6">
                   <div class="form-group">
                       <label>Name</label>
                       <input type="text" name="name" class="form-control" value="{{auth()->user()->name}}">
                       <span class="invalid-error" id="name-error"></span>
                   </div>
               </div> 
               <div class="col-lg-6">
                   <div class="form-group">
                       <label>Email</label>
                       <input type="text" name="email" class="form-control" value="{{auth()->user()->email}}" disabled>
                       
                   </div>
               </div> 
               <div class="col-lg-6">
                   <div class="form-group">
                       <label>Phone</label>
                       <input type="number" name="phone" class="form-control" value="{{auth()->user()->phone}}">
                         
                   </div>
               </div>
               <div class="col-lg-6">
                   <div class="form-group">
                       <label>Date of Birth</label>
                       <input type="date" name="dob" class="form-control" value="{{auth()->user()->dob}}">
                       
                   </div>
               </div>
               <div class="row">
                <div class="col-lg-6 mb-1">
                    <label class="  mb-3" style="font-size:14px ">Upload Profile</label>
                    <input type="file" name="avatar" id="avatar" class="file-upload" onchange="previewImage(this,'saler-user-img')"/>
                     
                </div> 
               </div>
               <div class="col-lg-6 mt-1">
                   <div class="form-group">
                       <label>New Password</label>
                       <input id="password" type="password" class="form-control" name="password" >
                       
                   </div>
               </div> 
               <div class="col-lg-6  mt-1">
                   <div class="form-group">
                       <label>Confirm New Password</label>
                       <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" >
                      
                   </div>
               </div> 
               <div class="form-group mb--0">
                   <input type="submit" class="axil-btn" value="Save Changes">
               </div>
           </div>
       </form>
   </div>
</div>
@push('scripts')
 
@endpush