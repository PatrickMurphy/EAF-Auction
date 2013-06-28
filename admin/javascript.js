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
//TODO: Fix auto complete, possibly use json cache
$.widget( "custom.cattag", $.ui.autocomplete, {
    _renderMenu: function( ul, items ) {
      var that = this,
        currentCategory = "";
      $.each( items, function( index, item ) {
        if ( item.category != currentCategory ) {
          ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
          currentCategory = item.category;
        }
        that._renderItemData( ul, item );
      });
    }
  });
	$(function() {
   		$(".datePick").datepicker({ minDate: new Date(2013, 9, 24), maxDate: new Date(2013, 10, 7), numberOfMonths: 2, showButtonPanel: true });
        $("[title]").tooltip({track:true, position:{my: "center bottom-15", at: "center top"}});
		$(".button, #shippable, #used").button();
        $("#images-dialog-upload-button").button({icons:{primary:"ui-icon-plusthick"}});
        $(".shuffle-icon").button({icons:{primary:"ui-icon-shuffle"}, text: false});
        $(".delete-icon").button({icons:{primary:"ui-icon-trash"}, text: false});
        $(".dollar").each(function(index,element){
            $('<span>').addClass('ui-icon-dollar').insertAfter(element).position({
            of: element
            ,my: 'left'
            ,at: 'left+5.3 top+13'
        }).text("$");
    });
    var data = [
    { label: "Alaska", category: "" },
    { label: "Art", category: "" },
    { label: "Eastern Washington", category: "Washington" },
    { label: "Seattle Area", category: "Washington" },
    { label: "Software & Games", category: "" },
    { label: "Sports Equipment & Events", category: "" },
    { label: "Vacations", category: "" }
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
    $("#categories").bind("keydown", function(event){
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "ui-autocomplete" ).menu.active ) {
          event.preventDefault();
        }
    })
    .cattag({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            data, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
      $(".upload-images").button({icons:{primary:"ui-icon-image"}}).click(function(){
        $("#images-dialog").dialog("open");
      });
      $("#images-dialog").dialog({
        autoOpen:false,
        height:325,
        width:600,
        modal: true
      });
      $( "#images-dialog ul" ).sortable({placeholder: "ui-state-highlight"});
      $( "#images-dialog ul" ).disableSelection();
        $("#formButtonRow span:first").button({
            icons: {
                primary: "ui-icon-note"
            }
            }).next().button({
                icons: {
                    primary: "ui-icon-disk"
                }   
            }).next().button({
                icons: {
                    primary: "ui-icon-plusthick"
                }   
            }).next().button({
                icons: {
                    primary: "ui-icon-image"
                }   
            });
		$("#startTime, #endTime" ).spinner();
        $("#shippableSet, #usedSet").buttonset();
        $("#shippableSet, #usedSet").change(function(e) {
           $(e.target).siblings("label").toggleClass("notSelected", 100);
        });
 	});