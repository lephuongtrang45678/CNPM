$(document).ready(function(e) {
    $("#fileToUpload").on('change', (function() {
        var img = $("#fileToUpload")[0].files[0];
        var DL = new FormData();
        DL.append("fileToUpload", img)
        $.ajax({
            url: "ajax_upload.php",
            type: "POST",
            data: DL,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $("#preview").fadeOut();
                $("#err").fadeOut();
            },
            success: function(data) {
                if (data == 'invalid') {
                    // invalid file format.
                    $("#err").html("Invalid File !").fadeIn();
                } else {
                    // view uploaded file.
                    $("#preview").html(data).fadeIn();
                    // $("#form")[0].reset();
                }
            },
            error: function(e) {
                $("#err").html(e).fadeIn();
            }
        });
    }));

});