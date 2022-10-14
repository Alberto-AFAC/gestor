<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<form action="" method="POST" style="width: 80%; margin-left: 497px;">
    <div style="margin-left: 48px;"><b> Registration Form </b><br><br></div>
    <div>Name: <input type="text" name="name" value="" /><br><br></div>
    <div>Email: <input type="text" name="email" value="" /><br><br></div>
    <div class="g-recaptcha" data-sitekey="6LejXVAeAAAAAGhif6aYjdPZpWbT26sq9XkqhzLJ"></div><br><br>
    <input type="submit" name="submit" value="SUBMIT">
</form>

<?php
 if(isset($_POST['submit']) && $_POST['submit'] == 'SUBMIT'){
  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
  {
        $secret = '6LejXVAeAAAAAPuUlAUwNHrK9u_UDrSwil_OBe-V';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success)
        { ?>
<div style="color: limegreen;"><b>Your contact request have submitted successfully.</b></div>
        <?php }
        else
        {?>
            <div style="color: red;"><b>Robot verification failed, please try again.</b></div>
        <?php }
   }else{?>
       <div style="color: red;"><b>Please do the robot verification.</b></div>
   <?php }
 }
?>