$(document).ready(function () {

    // Configs
    $("#frmAddConfig").submit(function(){
        $.post($(this).attr("action"), $(this).serialize(), function (resp) {
            if (resp.status === 'ok') {
                alert(resp.message);
            } else if (resp.status === 'error') {
                alert(resp.message);
            }
        }, 'json');
        return false;
    });

    // Groups
    $("#frmAddConfigToGroup").submit(function(){
        console.log($(this).serialize());
        $.post($(this).attr("action"), $(this).serialize(), function (resp) {
            if (resp.status === 'ok') {
                alert(resp.message);
            } else if (resp.status === 'error') {
                alert(resp.message);
            }
        }, 'json');
        return false;
    });

    // Anchors
    $("#frmAddAnchor").submit(function(){
        $.post($(this).attr("action"), $(this).serialize(), function (resp) {
            if (resp.status === 'ok') {
                alert(resp.message);
            } else if (resp.status === 'error') {
                alert(resp.message);
            }
        }, 'json');
        return false;
    });

    $('#personForm').submit(function(){

        var url = $('#personForm').attr("action");
        var method = $('#personForm').attr("method");
        var data = $('#personForm').serialize();
    
        $.ajax({
            type: method,
            url: url,
            data: data,
            success: function(response){
                alert(response);
                window.location.reload();
            }
        });
    
        return false;
    });
    
    $('#updateForm').submit(function(){

        var url = $('#updateForm').attr("action");
        var method = $('#updateForm').attr("method");
        var data = $('#updateForm').serialize();
    
        $.ajax({
            type: method,
            url: url,
            data: data,
            success: function(response){
                alert(response);
                window.location.reload();
            }
        });
    
        return false;
    });
});







