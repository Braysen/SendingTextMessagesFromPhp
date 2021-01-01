<?php
  
  include('httpPHPAltiria.php');

  function sendMessage($email, $password){

    $altiriaSMS = new AltiriaSMS();
    $altiriaSMS->setLogin($email);
    $altiriaSMS->setPassword($password);
  
    $altiriaSMS->setDebug(true);

    /* We define the cell phone number to which we want to send the message */
    $sDestination = '+51 999999999';
    
    /* We send the text message with its respective message */
    $response = $altiriaSMS->sendSMS($sDestination, "Hello, I send you a text message from an application made in PHP using the Altiria service");
    

    /* We analyze the sending of the messages and show a message according to the analysis */
    if (!$response)
        echo "Shipping ended in error";
    else
        echo 'The message was sent successfully';
    
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="styles.css">
  <title>Incaclic</title>
</head>
<body>
  <header class="header-message">
    <p>
      <?php
        //If the send button was pressed we carry out the following actions
        if(isset($_POST['submit'])){
          /* We define the email that is associated with an account in Altiria */
          $email = "*******@gmail.com";

          /* We define the password that Altiria provided us when creating the account */
          $password = "*******";

          /* We invoke the function to send the message */
          sendMessage($email, $password);
         
        }else{/*If the button was not pressed, we show a message*/
          echo 'You have not sent any message';
        }
      ?>
    </p>
  </header>
  <form class="form-register" method="post">
    <h4>Incaclic</h4>
    <input class="botons" value="Send messages" type="submit" name="submit">
  </form>

</body>
</html>