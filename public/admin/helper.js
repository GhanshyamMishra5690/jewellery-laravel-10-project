$.validator.addMethod("fileExtension", function(value, element, param) {
    var extension = value.split('.').pop().toLowerCase();
    return this.optional(element) || $.inArray(extension, param) !== -1;
}, "Please upload a file with a valid extension (jpg, jpeg, png, gif, pdf).");

$.validator.addMethod("phoneNumber", function(value, element) {
    return this.optional(element) || /^[0-9]{10,15}$/.test(value);
}, "Please enter a valid phone number");


function previewImage(input, id) {
    var files = input.files;
    if (files) {
         
            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                if (file) {
                    var reader = new FileReader();
                     
                    reader.onload = function(event) {
                        
                        
                       if(id != 'create-jewellert-img' || id != 'edit-jewellert-img'){
                         $("#"+id).attr("src", event.target.result);
                       } else {
                        var img = $('<img>').attr('src', event.target.result)
                        .css({ 'width': '20px', 'height': 'auto', 'margin': '5px' }); 
                                $("#"+id).append(img);
                       }
                         
                    }; 
                    // Read the image file as a Data URL
                    reader.readAsDataURL(file);
                }
            }
        }
}

$(document).ready(function() {
    $('#adminProfileUpdate').on('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        $("#loader").show();
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $("#loader").hide();
                if(response.success){
                    toastr.success(response.message) 
                  } else {
                    toastr.error(response.message) 
                  } 
            },
            error: function (response) {
                $("#loader").hide();
                alert('Image upload failed: ' + response.responseJSON.message);
            }
        });
    });
 
    $('#salerUserForm').on('submit', function(e) {
        e.preventDefault();
        formData = new FormData(this);
            $("#front_message").html('');
        $.ajax({
            method: 'POST',
            url: $(this).attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    
                    $("#front_message").html('<div class="alert alert-success" role="alert">'+response.message+'</div>');
                } else {
                    $("#front_message").html('<div class="alert alert-danger"  role="alert">'+response.message+'</div>');
                }
            },
            error: function(xhr) { 
                if (xhr.status === 422) {
                    // Validation error
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '';
                    let errorList = $('#errorMessages ul');
                    errorList.empty();
                        for (let field in errors) {
                            errors[field].forEach(error => {
                                errorList.append('<li class="text-danger">' + error + '</li>');
                            });
                        }
                        $('#errorMessages').show();
                    } else {
                        alert('An error occurred. Please try again.');
                    }
            }
        });
    }); 

    


    $('#prod_search').on('keyup', function() {
        var query = $(this).val();
        var productDetailsUrl = $("#prod_search_url").data('url')
        if (query.length > 2) { // Add a condition to minimize unnecessary requests
            $.ajax({
                url: '/search', // Change this to your server's search endpoint
                type: 'GET',
                data: { name: query },
                success: function(data) {
                    $('#searchProductList').html(''); 
                    
                    
                    data.forEach(function(product) {
                        $('#searchProductList').append(
                            '<div class="axil-product-list">' +
                                '<div class="thumbnail" style="width: 100px !important;">' +
                                    '<a href="' + productDetailsUrl + '/' + product.slug + '">' +
                                        '<img src="' + product.full_stone_image + '" alt="' + product.name + '">' +
                                    '</a>' +
                                '</div>' +
                                '<div class="product-content">' +
                                    '<div class="product-rating">' +
                                        '<span class="rating-icon">' +
                                            '<i class="fas fa-star"></i>' +
                                            '<i class="fas fa-star"></i>' +
                                            '<i class="fas fa-star"></i>' +
                                            '<i class="fas fa-star"></i>' +
                                            '<i class="fal fa-star"></i>' +
                                        '</span>' +
                                        '<span class="rating-number"><span>100+</span> Reviews</span>' +
                                    '</div>' +
                                    '<h6 class="product-title"><a href="' + productDetailsUrl + '/' + product.slug + '">' + product.name + '</a></h6>' +
                                    '<div class="product-price-variant">' +
                                        '<span class="price current-price">$29.99</span>' +
                                        '<span class="price old-price">$49.99</span>' +
                                    '</div>' +
                                    '<div class="product-cart">' +
                                        '<a href="#" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>' +
                                        '<a href="#" class="cart-btn"><i class="fal fa-heart"></i></a>' +
                                    '</div>' +
                                '</div>' +
                            '</div>'
                        );
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        } else {
            $('#searchProductList').html('<div class="axil-product-list"><h2>Data Not found.</h2> </div>');
        }
    });

    //Register here
    
    $('#userType').on('change', function() {
        var selectedValue = $(this).val(); 
        if (selectedValue == 'wholesaler') {
            $('#show_document_container').show();
        } else {
            $('#show_document_container').hide();
        }
    });
    $.validator.addMethod("filesize", function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param * 10024);
    });  
    // Initialize form validation
    $('#registerFormValidate').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 15,
                phoneNumber: true
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            },
            userType: {
                required: true
            },
            document: {
                required: true, 
                filesize: 10240,
                fileExtension: ["jpg", "jpeg", "png", "gif", "pdf"]
            }
        },
        messages: {
            name: {
                required: "This field is required.",
                minlength: "Your name must be at least 2 characters long."
            },
            email: {
                required: "This field is required.",
                email: "Please enter a valid email address."
            },
            phone: {
                required: "This field is required.",
                digits: "Please enter only numbers",
                minlength: "Your phone number must be at least 10 digits long",
                maxlength: "Your phone number must be no more than 15 digits long",
                phoneNumber: "Please enter a valid phone number"
            },
            password: {
                required: "This field is required.",
                minlength: "Your password must be at least 8 characters long."
            },
            password_confirmation: {
                required: "This field is required.",
                equalTo: "Your passwords do not match."
            },
            userType: {
                required: "This field is required."
            },
            document: {
                required: "This field is required.",
                filesize: "File size must be less than 10MB.",
                fileExtension: "Only image files (jpg, jpeg, png, gif) or PDF files are allowed."
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        submitHandler: function(form) {
            $("#loader").show();
            var $submitButton = $("#submitRegister");
            $submitButton.text("Loading...");
            $submitButton.prop("disabled", true);
            var formData = new FormData(form);
            $('.invalid-feedback').empty();
            $('.form-control').removeClass('is-invalid');
            $.ajax({
                url: form.action,
                type: form.method,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                     $("#loader").hide();
                    $submitButton.text("Submit");
                    $submitButton.prop("disabled", false);
                    if (response.success) {
                        
                      window.location.href = response.redirect_url;
                    } else { 
                        if (response.errors) {
                            $.each(response.errors, function(field, message) {
                                $('#' + field + '-error').text(message);
                            });
                        }
                    }
                },
                error: function(response) { 
                    $submitButton.text("Submit");
                    $submitButton.prop("disabled", false);
                    $("#loader").hide();
                    var errors = response.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        $('#' + field).addClass('is-invalid');
                        $('#' + field + '-error').text(messages[0]);
                    });
                }
            });
        }
    }); 
 
        $('#login_form').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8
                }
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a valid email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    
    $('#otpVerification').validate({
        rules: {
            otp: {
                required: true, 
            } 
        },
        messages: {
            otp: {
                required: "This field is required.", 
            } 
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            var id = element.attr('id');
            console.log(element.attr('id'));
            error.appendTo($('#' + id + '-error'));
        },
        submitHandler: function(form) {
            $("#loader").show();
            var $submitButton = $("#submitRegister");
            $submitButton.text("Loading...");
            $submitButton.prop("disabled", true);
            var formData = new FormData(form);
            $('.invalid-feedback').empty();
            $('.form-control').removeClass('is-invalid');
           
            $.ajax({
                url: form.action,
                type: form.method,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $("#loader").hide();
                    $submitButton.text("Submit");
                    $submitButton.prop("disabled", false);
                    if (response.success) {
                        
                      window.location.href = response.redirect_url;
                    } else {
                        console.log(response);
                        if (response.errors) {
                            $.each(response.errors, function(field, message) {
                                $('#' + field + '-error').text(message);
                            });
                        }
                    }
                },
                error: function(response) {
                    $("#loader").hide();
                    var errors = response.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        $('#' + field).addClass('is-invalid');
                        $('#' + field + '-error').text(messages[0]);
                    });
                }
            });
        }
    });
     
    
    setTimeout(function() {
        $('#responseHandler').html(''); // or $('#message').html('');
    }, 10000);   


    
});

