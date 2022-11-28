<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
</head>

<body>
    <div class="form-wrapper-outer">

        <form action="#" method="POST" name="htmlform" id="test-form" novalidate>
            <div class="field-wrapper">
                <div id="message-wrap">
                    <span></span>
                </div>
            </div>
            <div class="field-wrapper">
                <input type="email" name="email" class="form-checkfield" id="" required>
                <div class="field-placeholder"><span>Enter your email</span></div>
            </div>
            <div class="field-wrapper">
                <input type="text" name="name" class="form-checkfield" id="" required>
                <div class="field-placeholder"><span>Enter your name</span></div>
            </div>
            <div class="field-wrapper">
                <input type="text" name="phone" class="form-checkfield" id="" required>
                <div class="field-placeholder"><span>Enter your phone</span></div>
            </div>
            <div class="field-wrapper">
                <div id="google_recaptcha"></div>
            </div>
            <div class="field-wrapper">
                <input type="button" id="submit-test-form" value="Submit">
            </div>
        </form>

    </div>
    <script src="google.js"></script>
</body>

</html>