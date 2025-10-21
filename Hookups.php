<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "0,1";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "Login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php

// Set email variables
$email_to = 'frdouma29@gmail.com';
$email_subject = 'Submitted Story, Kenyan Erotic Stories';

// Set required fields
$required_fields = array('fullname','email','comment');

// set error messages
$error_messages = array(
	'fullname' => 'Please enter a Name to proceed.',
	'email' => 'Please enter a valid Email Address to continue.',
	'comment' => 'Please enter your Message to continue.'
);

// Set form status
$form_complete = FALSE;

// configure validation array
$validation = array();

// check form submittal
if(!empty($_POST)) {
	// Sanitise POST array
	foreach($_POST as $key => $value) $_POST[$key] = remove_email_injection(trim($value));
	
	// Loop into required fields and make sure they match our needs
	foreach($required_fields as $field) {		
		// the field has been submitted?
		if(!array_key_exists($field, $_POST)) array_push($validation, $field);
		
		// check there is information in the field?
		if($_POST[$field] == '') array_push($validation, $field);
		
		// validate the email address supplied
		if($field == 'email') if(!validate_email_address($_POST[$field])) array_push($validation, $field);
	}
	
	// basic validation result
	if(count($validation) == 0) {
		// Prepare our content string
		$email_content = 'New Website Comment: ' . "\n\n";
		
		// simple email content
		foreach($_POST as $key => $value) {
			if($key != 'submit') $email_content .= $key . ': ' . $value . "\n";
		}
		
		// if validation passed ok then send the email
		mail($email_to, $email_subject, $email_content);
		
		// Update form switch
		$form_complete = TRUE;
	}
}

function validate_email_address($email = FALSE) {
	return (preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $email))? TRUE : FALSE;
}

function remove_email_injection($field = FALSE) {
   return (str_ireplace(array("\r", "\n", "%0a", "%0d", "Content-Type:", "bcc:","to:","cc:"), '', $field));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<!-- Contact Form Designed by James Brand @ dreamweavertutorial.co.uk -->
<!-- Covered under creative commons license - http://dreamweavertutorial.co.uk/permissions/contact-form-permissions.htm -->

	<title>Kenya Erotic Stories | Submit Stories</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/mootools/1.3.0/mootools-yui-compressed.js"></script>
    <script type="text/javascript" src="Contact us/validation/validation.js"></script>
	<link href="contact/css/contactform.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript">
var nameError = '<?php echo $error_messages['fullname']; ?>';
		var emailError = '<?php echo $error_messages['email']; ?>';
		var commentError = '<?php echo $error_messages['comment']; ?>';
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
    </script>

</head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kenyan Erotic Stories</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #42413C;
	margin: 0;
	padding: 0;
	color: #000;
	display: block;
}

/* ~~ Element/tag selectors ~~ */
ul, ol, dl { /* Due to variations between browsers, it's best practices to zero padding and margin on lists. For consistency, you can either specify the amounts you want here, or on the list items (LI, DT, DD) they contain. Remember that what you do here will cascade to the .nav list unless you write a more specific selector. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* removing the top margin gets around an issue where margins can escape from their containing div. The remaining bottom margin will hold it away from any elements that follow. */
	padding-right: 15px;
	padding-left: 15px;
}
a img { /* this selector removes the default blue border displayed in some browsers around an image when it is surrounded by a link */
	border: none;
}

/* ~~ Styling for your site's links must remain in this order - including the group of selectors that create the hover effect. ~~ */
a:link {
	color: #42413C;
	text-decoration: underline; /* unless you style your links to look extremely unique, it's best to provide underlines for quick visual identification */
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* this group of selectors will give a keyboard navigator the same hover experience as the person using a mouse. */
	text-decoration: none;
}

/* ~~ This fixed width container surrounds all other divs ~~ */
.container {
	width: 960px;
	background-color: #FFFFFF; /* the auto value on the sides, coupled with the width, centers the layout */
	float: none;
	margin-top: 0;
	margin-right: auto;
	margin-bottom: 0;
	margin-left: auto;
	clear: none;
}

/* ~~ The header is not given a width. It will extend the full width of your layout. It contains an image placeholder that should be replaced with your own linked logo. ~~ */
.header {
	background-color: #ADB96E;
	position: relative;
}

