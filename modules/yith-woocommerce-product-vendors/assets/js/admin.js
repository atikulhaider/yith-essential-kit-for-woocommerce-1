(function ($) {

    /* WooCommerce Options Deps */
    $.fn.yith_wpv_option_deps = function( dep, type, disabled_value, readonly ){

        var main_option = $(this),
            disable     = $(dep).parents('tr'),
            get_value   = function( type ){
                if (type == 'checkbox') {
                    return main_option.attr('checked');
                }

                if (type == 'select') {
                    return main_option.val();
                }
            },

            value       = get_value( type );

        var disable_opt = function(){
                disable.css('opacity', '0.3');
                disable.css( 'pointer-events', 'none' );
                if( readonly ){
                    disable.attr( 'readonly', 'readonly' );
                }
            },

            enable_opt = function(){
                disable.css('opacity', '1');
                disable.css( 'pointer-events', 'auto' );
                if( readonly ){
                    disable.removeAttr( 'readonly' );
                }
            };

        if (value == disabled_value) {
            disable_opt();
        }

        main_option.on('change', function () {
            value = get_value( type );
            if (value != disabled_value) {
                enable_opt();
            }

            else {
                disable_opt();
            }
        });
    }

    //Vendors options deps
    $('#yith_wpv_vendors_option_order_management').yith_wpv_option_deps( '#yith_wpv_vendors_option_order_synchronization', 'checkbox', undefined, false );
}(jQuery));
