<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Royal Ridge Equine - Thank you for feedback</title>
      
    <!-- Google FONTS -->   
       
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet"> 
    
    <!-- Styles -->
     
    <link rel="stylesheet" href="../images/css/normalize.css" type="text/css">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    <link rel="stylesheet" href="../css/contact.css" type="text/css">
     <link href="../css/print.css" rel="stylesheet" media="print">    
         
     <!-- JS / JQuery --------------------------------------------- -->
     
      <!--[if lt IE9]>
            <script src="../js/html5shiv.min.js" type="text/javascript"></script>
      <![endif]-->
      
     <!-- back to top toggle script -->
     <script src="../js/backtotop.js"></script>
     
     <script src="http://code.jquery.com/jquery-3.3.1.min.js">   </script>
         
          <!-- Mobile menu Jquery -->
     <script src="../js/jquery.mobilemenu.js"></script>
     <script>
            $(function() {
               $("nav > ul").mobileMenu(); 
            });
     </script>
         
</head>
<body>
      <header>
           <img id="logo" src="../images/logo2.png" alt="logo">
       </header>      
       <div class="lightGrnBar"></div>
       <nav>
          <ul>
            <li><a href="../index.html">Home</a>
            </li>
            <li><a href="about.html" >About</a>
                <ul>
                   <li>
                      <a href="gallery.html">Photo Gallery</a>
                    </li>
                    <li>
                       <a href="trainers.html">Our Trainers</a>
                    </li>
                </ul>
            </li>      
            <li><a href="services.html">Services</a>
                <ul>
                  <li>
                    <a href="boarding.html">Boarding
                         </a>
                  </li>
                  <li>
                     <a href="lessons.html">Lessons</a>
                  </li>     
                  <li>
                     <a href="events.html">Events</a>
                  </li>
                  </ul>
            </li>
            <li><a  href="reservations.html">Reservations</a>
                 <ul>
                   <li><a href="signup.html">Sign-Up</a>
                   </li>
                 </ul>
            </li>
            <li><a href="contact.html" class="actPage">Contact</a></li>
          </ul>
       </nav>
  <main id="feedback">
       	
      <!-- *** Sofia Faverman 
      *** Date: 04/22/2021 
       --> 
      
<?php
//  script: handle_feedback.php
//	This page receives the data from contact.html
//  It will receive: name, phone, email and comments and submit in $_POST


/* $_POST is case sensitive
 * Must match the name attribute values from the form
*/

if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "sofiasd@yahoo.com";
    $email_subject = "Email from Royal Ridge Equine Center website";

    function died($error) {
        // your error code can go here
        echo "<h3>We are very sorry, but there were error(s) found with the form you submitted.</h3>";
        echo "<h3>These errors appear below.</h3>";
        echo "<h3>".$error."</h3>";
        echo "<h3>Please go back and fix these errors.</h3>";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['firstName']) ||
        !isset($_POST['lastName']) ||
        !isset($_POST['email']) ||
        /*!isset($_POST['phone']) ||*/
        !isset($_POST['questions'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $fName = $_POST['firstName']; //required
	$lName = $_POST['lastName'];  //required
	$email = $_POST['email'];     //required
	$phone = $_POST['phone'];
	$comments = $_POST['questions']; //required
	$contMethod = $_POST['contMethod']; //required

	switch ($contMethod) {
    case "phone":
        $method = "call you at $phone";
        break;
    case "email":
		$method = "email you at $email";
        break;
    case "text":
		$method = "text you at $phone";
        break;
    default:
        echo "Your preferred contact method is neither phone, email, nor text!";
    }

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$fName)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(!preg_match($string_exp,$lName)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }

  $phone_exp = "/[0-9]{3}-[0-9]{3}-[0-9]{4}/";

  if(!preg_match($phone_exp,$phone) && ($contMethod === 'phone' || $contMethod === 'text')) {
    $error_message .= 'The Phone Number you entered does not appear to be valid.<br />';
  }

  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "First Name: ".clean_string($fName)."\n";
    $email_message .= "Last Name: ".clean_string($lName)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Telephone: ".clean_string($phone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);


//Print the received data:
print "<h1> Thank you, $fName $lName, for your comments. </h1>
<p>We appreciate your feedback:<br><i>$comments</i></p>
<p>Your feedback is very important for our business.</p>
<p>Please allow us 24-48 hours to $method.</p>";


/* This displays the content of the $_POST superglobal array
	if any post data has been sent.
	$_POST is a superglobal, which is an associative array
	The print_r() function allows you to inspect the contents
	of arrays and is used for debugging purposes.
	The <pre> tags simply makes the output easier to read

<pre>
	<?php print_r($_POST); ?>
</pre>

*/

}

?>      

           <a id="bttBtn" href="#contact"><img src="../images/back-to-top-arrow.png" alt="back to top arrow"></a>
               
                <div class="lightGrnBar clearIt">&nbsp;</div>
        </main>
           <footer>
              
               <ul>
                 <li><a class="instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
                 <li><a class="facebook" href="https://www.facebook.com" title="Facebook" target="_blank"></a></li>
                 <li><a class="twitter" href="https://www.twitter.com" title="Twitter" target="_blank" ></a></li>
                 <li><a class="yelp" href="https://www.yelp.com" title="yelp" target="_blank"></a></li>
                 <li><a class="googleMaps" href="https://maps.google.com" title="google maps" target="_blank"></a></li>
              </ul>
               <address id="copyright">
                   <p>858-449-4311 | 15069 Sycamore Canyon Rd | Poway, CA | 92064</p>
               </address>
               <p>Copyright &copy; 2019 Royal Ridge Equestrian Center</p>
           </footer>
       
</body>
</html>