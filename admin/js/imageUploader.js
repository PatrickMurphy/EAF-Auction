function imageUploader(dialogSelector,openButtonSelector, widthValue){
    this.dialogId = dialogSelector; 
    this.buttonId = openButtonSelector;   
    this.images = [new imageFile("","","")];
	this.width = widthValue; 
    var imgUploader = this;
    
    // Create dialog box
    $(this.dialogId).dialog({
        autoOpen:false,
        width:imgUploader.width,
        draggable:false,
        resizable:false,
        modal: true,
        buttons:{
            Save: function() {
                $( this ).dialog( "close" );        
                imgUploader.updateButton();        
            }
        }
    });
    
    $(this.buttonId).button({icons:{primary:"ui-icon-image"}}).click(function(){
        $(imgUploader.dialogId).dialog("open");
    });
    $( this.dialogId + " ul" ).sortable({placeholder: "ui-state-active"});
	$( this.dialogId + " ul" ).disableSelection();
    $("#images-dialog-upload-button").click(function(){
		imgUploader.uploadImage();	
	});
}

// Upload Method
imageUploader.prototype.uploadImage = function(){
    //TODO: upload
console.log("upload");
	$.ajax({  
        url: $('form#imgUploadForm').attr('action'),  
        type: "POST",
		data:  new FormData($('#imgUploadForm')),  
        processData:false,  
		dataType: 'json',
        contentType: false,  
		cache:false,
        success: function (obj) {  
            if(json.error)
				var newError = json.msg;
			else
				this.images.push(new imageFile(json.filename,json.size,json.path,this.images.length));
			console.log("Callback");
        }  
    }); 
};

// Delete Image Method
imageUploader.prototype.deleteImage = function() {
    // TODO: delete
};

// Select Method
imageUploader.prototype.selectImage = function() {
    // TODO: select
};

// Update Calling button method
imageUploader.prototype.updateButton = function() {
    // TODO: update
    var newText = "Upload &amp; Manage";
    if(this.images.length > 0)
        newText += " (" + this.images.length + ")";
    $(this.buttonId + " > .ui-button-text").html(newText);
};

function imageFile(file_name,file_size,file_path,list_position){
    this.filename=file_name;
    this.filepath=file_path;
    this.order=list_position;
	this.size = file_size;
}