<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$name = $_POST['name'];
$user_email = $_POST['email'];
$details = $_POST['details'];

//Validate first
if(empty($name)||empty($user_email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($user_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = 'info@collectif.co';
$email_subject = "New Form submission";
$email_body = "You have received a new message from $name.\n\n".
    "Here is the message:\n $details\n\n".
    
$to = "info@collectif.co";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $user_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: ../thanks.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 