/* ~~ These are the columns for the layout. ~~ 

1) Padding is only placed on the top and/or bottom of the divs. The elements within these divs have padding on their sides. This saves you from any "box model math". Keep in mind, if you add any side padding or border to the div itself, it will be added to the width you define to create the *total* width. You may also choose to remove the padding on the element in the div and place a second div within it with no width and the padding necessary for your design.

2) No margin has been given to the columns since they are all floated. If you must add margin, avoid placing it on the side you're floating toward (for example: a right margin on a div set to float right). Many times, padding can be used instead. For divs where this rule must be broken, you should add a "display:inline" declaration to the div's rule to tame a bug where some versions of Internet Explorer double the margin.

3) Since classes can be used multiple times in a document (and an element can also have multiple classes applied), the columns have been assigned class names instead of IDs. For example, two sidebar divs could be stacked if necessary. These can very easily be changed to IDs if that's your preference, as long as you'll only be using them once per document.

4) If you prefer your nav on the right instead of the left, simply float these columns the opposite direction (all right instead of all left) and they'll render in reverse order. There's no need to move the divs around in the HTML source.

*/
.sidebar1 {
	float: left;
	width: 180px;
	background-color: #FFFFFF;
	padding-bottom: 10px;
}
.content {
	width: 590px;
	float: left;
	padding-top: 0px;
	padding-right: 0;
	padding-bottom: 10px;
	padding-left: 0;
}
.sidebar2 {
	float: left;
	width: 190px;
	background-color: #FFFFFF;
	padding-top: 10px;
	padding-right: 0;
	padding-bottom: 10px;
	padding-left: 0;
}

/* ~~ This grouped selector gives the lists in the .content area space ~~ */
.content ul, .content ol { 
	padding: 0 15px 15px 40px; /* this padding mirrors the right padding in the headings and paragraph rule above. Padding was placed on the bottom for space between other elements on the lists and on the left to create the indention. These may be adjusted as you wish. */
}

/* ~~ The navigation list styles (can be removed if you choose to use a premade flyout menu like Spry) ~~ */
ul.nav {
	list-style: none; /* this removes the list marker */
	border-top: 1px solid #666; /* this creates the top border for the links - all others are placed using a bottom border on the LI */
	margin-bottom: 15px; /* this creates the space between the navigation on the content below */
}
ul.nav li {
	border-bottom: 1px solid #666; /* this creates the button separation */
}
ul.nav a, ul.nav a:visited { /* grouping these selectors makes sure that your links retain their button look even after being visited */
	padding: 5px 5px 5px 15px;
	display: block; /* this gives the anchor block properties so it fills out the whole LI that contains it so that the entire area reacts to a mouse click. */
	width: 160px;  /*this width makes the entire button clickable for IE6. If you don't need to support IE6, it can be removed. Calculate the proper width by subtracting the padding on this link from the width of your sidebar container. */
	text-decoration: none;
	background-color: #CCCCCC;
}
ul.nav a:hover, ul.nav a:active, ul.nav a:focus { /* this changes the background and text color for both mouse and keyboard navigators */
	background-color: #ADB96E;
	color: #FFF;
}

/* ~~ The footer styles ~~ */
.footer {
	background-color: #CCCCCC;
	position: relative;/* this gives IE6 hasLayout to properly clear */
	clear: both; /* this clear property forces the .container to understand where the columns end and contain them */
	padding-top: 10px;
	padding-right: 0;
	padding-bottom: 10px;
	padding-left: 0;
}

/* ~~ Miscellaneous float/clear classes ~~ */
.fltrt {  /* this class can be used to float an element right in your page. The floated element must precede the element it should be next to on the page. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* this class can be used to float an element left in your page. The floated element must precede the element it should be next to on the page. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* this class can be placed on a <br /> or empty div as the final element following the last floated div (within the .container) if the .footer is removed or taken out of the .container */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
-->
</style>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 222px;
	top: 222px;
	width: 497px;
	height: 31px;
	z-index: 1;
	text-align: center;
}
#apDiv2 {
	position: absolute;
	left: 422px;
	top: 232px;
	width: 496px;
	height: 36px;
	z-index: 1;
}
#apDiv5 {
	position: absolute;
	left: 811px;
	top: 9px;
	width: 156px;
	height: 30px;
	z-index: 5;
	text-align: center;
}
#apDiv3 {
	position: absolute;
	left: 926px;
	top: 10px;
	width: 163px;
	height: 26px;
	z-index: 1;
}
#apDiv4 {
	position: absolute;
	width: 314px;
	height: 40px;
	z-index: 2;
	left: 687px;
	top: 16px;
}
</style>
<link href="sendyourstories.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body bgcolor="#333333" background="used photos/Main Background.jpg" vlink="#6666CC" alink="#0000FF" onload="MM_preloadImages('Contact us/Images/x.png')">

