/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var development = true;
var utils = {
    httpurl: development ? "http://www.myadminpal.local/" : "https://www.dev.myadminpal.com/",
    gotoPage: function (page) {
        window.location.href = this.httpurl + page;
    },
    refresh: function () {
        window.location.reload();
    },
    displaySuccessAlert: function (message, ref = false) {
        Swal.fire({
            title: 'Success',
            type: 'success',
            html: message,
            focusConfirm: false,
            confirmButtonText:'Ok',
        }).then((result) => {
            if (ref){
                utils.refresh();
            }
        });
    },
    displayErrorAlert: function (message, ref = false) {
        Swal.fire({
            title: 'Attention',
            type: 'warning',
            html: message,
            focusConfirm: false,
            confirmButtonText:'Ok',
        }).then((result) => {
            if (ref){
                utils.refresh();
            }
        });
    },
    active: function (element) {
        $(element).addClass("mm-active");
        $(element).siblings("li").removeClass("mm-active");
    },
    getCSRFToken: function(){
        return "csrf_token=" + $("#csrf_token").val();
    },
    // clear: function (form) {
    //     var f = $(form).find('.form-group');
    //     f.children('input').each(function () {
    //         $(this).val(null);
    //     });
    //     f.children('textarea').each(function () {
    //         $(this).val(null);
    //     });
    // },
    // getElById: function(id){
    //     return document.getElementById(id);
    // },
    // showElement: function (element) {
    //     $(element).show("blind");
    // },
    // hideElement: function (element) {
    //     $(element).hide();
    // },
    // hideShowElement: function (ele_show, ele_hide) {
    //     $(ele_show).show();
    //     $(ele_hide).hide();
    // },
    // toggleElementHide: function (selector, element) {
    //     if ($(selector).val() === "Subscription") {
    //         $(element).show();
    //     } else {
    //         $(element).hide();
    //     }
    // },
    previewImage: function (input, holder) {
        var countFiles = $(input)[0].files.length;
        var imgPath = $(input)[0].value;
        var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
        var image_holder = null;
        if (holder !== undefined) {
            var image_holder = $("#" + holder);
        } else {
            var image_holder = $("#image-holder");
        }
        image_holder.empty();
        if (extn === "gif" || extn === "png" || extn === "jpg" || extn === "jpeg") {
            if (typeof (FileReader) !== "undefined") {
                for (var i = 0; i < countFiles; i++) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("<img/>", {
                            "src": e.target.result,
                            "class": "img-responsive",
                            "alt": "preview",
                            "style": "width: 100%; height: 150px;",
                        }).appendTo(image_holder);
                    };
                    image_holder.show("blind");
                    reader.readAsDataURL($(input)[0].files[i]);
                }
            } else {
                alert("This browser does not support FileReader.");
            }
        } else {
            alert("Pls select only images");
        }
    },


};