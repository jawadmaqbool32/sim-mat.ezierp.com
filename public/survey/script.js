
$('.add_field').on('click', function (params) {
    var type = $(this).data('type');
    let append = `<div class="col-md-10 col-sm-10 mb-1 "><input type="text" name="input-` + type + `[]" class="form-control custom-select" style="width: 100%"></div>`;
    $('#type-' + type).append(append)
})
