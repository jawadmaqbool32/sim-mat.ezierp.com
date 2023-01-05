<script>
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