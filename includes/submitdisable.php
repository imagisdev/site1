<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $('form')
        .each(function() {
        $(this).data('serialized', $(this).serialize())
    })
    .on('change input', 'input, select, textarea', function(e) {
        var $form = $(this).closest("form");
        var state = $form.serialize() === $form.data('serialized');    
        $form.find('input:submit, button:submit').prop('disabled', state);

    })
    .find('input:submit, button:submit')
    .prop('disabled', true)
</script>