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

    // Person
    $("#personForm").submit(function(){
        $.post($(this).attr("action"), $(this).serialize(), function (resp) {
            if (resp.status === 'ok') {
                alert(resp.message);
            } else if (resp.status === 'error') {
                alert(resp.message);
            }
        }, 'json');
        return false;
    });
    //Update person
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
    //Email
    $('#personForm').submit(function () {

        var a = document.forms["personForm"]["email"].value;
        if (a == null || a == "") {
            alert("You forgot to enter your Email!");
            return false;
        } else {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (a.match(mailformat)) {
                document.personForm.email.focus();
            } else {
                alert("You have entered an invalid Email Address!");
                document.personForm.email.focus();
                return false;
            }
        }
    
    });
    
});







