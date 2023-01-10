<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-add-option', function() {
            $(this).parents('.mcq-wrapper').append(`<div class="option-wrapper row">
                                        <div class="col-md-6 col-xs-12">
                                            <label for="" class="form-label">Choice</label>
                                            <input type="text" name="" id=""
                                                class="form-control form-control-solid" placeholder="Choice Here"
                                                aria-describedby="helpId">
                                        </div>
                                        <div class="col-md-4 col-xs-8 answer-type-wrapper">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Answer Type</label>
                                                <select name="" id=""
                                                    class="form-control form-control-solid answer-type">
                                                    <option value="">None</option>
                                                    <option value="text_field">Text Field</option>
                                                    <option value="mcqs">MCQs</option>
                                                    <option value="tags">Tags</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-xs-4">
                                            <button class="btn btn-danger mt-8"><i class="bi bi-x"></i></button>
                                        </div>
                                        <div class="col-md-12 answer p-0"></div>
                                        </div>
                                    </div>
                `);
        });
        $(document).on('change', '.answer-type', function() {
            let html = '';
            if ($(this).val() == 'text_field') {
                html = ` <div class= "mb-3"><label for="" class="form-label">Answer</label> <input type="text" name=""
                id="" class="form-control form-control-solid" placeholder="Question Here"></div>`;

            } else if ($(this).val() == 'mcqs') {
                html = `
                                    <div class="row mcq-wrapper">
                                        <div class="col-md-12 my-6">
                                                <button class="btn btn-sm btn-danger float-end  btn-add-option"><i
                                                class="bi bi-plus"></i> Add Option</button></div><div class="col-md-12 ">
                                    </div>
                                    <div class="option-wrapper row">
                                        <div class="col-md-6 col-xs-12">
                                            <label for="" class="form-label">Choice</label>
                                            <input type="text" name="" id=""
                                                class="form-control form-control-solid" placeholder="Choice Here"
                                                aria-describedby="helpId">
                                        </div>
                                        <div class="col-md-4 col-xs-8 answer-type-wrapper">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Answer Type</label>
                                                <select name="" id=""
                                                    class="form-control form-control-solid answer-type">
                                                    <option value="">None</option>
                                                    <option value="text_field">Text Field</option>
                                                    <option value="mcqs">MCQs</option>
                                                    <option value="tags">Tags</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-xs-4">
                                            <button class="btn btn-danger mt-8"><i class="bi bi-x"></i></button>
                                        </div>
                                        <div class="col-md-12 answer p-0"></div>
                                        </div>
                                    </div>`;
            }
            $(this).parents('.answer-type-wrapper').siblings('.answer').html(
                html);

        });
        $('.btn-add-question').click(function() {

            $('#quention_form').append(
                `<div class="card-body w-100 align-items-end pb-0">
                                <div class="row">
                                    <div class="card-body w-100 align-items-end pb-0">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Question</label>
                                                    <input type="text" name="" id=""
                                                        class="form-control form-control-solid" placeholder="Question Here"
                                                        aria-describedby="helpId">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-xs-8 answer-type-wrapper">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Answer Type</label>
                                                    <select name="" id=""
                                                        class="form-control form-control-solid answer-type">
                                                        <option value="">Select Answer Type</option>
                                                        <option value="text_field">Text Field</option>
                                                        <option value="mcqs">MCQs</option>
                                                        <option value="tags">Tags</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-xs-4">
                                                <button type="button" class="btn btn-danger mt-8"><i class="bi bi-x"></i></button>
                                            </div>
                                            <div class="col-md-12 answer p-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>`
            );
        });
    });
    $(document).on('submit', '#fileUploader', function(e) {
        e.preventDefault();
        var selector = $(this).find('button[type="submit"]');
        let url = $(this).prop('action');
        let method = $(this).prop('method') ?? 'GET';
        let _token = "{{ csrf_token() }}"
        var formData = new FormData($(this)[0]);
        formData.append('_token', _token);

        $.ajax({
            url: url,
            data: formData,
            type: method,
            processData: false,
            cache: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    let i = 1;
                    $('#keywords').empty();
                    for (const key in response.keywords) {
                        if (Object.hasOwnProperty.call(response.keywords, key)) {
                            const element = response.keywords[key];
                            $('#keywords').append(
                                `<tr><td>${i}</td><td>${key.toUpperCase()}</td><td>${element}</td></tr>`
                            );
                        }
                        i++;
                    }
                    $("#text_area").html(response.text)
                }

            },
            error: function(response) {
                toast({
                    title: "Failed",
                    type: "danger",
                    time: cTime,
                    body: response.message,
                    icon: "<i class='bi bi-x fs-2x text-danger'></i>"
                });
            }
        });
    });
</script>
