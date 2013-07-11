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
        <script src="imageUploader.js" type="text/javascript"></script>
		<link href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<link href="stylesheet.css" rel="stylesheet" type="text/css"/>
        </head>
	<body onload="hideMenus();">
        <!-- Error Message Dialog -->
        <div id="error-message" title="Error">
          <p>
            <span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 16px 0;"></span>
            Please enter an item title.
            <br style="clear:both;" />
            <span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 16px 0;"></span>
            Please enter atleast one item category.
            <br style="clear:both;" />
            <span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 16px 0;"></span>
            Please enter an item description. 
            <br style="clear:both;" />
            <span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 16px 0;"></span>
            Please enter a valid start date and time.
            <br style="clear:both;" />
            <span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 16px 0;"></span>
            Please enter a valid end date and time.
            <br style="clear:both;" />
            <span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 16px 0;"></span>
            Please enter a unique item ID#.
            <br style="clear:both;" />
            <span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 16px 0;"></span>
            Please enter a valid website url.
            <br style="clear:both;" />
            <span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 16px 0;"></span>
            Please enter a valid Retail value.
            <br style="clear:both;" />
            <span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 16px 0;"></span>
            Please enter a valid value for reserve price.
            <br style="clear:both;" />
            <span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 16px 0;"></span>
            Please enter a valid values for all custom bid increments.
          </p>
          
        </div>
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
				<a class="right" href="index.html">Register</a>
				<a class="right" href="index.html">Login</a>
				<span class="navCapRight right">
				</span>
			</div>
			<div id="page">
				<div class="navPanel column">
					<div class="navPanelHeader">
						Admin
					</div>
					<div onclick="navPanel(this)">
						User Management
					</div>
					<div class="menu">
						<a href="">View All Users</a>
						<br/>
						<a href="">View User Details</a>
						<br/>
						<a href="">Add User</a>
						<br/>
						<a href="">Edit User</a>
						<br/>
					</div>
					<div onclick="navPanel(this)">
						Item Management
					</div>
					<div class="menu">
						<a href="">Create Items</a>
						<br/>
						<a href="">View Items</a>
						<br/>
						<a href="">Edit Item</a>
						<br/>
						<a href="">Hot Items</a>
						<br/>
					</div>
					<div onclick="navPanel(this)">
						Category Management
					</div>
					<div class="menu">
						<a href="">Create Category</a>
						<br/>
						<a href="">View Category</a>
						<br/>
						<a href="">Edit Category</a>
						<br/>
					</div>
					<div onclick="navPanel(this)">
						Reports & Archives
					</div>
					<div class="menu">
						<a href="">View Statistics</a>
						<br/>
						<a href="">View Archives</a>
						<br/>
					</div>
					<div onclick="navPanel(this)">
						Site Configuration
					</div>
				</div>