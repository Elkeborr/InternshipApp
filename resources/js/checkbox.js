var checkboxes = $(" input[type='checkbox']"),
    submitButt = $("#btncheck");

checkboxes
    .change(function() {
        submitButt.prop("disabled", !this.checked);
    })
    .change();
