document.addEventListener('DOMContentLoaded', function () {

    // Event listener for increment button
    $(document).on('click', '.increment-btn', function (e) {
        e.preventDefault();
        // Get the closest product data row and find the quantity input for that product
        var $productData = $(this).closest('.row'); // Get the closest product row
        var inc_value = $productData.find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;

        // Ensure the input value is a valid number before incrementing
        if (value < 10) {
            value++;
            $productData.find('.qty-input').val(value); // Update only this product's quantity
        }
    });

    // Event listener for decrement button
    $(document).on('click', '.decrement-btn', function (e) {
        e.preventDefault();

        var $productData = $(this).closest('.row'); // Get the closest product row
        var dec_value = $productData.find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;

        // Ensure the value is greater than 1 before decrementing
        if (value > 1) {
            value--;
            $productData.find('.qty-input').val(value); // Update only this product's quantity
        }
    });

    // Add to cart button click handler
    $(document).on('click', '.addToCartBtn', function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "post",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function (response) {
                swal.fire(response.status);
            }
        });
    });

    $(document).on('click', '.delete-cart-item', function (e) 
   { 
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var $productData = $(this).closest('.row');
        var prod_id = $productData.find('.prod_id').val();

        $.ajax({
            method: "post",
            url: "delete-cart-item",
            data: {
                'prod_id': prod_id,
            },
            success: function (response) {
                swal.fire(response.status);
                window.location.reload();
            }
        });
        
    });
    

    $(document).on('click', '.changeQuantity', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var $productData = $(this).closest('.row');
        var prod_id = $productData.find('.prod_id').val();
        var product_quantity = $productData.find('.qty-input').val();


        $.ajax({
            method: "post",
            url: "update-cart",
            data: {
                'prod_id': prod_id,
                'prod_qty':product_quantity,
            },
            success: function (response) {
                window.location.reload();
            }
        });
        
    });

    $(document).on('click', '.place-order-btn', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/place-order',
            method: 'get',
            success: function(response) {
                swal.fire(response.status); 
                window.location.reload();
            },
        });       
    });

    $(document).on('click', '.cancel-order-btn', function (e) {
        e.preventDefault();
    
        var orderId = $(this).data('id');
        var cancelUrl = '/cancel-order/' + orderId;
    
        $.ajax({
            url: cancelUrl,
            method: 'get',
            success: function(response) {
                swal.fire(response.status); // Display success message using SweetAlert
                setTimeout(function() {
                    window.location.reload(); // Reload the page after 2 seconds
                }, 2000); // Reload the page after successful deletion
            },
            error: function(xhr, status, error) {
                swal.fire("Something went wrong. Please try again."); // Handle any errors
            }
        });
    });
    
   

});
