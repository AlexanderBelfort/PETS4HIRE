<h1>DO NOT PLAY WITH THE DATABASE, please.</h1>

<?php
   
  error_reporting(E_ALL);

  $name='';
  $email='';
  $message='';
  $username='';
  $homepage='';
  $webmasteremail='';

  if ($_POST){
   $name=stripslashes($_POST['name']);
   $email=stripslashes($_POST['email']);
   
      
   $message=stripslashes($_POST['message']);
   $username=stripslashes($_POST['username']);
   $homepage=stripslashes($_POST['homepage']);
   $webmasteremail=stripslashes($_POST['webmasteremail']);
    // validate e-mail address
    $valid=preg_match('/^([0-9a-z]+[-._+&])*[0-9a-z]+@([-0-9a-z]+[.])+[a-z]{2,6}$/i',$webmasteremail);
    $crack=preg_match("/(\r|\n)(to:|from:|cc:|bcc:)/i",$message);
    $body = '';
    if ($webmasteremail && $message && $valid && !$crack){
      $body = "Name: " . $name . "\r\n" . "Message: " . $message;  
      if (mail($webmasteremail,"New message from your favorite pets website", $body,'From: '.$email."\r\n")){
      	
  ?>
<p>
  Your message was successfully sent.
  Your message is shown below.
</p>
<?php
        echo '<p>'.htmlspecialchars($body).'</p>';
      }else{ // the messages could not be sent
?>
<p>
  Something went wrong when the server tried to send your message.
  This is usually due to a server error, and is probably not your fault.
  We apologise for any inconvenience caused.
</p>
<?php
      }
    }else if ($crack){ // cracking attempt
?>
<p><strong>
  Your message contained e-mail headers within the message body.
  This seems to be a cracking attempt and the message has not been sent.
</strong></p>
<?php
    }else{ // form not complete
?>
<p><strong>
  Your message could not be sent.
  You must include both a valid e-mail address and a message.
</strong></p>
<?php
    }
  }
?>