function logoutUser(id, url){ 
     $.ajax({
        url: url,
        type: 'DELETE',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if(response.success){
                $('#item_row_' + id).remove();
                toastr.success(response.message) 
              } else {
                toastr.error(response.message) 
              } 
        },
        error: function(response) {
            toastr.error("Something went wrong?") 
            
        }
    }); 

}
$.validator.addMethod('exists', function(value, element, params) {
    var isValid = false;
    var id = $("#jewellery_id").val();
    if(!id){
        var id = 0;
    } 
    $.ajax({
        url: params.url,
        type: 'POST',
        async: false,
        data: { product_id: value, jwlid: id },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            isValid = !response.exists; // Valid if the product_id does NOT exist
        },
        error: function() {
            isValid = false;
        }
    });
    return isValid;
}, 'Product ID is already taken.');
$('#jewelleriesCreate').validate({
    rules: {
        category_id: {
            required: true, 
        },
        product_id: {
            required: true, 
            exists: { url: '/check-product-id' }
        },
        name: {
            required: true, 
        },
        gender: {
            required: true, 
        },
        price: {
            required: true,
            number: true,  
        },
        gross_weight:{
            required: true,
            number: true,
        },
        
        description:{
            required: true, 
        },
        occasion: {
            required: true
        },
        material_color: {
            required: true
        },
        jewellery_type: {
            required: true
        },
        diamond_clarity: {
            required: true
        },
        diamond_color: {
            required: true
        },
        diamond_weight: {
            required: true
        },
        no_of_diamonds: {
            required: true
        },
        diamond_shape: {
            required: true
        },
        diamond_setting: {
            required: true
        },
        diamond_price: {
            required: true,
            number: true
        },
        metal: {
            required: true
        },
        gold_purity: {
            required: true
        },
        gold_price_per_gram: {
            required: true,
            number: true
        },
        gold_weight_in_gm: {
            required: true,
            number: true
        },
        making_charge: {
            required: true,
            number: true
        },
        gst: {
            required: true,
            number: true
        },
        product_images: {
            required: true, 
            extension: "jpeg|png|jpg|gif|png",
            filesize: 10048
        } 
    },
    messages: {
        category_id: {
            required: 'This field is required.', 
        },
        product_id: {
            required: 'This field is required.',
            exists: 'Product ID is already taken.'
        },
        name: {
            required: 'This field is required.', 
        },
        gender: {
            required: 'This field is required.',  
        },
        price: {
            required: 'This field is required.',  
            number: 'Please enter a valid number for the price.', 
        },
        gross_weight:{
            required: 'This field is required.', 
            number: 'Please enter a valid number for the weight.',
        },
         
        description:{
            required: 'This field is required.', 
        },
        occasion: "This field is required.",
        material_color: "This field is required.",
        jewellery_type: "This field is required.",
        diamond_clarity: "This field is required.",
        diamond_color: "This field is required.",
        diamond_weight: "This field is required.",
        no_of_diamonds: "This field is required.",
        diamond_shape: "This field is required.",
        diamond_setting: "This field is required.",
        diamond_price: {
            required: "This field is required.",
            number: "Please enter a valid number."
        },
        metal: "This field is required.",
        gold_purity: "This field is required.",
        gold_price_per_gram: {
            required: "This field is required.",
            number: "Please enter a valid number."
        },
        gold_weight_in_gm: {
            required: "This field is required.",
            number: "Please enter a valid number."
        },
        making_charge: {
            required: "This field is required.",
            number: "Please enter a valid number."
        },
        gst: {
            required: "This field is required.",
            number: "Please enter a valid number."
        }, 
        product_images: {
            required: "At least three images are required.", 
            extension: "Only jpeg, png, jpg, and gif formats are allowed.",
            filesize: "Each image should not be larger than 2MB."
        } 
    },
    errorElement: "span",
    errorPlacement: function(error, element) {
        error.addClass("invalid-feedback");
        element.closest(".form-group").addClass("has-error");
        error.insertAfter(element);
    }, 
    submitHandler: function(form) {
        $("#loader").show();
        var formData = new FormData(form);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        $.ajax({
            url: form.action,
            type: 'POST', 
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $("#loader").hide();
                if (response.success) {
                     form.reset();
                     window.location.href = response.redirect;
                     toastr.success(response.message); 
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(xhr) {
                $("#loader").hide();
                if(xhr.responseJSON.errors){
                    var errors = xhr.responseJSON.errors; // Get the 'errors' object from the response
 
                    // Loop through each error
                    $.each(errors, function (field, messages) {
                        var element = $('#' + field); // Get the element by its ID
                        
                        // Create or update the error message span
                        var errorId = field + '-error';
                        var errorMessage = $('<span>').attr({
                            'id': errorId,
                            'class': 'error invalid-feedback',
                            'style': 'display: inline;'
                        }).text(messages[0]); // Get the first error message
                        
                        // Ensure the error span is updated
                        if (!$('#' + errorId).length) {
                            errorMessage.insertAfter(element); // Insert after element if not present
                        } else {
                            $('#' + errorId).replaceWith(errorMessage); // Replace existing error span
                        }
                        
                        // Add error class to the parent form-group
                        element.closest(".form-group").addClass("has-error");
                    });
                } else {
                    toastr.error('Something went wrong. Please try again.');
                }
               
            }
        });
    }
});

  
$('#dahboard_addressTab').validate({
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
            $("#loader").hide();
            if(response.success){
                toastr.success(response.message) 
              } else {
                toastr.error(response.message) 
              }   
        },
        error: function(response) {
            $("#loader").hide();
            var errors = response.responseJSON.errors;
            $.each(errors, function(field, messages) {
                $('#' + field + '-error').text(messages[0]);
            });
        }
    });
}
});

