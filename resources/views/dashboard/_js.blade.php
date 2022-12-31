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
                }
            });
        }

        function addStockRow(isFirst) {
            let html = '<option>Select Option</option>';
            let isLast = false;

            if (products.length == $('#add_stock_modal #product_wrapper').find('tr').length) {
                isLast = true;
            }

            let borderRadious1 = "rounded-0";
            let borderRadious2 = "rounded-0";
            if (isFirst) {
                borderRadious1 = "rounded-top-1 rounded-bottom-0 rounded-end-0";
                borderRadious2 = "rounded-top-1 rounded-bottom-0 rounded-start-0";
            }

            for (const key in products) {
                let product = products[key];
                html += `<option 
                    value="${product.uid}" 
                    data-unit-price="${product.unit_price}" 
                    data-purchase-price="${product.purchase_price}">
                    ${product.name}
                    </option`;
            }


            $('#add_stock_modal #product_wrapper').append(
                `<tr><td width="40%" class="p-0"><select name="product[]" id="" class="select2_ form-control product  ${borderRadious1}">${html}</select></td><td class="rounded-0 p-0"><input type="number" name="quantity[]" placeholder="Quantity" id="" class="rounded-0 form-control"></td><td class="p-0"><input type="number" placeholder="Purchase" name="purchase[]"
                    id="" class="form-control rounded-0"></td><td class="p-0"><input type="number" placeholder="Retail" name="retail[]" id="" class="form-control rounded-0"></td><td class="p-0"><button type="button" class="btn-danger btn-delete btn px-1 ${borderRadious2}" ${isFirst? 'disabled' : ''}><i class="bi bi-trash fs-2 fw-bolder"></i></button></td></tr>`
            );
            $('#add_stock_modal #product_wrapper .product').each(function() {
                if ($(this).hasClass('.select2-hidden-accessible') == false) {
                    $(this).select2({
                        dropdownParent: $('#dropdown_parent')
                    });
                }
            });
        }
        $(document).on('click', '#add_stock_modal .btn-add-product', function() {
            addStockRow(false);
        });
        $(document).on('click', '#add_stock_modal .btn-delete', function() {
            $(this).parents('tr').remove();
        });

        document.addEventListener("table_reload", function() {
            $('#add_stock_modal_cancel').click();
        });

        $(document).on('change', '.product', function() {
            let unitPrice = $(this).find('option:selected').data('unitPrice')
            let purchasePrice = $(this).find('option:selected').data('purchasePrice')
            $(this).parents('tr').find('[name="purchase[]"]').val(purchasePrice);
            $(this).parents('tr').find('[name="retail[]"]').val(unitPrice);
        });
    });
</script>
