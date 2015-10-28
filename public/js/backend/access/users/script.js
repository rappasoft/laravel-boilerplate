$(function() {
    //Checks checkboxes for dependencies
    $("input[name='permission_user[]']").change(function() {
        checkDependencies($(this));
    });

    //Recursively check dependencies
    function checkDependencies(item) {
        var dependencies = item.data('dependencies');
        var count = 0;

        if (dependencies.length) {
            for (var i = 0; i < dependencies.length; i++) {
                if (item.is(":checked")) {
                    var permission = $("#permission-" + dependencies[i]);

                    if (! permission.is(":checked"))
                        permission.prop("checked", true);

                    count++;

                    if (count == 1)
                        checkDependencies(permission);
                }
            }
        }
    }
});