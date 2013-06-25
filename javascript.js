// Global Variables

var slideShowTimer;

var slideShowIndex = 0;

var slideShowInterval = 5000;

var slideShowDuration = 2000;



/**

 * Slideshow function for the hot items display.

 * @param {Integer} Index of the hot item.

 * @param {Integer} Duration of slideshow transition.

 */

function hotItemNav(index, duration) {

	// Set the background field to the image url; loading it from the server.

	$(".hotItemImage").eq(index).css("background", $(".hotItemImage").eq(index).attr("id"));



	// Update the blips.

	$(".hotItemBlip").attr("class", "hotItemBlip");

	$(".hotItemBlip").eq(index).attr("class", "hotItemBlip hotItemBlipSelected");



	// Update the image.

	$(".hotItemImage").not($(".hotItemImage").eq(index)).fadeOut(duration);

	$(".hotItemImage").eq(index).fadeIn(duration);

	

	// Display the time til auction end.

	validateTime(index);

		

	// Update the description.

	$(".hotItemDesc").not($(".hotItemDesc").eq(index)).fadeOut(duration);

	$(".hotItemDesc").eq(index).fadeIn(duration);

}



function slideShowLoop(index, duration) {

	var length = $(".hotItemImage").length;



	slideShowIndex++;
        $('<img/>')[0].src = $(".hotItemImage").eq(slideShowIndex).attr("id");


	

	if (slideShowIndex >= length)

		slideShowIndex = 0;

		

	hotItemNav(slideShowIndex, duration);

}



function initSlideShow() {

	// Set the slideshow to the first item.

	hotItemNav(0, 0);



	// Iterate through the slideshow.

	slideShowTimer = setInterval(function(){slideShowLoop(slideShowIndex, slideShowDuration)}, slideShowInterval);

}



function manualHotItemNav(index) {

	// Stop the automatic slideshow looping.

	clearInterval(slideShowTimer);

	

	hotItemNav(index, slideShowDuration);

}









function countDown(index, seconds) {

	// Get the item's time object.

	var timeObject = $(".hotItemTime").eq(index);



	if (0 >= seconds) {

		timeObject.text("This auction has ended.");

		

		// Hide the 'Bid Now' button.

		$(".bidNow").eq(index).hide(0);

		return;

	}

	

	// Parse the time and display.

	var timeString = ""; 

	var minutes = (0 <= seconds) ?  Math.floor(seconds / 60) : 0;

	seconds = seconds % 60;

	

	if (1 < minutes) // Plural

		timeString += minutes + " Minutes, ";

	else if (1 == minutes) // Singular

		timeString += minutes + " Minute, ";

		

	if (1 < seconds || 0 == seconds) // Plural

		timeString += seconds + " Seconds";

	else if (1 == seconds) // Singular

		timeString += seconds + " Second";

	

	timeObject.text(timeString);

}

function validateTime(index) {

	// Get the item's time object.

	var timeObject = $(".hotItemTime").eq(index);

	

	// Get the Date object of the item.

	var endTime = new Date(timeObject.attr("endtime"));

	

	// Get the current time.

	var currentTime = new Date();

	currentTime.getTime();

	

	// Get the difference between the current time and the end time.

	var difference = new Date(endTime - currentTime);

	

	// Parse the time difference and display.

	var timeString = "";

	

	var milliseconds = difference.valueOf();

	var seconds = (0 <= milliseconds) ? Math.floor(milliseconds / 1000) : 0;

	var minutes = (0 <= milliseconds) ? Math.floor(seconds / 60) : 0;

	var hours = (0 <= milliseconds) ? Math.floor(minutes / 60) : 0;

	var days = (0 <= milliseconds) ? Math.floor(hours / 24) : 0;

	

	seconds = seconds - minutes*60;

	minutes = minutes - hours*60;

	hours = hours - days*24;

	

	if ( 1 <= days) { // Singular

		if ( 1 == days)

			timeString = days + " Day";

		else if ( 1 < days) // Plural

			timeString = days + " Days";

			

		if ( 1 == hours) // Singular | With comma

			timeString += ", " + hours + " Hour";

		else if (1 < hours) // Plural | With comma

			timeString += ", " + hours + " Hours";	

	}	

	else if (0 < hours){

		if ( 1 == hours) // Singular | Without comma

			timeString += hours + " Hour";

		else // Plural | Without comma

			timeString += hours + " Hours";	

	}

		

	if ( 0 == days && 0 == hours) {

		if (10 < minutes)

			timeString = minutes + " Minutes";

		else {

			seconds = seconds + minutes* 60;

			countDown(index, seconds);

			

			countDownInterval = setInterval(

				function() {

					seconds--;

					countDown(index, seconds);

					if (0 >= seconds)

						clearInterval(countDownInterval);

				}, 1000

			);

		}

	}

		

	if (timeString != "")

		timeObject.text(timeString);

}

jQuery(window).load(function(){
    jQuery(document).scroll(function() {
        var useFixedSidebar = jQuery(document).scrollTop() > 190;
        jQuery('.filters').toggleClass('fixedSidebar', useFixedSidebar);
		jQuery('.itemsDisplay').toggleClass('fixedSidebarActive', useFixedSidebar);
    });
});
