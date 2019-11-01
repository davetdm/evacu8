$(document).ready(function () {

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
        $.post($(this).attr("action"), $(this).serialize(), function (resp) {
            if (resp.status === 'ok') {
                alert(resp.message);
            } else if (resp.status === 'error') {
                alert(resp.message);
            }
        }, 'json');
        return false;
    });

    $("#deleteForm").submit(function(){
        $.post($(this).attr("action"), $(this).serialize(), function (resp) {
            if (resp.status === 'ok') {
                window.location.href = resp.message;
            } else if (resp.status === 'error') {
                alert(resp.message);
            }
        }, 'json');
        return false;
    });

    //Email
    // $('#personForm').submit(function () {

    //     var a = document.forms["personForm"]["email"].value;
    //     if (a == null || a == "") {
    //         alert("You forgot to enter your Email!");
    //         return false;
    //     } else {
    //         var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    //         if (a.match(mailformat)) {
    //             document.personForm.email.focus();
    //         } else {
    //             alert("You have entered an invalid Email Address!");
    //             document.personForm.email.focus();
    //             return false;
    //         }
    //     }
    
    // });
    
});







