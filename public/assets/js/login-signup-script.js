
$("form#signupForm").on("submit",function (e) {
    e.preventDefault();
    $("#loader").show();
    if ($("#password").val() != $("#confirmPassword").val() ){
        $("#loader").hide();
        $("#errorMessages").show();
        $("#errorMessages").html('<li>Password and confirmed password not matched </li>');
    }else {

        $.ajax({
            url: "/signup",
            method: "POST",
            data: {
                name: $("#name").val(),
                email: $("#email").val(),
                contact: $("#contact").val(),
                username: $("#username").val(),
                password: $("#password").val(),
                confirmPassword: $("#confirmPassword").val(),
                "_token": $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (response) {
                if (response.status == 1){
                    window.location.href = response.redirectUrl;
                }
            },
            error: function (errorRes) {
                $("#loader").hide();

                var json = $.parseJSON(errorRes.responseText);
                var errorsHtml = '';
                $.each(json.errors, function (key, value) {
                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                });

                $('html, body').animate({
                    scrollTop: $(".login-sec").offset().top
                }, 1000);
                $("#errorMessages").show();
                $("#errorMessages").html(errorsHtml);
            }

        });
    }
});
