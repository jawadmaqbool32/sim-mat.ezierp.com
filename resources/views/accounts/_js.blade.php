<script>
    $(document).ready(function() {
        const fetchAccounts = () => {
            $.ajax({
                url: window.location.href,
                type: 'GET',
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    if (response.success) {
                        $('#tree_wrapper').html(response.tree);
                    } else {
                        toastr.error(
                            "Failed to load accounts", {
                                timeOut: 5000,
                                extendedTimeOut: 0,
                                closeButton: true,
                                closeDuration: 0
                            }
                        );
                    }
                },
                error: function(response) {
                    toastr.error(
                        "Failed to load accounts", {
                            timeOut: 5000,
                            extendedTimeOut: 0,
                            closeButton: true,
                            closeDuration: 0
                        }
                    );
                },

            });
        }
        fetchAccounts();
        document.addEventListener("table_reload", function() {
            fetchAccounts();
        });
    });
</script>
