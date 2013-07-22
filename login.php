<?php
session_start();
ob_start();
error_reporting('E_ALL');
require_once('classes/eaf_database.php');
require_once('classes/eaf_configuration.php');
require_once('classes/eaf_user.php');
$database = new eaf_database('pmphotog_eaf', 'pmphotog_eaf', 'almostover13');
$config = new eaf_configuration($database);
$user = new eaf_user($database,$config);
    
if(isset($_POST['username'])){    
    $formdata['username']   =   $_POST['username'];
    $formdata['password']   =   $_POST['password'];
    $formdata['rememberMe'] =   isset($_POST['rememberMe']);
    $formdata['redirect']['condition']   =   isset($_POST['redirect']);
    $formdata['redirect']['url'] = $_POST['redirect'];
    
    if(!$user->login($formdata))
        echo('Error: Login not true');
}
if($_GET['debug']==1)
    print_r($_SESSION);
if($_GET['logout']==1)
    $user->logout();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html>	

<head>

	<title>Login | EAF Auction | Alaska Airlines Employee Assistance Fund Annual Auction</title>

	<script src="js/jquery-1.10.0.min.js"></script>

	<script src="js/javascript.js" type="text/javascript" ></script>

	<link href="stylesheet.css" rel="stylesheet" type="text/css" />

</head>

<body>

	<div id="main" class="centered">

		<div id="banner">

			<div id="bannerLogo"></div>

			<div id="bannerText">Alaska Airlines<br/>Employee<br/>Assistance<br/>Fund</div>

			<div class="searchButton">Search</div>

			<input class="searchBar" type="text" />

		</div>

		

		<div id="navigation">

			<div class="navItem"><a class="navItemLink" href="index.php">Home</a></div>

			<div class="navItem"><a class="navItemLink" href="categories.php">Browse</a></div>

			<div class="navItem"><a class="navItemLink" href="news.php">News</a></div>

			<a class="navItem navLeftCap"></a>

			

			<div class="navItem right" ><a class="navItemLink" href="register.php">Register</a></div>

			<div class="navItem right" ><a class="navItemLink" href="login.php">Login</a></div>

			<a class="navItem navRightCap" ></a>

		</div>

		

		<div id="page" >
        	<div class="closedBox loginBox">
        		<h1 class="header">Login</h1>
                <form action="login.php" method="post">
                <div><span>Username:</span> <input type="text" name="username" /></div>
                <br style="clear:both;" />
                <div><span>Password:</span> <input type="password" name="password" /></div>
                <br style="clear:both;" />
                <div style="margin-left:131px;">
                <input type="checkbox" name="rememberMe" /> Keep me logged in
                </div>
                <br style="clear:both;" />
                <div><input class="bidNow" type="submit" style="border:0px;" value="Login" /></div>
                <?php if(isset($_GET['redirect'])){?><input type="hidden" name="redirect" value="<? echo $_GET['redirect']; ?>" /><? } ?>
                </form>
            </div>
        </div>

		

		<div id="bottomBar"> © Alaska Airlines Employee Assistance Fund 2013. All Rights Reserved.

			<span class="bottomBarNav"><a href="index.php">Home</a> | <a href="categories.php">Browse</a> | <a href="news.php">News</a></span>

		</div>

	</div>

</body>

</html>
<?
ob_end_flush();
?>