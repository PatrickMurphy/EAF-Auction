<?php

/**
 * @author Patrick Murphy
 * @copyright 2013
 * Add Item
 */
class validateForm
{
    public static function validate_Date($date){
        if(preg_match('^([0-9]{1,2})[^(0-9)]([0-9]{1,2})[^(0-9)]([0-9]{2,4})$',$date))
            return 1;
        else
            return 0;
    }
    
    public static function validate_Time($time){
        if(preg_match('^([0-9]{1,2})[^(0-9){1}]([0-9]{0,2})$',$time))
            return 1;
        else
            return 0;
    }
    
    public static function validate_Number($number){
        if(is_numeric($number))
            return 1;
        else
            return 0;
    }
    
    public static function validate_Url($url){
        if(preg_match('/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/',$url))
            return 1;
        else
            return 0;
    }
}

function checkForm(){
    if(isset($_POST['submit']))
        if(validateForm::validate_Date($_POST['startDate']))
            if(validateForm::validate_Date($_POST['endDate']))
                if(validateForm::validate_Time($_POST['startTime']))
                    if(validateForm::validate_Time($_POST['endTime']))
                        if(validateForm::validate_Url($_POST['companyWebsite']))
                            if(validateForm::validate_Number($_POST['retailValue']))
                                if(validateForm::validate_Number($_POST['reservePrice']))
                                    if(validateForm::validate_Number($_POST['itemId']))
                                        return true;
                        
    return false;
}

function bidInc(){
    if($_POST['bidInc']=='custom'){
        if(validateForm::validate_Number($_POST['customBidInc1']+$_POST['customBidInc2']+$_POST['customBidInc3']+$_POST['customBidInc4']+$_POST['customBidInc5']))
            return implode(",", [$_POST['customBidInc1'],$_POST['customBidInc2'],$_POST['customBidInc3'],$_POST['customBidInc4'],$_POST['customBidInc5']]);
    }else{
        switch($_POST['bidInc']){
            case 0:
                return '1,3,5,10,50';
                break;
            case 1:
                return '5,10,20,50,100';
                break;
            case 2:
                return '10,25,50,100,250';
                break;
            case 3:
                return '50,100,250,500,1000';
                break;
        }
    }
}

if(checkForm())
    $this->database->Insert("","eaf_items");
