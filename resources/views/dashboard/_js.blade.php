<script>
    $(document).ready(function() {

        var products = {};
        getInitialParams();

        function getInitialParams() {
            $.ajax({
                url: window.location.href,
                method: "GET",
                success: function(response) {
                    if (response.success) {
                        products = response.products;
                    }
                },
                error: function(response) {
                    toastr.error(
                        response.message,
                        "Error", {
                            timeOut: 5000,
                            extendedTimeOut: 0,
                            closeButton: true,
                            closeDuration: 0
                        }
                    );

                },
                complete: function() {
                    addStockRow(true);
                    addOrderRow(true);
                }
            });
        }

        @include('dashboard.add_stock_js')
        @include('dashboard.place_order_js')

        document.addEventListener("table_reload", function() {
            $('#add_stock_modal_cancel').click();
            $('#place_order_modal_cancel').click();
        });

    });
</script>
