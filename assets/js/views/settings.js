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
    
});







