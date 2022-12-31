    function addOrderRow(isFirst) {
    let html = '<option>Select Option</option>';
    let isLast = false;

    if (products.length == $('#place_order_modal #product_wrapper').find('tr').length) {
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
    html += `<option value="${product.uid}" data-unit-price="${product.unit_price}" data-max-quantity="${product.stock}"
        data-purchase-price="${product.purchase_price}">
        ${product.name}
    </option>`;
    }


    $('#place_order_modal #product_wrapper').append(
    `<tr>
        <td width="40%" class="p-0"><select name="product[]" id=""
                class="select2_ form-control product  ${borderRadious1}">${html}</select></td>
        <td class="rounded-0 p-0"><input type="number" name="quantity[]" placeholder="Quantity" id=""
                class="rounded-0 form-control quantity"></td>
        <td class="p-0"><input type="number" placeholder="Price" name="price[]" id=""
                class="form-control rounded-0 price"></td>
        <td class="p-0"><input type="number" placeholder="Totel" name="totel[]" id=""
                class="form-control rounded-0 totel"></td>
        <td class="p-0"><button type="button" class="btn-danger btn-delete btn px-1 ${borderRadious2}"
                ${isFirst? 'disabled' : '' }><i class="bi bi-trash fs-2 fw-bolder"></i></button></td>
    </tr>`
    );
    $('#place_order_modal #product_wrapper .product').each(function() {
    if ($(this).hasClass('.select2-hidden-accessible') == false) {
    $(this).select2({
    dropdownParent: $('#place_order_modal #dropdown_parent')
    });
    }
    });
    }
    $(document).on('click', '#place_order_modal .btn-add-product', function() {
    addOrderRow(false);
    });
    $(document).on('click', '#place_order_modal .btn-delete', function() {
    $(this).parents('tr').remove();
    });
    $(document).on('change', '#place_order_modal .product, #place_order_modal .quantity, #place_order_modal .price',
    function() {
    let unitPrice = 0;
    let quantity = 0;
    if ($(this).hasClass('product')) {
    unitPrice = $(this).parents('tr').find('.product option:selected').data('unitPrice');
    $(this).parents('tr').find('.price').val(unitPrice);
    } else {
    if ($(this).hasClass('quantity')) {
    quantity = $(this).parents('tr').find('.quantity').val();
    let maxQuantity = $(this).parents('tr').find('.product option:selected').data('maxQuantity');
    if (quantity > maxQuantity) {
    $(this).parents('tr').find('.quantity').val(maxQuantity);
    toastr.warning(
    'Cannot Exceed then available stock',
    "Warning", {
    timeOut: 5000,
    extendedTimeOut: 0,
    closeButton: true,
    closeDuration: 0
    }
    );
    }
    }
    unitPrice = $(this).parents('tr').find('.price').val();
    }

    quantity = $(this).parents('tr').find('.quantity').val();
    let totel = quantity * unitPrice;
    $(this).parents('tr').find('.totel').val(totel ? totel : 0);
    });
