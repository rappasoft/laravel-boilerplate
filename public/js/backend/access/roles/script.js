var associated = $("select[name='associated-permissions']");
var associated_container = $("#available-permissions");
var tree = $('#permission-tree');

if (associated.val() == "custom")
    associated_container.removeClass('hidden');
else
    associated_container.addClass('hidden');

associated.change(function() {
    if ($(this).val() == "custom")
        associated_container.removeClass('hidden');
    else
        associated_container.addClass('hidden');
});

/**
 * Initiate the tree and open all items
 * When a node is changed, loop through all of its dependencies
 * and search through the tree to check/uncheck them
 */
var check_dependencies = false;
tree.jstree({
    "checkbox" : {
        "keep_selected_style" : true
    },
    "plugins" : ["checkbox"],
}).on('ready.jstree', function() {
    tree.jstree('open_all');
    tree.jstree('hide_icons');
    $('[data-toggle="tooltip"]').tooltip();
}).on('ready.jstree', function() {
    check_dependencies = true;
}).on('changed.jstree', function (event, object) {
    //Check all dependency nodes and disable
    if (check_dependencies) {
        if (!!object.node) {
            if (!!object.node.data.dependencies) {
                if (object.node.data.dependencies.length) {
                    var checked = tree.jstree('is_checked', object.node);

                    for (var i = 0; i < object.node.data.dependencies.length; i++) {
                        if (checked) {
                            tree.jstree('check_node', object.node.data.dependencies[i]);
                            checkUngrouped(object.node.data.dependencies[i]);
                        }
                    }
                }
            }
        }
    }
});

/**
 * When an ungrouped permission is checked
 * filter through its dependencies and check them
 */
$("input[name='ungrouped[]']").change(function() {
    var dependencies = $(this).data('dependencies');
    if (dependencies.length)
        for (var i = 0; i < dependencies.length; i++)
            if ($(this).is(":checked"))
                tree.jstree('check_node', dependencies[i]);
});

/**
 * Check all dependent permissions in the ungrouped section based on
 * the id of another permission
 * @param id
 */
function checkUngrouped(id) {
    //Check nodes from the ungrouped column
    $("input[name='ungrouped[]']").each(function() {
        if (parseInt($(this).val()) == id)
            $(this).attr('checked', true);
    });
}

/**
 * Get list of the checked items and send them to the serer
 */
$("#create-role, #edit-role").submit(function() {
    var checked_ids = tree.jstree("get_checked", false);
    $("input[name='ungrouped[]']").each(function () {
        checked_ids.push($(this).val());
    });
    $("input[name='permissions']").val(checked_ids);
});