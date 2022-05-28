

// Notification

function addmsg(type, msg){
 
$('#notification_count').html(msg);
}
 
 function cutmsg(type, msg1){
 
$('#notification_count').html(msg1);
}


 function removeNotification(){
$.ajax({
type: "GET",
url: "functions/notif_remove.php",
 
async: true,
cache: false,
timeout:50000,
 
success: function(data){
  
cutmsg("new", data);
setTimeout(
waitForMsg,
1000
);
}
});
 }


function waitForMsg(){
 
$.ajax({
type: "GET",
url: "functions/notif_select.php",
 
async: true,
cache: false,
timeout:50000,
 
success: function(data){
addmsg("new", data);
setTimeout(
waitForMsg,
1000
);
},
error: function(XMLHttpRequest, textStatus, errorThrown){
addmsg("error", textStatus + " (" + errorThrown + ")");
setTimeout(
waitForMsg,
15000);
}
});
};
 
$(document).ready(function(){
 
waitForMsg();
 
});


function loadDoc() {
  

  setInterval(function(){

   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("noti_message").innerHTML = this.responseText;
    }
   };
   xhttp.open("GET", "functions/get_message.php", true);
   xhttp.send();

  },1000);


 }
 loadDoc();
