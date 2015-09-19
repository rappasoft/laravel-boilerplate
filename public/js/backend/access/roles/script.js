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

tree.jstree({
    "checkbox" : {
        "keep_selected_style" : true
    },
    "plugins" : ["checkbox"]
}).on('ready.jstree', function() {
    tree.jstree('open_all');
    tree.jstree('hide_icons');
});

$("#create-role, #edit-role").submit(function() {
    var checked_ids = tree.jstree("get_checked", false);
    $("input[name='ungrouped[]']").each(function () {
        checked_ids.push($(this).val());
    });
    $("input[name='permissions']").val(checked_ids);
});