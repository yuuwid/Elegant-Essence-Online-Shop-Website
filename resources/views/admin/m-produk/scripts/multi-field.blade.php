{{-- MULTI FIELD --}}
<script type="text/javascript">
    const template_variant = $('#template-variant').html();
    const template_color = $("#template-color").html();
    const template_size = $("#template-size").html();

    $("#init-variant").prepend(template_variant.replace(new RegExp("{index}", "igm"), '0'))
    $("#color-0").append(template_color)
    $("#size-0").append(template_size)

    var i = 0;
    $("#dynamic-ar").click(function() {
        ++i;
        $("#dynamicAddRemove").append(
            '<tr class="border-t"><td class="py-3">' +
            template_variant.replace(new RegExp("{index}", "igm"), i) +
            '</td><td class="text-center"><button type="button" class="remove-input-field bg-e2-red text-white mx-4 px-2.5 py-1.5 rounded-md"><i class="bi bi-trash"></i></button></td></tr>'
        );
        $("#color-" + i).append(template_color)
        $("#size-" + i).append(template_size)
        $('#temp_n_variant').val(parseInt($('#temp_n_variant').val()) + 1);

    });
    $(document).on('click', '.remove-input-field', function() {
        $(this).parents('tr').remove();
        $('#temp_n_variant').val(parseInt($('#temp_n_variant').val()) - 1);
    });
</script>

@if (old('temp_n_varaint'))
@endif
