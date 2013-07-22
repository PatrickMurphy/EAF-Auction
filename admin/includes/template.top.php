<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
	<head>
		<title>
			AEF Create Item
		</title>
		<script src="jquery-1.10.0.min.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="javascript.js" type="text/javascript"></script>
        <script src="globalize.js" type="text/javascript"></script>
		<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<link href="stylesheet.css" rel="stylesheet" type="text/css"/>
        </head>
	<body onload="hideMenus();">
		<div id="main">
			<div id="adminBanner">
				<div id="adminBannerLogo">
				</div>
				<div id="adminBannerText">
					AEF Admin
				</div>
				<div id="searchButton">
					Search
				</div>
				<input id="searchBar" type="text" />
			</div>
			<div id="navigation">
				<a class="left" href="index.html">Home</a>
				<a class="left" href="index.html">Browse</a>
				<a class="left" href="index.html">News</a>
				<span class="navCapLeft left">
				</span>
				<span id="accountMenuButton">
                    <a class="right" href="#">My Account</a>
                </span>
				<span class="navCapRight right">
				</span>
			</div>
            <ul id="accountMenu">
                <li><a href="../profile.php?id=1"><span class="ui-icon ui-icon-person"></span>Patrick</a></li>
                <li><a href="../login.php?logout=1&redirect=index.php"><span class="ui-icon ui-icon-close"></span>Logout</a></li>
            </ul>
			<div id="page">
				<?php include('includes/template.menu.php');?>