<div class="container">
  <div class="header"><div id="apDiv4">
    <h6><a href="Login.php">Login</a>|<a href="User Registration.php">Register</a> |<a href="Update Profile.php">Update profile</a>|<a href="Logout.php">Logout</a></h6>
  </div><!-- end .header --><a href="Home.html"><img src="Backup_of_banner.JPG" width="959" height="152" /></a></div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="All Stories.html" class="nav">Stories</a></li>
      <li><a href="send your stories.php">Submit  Stories</a></li>
      <li><a href="Submit Expose.php">Send Expose</a></li>
      <li><a href="Hookups.php">Hookups</a></li>
      <li><a href="Support.php">Support</a></li>
      <li><a href="Betting.html">Betting Tips</a></li>
    </ul>
    <p>&nbsp;</p>
    <!-- end .sidebar1 --></div>
  <div class="content">
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="Home.html">HOME</a></li><li><a href="About.html">ABOUT</a></li>
      <li><a class="MenuBarItemSubmenu" href="#">EXPOSE</a>
        <ul>
          <li><a href="Expose Videos.php">VIDEOS</a>          </li>
          <li><a href="Expose Pictures.php">PICTURES</a>          </li>
          <li><a href="Expose Gif.php">GIFS</a></li>
        </ul>
      </li>
      <li><a href="Live Chat.html">LIVE CHAT</a></li>
    </ul>
    <h1>&nbsp;</h1>
    <div id="formWrap">
      <div id="form">
<?php if($form_complete === FALSE): ?>
<h2>Hookups</h2>
<p>Fill the form bellow with your details for hookup consideration. give more details about yourself in the description section.</p>
<form action="send your stories.php" method="post" id="comments_form">
  <div class="row">
    <div class="label">Full Name</div>	<!-- end .label -->
    <div class="imput">
    <input name="fullname" type="text" class="detail" id="fullname" value="<?php echo isset($_POST['fullname'])? $_POST['fullname'] : ''; ?>" /><?php if(in_array('fullname', $validation)): ?><span class="error"><?php echo $error_messages['fullname']; ?></span><?php endif; ?>   
    </div><!-- end .imput -->  
    <div class="context">e.g. Dan Simiyu or Samuel Njoroge</div><!-- end .context -->    
    </div><!-- end .row -->
    
    <div class="row">
    <div class="label">Email Address</div>	<!-- end .label -->
    <div class="imput">
    <input name="email" type="text" class="detail" id="email" value="<?php echo isset($_POST['email'])? $_POST['email'] : ''; ?>
" /><?php if(in_array('email', $validation)): ?><span class="error"><?php echo $error_messages['email']; ?></span><?php endif; ?>

    </div><!-- end .imput -->  
    <div class="context">e.g.example@somedomain.com, we wont share your email with anyone</div><!-- end .context -->    </div><!-- end .row -->

	<div class="row">
    <div class="label">Describe yourself</div>	<!-- end .label -->
    <div class="imput2">
    <textarea name="comment" class="mess" id="comment"><?php echo isset($_POST['comment'])? $_POST['comment'] : ''; ?>
</textarea><?php if(in_array('comment', $validation)): ?><span class="error"><?php echo $error_messages['comment']; ?></span><?php endif; ?>
  
    </div><!-- end .imput -->  
    </div><!-- end .row -->
    
    <div class="submit">
    <input type="submit" id="submit" name"submit" value="Send Story" />
    
    </div><!-- end .submit -->
</form>
    
    <?php else: ?>
<p align="center">Thank you for giving up your details. Your ad will be up as soon as possible....you might get lucky.</p>

<script type="text/javascript">
setTimeout('ourRedirect()' 10000)
function ourRedirect(){
	location.href='index.html'
)
</script>

<p align="center"><a href="Home.html"><strong>Click here to go home.</strong></a></p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<?php endif; ?>
    
</div><!-- end #form -->
</div><!-- end formWrap -->
<h4 align="left">&nbsp;</h4>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
    <p><a href="User Registration.php"><img src="used photos/Want more banner.png" width="510" height="199" alt="Reg Banner" longdesc="User Registration.php" /></a></p>
  </div>
  <div class="sidebar2">
    <h5>FEATURED CONTENT</h5>
    <h4><a href="My boss and I.html"><img src="used photos/429839118_25493.jpg" alt="" width="165" height="168" /></a></h4>
    <p><a href="my boss and i.html">The Boss and I</a></p>
  <!-- end .sidebar2 --></div>
  <div class="footer"> 
    <div align="center">
      <h6>Copyright @Dif Entertainment 2017. All Rights Reserved</h6>
      <h6><a href="Privacy policy.html">Privacy Policy </a>| <a href="Terms.html">Terms </a>| <a href="Advertising.php">Advertising</a></h6>
    </div>
  </div>
<!-- end .container --></div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
