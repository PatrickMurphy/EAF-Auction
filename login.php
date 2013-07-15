<?php
if(!isset($_POST['username'])){
    require_once('classes/eaf_database.php');
    require_once('classes/eaf_configuration.php');
    require_once('classes/eaf_user.php');
    $database = new eaf_database('pmphotog_eaf', 'pmphotog_eaf', 'almostover13');
    $config = new eaf_configuration($database);
    $user = new eaf_user($database,$config);
    
    if(isset($_POST['rememberMe']))
        $remember = true;
    else
        $remember = false;
    
    $user->login($_POST['username'], $_POST['password'], $remember, urldecode($_GET['redirect']));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html>	

<head>

	<title>Login | EAF Auction | Alaska Airlines Employee Assistance Fund Annual Auction</title>

	<script src="jquery-1.10.0.min.js"></script>

	<script src="javascript.js" type="text/javascript" ></script>

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
                <div><input class="bidNow" type="submit" style="border:0px;" value="Login" /></div></form>
                <input type="hidden" name="redirect" value="<?php if(isset($_GET['redirect'])) echo $_GET['redirect']; else echo ''; ?>" />
                </form>
            </div>
        </div>

		

		<div id="bottomBar"> © Alaska Airlines Employee Assistance Fund 2013. All Rights Reserved.

			<span class="bottomBarNav"><a href="index.php">Home</a> | <a href="categories.php">Browse</a> | <a href="news.php">News</a></span>

		</div>

	</div>

</body>

</html>