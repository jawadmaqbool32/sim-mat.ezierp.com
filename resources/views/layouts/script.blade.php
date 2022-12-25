<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>

<script>
    $(document).ready(function() {
        
        function formatAMPM(date) {
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var ampm = hours >= 12 ? 'pm' : 'am';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0' + minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            return strTime;
        }

        const current = new Date();
        const cTime = formatAMPM(current);
        const toast = (settings) => {
            const container = document.getElementById('kt_docs_toast_stack_container');
            let targetElement = $('#kt_docs_toast_stack_container');
            targetElement.find('.toast-title').html(settings.title);
            targetElement.find('.toast-time').html(settings.time);
            targetElement.find('.toast-body').html(settings.body);
            targetElement.find('.svg-icon').html(settings.icon);
            targetElement = document.querySelector(
                '[data-kt-docs-toast="stack"]'); // Use CSS class or HTML attr to avoid duplicating ids
            targetElement.parentNode.removeChild(targetElement);
            const newToast = targetElement.cloneNode(true);
            container.append(newToast);
            const toast = bootstrap.Toast.getOrCreateInstance(newToast);
            toast.show();
        }

        $(document).on('submit', 'form', function(e) {
            if ($(this).data('ajax')) {
                var selector = $(this).find('button[type="submit"]');
                selector.attr('disabled', true);
                e.preventDefault();
                let url = $(this).prop('action');
                let method = $(this).prop('method') ?? 'GET';
                let _token = "{{ csrf_token() }}"
                var formData = new FormData($(this)[0]);
                formData.append('_token', _token);
                $(this).find('.quill-input').each(function() {
                    let name = $(this).data('name');
                    let description = $(this).find('.ql-editor').html();
                    formData.append(name, description);
                });
                $.ajax({
                    url: url,
                    data: formData,
                    type: method,
                    processData: false,
                    cache: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            toast({
                                title: "Success",
                                time: cTime,
                                body: response.message,
                                icon: "<i class='bi bi-check2-square fs-2x text-success'></i>"
                            });
                        }
                        if (response.reload) {
                            window.location.reload();
                        }
                        if (response.redirect) {
                            window.location.href = response.url;
                        }
                        if (response.table_reload) {
                            const tableReload = new Event("table_reload");
                            document.dispatchEvent(tableReload)
                        }
                    },
                    error: function(response) {
                        toast({
                            title: "Failed",
                            time: cTime,
                            body: response.message,
                            icon: "<i class='bi bi-x fs-2x text-danger'></i>"
                        });
                    },
                    complete: function() {
                        selector.removeAttr('disabled');
                    }
                });
            }
        });

        $(document).on('click', '.modal-button', function() {

            var attributes = $(this).data();
            let modal = $($(this).data('bsTarget'));
            let currentURL = modal.find('form').data('baseUrl');
            modal.find('form').attr('action', currentURL + $(this).data('modal_id'))
            for (const key in attributes) {
                if (Object.hasOwnProperty.call(attributes, key)) {
                    const element = attributes[key];
                    modal.find('#' + key).val(element).html(element);
                }
            }
        });


    });
</script>
