<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html>	

<head>

	<title>Alaska Airlines Employee Assistance Fund</title>

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
			<?php 
				if(isset($_GET['categoryId'])){
					?>
                <div class="left filters">
                 <div class="header" style="width:100%;">Filters</div>
                 Search:<br/>
                 <span><input class="left" type="text" style="margin-left:10px;width:155px" /> <button class="right">>></button></span>
                 <br /><br />
                 Price:<br /><span class="left" style="padding-left:10px;font:10pt sans-serif;"> <input type="text" placeholder="Low" style="width:68px;" /> - <input type="text" style="width:67px;" placeholder="High" /> </span><button class="right">>></button><br />
                 <br />
                 
                 Location:
                 <div style="padding-left:10px;font:10pt sans-serif">
                 <a href="categories.php?categoryId=01&location=Wa">Washington (4)</a><Br />
                 <a href="categories.php?categoryId=01&location=Wa">Oregon (3)</a><Br />
                 <a href="categories.php?categoryId=01&location=Wa">New York (3)</a><Br />
                 <a href="categories.php?categoryId=01&location=Wa">California (2)</a><Br />
                 <a href="categories.php?categoryId=01&location=Wa">Eastern Washington (1)</a>
                 </div><br />
                 Condition: <br />
                  <div style="padding-left:10px;font:10pt sans-serif">
                  	<input type="radio" name="condition" value="1" /> New <br />
                    <input type="radio" name="condition" value="1"  /> Used <br />
                    <input type="radio" name="condition" value="0" checked="checked"  /> Both <br />
                    </div>
                    <br />
                 Shippable:
                 <div style="padding-left:10px;font:10pt sans-serif">
                  	<input type="radio" name="shippable" value="1" /> Yes <br />
                    <input type="radio" name="shippable" value="1"  /> No <br />
                    <input type="radio" name="shippable" value="0" checked="checked"  /> Both <br />
                    </div>
                    <br />
                </div>
                
                
                <div class="left itemsDisplay" >
                <div class="header" style="width:100%;">Category Name</div>
                <div class="left" style="margin-left:10px;">
                	<a href="categories.php">Categories</a> > <a href="categories.php?categoryId=01">Category</a>
 						> <a href="categories.php?categoryId=01">Sub Category</a></div>
                        <div class="right" style="margin-bottom:1em;font:12pt sans-serif">
                        	Sort by:
                            <select>
                            	<option>Price: Highest First</option>
                                <option>Price: Lowest First</option>
                                <option>Time: Closing Soon</option>
                                <option>Bids: Fewest First</option>
                            </select>
                        </div>
                        <br style="clear:both;" />
            	<div class="itemListing">
                	<div class="left itemListingThumbnail">
                    	<a href="itemListing.php?id=01">
                        	<img src="item_1.jpg" width="150" height="125" />
                        </a>
                    </div>
                    <div class="itemListingTitle"><a href="itemListing.php?id=01">Full Fare - Round Trip Ticket</a></div>
                    <span> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                    <div class="right itemListingPriceTime">
                        <span>Last Bid: <span><span>$535.00</span> By Patrick M.</span></span><br />
                        <span>Bids: <span>4</span></span><br />
                        <span>Time Left: <span>2 Hours</span></span>
                    </div>
                   
                    <br style="clear:both;" />
                </div>
                <div class="itemListing">
                	<div class="left itemListingThumbnail">
                    	<a href="itemListing.php?id=01">
                        	<img src="item_2.jpg" width="150" height="125" />
                        </a>
                    </div>
                    <div class="itemListingTitle"><a href="itemListing.php?id=01">Full Fare - Round Trip Ticket</a></div>
                    <span> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                    <div class="right itemListingPriceTime">
                        <span>Last Bid: <span><span>$535.00</span> By Patrick M.</span></span><br />
                        <span>Bids: <span>4</span></span><br />
                        <span>Time Left: <span>2 Hours</span></span>
                    </div>
                   
                    <br style="clear:both;" />
                </div>
                <div class="itemListing">
                	<div class="left itemListingThumbnail">
                    	<a href="itemListing.php?id=01">
                        	<img src="item_3.jpg" width="150" height="125" />
                        </a>
                    </div>
                    <div class="itemListingTitle"><a href="itemListing.php?id=01">Full Fare - Round Trip Ticket</a></div>
                    <span> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                    <div class="right itemListingPriceTime">
                        <span>Last Bid: <span><span>$535.00</span> By Patrick M.</span></span><br />
                        <span>Bids: <span>4</span></span><br />
                        <span>Time Left: <span>2 Hours</span></span>
                    </div>
                   
                    <br style="clear:both;" />
                </div>
                <div class="itemListing">
                	<div class="left itemListingThumbnail">
                    	<a href="itemListing.php?id=01">
                        	<img src="item_4.jpg" width="150" height="125" />
                        </a>
                    </div>
                    <div class="itemListingTitle"><a href="itemListing.php?id=01">Full Fare - Round Trip Ticket</a></div>
                    <span> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                    <div class="right itemListingPriceTime">
                        <span>Last Bid: <span><span>$535.00</span> By Patrick M.</span></span><br />
                        <span>Bids: <span>4</span></span><br />
                        <span>Time Left: <span>2 Hours</span></span>
                    </div>
                   
                    <br style="clear:both;" />
                </div>
                <div class="itemListing">
                	<div class="left itemListingThumbnail">
                    	<a href="itemListing.php?id=01">
                        	<img src="item_5.jpg" width="150" height="125" />
                        </a>
                    </div>
                    <div class="itemListingTitle"><a href="itemListing.php?id=01">Full Fare - Round Trip Ticket</a></div>
                    <span> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                    <div class="right itemListingPriceTime">
                        <span>Last Bid: <span><span>$535.00</span> By Patrick M.</span></span><br />
                        <span>Bids: <span>4</span></span><br />
                        <span>Time Left: <span>2 Hours</span></span>
                    </div>
                   
                    <br style="clear:both;" />
                </div>
                <div class="itemListing">
                	<div class="left itemListingThumbnail">
                    	<a href="itemListing.php?id=01">
                        	<img src="item_6.jpg" width="150" height="125" />
                        </a>
                    </div>
                    <div class="itemListingTitle"><a href="itemListing.php?id=01">Full Fare - Round Trip Ticket</a></div>
                    <span> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                    <div class="right itemListingPriceTime">
                        <span>Last Bid: <span><span>$535.00</span> By Patrick M.</span></span><br />
                        <span>Bids: <span>4</span></span><br />
                        <span>Time Left: <span>2 Hours</span></span>
                    </div>
                   
                    <br style="clear:both;" />
                </div>
                <div class="itemListing">
                	<div class="left itemListingThumbnail">
                    	<a href="itemListing.php?id=01">
                        	<img src="item_2.jpg" width="150" height="125" />
                        </a>
                    </div>
                    <div class="itemListingTitle"><a href="itemListing.php?id=01">Full Fare - Round Trip Ticket</a></div>
                    <span> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                    <div class="right itemListingPriceTime">
                        <span>Last Bid: <span><span>$535.00</span> By Patrick M.</span></span><br />
                        <span>Bids: <span>4</span></span><br />
                        <span>Time Left: <span>2 Hours</span></span>
                    </div>
                   
                    <br style="clear:both;" />
                </div>
                <div class="itemListing">
                	<div class="left itemListingThumbnail">
                    	<a href="itemListing.php?id=01">
                        	<img src="item_3.jpg" width="150" height="125" />
                        </a>
                    </div>
                    <div class="itemListingTitle"><a href="itemListing.php?id=01">Full Fare - Round Trip Ticket</a></div>
                    <span> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                    <div class="right itemListingPriceTime">
                        <span>Last Bid: <span><span>$535.00</span> By Patrick M.</span></span><br />
                        <span>Bids: <span>4</span></span><br />
                        <span>Time Left: <span>2 Hours</span></span>
                    </div>
                   
                    <br style="clear:both;" />
                </div>
                <div class="itemListing">
                	<div class="left itemListingThumbnail">
                    	<a href="itemListing.php?id=01">
                        	<img src="item_4.jpg" width="150" height="125" />
                        </a>
                    </div>
                    <div class="itemListingTitle"><a href="itemListing.php?id=01">Full Fare - Round Trip Ticket</a></div>
                    <span> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                    <div class="right itemListingPriceTime">
                        <span>Last Bid: <span><span>$535.00</span> By Patrick M.</span></span><br />
                        <span>Bids: <span>4</span></span><br />
                        <span>Time Left: <span>2 Hours</span></span>
                    </div>
                   
                    <br style="clear:both;" />
                </div>
                <div class="itemListing">
                	<div class="left itemListingThumbnail">
                    	<a href="itemListing.php?id=01">
                        	<img src="item_5.jpg" width="150" height="125" />
                        </a>
                    </div>
                    <div class="itemListingTitle"><a href="itemListing.php?id=01">Full Fare - Round Trip Ticket</a></div>
                    <span> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                    <div class="right itemListingPriceTime">
                        <span>Last Bid: <span><span>$535.00</span> By Patrick M.</span></span><br />
                        <span>Bids: <span>4</span></span><br />
                        <span>Time Left: <span>2 Hours</span></span>
                    </div>
                   
                    <br style="clear:both;" />
                </div>
                
                
                <div class="paginationBar"><a href="#">< Prev</a> 1 <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">Next ></a><span class="right">Items per Page:<select><option>10</option><option>25</option><option>50</option><option>100</option></select></span></div>
            </div>             
                    <?php	
				}else{
			?>
			<div class="boxfull left">
				<div class="header" style="width:100%;">Categories</div>
            	<ul class="twocol browseList">
            		<li><a href="categories.php?categoryId=01">Alaska</a></li>
                    <li><a href="categories.php?categoryId=01">California</a></li>
                    <li><a href="categories.php?categoryId=01">Dining Out</a></li>
                    <li><a href="categories.php?categoryId=01">Electronics</a></li>
                    <li><a href="categories.php?categoryId=01">Food and Wine</a></li>
                    <li><a href="categories.php?categoryId=01">Handmade</a></li>
                    <li><a href="categories.php?categoryId=01">Home and Garden</a></li>
                    <li><a href="categories.php?categoryId=01">Mexico</a></li>
                    <li><a href="categories.php?categoryId=01">Personal Goods</a></li>
                    <li><a href="categories.php?categoryId=01">Portland Area</a></li>
                    <li><a href="categories.php?categoryId=01">Software & Games</a></li>
                    <li><a href="categories.php?categoryId=01">Vacations</a></li>
                    <li><a href="categories.php?categoryId=01">Art</a></li>
                    <li><a href="categories.php?categoryId=01">Clothing</a></li>
                    <li><a href="categories.php?categoryId=01">Eastern Washington</a></li>
                    <li><a href="categories.php?categoryId=01">Entertainment</a></li>
                    <li><a href="categories.php?categoryId=01">Gift Baskets</a></li>
                    <li><a href="categories.php?categoryId=01">Hawaii</a></li>
                    <li><a href="categories.php?categoryId=01">Jewelry</a></li>
                    <li><a href="categories.php?categoryId=01">Music</a></li>
                    <li><a href="categories.php?categoryId=01">Personal Services</a></li>
                    <li><a href="categories.php?categoryId=01">Seattle Area</a></li>
                    <li><a href="categories.php?categoryId=01">Sports Equipment & Events</a></li>
            	</ul>
            </div>
			<?php
				}
			?>
		<br />
		</div>

		

		<div id="bottomBar"> © Alaska Airlines Employee Assistance Fund 2013. All Rights Reserved.

			<span class="bottomBarNav"><a href="index.php">Home</a> | <a href="categories.php">Browse</a> | <a href="news.php">News</a></span>

		</div>

	</div>

</body>

</html>