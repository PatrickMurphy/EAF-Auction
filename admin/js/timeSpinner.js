//Description:  Extends jQuery UI Spinner to allow easy time input.
// Class:       timeSpinner
// Example:     $(".timeSpinner" ).timespinner({spin:timeSpinner_Event_Spin});

// Widget Base
$.widget( "ui.timeSpinner", $.ui.spinner, {});

function timeSpinner_Event_Spin(event, ui){
    var timeSpinner_period = this.value.split(" ")[1];
    var timeSpinner_hours = parseInt(this.value.split(" ")[0].split(":")[0]);
    var timeSpinner_minutes = parseInt(this.value.split(" ")[0].split(":")[1]);
    if(ui.value>0)
        timeSpinner_minutes += 10;
    else
        timeSpinner_minutes -= 10;
        
    console.log("ui.value = ",ui.value); // new value
    console.log("this.value = ",this.value); // original value
    console.log("timeSpinner_period = ", timeSpinner_period); // time period
    console.log("timeSpinner_hours = ", timeSpinner_hours); // time hours
    console.log("timeSpinner_minutes = ", timeSpinner_minutes); // time minutes
    console.log("Format: ",timeSpinner_Format(timeSpinner_hours, timeSpinner_minutes, timeSpinner_period));
    ui.value = timeSpinner_Format(timeSpinner_hours, timeSpinner_minutes, timeSpinner_period);
}

// Format timeSpinner Output
function timeSpinner_Format(timeSpinner_hours, timeSpinner_minutes, timeSpinner_period){
    if(timeSpinner_minutes>=60){
        timeSpinner_hours++;
        timeSpinner_minutes = 0;
    }else if(timeSpinner_minutes < 0){
        timeSpinner_hours--;
        timeSpinner_minutes = 50;
    }
    if(timeSpinner_hours>=13){
        timeSpinner_hours = 01;
        //period switch
        if(timeSpinner_period == "PM") timeSpinner_period = "AM"; else timeSpinner_period = "PM";
    }else if(timeSpinner_hours <= 0){
        timeSpinner_hours = 12;
        //period switch
        if(timeSpinner_period == "PM") timeSpinner_period = "AM"; else timeSpinner_period = "PM";
    }
    return timeSpinner_hours + ":" + timeSpinner_minutes + " " + timeSpinner_period;
}