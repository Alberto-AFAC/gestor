var onloadCallback = function() {
    grecaptcha.render('google_recaptcha', {
        'sitekey': '6LejXVAeAAAAAGhif6aYjdPZpWbT26sq9XkqhzLJ'
    });
};

$(function() {
    //Check if required fields are filled
    function checkifreqfld() {
        var isFormFilled = true;
        $("#test-form").find(".form-checkfield:visible").each(function() {
            var value = $.trim($(this).val());
            if ($(this).prop('required')) {
                if (value.length < 1) {
                    $(this).closest(".field-wrapper").addClass("field-error");
                    isFormFilled = false;
                } else {
                    $(this).closest(".field-wrapper").removeClass("field-error");
                }
            } else {
                $(this).closest(".field-wrapper").removeClass("field-error");
            }
        });
        return isFormFilled;
    }

    //Form Submit Event
    $("#submit-test-form").click(function() {
        if (checkifreqfld()) {
            event.preventDefault();
            var rcres = grecaptcha.getResponse();
            if (rcres.length) {
                grecaptcha.reset();
                showHideMsg("Form Submitted!", "success");
            } else {
                showHideMsg("Please verify reCAPTCHA", "error");
            }
        } else {
            showHideMsg("Fill required fields!", "error");
        }
    });

    //Show/Hide Message
    function showHideMsg(message, type) {
        if (type == "success") {
            $("#message-wrap").addClass("success-msg").removeClass("error-msg");
        } else if (type == "error") {
            $("#message-wrap").removeClass("success-msg").addClass("error-msg");
        }

        $("#message-wrap").stop()
            .slideDown()
            .html(message)
            .delay(1500)
            .slideUp();
    }


    //Google Style InputFields
    $(".field-wrapper .field-placeholder").on("click", function() {
        $(this).closest(".field-wrapper").find("input").focus();
    });
    $(".field-wrapper input").on("keyup", function() {
        var value = $.trim($(this).val());
        if (value) {
            $(this).closest(".field-wrapper").addClass("hasValue");
        } else {
            $(this).closest(".field-wrapper").removeClass("hasValue");
        }
    });
});