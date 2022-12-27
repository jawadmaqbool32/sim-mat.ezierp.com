<script>
    $('#status').change(function() {
        let option = $(this).find('option:selected');
        $('#status_sign').removeClass('bg-success').removeClass('bg-danger').removeClass('bg-warning').addClass(
            option.data('statusSign'));
        if ($(this).val() == 'scheduled') {
            $('.date-selector').removeClass('d-none');
        } else {
            $('.date-selector').addClass('d-none');
        }
    })
</script>
