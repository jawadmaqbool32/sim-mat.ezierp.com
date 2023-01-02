<div class="modal fade" id="place_order_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px" tabindex="-1">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body px-10 px-lg-15 pt-0 pb-15" id="dropdown_parent">
                <form data-ajax="true" id="kt_modal_new_target_form" class="form" action="{{ route('orders.store') }}"
                    method="POST">
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Place Order</h1>
                    </div>
                    <div class="row g-9 mb-8">
                        <div class="col-md-12 fv-row">
                            <button type="button" class="float-end btn btn-sm btn-primary btn-add-product">Add
                                Another</button>
                        </div>
                        <div class="col-md-12 fv-row">
                            <table class="table">
                                <tr>
                                    <thead>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody id="product_wrapper">

                                    </tbody>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input name="isPaid" class="form-check-input" type="checkbox" value="true"
                                    id="isSwitchPaid" >
                                <label class="form-check-label" for="isSwitchPaid">
                                    Mark Paid
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="reset" id="place_order_modal_cancel" data-bs-dismiss="modal"
                            class="btn btn-light me-3">Cancel</button>
                        <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
