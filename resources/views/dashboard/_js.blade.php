<script>
    $(document).ready(function() {

        var products = {};
        getCharts();


        function profitChart(series) {
            var revenueWrapper = series[0] ? series[0] : 0;
            var expenseWrapper = series[1] ? series[1] : 0;
            $('#revenue_wrapper').text(revenueWrapper);
            $('#expense_wrapper').text(expenseWrapper);
            $('#profit_wrapper').text(revenueWrapper - expenseWrapper);
            new ApexCharts(document.querySelector("#profit_chart"), {
                series: series,
                chart: {
                    width: 200,
                    type: 'donut',
                    toolbar: {
                        show: false
                    },


                },
                labels: ['Revenue', 'Expense'],
                legend: {
                    show: false
                },
                colors: ['#009ef7', '#f1416c'],
                dataLabels: {
                    enabled: false
                },
            }).render();
        }

        $(document).on('click', '.btn-add-stock, .btn-place-order', function() {
            $('#add_stock_modal #product_wrapper').empty();
            $('#place_order_modal #product_wrapper').empty();
            getInitialParams();
        });

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

        function getCharts() {
            $.ajax({
                url: window.location.href + "?charts=true",
                method: "GET",
                success: function(response) {
                    if (response.success) {
                        profitChart(response.profit);
                    }
                },
                complete: function() {}
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