if(!isset($_POST)){
?>
<div class="formPanel column">
					<div class="formPanelHeader">
						Create Item
					</div>
                    <div class="column" style="width:50%;">
					<!-- Title Input -->
					<label for="title">
						Title
					</label>
					<br/>
					<input id="title" type="text" style="width:95%;" />
					<span id="titleError" class="errorMsg">
					</span>
                    </div>
                    <div class="column" style="width: 49%;">
                        <label for="categories">Categories</label><br />
                        <input id="categories" type="text" /></div>
					<br/>
					<!-- Description Input -->
					<label for="description">
						Description
					</label>
					<br/>
					<textarea id="description" rows="8" style="width:93%;"></textarea>
					<br/>
					<!-- Left Column -->
					<div class="column" style="margin-right:0; width:55%;">
						<label for="company">
							Company
						</label>
						<br/>
						<input id="company" type="text" style="margin-right:36px;" />
						<br />
						<br />
						<label for="startDate">
							Start Date
						</label>
						<br/>
						<!-- Start Time/Date Input -->
						<input style="width: 56.5%; margin-right:0px;" id="startDate" class="datePick" onchange="validateDate(this)" placeholder="mm/dd/yyyy" type="text" value="10/14/2013" size="8" />
						<input id="startTime" class="timeSpinner" onchange="validateTime(this)" placeholder="00:00 AM" value="08:30 PM" size="7" />
						<!-- Start Time/Date Error -->
						<span id="startDateError" class="errorMsg">
						</span>
						<span id="startTimeError" class="errorMsg">
						</span>
						<br/>
						<label for="endDate">
							End Date
							<span class="shuffle-icon" style="height: 16px; width:16px;" title="Chooses an available time slot nearest the one currently in the 'End Time' text field." onclick="generateEndTime();">
								Generate End Time
							</span>
						</label>
						<br/>
						<!-- End Time/Date Input -->
						<input style="width: 56.5%; margin-right:0px;" id="endDate" class="datePick" onchange="if(validateDate(this))validateEndTimeSlot();" placeholder="mm/dd/yyyy" type="text" value="11/01/2013" size="8" />
						<input id="endTime" class="timeSpinner" onchange="if(validateTime(this))validateEndTimeSlot();" type="text" placeholder="00:00 AM" value="08:30 PM" size="7" />
						<br/>
						<span id="endDateError" class="errorMsg">
						</span>
						<span id="endTimeError" class="errorMsg">
						</span>
						<span id="endTimeWarning" class="warningMsg">
						</span>
						<label for="itemID">
							Item ID #
						</label>
						<br/>
						<!-- Item ID Input -->
						<div class="input-sideButton">
							<input id="itemID" type="text" size="5" />
							<span class="shuffle-icon" onclick="generateUniqueID();" title="Generates a unique ID number not currently in the database.">
								Generate Unique ID
							</span>
						</div>
						<!-- Radios -->
						
						<div id="shippableSet" style="display: inline-block;">
							<label for="shippableSet">
								Shippable
							</label>
							<br />
							<input type="radio" id="radio1" name="radio[shippable]" checked="checked" />
							<label for="radio1">
								Yes
							</label>
							<input type="radio" id="radio2" name="radio[shippable]" />
							<label class="notSelected" for="radio2">
								No
							</label>
						</div>
					
						<div id="usedSet" style="display: inline-block;">
							<label for="usedSet">
								Used
							</label>
							<br />
							<input type="radio" id="radio3" name="radio[used]" checked="checked" />
							<label for="radio3">
								Yes
							</label>
							<input type="radio" id="radio4" name="radio[used]" />
							<label class="notSelected" for="radio4">
								No
							</label>
						</div>
     	                                             
					</div>
					<!-- Input Fields -->
					<div class="column" style="width:44%;">
						<!-- Comapny Name Input and Comapny Website Input -->
						<label for="companyWebsite">
							Website
						</label>
						<br />
						<input id="companyWebsite" style="margin-left:8px;" type="text" />
						<br />
						<br />
						<label for="retailValue">
							Retail Value
						</label>
						<br/>
						<!-- Retail Value Input -->
						<input id="retailValue" class="dollar" onchange="validateRetailValue();" value="0.00" type="text" size="5" name="retailValue" />
						<span id="retailValueError" class="errorMsg">
						</span>
						<br />
						<label for="itemID" title="Reserve Price is the lowest acceptable bid. If left blank or $0.00 no reserve will be set.">
							Reserve Price
						</label>
						<br/>
						<!-- Reserve Value Input -->
						<input id="retailValue" class="dollar" value="0.00" type="text" size="5" name="retailValue" />
						<span id="retailValueError" class="errorMsg">
						</span>
						<br />
						<label for="bidInc">
							Bid Increments
						</label><br />
						<select id="bidInc" onchange="isCustomInc(this.value);">
							<option id="firstBidIncOption" value="0">
								$1, $3, $5, $10, $50
							</option>
							<option value="1">
								$5, $10, $20, $50, $100
							</option>
							<option value="2">
								$10, $25, $50, $100, $250
							</option>
							<option value="3">
								$50, $100, $250, $500, $1000
							</option>
							<option value="custom">
								Custom...
							</option>
						</select>
                        <span style="display:none;" class="customBidInc">
                            <input class="dollar" type="text" placeholder="1" />
                            <input class="dollar" type="text" placeholder="3" />
                            <input class="dollar" type="text" placeholder="5" />
                            <input class="dollar" type="text" placeholder="10" />
                            <input class="dollar" type="text" placeholder="50" />
                            <button class="close-circle-icon" title="Cancel" onclick="closeCustomBidInc();">Cancel</button>
                            <br />
                        </span>
                        <br />
                        <label for="images">Images</label><br />
                        <span class="button button-inline upload-images">Upload & Manage</span>
					</div>
					<br/>
					<br/>
					<br />
                    <div id="images-dialog" title="Manage Images"> 
                        <div class="column"><img id="imgUploadPreview" src="../item_1.jpg" /></div>
                        <div class="column" style="width:375px;">
                            <div style="width: 100%;">Files:</div>
                            <div style="margin-bottom:10px;"><form id="imgUploadForm" method="post" enctype="multipart/form-data" action="imageUploader.php" ><input name="photoimg" type="file" style="margin:0; font-size:75%;" /><span id="images-dialog-upload-button" class="right">Upload</span></form></div>
                            <ul>
                                <li>image1.jpg<span class="right delete-icon" style="height: 16px; width:16px;" title="Are you sure you want to delete this image?">
								Delete
								</span></li>
                                <li>image2.jpg<span class="right delete-icon" style="height: 16px; width:16px;" title="Are you sure you want to delete this image?">
								Delete
								</span></li>
                                <li>image3.jpg<span class="right delete-icon" style="height: 16px; width:16px;" title="Are you sure you want to delete this image?">
								Delete
								</span></li>
                                <li>image4.jpg<span class="right delete-icon" style="height: 16px; width:16px;" title="Are you sure you want to delete this image?">
								Delete
							</span></li>
                            </ul>
                        </div>
                    </div>
					<!-- Form Buttons -->
					<div id="formButtonRow">
						<span class="button medium yellow">
							Save as Draft
						</span>
						<span class="button medium orange" onclick="validateCreateItem()">
							Submit
						</span>
						<span class="button medium orange" onclick="validateCreateItem()" title="Submits the item, but reloads the page with the same information, allowing identical or similiar items to be created with only minor changes.">
							Submit and keep form data
						</span>
						<span class="button medium green">
							Preview
						</span>
					</div>
				</div>
                <?php } ?>