$("#dashboardAccount").validate({
    rules: {
        name: {
            required: true,
            minlength: 3
        },
        email: {
            required: true,
            email: true
        },
        phone: {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 15
        },
        dob: {
            required: true,
            date: true
        },
        password: {
           minlength: 8
        },
        password_confirmation: {
            equalTo: "#password"
        },
        profile_image: {
            required: function (element) {
                return $("#profile_image").val() !== ''; // Validate if value exists
            },
            extension: "jpg|jpeg|png|gif"
        }
    },
    messages: {
        name: {
            required: "This field is required.",
            minlength: "Name must be at least 3 characters long"
        },
        email: {
            required: "This field is required.",
            email: "Please enter a valid email address"
        },
        phone: {
            required: "This field is required.",
            digits: "Please enter only digits",
            minlength: "Phone number must be at least 10 digits",
            maxlength: "Phone number must not exceed 15 digits"
        },
        
        dob: {
            required: "Please select your date of birth"
        },
        password: {
            required: "This field is required.",
            minlength: "Your password must be at least 6 characters long"
        },
        password_confirmation: {
            equalTo: "Password confirmation does not match"
        },
        profile_image: {
            extension: "Only image files (jpg, jpeg, png, gif) are allowed"
        }
    },
    errorElement: "span",
    errorPlacement: function(error, element) {
        error.addClass("invalid-feedback");
        element.closest(".form-group").addClass("has-error");
        error.insertAfter(element);
    },
    submitHandler: function(form) {
        $("#loader").show();
        var formData = new FormData(form);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 
        $.ajax({
            url: form.action,
            type: 'POST', 
            data: formData,  
            processData: false, 
            contentType: false,
            success: function(response) {
                $("#loader").hide();
                if (response.success) { 
                     toastr.success(response.message);
                     location.reload(); 
                } else {
                    toastr.error(response.message); 
                }
            },
            error: function(xhr) {
                $("#loader").hide();
                var errors = xhr.responseJSON.errors;
                $.each(errors, function (field, messages) {
                    var element = $('#' + field); // Get the element by its ID
                    
                    // Create or update the error message span
                    var errorId = field + '-error';
                    var errorMessage = $('<span>').attr({
                        'id': errorId,
                        'class': 'error invalid-feedback',
                        'style': 'display: inline;'
                    }).text(messages[0]); // Get the first error message
                    
                    // Ensure the error span is updated
                    if (!$('#' + errorId).length) {
                        errorMessage.insertAfter(element); // Insert after element if not present
                    } else {
                        $('#' + errorId).replaceWith(errorMessage); // Replace existing error span
                    }
                    
                    // Add error class to the parent form-group
                    element.closest(".form-group").addClass("has-error");
                });
               
            }
        });
    }
});

