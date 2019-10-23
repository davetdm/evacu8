$('#personForm').submit(function() {

    var url = $('#personForm').attr("action");
    var method = $('#personForm').attr("method");
    var data = $('#personForm').serialize();
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function (resp) {
            console.log(resp);
            alert("Person Added");
            window.location.reload();
        }
    });
    return false;

});
$('#updateForm').submit(function() {

    var url = $('#updateForm').attr("action");
    var method = $('#updateForm').attr("method");
    var data = $('#updateForm').serialize();
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function (resp) {
            console.log(resp);
            alert("Person Added");
            window.location.reload();
        }
    });
    return false;

});

$('#deleteForm').submit(function() {

    var url = $('#deleteForm').attr("action");
    var method = $('#deleteForm').attr("method");
    var data = $('#deleteForm').serialize();
    $.ajax({
        url: url,
        method: method,
        data: data,
        success: function (resp) {
            console.log(resp);
            alert("Person Added");
            window.location.reload();
        }
    });
    return false;

});
