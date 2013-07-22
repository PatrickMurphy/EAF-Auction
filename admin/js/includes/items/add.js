/** Displays the custom bid-increment text fields.
 * @param {String} Value of the html 'select' object.
 * @return {Boolean} If the value is 'custom' return true, otherwise false.
 */

function isCustomInc(value) {
	if ("custom" == value) {
		$(".customBidInc").show();
		$("#bidInc").hide();
	} else {
		$(".customBidInc").hide();
		$("#bidInc").show();
	}
	return "custom" == value;
}

function closeCustomBidInc() {
	$("#firstBidIncOption").prop('selected', true);
	$(".customBidInc").hide();
	$("#bidInc").show();
}
/** Validates each of the 5 custom bid-increment fields.
 * @return {Boolean} Returns true if all 5 fields are valid, false otherwise.
 */

function validateCustInc() {
	// Clear the error text.
	$("#custIncError").empty();
	var isValid = true;
	for (i = 0; i < $(".incField").length; i++)
	if (!validateMoney($(".incField").eq(i).get(0))) {
		// Display the error message.
		$("#custIncError").text("Not a number.");
		isValid = false;
	}
	return isValid;
}
/** Validates the 'Retail Value' field.
 * @return {Boolean} Returns true if the field is valid, false otherwise.
 */

function validateRetailValue() {
	$("#retailValueError").empty();
	var isValid = true;
	if (!validateMoney($("#retailValue").get(0))) {
		$("#retailValueError").text("Not a number.");
		isValid = false;
	}
	return isValid;
}
/** Validates a text field that accepts a dollar amount.
 * @param {HTML Object} object.
 * @return {Boolean} Returns true if the field is valid, false otherwise.
 */

function validateMoney(object) {
	// Remove the '$' symbol if the user entered it.
	if ('$' == object.value[0]) {
		var string = new String(object.value);
		object.value = string.substr(1);
	}
	// Verify the input is an actual number.
	return invalidateField(object, !isNaN(object.value))
}
/** Adds the 'invalid' class to the object is isValid is false (giving the object a red border), removes the 'invalid' class otherwise.
 * @param {HTML Object} object.
 * @param {Boolean} isValid.
 * @return {Boolean} Return isValid.
 */

function invalidateField(object, isValid) {
	// Create a jQuery object to access the class functions.
	object = $(object);
	if (isValid) object.removeClass("invalid");
	else
	object.addClass("invalid");
	return isValid;
}
/** Returns whether or not the string contains a valid time format (hh:mm).
 * @param {String} string.
 * @return {Boolean}
 */

function isValidTime(string) {
	return RegExp("^([0-9]{1,2})[^(0-9){1}]([0-9]{0,2})$").test(string);
}
/** Returns whether or not the string contains a valid date format (mm/dd/yyyy).
 * @param {String} string.
 * @return {Boolean}
 */

function isValidDate(string) {
	return RegExp("^([0-9]{1,2})[^(0-9)]([0-9]{1,2})[^(0-9)]([0-9]{2,4})$").test(string);
}
/** Validates a text field that accepts a date string.
 * @param {HTML Object} object.
 * @return {Boolean} Returns true if the date is valid, false otherwise.
 */

function validateDate(object) {
	$("#" + object.id + "Error").empty();
	var isValid = true;
	if (!invalidateField($("#" + object.id), isValidDate(object.value))) {
		$("#" + object.id + "Error").text("Invalid Date.");
		isValid = false;
	}
	return isValid;
}
/** Validates a text field that accepts a time string.
 * @param {HTML Object} object.
 * @return {Boolean} Returns true if the time is valid, false otherwise.
 */

function validateTime(object) {
	$("#" + object.id + "Error").empty();
	var isValid = true;
	if (!invalidateField($("#" + object.id), isValidTime(object.value))) {
		$("#" + object.id + "Error").text("Invalid Time.");
		isValid = false;
	}
	return isValid;
}
/** Queries the server if the closing time slot is available (i.e. has 10 or less items closing within 10 minutes of the selected time).
 * @param {String} date string + time string + AM|PM
 * @return {Boolean} Returns true if the slot is open, false otherwise.
 */

function isAvailableEndTimeSlot(timeDateString) {
	// TODO: AJAX STUFF
	return false; // Stand-in for actual function.
} /** Determines whether or not the closing time slot is available, displays a warning message if not. */

function validateEndTimeSlot() {
	if (isAvailableEndTimeSlot("")) {
		$("#endTimeWarning").clear();
	} else
	$("#endTimeWarning").text("Ten items are set to close at this time.");
} /** Finds the nearest open closing time-slot to the one currently entered in the end-time input field, and places it in the input field */

function generateEndTime() {
	// TODO: AJAX STUFF
	$("#endTime").get(0).value = Math.floor(Math.random() * 12 + 1) + ":" + Math.floor(Math.random() * 5) + "0"; // Stand-in for actual function.
} /** Generates an item ID that hasn't already been entered into the database. */

function generateUniqueID() {
	// TODO: AJAX STUFF
	$("#itemID").get(0).value = Math.floor(Math.random() * 100000); // Stand-in for actual function.
} /** Validates each form for submission. */

function validateCreateItem() {
	// Title.
	//$("#titleError").text("");
	//if (!invalidateField($("#title").get(0), $("#title").get(0).value != "")) {
	//	$("#titleError").text("Item must have a title.");
	//	}
	// Retail Value.
	//if (validateRetailValue()) {}
	// Start time.
	//if (validateDate($("#startDate").get(0))) {}
	//if (validateTime($("#startTime").get(0))) {}
	// End Time.
	//if (validateDate($("#endDate").get(0))) {}
	//if (validateTime($("#endTime").get(0))) {}
	// Bid Increments.
	//if (isCustomInc($("#bidInc").get(0).value)) {}
	errors = [
		[1, ["#title"], "message"],
		[2, ["#endDate", "#companyWebsite"], "message"],
		[2, ["#startDate", "#startTime"], "message"]
	];
	console.log(errors);
	showErrors(errors);
}

function showErrors(errors) {
	$("#error-message p").html("");
	for (var i = 0; i < errors.length; i++) {
		if (errors[i][0] != 1) {
			var icon = "ui-icon-alert";
			var style = "inputError";
		} else {
			var icon = "ui-icon-info";
			var style = "inputWarning";
		}
		$("#error-message p").append("<span class=\"ui-icon " + icon + "\" style=\"float:left; margin:0 7px 16px 0;\"></span>" + errors[i][2] + "<br style=\"clear:both;\" />");
		for (var j = 0; j <= errors[i][1].length; j++)
		$(errors[i][1][j]).addClass(style);
	}
	$("#error-message").dialog("open");
}
$(function() {
	var imageUploader1 = new imageUploader("#images-dialog", ".upload-images", 675);
});