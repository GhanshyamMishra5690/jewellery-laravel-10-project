function checkLoginStatus(callback) {
    $.get('/check-login-status', function(data) {
        callback(data.isLoggedIn);
    });
}

function scrollToTop() {
    //$('html, body').animate({ scrollTop: 0 }, 'slow');
} 
 
 
function addToCart(productId, productPrice, action){
    if(action == 'REMOVE'){
        removeWishlist(productId);
    }
    if(productPrice == 0){
        toastr.error('Unable to select price')
        return true;
    }
    var inputValues = {};
    $('.get-cart-field').each(function() { 
        var name = $(this).attr('name');
        var value = $(this).val(); 
        if(name== 'quantity_qty'){
            inputValues['quantity'] = value;
        }
        inputValues[name] = value;
    });

    inputValues['product_id'] = productId;   
    inputValues['product_price'] = productPrice;   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    $.ajax({
        url: baseUrl + '/create-cart',  
        method: 'POST', 
        data:inputValues, 
        success: function(response) {  
            if (response.success) {
                getCartItemCount(); 
                toastr.success(response.message)
            } else if(response.info){
                toastr.info(response.message)
            } else {
                toastr.error(response.message)
            }
        },
        error: function(xhr) {
            toastr.error(xhr.responseText) 
        } 
    });
}

 function clearCart(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    $.ajax({
        url: baseUrl + '/cart/clear',
        type: 'POST', 
        success: function(response) {
            if (response.status === 'success') {
                toastr.success(response.message); // Show success message
                 window.reload();
            } else {
                toastr.error(response.message); // Show error message
            }
        },
        error: function(response) {
            toastr.error('Something went wrong. Please try again.');
        }
    });
 }
function removeWishlist(productId) {
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: baseUrl + '/wishlist/remove',
        type: 'POST',
        data: {
            product_id: productId, 
        }, 
        success: function(response) { 
            if (response.success) { 
                $("#wishlist_row_"+productId).remove();
                toastr.success(response.message)
            } else {
                toastr.error(response.message)
            }
        },
        error: function(xhr) {
            toastr.error(xhr.responseText) 
        } 
    });
};

// Wishlist

function addWishList(productId){
     
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: baseUrl + '/wishlist/add',
        type: 'POST',
        data: {
            product_id: productId, 
        },
        success: function(response) { 
            if (response.success) { 
                toastr.success(response.message)
            } else if(response.info){
                toastr.info(response.message)
            } else {
                toastr.error(response.message)
            }
        },
        error: function(xhr) {
            toastr.error(xhr.responseText) 
        } 
    });
}
function showProduct(slug){
        
    $.ajax({
        url: baseUrl+ '/product-view/' + slug,
        method: 'GET',
        success: function(response) {
            $('#modal-body').html(response);
            $('#productModal').modal('show');
        }
    });
}
function getCartItemCount() {
    $.ajax({
        url: '/cart/item-total', // Laravel route
        method: 'GET',
        success: function(response) {
          
            $('#cartItemCount').text( response.total);
        },
        error: function(xhr, status, error) {
            //console.error('Error fetching cart total:', error);
        }
    });
}
$(document).ready(function() {
    getCartItemCount();
});


//Cart Area := Update cart quantity or amount 
function updateCartAmounts() {
    let totalAmount = 0;

    // Iterate through each item and calculate the subtotal and total amount
    $('.quantity_input').each(function() {
        const itemId = $(this).closest('tr').data('item-id');
        const quantity = parseInt($(this).val(), 10);
        const price = parseFloat($(this).closest('tr').find('.item-price').text());
        
        // Ensure that price and quantity are valid numbers
        if (!isNaN(quantity) && !isNaN(price)) {
            const subtotal = quantity * price;
            
            // Update the subtotal in the DOM
            $(this).closest('tr').find('.item-subtotal').text(subtotal.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ','));
            
            // Add the subtotal to the total amount
            totalAmount += subtotal;
        }
    });
   
      $('#cart_subtotal').text(totalAmount.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',')); 
     $('.cart_subtotal_input').val(totalAmount);
}
 
$('.product-inc').on('click', function() {
    var $quantityInput = $('#quantity_qty');
    var currentValue = parseInt($quantityInput.val(), 10);
    $quantityInput.val(currentValue + 1);
    
});
 
$('.product-dec').on('click', function() {
    var $quantityInput = $('#quantity_qty');
    var currentValue = parseInt($quantityInput.val(), 10);
    if (currentValue > 1) {
        $quantityInput.val(currentValue - 1);
    }
});


//Cart page

// Increment quantity
$('.inc').on('click', function() {
    const $input = $(this).siblings('.quantity_input'); 
    var qty = parseInt($input.val()) + 1;
    $input.val(qty);
    updateCartAmounts();
    const cartId = $(this).attr('data-cart-id');
    cartQuantity(cartId,qty)
});

// Decrement quantity
$('.dec').on('click', function() {
    const $input = $(this).siblings('.quantity_input'); 
    if ($input.val() > 1) {
        var qty = parseInt($input.val()) - 1;
        $input.val(qty); 
        updateCartAmounts();
        const cartId = $(this).attr('data-cart-id');
        cartQuantity(cartId,qty)
    }
});

// Update subtotal on quantity input change
$('.quantity_input').on('change', function() {
    const $input = $(this);
    const minValue = parseInt($input.attr('min')) || 1;
    const value = parseInt($input.val()) || minValue;
    $input.val(value < minValue ? minValue : value);
    updateCartAmounts();
});

function cartQuantity(cartId,quantity){ 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }); 
    $.ajax({
        url: baseUrl + '/update-quantity',  
        method: 'POST', 
        data: {
            cart_item_id : cartId,
            quantity: quantity
        }, 
        success: function(response) { 
            
        } 
    });
}

    

// -------------------------CHECKOUT AREA------------------------
$('#default_address').click(function() {
    if ($(this).is(':checked')) {
         $('#shipping_address').find('input,select').each(function() {
            var fieldName = $(this).attr('name');
            console.log(fieldName)
            $("input[name='"+fieldName+"']").prop('disabled', true); 
            $("select[name='country_id']").prop('disabled', true); 
        });
    } else {
        // Enable all input and select fields in the form
        $('#shipping_address').find('input,select').each(function() {
            var fieldName = $(this).attr('name');
            $("input[name='"+fieldName+"']").prop('disabled', false); 
            $("select[name='country_id']").prop('disabled', true); 
        });
    }
});

