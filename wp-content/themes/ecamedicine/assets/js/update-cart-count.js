jQuery(document).ready(function($) {
    function updateHeaderCartCount() {
        $.ajax({
            url: my_ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'update_cart_count'
            },
            success: function(response) {
                $('.header-cart-count').text(response); // Adjust the selector based on your theme's HTML structure
            }
        });
    }

    // Update cart count on cart page update
    $(document.body).on('updated_cart_totals', function() {
        updateHeaderCartCount();
    });

    // Update cart count on any other action that might change the cart
    $(document.body).on('wc_fragments_refreshed wc_fragments_loaded', function() {
        updateHeaderCartCount();
    });
});
