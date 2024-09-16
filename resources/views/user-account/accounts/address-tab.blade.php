<div class="col-lg-9">      
    <h3 class="title">Billing Address</h3>
    <div class="axil-dashboard-account">
       <form action="{{route('user.update.address')}}" method="POST" id="dahboard_addressTab" enctype="multipart/form-data">
         @csrf 
          
        <input type="hidden" name="address_id" class="form-control" value="{{ $addressId }}">
           <div class="row">
               <div class="col-lg-6"> 
                   <div class="form-group">
                       <label>Street Address</label>
                       <input type="text" name="street_address" id="street_address" class="form-control"  value="{{ $street_address}}">
                       <span class="invalid-error" id="street_address-error"></span>
                   </div>
               </div> 
               <div class="col-lg-6">
                   <div class="form-group">
                       <label>City</label>
                       <input type="text" name="city" id="city" class="form-control"  value="{{$city}}">
                       <span class="invalid-error" id="city-error"></span>
                   </div>
               </div> 
               <div class="col-lg-6">
                   <div class="form-group">
                       <label>State</label>
                       <input type="text" name="state" id="state" class="form-control" value="{{$state}}">
                       <span class="invalid-error" id="state-error"></span>
                   </div>
               </div>
               <div class="col-lg-6">
                   <div class="form-group">
                       <label>Postal Code</label>
                       <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{$postal_code}}">
                       <span class="invalid-error" id="postal_code-error"></span>
                       
                   </div>
               </div> 
               <div class="col-lg-6 mt-2">
                   <div class="form-group">
                       <label>country</label>
                       <input id="country" type="text" class="form-control" name="country" value="{{$country}}">
                       <span class="invalid-error" id="country-error"></span>
                   </div>
               </div> 
               <div class="col-lg-12 mb-3">
                <div class="form-group input-group">
                    <input type="checkbox" id="checkbox1" name="is_shipping" >
                    <label for="checkbox1">Same As Billing Address</label>
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
<script>
 
</script>
@endpush