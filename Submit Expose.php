<?php
	if(isset($_FILES['UploadFileField'])){
    	
        $UploadName = $_FILES['UploadFileField']['name'];
		$UploadName = mt_rand(100000, 999999).$UploadName;
        $UploadTmp = $_FILES['UploadFileField']['tmp_name'];
        $UploadType = $_FILES['UploadFileField']['type'];
		$Filesize = $_FILES['UploadFileField']['size'];
		
		$UploadName = preg_replace("#[^a-z0-9.]#i","",$UploadName);
		
		if(!$UploadTmp){
			die("No File Selected, Please Upload Again");
		}else{
			move_uploaded_file($UploadTmp, "Upload/$UploadName");
		}
	}
        
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kenyan Erotic Stories | Upload Stories</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background-color: #42413C;
	padding: 0;
	color: #000;
	margin-top: 0;
	margin-right: 10px;
	margin-bottom: 0;
	margin-left: 0;
}

/* ~~ Element/tag selectors ~~ */
ul, ol, dl { /* Due to variations between browsers, it's best practices to zero padding and margin on lists. For consistency, you can either specify the amounts you want here, or on the list items (LI, DT, DD) they contain. Remember that what you do here will cascade to the .nav list unless you write a more specific selector. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* removing the top margin gets around an issue where margins can escape from their containing div. The remaining bottom margin will hold it away from any elements that follow. */
	padding-right: 15px;
	padding-left: 15px; /* adding the padding to the sides of the elements within the divs, instead of the divs themselves, gets rid of any box model math. A nested div with side padding can also be used as an alternate method. */
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
	right: 10px;
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
	width: 550px;
	float: left;
	padding-top: 0px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 0;
}
.sidebar2 {
	float: left;
	width: 220px;
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
	padding: 10px 0;
	background-color: #CCCCCC;
	position: relative;/* this gives IE6 hasLayout to properly clear */
	clear: both; /* this clear property forces the .container to understand where the columns end and contain them */
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
#UploadFileField {
	visibility: visible;
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
	width: 305px;
	height: 46px;
	z-index: 1;
	left: 686px;
	top: 7px;
}
.container .content #FileUploadForm #UploadFileField {
}
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>

<body background="used photos/Main Background.jpg">
<div class="container">
  <div class="header"><div id="apDiv4">
    <h6><a href="Login.php">Login</a>|<a href="User Registration.php">Register</a> |<a href="Update Profile.php">Update profile</a>|<a href="Logout.php">Logout</a></h6>
  </div><!-- end .header --><a href="Home.html"><img src="Backup_of_banner.JPG" width="959" height="152" /></a></div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="All Stories.html">Stories</a></li>
      <li><a href="send your stories.php">Send your Stories</a></li>
      <li><a href="Submit Expose.php">Send Expose</a></li>
      <li><a href="Hookups.php">Hookups</a></li>
      <li><a href="Support.php">Support</a></li>
      <li><a href="Betting.html">Betting Tips</a></li>
    </ul>
    <p>&nbsp;</p>
    <!-- end .sidebar1 --></div>
  <div class="content">
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="Home.html">HOME</a></li>
      <li><a href="About.html">ABOUT</a></li>
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
    <h2 align="left">
      <label for="fileupload"></label>
    Upload your Expose.</h2>
    <p align="left">Click browse, then select a photo from your computer, then hit the upload button. </p>
    <p align="left">    
    <p align="left">
    <form action="Upload.php" method="post" enctype="multipart/form-data" name="FileUploadForm" id="FileUploadForm">
      <label for="fileField"></label>
      <label for="UploadFileField"></label>
      <input name="UploadFileField" type="file" id="UploadFileField" size="50" />
      <label for="UploadFileField2"></label>
      <label for="UploadFileField3"></label>
      <label for="UploadFileField4"></label>
      <input type="submit" name="UploadButton" id="UploadButton" value="Upload" />
     </form>
    </p>
    <p align="left">&nbsp;</p>
    <p align="left">Notice how it comes back to <strong>&quot;No file selected&quot;</strong> after you upload? It only means your photo is already with us and you need to upload another one. The more you upload, the more you earn.</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp;</p>
    <p align="left">&nbsp; </p>
  </div>
  <div class="sidebar2">
    <h4>FEATURED CONTENT</h4>
    <h4><a href="My boss and I.html"><img src="used photos/429839118_25493.jpg" alt="" width="181" height="168" /></a></h4>
    <p><a href="my boss and i.html">The Boss and I</a></p>
  <!-- end .sidebar2 --></div>
  <div class="footer">
    <h6 align="center">Copyright © @Dif Entertainment 2017. All Rights Reserved</h6>
    <h6 align="center"><a href="Privacy Policy.html"> Privacy Policy</a> | <a href="Terms.html">Terms </a>|<a href="Advertising.php">Advertising</a></h6>
  </div>
  <!-- end .container -->
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
