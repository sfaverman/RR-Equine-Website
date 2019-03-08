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
<body id="contact">
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
       	<main>
       	
    
   <h1>Thank you for your comment/feedback</h1> 
      <!-- *** Sofia Faverman 
      *** Date: 02/25/2019 
      *** Class: PHP WEB 
      *** Assignment: 03 Week 04 --> 

<?php
//  script: handle_form.php
//	This page receives the data from feedback.php
//  It will receive: title, name, response, comments and submit in $_POST
	
//$title = $_POST['title'];
$fName = $_POST['firstName'];
$lName = $_POST['lastName'];			
$email = $_POST['email'];
$phone = $_POST['phone'];
$questions = $_POST['questions'];	
$contMethod = $_POST['contMethod'];						

/* $_POST is case sensitive
 * Must match the name attribute values from the form
*/
 	
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
			
//Print the received data:
print "<p> Thank you, $fName $lName, for your comments. </p>
<p>We appreciate your feedback/question:<br>$questions<p>
<p>Your feedback is very important for our business.
<p>Please allow us 24-48 hours to $method.</p>";
	
?>	
<!-- This displays the content of the $_POST superglobal array
	if any post data has been sent.
	$_POST is a superglobal, which is an associative array
	The print_r() function allows you to inspect the contents
	of arrays and is used for debugging purposes.
	The <pre> tags simply makes the output easier to read
	-->
<pre>
	<?php print_r($_POST); ?>
</pre>		                                                                                        
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
       </div> <!-- end of wrapper -->
    
</body>
</html>