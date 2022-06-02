<?php

// Email address that you want the form to be submitted to.

$recieve_mails_at = "mail@email.com";

// Redirect to home page if directly accessed

$homePage = "../../index.html";
   
if (!isset($_REQUEST['email'])) {
   header( "Location: $homePage" );
}

   // Check for email injection
   
   function isInjected($str) {
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
      if(preg_match($inject,$str)) {
         return true;
      }
      else {
         return false;
      }
   }

   // Email Field
   $email = $_REQUEST['email'] ;

   $msg = 
   "Email: " . $email ;
   
   // Redirect to current page if email injected
   
   if (isInjected($email)) {
   header( "Location: $homePage" );
   }
   
   // Send mail
   else {
      mail( "$recieve_mails_at", $msg );
       <style type="text/css">
        #success{
            display: block;
        }
    </style>;
   }

?>