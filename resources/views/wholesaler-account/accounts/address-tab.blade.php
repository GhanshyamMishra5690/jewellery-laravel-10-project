<div class="col-lg-9">      
    <h3 class="title">Billing Address</h3>
    <div class="axil-dashboard-account">
       <form action="{{route('wholesaler.update.address')}}" method="POST" id="wholeSaler_addressTab" enctype="multipart/form-data">
         @csrf 
         
         <input type="hidden" name="user_id" class="form-control" value="{{auth()->user()->id}}"> 
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
   
    $('#wholeSaler_addressTab').validate({
        rules: {
            street_address: {
                required: true
            },
            city: {
                required: true
            },
            state: {
                required: true
            },
            postal_code: {
                required: true,
                digits: true, // Example rule for numeric only, adjust as needed
                minlength: 6, // Example rule, adjust as needed
                maxlength: 10 // Example rule, adjust as needed
            },
            country: {
                required: true
            }
            // Add more rules as needed for other fields
        },
        messages: {
            street_address: {
                required: "This field is required."
            },
            city: {
                required: "This field is required." 
            },
            state: {
                required: "This field is required." 
            },
            postal_code: {
                required: "This field is required.",
                digits: "Postal code must contain only digits.",
                minlength: "Postal code must be at least {0} characters long.",
                maxlength: "Postal code cannot be more than {0} characters long." 
            },
            country: {
                required: "This field is required." 
            }
             
        },
    errorElement: 'span',
    errorPlacement: function(error, element) {
        var id = element.attr('id');
        console.log(element.attr('id'));
        error.appendTo($('#' + id + '-error'));
    },
    submitHandler: function(form) {
        var formData = new FormData(form); 
        $('.invalid-error').empty(); 
        $.ajax({
            url: form.action,
            method: form.method,
            data: formData, 
            processData: false,
            contentType: false,
            success: function(response) { 
                if (response.success) {
                    $("#responseHandler").html('<div class="alert alert-success" role="alert">'+response.message+'</div>') 
                } else {  
                    $.each(response.errors, function(field, message) {
                        $('#' + field).addClass('is-invalid');
                        $('#' + field + '-error').text(message);
                    }); 
                }
            },
            error: function(response) {
                var errors = response.responseJSON.errors;
                $.each(errors, function(field, messages) {
                    $('#' + field + '-error').text(messages[0]);
                });
            }
        });
    }
});
</script>
@endpush