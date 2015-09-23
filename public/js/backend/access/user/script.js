$(function() {
    //Checks checkboxes for dependencies
    $("input[name='permission_user[]']").change(function() {
        var dependencies = $(this).data('dependencies');
        if (dependencies.length)
            for (var i = 0; i < dependencies.length; i++)
                if ($(this).is(":checked"))
                    $("#permission-"+dependencies[i]).attr("checked", true);
    });
});