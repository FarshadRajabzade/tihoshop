$('.single_add_to_cart_button').on('click', function(e) {
    e.preventDefault();
});

jQuery(document).ready(function($) {
    $('.single_add_to_cart_button').on('click', function(e){
        e.preventDefault();
        $thisbutton = $(this),
            $form = $thisbutton.closest('form.cart'),
            id = $thisbutton.val(),
            product_qty = $form.find('input[name=quantity]').val() || 1,
            product_id = $form.find('input[name=product_id]').val() || id,
            variation_id = $form.find('input[name=variation_id]').val() || 0;
        var data = {
            action: 'ql_woocommerce_ajax_add_to_cart',
            product_id: product_id,
            product_sku: '',
            quantity: product_qty,
            variation_id: variation_id,
        };
        $.ajax({
            type: 'post',
            url: wc_add_to_cart_params.ajax_url,
            data: data,
            beforeSend: function (response) {
                $thisbutton.html('<div class="add-to-cart-loader">\n' +
                    '                <svg xmlns="http://www.w3.org/2000/svg" style="margin: auto;"\n' +
                    '                     width="30px" height="30px" viewBox="0 0 100 100"\n' +
                    '                     preserveAspectRatio="xMidYMid">\n' +
                    '                    <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#ffa701"\n' +
                    '                            stroke-dasharray="50.26548245743669 50.26548245743669"\n' +
                    '                            fill="none" stroke-linecap="round">\n' +
                    '                        <animateTransform attributeName="transform" type="rotate"\n' +
                    '                                          repeatCount="indefinite" dur="1s" keyTimes="0;1"\n' +
                    '                                          values="0 50 50;360 50 50"/>\n' +
                    '                    </circle>\n' +
                    '                </svg>\n' +
                    '            </div>');
            },
            complete: function (response) {
                $thisbutton.html(
                    '<i class="fi fi-rr-shopping-bag-add ms-2"></i>' +
                    'افزودن به سبد خرید'
                );
            },
            success: function (response) {
                if (response.error & response.product_url) {
                    window.location = response.product_url;
                    return;
                } else {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'محصول به سبد خرید اضافه شد'
                    })
                }
            },
        });
    });
});
