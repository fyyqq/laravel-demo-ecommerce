$(document).ready(function() {
    
    loadCart();
    loadWish();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function loadCart() {
        $.ajax({
            type: 'GET',
            url: '/load-cart-data',
            success: function(res) {
                $('.cart-count').html(res.status);
            }
        });
    }

    function loadWish() {
        $.ajax({
            type: 'GET',
            url: '/load-wishlist-data',
            success: function(res) {
                $('.wishlist-count').html(res.status);
            }
        });
    }
// 
// 
// 
// 
// 
// 
//
function myAjax(proId, proQty) {
    $.ajax({
        type: 'POST',
        url: "/carts/update-cart",
        data: {
            input_value: proQty,
            product_id: proId
        },
        success: function(res) {
            $('.totalPrice').load(location.href + " .totalPrice");
        }
    });
}

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // increment button
    var inc_btn = document.querySelectorAll('.inc-btn');
    jQuery.each(inc_btn, function(i, val) {
        $(val).click(function(e) {
            e.preventDefault();
            
            var inputInc = $(this).siblings('.qty-input')[0];
            var incValue = $(this).siblings('.qty-input').val();
            var inputIncValue = parseInt(incValue);
            inputIncValue = isNaN(inputIncValue) ? 0 : inputIncValue;
            var quantityProduct = $(this).siblings('#quantity_product').val();
            if (inputIncValue < quantityProduct) {
                inputIncValue++;
                $(inputInc).val(inputIncValue);
                
                var inputValues = $(inputInc).val();
                var productId = $(this).closest('.input-group').find('.product_id').val();
 
                myAjax(productId, inputValues);
            }
        });
    });

    // decrement button
    var dec_btn = document.querySelectorAll('.dec-btn');
    jQuery.each(dec_btn, function(i, value) {
        $(value).click(function(e) {
            e.preventDefault();
            
            var inputDec = $(this).siblings('.qty-input')[0];
            var decValue = $(this).siblings('.qty-input').val();
            var inputDecValue = parseInt(decValue);
            inputDecValue = isNaN(inputDecValue) ? 0 : inputDecValue;
            if (inputDecValue > 1) {
                inputDecValue--;
                $(inputDec).val(inputDecValue);
                var inputValues = $(inputDec).val();
                var productId = $(this).closest('.input-group').find('.product_id').val();

                myAjax(productId, inputValues);
            }
        });
    });
// 
// 
// 
// 
// 
// 
// Delete Cart Items
    $(document).on('click', '.cart-delete', function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var pro_id = $(this.previousElementSibling).val();

        swal({
            text: "Are You Sure Want To Delete ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Your Item Has Been Deleted!", {
                icon: "success",
                });
                $.ajax({
                    method: "POST",
                    url: "/carts/cart-delete/" + pro_id,
                    data: {
                        product_id: pro_id
                    }, success: function(res) {
                        loadCart();
                        $('.cartItem').load(location.href + ' .cartItem');
                    }
                });
            }
        });
    });
    
    // Delete Wishlist Item
    $(document).on('click', '.wishlist-delete', function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = $(this).siblings('.product_id').val();

        swal({
            text: "Are You Sure Want To Remove From Wishlist ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Your Item Has Been Remove!", {
                icon: "success",
                });
                $.ajax({
                    method: 'POST',
                    url: '/wishlist/remove-wishlist/' + product_id,
                    data: {
                        prod_id: product_id
                    },
                    success: function(res) {
                        loadWish();
                        $('.wishlistItem').load(location.href + " .wishlistItem");
                    }
                });
            }
        });
    });
// 
// 
// 
// 
// 
// 
// 
// 
// Add to Cart in [ Product View ]
    $('.increment-btn').click(function(e) {
        e.preventDefault();

        var quantity = $('#quantity_product').val();

        var inc_input = $('.quantity-input').val();
        var value = parseInt(inc_input);
        value = isNaN(value) ? 0 : value;
        if (value < quantity) {
            value++;
            $('.quantity-input').val(value);
        }
    });
    
    $('.decrement-btn').click(function(e) {
        e.preventDefault();
        
        var dec_input = $('.quantity-input').val();
        var value = parseInt(dec_input);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $('.quantity-input').val(value);
        }
    });

    $('.cart-btn').click(function(e) {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        e.preventDefault();

        var quantity = $('.quantity-input').val();
        var id = $('.product_id').val();

       $.ajax({
            type: "POST",
            url: "/carts/add-to-cart",
            data: {
                product_quantity : quantity,
                product_id : id
            },
            success: function(res) {
                if (res.status == "Add") {
                    loadCart();
                    swal({
                        title: "Added To Cart",
                        text: "Your Item Has Been Add To Cart",
                        icon: "success",
                        button: "Exit",
                      });
                }
                if (res.status == "Exists") {
                    swal("Item Exists", "Your Item Already In Cart");
                }
                if (res.status == "Login") {
                    window.location.href = '/login';
                }
            }
        });
    });

// Add to Wishlist in [ Product View ]
    $('.wishlist-btn').on("click", function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        e.preventDefault();
        
        $(this).prop('disabled', true);
        
        var pro_id = $('.product_id').val();

        $.ajax({
            type: 'POST',
            url: "/wishlist/add-to-wishlist",
            data: {
                product_id: pro_id
            },
            success: function(res) {
                if (res.status == "Add") {
                    loadWish();
                    swal({
                        title: "Added To Wishlist",
                        text: "Your Item Has Been Add To Wishlist",
                        icon: "success",
                        button: "Exit",
                      });
                }

                if (res.status == "Exists") {
                    swal("Item Exists", "Your Item Already In Wishlist");
                }
                if (res.status == "Login") {
                    window.location.href = '/login';
                }
            }
        });
    });
});




$('#myForm').submit(function() {
    $(this).find('#checkout-btn').prop('disabled', true);
});
