function imageUploader(dialogSelector,openButtonSelector){
    this.dialogId = dialogSelector; 
    this.buttonId = openButtonSelector;   
    this.images = [new imageFile("","","")]; //
    var imgUploader = this;
    
    // Create dialog box
    $(this.dialogId).dialog({
        autoOpen:false,
        width:625,
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
    $( this.dialogId + " ul" ).sortable({placeholder: "ui-state-highlight"});
    $( this.dialogId + " ul" ).disableSelection();
    $("#images-dialog-upload-button").click();
}

// Upload Method
imageUploader.prototype.uploadImage = function(){
    //TODO: upload
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

function imageFile(file_name,file_path,list_position){
    this.filename=file_name;
    this.filepath=file_path;
    this.order=list_position;
}